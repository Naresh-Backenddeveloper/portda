<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>OceanLink · Buyer · PORTDA Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<link rel="stylesheet" href="/app/admin/admin.css" />
</head>
<body>
<div class="app-shell admin">
  <div id="admin-shell"></div>
  <main class="main">
    @php $bp = $user->buyerProfile; @endphp
    <div class="page-header">
      <div class="page-title">
        <div class="muted" style="font-size:12px;letter-spacing:.5px;margin-bottom:4px;"><a href="/admin/users" style="color:var(--text-2);">Users</a> / <strong style="color:var(--text);">Buyer detail</strong></div>
        <h1>{{ $bp->company_name ?? $user->name }}</h1>
        <p>{{ $user->email }}{{ $user->phone ? ' · '.$user->phone : '' }} · joined {{ $user->created_at->format('d M Y') }}</p>
      </div>
      <div class="page-actions">
        @if ($user->status==='active')
          <form method="POST" action="/admin/users/{{ $user->id }}/suspend" style="display:inline;">@csrf<button class="btn btn-danger">Suspend</button></form>
        @else
          <form method="POST" action="/admin/users/{{ $user->id }}/activate" style="display:inline;">@csrf<button class="btn btn-primary">Activate</button></form>
        @endif
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Status</div><div class="kpi-value">{{ ucfirst($user->status) }}</div></div>
      <div class="kpi"><div class="kpi-label">Default port</div><div class="kpi-value">{{ optional($bp?->defaultPort)->code ?? '—' }}</div></div>
      <div class="kpi"><div class="kpi-label">KYC docs</div><div class="kpi-value">{{ $user->kycDocuments->count() }}</div></div>
      <div class="kpi"><div class="kpi-label">Orders</div><div class="kpi-value">{{ $user->buyerOrders->count() }}</div></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>Company info</h3></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Company name</span><strong>{{ optional($bp)->company_name ?? '—' }}</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">IMO</span><span>{{ optional($bp)->imo_number ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">GSTIN</span><span>{{ optional($bp)->gst_number ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">City</span><span>{{ optional($bp)->city ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">State</span><span>{{ optional($bp)->state ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;"><span class="muted">Email</span><span>{{ $user->email }}</span></div>
      </div>
      <div class="card">
        <div class="card-head"><h3>KYC documents</h3></div>
        @forelse ($user->kycDocuments as $k)
          <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);">
            <span>
              <strong>{{ strtoupper($k->doc_type) }}</strong>
              <span class="muted" style="font-size:12px;">{{ $k->doc_number ?: '—' }}</span>
            </span>
            <span class="chip @if($k->status==='approved') chip-success @elseif($k->status==='rejected') chip-danger @else chip-warning @endif">{{ ucfirst($k->status) }}</span>
          </div>
        @empty
          <div class="muted" style="padding:12px 0;">No KYC documents submitted.</div>
        @endforelse
      </div>
    </div>

    <div class="table-wrap">
      <div class="table-head"><h3>Recent orders</h3><a class="link" href="/admin/orders?buyer={{ $user->id }}">All orders →</a></div>
      <table class="t t-compact">
        <thead><tr><th>Reference</th><th>Vendor</th><th>Total</th><th>Status</th><th>Payment</th><th>Date</th></tr></thead>
        <tbody>
          @forelse ($user->buyerOrders as $o)
            <tr>
              <td><a class="link" href="/admin/orders/{{ $o->id }}">#{{ $o->reference }}</a></td>
              <td>{{ $o->vendor->name ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($o->total) }}</td>
              <td><span class="chip @if($o->status==='completed') chip-success @elseif($o->status==='cancelled') chip-gray @else chip-warning @endif">{{ str_replace('_',' ', ucfirst($o->status)) }}</span></td>
              <td><span class="chip @if($o->payment_status==='paid') chip-success @else chip-warning @endif">{{ ucfirst($o->payment_status) }}</span></td>
              <td>{{ $o->created_at->format('d M Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="6" class="muted" style="text-align:center;padding:24px;">No orders yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('users');</script>
</body>
</html>
