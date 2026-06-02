# PORTDA — Frontend Integration Guide

Backend: Laravel 13 + Sanctum + MySQL.
All API responses use a consistent envelope. Use the same API from both the **web** app (session cookies) and the **mobile** app (Bearer tokens).

---

## 1. Base configuration

| Item | Value |
|---|---|
| API base URL (dev) | `http://127.0.0.1:8000/api` |
| Public-asset base | `http://127.0.0.1:8000/` (`public_html/` is the webroot) |
| Default `Accept` header | `application/json` |
| Auth scheme | Laravel Sanctum — Bearer tokens (mobile) **or** session cookies (web SPA) |
| CORS | Enabled. For SPA cookie auth set `SANCTUM_STATEFUL_DOMAINS` in `.env` |

Start the server:
```bash
php artisan serve
```

### Seeded demo accounts (password = `password` for all)

| Role | Email |
|---|---|
| Admin  | `admin@portda.test` |
| Buyer  | `buyer1@portda.test` … `buyer5@portda.test` |
| Vendor | `vendor1@portda.test` … `vendor8@portda.test` |

---

## 2. Response envelope

Every JSON response from `/api/*` follows this shape:

```json
// Success (200/201)
{ "success": true, "message": "OK", "data": <payload> }

// Paginated list
{
  "success": true, "message": "OK",
  "data": [ ...items ],
  "meta": { "current_page": 1, "per_page": 20, "total": 84, "last_page": 5 }
}

// Validation error (422)
{ "success": false, "message": "Validation failed.", "errors": { "field": ["msg"] } }

// Auth error (401)
{ "success": false, "message": "Unauthenticated." }

// Forbidden (403)
{ "success": false, "message": "Forbidden." }
```

---

## 3. Authentication

### 3.1 Register

`POST /api/auth/register`

```json
{
  "name": "Acme Shipping",
  "email": "ops@acme.test",
  "phone": "+919900000099",
  "password": "secret123",
  "password_confirmation": "secret123",
  "role": "buyer"          // or "vendor"
}
```

Response → `{ user, token }`. **Save the token** — every subsequent request needs `Authorization: Bearer <token>`.

### 3.2 Login

`POST /api/auth/login`

```json
{ "email": "buyer1@portda.test", "password": "password" }
```

You may pass `phone` instead of `email`. Response → `{ user, token }`.

### 3.3 OTP (passwordless login)

```http
POST /api/auth/otp/request
{ "identifier": "+919900001001", "purpose": "login" }

POST /api/auth/otp/verify
{ "identifier": "+919900001001", "code": "123456", "purpose": "login" }
```

In non-production environments the response includes `data.debug_code` so you can complete the flow without an SMS gateway.

### 3.4 Authenticated user

```http
GET  /api/auth/me                Authorization: Bearer <token>
POST /api/auth/logout            (revokes the current token)
POST /api/auth/password          { current_password, password, password_confirmation }
```

### 3.5 Mobile usage (React Native / Flutter)

