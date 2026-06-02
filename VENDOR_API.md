# PORTDA Vendor App — API Integration Guide

This document is for the **vendor / marine-service-provider mobile app**.
Backend: Laravel 13 + Sanctum (Bearer tokens) + MySQL.

> **Buyer-app endpoints live in `BUYER_API.md`** — keep them separate so you only have to reason about what your role can do.

---

## 1. Quick start

```
Base URL (dev):   http://127.0.0.1:8000/api
Base URL (prod):  https://api.portda.example/api
```

Every request:

```
Accept:        application/json
Content-Type:  application/json     # except multipart uploads
Authorization: Bearer <token>       # for everything except 2.1 + 5
```

### 1.1 Demo accounts (password = `password`)

```
vendor1@portda.test   vendor2@portda.test   …   vendor8@portda.test
```

`vendor1` (Sagarmala Pilots) ships with an active Pro subscription and 4 completed jobs — handy for happy-path testing.

### 1.2 The response envelope

```jsonc
// 200/201 success
{ "success": true, "message": "OK", "data": <payload> }

// Paginated list
{
  "success": true, "message": "OK",
  "data": [ ...items ],
  "meta": { "current_page": 1, "per_page": 20, "total": 84, "last_page": 5 }
}

// 422 validation
{ "success": false, "message": "Validation failed.", "errors": { "field": ["msg"] } }

// 401 / 403 / 404
{ "success": false, "message": "<reason>" }
```

### 1.3 Suggested client wrapper (TypeScript / RN)

```ts
const API = process.env.API_URL ?? 'http://127.0.0.1:8000/api';

async function api<T>(path: string, opts: RequestInit = {}, token?: string): Promise<T> {
  const headers: Record<string, string> = {
    Accept: 'application/json',
    ...(opts.body && !(opts.body instanceof FormData) ? { 'Content-Type': 'application/json' } : {}),
    ...(token ? { Authorization: `Bearer ${token}` } : {}),
    ...((opts.headers as any) ?? {}),
  };
  const r = await fetch(`${API}${path}`, { ...opts, headers });
  const json = await r.json().catch(() => ({}));
  if (!r.ok) throw Object.assign(new Error(json.message ?? `HTTP ${r.status}`), { status: r.status, errors: json.errors });
  return json.data;
}
```

---

## 2. Authentication

### 2.1 Register

`POST /auth/register` &nbsp; *(public)*

```json
{
  "name": "Sagarmala Pilots",
  "email": "ops@sagarmala.in",
  "phone": "+919900002001",
  "password": "secret123",
  "password_confirmation": "secret123",
  "role": "vendor"
}
```

Response → `{ user, token }`. Server creates an empty `VendorProfile` for you; **complete the onboarding flow next** (§3, §4, §5).

### 2.2 Login

`POST /auth/login` *(email or phone + password)*

```json
{ "email": "vendor1@portda.test", "password": "password" }
```

Response → `{ user, token }`. Store the token in a secure platform keystore.

### 2.3 OTP login (passwordless)

```http
POST /auth/otp/request
{ "identifier": "+919900002001", "purpose": "login" }
// dev response: { sent: true, debug_code: "618204" } — production uses SMS

POST /auth/otp/verify
{ "identifier": "+919900002001", "code": "618204", "purpose": "login" }
// → { user, token }
```

### 2.4 Current user / logout / change password

```http
GET  /auth/me              → user + vendorProfile (with categories + ports) + activeSubscription.plan
POST /auth/logout
POST /auth/password
{ "current_password": "old", "password": "new", "password_confirmation": "new" }
```

---

## 3. Vendor profile (onboarding step 1)

```http
GET  /profile
PUT  /profile
{
  "name": "Sagarmala Pilots",
  "phone": "+919900002001",
  "company_name": "Sagarmala Pilots Pvt Ltd",
  "bio": "DGS-licensed pilots and tug services since 2008.",
  "gst_number": "27ABCDE1234F1Z2",
  "pan_number": "ABCDE1234F",
  "city": "Mumbai", "state": "Maharashtra", "country": "India",
  "bank_account": {
    "account_name": "Sagarmala Pilots Pvt Ltd",
    "account_number": "1234567890",
    "ifsc": "HDFC0001234"
  }
}

POST /profile/avatar           (multipart: avatar=<image, max 2MB>)
```

