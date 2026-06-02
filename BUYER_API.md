# PORTDA Buyer App — API Integration Guide

This document is for the **buyer / shipping-agent mobile app**.
Backend: Laravel 13 + Sanctum (Bearer tokens) + MySQL.

> **Vendor-app endpoints live in `VENDOR_API.md`** — keep them separate so you only have to reason about what your role can do.

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
buyer1@portda.test   buyer2@portda.test   …   buyer5@portda.test
```

### 1.2 The response envelope

All responses use one of these shapes — your HTTP client can normalise once.

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

// 401 unauthenticated  /  403 forbidden  /  404 not found
{ "success": false, "message": "<reason>" }
```

### 1.3 Suggested client wrapper (TypeScript / RN)

```ts
const API = process.env.API_URL ?? 'http://127.0.0.1:8000/api';

class ApiError extends Error {
  constructor(public status: number, message: string, public errors?: any) {
    super(message);
  }
}

async function api<T>(path: string, opts: RequestInit = {}, token?: string): Promise<T> {
  const headers: Record<string, string> = {
    Accept: 'application/json',
    ...(opts.body && !(opts.body instanceof FormData) ? { 'Content-Type': 'application/json' } : {}),
    ...(token ? { Authorization: `Bearer ${token}` } : {}),
    ...((opts.headers as any) ?? {}),
  };
  const r = await fetch(`${API}${path}`, { ...opts, headers });
  const json = await r.json().catch(() => ({}));
  if (r.status === 401) { /* clearTokenAndRedirectToLogin() */ }
  if (!r.ok) throw new ApiError(r.status, json.message ?? `HTTP ${r.status}`, json.errors);
  return json.data;
}
```

---

## 2. Authentication

### 2.1 Register

`POST /auth/register` &nbsp; *(public)*

```json
{
  "name": "OceanLink Shipping",
  "email": "you@oceanlink.in",
  "phone": "+919900001001",
  "password": "secret123",
  "password_confirmation": "secret123",
  "role": "buyer"
}
```

Response → `{ user, token }`. **Persist `token` in secure storage** (Keychain / Keystore / `SecureStore`) — every subsequent request needs it.

### 2.2 Login (email or phone + password)

`POST /auth/login` &nbsp; *(public)*

```json
{ "email": "buyer1@portda.test", "password": "password" }
// or:
{ "phone": "+919900001001", "password": "password" }
```

Response → `{ user, token }`.

### 2.3 OTP login (passwordless)

```http
POST /auth/otp/request
{ "identifier": "+919900001001", "purpose": "login" }
// response (in dev): { sent: true, debug_code: "482173" }
// in prod we deliver via SMS — the field is omitted.

POST /auth/otp/verify
{ "identifier": "+919900001001", "code": "482173", "purpose": "login" }
// → { user, token }
```

### 2.4 Current user / logout / change password

```http
GET  /auth/me              → returns user + buyerProfile + activeSubscription
POST /auth/logout          → revokes the token; clear local storage
POST /auth/password
{ "current_password": "old", "password": "new", "password_confirmation": "new" }
```

---

## 3. Profile

```http
GET  /profile
PUT  /profile
{
  "name": "OceanLink Shipping",
  "phone": "+919900001001",
  "company_name": "OceanLink Shipping Pvt Ltd",
  "imo_number": "9876543",
  "gst_number": "27ABCDE1234F1Z2",
  "billing_address": "Plot 14, JNPT Road, Navi Mumbai",
  "city": "Navi Mumbai", "state": "Maharashtra", "country": "India",
  "postal_code": "400707",
  "default_port_id": 1
}

POST /profile/avatar       (multipart: avatar=<image, max 2MB>)
```

---

## 4. KYC documents