```js
const r = await fetch(`${API}/api/auth/login`, {
  method: 'POST',
  headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' },
  body: JSON.stringify({ email, password }),
});
const { data: { token, user } } = await r.json();
await SecureStore.setItemAsync('token', token);

// Subsequent calls
const api = (path, opts = {}) => fetch(`${API}${path}`, {
  ...opts,
  headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${token}`, ...(opts.headers || {}) },
});
```

### 3.6 Web SPA cookie auth (optional)

If you want cookie auth instead of tokens (e.g. for a React/Vue SPA on the same domain):

1. Set `SESSION_DOMAIN` and `SANCTUM_STATEFUL_DOMAINS` in `.env`.
2. Frontend must `GET /sanctum/csrf-cookie` first, then call `POST /api/auth/login` with cookies (`credentials: 'include'`). Sanctum is wired with `statefulApi()`.

---

## 4. Catalog (public)

| Endpoint | Description |
|---|---|
| `GET /api/catalog/ports` | All active ports. `?q=` search |
| `GET /api/catalog/categories` | Categories + nested subcategories |
| `GET /api/catalog/categories/{id-or-slug}` | One category with subcategories |
| `GET /api/catalog/plans?audience=vendor` | Subscription plans |
| `GET /api/catalog/hero-slides` | Marketing hero slides |

| `GET /api/vendors` | Public verified-vendor directory. Filters: `port_id`, `category_id`, `subcategory_id`, `q`, `min_rating`, `premium_only` |
| `GET /api/vendors/{id}` | Vendor detail with categories, ports, recent reviews |

---

## 5. Profile (auth required)

| Endpoint | Description |
|---|---|
| `GET /api/profile` | Current user + relevant profile (buyer/vendor) |
| `PUT /api/profile` | Update user + profile fields |
| `POST /api/profile/avatar` (multipart) | Field `avatar` (image, max 2 MB) |
| `POST /api/profile/vendor/categories` | Body: `{ categories: [{ category_id, subcategory_id? }, ...] }` (vendor only) |
| `POST /api/profile/vendor/ports` | Body: `{ port_ids: [1,2,3] }` (vendor only) |

---

## 6. KYC (auth required)

| Endpoint | Description |
|---|---|
| `GET /api/kyc` | List your KYC documents |
| `GET /api/kyc/status` | Counts by status + verification status |
| `POST /api/kyc` (multipart) | Upload doc. Fields: `doc_type`, `doc_number?`, `file` |
| `DELETE /api/kyc/{id}` | Remove a pending doc |

`doc_type` ∈ `gst, pan, cin, iec, dgs_license, pi_insurance, address_proof, bank_proof, other`

---

## 7. Dashboard

`GET /api/dashboard` — role-aware. Returns one of:

### Buyer
```json
{
  "open_requests": 4,
  "awaiting_quotes": 2,
  "pending_orders": 3,
  "completed_orders": 12,
  "total_spent": 1840000,
  "recent_requests": [ ...5 items ],
  "recent_orders":   [ ...5 items ],
  "unread_notifications": 7
}
```

### Vendor
```json
{
  "available_leads": 12,
  "active_quotes": 5,
  "won_orders": 3,
  "completed_orders": 28,
  "total_earned": 4250000,
  "rating": 4.7,
  "recent_leads":  [ ... ],
  "recent_orders": [ ... ],
  "unread_notifications": 4
}
```

### Admin
```json
{
  "users_by_role": { "buyer": 428, "vendor": 1247, "admin": 6 },
  "total_requests": 3142,
  "total_orders": 2018,
  "total_revenue": 62300000,
  "pending_kyc": 14,
  "pending_disputes": 6,
  "orders_by_status": { "placed": 12, "in_progress": 35, "completed": 1968, "cancelled": 3 },
  "recent_orders": [ ... ],
  "recent_signups": [ ... ]
}
```

---

## 8. Service Requests (RFQs)

| Endpoint | Description |
|---|---|
| `GET /api/requests` | Buyer sees own, vendor sees matching open leads. Filters: `status`, `port_id`, `category_id`, `q` |
| `POST /api/requests` | Buyer creates RFQ. See payload below |
| `GET /api/requests/{id}` | Detail incl. quotations |
| `PUT /api/requests/{id}` | Buyer edits (only when `status=open`) |
| `DELETE /api/requests/{id}` | Buyer deletes (only when no quotations) |
| `POST /api/requests/{id}/cancel` | Buyer cancels |

Create payload:
```json
{
  "port_id": 1,
  "category_id": 1,
  "subcategory_id": null,
  "vessel_name": "MV Pacific Bridge",
  "imo_number": "9456712",
  "title": "Pilotage at JNPT",
  "description": "Vessel arriving 18 May, inbound pilotage.",
  "service_date": "2026-05-27",
  "budget_min": 150000,
  "budget_max": 250000,
  "urgency": "urgent"
}
```

Statuses: `draft, open, quoted, awarded, in_progress, completed, cancelled`.

---

## 9. Quotations

| Endpoint | Who | Description |
|---|---|---|
| `GET /api/quotations` | Buyer/Vendor | Vendor sees own, buyer sees on own requests |
| `POST /api/quotations` | Vendor | Submit quote |
| `GET /api/quotations/{id}` | Party | Detail |
| `PUT /api/quotations/{id}` | Vendor | Edit (only when `status=submitted`) |
| `POST /api/quotations/{id}/withdraw` | Vendor | Withdraw |
| `POST /api/quotations/{id}/accept` | Buyer | **Accept → auto-creates an `Order` + notifies vendor** |
| `POST /api/quotations/{id}/reject` | Buyer | Reject |
| `POST /api/quotations/{id}/revisions` | Either | Propose new amount |

Create payload:
```json
{
  "service_request_id": 1,
  "amount": 185000,
  "notes": "All-inclusive pilotage",
  "line_items": [{ "label": "Pilot fee", "amount": 150000 }],
  "valid_until": "2026-05-30",
  "is_negotiable": true
}
```

---

## 10. Orders

| Endpoint | Description |
|---|---|
| `GET /api/orders` | Filters: `status`, `payment_status`, `date_from`, `date_to` |
| `GET /api/orders/{id}` | Full detail incl. events, payments, invoice, review |
| `POST /api/orders/{id}/start` | Vendor → `in_progress` |
| `POST /api/orders/{id}/complete` | Vendor → `completed` |
| `POST /api/orders/{id}/cancel` | Either party. Body: `{ cancel_reason }` |
| `POST /api/orders/{id}/reschedule` | Body: `{ scheduled_at }` |

Statuses: `placed, confirmed, in_progress, completed, cancelled, disputed`.

---

## 11. Payments

### Online (mock gateway)

```http
POST /api/payments/initiate
{ "order_id": 1, "amount": 185000, "method": "razorpay" }

