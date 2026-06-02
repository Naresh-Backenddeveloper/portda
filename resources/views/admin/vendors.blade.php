<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Vendors · PORTDA Admin</title>
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
    <div class="page-header">
      <div class="page-title"><h1>Vendor Management</h1><p>All marine service vendors on PORTDA · approve, suspend, edit, drill into activity.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export CSV</button><button class="btn btn-primary">+ Add Vendor</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Total Vendors</div><div class="kpi-value">1,247</div><div class="kpi-delta up">▲ 38 this month</div></div>
      <div class="kpi"><div class="kpi-label">Subscription</div><div class="kpi-value">312</div><div class="kpi-delta up">25% adoption</div></div>
      <div class="kpi"><div class="kpi-label">Commission</div><div class="kpi-value">935</div></div>
      <div class="kpi"><div class="kpi-label">Suspended / Inactive</div><div class="kpi-value">42</div><div class="kpi-delta down">▼ 4 vs last month</div></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All categories</option><option>Ship Agents</option><option>Stevedores / Cargo Handling</option><option>Ship Management</option><option>Ship Repairs</option><option>Ship Chandlers</option><option>Bunkering</option><option>Multi Modal Transportation</option><option>Storage / Warehousing</option><option>Legal / Lawyers</option><option>Insurance</option></select>
      <select><option>All ports</option><option>JNPT</option><option>Mumbai</option><option>Mundra</option><option>Hazira</option><option>Cochin</option></select>
      <select><option>All plans</option><option>Commission</option><option>Starter</option><option>Pro</option><option>Elite</option></select>
      <select><option>All statuses</option><option>Active</option><option>KYC pending</option><option>Suspended</option><option>Inactive</option></select>
      <select><option>Rating · any</option><option>★ 4.5+</option><option>★ 4.0+</option><option>Below 4.0</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="Search vendor, GSTIN, contact…" style="min-width:240px;" />
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (1,247)</a><a href="#">KYC pending (14)</a><a href="#">Pro/Elite (231)</a><a href="#">Top performers</a><a href="#">Suspended (42)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th><input type="checkbox" /></th><th>Vendor</th><th>Categories</th><th>Ports</th><th>Plan</th><th>Rating</th><th>Lifetime GMV</th><th>Status</th><th>Joined</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $v)
            @php $vp = $v->vendorProfile; @endphp
            <tr>
              <td><strong>{{ $vp->company_name ?? $v->name }}</strong><div class="muted" style="font-size:12px;">{{ $v->email }}</div></td>
              <td>{{ $vp ? $vp->categories->pluck('name')->take(3)->join(', ') : '—' }}</td>
              <td>{{ $vp ? $vp->ports->pluck('code')->take(4)->join(', ') : '—' }}</td>
              <td>★ {{ number_format(optional($vp)->rating ?? 0, 1) }}<div class="muted" style="font-size:12px;">{{ optional($vp)->rating_count }} reviews</div></td>
              <td>{{ optional($vp)->jobs_completed ?? 0 }}</td>
              <td>
                <span class="chip @if(optional($vp)->verification_status==='verified') chip-success @elseif(optional($vp)->verification_status==='rejected') chip-danger @else chip-warning @endif">
                  {{ ucfirst(optional($vp)->verification_status ?? 'unverified') }}
                </span>
                @if (optional($vp)->is_premium) <span class="chip chip-warning">Premium</span> @endif
              </td>
              <td class="t-actions">
                <a class="btn btn-sm btn-outline" href="/admin/vendors/{{ $v->id }}">View</a>
                @if (optional($vp)->verification_status !== 'verified')
                  <form method="POST" action="/admin/vendors/{{ $v->id }}/verify" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Verify</button></form>
                @endif
                <form method="POST" action="/admin/vendors/{{ $v->id }}/premium" style="display:inline;">@csrf<button class="btn btn-sm btn-outline">{{ optional($vp)->is_premium ? 'Unset Premium' : 'Make Premium' }}</button></form>
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No vendors found.</td></tr>
          @endforelse
        </tbody>
      </table>
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-top:1px solid var(--border-2);font-size:13px;color:var(--text-2);">
        <span>Showing 1–8 of <strong>1,247</strong> vendors</span>
        <div style="display:flex;gap:6px;"><button class="btn btn-sm btn-outline">‹</button><button class="btn btn-sm btn-primary">1</button><button class="btn btn-sm btn-outline">2</button><button class="btn btn-sm btn-outline">3</button><button class="btn btn-sm btn-outline">…</button><button class="btn btn-sm btn-outline">156</button><button class="btn btn-sm btn-outline">›</button></div>
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('vendors', 'Search vendors, GSTIN, ports…');</script>
</body>
</html>
