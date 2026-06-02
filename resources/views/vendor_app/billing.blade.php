<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Plan &amp; Billing · PORTDA Vendor</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<style>
  .cycle-toggle { display:flex; background:var(--bg); padding:4px; border-radius:10px; width:fit-content; margin-bottom:18px; }
  .cycle-toggle div { padding:8px 18px; font-size:13px; font-weight:600; color:var(--text-2); border-radius:7px; cursor:pointer; }
  .cycle-toggle div.on { background:#fff; color:var(--primary); box-shadow:var(--shadow-sm); }
  .tier-card { background:#fff; border:1px solid var(--border-2); border-radius:16px; padding:24px; position:relative; transition:transform .15s ease, box-shadow .15s ease; }
  .tier-card.featured { border:2px solid var(--primary); box-shadow:0 8px 24px rgba(79,70,229,.15); }
  .tier-card.current { border:2px solid var(--success); }
  .tier-badge { position:absolute; top:-10px; right:18px; background:var(--success); color:#fff; font-size:10px; font-weight:800; padding:4px 10px; border-radius:999px; letter-spacing:.5px; }
  .tier-card.featured .tier-badge { background:var(--primary); }
</style>
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
      <a class="nav-item" href="/vendor/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">2</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/vendor/payouts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payouts</span></a>
      <a class="nav-item active" href="/vendor/billing"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg><span>Plan &amp; Billing</span></a>
      <div class="sidebar-section">Business</div>
      <a class="nav-item" href="/vendor/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
      <a class="nav-item" href="/vendor/reviews"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span>Reviews</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/vendor/profile"><div class="avatar">MM</div><div style="min-width:0;"><div class="name">Mumbai Marine</div><div class="role">★ 4.9 · Pro</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search billing…" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/vendor/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></a><a class="topbar-avatar" href="/vendor/profile">MM</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Plan &amp; Billing</h1><p>Subscription unlocks lead access · 5% commission on every confirmed order. Manage plan, billing history &amp; payment methods.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Download all invoices</button></div>
    </div>

    <!-- How charges work — explanation banner -->
    <div class="card mb-20" style="background:linear-gradient(90deg,#FFFBEB,#fff 60%);border:1px solid #FDE68A;">
      <div class="row" style="gap:14px;align-items:center;">
        <div style="width:42px;height:42px;background:var(--warning-light);color:var(--warning);border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div class="flex-1">
          <strong style="font-size:14px;">How charges work on PORTDA</strong>
          <div class="muted" style="font-size:13px;margin-top:2px;line-height:1.5;"><strong>Subscription fee</strong> unlocks access to leads (number of monthly lead views depends on your plan). <strong>5% commission</strong> is charged when a lead converts to a confirmed order — applies to every order, every plan.</div>
        </div>
      </div>
    </div>

    <!-- Current plan hero -->
    <div class="card mb-20" style="background:linear-gradient(135deg,#000000 0%,#4F46E5 100%);color:#fff;border:none;padding:28px;">
      <div class="row-between" style="margin-bottom:14px;">
        <div>
          <div style="font-size:11px;letter-spacing:1.5px;opacity:.8;font-weight:600;">CURRENT PLAN</div>
          <div style="font-size:32px;font-weight:900;letter-spacing:-.5px;margin-top:6px;">Pro · Quarterly</div>
          <div style="font-size:14px;opacity:.85;margin-top:2px;">200 leads / mo · Premium leads unlocked · Priority listing · 5% commission</div>
        </div>
        <span class="chip" style="background:rgba(255,255,255,.2);color:#fff;font-weight:700;">Active</span>
      </div>
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;padding-top:14px;border-top:1px solid rgba(255,255,255,.15);">
        <div><div style="font-size:11px;opacity:.7;letter-spacing:.5px;font-weight:600;">SUBSCRIPTION</div><div style="font-size:14px;font-weight:700;margin-top:2px;">₹12,999 / quarter</div></div>
        <div><div style="font-size:11px;opacity:.7;letter-spacing:.5px;font-weight:600;">COMMISSION</div><div style="font-size:14px;font-weight:700;margin-top:2px;">5% per confirmed order</div></div>
        <div><div style="font-size:11px;opacity:.7;letter-spacing:.5px;font-weight:600;">NEXT RENEWAL</div><div style="font-size:14px;font-weight:700;margin-top:2px;">15 Aug 2026</div></div>
        <div><div style="font-size:11px;opacity:.7;letter-spacing:.5px;font-weight:600;">LEADS USED (MO)</div><div style="font-size:14px;font-weight:700;margin-top:2px;">87 / 200</div></div>
      </div>
      <div style="display:flex;gap:8px;margin-top:18px;">
        <button class="btn" style="background:#fff;color:var(--primary);">Manage subscription</button>
        <button class="btn" style="background:rgba(255,255,255,.18);color:#fff;border:1px solid rgba(255,255,255,.2);">View commission ledger</button>
      </div>
    </div>

    <!-- Lead usage -->
    <div class="card mb-20">
      <div class="card-head"><h3>Lead usage · this billing cycle</h3><span class="muted" style="font-size:13px;">Resets 15 Aug 2026</span></div>
      <div class="row-between" style="font-size:14px;margin-bottom:8px;"><strong>87 leads consumed</strong><span class="muted">113 remaining of 200</span></div>
      <div style="background:var(--bg-2);height:10px;border-radius:5px;overflow:hidden;"><div style="background:linear-gradient(90deg,var(--primary),var(--accent));height:100%;width:43%;"></div></div>
      <div class="divider"></div>
      <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;text-align:center;">
        <div><div style="font-size:20px;font-weight:800;">87</div><div class="muted" style="font-size:11px;letter-spacing:.5px;">VIEWED</div></div>
        <div><div style="font-size:20px;font-weight:800;color:var(--success);">38</div><div class="muted" style="font-size:11px;letter-spacing:.5px;">QUOTED</div></div>
        <div><div style="font-size:20px;font-weight:800;color:var(--primary);">14</div><div class="muted" style="font-size:11px;letter-spacing:.5px;">AWARDED</div></div>
        <div><div style="font-size:20px;font-weight:800;color:var(--accent);">12</div><div class="muted" style="font-size:11px;letter-spacing:.5px;">PREMIUM UNLOCKED</div></div>
      </div>
    </div>

    <!-- Switch plan -->
    <div class="page-header" style="margin-top:8px;">
      <div class="page-title"><h2 style="font-size:18px;font-weight:800;margin:0;">Change plan</h2><p>Pick a billing cycle, compare tiers, switch instantly.</p></div>
    </div>

    <div class="cycle-toggle">
      <div>Monthly</div>
      <div class="on">Quarterly</div>
      <div>Yearly · save 20%</div>
    </div>

    <div class="grid-3 mb-20">
      <div class="tier-card">
        <h3 style="font-size:18px;font-weight:800;margin:0 0 4px;">Starter</h3>
        <p class="muted" style="font-size:13px;margin:0 0 14px;">Solo vendors</p>
        <div style="display:flex;align-items:baseline;gap:4px;margin-bottom:14px;"><span style="font-size:32px;font-weight:900;line-height:1;">₹4,999</span><span class="muted" style="font-size:13px;">/ quarter</span></div>
        <div style="font-size:11px;color:var(--text-3);background:var(--bg);padding:6px 10px;border-radius:6px;text-align:center;font-weight:600;letter-spacing:.3px;">+ 5% commission on conversions</div>
        <div class="divider"></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>50 leads viewable / month</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Up to 2 service categories</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Standard support</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--text-3);width:14px;text-align:center;">×</span><span class="muted">Premium leads locked</span></div>
        <button class="btn btn-outline btn-block mt-12">Downgrade</button>
      </div>

      <div class="tier-card featured current">
        <div class="tier-badge">YOUR PLAN</div>
        <h3 style="font-size:18px;font-weight:800;margin:0 0 4px;color:var(--primary);">Pro</h3>
        <p class="muted" style="font-size:13px;margin:0 0 14px;">Growing fleets</p>
        <div style="display:flex;align-items:baseline;gap:4px;margin-bottom:14px;"><span style="font-size:32px;font-weight:900;line-height:1;color:var(--primary);">₹12,999</span><span class="muted" style="font-size:13px;">/ quarter</span></div>
        <div style="font-size:11px;color:var(--primary);background:var(--primary-light);padding:6px 10px;border-radius:6px;text-align:center;font-weight:600;letter-spacing:.3px;">+ 5% commission on conversions</div>
        <div class="divider"></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span><strong>200 leads / month</strong></span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>All service categories</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Premium leads unlocked</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Priority listing in search</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Priority support</span></div>
        <button class="btn btn-primary btn-block mt-12" disabled style="opacity:.6;cursor:default;">Current plan</button>
      </div>

      <div class="tier-card">
        <h3 style="font-size:18px;font-weight:800;margin:0 0 4px;">Elite</h3>
        <p class="muted" style="font-size:13px;margin:0 0 14px;">Large fleet operators</p>
        <div style="display:flex;align-items:baseline;gap:4px;margin-bottom:14px;"><span style="font-size:32px;font-weight:900;line-height:1;">₹29,999</span><span class="muted" style="font-size:13px;">/ quarter</span></div>
        <div style="font-size:11px;color:var(--text-3);background:var(--bg);padding:6px 10px;border-radius:6px;text-align:center;font-weight:600;letter-spacing:.3px;">+ 5% commission on conversions</div>
        <div class="divider"></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span><strong>Unlimited leads</strong></span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Premium leads unlocked</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Featured on buyer dashboard</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Multi-user team accounts</span></div>
        <div class="row" style="gap:8px;padding:6px 0;font-size:13px;"><span style="color:var(--success);width:14px;text-align:center;font-weight:800;">✓</span><span>Dedicated account manager &amp; API</span></div>
        <button class="btn btn-primary btn-block mt-12">Upgrade to Elite</button>
      </div>
    </div>

    <!-- Commission explanation -->
    <div class="card mb-20" style="border:1.5px dashed var(--border);background:var(--bg);">
      <div class="row" style="gap:14px;align-items:center;">
        <div style="width:38px;height:38px;background:var(--accent-light);color:var(--accent);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:18px;font-weight:800;">5%</div>
        <div class="flex-1">
          <strong style="font-size:14px;">Commission on lead conversion · 5%</strong>
          <div class="muted" style="font-size:13px;margin-top:2px;">Charged when a lead converts to a confirmed order. Deducted automatically from your settlement on completion. Same rate across all plans.</div>
        </div>
        <a class="btn btn-outline" href="/vendor/payouts">View ledger</a>
      </div>
    </div>

    <!-- Payment methods + billing history -->
    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>Payment methods</h3><button class="btn btn-sm btn-outline">+ Add method</button></div>
        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--bg);border-radius:10px;margin-bottom:8px;border:1.5px solid var(--primary);">
          <div style="width:42px;height:42px;background:var(--primary-light);color:var(--primary);border-radius:9px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:12px;">UPI</div>
          <div class="flex-1"><strong style="font-size:13px;">UPI · vendor@hdfc</strong><div class="muted" style="font-size:12px;">Auto-debit · primary</div></div>
          <span class="chip chip-primary">Default</span>
        </div>
        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--bg);border-radius:10px;margin-bottom:8px;">
          <div style="width:42px;height:42px;background:#0F3D7B;color:#fff;border-radius:9px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:11px;">VISA</div>
          <div class="flex-1"><strong style="font-size:13px;">HDFC Credit •••• 4421</strong><div class="muted" style="font-size:12px;">Exp 09/27</div></div>
          <button class="btn btn-ghost btn-sm">Edit</button>
        </div>
        <div style="display:flex;align-items:center;gap:12px;padding:12px;background:var(--bg);border-radius:10px;">
          <div style="width:42px;height:42px;background:var(--bg-2);color:var(--text-2);border-radius:9px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:11px;">NET</div>
          <div class="flex-1"><strong style="font-size:13px;">Net banking · HDFC</strong><div class="muted" style="font-size:12px;">For yearly plans only</div></div>
          <button class="btn btn-ghost btn-sm">Edit</button>
        </div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Auto-renewal</h3></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong style="font-size:13px;">Auto-renew on 15 Aug 2026</strong><div class="muted" style="font-size:12px;">UPI · vendor@hdfc</div></div><span class="chip chip-success">On</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong style="font-size:13px;">Renewal reminder</strong><div class="muted" style="font-size:12px;">7 days before</div></div><span class="chip chip-success">On</span></div>
        <div class="row-between" style="padding:10px 0;"><div><strong style="font-size:13px;">Invoice receipt</strong><div class="muted" style="font-size:12px;">accounts@mumbaimarine.in</div></div><span class="chip chip-success">On</span></div>
        <div class="divider"></div>
        <button class="btn btn-ghost btn-block" style="color:var(--danger);">Cancel auto-renewal</button>
      </div>
    </div>

    <!-- Billing history -->
    <div class="table-wrap">
      <div class="table-head"><h3>Billing history</h3><div class="table-filters"><span class="tab active">All (12)</span><span class="tab">Subscription (3)</span><span class="tab">Commission (8)</span><span class="tab">Refunds (1)</span></div></div>
      <table class="t">
        <thead><tr><th>Date</th><th>Description</th><th>Reference</th><th>Method</th><th>Amount</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($invoices as $inv)
            <tr>
              <td>{{ $inv->issued_at ? $inv->issued_at->format('d M Y') : '—' }}</td>
              <td><strong>{{ $inv->number }}</strong><div class="muted" style="font-size:12px;">{{ $inv->order->reference ? '#'.$inv->order->reference : '—' }}</div></td>
              <td>{{ $inv->number }}</td>
              <td>{{ $inv->currency }}</td>
              <td class="t-amount">₹{{ number_format($inv->total) }}</td>
              <td><span class="chip @if($inv->status==='paid') chip-success @else chip-warning @endif">{{ ucfirst($inv->status) }}</span></td>
              <td><button class="btn btn-sm btn-outline" type="button">PDF</button></td>
            </tr>
          @empty
            <tr><td colspan="7" class="muted" style="text-align:center;padding:24px;">No invoices yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>
