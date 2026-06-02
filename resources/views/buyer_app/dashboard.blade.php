<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard Â· PORTDA Buyer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>

<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head">
      <div class="sidebar-logo">âš“</div>
      <div><div class="sidebar-name">PORTDA</div><div class="sidebar-role buyer">Buyer</div></div>
    </div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Procurement</div>
      <a class="nav-item active" href="/buyer/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item" href="/buyer/new-request"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg><span>New Request</span></a>
      <a class="nav-item" href="/buyer/requests"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>My Requests</span><span class="nav-badge">4</span></a>
      <a class="nav-item" href="/buyer/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span><span class="nav-badge">12</span></a>
      <a class="nav-item" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>

      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Invoices</span></a>

      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot">
      <a class="user-chip" href="/buyer/profile">
        <div class="avatar" style="background:var(--accent);">OL</div>
        <div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div>
      </a>
      <a class="logout-btn" href="/login" title="Sign out">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      </a>
    </div>
  </aside>

  <header class="topbar">
    <div class="search">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
      <input type="search" placeholder="Search vessels, orders, vendors, invoicesâ€¦" />
    </div>
    <div class="topbar-actions">
      <a class="btn btn-primary" href="/buyer/new-request"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> New Request</a>
      <a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="dot"></span></a>
      <a class="topbar-avatar" href="/buyer/profile">RK</a>
    </div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title">
        <h1>Dashboard</h1>
        <p>Overview of your requests, quotes and orders.</p>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi">
        <div class="kpi-icon indigo"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg></div>
        <div class="kpi-label">Open Requests</div>
        <div class="kpi-value">{{ $stats['open_requests'] ?? 0 }}</div>
        <div class="kpi-delta up">{{ $stats['awaiting_quotes'] ?? 0 }} awaiting quotes</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon orange"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
        <div class="kpi-label">Active Orders</div>
        <div class="kpi-value">{{ $stats['pending_orders'] ?? 0 }}</div>
        <div class="kpi-delta">{{ $stats['completed_orders'] ?? 0 }} completed</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon green"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
        <div class="kpi-label">Total Spent</div>
        <div class="kpi-value">â‚¹{{ number_format(($stats['total_spent'] ?? 0) / 100000, 1) }} L</div>
        <div class="kpi-delta">{{ $stats['unread_notifications'] ?? 0 }} unread alerts</div>
      </div>
      <div class="kpi">
        <div class="kpi-icon amber"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <div class="kpi-label">Completed</div>
        <div class="kpi-value">{{ $stats['completed_orders'] ?? 0 }}</div>
        <div class="kpi-delta up">lifetime</div>
      </div>
    </div>

    <div class="grid-2 mb-20">
      <div class="table-wrap">
        <div class="table-head"><h3>Active orders</h3><a class="link" href="/buyer/orders">All orders â†’</a></div>
        <table class="t">
          <thead><tr><th>Order</th><th>Vendor Â· Service</th><th>Vessel</th><th>Status</th></tr></thead>
          <tbody>
            @forelse ($stats['recent_orders'] ?? [] as $o)
              <tr>
                <td><strong>#{{ $o['reference'] }}</strong><div class="muted" style="font-size:12px;">{{ \Illuminate\Support\Carbon::parse($o['created_at'])->format('d M') }}</div></td>
                <td><div class="t-buyer"><div class="avatar b1">{{ strtoupper(substr($o['vendor']['name'] ?? 'V',0,2)) }}</div><div><div class="name">{{ $o['vendor']['name'] ?? '—' }}</div><div class="sub">₹{{ number_format($o['total']) }}</div></div></div></td>
                <td>{{ $o['service_request']['vessel_name'] ?? '—' }}<div class="muted" style="font-size:12px;">{{ $o['service_request']['title'] ?? '' }}</div></td>
                <td>
                  @php $s = $o['status']; @endphp
                  <span class="chip @if($s==='completed') chip-success @elseif($s==='cancelled') chip-gray @elseif($s==='in_progress') chip-warning @else chip-primary @endif">{{ str_replace('_',' ', ucfirst($s)) }}</span>
                </td>
              </tr>
            @empty
              <tr><td colspan="4" class="muted" style="text-align:center;padding:24px;">No orders yet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="card">
        <div class="card-head"><h3>Recent requests</h3><a class="link" href="/buyer/requests">All requests →</a></div>
        @forelse ($stats["recent_requests"] ?? [] as $r)
          <div class="activity-item">
            <div class="activity-icon indigo">{{ $r["quotations_count"] ?? 0 }}</div>
            <div class="activity-body">
              <div class="activity-title">{{ $r["category"]["name"] ?? "—" }} · {{ $r["vessel_name"] }} <time>{{ \Illuminate\Support\Carbon::parse($r["created_at"])->diffForHumans() }}</time></div>
              <div class="activity-sub">#{{ $r["reference"] }} · {{ $r["quotations_count"] ?? 0 }} quotes · {{ ucfirst($r["status"]) }}</div>
            </div>
          </div>
        @empty
          <div class="muted" style="padding:18px 0;text-align:center;">No requests yet. <a class="link" href="/buyer/new-request">Post your first →</a></div>
        @endforelse
        <a class="btn btn-outline btn-block mt-12" href="/buyer/requests">View all requests →</a>
      </div>
    </div>

    <div class="grid-3">
      <div class="card">
        <div class="card-head"><h3>Spend by category</h3></div>
        <div class="row-between mb-12"><span>Ship Agents</span><strong>â‚¹6.8 L</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;margin-bottom:12px;"><div style="background:var(--primary);height:100%;width:72%;"></div></div>
        <div class="row-between mb-12"><span>Bunkering</span><strong>â‚¹5.2 L</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;margin-bottom:12px;"><div style="background:var(--accent);height:100%;width:55%;"></div></div>
        <div class="row-between mb-12"><span>Multi Modal Transport</span><strong>â‚¹3.4 L</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;margin-bottom:12px;"><div style="background:var(--success);height:100%;width:38%;"></div></div>
        <div class="row-between mb-12"><span>Ship Management</span><strong>â‚¹3.0 L</strong></div>
        <div style="background:var(--bg);height:6px;border-radius:3px;overflow:hidden;"><div style="background:var(--warning);height:100%;width:32%;"></div></div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Top vendors</h3><a class="link" href="/buyer/vendors">All</a></div>
        <div class="activity-item">
          <div class="avatar b1" style="width:36px;height:36px;border-radius:9px;font-size:11px;font-weight:800;display:flex;align-items:center;justify-content:center;background:var(--primary-light);color:var(--primary);">MM</div>
          <div class="activity-body"><div class="activity-title">Mumbai Marine <time>â˜… 4.9</time></div><div class="activity-sub">12 jobs Â· â‚¹14.2 L spent</div></div>
        </div>
        <div class="activity-item">
          <div class="avatar b2" style="width:36px;height:36px;border-radius:9px;font-size:11px;font-weight:800;display:flex;align-items:center;justify-content:center;background:var(--accent-light);color:var(--accent);">CB</div>
          <div class="activity-body"><div class="activity-title">Coastal Bunkers <time>â˜… 4.8</time></div><div class="activity-sub">8 jobs Â· â‚¹9.4 L spent</div></div>
        </div>
        <div class="activity-item">
          <div class="avatar b3" style="width:36px;height:36px;border-radius:9px;font-size:11px;font-weight:800;display:flex;align-items:center;justify-content:center;background:var(--success-light);color:var(--success);">PS</div>
          <div class="activity-body"><div class="activity-title">Port Stevedoring <time>â˜… 4.7</time></div><div class="activity-sub">5 jobs Â· â‚¹6.1 L spent</div></div>
        </div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Vessels calling soon</h3></div>
        <div class="activity-item">
          <div class="activity-icon indigo">ðŸš¢</div>
          <div class="activity-body"><div class="activity-title">MV Pacific Bridge <time>Today 14:00</time></div><div class="activity-sub">JNPT Â· Berth T4 Â· Ship Agents live</div></div>
        </div>
        <div class="activity-item">
          <div class="activity-icon orange">ðŸš¢</div>
          <div class="activity-body"><div class="activity-title">MV Star Voyager <time>18 May 06:00</time></div><div class="activity-sub">JNPT Â· Berth J3 Â· Multi Modal Transport scheduled</div></div>
        </div>
        <div class="activity-item">
          <div class="activity-icon green">ðŸš¢</div>
          <div class="activity-body"><div class="activity-title">MV Coastal Wind <time>19 May 06:00</time></div><div class="activity-sub">Mundra Â· Bunkering pending</div></div>
        </div>
        <div class="activity-item">
          <div class="activity-icon amber">ðŸš¢</div>
          <div class="activity-body"><div class="activity-title">MV Eastern Horizon <time>21 May 09:00</time></div><div class="activity-sub">Hazira Â· SBM mooring needed</div></div>
        </div>
      </div>
    </div>
  </main>
</div>

</body>
</html>
