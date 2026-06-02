<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard · PORTDA Vendor</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>

<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head">
      <div class="sidebar-logo">⚓</div>
      <div>
        <div class="sidebar-name">PORTDA</div>
        <div class="sidebar-role">Vendor</div>
      </div>
    </div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Operate</div>
      <a class="nav-item active" href="/vendor/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item" href="/vendor/inbox"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>Request Inbox</span><span class="nav-badge">7</span></a>
      <a class="nav-item" href="/vendor/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/></svg><span>Quotations</span></a>
      <a class="nav-item" href="/vendor/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">2</span></a>

      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/vendor/payouts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payouts</span></a>
      <a class="nav-item" href="/vendor/billing"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg><span>Plan &amp; Billing</span></a>

      <div class="sidebar-section">Business</div>
      <a class="nav-item" href="/vendor/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg><span>Company Profile</span></a>
      <a class="nav-item" href="/vendor/reviews"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span>Reviews</span></a>
    </nav>
    <div class="sidebar-foot">
      <a class="user-chip" href="/vendor/profile">
        <div class="avatar">MM</div>
        <div style="min-width:0;"><div class="name">Mumbai Marine</div><div class="role">★ 4.9 · Pro</div></div>
      </a>
      <a class="logout-btn" href="/login" title="Sign out">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      </a>
    </div>
  </aside>

  <header class="topbar">
    <div class="search">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
      <input type="search" placeholder="Search requests, jobs, buyers, invoices…" />
    </div>
    <div class="topbar-actions">
      <a class="icon-btn" href="/vendor/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="dot"></span></a>
      <a class="icon-btn" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></a>
      <a class="topbar-avatar" href="/vendor/profile">MM</a>
    </div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title">
        <h1>Dashboard</h1>
        <p>Overview of your requests, quotes and orders.</p>
      </div>
      <div class="page-actions">
        <a class="btn btn-outline" href="/vendor/quotations#new"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> New Quote</a>
        <a class="btn btn-primary" href="/vendor/inbox">Open Inbox →</a>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi">
        <div class="kpi-icon indigo"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg></div>
        <div class="kpi-label">Available Leads</div>
        <div class="kpi-value">{{ $stats['available_leads'] ?? 0 }}</div>
        <div class="kpi-delta up">in your categories & ports</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon orange"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
        <div class="kpi-label">Active Quotes</div>
        <div class="kpi-value">{{ $stats['active_quotes'] ?? 0 }}</div>
        <div class="kpi-delta">submitted, awaiting decision</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon green"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg></div>
        <div class="kpi-label">Active Orders</div>
        <div class="kpi-value">{{ $stats['won_orders'] ?? 0 }}</div>
        <div class="kpi-delta up">{{ $stats['completed_orders'] ?? 0 }} completed</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon amber"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <div class="kpi-label">Total Earned</div>
        <div class="kpi-value">₹{{ number_format(($stats['total_earned'] ?? 0) / 100000, 1) }} L</div>
        <div class="kpi-delta up">★ {{ number_format($stats['rating'] ?? 0, 1) }} rating</div>
      </div>
    </div>

    <div class="table-wrap">
      <div class="table-head">
        <h3>Latest Requests</h3>
        <div class="table-filters">
          <span class="tab active">New (7)</span>
          <span class="tab">Quoted</span>
          <span class="tab">Declined</span>
          <span class="tab">All</span>
          <a class="btn btn-sm btn-outline" href="/vendor/inbox" style="margin-left:8px;">Open Inbox →</a>
        </div>
      </div>
      <table class="t">
        <thead><tr><th>Request</th><th>Buyer · Vessel</th><th>Service · Port</th><th>Window</th><th>SLA</th><th></th></tr></thead>
        <tbody>
          @forelse ($stats['recent_leads'] ?? [] as $r)
            <tr>
              <td><strong>#{{ $r['reference'] }}</strong><div class="muted" style="font-size:12px;">{{ \Illuminate\Support\Carbon::parse($r['created_at'])->diffForHumans() }}</div></td>
              <td>{{ $r['buyer']['name'] ?? '—' }}</td>
              <td>{{ $r['category']['name'] ?? '—' }}<div class="muted" style="font-size:12px;">{{ $r['port']['name'] ?? '' }}</div></td>
              <td>{{ $r['vessel_name'] ?? '—' }}</td>
              <td>{{ $r['budget_max'] ? '₹'.number_format($r['budget_max']) : '—' }}</td>
              <td><span class="chip @if($r['urgency']==='critical') chip-danger @elseif($r['urgency']==='urgent') chip-warning @else chip-primary @endif">{{ ucfirst($r['urgency']) }}</span></td>
              <td><a class="btn btn-sm btn-primary" href="/vendor/inbox/{{ $r['id'] }}/quote">Quote</a></td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No matching leads right now. Update your <a class="link" href="/vendor/profile">profile</a> to widen reach.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="grid-3 mt-16">
      <div class="card">
        <div class="card-head"><h3>This month</h3></div>
        <div class="row-between mb-12"><span class="muted">Revenue</span><strong style="font-size:18px;">₹14.2 L</strong></div>
        <div class="row-between mb-12"><span class="muted">Commission paid</span><strong style="color:var(--danger);">−₹38,420</strong></div>
        <div class="row-between mb-12"><span class="muted">Net earnings</span><strong style="color:var(--success);">₹13.8 L</strong></div>
        <div class="divider"></div>
        <div style="display:flex;align-items:flex-end;gap:6px;height:60px;">
          <div style="flex:1;background:var(--primary-light);height:30%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary-light);height:55%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary-light);height:42%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary-light);height:70%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary);height:85%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary);height:65%;border-radius:4px;"></div>
          <div style="flex:1;background:var(--primary);height:90%;border-radius:4px;"></div>
        </div>
        <div class="muted center mt-8" style="font-size:11px;">Last 7 days</div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Top services</h3></div>
        <div class="row-between mb-12"><span>Ship Agents</span><strong>62%</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;margin-bottom:12px;"><div style="background:var(--primary);height:100%;width:62%;"></div></div>
        <div class="row-between mb-12"><span>Multi Modal Transport</span><strong>24%</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;margin-bottom:12px;"><div style="background:var(--accent);height:100%;width:24%;"></div></div>
        <div class="row-between mb-12"><span>Stevedoring</span><strong>14%</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;"><div style="background:var(--success);height:100%;width:14%;"></div></div>
      </div>

      <div class="card" style="background:linear-gradient(135deg,#000000,#4F46E5);color:#fff;border:none;">
        <div class="card-head"><h3 style="color:#fff;">Plan: Pro</h3><span class="chip" style="background:rgba(255,255,255,.2);color:#fff;">Active</span></div>
        <div style="font-size:13px;opacity:.85;margin-bottom:14px;">0% commission · 200 leads / mo · Priority listing</div>
        <div class="row-between mb-12" style="opacity:.85;"><span>Renews</span><strong>15 Aug 2026</strong></div>
        <div class="row-between mb-12" style="opacity:.85;"><span>Used this month</span><strong>87 / 200 leads</strong></div>
        <a class="btn btn-outline btn-block" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.3);color:#fff;margin-top:6px;" href="/vendor/billing">Manage Plan</a>
      </div>
    </div>
  </main>
</div>

</body>
</html>
