<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Orders · PORTDA Admin</title>
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
      <div class="page-title"><h1>All Orders</h1><p>Confirmed marketplace orders across all vendors &amp; buyers.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export CSV</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Active</div><div class="kpi-value">218</div><div class="kpi-delta">across 142 buyers</div></div>
      <div class="kpi"><div class="kpi-label">Completed MTD</div><div class="kpi-value">1,706</div><div class="kpi-delta up">▲ 14%</div></div>
      <div class="kpi"><div class="kpi-label">GMV MTD</div><div class="kpi-value">₹6.2 Cr</div><div class="kpi-delta up">▲ 14%</div></div>
      <div class="kpi"><div class="kpi-label">Avg order value</div><div class="kpi-value">₹1.82 L</div></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All vendors</option><option>Mumbai Marine</option><option>Coastal Bunkers</option><option>Port Stevedoring</option></select>
      <select><option>All categories</option><option>Ship Agents</option><option>Stevedores / Cargo Handling</option><option>Ship Management</option><option>Ship Repairs</option><option>Ship Chandlers</option><option>Bunkering</option><option>Multi Modal Transportation</option><option>Storage / Warehousing</option><option>Legal / Lawyers</option><option>Insurance</option></select>
      <select><option>All statuses</option><option>Scheduled</option><option>In Progress</option><option>Completed</option><option>Cancelled</option><option>Disputed</option></select>
      <select><option>Date · last 30d</option><option>Today</option><option>This week</option><option>This month</option><option>This FY</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="#PORT-…" style="min-width:200px;" />
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (1,924)</a><a href="#">Active (218)</a><a href="#">Completed (1,706)</a><a href="#">Disputed (6)</a><a href="#">Cancelled (15)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Order #</th><th>Buyer</th><th>Vendor</th><th>Category · Port</th><th>Value</th><th>Commission</th><th>Milestone</th><th>Status</th><th>Date</th></tr></thead>
        <tbody>
          @forelse ($items as $o)
            <tr>
              <td><strong>#{{ $o->reference }}</strong></td>
              <td>{{ $o->buyer->name ?? '—' }}</td>
              <td>{{ $o->vendor->name ?? '—' }}</td>
              <td>{{ $o->serviceRequest->title ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($o->total) }}</td>
              <td><span class="chip @if($o->status==='completed') chip-success @elseif($o->status==='cancelled') chip-gray @elseif($o->status==='in_progress') chip-warning @else chip-primary @endif">{{ str_replace('_',' ', ucfirst($o->status)) }}</span></td>
              <td><span class="chip @if($o->payment_status==='paid') chip-success @else chip-warning @endif">{{ ucfirst($o->payment_status) }}</span></td>
              <td>{{ $o->created_at->format('d M') }}</td>
              <td class="t-actions"><a class="btn btn-sm btn-outline" href="/admin/orders/{{ $o->id }}">Open</a></td>
            </tr>
          @empty
            <tr><td colspan="9" class="muted" style="text-align:center;padding:24px;">No orders.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('orders');</script>
</body>
</html>
