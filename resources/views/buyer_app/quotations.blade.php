<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quotations Â· PORTDA Buyer</title>
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
      <a class="nav-item active" href="/buyer/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span><span class="nav-badge">12</span></a>
      <a class="nav-item" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search quotesâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg><span class="dot"></span></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Compare quotes Â· #PORT-48512</h1><p>Ship Agents for MV Pacific Bridge at JNPT Â· 17 May 14:00 IST Â· 4 vendors quoted in 26 minutes</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export PDF</button><button class="btn btn-outline">Share with team</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Quotes received</div><div class="kpi-value">4 of 12</div><div class="kpi-delta">window closes in 28m</div></div>
      <div class="kpi"><div class="kpi-label">Lowest quote</div><div class="kpi-value">â‚¹1,85,000</div><div class="kpi-delta">Saffron Shipping Agents</div></div>
      <div class="kpi"><div class="kpi-label">Highest rated</div><div class="kpi-value">â˜… 4.9</div><div class="kpi-delta">Mumbai Marine</div></div>
      <div class="kpi"><div class="kpi-label">Avg quote</div><div class="kpi-value">â‚¹2.1 L</div><div class="kpi-delta">incl GST</div></div>
    </div>

    <div class="table-wrap mb-20">
      <div class="table-head"><h3>4 quotes received</h3><div class="table-filters"><span class="tab active">Best fit</span><span class="tab">Lowest price</span><span class="tab">Highest rated</span><span class="tab">Fastest</span></div></div>
      <table class="t">
        <thead><tr><th>Vendor</th><th>Rating</th><th>Compliance</th><th>Quote</th><th>GST</th><th>Total</th><th>Valid until</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $q)
            <tr>
              <td><strong>#{{ $q->serviceRequest->reference ?? '—' }}</strong><div class="muted" style="font-size:12px;">{{ $q->serviceRequest->title ?? '' }}</div></td>
              <td><div class="t-buyer"><div class="avatar b1">{{ strtoupper(substr($q->vendor->name ?? 'V',0,2)) }}</div><div><div class="name">{{ $q->vendor->name ?? '—' }}</div><div class="sub">{{ optional($q->vendor->vendorProfile)->jobs_completed ?? 0 }} jobs</div></div></div></td>
              <td><strong style="color:var(--accent);">★ {{ number_format(optional($q->vendor->vendorProfile)->rating ?? 0, 1) }}</strong></td>
              <td class="t-amount">₹{{ number_format($q->amount) }}</td>
              <td>
                @php $s = $q->status; @endphp
                <span class="chip @if($s==='accepted') chip-success @elseif(in_array($s,['rejected','withdrawn','expired'])) chip-gray @else chip-primary @endif">{{ ucfirst($s) }}</span>
              </td>
              <td><div class="muted" style="font-size:12px;">{{ $q->valid_until ? $q->valid_until->format('d M') : '—' }}</div></td>
              <td class="t-actions">
                @if ($q->status === 'submitted')
                  <form method="POST" action="/buyer/quotations/{{ $q->id }}/accept" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Accept</button></form>
                  <form method="POST" action="/buyer/quotations/{{ $q->id }}/reject" style="display:inline;">@csrf<button class="btn btn-sm btn-outline">Reject</button></form>
                @else
                  <span class="muted">—</span>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:32px;">No quotations received yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-head"><h3>Mumbai Marine Â· Quote details</h3><span class="chip chip-success">Recommended</span></div>
        <div style="display:flex;gap:10px;align-items:center;padding:10px;background:var(--bg);border-radius:10px;margin-bottom:14px;">
          <div style="width:36px;height:36px;background:var(--danger-light);color:var(--danger);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:11px;">PDF</div>
          <div class="flex-1"><strong>MMS-Quote-Q48512.pdf</strong><div class="muted" style="font-size:12px;">214 KB Â· uploaded 09:32</div></div>
          <button class="btn btn-ghost btn-sm">View</button>
        </div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Compulsory pilot</span><strong>â‚¹85,000</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Trailer Truck (2Ã— Â· 3 hrs)</span><strong>â‚¹76,000</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Mooring crew</span><strong>â‚¹24,000</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">CGST 9% + SGST 9%</span><strong>â‚¹33,300</strong></div>
        <div class="row-between" style="padding:10px 0;font-size:16px;"><strong>Total</strong><strong style="color:var(--primary);">â‚¹2,18,300</strong></div>
        <div class="divider"></div>
        <div class="muted" style="font-size:12px;font-weight:700;letter-spacing:.5px;margin-bottom:8px;">MILESTONES</div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span>Advance on confirmation (30%)</span><span>â‚¹65,490</span></div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span>Pilot boarded (40%)</span><span>â‚¹87,320</span></div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span>Lines fast &amp; berthed (30%)</span><span>â‚¹65,490</span></div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Decision</h3></div>
        <p class="muted" style="font-size:13px;">Pick the quote, optionally negotiate or attach a counter, then approve to convert to PO.</p>
        <button class="btn btn-primary btn-block btn-lg mt-12">Approve Mumbai Marine Â· â‚¹2,18,300</button>
        <button class="btn btn-outline btn-block mt-12">Send counter-offer</button>
        <button class="btn btn-ghost btn-block mt-12">Reject &amp; reopen request</button>
        <div class="divider"></div>
        <div class="muted" style="font-size:12px;font-weight:700;letter-spacing:.5px;margin-bottom:8px;">PAYMENT METHOD ON APPROVAL</div>
        <label style="display:flex;align-items:center;gap:10px;padding:10px;background:var(--bg);border-radius:8px;cursor:pointer;margin-bottom:6px;"><input type="radio" name="pm" checked /><strong style="font-size:13px;">UPI / Online</strong><span class="muted" style="font-size:12px;margin-left:auto;">Instant</span></label>
        <label style="display:flex;align-items:center;gap:10px;padding:10px;background:var(--bg);border-radius:8px;cursor:pointer;margin-bottom:6px;"><input type="radio" name="pm" /><strong style="font-size:13px;">NEFT / RTGS (Offline)</strong><span class="muted" style="font-size:12px;margin-left:auto;">UTR-based</span></label>
        <label style="display:flex;align-items:center;gap:10px;padding:10px;background:var(--bg);border-radius:8px;cursor:pointer;"><input type="radio" name="pm" /><strong style="font-size:13px;">USD wire</strong><span class="muted" style="font-size:12px;margin-left:auto;">Foreign-flag</span></label>
      </div>
    </div>
  </main>
</div>
</body>
</html>
