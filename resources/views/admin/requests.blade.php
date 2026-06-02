<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Requests · PORTDA Admin</title>
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
      <div class="page-title"><h1>All Requests</h1><p>Every service request posted on PORTDA — open, quoting, awarded, expired.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export CSV</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Open</div><div class="kpi-value">87</div><div class="kpi-delta">avg SLA 4.2 h</div></div>
      <div class="kpi"><div class="kpi-label">Posted MTD</div><div class="kpi-value">2,418</div><div class="kpi-delta up">▲ 14% vs Apr</div></div>
      <div class="kpi"><div class="kpi-label">Awarded MTD</div><div class="kpi-value">1,924</div><div class="kpi-delta up">79.5% conv.</div></div>
      <div class="kpi"><div class="kpi-label">Median quotes / req</div><div class="kpi-value">3.6</div></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All categories</option><option>Ship Agents</option><option>Stevedores / Cargo Handling</option><option>Ship Management</option><option>Ship Repairs</option><option>Ship Chandlers</option><option>Bunkering</option><option>Multi Modal Transportation</option><option>Storage / Warehousing</option><option>Legal / Lawyers</option><option>Insurance</option></select>
      <select><option>All ports</option><option>JNPT</option><option>Mumbai</option><option>Mundra</option><option>Hazira</option></select>
      <select><option>All statuses</option><option>Open</option><option>Quoting</option><option>Awarded</option><option>Closed</option><option>Cancelled</option><option>Expired</option></select>
      <select><option>Urgency · any</option><option>Critical &lt; 2h</option><option>Urgent &lt; 6h</option><option>Standard</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="#PORT-… or buyer name" style="min-width:240px;" />
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (2,418)</a><a href="#">Open (87)</a><a href="#">Quoting (164)</a><a href="#">Awarded (1,924)</a><a href="#">Closed (218)</a><a href="#">Cancelled / Expired (25)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Request #</th><th>Buyer</th><th>Vessel</th><th>Category · Port</th><th>Budget</th><th>Quotes</th><th>Status</th><th>Posted</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $r)
            <tr>
              <td><strong>#{{ $r->reference }}</strong><div class="muted" style="font-size:12px;">{{ $r->created_at->diffForHumans() }}</div></td>
              <td>{{ $r->buyer->name ?? '—' }}</td>
              <td>{{ $r->category->name ?? '—' }}<div class="muted" style="font-size:12px;">{{ optional($r->port)->name }}</div></td>
              <td>{{ $r->vessel_name }}</td>
              <td><strong>{{ $r->quotations_count }}</strong></td>
              <td>{{ $r->budget_max ? '₹'.number_format($r->budget_max) : '—' }}</td>
              <td>
                <span class="chip @if($r->status==='open') chip-primary @elseif(in_array($r->status,['awarded','completed'])) chip-success @elseif($r->status==='cancelled') chip-gray @else chip-warning @endif">{{ ucfirst($r->status) }}</span>
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No requests.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('requests');</script>
</body>
</html>
