<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA Vendor — 03 · Dashboard</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>Vendor · 03 · Dashboard</h1><p>3 screens — daily ops home for marine service vendors</p></div>
  </div>
  <a class="back-link" href="/mobile/vendor">← All modules</a>
</div>

<div class="module-nav"><a href="/mobile/vendor">Vendor home</a><a href="/mobile/vendor/01-onboarding">01 Onboarding</a><a href="/mobile/vendor/02-auth">02 Auth</a><a href="/mobile/vendor/03-home">03 Dashboard</a><a href="/mobile/vendor/04-rfq-inbox">04 Request Inbox</a><a href="/mobile/vendor/05-quotations">05 Quotations</a><a href="/mobile/vendor/06-chat">06 Chat</a><a href="/mobile/vendor/07-jobs">07 Jobs</a><a href="/mobile/vendor/08-payouts">08 Payouts</a><a href="/mobile/vendor/09-reviews">09 Reviews</a><a href="/mobile/vendor/10-notifications">10 Notifications</a><a href="/mobile/vendor/11-profile">11 Profile</a><a href="/mobile/vendor/12-settings">12 Settings</a></div>

<div class="screens-grid">

  <!-- 3.1 Vendor Dashboard -->
  <div class="screen-wrap">
    <div class="screen-label">3.1 Vendor Dashboard</div>
    <div class="phone">
      <div class="screen" data-tab="home">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="padding:10px 16px 14px;background:#fff;">
          <div class="row-between" style="margin-bottom:10px;">
            <div class="row" style="gap:8px;align-items:center;">
              <div style="width:32px;height:32px;background:linear-gradient(135deg,var(--primary),#27272A);color:#fff;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:16px;">⚓</div>
              <div style="font-size:14px;font-weight:900;letter-spacing:.5px;color:var(--text);">PORTDA</div>
            </div>
            <div class="row" style="gap:8px;align-items:center;">
              <div class="notif-btn">
                <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg>
                <span class="notif-dot"></span>
              </div>
              <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--primary),#27272A);color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;cursor:pointer;border:2px solid #fff;box-shadow:0 0 0 1px var(--border-2);">MM</div>
            </div>
          </div>
          <div class="search-bar">
            <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
            <input placeholder="Search requests, buyers, vessels..." />
          </div>
        </div>
        <div class="screen-body" style="background:var(--bg);padding-top:12px;">
          <div class="banner banner-1">
            <div class="row-between">
              <div>
                <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">TODAY'S EARNINGS</div>
                <div class="txt-2xl bold mt-4">₹3,42,650</div>
                <div class="txt-xs mt-4" style="opacity:.85;">+22% vs yesterday</div>
              </div>
              <div style="font-size:32px;opacity:.5;">₹</div>
            </div>
          </div>
          <div class="stat-strip mt-12">
            <div class="stat-cell"><div class="stat-label">NEW Request</div><div class="stat-value text-primary">7</div></div>
            <div class="stat-cell"><div class="stat-label">JOBS</div><div class="stat-value text-warning">3</div></div>
            <div class="stat-cell"><div class="stat-label">RATING</div><div class="stat-value text-accent">★ 4.9</div></div>
          </div>
          <div class="row-between mt-16 mb-8"><div class="semi txt-md">New Requests</div><div class="txt-sm text-primary semi">See all</div></div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2">#PORT-48512 · Inbound</div><div class="chip chip-warning">⏱ 28m left</div></div>
            <div class="row gap-10 mt-8">
              <div class="img-ph" style="width:42px;height:42px;border-radius:10px;">🚢</div>
              <div class="flex-1">
                <div class="txt-sm semi">MV Pacific Bridge</div>
                <div class="txt-xs text-2">JNPT · ETA 17 May 09:00 · ₹1.5L–2.5L</div>
              </div>
            </div>
            <div class="row gap-8 mt-12"><button class="btn btn-outline btn-sm flex-1">View</button><button class="btn btn-primary btn-sm flex-1">Send Quote</button></div>
          </div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2">#PORT-48510 · Inbound</div><div class="chip chip-warning">⏱ 2h left</div></div>
            <div class="row gap-10 mt-8">
              <div class="img-ph accent" style="width:42px;height:42px;border-radius:10px;">🚢</div>
              <div class="flex-1">
                <div class="txt-sm semi">MV Star Voyager</div>
                <div class="txt-xs text-2">JNPT · ETA 18 May 14:00 · ₹2L–3L</div>
              </div>
            </div>
          </div>
          <div class="row-between mt-16 mb-8"><div class="semi txt-md">Today's jobs</div><div class="txt-sm text-primary semi">See all</div></div>
          <div class="card">
            <div class="row gap-10">
              <div class="img-ph" style="width:42px;height:42px;border-radius:10px;">OL</div>
              <div class="flex-1">
                <div class="txt-sm semi">OceanLink Shipping</div>
                <div class="txt-xs text-2">#PORT-48217 · 13:00 IST · ₹2.18 L</div>
              </div>
              <span class="chip chip-primary">In Progress</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.2 Earnings overview -->
  <div class="screen-wrap">
    <div class="screen-label">3.2 Earnings Overview</div>
    <div class="phone">
      <div class="screen" data-tab="home">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Earnings</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="14" y2="12"/><line x1="4" y1="18" x2="9" y2="18"/></svg></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">THIS MONTH · MAY 2026</div>
            <div class="txt-3xl bold mt-4">₹38.4 L</div>
            <div class="txt-xs mt-4" style="opacity:.85;">+18% vs Apr · 28 jobs completed</div>
          </div>
          <div class="tabs mt-12">
            <div class="tab">Week</div>
            <div class="tab active">Month</div>
            <div class="tab">Year</div>
          </div>
          <div class="semi txt-md mt-16 mb-8">Daily breakdown</div>
          <div class="card">
            <div class="row" style="align-items:flex-end;gap:4px;height:96px;justify-content:space-between;">
              <div style="width:6%;height:30%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:55%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:42%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:68%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:50%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:75%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:90%;background:var(--primary);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:62%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:80%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:45%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:70%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
              <div style="width:6%;height:100%;background:var(--primary-light);border-radius:3px 3px 0 0;"></div>
            </div>
          </div>
          <div class="semi txt-md mt-16 mb-8">Top buyers</div>
          <div class="card"><div class="row gap-10"><div class="img-ph" style="width:36px;height:36px;border-radius:9px;font-size:11px;">OL</div><div class="flex-1"><div class="txt-sm semi">OceanLink Shipping</div><div class="txt-xs text-2">8 jobs · ₹14.2 L</div></div></div></div>
          <div class="card"><div class="row gap-10"><div class="img-ph accent" style="width:36px;height:36px;border-radius:9px;font-size:11px;">SF</div><div class="flex-1"><div class="txt-sm semi">Saffron Fleet Mgmt</div><div class="txt-xs text-2">5 jobs · ₹9.8 L</div></div></div></div>
          <div class="card"><div class="row gap-10"><div class="img-ph success" style="width:36px;height:36px;border-radius:9px;font-size:11px;">MS</div><div class="flex-1"><div class="txt-sm semi">Mariner Shipping Co.</div><div class="txt-xs text-2">4 jobs · ₹7.4 L</div></div></div></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.3 Search Requests -->
  <div class="screen-wrap">
    <div class="screen-label">3.3 Search Requests &amp; Buyers</div>
    <div class="phone">
      <div class="screen" data-tab="home">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="padding:8px 16px;background:#fff;">
          <div class="row gap-8">
            <div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div>
            <div class="search-bar flex-1">
              <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
              <input placeholder="Search Request, buyer, vessel..."/>
            </div>
          </div>
        </div>
        <div class="screen-body" style="padding-top:14px;">
          <div class="txt-sm text-2 semi mb-8">RECENT SEARCHES</div>
          <div class="list-item"><div class="icon-box bg-bg" style="background:var(--bg);font-size:14px;">⌚</div><div class="flex-1 txt-md">OceanLink Shipping</div><div class="text-2 txt-sm">↖</div></div>
          <div class="list-item"><div class="icon-box bg-bg" style="background:var(--bg);font-size:14px;">⌚</div><div class="flex-1 txt-md">MV Pacific Bridge</div><div class="text-2 txt-sm">↖</div></div>
          <div class="txt-sm text-2 semi mt-16 mb-8">TRENDING</div>
          <div class="row gap-6" style="flex-wrap:wrap;">
            <span class="chip chip-gray">Inbound JNPT</span>
            <span class="chip chip-gray">Container vessels</span>
            <span class="chip chip-gray">Express Requests</span>
          </div>
          <div class="txt-sm text-2 semi mt-16 mb-8">QUICK FILTERS</div>
          <div class="card"><div class="row gap-10"><div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:14px;">⚡</div><div class="flex-1"><div class="txt-sm semi">Urgent Requests (&lt; 2h)</div><div class="txt-xs text-2">High-priority requests</div></div></div></div>
          <div class="card"><div class="row gap-10"><div class="icon-box bg-success-light text-success" style="width:36px;height:36px;font-size:14px;">★</div><div class="flex-1"><div class="txt-sm semi">From top buyers</div><div class="txt-xs text-2">Repeat customers</div></div></div></div>
          <div class="card"><div class="row gap-10"><div class="icon-box bg-accent-light text-accent" style="width:36px;height:36px;font-size:14px;">₹</div><div class="flex-1"><div class="txt-sm semi">High-value (&gt; ₹5L)</div><div class="txt-xs text-2">Large bookings</div></div></div></div>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="/assets/tabbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="/assets/download.js"></script>
</body>
</html>
