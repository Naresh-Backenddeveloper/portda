<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Orders · PORTDA Vendor</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>
<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head"><div class="sidebar-logo">⚓</div><div><div class="sidebar-name">PORTDA</div><div class="sidebar-role">Vendor</div></div></div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Operate</div>
      <a class="nav-item" href="/vendor/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item" href="/vendor/inbox"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>Request Inbox</span><span class="nav-badge">7</span></a>
      <a class="nav-item" href="/vendor/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span></a>
      <a class="nav-item active" href="/vendor/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">2</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/vendor/payouts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payouts</span></a>
      <a class="nav-item" href="/vendor/billing"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 7l10 5 10-5-10-5z"/></svg><span>Plan &amp; Billing</span></a>
      <div class="sidebar-section">Business</div>
      <a class="nav-item" href="/vendor/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
      <a class="nav-item" href="/vendor/reviews"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span>Reviews</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/vendor/profile"><div class="avatar">MM</div><div style="min-width:0;"><div class="name">Mumbai Marine</div><div class="role">★ 4.9 · Pro</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search orders…" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/vendor/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="dot"></span></a><a class="topbar-avatar" href="/vendor/profile">MM</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Orders</h1><p>Confirmed orders. Track milestones, update status, raise invoices.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Active</div><div class="kpi-value">5</div><div class="kpi-delta up">▲ 1 this week</div></div>
      <div class="kpi"><div class="kpi-label">Completed (MTD)</div><div class="kpi-value">14</div><div class="kpi-delta up">vs 11 last month</div></div>
      <div class="kpi"><div class="kpi-label">Avg order value</div><div class="kpi-value">₹2.4 L</div><div class="kpi-delta">stable</div></div>
      <div class="kpi"><div class="kpi-label">On-time delivery</div><div class="kpi-value">96%</div><div class="kpi-delta up">▲ 2 pts</div></div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">Active (5)</a><a href="#">Completed (87)</a><a href="#">Cancelled (3)</a>
    </div>

    <div class="table-wrap">
      <table class="t">
        <thead><tr><th>Order</th><th>Buyer · Vessel</th><th>Service</th><th>Status</th><th>Value</th><th>Updated</th></tr></thead>
        <tbody>
          @forelse ($items as $o)
            <tr>
              <td><strong>#{{ $o->reference }}</strong></td>
              <td>{{ $o->buyer->name ?? '—' }}</td>
              <td>{{ $o->serviceRequest->title ?? '—' }}<div class="muted" style="font-size:12px;">{{ optional($o->serviceRequest?->port)->name }}</div></td>
              <td>{{ $o->serviceRequest->vessel_name ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($o->total) }}</td>
              <td>
                @php $s = $o->status; @endphp
                <span class="chip @if($s==='completed') chip-success @elseif($s==='cancelled') chip-gray @elseif($s==='in_progress') chip-warning @else chip-primary @endif">{{ str_replace('_',' ', ucfirst($s)) }}</span>
              </td>
              <td>
                @if (in_array($o->status, ['placed','confirmed']))
                  <form method="POST" action="/vendor/orders/{{ $o->id }}/start" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Start</button></form>
                @elseif ($o->status === 'in_progress')
                  <form method="POST" action="/vendor/orders/{{ $o->id }}/complete" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Complete</button></form>
                @else
                  —
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:32px;">No orders yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="card mt-20">
      <div class="card-head"><h3>Active order timeline · #PORT-48217 (OceanLink · Ship Agents)</h3><a class="link" href="#">Full order →</a></div>
      <div style="display:flex;align-items:center;gap:0;margin-top:10px;">
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--success);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;">✓</div>
          <div style="font-size:12px;font-weight:700;">Confirmed</div>
          <div style="font-size:11px;color:var(--text-3);">15 May 09:14</div>
        </div>
        <div style="height:2px;background:var(--success);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--success);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;">✓</div>
          <div style="font-size:12px;font-weight:700;">Pilot boarded</div>
          <div style="font-size:11px;color:var(--text-3);">15 May 13:02</div>
        </div>
        <div style="height:2px;background:var(--primary);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--primary);color:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;">●</div>
          <div style="font-size:12px;font-weight:700;color:var(--primary);">Berthing</div>
          <div style="font-size:11px;color:var(--primary);">in progress</div>
        </div>
        <div style="height:2px;background:var(--border);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--bg);border:1.5px solid var(--border);"></div>
          <div style="font-size:12px;color:var(--text-3);">Lines fast</div>
          <div style="font-size:11px;color:var(--text-3);">est. 15:30</div>
        </div>
        <div style="height:2px;background:var(--border);flex:0 0 40px;"></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:6px;">
          <div style="width:24px;height:24px;border-radius:50%;background:var(--bg);border:1.5px solid var(--border);"></div>
          <div style="font-size:12px;color:var(--text-3);">Closed</div>
          <div style="font-size:11px;color:var(--text-3);">est. 16:30</div>
        </div>
      </div>
      <div style="display:flex;gap:8px;margin-top:18px;justify-content:flex-end;">
        <button class="btn btn-outline">Add note</button>
        <button class="btn btn-outline">Upload photo</button>
        <button class="btn btn-primary">Update status →</button>
      </div>
    </div>
  </main>
</div>
</body>
</html>
