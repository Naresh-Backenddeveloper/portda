<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Orders Â· PORTDA Buyer</title>
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
      <a class="nav-item active" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search ordersâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Orders</h1><p>Confirmed jobs across all your vessels. Live milestones, invoices &amp; settlement.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Active</div><div class="kpi-value">5</div></div>
      <div class="kpi"><div class="kpi-label">Completed MTD</div><div class="kpi-value">11</div></div>
      <div class="kpi"><div class="kpi-label">Spend MTD</div><div class="kpi-value">â‚¹18.4 L</div></div>
      <div class="kpi"><div class="kpi-label">Avg job cost</div><div class="kpi-value">â‚¹1.7 L</div></div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (37)</a><a href="#">Active (5)</a><a href="#">Completed (29)</a><a href="#">Cancelled (3)</a>
    </div>

    <div class="table-wrap">
      <table class="t">
        <thead><tr><th>Order</th><th>Vendor</th><th>Service Â· Port</th><th>Vessel</th><th>Value</th><th>Status</th><th>Date</th></tr></thead>
        <tbody>
          @forelse ($items as $o)
            <tr>
              <td><strong>#{{ $o->reference }}</strong></td>
              <td><div class="t-buyer"><div class="avatar b1">{{ strtoupper(substr($o->vendor->name ?? 'V',0,2)) }}</div><div><div class="name">{{ $o->vendor->name ?? '—' }}</div></div></div></td>
              <td>{{ $o->serviceRequest->title ?? '—' }}<div class="muted" style="font-size:12px;">{{ optional($o->serviceRequest?->port)->name }}</div></td>
              <td>{{ $o->serviceRequest->vessel_name ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($o->total) }}</td>
              <td>
                @php $s = $o->status; @endphp
                <span class="chip @if($s==='completed') chip-success @elseif($s==='cancelled') chip-gray @elseif($s==='in_progress') chip-warning @else chip-primary @endif">{{ str_replace('_',' ', ucfirst($s)) }}</span>
              </td>
              <td>{{ $o->created_at->format('d M') }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:32px;">No orders yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card mt-20">
      <div class="card-head"><h3>Order timeline Â· #PORT-48217 (Ship Agents Â· Mumbai Marine)</h3><a class="link" href="#">Full order â†’</a></div>
      <div style="display:flex;align-items:center;gap:0;margin-top:10px;">
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--success);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;">âœ“</div>
          <div style="font-size:12px;font-weight:700;">PO sent</div><div style="font-size:11px;color:var(--text-3);">15 May 09:14</div>
        </div>
        <div style="height:2px;background:var(--success);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--success);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;">âœ“</div>
          <div style="font-size:12px;font-weight:700;">Advance paid</div><div style="font-size:11px;color:var(--text-3);">â‚¹65,490</div>
        </div>
        <div style="height:2px;background:var(--success);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--success);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;">âœ“</div>
          <div style="font-size:12px;font-weight:700;">Pilot boarded</div><div style="font-size:11px;color:var(--text-3);">13:02 IST</div>
        </div>
        <div style="height:2px;background:var(--primary);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;">â—</div>
          <div style="font-size:12px;font-weight:700;color:var(--primary);">Berthing</div><div style="font-size:11px;color:var(--primary);">in progress</div>
        </div>
        <div style="height:2px;background:var(--border);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--bg);border:1.5px solid var(--border);"></div>
          <div style="font-size:12px;color:var(--text-3);">Final payment</div><div style="font-size:11px;color:var(--text-3);">on completion</div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
