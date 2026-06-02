<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA — 08 · Payments</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>08 · Payments</h1><p>8 screens — online &amp; offline (NEFT) flows, statements</p></div>
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

  <!-- 8.1 PAYMENT SUMMARY -->
  <div class="screen-wrap">
    <div class="screen-label">8.1 Payment Summary</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Payment Summary</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;text-align:center;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">BALANCE PAYABLE</div>
            <div class="txt-3xl bold mt-4">₹1,74,640</div>
            <div class="txt-xs mt-4" style="opacity:.85;">Order #PORT-48217 · MV Sea Trader</div>
          </div>
          <div class="card mt-12" style="display:flex;align-items:center;gap:12px;">
            <div class="img-ph accent" style="width:44px;height:44px;border-radius:11px;font-size:13px;">CB</div>
            <div class="flex-1">
              <div class="txt-sm semi">Coastal Bunkers Pvt Ltd</div>
              <div class="txt-xs text-2 mt-4">15 May 2026</div>
            </div>
          </div>
          <div class="card">
            <div class="txt-xs text-2 semi mb-8">AMOUNT</div>
            <div class="row-between"><div class="txt-xs">Order total</div><div class="txt-xs">₹2,18,300</div></div>
            <div class="row-between mt-4"><div class="txt-xs">Advance paid</div><div class="txt-xs text-success">−₹43,660</div></div>
            <div class="divider"></div>
            <div class="row-between"><div class="txt-sm bold">Balance payable</div><div class="txt-md bold text-primary">₹1,74,640</div></div>
            <div class="txt-xs text-2 mt-4">Inclusive of 18% GST</div>
          </div>
          <div class="card" style="background:var(--primary-light);border:none;">
            <div class="row-between">
              <div class="row gap-8"><div class="txt-lg text-primary">+</div><div class="txt-sm text-primary semi">Apply contract code</div></div>
              <div class="text-primary semi txt-sm">View</div>
            </div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Proceed to Pay ₹1,74,640</button></div>
      </div>
    </div>
  </div>

  <!-- 8.2 PAYMENT METHOD -->
  <div class="screen-wrap">
    <div class="screen-label">8.2 Payment Method</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Choose Payment</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;text-align:center;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">AMOUNT TO PAY</div>
            <div class="txt-2xl bold mt-4">₹1,74,640</div>
            <div class="txt-xs mt-4" style="opacity:.85;">#PORT-48217 · Coastal Bunkers Pvt Ltd</div>
          </div>

          <div class="semi txt-md mt-16 mb-8">How would you like to pay?</div>

          <!-- Option 1: Online Payment -->
          <label class="card" style="display:flex;align-items:flex-start;gap:14px;padding:16px;">
            <div style="width:18px;height:18px;border:2px solid var(--border);border-radius:50%;flex-shrink:0;margin-top:2px;"></div>
            <div class="icon-box bg-success-light text-success" style="width:44px;height:44px;font-size:20px;border-radius:12px;flex-shrink:0;">⚡</div>
            <div class="flex-1">
              <div class="row-between"><div class="txt-md bold">Online Payment</div><span class="chip chip-success" style="font-size:9px;">Instant</span></div>
              <div class="txt-xs text-2 mt-4" style="line-height:1.5;">Pay instantly with UPI, card or net banking. Money settles to vendor immediately.</div>
            </div>
          </label>

          <!-- Option 2: Offline Payment (selected) -->
          <label class="card mt-12" style="display:flex;align-items:flex-start;gap:14px;padding:16px;border:1.5px solid var(--primary);background:var(--primary-light);">
            <div style="width:18px;height:18px;border:2px solid var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:2px;"><div style="width:9px;height:9px;background:var(--primary);border-radius:50%;"></div></div>
            <div class="icon-box bg-card text-primary" style="width:44px;height:44px;font-size:20px;border-radius:12px;flex-shrink:0;">📄</div>
            <div class="flex-1">
              <div class="row-between"><div class="txt-md bold text-primary">Offline Payment</div><span class="chip chip-warning" style="font-size:9px;">Manual</span></div>
              <div class="txt-xs text-primary mt-4" style="line-height:1.5;">NEFT / RTGS transfer to vendor's bank. Enter UTR after transfer. Vendor verifies in 4–24 hrs.</div>
            </div>
          </label>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Continue with Offline Payment →</button></div>
      </div>
    </div>
  </div>

  <!-- 8.3 NEFT TRANSFER & UTR (OFFLINE FLOW) -->
  <div class="screen-wrap">
    <div class="screen-label">8.3 NEFT Transfer &amp; UTR</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>NEFT / RTGS</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div class="card hero-gradient" style="border:none;text-align:center;">
            <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">TRANSFER AMOUNT</div>
            <div class="txt-2xl bold mt-4">₹1,74,640</div>
          </div>

          <!-- Step 1: Vendor's bank details -->
          <div class="txt-xs text-2 semi mt-16" style="letter-spacing:0.5px;">STEP 1 · TRANSFER TO VENDOR</div>
          <div class="card mt-8">
            <div class="row-between">
              <div class="row gap-10">
                <div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:11px;font-weight:900;">HDFC</div>
                <div>
                  <div class="txt-sm semi">Coastal Bunkers Pvt Ltd</div>
                  <div class="txt-xs text-2 mt-4">HDFC Bank, Nariman Point</div>
                </div>
              </div>
            </div>
            <div class="divider"></div>
            <div class="row-between"><div class="txt-xs text-2">Account no.</div><div class="row gap-6"><div class="txt-xs semi" style="font-variant-numeric:tabular-nums;">50100123456789</div><span class="text-primary txt-xs semi">Copy</span></div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">IFSC</div><div class="row gap-6"><div class="txt-xs semi">HDFC0001234</div><span class="text-primary txt-xs semi">Copy</span></div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Account type</div><div class="txt-xs semi">Current</div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Beneficiary name</div><div class="txt-xs semi">Coastal Bunkers Pvt Ltd</div></div>
          </div>
          <div class="card mt-8" style="background:#FFFBEB;border:1px solid #FDE68A;">
            <div class="row gap-10"><div class="text-warning">ⓘ</div><div class="txt-xs text-2" style="line-height:1.5;">Add <span class="bold text">#PORT-48217</span> as the transfer remark/narration so the vendor can identify it.</div></div>
          </div>

          <!-- Step 2: Submit UTR -->
          <div class="txt-xs text-2 semi mt-16" style="letter-spacing:0.5px;">STEP 2 · SUBMIT UTR FOR VERIFICATION</div>
          <div class="input-wrap mt-8"><div class="input-label">UTR / Transaction Reference Number*</div><div class="input-value" style="font-variant-numeric:tabular-nums;">HDFCN24135160482736</div></div>
          <div class="input-wrap"><div class="input-label">Transfer date*</div><div class="input-value">15 May 2026, 14:22 IST</div></div>
          <div class="input-wrap"><div class="input-label">Your bank</div><div class="input-value">HDFC Bank · A/c •••• 8924</div></div>
          <div class="semi txt-sm mt-12 mb-8">Attach proof (recommended)</div>
          <div class="grid-3">
            <div class="card" style="height:72px;padding:0;display:flex;align-items:center;justify-content:center;background:#FEE2E2;color:#B91C1C;font-weight:900;font-size:11px;">PDF</div>
            <div class="card" style="height:72px;display:flex;align-items:center;justify-content:center;border:2px dashed var(--border);"><div class="txt-xl text-primary">📷</div></div>
            <div class="card" style="height:72px;display:flex;align-items:center;justify-content:center;border:2px dashed var(--border);"><div class="txt-xl text-primary">+</div></div>
          </div>
          <div class="card mt-12" style="background:var(--bg);border:none;">
            <div class="txt-xs text-2 semi mb-4">💡 NEXT STEP</div>
            <div class="txt-xs text-2" style="line-height:1.5;">Once you submit, vendor will verify with their bank and approve. You'll get a notification when confirmed.</div>
          </div>
        </div>
        <div class="bottom-cta"><button class="btn btn-primary">Submit for Verification</button></div>
      </div>
    </div>
  </div>

  <!-- 8.4 PENDING VERIFICATION (OFFLINE FLOW) -->
  <div class="screen-wrap">
    <div class="screen-label">8.4 Pending Verification</div>
    <div class="phone">
      <div class="screen" data-tab="requests">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Payment Status</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div style="text-align:center;padding:18px 0 8px;">
            <div class="icon-box bg-warning-light text-warning" style="width:96px;height:96px;font-size:42px;border-radius:24px;margin:0 auto;">⏳</div>
            <h2 class="txt-2xl bold mt-12">Awaiting vendor verification</h2>
            <p class="txt-md text-2 mt-8" style="line-height:1.5;">Your UTR has been submitted. Coastal Bunkers will verify with their bank and approve shortly.</p>
          </div>
          <!-- Status timeline -->
          <div class="card mt-12" style="padding:14px;">
            <div class="tl">
              <div class="tl-item done">
                <div class="txt-sm semi">Transfer initiated</div>
                <div class="txt-xs text-2">15 May, 14:22 IST · From your bank</div>
              </div>
              <div class="tl-item done">
                <div class="txt-sm semi">UTR submitted</div>
                <div class="txt-xs text-2">15 May, 14:24 IST</div>
                <div class="card mt-8" style="background:var(--bg);border:none;padding:8px;"><div class="txt-xs">HDFCN24135160482736</div></div>
              </div>
              <div class="tl-item active">
                <div class="txt-sm semi text-warning">Vendor verifying...</div>
                <div class="txt-xs text-2">Typically 4–24 hrs</div>
              </div>
              <div class="tl-item">
                <div class="txt-sm text-3">Payment confirmed</div>
                <div class="txt-xs text-3">Status will update</div>
              </div>
            </div>
          </div>
          <!-- Payment details -->
          <div class="card">
            <div class="txt-xs text-2 semi mb-8">PAYMENT DETAILS</div>
            <div class="row-between"><div class="txt-xs text-2">Order</div><div class="txt-xs semi">#PORT-48217</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Vendor</div><div class="txt-xs semi">Coastal Bunkers Pvt Ltd</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">UTR</div><div class="txt-xs semi" style="font-variant-numeric:tabular-nums;">HDFCN24135160482736</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Mode</div><div class="txt-xs semi">NEFT</div></div>
            <div class="divider"></div>
            <div class="row-between"><div class="txt-sm bold">Amount</div><div class="txt-md bold text-warning">₹1,74,640</div></div>
          </div>
          <div class="card" style="background:var(--primary-light);border:none;">
            <div class="row gap-10"><div class="txt-lg text-primary">🔔</div><div class="txt-xs text-primary" style="line-height:1.5;">You'll get a push notification &amp; email the moment Coastal Bunkers approves.</div></div>
          </div>
        </div>
        <div class="bottom-cta" style="display:flex;flex-direction:column;gap:8px;">
          <button class="btn btn-outline">View Order</button>
          <div class="txt-xs text-2 center">Mistake in UTR? <span class="text-primary semi">Edit submission</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 8.5 RAZORPAY (Online flow) -->
  <div class="screen-wrap">
    <div class="screen-label">8.5 Razorpay Payment (Online)</div>
    <div class="phone">
      <div class="screen" style="background:rgba(17,24,39,.6);">
        <div class="status-bar dark"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="flex:1;display:flex;align-items:flex-end;">
          <div style="width:100%;background:#fff;border-radius:20px 20px 0 0;padding:14px 16px;">
            <div style="width:40px;height:4px;background:var(--border);border-radius:2px;margin:0 auto 12px;"></div>
            <div class="row-between mb-12">
              <div class="row gap-8">
                <div class="brand-mark" style="background:#072654;color:#fff;border-radius:8px;width:32px;height:32px;font-size:14px;">R</div>
                <div>
                  <div class="txt-sm semi">Razorpay</div>
                  <div class="txt-xs text-2">PORTDA Marine Services</div>
                </div>
              </div>
              <div class="txt-md bold">₹1,74,640</div>
            </div>
            <div class="card" style="background:var(--bg);border:none;">
              <div class="row-between">
                <div class="row gap-8"><div class="txt-md" style="font-weight:900;font-size:11px;color:#072654;">NEFT</div><div class="txt-sm semi">HDFC OceanLink · •••• 8924</div></div>
                <div class="text-primary txt-xs semi">Change</div>
              </div>
            </div>
            <div class="card mt-12" style="background:#ECFDF5;border:none;">
              <div class="row gap-10"><div class="text-success">✓</div><div class="txt-xs">Pre-authorised account · Funds will be debited instantly</div></div>
            </div>
            <div class="row-between mt-16">
              <div class="txt-xs text-2">Order total</div><div class="txt-xs">₹2,18,300</div>
            </div>
            <div class="row-between mt-4">
              <div class="txt-xs text-2">Advance paid</div><div class="txt-xs text-success">−₹43,660</div>
            </div>
            <div class="divider"></div>
            <div class="row-between"><div class="txt-sm bold">Balance payable</div><div class="txt-md bold">₹1,74,640</div></div>
            <button class="btn btn-primary mt-16" style="background:#0F1F47;">Pay ₹1,74,640</button>
            <div class="row gap-6 center mt-12" style="justify-content:center;">
              <div class="txt-xs text-2">🔒 Secured by</div>
              <div class="txt-xs semi" style="color:#072654;">Razorpay</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 8.6 PAYMENT SUCCESS -->
  <div class="screen-wrap">
    <div class="screen-label">8.6 Payment Success</div>
    <div class="phone">
      <div class="screen" data-tab="none">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;text-align:center;gap:14px;">
          <div class="icon-box" style="background:linear-gradient(135deg,#8B5CF6,#10B981);color:#fff;width:96px;height:96px;font-size:48px;border-radius:24px;box-shadow:0 10px 30px rgba(124,58,237,.3);">✓</div>
          <h2 class="txt-2xl bold">Payment Successful</h2>
          <p class="txt-md text-2" style="line-height:1.5;">₹1,74,640 has been transferred to Coastal Bunkers Pvt Ltd.</p>
          <div class="card full" style="text-align:left;">
            <div class="row-between"><div class="txt-xs text-2">Transaction ID</div><div class="txt-xs semi">TXN8472615439</div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Date &amp; time</div><div class="txt-xs semi">15 May 2026, 15:42 IST</div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Payment method</div><div class="txt-xs semi">NEFT · HDFC •••• 8924</div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Order</div><div class="txt-xs semi">#PORT-48217</div></div>
            <div class="row-between mt-8"><div class="txt-xs text-2">Vessel</div><div class="txt-xs semi">MV Sea Trader</div></div>
            <div class="divider"></div>
            <div class="row-between"><div class="txt-sm bold">Amount paid</div><div class="txt-md bold text-success">₹1,74,640</div></div>
          </div>
        </div>
        <div class="bottom-cta" style="display:flex;flex-direction:column;gap:8px;">
          <button class="btn btn-primary">Download Tax Invoice</button>
          <button class="btn btn-ghost">Back to Order</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 8.7 PAYMENT FAILED -->
  <div class="screen-wrap">
    <div class="screen-label">8.7 Payment Failed</div>
    <div class="phone">
      <div class="screen" data-tab="none">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:24px;text-align:center;gap:14px;">
          <div class="icon-box" style="background:linear-gradient(135deg,#EF4444,#EF4444);color:#fff;width:96px;height:96px;font-size:48px;border-radius:24px;box-shadow:0 10px 30px rgba(239,68,68,.3);">✕</div>
          <h2 class="txt-2xl bold">Payment Failed</h2>
          <p class="txt-md text-2" style="line-height:1.5;">Your transfer of ₹1,74,640 could not be processed. No amount has been deducted.</p>
          <div class="card full" style="background:#FEF2F2;border:1px solid #FECACA;text-align:left;">
            <div class="txt-xs text-danger semi">REASON</div>
            <div class="txt-sm mt-4">NEFT transfer exceeded daily corporate limit. Increase limit or use SWIFT wire.</div>
            <div class="txt-xs text-2 mt-4">Error code: BANK_LIMIT_EXCEEDED</div>
          </div>
          <div class="card full" style="text-align:left;">
            <div class="row-between"><div class="txt-xs text-2">Order</div><div class="txt-xs semi">#PORT-48217</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Amount</div><div class="txt-xs semi">₹1,74,640</div></div>
            <div class="row-between mt-4"><div class="txt-xs text-2">Reference</div><div class="txt-xs semi">TXN8472615439</div></div>
          </div>
        </div>
        <div class="bottom-cta" style="display:flex;flex-direction:column;gap:8px;">
          <button class="btn btn-primary">Try Again</button>
          <button class="btn btn-ghost">Use Different Method</button>
          <div class="txt-xs text-2 center mt-4">Need help? <span class="text-primary semi">Contact accounts</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 8.8 TRANSACTION HISTORY -->
  <div class="screen-wrap">
    <div class="screen-label">8.8 Transaction History</div>
    <div class="phone">
      <div class="screen" data-tab="history">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Transactions</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="14" y2="12"/><line x1="4" y1="18" x2="9" y2="18"/></svg></div></div>
        <div style="padding:0 16px 8px;">
          <div class="card hero-gradient" style="border:none;">
            <div class="row-between">
              <div>
                <div class="txt-xs semi" style="opacity:.85;letter-spacing:1px;">TOTAL SPEND · FY 26</div>
                <div class="txt-2xl bold mt-4">₹3.84 Cr</div>
                <div class="txt-xs mt-4" style="opacity:.85;">82 service orders this year</div>
              </div>
              <div style="font-size:36px;opacity:.4;">₹</div>
            </div>
          </div>
        </div>
        <div class="screen-body" style="padding-top:8px;">
          <div class="row gap-6 mt-4 mb-12" style="flex-wrap:wrap;">
            <span class="chip chip-primary">All</span>
            <span class="chip chip-gray">Paid</span>
            <span class="chip chip-gray">Refund</span>
            <span class="chip chip-gray">May</span>
          </div>
          <div class="txt-xs text-2 semi mb-8">TODAY</div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-success-light text-success" style="width:36px;height:36px;font-size:14px;">↑</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Coastal Bunkers Pvt Ltd</div><div class="txt-sm bold">−₹1,74,640</div></div>
                <div class="row-between"><div class="txt-xs text-2">NEFT · #PORT-48217 · 15:42</div><div class="chip chip-success">Paid</div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-warning-light text-warning" style="width:36px;height:36px;font-size:14px;">↑</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Coastal Bunkers Pvt Ltd</div><div class="txt-sm bold">−₹43,660</div></div>
                <div class="row-between"><div class="txt-xs text-2">NEFT · Advance · 14 May, 10:14</div><div class="chip chip-success">Paid</div></div>
              </div>
            </div>
          </div>
          <div class="txt-xs text-2 semi mt-12 mb-8">YESTERDAY</div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-primary-light text-primary" style="width:36px;height:36px;font-size:14px;">↓</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Anchor Ship Management</div><div class="txt-sm bold text-success">+₹45,000</div></div>
                <div class="row-between"><div class="txt-xs text-2">NEFT · #PORT-47802</div><div class="chip chip-primary">Refund</div></div>
              </div>
            </div>
          </div>
          <div class="txt-xs text-2 semi mt-12 mb-8">10 MAY</div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-success-light text-success" style="width:36px;height:36px;font-size:14px;">↑</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Mumbai Marine Agencies</div><div class="txt-sm bold">−₹2,18,300</div></div>
                <div class="row-between"><div class="txt-xs text-2">NEFT · #PORT-48005</div><div class="chip chip-success">Paid</div></div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row gap-10">
              <div class="icon-box bg-success-light text-success" style="width:36px;height:36px;font-size:14px;">↑</div>
              <div class="flex-1">
                <div class="row-between"><div class="txt-sm semi">Port Stevedoring Ltd</div><div class="txt-sm bold">−₹4,80,000</div></div>
                <div class="row-between"><div class="txt-xs text-2">NEFT · #PORT-47956</div><div class="chip chip-success">Paid</div></div>
              </div>
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