---

## 4. Service coverage (onboarding step 2)

Tell the system **which categories you offer** and **which ports you serve**. These determine which leads land in your inbox.

```http
POST /profile/vendor/categories
{
  "categories": [
    { "category_id": 1, "subcategory_id": 2 },
    { "category_id": 1, "subcategory_id": 3 },
    { "category_id": 4, "subcategory_id": null }
  ]
}

POST /profile/vendor/ports
{ "port_ids": [1, 2, 5] }
```

Re-call either endpoint at any time — they replace the prior set.

To populate the dropdowns:

```http
GET /catalog/categories        # categories + subcategories nested
GET /catalog/ports             # all active ports
```

---

## 5. KYC documents (onboarding step 3)

Upload the docs the admin needs to verify you. Until at least one is approved, your `vendorProfile.verification_status` stays `unverified` and you **won't appear in the buyer directory**.

```http
GET  /kyc                  # list your docs
GET  /kyc/status           # { counts, verification_status }

POST /kyc                  (multipart)
  doc_type   gst|pan|cin|iec|dgs_license|pi_insurance|address_proof|bank_proof|other
  doc_number "27ABCDE1234F1Z2"
  file       <PDF/JPG/PNG, max 5MB>

DELETE /kyc/{id}           # remove a pending doc
```

Required docs for full verification: **GST · PAN · DGS Licence · P&I Insurance**.

Status: `pending → approved | rejected`. On rejection, `reject_reason` is set.

---

## 6. Subscriptions — unlock leads

Free vendors see a limited subset of leads. Subscribe to access all leads + premium positioning.

```http
GET  /catalog/plans?audience=vendor   # public plan catalogue
GET  /subscriptions/current           # your active sub or null
GET  /subscriptions                   # billing history

POST /subscriptions
{ "plan_id": 2, "billing_cycle": "monthly" }   # creates active sub, cancels any prior active

POST /subscriptions/{id}/cancel
```

Plans seeded: **Basic** (10 leads/mo) · **Pro** (50 leads/mo, ★ Premium badge) · **Enterprise** (unlimited).

---

## 7. Request Inbox — the heart of the vendor app

Leads available to you = open or quoted requests in your **categories ∩ ports** that you haven't quoted on yet.

### 7.1 Browse leads

```http
GET /requests
  ?status=open|quoted             # default: both
  ?port_id=1
  ?category_id=4
  ?q=pilotage                     # search title/vessel_name
  ?page=1
```

