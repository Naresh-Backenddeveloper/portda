<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA — 04 · Service Request</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>04 · Service Request</h1><p>8 screens — raise a port service request for your vessel</p></div>
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

  <!-- 4.1 CREATE SERVICE REQUEST -->
  <div class="screen-wrap">
    <div class="screen-label">4.1 Create Service Request</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>New Request</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/></svg></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">STEP 1 OF 5</div>
            <div class="txt-lg bold mt-4">What service do you need?</div>
            <div class="txt-sm mt-4" style="opacity:.9;">Quick steps to raise a port service request</div>
          </div>
          <div class="semi txt-md mt-16 mb-8">Quick start</div>
          <div class="grid-2">
            <div class="card" style="border:1.5px solid var(--primary);background:var(--primary-light);">
              <div class="icon-box bg-card text-primary" style="margin-bottom:6px;">⚓</div>
              <div class="txt-sm semi">Ship Agents</div>
              <div class="txt-xs text-2 mt-4">Port · Husbandry · Transit</div>
            </div>
            <div class="card">
              <div class="icon-box bg-accent-light text-accent" style="margin-bottom:6px;">⛽</div>
              <div class="txt-sm semi">Bunkering</div>
              <div class="txt-xs text-2 mt-4">VLSFO · MGO · Lubes</div>
            </div>
            <div class="card">
              <div class="icon-box bg-success-light text-success" style="margin-bottom:6px;">📦</div>
              <div class="txt-sm semi">Stevedores / Cargo Handling</div>
              <div class="txt-xs text-2 mt-4">Stevedoring · Lashing</div>
            </div>
            <div class="card">
              <div class="icon-box bg-warning-light text-warning" style="margin-bottom:6px;">⊜</div>
              <div class="txt-sm semi">Other</div>
              <div class="txt-xs text-2 mt-4">Survey · Repair · Crew</div>
            </div>
          </div>
          <div class="card mt-16" style="background:var(--bg);border:none;">
            <div class="txt-sm semi">Vessel emergency?</div>
            <div class="txt-xs text-2 mt-4">Get priority quotes from on-call emergency tugs, salvage &amp; medical services</div>
            <button class="btn btn-outline btn-sm mt-8">⚡ Emergency Request</button>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Continue →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.2 SELECT CATEGORY -->
  <div class="screen-wrap">
    <div class="screen-label">4.2 Select Service Type</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Service Type</h2><div class="txt-xs text-2 semi">2/5</div></div>
        <div class="steps" style="padding:0 16px;margin:0 0 12px;">
          <span class="dot active" style="background:var(--success);"></span>
          <span class="dot active"></span>
          <span class="dot"></span><span class="dot"></span><span class="dot"></span>
        </div>
        <div style="padding:0 16px 8px;">
          <div class="search-bar">
            <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
            <input placeholder="Search service..." />
          </div>
        </div>
        <div class="screen-body">
          <div class="list-item" style="border:1.5px solid var(--primary);background:var(--primary-light);"><div class="icon-box bg-card text-primary">⚓</div><div class="flex-1"><div class="txt-md semi">Ship Agents</div><div class="txt-xs text-2">4 sub-services</div></div><div class="text-primary">●</div></div>
          <div class="list-item"><div class="icon-box bg-accent-light text-accent">⛽</div><div class="flex-1"><div class="txt-md semi">Bunkering</div><div class="txt-xs text-2">6 fuel types</div></div><div class="text-2">○</div></div>
          <div class="list-item"><div class="icon-box bg-success-light text-success">📦</div><div class="flex-1"><div class="txt-md semi">Stevedores / Cargo Handling</div><div class="txt-xs text-2">5 sub-services</div></div><div class="text-2">○</div></div>
          <div class="list-item"><div class="icon-box bg-warning-light text-warning">🔧</div><div class="flex-1"><div class="txt-md semi">Ship Repairs</div><div class="txt-xs text-2">12 categories</div></div><div class="text-2">○</div></div>
          <div class="list-item"><div class="icon-box bg-primary-light text-primary">📋</div><div class="flex-1"><div class="txt-md semi">Ship Management</div><div class="txt-xs text-2">9 types</div></div><div class="text-2">○</div></div>
          <div class="list-item"><div class="icon-box bg-danger-light text-danger">👥</div><div class="flex-1"><div class="txt-md semi">Ship Management</div><div class="txt-xs text-2">Sign-on / Off</div></div><div class="text-2">○</div></div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Next: Sub-service →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.3 SELECT SUBCATEGORY -->
  <div class="screen-wrap">
    <div class="screen-label">4.3 Ship Agents Sub-service</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Ship Agents</h2><div class="txt-xs text-2 semi">3/5</div></div>
        <div class="steps" style="padding:0 16px;margin:0 0 12px;">
          <span class="dot active" style="background:var(--success);"></span>
          <span class="dot active" style="background:var(--success);"></span>
          <span class="dot active"></span>
          <span class="dot"></span><span class="dot"></span>
        </div>
        <div class="screen-body">
          <div class="txt-sm text-2 mt-4">Select the specific service</div>
          <div class="grid-2 mt-12">
            <div class="card" style="border:1.5px solid var(--primary);background:var(--primary-light);text-align:center;">
              <div class="icon-box bg-card text-primary" style="margin:0 auto 6px;">🚢</div>
              <div class="txt-sm semi">Port Agency</div>
              <div class="txt-xs text-2 mt-4">From ₹85,000</div>
            </div>
            <div class="card" style="text-align:center;">
              <div class="icon-box bg-accent-light text-accent" style="margin:0 auto 6px;">🛟</div>
              <div class="txt-sm semi">Tug Assist</div>
              <div class="txt-xs text-2 mt-4">From ₹60,000</div>
            </div>
            <div class="card" style="text-align:center;">
              <div class="icon-box bg-warning-light text-warning" style="margin:0 auto 6px;">⚓</div>
              <div class="txt-sm semi">Mooring Boat</div>
              <div class="txt-xs text-2 mt-4">From ₹18,000</div>
            </div>
            <div class="card" style="text-align:center;">
              <div class="icon-box bg-success-light text-success" style="margin:0 auto 6px;">🧷</div>
              <div class="txt-sm semi">Mooring Lines</div>
              <div class="txt-xs text-2 mt-4">From ₹12,000</div>
            </div>
            <div class="card" style="text-align:center;">
              <div class="icon-box bg-danger-light text-danger" style="margin:0 auto 6px;">⊜</div>
              <div class="txt-sm semi">Berth Booking</div>
              <div class="txt-xs text-2 mt-4">As per Port</div>
            </div>
            <div class="card" style="text-align:center;">
              <div class="icon-box bg-primary-light text-primary" style="margin:0 auto 6px;">📌</div>
              <div class="txt-sm semi">Anchorage</div>
              <div class="txt-xs text-2 mt-4">Per day</div>
            </div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Next: Attachments →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.4 UPLOAD DOCS -->
  <div class="screen-wrap">
    <div class="screen-label">4.4 Documents &amp; Photos</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Attach Documents</h2><div class="txt-xs text-2 semi">4/5</div></div>
        <div class="screen-body">
          <p class="txt-sm text-2">Upload vessel particulars, class certs, GA plan or any relevant docs.</p>
          <div class="semi txt-sm mt-12 mb-8">Uploaded</div>
          <div class="card">
            <div class="row gap-10"><div class="icon-box bg-danger-light text-danger" style="width:36px;height:36px;font-size:13px;font-weight:900;">PDF</div><div class="flex-1"><div class="txt-sm semi">Vessel_Particulars_SeaTrader.pdf</div><div class="txt-xs text-2">428 KB · Uploaded ✓</div></div><div class="text-2">✕</div></div>
          </div>
          <div class="card">
            <div class="row gap-10"><div class="icon-box bg-danger-light text-danger" style="width:36px;height:36px;font-size:13px;font-weight:900;">PDF</div><div class="flex-1"><div class="txt-sm semi">Class_Certificate_IRS.pdf</div><div class="txt-xs text-2">1.2 MB · Uploaded ✓</div></div><div class="text-2">✕</div></div>
          </div>
          <div class="card">
            <div class="row gap-10"><div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:13px;font-weight:900;">DWG</div><div class="flex-1"><div class="txt-sm semi">GA_Plan_v3.dwg</div><div class="txt-xs text-2">2.8 MB · Uploaded ✓</div></div><div class="text-2">✕</div></div>
          </div>
          <div class="grid-3 mt-12">
            <div class="card" style="height:84px;display:flex;align-items:center;justify-content:center;border:2px dashed var(--border);flex-direction:column;gap:4px;">
              <div class="txt-xl text-primary">📄</div>
              <div class="txt-xs text-2 semi">PDF</div>
            </div>
            <div class="card" style="height:84px;display:flex;align-items:center;justify-content:center;border:2px dashed var(--border);flex-direction:column;gap:4px;">
              <div class="txt-xl text-primary">📷</div>
              <div class="txt-xs text-2 semi">Photo</div>
            </div>
            <div class="card" style="height:84px;display:flex;align-items:center;justify-content:center;border:2px dashed var(--border);flex-direction:column;gap:4px;">
              <div class="txt-xl text-primary">⊞</div>
              <div class="txt-xs text-2 semi">Browse</div>
            </div>
          </div>
          <div class="card mt-16" style="background:var(--bg);border:none;">
            <div class="row gap-10"><div class="text-warning">⚠</div><div class="txt-xs text-2">Max 10 files (PDF, DOC, DWG, JPG, PNG). Each under 10 MB.</div></div>
          </div>
          <div class="semi txt-sm mt-16">Suggested attachments</div>
          <div class="row gap-6 mt-8" style="flex-wrap:wrap;">
            <span class="chip chip-gray">Crew list</span>
            <span class="chip chip-gray">DA estimate</span>
            <span class="chip chip-gray">Loadline cert</span>
            <span class="chip chip-gray">ISSC</span>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Next: Schedule →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.6 DATE / TIME -->
  <div class="screen-wrap">
    <div class="screen-label">4.5 ETA / Service Window</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>When do you need it?</h2><div class="txt-xs text-2 semi">5/5</div></div>
        <div class="screen-body">
          <div class="tabs">
            <div class="tab active">Specific ETA</div>
            <div class="tab">On vessel arrival</div>
          </div>
          <div class="semi txt-sm mt-16">ETA at port</div>
          <div class="card mt-8">
            <div class="row-between mb-12"><div class="semi txt-sm">May 2026</div><div class="row gap-12"><span class="text-2">‹</span><span class="text-2">›</span></div></div>
            <div class="grid-3" style="grid-template-columns:repeat(7,1fr);gap:4px;text-align:center;font-size:10px;">
              <div class="text-2">M</div><div class="text-2">T</div><div class="text-2">W</div><div class="text-2">T</div><div class="text-2">F</div><div class="text-2">S</div><div class="text-2">S</div>
              <div class="text-3" style="padding:6px 0;">12</div><div style="padding:6px 0;">13</div><div style="padding:6px 0;">14</div><div style="padding:6px 0;background:var(--primary);color:#fff;border-radius:6px;font-weight:700;">15</div><div style="padding:6px 0;">16</div><div style="padding:6px 0;">17</div><div style="padding:6px 0;">18</div>
              <div style="padding:6px 0;">19</div><div style="padding:6px 0;">20</div><div style="padding:6px 0;">21</div><div style="padding:6px 0;">22</div><div style="padding:6px 0;">23</div><div style="padding:6px 0;">24</div><div style="padding:6px 0;">25</div>
            </div>
          </div>
          <div class="semi txt-sm mt-16">Time window (local)</div>
          <div class="grid-2 mt-8">
            <div class="card center"><div class="txt-sm semi">00:00 – 06:00</div><div class="txt-xs text-2">Night tide</div></div>
            <div class="card center"><div class="txt-sm semi">06:00 – 12:00</div><div class="txt-xs text-2">Morning</div></div>
            <div class="card center" style="border:1.5px solid var(--primary);background:var(--primary-light);"><div class="txt-sm semi text-primary">12:00 – 18:00</div><div class="txt-xs text-primary">Afternoon</div></div>
            <div class="card center"><div class="txt-sm semi">18:00 – 24:00</div><div class="txt-xs text-2">Evening</div></div>
          </div>
          <div class="card mt-12" style="background:#FFFBEB;border:1px solid #FDE68A;">
            <div class="row gap-10"><div class="text-warning">🌊</div><div class="txt-xs">High tide window at JNPT: 13:42 IST · 4.1m draft clearance OK for 11.4m</div></div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Next: Berth →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.8 LOCATION / BERTH -->
  <div class="screen-wrap">
    <div class="screen-label">4.6 Port &amp; Berth Selection</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Port &amp; Berth</h2><div class="txt-xs text-2 semi">5/5</div></div>
        <div class="steps" style="padding:0 16px;margin:0 0 12px;">
          <span class="dot active" style="background:var(--success);"></span><span class="dot active" style="background:var(--success);"></span><span class="dot active" style="background:var(--success);"></span><span class="dot active" style="background:var(--success);"></span><span class="dot active"></span>
        </div>
        <div class="screen-body">
          <h2 class="txt-lg bold">Where will the service take place?</h2>
          <p class="txt-sm text-2 mt-4">Choose the port and berth for this request.</p>

          <!-- Step 1: PORT -->
          <div class="txt-xs text-2 semi mt-16" style="letter-spacing:0.5px;">STEP 1 · PORT</div>
          <div class="search-bar mt-8">
            <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
            <input placeholder="Search ports by name or UN code..."/>
          </div>
          <label class="card mt-8" style="display:flex;align-items:center;gap:12px;border:1.5px solid var(--primary);background:var(--primary-light);padding:14px;">
            <div style="width:14px;height:14px;border:2px solid var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><div style="width:6px;height:6px;background:var(--primary);border-radius:50%;"></div></div>
            <div class="flex-1">
              <div class="row-between"><div class="txt-sm bold">JNPT, Mumbai</div><span class="chip chip-primary" style="font-size:9px;">INMUM</span></div>
              <div class="txt-xs text-2 mt-4">Container &amp; Bulk · 4 terminals · Global hub</div>
            </div>
          </label>
          <label class="card" style="display:flex;align-items:center;gap:12px;padding:14px;">
            <div style="width:14px;height:14px;border:2px solid var(--border);border-radius:50%;flex-shrink:0;"></div>
            <div class="flex-1">
              <div class="row-between"><div class="txt-sm semi">Mundra Port</div><span class="chip chip-gray" style="font-size:9px;">INMUN</span></div>
              <div class="txt-xs text-2 mt-4">Container &amp; Bulk · 3 terminals</div>
            </div>
          </label>
          <label class="card" style="display:flex;align-items:center;gap:12px;padding:14px;">
            <div style="width:14px;height:14px;border:2px solid var(--border);border-radius:50%;flex-shrink:0;"></div>
            <div class="flex-1">
              <div class="row-between"><div class="txt-sm semi">Chennai Port</div><span class="chip chip-gray" style="font-size:9px;">INMAA</span></div>
              <div class="txt-xs text-2 mt-4">Container · 4 terminals</div>
            </div>
          </label>

          <!-- Step 2: BERTH -->
          <div class="txt-xs text-2 semi mt-16" style="letter-spacing:0.5px;">STEP 2 · TERMINAL &amp; BERTH</div>
          <div class="grid-2 mt-8">
            <label class="card" style="padding:12px;border:1.5px solid var(--primary);background:var(--primary-light);">
              <div class="row-between"><div class="txt-sm bold text-primary">Berth T4</div><div class="chip chip-primary" style="font-size:9px;">BMCT</div></div>
              <div class="txt-xs text-2 mt-6">330m · 14.5m draft</div>
            </label>
            <label class="card" style="padding:12px;">
              <div class="row-between"><div class="txt-sm semi">Berth T3</div><div class="chip chip-gray" style="font-size:9px;">GTI</div></div>
              <div class="txt-xs text-2 mt-6">305m · 13.5m draft</div>
            </label>
            <label class="card" style="padding:12px;">
              <div class="row-between"><div class="txt-sm semi">Berth T1</div><div class="chip chip-gray" style="font-size:9px;">NSICT</div></div>
              <div class="txt-xs text-2 mt-6">280m · 12m draft</div>
            </label>
            <label class="card" style="padding:12px;">
              <div class="row-between"><div class="txt-sm semi">Anchorage</div><div class="chip chip-gray" style="font-size:9px;">B</div></div>
              <div class="txt-xs text-2 mt-6">Outer roads</div>
            </label>
          </div>

          <!-- Operational info -->
          <div class="card mt-16" style="background:var(--bg);border:none;">
            <div class="txt-xs text-2 semi mb-8">FOR THIS BERTH</div>
            <div class="row-between"><div class="txt-xs">Pilot boarding</div><div class="txt-xs semi">12.5 nm SW</div></div>
            <div class="row-between mt-4"><div class="txt-xs">Channel depth</div><div class="txt-xs semi">15.5 m</div></div>
            <div class="row-between mt-4"><div class="txt-xs">Tug rendezvous</div><div class="txt-xs semi">Inner anchorage</div></div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Continue to Preview →</button></div>
      </div>
    </div>
  </div>

  <!-- 4.9 REQUEST PREVIEW -->
  <div class="screen-wrap">
    <div class="screen-label">4.7 Request Preview</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Review &amp; Submit</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4z"/></svg></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">DRAFT REQUEST</div>
            <div class="txt-lg bold mt-4">Port Agency - MV Sea Trader</div>
            <div class="row gap-6 mt-8" style="flex-wrap:wrap;">
              <span class="chip" style="background:rgba(255,255,255,.2);color:#fff;">Ship Agents</span>
              <span class="chip" style="background:rgba(255,255,255,.2);color:#fff;">Tug</span>
              <span class="chip" style="background:rgba(255,255,255,.2);color:#fff;">Stevedoring</span>
            </div>
          </div>
          <div class="card mt-12">
            <div class="row-between"><div class="txt-xs text-2 semi">VESSEL</div><div class="text-primary txt-xs semi">Edit</div></div>
            <div class="txt-sm semi mt-4">MV Sea Trader</div>
            <div class="txt-xs text-2 mt-4">IMO 9412358 · LOA 294m · Draft 11.4m · DWT 75,000</div>
          </div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2 semi">OPERATION</div><div class="text-primary txt-xs semi">Edit</div></div>
            <div class="txt-sm mt-4" style="line-height:1.5;">Inbound from Singapore · Pilot + 2 tugs (4000 BHP) + mooring lines</div>
          </div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2 semi">ATTACHMENTS</div><div class="text-primary txt-xs semi">Edit</div></div>
            <div class="row gap-6 mt-8">
              <div class="icon-box bg-danger-light text-danger" style="width:36px;height:36px;font-size:11px;font-weight:900;">PDF</div>
              <div class="icon-box bg-danger-light text-danger" style="width:36px;height:36px;font-size:11px;font-weight:900;">PDF</div>
              <div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:11px;font-weight:900;">DWG</div>
            </div>
          </div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2 semi">ETA &amp; WINDOW</div><div class="text-primary txt-xs semi">Edit</div></div>
            <div class="txt-sm semi mt-4">Thu, 15 May · 12:00–18:00 IST</div>
          </div>
          <div class="card">
            <div class="row-between"><div class="txt-xs text-2 semi">PORT / BERTH</div><div class="text-primary txt-xs semi">Edit</div></div>
            <div class="txt-sm semi mt-4">JNPT · Terminal 4 · Berth T4</div>
          </div>
          <div class="row gap-8 mt-12">
            <div style="width:16px;height:16px;border:1.5px solid var(--primary);border-radius:4px;background:var(--primary);color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">✓</div>
            <div class="txt-xs text-2">I confirm details are accurate and agree to PORTDA's <span class="text-primary semi">terms</span></div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Submit Request</button></div>
      </div>
    </div>
  </div>

  <!-- 4.10 SUCCESS -->
  <div class="screen-wrap">
    <div class="screen-label">4.8 Request Submitted</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;text-align:center;gap:14px;">
          <div class="icon-box bg-success-light text-success" style="width:96px;height:96px;font-size:48px;border-radius:24px;">✓</div>
          <h2 class="txt-2xl bold">Request submitted!</h2>
          <p class="txt-md text-2" style="line-height:1.5;">We've notified licensed pilot, tug and mooring vendors at JNPT. Expect quotations within 30 minutes.</p>
          <div class="card full" style="text-align:left;background:var(--primary-light);border:none;">
            <div class="row-between"><div class="txt-xs text-2 semi">REQUEST ID</div><div class="txt-xs semi text-primary">Copy</div></div>
            <div class="txt-md bold text-primary mt-4">#PORT-2026-MUM-48217</div>
          </div>
          <div class="card full" style="text-align:left;">
            <div class="txt-xs text-2 semi mb-8">WHAT HAPPENS NEXT</div>
            <div class="row gap-10 mt-8"><div class="icon-box bg-primary-light text-primary" style="width:28px;height:28px;font-size:12px;">1</div><div class="txt-sm">Vendors review &amp; send quotations</div></div>
            <div class="row gap-10 mt-8"><div class="icon-box bg-primary-light text-primary" style="width:28px;height:28px;font-size:12px;">2</div><div class="txt-sm">Compare bids &amp; approve a vendor</div></div>
            <div class="row gap-10 mt-8"><div class="icon-box bg-primary-light text-primary" style="width:28px;height:28px;font-size:12px;">3</div><div class="txt-sm">Track service against vessel ETA</div></div>
          </div>
        </div>
        <div class="bottom-cta" style="display:flex;flex-direction:column;gap:8px;">
          <button class="btn btn-primary">Track My Request</button>
          <button class="btn btn-ghost">Back to Dashboard</button>
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
