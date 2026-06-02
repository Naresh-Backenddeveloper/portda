<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Vendors Â· PORTDA Buyer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>
<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head"><div class="sidebar-logo">âš“</div><div><div class="sidebar-name">PORTDA</div><div class="sidebar-role buyer">Buyer</div></div></div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Procurement</div>
      <a class="nav-item" href="/buyer/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item" href="/buyer/new-request"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg><span>New Request</span></a>
      <a class="nav-item" href="/buyer/requests"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>My Requests</span><span class="nav-badge">4</span></a>
      <a class="nav-item" href="/buyer/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span><span class="nav-badge">12</span></a>
      <a class="nav-item" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item active" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search vendors by name, port, categoryâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Vendor Directory</h1><p>Verified marine service vendors. Mark favourites to auto-invite them on matching requests.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Filters</button></div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (1,247)</a><a href="#">Favourites (8)</a><a href="#">Ship Agents</a><a href="#">Cargo Handling</a><a href="#">Ship Mgmt</a><a href="#">Repairs</a><a href="#">Chandlers</a><a href="#">Bunkering</a><a href="#">Multi Modal</a><a href="#">Storage</a><a href="#">Legal</a><a href="#">Insurance</a>
    </div>

    <div class="grid-3">
      @forelse ($items as $v)
        <div class="card">
          <div class="row" style="gap:14px;align-items:flex-start;">
            <div class="avatar b1" style="width:56px;height:56px;border-radius:12px;background:var(--primary-light);color:var(--primary);font-weight:800;font-size:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">{{ strtoupper(substr($v->company_name, 0, 2)) }}</div>
            <div class="flex-1">
              <div class="row-between">
                <strong>{{ $v->company_name }}</strong>
                @if ($v->is_premium)<span class="chip chip-success">★ Premium</span>@endif
              </div>
              <div class="muted" style="font-size:12px;margin-top:2px;">
                {{ $v->categories->pluck('name')->take(3)->join(' · ') }}
                @if ($v->city) · {{ $v->city }}@endif
              </div>
              <div class="row" style="gap:6px;margin-top:8px;flex-wrap:wrap;">
                @foreach ($v->ports->take(4) as $p)
                  <span class="chip chip-success">{{ $p->code }}</span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="divider"></div>
          <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;text-align:center;">
            <div><div style="font-size:16px;font-weight:800;color:var(--accent);">★ {{ number_format($v->rating, 1) }}</div><div class="muted" style="font-size:11px;">{{ $v->rating_count }} reviews</div></div>
            <div><div style="font-size:16px;font-weight:800;">{{ $v->jobs_completed }}</div><div class="muted" style="font-size:11px;">jobs done</div></div>
            <div><div style="font-size:16px;font-weight:800;">{{ ucfirst($v->verification_status) }}</div><div class="muted" style="font-size:11px;">status</div></div>
          </div>
          <div class="row" style="gap:8px;margin-top:12px;">
            <a class="btn btn-primary btn-sm flex-1" href="/buyer/new-request">Invite to RFQ</a>
          </div>
        </div>
      @empty
        <div class="card muted" style="text-align:center;padding:32px;">No vendors found. Try a different filter.</div>
      @endforelse
    </div>
  </main>
</div>
</body>
</html>