Each lead includes the buyer (id + name only — full contact appears after you're awarded), port, category, and `quotations_count` so you know the competition.

### 7.2 One lead — full details

```http
GET /requests/{id}
```

You'll see: full description, attachments, budget range, urgency, buyer's existing quotations.

> **Tip:** filter your inbox to `?status=open` for hot leads — `quoted` requests already have at least one competitor.

---

## 8. Submitting quotations

### 8.1 Submit a quote

```http
POST /quotations
{
  "service_request_id": 1,
  "amount": 185000,
  "currency": "INR",
  "notes": "All-inclusive pilotage with experienced pilot.",
  "line_items": [
    { "label": "Pilot fee", "amount": 150000 },
    { "label": "Boarding fee", "amount": 25000 },
    { "label": "Stamp/admin", "amount": 10000 }
  ],
  "valid_until": "2026-05-30",
  "terms": { "payment": "50% advance, 50% on completion" },
  "is_negotiable": true
}
```

Server bumps the service request to `quoted` (if not already) and notifies the buyer.

### 8.2 Manage your quotations

```http
GET   /quotations
  ?status=submitted|accepted|rejected|withdrawn|expired
  ?service_request_id=1
  ?page=1

GET   /quotations/{id}                # detail with revisions
PUT   /quotations/{id}                # editable only while status="submitted"
{ "amount": 170000, "notes": "Updated pricing." }

POST  /quotations/{id}/withdraw       # voluntarily remove
POST  /quotations/{id}/revisions      # counter-propose during negotiation
{ "amount": 160000, "notes": "Best I can do." }
```

### 8.3 What happens when you're accepted

The buyer hits `POST /quotations/{id}/accept`. In a single transaction the server:
1. Sets your quote to `accepted`.
2. Sets every other quote on that request to `rejected`.
3. Creates an **Order** with you as the vendor.
4. Sends you a `quotation.accepted` notification — that's the trigger to start work.

---

## 9. Orders — manage from placed → completed

### 9.1 List your orders

```http
GET /orders
  ?status=placed|confirmed|in_progress|completed|cancelled|disputed
  ?payment_status=pending|paid|refunded|failed
  ?date_from=2026-05-01
  ?date_to=2026-05-31
  ?page=1
```

### 9.2 One order — full payload

```http
GET /orders/{id}
```

Includes: buyer (full contact now), service request, accepted quotation, payments, invoice, review (if any), and last 20 timeline events.

### 9.3 Vendor actions

```http
POST /orders/{id}/start
   # status must be placed/confirmed; sets in_progress + started_at; notifies buyer

POST /orders/{id}/complete
   # marks completed + completed_at; notifies buyer; unlocks Payout

POST /orders/{id}/reschedule
{ "scheduled_at": "2026-05-19T09:00:00Z" }
```

Cancellation (mutual): `POST /orders/{id}/cancel` with `{ "cancel_reason": "..." }` — allowed when status in `[placed, confirmed]`.

---

## 10. Payouts — get paid

Payouts are auto-created when the buyer's payment lands (online confirmation or admin-verified offline). Admin processes them; your app just shows status.

```http
GET /payments          # payments related to YOUR orders (you receive)
  ?status=success
  ?page=1

GET /payments/{id}
```

There's also `/payouts` on the admin side — for the vendor app, the user-visible payout state comes from the order detail. Add this to the order detail screen:

```js
const order = await api(`/orders/${id}`, {}, token);
order.payments.forEach(p => /* show ₹{p.amount} · {p.status} · {p.method} */);
// settlement to your bank → state lives on the back-office payout row, shown only in the order's notifications
```

When the platform actually disburses to your bank, you'll get a `payment.received` → `payout.processed` notification with the UTR.

---

## 11. Reviews — receive and reply

```http
GET /reviews?vendor_id={your_user_id}    # public — buyers' reviews of you
GET /reviews                              # default: your own (auth required)
GET /reviews/{id}

POST /reviews/{id}/reply
{ "vendor_reply": "Thanks — happy to serve again." }
```

Your rating is recomputed automatically as new reviews land. Don't cache `vendorProfile.rating` for more than ~5 min.

---

## 12. Chat — talk to the buyer

### 12.1 Inbox

```http
GET /chat/rooms                       # rooms where you are the vendor, with lastMessage preview
```

### 12.2 Open / find a room

```http
POST /chat/rooms
{
  "counterparty_user_id": 2,          # the buyer's user id
  "service_request_id": 1,            # optional — scope to a request
  "order_id": null
}
```

Returns the existing room if one exists (`firstOrCreate` semantics).

### 12.3 Send messages

```http
GET  /chat/rooms/{room}                          # last 50 messages
POST /chat/rooms/{room}/messages    (multipart)
  type        text | image | file       (default: text)
  body        "We're 30 mins out from boarding."
  attachment  <file, max 10MB>          (for image/file)
POST /chat/rooms/{room}/read                     # clear unread badge for this room
```

Polling cadence: every 5–10s while on the room, 30–60s for the inbox.

---

## 13. Notifications

```http
GET  /notifications?unread=1&page=1
GET  /notifications/unread-count           # { count: 4 } — call every 30–60s
POST /notifications/{id}/read
POST /notifications/read-all
DELETE /notifications/{id}
```

Notification `type` values you'll receive:
- `quotation.accepted` — **the money-maker** — start work
- `order.cancelled` (buyer cancelled before you started)
- `payment.received` — payment landed; payout queued
- `chat.message`
- `review.new` — a new review on you
- `kyc.update` — admin approved/rejected a doc
- `broadcast`, `system`

---

## 14. Dashboard — one call for the home screen

```http
GET /dashboard
```

```json
{
  "available_leads": 12,
  "active_quotes": 5,
  "won_orders": 3,
  "completed_orders": 28,
  "total_earned": 4250000,
  "rating": 4.8,
  "recent_leads":  [ ...5 items, each with port, category, buyer ... ],
  "recent_orders": [ ...5 items, each with buyer + serviceRequest ... ],
  "unread_notifications": 4
}
```

Fetch this once at app start; pin to local state.

---

## 15. State-machine cheatsheet

```
ServiceRequest:  open → quoted → awarded → in_progress → completed | cancelled
Quotation:       submitted → accepted | rejected | withdrawn | expired
Order:           placed → confirmed → in_progress → completed | cancelled | disputed
Payment:         initiated → pending → success | failed | refunded
Payout:          pending → processing → paid | failed | on_hold
KycDocument:     pending → approved | rejected
Vendor.verification: unverified → pending → verified | rejected
```

---

## 16. Onboarding wizard — recommended order

1. Register (§2.1) → get token.
2. Update profile basics (§3).
3. Pick categories + ports (§4).
4. Upload KYC docs (§5). Wait for `kyc.update` notifications.
5. Once admin approves → `verification_status="verified"`, you're listed in the buyer directory.
6. Subscribe to a plan to unlock the full inbox (§6).
7. Start quoting (§7, §8).

---

## 17. End-to-end happy-path (paste-ready cURL)

```bash
API=http://127.0.0.1:8000/api

# 1. Login
TOKEN=$(curl -s -X POST -H "Accept: application/json" -H "Content-Type: application/json" \
  -d '{"email":"vendor1@portda.test","password":"password"}' \
  $API/auth/login | jq -r .data.token)

# 2. Dashboard
curl -s -H "Authorization: Bearer $TOKEN" $API/dashboard | jq .

# 3. Browse inbox
curl -s -H "Authorization: Bearer $TOKEN" "$API/requests?status=open&page=1" | jq .

# 4. Open a specific lead
curl -s -H "Authorization: Bearer $TOKEN" $API/requests/1 | jq .

# 5. Submit a quote
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"service_request_id":1,"amount":185000,"notes":"All-inclusive."}' \
  $API/quotations | jq .

# 6. After buyer accepts → you'll receive notification quotation.accepted
curl -s -H "Authorization: Bearer $TOKEN" "$API/notifications?unread=1" | jq .

# 7. Start the order
curl -s -X POST -H "Authorization: Bearer $TOKEN" $API/orders/12/start | jq .

# 8. Mark complete
curl -s -X POST -H "Authorization: Bearer $TOKEN" $API/orders/12/complete | jq .

# 9. Reply to a review
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"vendor_reply":"Thanks — happy to serve again."}' \
  $API/reviews/3/reply | jq .

# 10. Subscribe to Pro plan
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"plan_id":2,"billing_cycle":"monthly"}' \
  $API/subscriptions | jq .

# 11. Logout
curl -s -X POST -H "Authorization: Bearer $TOKEN" $API/auth/logout | jq .
```

---

## 18. Things to know before you ship

- **Token storage**: platform keystore only.
- **Unverified vendors**: API works, but you won't be listed in the buyer directory or receive new leads in matching categories until admin approves your KYC.
- **Lead matching**: the system only shows you requests where `request.category ∈ your categories` **AND** `request.port ∈ your ports`. If `recent_leads` is empty, broaden your coverage in §4.
- **Concurrency**: a request can have many vendor quotes; only one wins. The losing quotes are auto-set to `rejected` the instant the buyer accepts. Don't rely on a quote staying `submitted` forever — show a "Withdraw" button only while `status === "submitted"`.
- **Currency**: amounts are in **INR (₹)** unless `currency` says otherwise; values stored as `decimal(14,2)`.
- **Image URLs**: avatars/attachments come back as relative paths like `chat/abc.jpg`. The full URL is `${BASE_HOST}/storage/${path}` (without the `/api` prefix).
- **Refresh**: on 401, drop the token, route to login. No refresh-token flow — tokens are long-lived until you call `/auth/logout`.
- **Webhook-style real time**: not yet — poll `unread-count` for the badge.
