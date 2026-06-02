<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Analytics · PORTDA Admin</title>
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
      <div class="page-title"><h1>Analytics &amp; Reports</h1><p>Deep dive on GMV, take-rate, cohorts, retention, port-level performance.</p></div>
      <div class="page-actions">
        <select class="form-select" style="width:auto;"><option>Last 30 days</option><option>This FY</option><option>Last quarter</option><option>YTD</option><option>Custom range…</option></select>
        <button class="btn btn-outline">Export PDF</button>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">GMV</div><div class="kpi-value">₹{{ number_format(($stats['gmv'] ?? 0) / 10000000, 2) }} Cr</div><div class="kpi-delta up">live</div></div>
      <div class="kpi"><div class="kpi-label">Commission revenue</div><div class="kpi-value">₹{{ number_format(($stats['revenue'] ?? 0) / 100000, 1) }} L</div><div class="kpi-delta up">across orders</div></div>
      <div class="kpi"><div class="kpi-label">Orders</div><div class="kpi-value">{{ array_sum((array) ($stats['orders_by_status'] ?? [])) }}</div><div class="kpi-delta up">{{ ($stats['orders_by_status']['completed'] ?? 0) }} completed</div></div>
      <div class="kpi"><div class="kpi-label">Pending</div><div class="kpi-value">{{ ($stats['pending_kyc'] ?? 0) + ($stats['pending_disputes'] ?? 0) }}</div><div class="kpi-delta">{{ $stats['pending_kyc'] ?? 0 }} KYC · {{ $stats['pending_disputes'] ?? 0 }} disputes</div></div>
    </div>

    @php
      $monthly  = collect($stats['monthly_gmv'] ?? []);
      $maxMonth = (float) max(1, $monthly->max('gmv'));
      $methodsTotals = collect($stats['payments_by_method'] ?? []);
      $allMethodsTotal = (float) max(1, $methodsTotals->sum('total'));
      $statuses = collect($stats['orders_by_status'] ?? []);
    @endphp

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>GMV · monthly trend (paid orders)</h3></div>
        @if ($monthly->count())
          <div style="display:flex;align-items:flex-end;gap:8px;height:180px;margin-top:8px;">
            @foreach ($monthly as $m)
              <div style="flex:1;background:var(--admin-purple);height:{{ max(6, ($m->gmv / $maxMonth) * 100) }}%;border-radius:6px;" title="₹{{ number_format($m->gmv) }}"></div>
            @endforeach
          </div>
          <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--text-3);margin-top:6px;">
            @foreach ($monthly as $m)<span>{{ substr($m->month, 5) }}</span>@endforeach
          </div>
        @else
          <div class="muted" style="text-align:center;padding:32px;">No paid orders yet — chart will populate after the first paid order.</div>
        @endif
      </div>
      <div class="card">
        <div class="card-head"><h3>Payments by method</h3></div>
        @forelse ($methodsTotals as $m)
          @php $pct = ((float) $m->total / $allMethodsTotal) * 100; @endphp
          <div class="row-between mb-12"><span>{{ strtoupper($m->method) }}</span><strong>₹{{ number_format($m->total) }} · {{ number_format($pct, 1) }}% ({{ $m->c }} txn)</strong></div>
          <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;margin-bottom:14px;"><div style="background:var(--admin-purple);height:100%;width:{{ $pct }}%;"></div></div>
        @empty
          <div class="muted">No payments yet.</div>
        @endforelse
      </div>
    </div>

    <div class="grid-3 mb-20">
      <div class="card">
        <div class="card-head"><h3>Users by role</h3></div>
        @foreach ((array) ($stats['users_by_role'] ?? []) as $role => $c)
          <div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span>{{ ucfirst($role) }}</span><strong>{{ $c }}</strong></div>
        @endforeach
      </div>

      <div class="card">
        <div class="card-head"><h3>Orders by status</h3></div>
        @forelse ($statuses as $status => $c)
          <div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">{{ str_replace('_',' ', ucfirst($status)) }}</span><strong>{{ $c }}</strong></div>
        @empty
          <div class="muted">No orders yet.</div>
        @endforelse
      </div>

      <div class="card">
        <div class="card-head"><h3>Open workload</h3></div>
        <div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">KYC pending</span><strong>{{ $stats['pending_kyc'] ?? 0 }}</strong></div>
        <div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Disputes open</span><strong>{{ $stats['pending_disputes'] ?? 0 }}</strong></div>
        <div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Commission earned</span><strong>₹{{ number_format($stats['revenue'] ?? 0) }}</strong></div>
        <div class="row-between" style="font-size:13px;padding:6px 0;"><span class="muted">Total GMV</span><strong>₹{{ number_format($stats['gmv'] ?? 0) }}</strong></div>
      </div>
    </div>

    <div class="table-wrap">
      <div class="table-head"><h3>Saved reports</h3><button class="btn btn-sm btn-outline">+ New report</button></div>
      <table class="t t-compact">
        <thead><tr><th>Report</th><th>Owner</th><th>Schedule</th><th>Last run</th><th>Format</th><th></th></tr></thead>
        <tbody>
          <tr><td><strong>Weekly executive summary</strong></td><td>Aanya Sharma</td><td>Mondays 09:00</td><td>13 May</td><td>PDF + email</td><td><button class="btn btn-sm btn-outline">Run</button></td></tr>
          <tr><td><strong>FY GST · GSTR-2A reconciliation</strong></td><td>Neha Singh</td><td>Monthly · 1st</td><td>01 May</td><td>CSV</td><td><button class="btn btn-sm btn-outline">Run</button></td></tr>
          <tr><td><strong>Port-wise GMV breakdown</strong></td><td>Vikram Kapoor</td><td>Manual</td><td>10 May</td><td>XLS</td><td><button class="btn btn-sm btn-outline">Run</button></td></tr>
          <tr><td><strong>Cohort retention (vendors)</strong></td><td>Aanya Sharma</td><td>Quarterly</td><td>01 Apr</td><td>PDF</td><td><button class="btn btn-sm btn-outline">Run</button></td></tr>
          <tr><td><strong>KYC TAT &amp; SLA breaches</strong></td><td>Priya Goenka</td><td>Weekly · Fri</td><td>10 May</td><td>CSV + email</td><td><button class="btn btn-sm btn-outline">Run</button></td></tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('analytics');</script>
</body>
</html>
