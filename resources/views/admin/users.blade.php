<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Buyers · PORTDA Admin</title>
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
      <div class="page-title"><h1>Buyer Management</h1><p>Ship-agents, charterers and shipping companies registered on PORTDA.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export CSV</button><button class="btn btn-primary">+ Add Buyer</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Total Buyers</div><div class="kpi-value">428</div><div class="kpi-delta up">▲ 12 this month</div></div>
      <div class="kpi"><div class="kpi-label">Active (90d)</div><div class="kpi-value">382</div><div class="kpi-delta up">89% engagement</div></div>
      <div class="kpi"><div class="kpi-label">Avg Spend / Buyer</div><div class="kpi-value">₹14.5 L</div><div class="kpi-delta">FY 26–27</div></div>
      <div class="kpi"><div class="kpi-label">Dormant (&gt; 90d)</div><div class="kpi-value">46</div><div class="kpi-delta down">re-engage</div></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All entity types</option><option>Pvt Ltd</option><option>LLP</option><option>Proprietorship</option><option>Foreign-flag agent</option></select>
      <select><option>All ports of call</option><option>JNPT</option><option>Mumbai</option><option>Mundra</option><option>Hazira</option></select>
      <select><option>All statuses</option><option>Active</option><option>KYC pending</option><option>Suspended</option><option>Dormant</option></select>
      <select><option>FY Spend · any</option><option>≥ ₹1 Cr</option><option>₹50 L – 1 Cr</option><option>₹10 – 50 L</option><option>&lt; ₹10 L</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="Search company, GSTIN, contact…" style="min-width:240px;" />
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (428)</a><a href="#">Top 50 spenders</a><a href="#">New this month (12)</a><a href="#">Dormant (46)</a><a href="#">KYC pending (8)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th><input type="checkbox" /></th><th>Buyer</th><th>Entity</th><th>Vessels</th><th>Ports of call</th><th>Orders (12m)</th><th>FY Spend</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $u)
            <tr>
              <td><strong>{{ $u->name }}</strong><div class="muted" style="font-size:12px;">{{ $u->email }}</div></td>
              <td><span class="chip @if($u->role==='admin') chip-warning @elseif($u->role==='vendor') chip-primary @else chip-success @endif">{{ ucfirst($u->role) }}</span></td>
              <td>{{ optional($u->buyerProfile)->company_name ?? optional($u->vendorProfile)->company_name ?? '—' }}</td>
              <td>{{ $u->phone ?: '—' }}</td>
              <td><span class="chip @if($u->status==='active') chip-success @elseif($u->status==='suspended') chip-danger @else chip-warning @endif">{{ ucfirst($u->status) }}</span></td>
              <td>{{ $u->created_at->format('d M Y') }}</td>
              <td class="t-actions">
                @if ($u->role==='vendor')
                  <a class="btn btn-sm btn-outline" href="/admin/vendors/{{ $u->id }}">View</a>
                @else
                  <a class="btn btn-sm btn-outline" href="/admin/users/{{ $u->id }}">View</a>
                @endif
                @if ($u->status==='active')
                  <form method="POST" action="/admin/users/{{ $u->id }}/suspend" style="display:inline;">@csrf<button class="btn btn-sm btn-danger">Suspend</button></form>
                @else
                  <form method="POST" action="/admin/users/{{ $u->id }}/activate" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Activate</button></form>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No users found.</td></tr>
          @endforelse
        </tbody>
      </table>
      <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-top:1px solid var(--border-2);font-size:13px;color:var(--text-2);">
        <span>Showing 1–7 of <strong>428</strong> buyers</span>
        <div style="display:flex;gap:6px;"><button class="btn btn-sm btn-outline">‹</button><button class="btn btn-sm btn-primary">1</button><button class="btn btn-sm btn-outline">2</button><button class="btn btn-sm btn-outline">3</button><button class="btn btn-sm btn-outline">…</button><button class="btn btn-sm btn-outline">62</button><button class="btn btn-sm btn-outline">›</button></div>
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('users', 'Search buyers, GSTIN, vessels…');</script>
</body>
</html>