```http
GET  /kyc                  → list your docs
GET  /kyc/status           → { counts: { pending: 2, approved: 3 } }

POST /kyc                  (multipart)
  doc_type     gst|pan|cin|iec|dgs_license|pi_insurance|address_proof|bank_proof|other
  doc_number   "27ABCDE1234F1Z2"
  file         <PDF/JPG/PNG, max 5MB>

DELETE /kyc/{id}           → remove a pending doc
```

Document `status` transitions: `pending → approved | rejected`. On rejection, `reject_reason` is set.

---

## 5. Catalog (no auth required — use these to populate dropdowns)

```http
GET /catalog/ports                     # list of ports
GET /catalog/ports?q=jnpt              # search

GET /catalog/categories                # categories + subcategories nested
GET /catalog/categories/{idOrSlug}     # one category

GET /catalog/hero-slides               # marketing banners (optional)
GET /catalog/plans?audience=buyer      # subscription plans, if you offer buyer plans
```

---

## 6. Browse vendors

```http
GET /vendors
  ?port_id=1           # filter: only vendors serving this port
  ?category_id=4       # filter: only vendors offering this category
  ?subcategory_id=12
  ?q=tug               # search company name
  ?min_rating=4.5
  ?premium_only=1
  ?page=2

GET /vendors/{vendor_profile_id}       # detail + recent reviews
```

Sort: `is_premium DESC, rating DESC, jobs_completed DESC`. Already filtered to verified vendors only.

---

## 7. Service Requests (RFQs) — the heart of the buyer app

### 7.1 List your requests

```http
GET /requests
  ?status=open|quoted|awarded|in_progress|completed|cancelled
  ?port_id=1
  ?category_id=4
  ?q=pacific            # search title/vessel_name
  ?page=1
```

### 7.2 Create a request

```http
POST /requests
{
  "port_id": 1,
  "category_id": 1,
  "subcategory_id": null,
  "vessel_name": "MV Pacific Bridge",
  "imo_number": "9456712",
  "title": "Pilotage at JNPT — MV Pacific Bridge",
  "description": "Inbound pilotage on 18 May, ETA 09:00",
  "service_date": "2026-05-18",
  "service_time": "09:00",
  "budget_min": 150000,
  "budget_max": 250000,
  "urgency": "urgent",
  "attachments": ["s3://…"]
}
```

Server sets `reference` (auto `PORT-XXXX`), `status="open"`, `buyer_id=auth.id`.

### 7.3 Update / cancel / delete

```http
GET    /requests/{id}                  # detail + all quotations.vendor
PUT    /requests/{id}                  # only allowed when status="open"
POST   /requests/{id}/cancel
DELETE /requests/{id}                  # only if no quotations exist
```

### 7.4 State machine

```
open → quoted (auto when first vendor quotes)
     → awarded (when you accept a quote — see §8.4)
     → in_progress → completed | cancelled
```

---

## 8. Quotations — receive, compare, accept

### 8.1 List quotes received

```http
GET /quotations
  ?status=submitted|accepted|rejected|withdrawn|expired
  ?service_request_id=1
  ?page=1
```

Quotations are filtered to ones on **your own** requests.

### 8.2 One quotation

```http
GET /quotations/{id}
```

### 8.3 Reject a quote

```http
POST /quotations/{id}/reject
```

### 8.4 Accept a quote — the big one

```http
POST /quotations/{id}/accept
```

Server, in a single transaction:
1. Marks this quotation `accepted` + sets `accepted_at`.
2. Marks every other quotation on the same request `rejected`.
3. Sets the service request `status="awarded"`.
4. Creates an **Order** (`subtotal=amount`, `commission=10%`, `total=amount`, `status="placed"`, `payment_status="pending"`).
5. Sends the vendor a notification.

Response → the new order with `serviceRequest`, `quotation`, `buyer`, `vendor` loaded.

### 8.5 Counter-offer

```http
POST /quotations/{id}/revisions
{ "amount": 165000, "notes": "Tug standby not needed." }
```

Creates a pending `QuotationRevision`. The vendor sees it and can update their quote.

---

