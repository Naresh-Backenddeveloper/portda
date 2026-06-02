<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA — 10 · Notifications</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>10 · Notifications</h1><p>3 screens — vessel ETA, berth, tide &amp; clearance alerts</p></div>
  </div>
  <a class="back-link" href="/mobile/buyer">← All modules</a>
</div>

<div class="module-nav">
  <a href="/mobile/buyer">Home</a>
  <a href="/mobile/buyer/01-onboarding">01 Onboarding</a>
  <a href="/mobile/buyer/02-auth">02 Auth</a>
  <a href="/mobile/buyer/03-home">03 Home</a>
  <a href="/mobile/buyer/04-service-request">04 Service Request</a>
  <a href="/mobile/buyer/05-quotations">05 Quotations</a>
  <a href="/mobile/buyer/06-chat">06 Chat</a>
  <a href="/mobile/buyer/07-orders">07 Orders</a>
  <a href="/mobile/buyer/08-payments">08 Payments</a>
  <a href="/mobile/buyer/09-reviews">09 Reviews</a>
  <a href="/mobile/buyer/10-notifications">10 Notifications</a>
  <a href="/mobile/buyer/11-profile">11 Profile</a>
  <a href="/mobile/buyer/12-settings">12 Settings</a>
</div>

<div class="screens-grid">

  <!-- 10.1 NOTIFICATIONS LIST -->
  <div class="screen-wrap">
    <div class="screen-label">10.1 Notifications List</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Notifications</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.6 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div></div>
        <div class="screen-body">
          <div class="row-between mt-4 mb-8"><div class="txt-xs text-2 semi">TODAY</div><div class="txt-xs text-primary semi">Mark all read</div></div>
          <div class="card" style="border-left:3px solid var(--primary);background:var(--primary-light);border-right:1px solid var(--border-2);border-top:1px solid var(--border-2);border-bottom:1px solid var(--border-2);">
            <div class="row gap-10">
              <div class="icon-box bg-card text-primary" style="width:36px;height:36px;font-size:14px;">⚓</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Berth T4 allocated</div><div class="txt-xs text-2">2m</div></div>
                <div class="txt-xs text-2 mt-4" style="line-height:1.5;">JNPT confirmed Berth T4 for MV Sea Trader at 14:00 IST · 15 May</div>
              </div>
            </div>
          </div>
          <div class="card" style="border-left:3px solid var(--accent);">
            <div class="row gap-10">
              <div class="icon-box bg-accent-light text-accent" style="width:36px;height:36px;font-size:14px;">₹</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">New quotation received</div><div class="txt-xs text-2">25m</div></div>
                <div class="txt-xs text-2 mt-4">Mumbai Marine quoted ₹1.85L for #PORT-48217</div>
              </div>
            </div>
          </div>
          <div class="card" style="border-left:3px solid var(--success);">
            <div class="row gap-10">
              <div class="icon-box bg-success-light text-success" style="width:36px;height:36px;font-size:14px;">✓</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Payment received</div><div class="txt-xs text-2">3h</div></div>
                <div class="txt-xs text-2 mt-4">Advance ₹43,660 settled for #PORT-48217</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-warning-light text-warning" style="width:36px;height:36px;font-size:14px;">🌊</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Tide window update</div><div class="txt-xs text-2">5h</div></div>
                <div class="txt-xs text-2 mt-4">High tide at JNPT 13:42 IST · 4.1m · OK for draft 11.4m</div>
              </div>
            </div>
          </div>
          <div class="txt-xs text-2 semi mt-12 mb-8">YESTERDAY</div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:14px;">🛃</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Customs clearance pending</div><div class="txt-xs text-2">1d</div></div>
                <div class="txt-xs text-2 mt-4">IGM filing required for MV Sea Trader inbound</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-accent-light text-accent" style="width:36px;height:36px;font-size:14px;">⚠</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Weather advisory</div><div class="txt-xs text-2">1d</div></div>
                <div class="txt-xs text-2 mt-4">SW monsoon active · 25–30 kn winds at Mumbai outer anchorage</div>
              </div>
            </div>
          </div>
          <div class="txt-xs text-2 semi mt-12 mb-8">12 MAY</div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:14px;">↓</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Refund processed</div><div class="txt-xs text-2">3d</div></div>
                <div class="txt-xs text-2 mt-4">₹45,000 credited · Cancelled survey</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 10.2 NOTIFICATION DETAILS -->
  <div class="screen-wrap">
    <div class="screen-label">10.2 Notification Details</div>
    <div class="phone">
      <div class="screen" data-tab="me">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Notification</h2><div class="icon-btn"><svg class="filled" viewBox="0 0 24 24" fill="currentColor" stroke="none"><circle cx="12" cy="5" r="1.7"/><circle cx="12" cy="12" r="1.7"/><circle cx="12" cy="19" r="1.7"/></svg></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;">
            <div class="row gap-10">
              <div class="icon-box" style="background:rgba(255,255,255,.2);color:#fff;width:48px;height:48px;font-size:20px;">⚓</div>
              <div class="flex-1">
                <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">PORT AUTHORITY</div>
                <div class="txt-md bold mt-4">Berth T4 allocated</div>
                <div class="txt-xs mt-4" style="opacity:.85;">2 minutes ago · JNPT</div>
              </div>
            </div>
          </div>
          <div class="card mt-12">
            <div class="txt-xs text-2 semi mb-8">DETAILS</div>
            <div class="txt-sm" style="line-height:1.6;">JNPT Marine Operations has allocated <span class="bold">Berth T4</span> for <span class="bold">MV Sea Trader</span> at <span class="bold">14:00 IST</span> on 15 May 2026. Please ensure pilot boarding and tug services are in place.</div>
          </div>
          <div class="card">
            <div class="row gap-10">
              <div class="img-ph" style="width:48px;height:48px;border-radius:12px;">🚢</div>
              <div class="flex-1">
                <div class="txt-sm semi">MV Sea Trader</div>
                <div class="txt-xs text-2">IMO 9412358 · LOA 294m · Draft 11.4m</div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="txt-xs text-2 semi mb-8">BERTH INFO</div>
            <div class="row-between"><div class="txt-xs text-2">Terminal</div><div class="txt-xs semi">T4 (BMCT)</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Length</div><div class="txt-xs semi">330 m</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Depth</div><div class="txt-xs semi">14.5 m</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Slot</div><div class="txt-xs semi">15 May, 14:00–17:00 IST</div></div>
          </div>
          <div class="card" style="background:var(--bg);border:none;">
            <div class="row gap-10"><div class="text-warning">⚠</div><div class="txt-xs text-2">Berth ETA may shift ±30 min based on tide and prior vessel departure</div></div>
          </div>
        </div>
        <div class="bottom-cta" style="display:flex;gap:8px;">
          <button class="btn btn-outline flex-1">View Order</button>
          <button class="btn btn-primary flex-1">Confirm Schedule</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 10.3 PUSH NOTIFICATION -->
  <div class="screen-wrap">
    <div class="screen-label">10.3 Push Notification Preview</div>
    <div class="phone">
      <div class="screen" style="background:linear-gradient(180deg,#27272A 0%,#000000 100%);color:#fff;">
        <div class="status-bar dark"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="text-align:center;padding:30px 0 8px;">
          <div class="txt-3xl bold">9:41</div>
          <div class="txt-md" style="opacity:.85;">Thursday, 15 May</div>
        </div>
        <div style="padding:12px;display:flex;flex-direction:column;gap:8px;">
          <div style="background:rgba(255,255,255,.12);backdrop-filter:blur(10px);border-radius:14px;padding:12px;">
            <div class="row gap-8 mb-4">
              <div class="brand-mark" style="width:22px;height:22px;font-size:11px;border-radius:6px;">⚓</div>
              <div class="txt-xs" style="opacity:.7;">PORTDA · now</div>
            </div>
            <div class="txt-sm semi">⚓ Berth T4 allocated · MV Sea Trader</div>
            <div class="txt-xs mt-4" style="opacity:.85;line-height:1.4;">JNPT confirmed Berth T4 at 14:00 IST. Tap to confirm pilot &amp; tugs.</div>
          </div>
          <div style="background:rgba(255,255,255,.12);backdrop-filter:blur(10px);border-radius:14px;padding:12px;">
            <div class="row gap-8 mb-4">
              <div class="brand-mark" style="width:22px;height:22px;font-size:11px;border-radius:6px;">⚓</div>
              <div class="txt-xs" style="opacity:.7;">PORTDA · 8m ago</div>
            </div>
            <div class="txt-sm semi">🚢 Pilot boarding in 30 min</div>
            <div class="txt-xs mt-4" style="opacity:.85;line-height:1.4;">Capt. Singh at Pilot Stn 12.5 nm SW · Channel 14 VHF</div>
          </div>
          <div style="background:rgba(255,255,255,.08);backdrop-filter:blur(10px);border-radius:14px;padding:12px;">
            <div class="row gap-8 mb-4">
              <div class="brand-mark" style="width:22px;height:22px;font-size:11px;border-radius:6px;">⚓</div>
              <div class="txt-xs" style="opacity:.7;">PORTDA · 2 notifications</div>
            </div>
            <div class="txt-sm semi">PORTDA</div>
            <div class="txt-xs mt-4" style="opacity:.85;">2 new messages from Mumbai Marine Agencies</div>
          </div>
        </div>
        <div style="flex:1;"></div>
        <div style="padding:20px 16px 30px;text-align:center;">
          <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);padding:10px 20px;border-radius:999px;">
            <div style="width:8px;height:8px;background:#fff;border-radius:50%;opacity:.7;"></div>
            <div class="txt-xs" style="opacity:.85;">Swipe up to open</div>
          </div>
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
