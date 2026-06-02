<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quotations · PORTDA Vendor</title>
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
      <a class="nav-item active" href="/vendor/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/></svg><span>Quotations</span></a>
      <a class="nav-item" href="/vendor/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">2</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/vendor/payouts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payouts</span></a>
      <a class="nav-item" href="/vendor/billing"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg><span>Plan &amp; Billing</span></a>
      <div class="sidebar-section">Business</div>
      <a class="nav-item" href="/vendor/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
      <a class="nav-item" href="/vendor/reviews"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span>Reviews</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/vendor/profile"><div class="avatar">MM</div><div style="min-width:0;"><div class="name">Mumbai Marine</div><div class="role">★ 4.9 · Pro</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search quotes…" /></div>
    <div class="topbar-actions">
      <a class="icon-btn" href="/vendor/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="dot"></span></a>
      <a class="topbar-avatar" href="/vendor/profile">MM</a>
    </div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Quotations</h1><p>Build, send and track quotes. Click on any to view the thread.</p></div>
      <div class="page-actions"><a class="btn btn-primary" href="#new"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> New Quote</a></div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (28)</a>
      <a href="#">Draft (3)</a>
      <a href="#">Pending review (2)</a>
      <a href="#">Sent to buyer (10)</a>
      <a href="#">Negotiating (4)</a>
      <a href="#">Approved (7)</a>
      <a href="#">Rejected (2)</a>
    </div>

    <div class="card mb-16" style="background:linear-gradient(90deg,rgba(124,58,237,.05),#fff 60%);border:1px solid #DDD6FE;">
      <div class="row" style="gap:12px;align-items:center;">
        <div style="width:36px;height:36px;background:rgba(124,58,237,.15);color:#8B5CF6;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
        </div>
        <div class="flex-1">
          <strong style="font-size:13px;">New: PORTDA reviews every quote before it reaches the buyer</strong>
          <div class="muted" style="font-size:12px;line-height:1.5;">Quotes are checked for completeness, pricing sanity and policy compliance. Median admin SLA: <strong>18 min</strong>. You'll be notified once approved or returned with feedback.</div>
        </div>
      </div>
    </div>

    <div class="table-wrap mb-20">
      <table class="t">
        <thead><tr><th>Quote #</th><th>Buyer</th><th>Vessel · Service</th><th>Amount</th><th>Status</th><th>Updated</th></tr></thead>
        <tbody>
          @forelse ($items as $q)
            <tr>
              <td><strong>#{{ $q->reference }}</strong></td>
              <td>{{ $q->serviceRequest->title ?? '—' }}<div class="muted" style="font-size:12px;">{{ $q->serviceRequest->vessel_name ?? '' }}</div></td>
              <td>{{ $q->serviceRequest->buyer->name ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($q->amount) }}</td>
              <td>
                @php $s = $q->status; @endphp
                <span class="chip @if($s==='accepted') chip-success @elseif(in_array($s,['rejected','withdrawn','expired'])) chip-gray @else chip-primary @endif">{{ ucfirst($s) }}</span>
              </td>
              <td>{{ $q->valid_until ? $q->valid_until->format('d M') : '—' }}</td>
              <td>{{ $q->created_at->format('d M H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:32px;">No quotations submitted yet. <a class="link" href="/vendor/inbox">Browse leads →</a></td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="page-header" id="new">
      <div class="page-title"><h1 style="font-size:20px;">New Quote · #PORT-48512</h1><p>OceanLink Shipping · MV Pacific Bridge · Ship Agents at JNPT · 17 May 14:00 IST</p></div>
    </div>

    <div class="builder-grid">
      <div>
        <div class="card mb-16">
          <div class="card-head"><h3>1 · Line items</h3><button class="btn btn-sm btn-outline">+ Add line</button></div>
          <table class="t">
            <thead><tr><th>Description</th><th style="width:90px;">Qty</th><th style="width:130px;">Rate (₹)</th><th style="width:130px;">Subtotal</th><th style="width:36px;"></th></tr></thead>
            <tbody>
              <tr>
                <td><input class="form-input" value="Compulsory pilot · LOA-based" /></td>
                <td><input class="form-input" value="1" /></td>
                <td><input class="form-input" value="85,000" /></td>
                <td class="t-amount">₹85,000</td>
                <td><button class="btn btn-ghost btn-sm">×</button></td>
              </tr>
              <tr>
                <td><input class="form-input" value="Trailer Truck · 3 hrs" /></td>
                <td><input class="form-input" value="2" /></td>
                <td><input class="form-input" value="38,000" /></td>
                <td class="t-amount">₹76,000</td>
                <td><button class="btn btn-ghost btn-sm">×</button></td>
              </tr>
              <tr>
                <td><input class="form-input" value="Mooring crew · alongside" /></td>
                <td><input class="form-input" value="1" /></td>
                <td><input class="form-input" value="24,000" /></td>
                <td class="t-amount">₹24,000</td>
                <td><button class="btn btn-ghost btn-sm">×</button></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="card mb-16">
          <div class="card-head"><h3>2 · Milestones &amp; payment plan</h3><button class="btn btn-sm btn-outline">+ Milestone</button></div>
          <div class="milestone-row" style="grid-template-columns:1fr 100px 120px 32px;">
            <input value="Advance on confirmation" />
            <input value="30%" />
            <span class="muted">₹55,500</span>
            <button class="btn btn-ghost btn-sm">×</button>
          </div>
          <div class="milestone-row" style="grid-template-columns:1fr 100px 120px 32px;">
            <input value="Pilot boarded" />
            <input value="40%" />
            <span class="muted">₹74,000</span>
            <button class="btn btn-ghost btn-sm">×</button>
          </div>
          <div class="milestone-row" style="grid-template-columns:1fr 100px 120px 32px;">
            <input value="Berthed &amp; lines fast" />
            <input value="30%" />
            <span class="muted">₹55,500</span>
            <button class="btn btn-ghost btn-sm">×</button>
          </div>
        </div>

        <div class="card mb-16">
          <div class="card-head"><h3>3 · Attachments</h3><button class="btn btn-sm btn-outline">Upload PDF</button></div>
          <div style="display:flex;gap:10px;align-items:center;padding:10px;background:var(--bg);border-radius:10px;">
            <div style="width:36px;height:36px;background:var(--danger-light);color:var(--danger);border-radius:8px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:11px;">PDF</div>
            <div class="flex-1"><div style="font-weight:700;font-size:13px;">MMS-Quote-Q48512.pdf</div><div class="muted" style="font-size:12px;">214 KB · branded letterhead</div></div>
            <button class="btn btn-ghost btn-sm">View</button>
          </div>
        </div>

        <div class="card">
          <div class="card-head"><h3>4 · Cover note (optional)</h3></div>
          <textarea class="form-textarea" rows="3">Available 12:00–18:00 IST. ASD tug confirmed (Sagar 1 + Sagar 3, 4000 BHP each). Pilot will board at sea-pilot station 2 hrs before ETA.</textarea>
        </div>
      </div>

      <aside class="builder-summary">
        <h3 style="font-size:15px;font-weight:800;margin:0 0 14px;">Quote summary</h3>
        <div class="summary-row"><span>Ship Agents</span><strong>₹85,000</strong></div>
        <div class="summary-row"><span>Multi Modal Transport (2× ASD)</span><strong>₹76,000</strong></div>
        <div class="summary-row"><span>Stevedoring</span><strong>₹24,000</strong></div>
        <div class="divider"></div>
        <div class="summary-row"><span>Subtotal</span><strong>₹1,85,000</strong></div>
        <div class="summary-row"><span>CGST 9%</span><span>₹16,650</span></div>
        <div class="summary-row"><span>SGST 9%</span><span>₹16,650</span></div>
        <div class="summary-row total"><span>Total</span><span style="color:var(--primary);">₹2,18,300</span></div>
        <div class="divider"></div>
        <div style="padding:10px;background:rgba(124,58,237,.06);border-radius:8px;font-size:12px;color:var(--text-2);margin-bottom:12px;line-height:1.5;">
          ⓘ Quote will be reviewed by PORTDA before reaching the buyer. Median review time: <strong>18 min</strong>. Quote valid for 48 hrs from buyer receipt.
        </div>
        <button class="btn btn-primary btn-block btn-lg mb-12">Submit for review</button>
        <button class="btn btn-outline btn-block">Save Draft</button>
      </aside>
    </div>
  </main>
</div>

</body>
</html>