## 9. Orders — track from placed → completed

### 9.1 List orders

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

Includes `serviceRequest.port`, `quotation`, `buyer`, `vendor`, `payments`, `invoice`, `review`, and the last 20 timeline `events`.

### 9.3 Actions you can take

```http
POST /orders/{id}/cancel
{ "cancel_reason": "Vessel delayed by storm" }    # allowed only when status in [placed, confirmed]

POST /orders/{id}/reschedule
{ "scheduled_at": "2026-05-19T09:00:00Z" }
```

`start` and `complete` are vendor-only actions — your app shows their status, but doesn't trigger them.

---

## 10. Payments — pay for your orders

### 10.1 Online payment (UPI / card / Razorpay / netbanking)

```http
POST /payments/initiate
{ "order_id": 12, "amount": 185000, "method": "razorpay" }
```

Response:

```json
{
  "payment": { "id": 88, "reference": "PAY-AB12", "status": "initiated", ... },
  "gateway": {
    "order_id": "mock_67abc",
    "checkout_url": "/mock-gateway/PAY-AB12",
    "key": "razorpay_key_xxxxx"
  }
}
```

After the gateway returns:

```http
POST /payments/{id}/confirm
{ "gateway_txn_id": "pay_NXX12345" }
```

This automatically:
- marks the order `payment_status=paid`
- issues an Invoice
- creates a pending Payout to the vendor
- notifies the vendor

### 10.2 Offline payment (NEFT / RTGS)

```http
POST /payments/offline    (multipart)
  order_id    12
  amount      185000
  method      neft|rtgs
  utr_number  "SBIN0001234567"
  proof       <file: bank receipt, optional>
```

Admin verifies it on their end. Watch `/notifications` for `payment.received`.

### 10.3 List your payments

```http
GET  /payments?status=success&method=upi&page=1
GET  /payments/{id}
```

---

## 11. Invoices

```http
GET /invoices         # NOTE: served via /orders/{id}.invoice
                      # there is no top-level /invoices endpoint — read from order detail
```

Each completed payment auto-generates an invoice. Fetch via `GET /orders/{id}` and read `.invoice`.

---

## 12. Reviews — rate a vendor after a completed order

```http
GET  /reviews?vendor_id=7         # public — view reviews on any vendor

POST /reviews
{
  "order_id": 12,                 # must be yours AND status="completed"
  "rating": 5,
  "title": "Excellent pilotage",
  "body": "Smooth, on time, professional.",
  "tags": ["punctual", "professional"]
}
```

The backend recomputes the vendor's avg rating and notifies them.

---

## 13. Chat — talk to the vendor

### 13.1 Your inbox

```http
GET /chat/rooms                   # rooms where you are the buyer, with lastMessage preview
```

### 13.2 Open / find a room

```http
POST /chat/rooms
{
  "counterparty_user_id": 7,          # the vendor's user id
  "service_request_id": 1,            # optional — to scope to a request
  "order_id": null
}
```

`firstOrCreate` semantics — call this any time you want to message someone; you'll get the existing room if one exists.

### 13.3 Conversation

```http
GET  /chat/rooms/{room}                          # last 50 messages
POST /chat/rooms/{room}/messages    (multipart)
  type        text | image | file       (default: text)
  body        "Hi, when can the pilot board?"   (required for text)
  attachment  <file, max 10MB>          (required for image/file)
POST /chat/rooms/{room}/read                     # mark counterparty's messages as read
```

Polling cadence: every 5–10s while on the room, 30–60s for the inbox.

---

## 14. Notifications

```http
GET  /notifications?unread=1&page=1
GET  /notifications/unread-count          # { count: 4 } — call every 30–60s for the badge
POST /notifications/{id}/read
POST /notifications/read-all
DELETE /notifications/{id}
```

Notification `type` values you'll receive:
- `quotation.received` — a vendor quoted on your request
- `order.started`, `order.completed`, `order.cancelled`
- `payment.received` (admin verified your offline payment)
- `chat.message`
- `kyc.update`, `broadcast`, `system`

