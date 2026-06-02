<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA — 03 · Home</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>03 · Home</h1><p>5 screens — dashboard &amp; service discovery</p></div>
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

  <!-- 3.1 HOME DASHBOARD -->
  <div class="screen-wrap">
    <div class="screen-label">3.1 Vessel Ops Dashboard</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
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
              <div style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--accent),#C2410C);color:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;cursor:pointer;border:2px solid #fff;box-shadow:0 0 0 1px var(--border-2);">RK</div>
            </div>
          </div>
          <div class="location-pill" style="width:fit-content;">
            <div class="loc-icon">
              <svg viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 0-8 8c0 5.5 8 12 8 12s8-6.5 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <div class="loc-label">YOUR LOCATION</div>
              <div class="loc-value">Mumbai, MH <svg viewBox="0 0 12 12"><path d="M3 4.5l3 3 3-3"/></svg></div>
            </div>
          </div>
          <div class="search-bar mt-12">
            <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
            <input placeholder="Search 'agent', 'bunker', 'chandler'..." />
          </div>
        </div>
        <div class="screen-body" style="background:var(--bg);padding-top:12px;">
          <div class="banner banner-1">
            <div class="row-between">
              <div>
                <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">ACTIVE ORDER</div>
                <div class="txt-lg bold mt-4">Port Agency</div>
                <div class="txt-xs mt-4" style="opacity:.85;">#PORT-48217 · In Progress · Berth T4</div>
              </div>
              <div style="font-size:32px;opacity:.5;">⚓</div>
            </div>
          </div>
          <div class="stat-strip mt-12">
            <div class="stat-cell"><div class="stat-label">ACTIVE</div><div class="stat-value text-primary">5 orders</div></div>
            <div class="stat-cell"><div class="stat-label">PENDING</div><div class="stat-value text-warning">2 quotes</div></div>
            <div class="stat-cell"><div class="stat-label">DUE</div><div class="stat-value text-accent">₹2.3 L</div></div>
          </div>
          <div class="row-between mt-16 mb-8"><div class="semi txt-md">Port Services</div><div class="txt-sm text-primary semi">View all</div></div>
          <div class="grid-4">
            <div class="cat-tile"><div class="icon-box bg-primary-light text-primary">🚢</div><div class="txt-xs semi">Agents</div></div>
            <div class="cat-tile"><div class="icon-box bg-accent-light text-accent">📦</div><div class="txt-xs semi">Cargo</div></div>
            <div class="cat-tile"><div class="icon-box bg-success-light text-success">⛽</div><div class="txt-xs semi">Bunker</div></div>
            <div class="cat-tile"><div class="icon-box bg-warning-light text-warning">🔧</div><div class="txt-xs semi">Repairs</div></div>
            <div class="cat-tile"><div class="icon-box bg-primary-light text-primary">🛒</div><div class="txt-xs semi">Chandlers</div></div>
            <div class="cat-tile"><div class="icon-box bg-accent-light text-accent">🚛</div><div class="txt-xs semi">Transport</div></div>
            <div class="cat-tile"><div class="icon-box bg-success-light text-success">⚖</div><div class="txt-xs semi">Legal</div></div>
            <div class="cat-tile"><div class="icon-box bg-danger-light text-danger">+</div><div class="txt-xs semi">More</div></div>
          </div>
          <div class="row-between mt-16 mb-8"><div class="semi txt-md">Top vendors near you</div><div class="txt-sm text-primary semi">See all</div></div>
          <div class="service-card">
            <div class="img-ph">Mumbai Marine · Ship Agents</div>
            <div class="body">
              <div class="row-between"><div class="semi txt-md">Mumbai Marine Agencies</div><div class="chip chip-success">⭐ 4.9</div></div>
              <div class="txt-sm text-2 mt-4">Ship Agents · Avg ₹85,000/call</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.2 SEARCH -->
  <div class="screen-wrap">
    <div class="screen-label">3.2 Search Services</div>
    <div class="phone">
      <div class="screen" data-tab="home">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="padding:8px 16px;background:#fff;">
          <div class="row gap-8">
            <div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div>
            <div class="search-bar flex-1">
              <span class="s-icon"><svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="6"/><path d="m14.5 14.5 4 4"/></svg></span>
              <input placeholder="Search services..." value="bunker"/>
              <span class="s-icon" style="cursor:pointer;"><svg viewBox="0 0 20 20"><path d="M5 5l10 10M15 5L5 15"/></svg></span>
            </div>
          </div>
        </div>
        <div class="screen-body" style="padding-top:14px;">
          <div class="txt-sm text-2 semi mb-8">RECENT SEARCHES</div>
          <div class="list-item"><div class="icon-box bg-bg" style="background:var(--bg);font-size:14px;">⌚</div><div class="flex-1 txt-md">VLSFO bunker supply</div><div class="text-2 txt-sm">↖</div></div>
          <div class="list-item"><div class="icon-box bg-bg" style="background:var(--bg);font-size:14px;">⌚</div><div class="flex-1 txt-md">P&amp;I surveyor JNPT</div><div class="text-2 txt-sm">↖</div></div>
          <div class="list-item"><div class="icon-box bg-bg" style="background:var(--bg);font-size:14px;">⌚</div><div class="flex-1 txt-md">Hull cleaning divers</div><div class="text-2 txt-sm">↖</div></div>
          <div class="txt-sm text-2 semi mt-16 mb-8">SUGGESTED</div>
          <div class="list-item"><div class="icon-box bg-primary-light text-primary" style="font-size:16px;">⛽</div><div class="flex-1"><div class="txt-md semi">Bunker Supply (VLSFO/MGO)</div><div class="txt-xs text-2">in Fuel &amp; Lubes · 18 suppliers</div></div></div>
          <div class="list-item"><div class="icon-box bg-accent-light text-accent" style="font-size:16px;">⚒</div><div class="flex-1"><div class="txt-md semi">Bunker Barge Booking</div><div class="txt-xs text-2">in Logistics · 7 operators</div></div></div>
          <div class="list-item"><div class="icon-box bg-success-light text-success" style="font-size:16px;">📋</div><div class="flex-1"><div class="txt-md semi">Bunker Survey</div><div class="txt-xs text-2">in Survey · 24 surveyors</div></div></div>
          <div class="txt-sm text-2 semi mt-16 mb-8">TRENDING</div>
          <div class="row" style="flex-wrap:wrap;gap:6px;">
            <span class="chip chip-gray">Pilot booking</span>
            <span class="chip chip-gray">Tug assist</span>
            <span class="chip chip-gray">Garbage disposal</span>
            <span class="chip chip-gray">Crew change</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.3 CATEGORY LISTING -->
  <div class="screen-wrap">
    <div class="screen-label">3.3 All Port Services</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Port Services</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg></div></div>
        <div class="screen-body">
          <div class="grid-3 mt-8">
            <div class="cat-tile"><div class="icon-box bg-primary-light text-primary">🚢</div><div class="txt-xs semi center">Ship Agents</div></div>
            <div class="cat-tile"><div class="icon-box bg-success-light text-success">📦</div><div class="txt-xs semi center">Stevedores / Cargo</div></div>
            <div class="cat-tile"><div class="icon-box bg-primary-light text-primary">⚓</div><div class="txt-xs semi center">Ship Management</div></div>
            <div class="cat-tile"><div class="icon-box bg-warning-light text-warning">🔧</div><div class="txt-xs semi center">Ship Repairs</div></div>
            <div class="cat-tile"><div class="icon-box bg-accent-light text-accent">🛒</div><div class="txt-xs semi center">Ship Chandlers</div></div>
            <div class="cat-tile"><div class="icon-box bg-accent-light text-accent">⛽</div><div class="txt-xs semi center">Bunkering</div></div>
            <div class="cat-tile"><div class="icon-box bg-success-light text-success">🚛</div><div class="txt-xs semi center">Multi Modal Transport</div></div>
            <div class="cat-tile"><div class="icon-box bg-warning-light text-warning">🏭</div><div class="txt-xs semi center">Storage / Warehousing</div></div>
            <div class="cat-tile"><div class="icon-box bg-danger-light text-danger">⚖</div><div class="txt-xs semi center">Legal / Lawyers</div></div>
            <div class="cat-tile"><div class="icon-box bg-bg text-2">🛡</div><div class="txt-xs semi center">Insurance</div></div>
            <div class="cat-tile"><div class="icon-box bg-success-light text-success">💧</div><div class="txt-xs semi center">Fresh Water / Provisions</div></div>
            <div class="cat-tile"><div class="icon-box bg-warning-light text-warning">🗑</div><div class="txt-xs semi center">Waste / Slops</div></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.4 SUBCATEGORY -->
  <div class="screen-wrap">
    <div class="screen-label">3.4 Bunkering Services</div>
    <div class="phone">
      <div class="screen" data-tab="vendors">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Bunkering</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg></div></div>
        <div class="screen-body">
          <div class="banner banner-2 mt-8">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">LIVE PRICE · MUMBAI</div>
            <div class="txt-md bold mt-4">VLSFO ₹54,200 / MT</div>
            <div class="txt-xs mt-4" style="opacity:.85;">Updated 12 min ago · USD 651</div>
          </div>
          <div class="semi txt-md mt-16 mb-8">Fuel types</div>
          <div class="list-item"><div class="icon-box bg-primary-light text-primary">⛽</div><div class="flex-1"><div class="txt-md semi">VLSFO (0.5% S)</div><div class="txt-xs text-2">Very Low Sulphur Fuel Oil · 18 suppliers</div></div><div class="text-2">›</div></div>
          <div class="list-item"><div class="icon-box bg-accent-light text-accent">⛽</div><div class="flex-1"><div class="txt-md semi">MGO (DMA)</div><div class="txt-xs text-2">Marine Gas Oil · 14 suppliers</div></div><div class="text-2">›</div></div>
          <div class="list-item"><div class="icon-box bg-warning-light text-warning">⛽</div><div class="flex-1"><div class="txt-md semi">HSFO (3.5% S)</div><div class="txt-xs text-2">High Sulphur Fuel Oil · 8 suppliers</div></div><div class="text-2">›</div></div>
          <div class="list-item"><div class="icon-box bg-success-light text-success">🛢</div><div class="flex-1"><div class="txt-md semi">Marine Lubes</div><div class="txt-xs text-2">Cylinder oil &amp; system oil · 12 suppliers</div></div><div class="text-2">›</div></div>
          <div class="list-item"><div class="icon-box bg-primary-light text-primary">📋</div><div class="flex-1"><div class="txt-md semi">Bunker Survey</div><div class="txt-xs text-2">Pre/Post delivery · 24 surveyors</div></div><div class="text-2">›</div></div>
          <div class="list-item"><div class="icon-box bg-danger-light text-danger">🚢</div><div class="flex-1"><div class="txt-md semi">Bunker Barge</div><div class="txt-xs text-2">Barge delivery alongside · 7 operators</div></div><div class="text-2">›</div></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3.5 FEATURED VENDORS -->
  <div class="screen-wrap">
    <div class="screen-label">3.5 Featured Vendors</div>
    <div class="phone">
      <div class="screen" data-tab="vendors">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Featured Vendors</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="14" y2="12"/><line x1="4" y1="18" x2="9" y2="18"/></svg></div></div>
        <div class="screen-body">
          <!-- Filter chips -->
          <div class="filter-strip">
            <span class="filter-chip active">All</span>
            <span class="filter-chip">Ship Agents</span>
            <span class="filter-chip">Cargo Handling</span>
            <span class="filter-chip">Ship Mgmt</span>
            <span class="filter-chip">Repairs</span>
            <span class="filter-chip">Chandlers</span>
            <span class="filter-chip">Bunkering</span>
          </div>
          <!-- Result count + sort -->
          <div class="row-between mb-12">
            <div class="txt-xs text-2"><span class="bold text">42 vendors</span> near you</div>
            <div class="row gap-4"><span class="txt-xs text-2">Sort:</span><span class="txt-xs text-primary semi">Top rated ▾</span></div>
          </div>

          <!-- Vendor card 1 -->
          <div class="vendor-card">
            <div class="v-head">
              <div class="v-avatar">MM</div>
              <div class="v-meta">
                <div class="v-name-row">
                  <div class="v-name">Mumbai Marine Agencies</div>
                  <div class="v-badge lic">✓ DGS</div>
                </div>
                <div class="v-category">Ship Agents</div>
                <div class="v-stats">
                  <span class="v-rating">★ 4.9</span>
                  <span class="v-sep"></span>
                  <span>238 calls</span>
                  <span class="v-sep"></span>
                  <span>22y exp</span>
                </div>
              </div>
            </div>
            <div class="v-tags">
              <span class="v-tag">24/7 on-call</span>
              <span class="v-tag">2 pilot boats</span>
              <span class="v-tag">ISO 9001</span>
            </div>
            <div class="v-actions">
              <button class="btn btn-outline">View</button>
              <button class="btn btn-primary">Get Quote</button>
            </div>
          </div>

          <!-- Vendor card 2 -->
          <div class="vendor-card">
            <div class="v-head">
              <div class="v-avatar accent">CB</div>
              <div class="v-meta">
                <div class="v-name-row">
                  <div class="v-name">Coastal Bunkers Pvt Ltd</div>
                  <div class="v-badge pro">★ Pro</div>
                </div>
                <div class="v-category">VLSFO · MGO · Marine Lubes</div>
                <div class="v-stats">
                  <span class="v-rating">★ 4.8</span>
                  <span class="v-sep"></span>
                  <span>412 supplies</span>
                  <span class="v-sep"></span>
                  <span>14y exp</span>
                </div>
              </div>
            </div>
            <div class="v-tags">
              <span class="v-tag">Barge delivery</span>
              <span class="v-tag">SDS docs</span>
              <span class="v-tag">USD invoicing</span>
            </div>
            <div class="v-actions">
              <button class="btn btn-outline">View</button>
              <button class="btn btn-primary">Get Quote</button>
            </div>
          </div>

          <!-- Vendor card 3 -->
          <div class="vendor-card">
            <div class="v-head">
              <div class="v-avatar success">ST</div>
              <div class="v-meta">
                <div class="v-name-row">
                  <div class="v-name">Sagar Tug Co.</div>
                  <div class="v-badge lic">✓ DGS</div>
                </div>
                <div class="v-category">Multi Modal Transport · Container haulage</div>
                <div class="v-stats">
                  <span class="v-rating">★ 4.7</span>
                  <span class="v-sep"></span>
                  <span>189 ops</span>
                  <span class="v-sep"></span>
                  <span>11y exp</span>
                </div>
              </div>
            </div>
            <div class="v-tags">
              <span class="v-tag">4 ASD tugs</span>
              <span class="v-tag">Emergency</span>
            </div>
            <div class="v-actions">
              <button class="btn btn-outline">View</button>
              <button class="btn btn-primary">Get Quote</button>
            </div>
          </div>

          <!-- Vendor card 4 -->
          <div class="vendor-card">
            <div class="v-head">
              <div class="v-avatar warning">AR</div>
              <div class="v-meta">
                <div class="v-name-row">
                  <div class="v-name">Anchor Marine Repair</div>
                  <div class="v-badge fast">⚡ Fast</div>
                </div>
                <div class="v-category">Onboard &amp; Drydock Repair</div>
                <div class="v-stats">
                  <span class="v-rating">★ 4.9</span>
                  <span class="v-sep"></span>
                  <span>326 jobs</span>
                  <span class="v-sep"></span>
                  <span>18y exp</span>
                </div>
              </div>
            </div>
            <div class="v-tags">
              <span class="v-tag">Class approved</span>
              <span class="v-tag">Hot work</span>
              <span class="v-tag">Divers</span>
            </div>
            <div class="v-actions">
              <button class="btn btn-outline">View</button>
              <button class="btn btn-primary">Get Quote</button>
            </div>
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
