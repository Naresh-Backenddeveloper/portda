<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Subscriptions · PORTDA Admin</title>
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
      <div class="page-title"><h1>Subscriptions</h1><p>Subscription is mandatory for every vendor — without an active plan they can't view leads. Tracking renewal, churn, MRR.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Renewal report</button><button class="btn btn-primary">+ Manual subscription</button></div>
    </div>

    <div class="card mb-20" style="background:linear-gradient(90deg,rgba(124,58,237,.06),#fff 60%);border:1.5px solid var(--admin-purple-light);">
      <div class="row" style="gap:14px;align-items:center;">
        <div style="width:42px;height:42px;background:var(--admin-purple-light);color:var(--admin-purple);border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div class="flex-1">
          <strong style="font-size:14px;">PORTDA revenue model</strong>
          <div class="muted" style="font-size:13px;margin-top:2px;line-height:1.5;"><strong>Subscription</strong> (Starter / Pro / Elite) unlocks lead access — required for every active vendor. <strong>5% commission</strong> is charged on top, on every confirmed order. Both revenue streams apply to all 1,247 active vendors.</div>
        </div>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Active subscribers</div><div class="kpi-value">312</div><div class="kpi-delta up">▲ 18 this month</div></div>
      <div class="kpi"><div class="kpi-label">MRR</div><div class="kpi-value">₹22.8 L</div><div class="kpi-delta up">▲ 14%</div></div>
      <div class="kpi"><div class="kpi-label">Renewal rate</div><div class="kpi-value">94.2%</div><div class="kpi-delta up">▲ 2pts</div></div>
      <div class="kpi"><div class="kpi-label">Churned (90d)</div><div class="kpi-value">18</div><div class="kpi-delta down">recoverable</div></div>
    </div>

    <div class="grid-3 mb-20">
      <div class="card">
        <div class="card-head"><h3>Plan distribution</h3></div>
        <div class="row-between mb-12"><div><strong style="color:var(--admin-purple);">Pro</strong> · ₹12,999/qtr</div><strong>189 (61%)</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;margin-bottom:14px;"><div style="background:var(--admin-purple);height:100%;width:61%;"></div></div>
        <div class="row-between mb-12"><div><strong style="color:var(--accent);">Elite</strong> · ₹29,999/qtr</div><strong>42 (13%)</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;margin-bottom:14px;"><div style="background:var(--accent);height:100%;width:13%;"></div></div>
        <div class="row-between mb-12"><div><strong>Starter</strong> · ₹4,999/qtr</div><strong>81 (26%)</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;"><div style="background:var(--success);height:100%;width:26%;"></div></div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Billing cycles</h3></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;border-bottom:1px solid var(--border-2);"><span>Quarterly</span><strong>248 (79%)</strong></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;border-bottom:1px solid var(--border-2);"><span>Yearly (−20%)</span><strong>52 (17%)</strong></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;"><span>Monthly</span><strong>12 (4%)</strong></div>
        <div class="divider"></div>
        <div class="muted" style="font-size:12px;">Yearly subs have <strong>3.2× lower</strong> churn than monthly.</div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Upcoming renewals · 30 days</h3></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;border-bottom:1px solid var(--border-2);"><span>This week</span><strong>22 renewals · ₹2.8 L</strong></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;border-bottom:1px solid var(--border-2);"><span>Next week</span><strong>34 renewals · ₹4.2 L</strong></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;border-bottom:1px solid var(--border-2);"><span>Week 3</span><strong>28 renewals · ₹3.6 L</strong></div>
        <div class="row-between" style="font-size:14px;padding:8px 0;"><span>Week 4</span><strong>31 renewals · ₹3.9 L</strong></div>
      </div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">Active (312)</a><a href="#">Renewing this week (22)</a><a href="#">Churned (18)</a><a href="#">Past Due (4)</a><a href="#">Cancelled (62)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Vendor</th><th>Plan</th><th>Cycle</th><th>Started</th><th>Next renewal</th><th>MRR</th><th>Auto-renew</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $s)
            <tr>
              <td>{{ $s->user->name ?? '—' }}<div class="muted" style="font-size:12px;">{{ $s->user->email ?? '' }}</div></td>
              <td>{{ $s->plan->name ?? '—' }}</td>
              <td>{{ ucfirst($s->billing_cycle) }}</td>
              <td class="t-amount">₹{{ number_format($s->amount) }}</td>
              <td><span class="chip @if($s->status==='active') chip-success @elseif($s->status==='cancelled') chip-gray @else chip-warning @endif">{{ ucfirst($s->status) }}</span></td>
              <td>{{ $s->started_at?->format('d M Y') ?? '—' }}</td>
              <td>{{ $s->current_period_end?->format('d M Y') ?? '—' }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No subscriptions.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('subscriptions');</script>
</body>
</html>