---

## 15. Dashboard — one call for the home screen

```http
GET /dashboard
```

```json
{
  "open_requests": 4,
  "awaiting_quotes": 2,
  "pending_orders": 3,
  "completed_orders": 12,
  "total_spent": 1840000,
  "recent_requests": [ ... 5 items, each with port, category, quotations_count ... ],
  "recent_orders":   [ ... 5 items, each with vendor + serviceRequest ... ],
  "unread_notifications": 7
}
```

Fetch this once when the user opens the app; pin to local state.

---

## 16. State-machine cheatsheet

```
ServiceRequest:  open → quoted → awarded → in_progress → completed | cancelled
Quotation:       submitted → accepted | rejected | withdrawn | expired
Order:           placed → confirmed → in_progress → completed | cancelled | disputed
Payment:         initiated → pending → success | failed | refunded
Order.payment:   pending → paid | partially_paid | refunded | failed
KycDocument:     pending → approved | rejected
```

---

## 17. End-to-end happy-path (paste-ready cURL)

```bash
API=http://127.0.0.1:8000/api

# 1. Login
TOKEN=$(curl -s -X POST -H "Accept: application/json" -H "Content-Type: application/json" \
  -d '{"email":"buyer1@portda.test","password":"password"}' \
  $API/auth/login | jq -r .data.token)

# 2. See your dashboard
curl -s -H "Accept: application/json" -H "Authorization: Bearer $TOKEN" $API/dashboard | jq .

# 3. Post a new service request
RID=$(curl -s -X POST -H "Accept: application/json" -H "Content-Type: application/json" \
  -H "Authorization: Bearer $TOKEN" \
  -d '{"port_id":1,"category_id":1,"vessel_name":"MV Test","title":"Test pilotage","urgency":"standard"}' \
  $API/requests | jq -r .data.id)

# 4. Look at the request and see who's quoting
curl -s -H "Authorization: Bearer $TOKEN" $API/requests/$RID | jq .

# 5. Accept a quotation (replace 1 with the actual id)
curl -s -X POST -H "Authorization: Bearer $TOKEN" $API/quotations/1/accept | jq .

# 6. Initiate payment
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"order_id":12,"amount":185000,"method":"razorpay"}' \
  $API/payments/initiate | jq .

# 7. Confirm payment (simulated callback)
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"gateway_txn_id":"pay_smoke123"}' \
  $API/payments/88/confirm | jq .

# 8. Once the vendor marks the order complete, leave a review
curl -s -X POST -H "Content-Type: application/json" -H "Authorization: Bearer $TOKEN" \
  -d '{"order_id":12,"rating":5,"body":"Great service"}' \
  $API/reviews | jq .

# 9. Logout
curl -s -X POST -H "Authorization: Bearer $TOKEN" $API/auth/logout | jq .
```

---

## 18. Things to know before you ship

- **Token storage**: use platform keystore. Never AsyncStorage on iOS without `accessible=whenUnlocked`.
- **Refresh**: on 401, drop the token, route to login. There is no refresh-token flow — tokens are long-lived until logout.
- **Concurrency**: poll `/notifications/unread-count` and active `/chat/rooms/{id}` while the app is foregrounded; back off when backgrounded.
- **File upload**: always use `multipart/form-data`. Set `Content-Type` automatically by passing a FormData body; don't set it manually.
- **Time zones**: server returns timestamps in UTC ISO-8601. Format locally with the user's tz.
- **Currency**: amounts are in **INR (₹)** unless `currency` says otherwise. Treat as integer rupees (server stores `decimal(14,2)` — values are accurate).
- **Image URLs**: avatars/attachments come back as relative paths like `kyc/abc.pdf`. The server-rendered URL is `${BASE_HOST}/storage/${path}` (note: this is **without** the `/api` prefix).
