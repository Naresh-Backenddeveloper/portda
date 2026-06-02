<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mumbai Marine · Vendor · PORTDA Admin</title>
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
    @php $vp = $user->vendorProfile; @endphp
    <div class="page-header">
      <div class="page-title">
        <div class="muted" style="font-size:12px;letter-spacing:.5px;margin-bottom:4px;"><a href="/admin/vendors" style="color:var(--text-2);">Vendors</a> / <strong style="color:var(--text);">Vendor detail</strong></div>
        <h1>{{ $vp->company_name ?? $user->name }}</h1>
        <p>{{ $user->email }}{{ $user->phone ? ' · '.$user->phone : '' }} · joined {{ $user->created_at->format('d M Y') }}</p>
      </div>
      <div class="page-actions">
        @if (optional($vp)->verification_status !== 'verified')
          <form method="POST" action="/admin/vendors/{{ $user->id }}/verify" style="display:inline;">@csrf<button class="btn btn-primary">Verify vendor</button></form>
        @endif
        <form method="POST" action="/admin/vendors/{{ $user->id }}/reject" style="display:inline;">
          @csrf<input type="hidden" name="reason" value="Did not meet standards." />
          <button class="btn btn-outline">Reject</button>
        </form>
        <form method="POST" action="/admin/vendors/{{ $user->id }}/premium" style="display:inline;">@csrf<button class="btn btn-outline">{{ optional($vp)->is_premium ? 'Unset Premium' : 'Make Premium' }}</button></form>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Verification</div><div class="kpi-value">{{ ucfirst(optional($vp)->verification_status ?? 'unverified') }}</div></div>
      <div class="kpi"><div class="kpi-label">Rating</div><div class="kpi-value">★ {{ number_format(optional($vp)->rating ?? 0, 1) }}</div><div class="kpi-delta">{{ optional($vp)->rating_count ?? 0 }} reviews</div></div>
      <div class="kpi"><div class="kpi-label">Jobs done</div><div class="kpi-value">{{ optional($vp)->jobs_completed ?? 0 }}</div></div>
      <div class="kpi"><div class="kpi-label">Premium</div><div class="kpi-value">{{ optional($vp)->is_premium ? 'Yes' : 'No' }}</div></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>Company info</h3></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Company name</span><strong>{{ optional($vp)->company_name ?? '—' }}</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">GSTIN</span><span>{{ optional($vp)->gst_number ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">PAN</span><span>{{ optional($vp)->pan_number ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">City</span><span>{{ optional($vp)->city ?: '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">State</span><span>{{ optional($vp)->state ?: '—' }}</span></div>
        @if (optional($vp)->bio)<div style="padding:8px 0;"><span class="muted">Bio</span><div style="margin-top:6px;">{{ $vp->bio }}</div></div>@endif
      </div>
      <div class="card">
        <div class="card-head"><h3>Categories &amp; ports</h3></div>
        <div style="margin-bottom:10px;">
          <div class="muted" style="font-size:12px;margin-bottom:4px;">Categories</div>
          @forelse ($vp->categories ?? [] as $c)<span class="chip">{{ $c->name }}</span>@empty<span class="muted">— none —</span>@endforelse
        </div>
        <div>
          <div class="muted" style="font-size:12px;margin-bottom:4px;">Ports</div>
          @forelse ($vp->ports ?? [] as $p)<span class="chip">{{ $p->code }}</span>@empty<span class="muted">— none —</span>@endforelse
        </div>
        <div class="divider"></div>
        <div class="muted" style="font-size:12px;margin-bottom:4px;">KYC documents</div>
        @forelse ($user->kycDocuments as $k)
          <div class="row-between" style="padding:6px 0;border-bottom:1px solid var(--border-2);">
            <span><strong>{{ strtoupper($k->doc_type) }}</strong> <span class="muted" style="font-size:12px;">{{ $k->doc_number }}</span></span>
            <span class="chip @if($k->status==='approved') chip-success @elseif($k->status==='rejected') chip-danger @else chip-warning @endif">{{ ucfirst($k->status) }}</span>
          </div>
        @empty
          <div class="muted" style="padding:8px 0;">No documents yet.</div>
        @endforelse
      </div>
    </div>

    <div class="table-wrap">
      <div class="table-head"><h3>Recent orders won</h3></div>
      <table class="t t-compact">
        <thead><tr><th>Reference</th><th>Buyer</th><th>Total</th><th>Status</th><th>Payment</th><th>Date</th></tr></thead>
        <tbody>
          @forelse ($user->vendorOrders as $o)
            <tr>
              <td><a class="link" href="/admin/orders/{{ $o->id }}">#{{ $o->reference }}</a></td>
              <td>{{ $o->buyer->name ?? '—' }}</td>
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
<script>AdminShell.mount('vendors');</script>
</body>
</html>
