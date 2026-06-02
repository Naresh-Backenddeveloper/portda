<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Disputes · PORTDA Admin</title>
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
      <div class="page-title"><h1>Disputes &amp; Support</h1><p>Refund requests, short-delivery claims, service complaints — escalations from both sides.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Bulk export</button><button class="btn btn-primary">+ Open new case</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Open</div><div class="kpi-value">6</div><div class="kpi-delta down">3 SLA-breach</div></div>
      <div class="kpi"><div class="kpi-label">In mediation</div><div class="kpi-value">11</div></div>
      <div class="kpi"><div class="kpi-label">Resolved MTD</div><div class="kpi-value">38</div><div class="kpi-delta up">avg TAT 18 hrs</div></div>
      <div class="kpi"><div class="kpi-label">Refunded MTD</div><div class="kpi-value">₹4.8 L</div><div class="kpi-delta">across 12 cases</div></div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">Open (6)</a><a href="#">In mediation (11)</a><a href="#">Awaiting buyer (4)</a><a href="#">Awaiting vendor (2)</a><a href="#">Resolved (412)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Case #</th><th>Order</th><th>Buyer</th><th>Vendor</th><th>Issue</th><th>Amount</th><th>Opened</th><th>SLA</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $d)
            <tr>
              <td><strong>{{ $d->reference }}</strong></td>
              <td>#{{ $d->order->reference ?? '—' }}</td>
              <td>{{ $d->raiser->name ?? '—' }}<div class="muted" style="font-size:12px;">vs {{ $d->against }}</div></td>
              <td>{{ $d->subject }}</td>
              <td><span class="chip @if($d->status==='resolved') chip-success @elseif($d->status==='escalated') chip-danger @else chip-warning @endif">{{ ucfirst($d->status) }}</span></td>
              <td>{{ $d->created_at->format('d M') }}</td>
              <td class="t-actions">
                @if ($d->status === 'open' || $d->status === 'investigating')
                  <form method="POST" action="/admin/disputes/{{ $d->id }}/resolve" style="display:inline;">
                    @csrf
                    <input type="text" name="resolution" placeholder="resolution note" style="width:140px;font-size:11px;" required />
                    <button class="btn btn-sm btn-primary">Resolve</button>
                  </form>
                  <form method="POST" action="/admin/disputes/{{ $d->id }}/escalate" style="display:inline;">@csrf<button class="btn btn-sm btn-danger">Escalate</button></form>
                @else
                  <span class="muted">closed</span>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No disputes.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card mt-20">
      <div class="card-head"><h3>Case #DSP-2418 — short-delivery, ₹84,000</h3><span class="chip chip-danger">Open · 4h</span></div>
      <div class="grid-2">
        <div>
          <div class="muted" style="font-size:12px;font-weight:700;letter-spacing:.5px;margin-bottom:6px;">TIMELINE</div>
          <div class="activity-item"><div class="activity-icon" style="background:var(--primary-light);color:var(--primary);">1</div><div class="activity-body"><div class="activity-title">Buyer opened case <time>4h ago</time></div><div class="activity-sub">Saffron Fleet · "Received 338 MT, paid for 350 MT"</div></div></div>
          <div class="activity-item"><div class="activity-icon" style="background:var(--bg);color:var(--text-2);">2</div><div class="activity-body"><div class="activity-title">PORTDA assigned mediator <time>3h ago</time></div><div class="activity-sub">Rohit Mehta · Support team</div></div></div>
          <div class="activity-item"><div class="activity-icon" style="background:var(--warning-light);color:var(--warning);">3</div><div class="activity-body"><div class="activity-title">Vendor responded <time>1h ago</time></div><div class="activity-sub">Coastal Bunkers · "Delivery slips show 350 MT; awaiting BDN audit"</div></div></div>
        </div>
        <div>
          <div class="muted" style="font-size:12px;font-weight:700;letter-spacing:.5px;margin-bottom:6px;">RESOLUTION ACTIONS</div>
          <button class="btn btn-success btn-block mb-12">Refund to buyer · ₹84,000</button>
          <button class="btn btn-outline btn-block mb-12">Partial refund · ₹42,000 (50/50)</button>
          <button class="btn btn-outline btn-block mb-12">Close · vendor not at fault</button>
          <button class="btn btn-ghost btn-block mb-12">Request BDN audit from port authority</button>
          <button class="btn btn-ghost btn-block">Escalate to Super Admin</button>
        </div>
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('disputes');</script>
</body>
</html>
