<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Payments Â· PORTDA Buyer</title>
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
      <a class="nav-item active" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search paymentsâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Payments &amp; Invoices</h1><p>Outgoing payments to vendors. UPI, NEFT/RTGS offline with UTR reconciliation, USD wire.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export GST report</button><button class="btn btn-primary">Pay invoice</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Outstanding</div><div class="kpi-value">â‚¹3.4 L</div><div class="kpi-delta">across 4 invoices</div></div>
      <div class="kpi"><div class="kpi-label">Paid this month</div><div class="kpi-value">â‚¹18.4 L</div><div class="kpi-delta up">on time 100%</div></div>
      <div class="kpi"><div class="kpi-label">GST input credit</div><div class="kpi-value">â‚¹2.81 L</div><div class="kpi-delta">claimable FY26-27</div></div>
      <div class="kpi"><div class="kpi-label">Pending UTR</div><div class="kpi-value">2</div><div class="kpi-delta down">submit by EOD</div></div>
    </div>

    <div class="card mb-20" style="border:1.5px solid var(--warning);background:linear-gradient(90deg,#FFFBEB,#fff 60%);">
      <div class="row" style="gap:14px;">
        <div style="width:40px;height:40px;background:var(--warning-light);color:var(--warning);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div class="flex-1">
          <strong>2 NEFT/RTGS payments awaiting UTR submission</strong>
          <div class="muted" style="font-size:13px;">Mumbai Marine â‚¹65,490 (#PORT-48217) Â· Coastal Bunkers â‚¹1,44,000 (#PORT-48156). Submit UTR to release to vendor.</div>
        </div>
        <button class="btn btn-primary">Submit UTRs</button>
      </div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (47)</a><a href="#">Outstanding (4)</a><a href="#">Paid (43)</a><a href="#">Refunded (0)</a>
    </div>

    <div class="table-wrap mb-20">
      <table class="t">
        <thead><tr><th>Invoice</th><th>Vendor</th><th>Order Â· Service</th><th>Amount</th><th>Method</th><th>Status</th><th>Date</th></tr></thead>
        <tbody>
          @forelse ($items as $p)
            <tr>
              <td><strong>{{ $p->reference }}</strong></td>
              <td>#{{ $p->order->reference ?? '—' }}</td>
              <td>{{ strtoupper($p->method) }} <span class="muted">· {{ ucfirst($p->type) }}</span></td>
              <td class="t-amount">₹{{ number_format($p->amount) }}</td>
              <td>{{ $p->utr_number ?? $p->gateway_txn_id ?? '—' }}</td>
              <td><span class="chip @if($p->status==='success') chip-success @elseif($p->status==='failed') chip-danger @else chip-warning @endif">{{ ucfirst($p->status) }}</span></td>
              <td>{{ $p->created_at->format('d M H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:32px;">No payments yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="grid-3">
      <div class="card">
        <div class="card-head"><h3>Bank account</h3><button class="btn btn-sm btn-outline">Manage</button></div>
        <div class="row"><div style="width:48px;height:48px;background:var(--primary-light);color:var(--primary);border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;">HDFC</div><div><strong>HDFC Bank Â· CA</strong><div class="muted" style="font-size:12px;">â€¢â€¢â€¢â€¢ 4421 Â· IFSC HDFC0000098</div></div></div>
      </div>
      <div class="card">
        <div class="card-head"><h3>GSTIN</h3><span class="chip chip-success">Verified</span></div>
        <div><strong>27ABCDF1234G1Z9</strong><div class="muted" style="font-size:13px;">OceanLink Shipping Pvt Ltd</div><div class="muted" style="font-size:12px;">Auto-claim ITC enabled</div></div>
      </div>
      <div class="card">
        <div class="card-head"><h3>Approval limits</h3></div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Single payment</span><strong>â‚¹10 L</strong></div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Daily cap</span><strong>â‚¹25 L</strong></div>
        <div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Dual approval â‰¥</span><strong>â‚¹5 L</strong></div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