→ { payment, gateway: { order_id, checkout_url, key } }
```

Then simulate the gateway callback:

```http
POST /api/payments/{payment_id}/confirm
{ "gateway_txn_id": "pay_xxx" }
```

On success the backend automatically:
- Marks payment `success`
- Sets order `payment_status=paid`
- Issues an Invoice (`INV-…`)
- Creates a pending Payout for the vendor
- Notifies the vendor

### Offline (NEFT / RTGS)

```http
POST /api/payments/offline   (multipart)
{ order_id, amount, method=neft|rtgs, utr_number, proof? }

POST /api/payments/{id}/verify    (admin only — same downstream effects)
```

`GET /api/payments` lists payments scoped by role.

---

## 12. Reviews

| Endpoint | Who | Description |
|---|---|---|
| `GET /api/reviews?vendor_id=…` | Public | Vendor's reviews |
| `POST /api/reviews` | Buyer | Body: `{ order_id, rating (1-5), title?, body?, tags? }` |
| `GET /api/reviews/{id}` | Any | Single |
| `POST /api/reviews/{id}/reply` | Vendor | `{ vendor_reply }` |

The backend recomputes the vendor's average rating on submit.

---

## 13. Chat

| Endpoint | Description |
|---|---|
| `GET /api/chat/rooms` | Rooms the user is a party in |
| `POST /api/chat/rooms` | Open/find a room. Body: `{ counterparty_user_id, service_request_id?, order_id? }` |
| `GET /api/chat/rooms/{id}` | Room + latest 50 messages |
| `POST /api/chat/rooms/{id}/messages` (multipart) | `{ type=text|image|file, body?, attachment? }` |
| `POST /api/chat/rooms/{id}/read` | Mark counterparty messages read |

Polling cadence: every 5–10s on the room view; bigger interval on the inbox.

---

## 14. Notifications

| Endpoint | Description |
|---|---|
| `GET /api/notifications?unread=1` | Inbox |
| `GET /api/notifications/unread-count` | `{ count: N }` — call every 30–60s for the bell badge |
| `POST /api/notifications/{id}/read` | Mark single |
| `POST /api/notifications/read-all` | Mark all |
| `DELETE /api/notifications/{id}` | Remove |

Notification `type` examples: `quotation.received`, `quotation.accepted`, `order.started`, `order.completed`, `order.cancelled`, `payment.received`, `chat.message`, `review.new`, `broadcast`, `kyc.update`, `system`.

---

## 15. Subscriptions (vendor self-service)

| Endpoint | Description |
|---|---|
| `GET /api/subscriptions` | History |
| `GET /api/subscriptions/current` | Active sub or null |
| `POST /api/subscriptions` | `{ plan_id, billing_cycle=monthly|yearly }` |
| `POST /api/subscriptions/{id}/cancel` | Cancel |

---

## 16. Admin (role:admin only)

All routes are under `/api/admin/*`, all need `auth:sanctum` + admin role.

```
GET    /api/admin/users               list, ?role= ?status= ?q=
GET    /api/admin/users/{id}          detail
PUT    /api/admin/users/{id}          update
POST   /api/admin/users/{id}/suspend
POST   /api/admin/users/{id}/activate
DELETE /api/admin/users/{id}

GET    /api/admin/vendors             ?status= ?verification_status= ?port_id= ?category_id=
GET    /api/admin/vendors/{id}
POST   /api/admin/vendors/{id}/verify
POST   /api/admin/vendors/{id}/reject     { reason }
POST   /api/admin/vendors/{id}/premium    toggle

GET    /api/admin/kyc?status=pending
POST   /api/admin/kyc/{id}/approve
POST   /api/admin/kyc/{id}/reject         { reason }

GET    /api/admin/requests            list
GET    /api/admin/requests/{id}
POST   /api/admin/requests/{id}/cancel    { reason }

GET    /api/admin/quotations
POST   /api/admin/quotations/{id}/flag

GET    /api/admin/orders
GET    /api/admin/orders/{id}
POST   /api/admin/orders/{id}/complete
POST   /api/admin/orders/{id}/cancel      { reason }

GET    /api/admin/payments
POST   /api/admin/payments/{id}/verify    (offline → success)
POST   /api/admin/payments/{id}/fail      { reason }
GET    /api/admin/payouts
POST   /api/admin/payouts/{id}/process    { utr_number }

GET    /api/admin/disputes
GET    /api/admin/disputes/{id}
POST   /api/admin/disputes/{id}/resolve   { resolution }
POST   /api/admin/disputes/{id}/escalate

GET    /api/admin/broadcasts
POST   /api/admin/broadcasts              { title, body, audience }
POST   /api/admin/broadcasts/{id}/send

GET    /api/admin/analytics               { gmv, revenue, monthly_gmv, ... }
GET    /api/admin/audit

# Catalog CRUD
GET    /api/admin/categories     POST /api/admin/categories     PUT /api/admin/categories/{id}     DELETE /api/admin/categories/{id}
GET    /api/admin/subcategories  POST /api/admin/subcategories  PUT /api/admin/subcategories/{id}  DELETE /api/admin/subcategories/{id}
GET    /api/admin/ports          POST /api/admin/ports          PUT /api/admin/ports/{id}          DELETE /api/admin/ports/{id}
GET    /api/admin/plans          POST /api/admin/plans          PUT /api/admin/plans/{id}          DELETE /api/admin/plans/{id}
GET    /api/admin/commissions    POST /api/admin/commissions    PUT /api/admin/commissions/{id}    DELETE /api/admin/commissions/{id}
```

---

## 17. File uploads

All file fields use multipart/form-data. Storage disk is `public` and files are served from `/storage/<path>`.

Run once per environment:
```bash
php artisan storage:link
```

After this, `KycDocument::file_path = 'kyc/abc.pdf'` is served at `/storage/kyc/abc.pdf`.

---

## 18. Common error handling on the frontend

```js
async function api(path, opts = {}) {
  const r = await fetch(`${API}${path}`, {
    ...opts,
    headers: { 'Accept': 'application/json', 'Authorization': `Bearer ${getToken()}`, ...(opts.headers || {}) },
  });
  const json = await r.json().catch(() => ({}));
  if (r.status === 401) { logout(); throw new ApiError('Unauthorized', json); }
  if (r.status === 403) throw new ApiError('Forbidden', json);
  if (r.status === 422) throw new ApiError(json.message || 'Validation failed', json.errors);
  if (!r.ok)            throw new ApiError(json.message || `HTTP ${r.status}`, json);
  return json.data;
}
```

---

## 19. State-machine cheatsheet

```
ServiceRequest:   open → quoted → awarded → in_progress → completed | cancelled
Quotation:        submitted → accepted | rejected | withdrawn | expired
Order:            placed → confirmed → in_progress → completed | cancelled | disputed
Order.payment:    pending → partially_paid → paid | refunded | failed
Payment:          initiated → pending → processing → success | failed | refunded
Payout:           pending → processing → paid | failed | on_hold
KycDocument:      pending → approved | rejected
Dispute:          open → investigating → resolved | closed | escalated
```

---

## 20. Quick smoke test

```bash
# 1. Server up
php artisan serve

# 2. Login as buyer
curl -X POST -H "Content-Type: application/json" -H "Accept: application/json" \
  -d '{"email":"buyer1@portda.test","password":"password"}' \
  http://127.0.0.1:8000/api/auth/login
# → save .data.token

# 3. Hit dashboard
TOKEN=...                                  # from above
curl -H "Accept: application/json" -H "Authorization: Bearer $TOKEN" \
  http://127.0.0.1:8000/api/dashboard

# 4. Create a service request
curl -X POST -H "Authorization: Bearer $TOKEN" \
  -H "Content-Type: application/json" -H "Accept: application/json" \
  -d '{"port_id":1,"category_id":1,"vessel_name":"MV Test","title":"Test pilotage"}' \
  http://127.0.0.1:8000/api/requests
```

---

## 21. Web routes (server-rendered Blade)

If your frontend is the existing Blade web app, these are the URL→view mappings:

| URL | View |
|---|---|
| `/` | Marketing homepage |
| `/login`, `/signup` | Buyer/vendor auth |
| `/admin/login` | Admin auth |
| `/buyer/dashboard` … `/buyer/profile` | Buyer web app (auth + role:buyer) |
| `/vendor/dashboard` … `/vendor/profile` | Vendor web app (auth + role:vendor) |
| `/admin/dashboard` … `/admin/audit` | Admin console (auth + role:admin) |
| `/mobile/buyer/01-onboarding` … | Mobile-mockup previews |

The buyer/vendor/admin dashboards already pull live numbers via the API DashboardController.

---

## 22. Environment variables

Minimum `.env`:

```
APP_NAME=PORTDA
APP_URL=http://127.0.0.1:8000
APP_DEBUG=true

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portda_web
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
CACHE_STORE=file

SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1
FILESYSTEM_DISK=public
```

After cloning:
```bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

That's it — both the web app and the mobile app talk to the same backend.
