<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PORTDA — 02 · Authentication</title>
<link rel="stylesheet" href="/assets/styles.css" />
</head>
<body>

<div class="page-header">
  <div class="logo">
    <div class="logo-mark">⚓</div>
    <div><h1>02 · Authentication</h1><p>7 screens — sign in for ship agents &amp; port operators</p></div>
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

  <!-- 2.1 LOGIN -->
  <div class="screen-wrap">
    <div class="screen-label">2.1 Login Screen</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="padding:20px 18px 0;">
          <div class="brand-mark lg" style="font-size:34px;">⚓</div>
          <h2 class="txt-2xl bold mt-16">Welcome back</h2>
          <p class="txt-md text-2 mt-4">Sign in to manage your fleet &amp; port services</p>
        </div>
        <div class="screen-body" style="padding-top:20px;">
          <div class="tabs mb-16">
            <div class="tab active">Mobile</div>
            <div class="tab">Email</div>
          </div>
          <div class="input-wrap">
            <div class="input-label">Mobile Number</div>
            <div class="row gap-8 mt-4">
              <div class="txt-md semi">🇮🇳 +91</div>
              <div class="input-value">98212 43815</div>
            </div>
          </div>
          <button class="btn btn-primary mt-12">Send OTP</button>
          <div class="txt-sm center mt-16 text-2">New shipping company? <span class="text-primary semi">Register</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.2 OTP -->
  <div class="screen-wrap">
    <div class="screen-label">2.2 Mobile OTP Verification</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar no-bg"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Verify OTP</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div class="icon-box bg-primary-light text-primary" style="width:72px;height:72px;font-size:32px;border-radius:20px;margin:8px auto;">📱</div>
          <h2 class="txt-xl bold center mt-12">Enter verification code</h2>
          <p class="txt-md text-2 center mt-4" style="line-height:1.5;">We've sent a 6-digit code to<br/><span class="text bold">+91 98212 43815</span></p>
          <div class="otp-row">
            <div class="otp-box filled">7</div>
            <div class="otp-box filled">2</div>
            <div class="otp-box filled">9</div>
            <div class="otp-box filled">4</div>
            <div class="otp-box"></div>
            <div class="otp-box"></div>
          </div>
          <div class="txt-sm center text-2">Didn't receive code? <span class="text-primary semi">Resend in 0:24</span></div>
          <button class="btn btn-primary mt-16">Verify &amp; Continue</button>
          <div class="txt-sm center mt-12 text-2">Change number? <span class="text-primary semi">Edit</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.3 EMAIL LOGIN -->
  <div class="screen-wrap">
    <div class="screen-label">2.3 Email Login</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar no-bg"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Email Login</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div class="brand-mark lg" style="margin-bottom:12px;font-size:30px;">⚓</div>
          <h2 class="txt-xl bold">Sign in with email</h2>
          <p class="txt-md text-2 mt-4">Use your registered company email</p>
          <div class="mt-16"></div>
          <div class="input-wrap">
            <div class="input-label">Work Email</div>
            <div class="input-value">arjun.mehta@oceanlink.in</div>
          </div>
          <div class="input-wrap">
            <div class="input-label">Password</div>
            <div class="row-between">
              <div class="input-value">••••••••••</div>
              <div class="txt-sm text-2">👁</div>
            </div>
          </div>
          <div class="row-between mt-8">
            <div class="row gap-6"><div style="width:14px;height:14px;border:1.5px solid var(--primary);border-radius:4px;background:var(--primary);color:#fff;font-size:9px;display:flex;align-items:center;justify-content:center;">✓</div><span class="txt-sm">Remember device</span></div>
            <div class="txt-sm text-primary semi">Forgot password?</div>
          </div>
          <button class="btn btn-primary mt-16">Sign In</button>
          <div class="txt-sm center mt-16 text-2">New here? <span class="text-primary semi">Register your company</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.4 FORGOT PASSWORD -->
  <div class="screen-wrap">
    <div class="screen-label">2.4 Forgot Password</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar no-bg"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Forgot Password</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <div class="icon-box bg-warning-light text-warning" style="width:80px;height:80px;font-size:36px;border-radius:20px;margin:16px auto 8px;">⚿</div>
          <h2 class="txt-xl bold center">Reset your password</h2>
          <p class="txt-md text-2 center mt-8" style="line-height:1.5;">Enter your registered work email and we'll send a reset link.</p>
          <div class="mt-16"></div>
          <div class="input-wrap">
            <div class="input-label">Work Email</div>
            <div class="input-value">arjun.mehta@oceanlink.in</div>
          </div>
          <button class="btn btn-primary mt-16">Send Reset Link</button>
          <div class="card mt-16" style="background:var(--primary-light);border:none;">
            <div class="row gap-10"><div class="txt-lg">ℹ</div><div class="txt-sm text-primary">Reset links are valid for 15 minutes. Check spam if you don't see it.</div></div>
          </div>
          <div class="txt-sm center mt-16 text-2">Remembered? <span class="text-primary semi">Back to login</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.5 RESET PASSWORD -->
  <div class="screen-wrap">
    <div class="screen-label">2.5 Reset Password</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar no-bg"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>New Password</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <h2 class="txt-xl bold mt-12">Create new password</h2>
          <p class="txt-md text-2 mt-4">Use a strong password — your account controls vessel operations.</p>
          <div class="mt-16"></div>
          <div class="input-wrap">
            <div class="input-label">New Password</div>
            <div class="row-between"><div class="input-value">••••••••</div><div class="txt-sm text-2">👁</div></div>
          </div>
          <div class="input-wrap">
            <div class="input-label">Confirm Password</div>
            <div class="row-between"><div class="input-value">••••••••</div><div class="txt-sm text-2">👁</div></div>
          </div>
          <div class="card mt-12" style="background:var(--bg);border:none;">
            <div class="txt-sm semi mb-8">Password must contain</div>
            <div class="row gap-6 mt-4"><span class="text-success txt-sm">✓</span><span class="txt-sm">At least 10 characters</span></div>
            <div class="row gap-6 mt-4"><span class="text-success txt-sm">✓</span><span class="txt-sm">One uppercase letter</span></div>
            <div class="row gap-6 mt-4"><span class="text-success txt-sm">✓</span><span class="txt-sm">One number</span></div>
            <div class="row gap-6 mt-4"><span class="text-3 txt-sm">○</span><span class="txt-sm text-3">One special character</span></div>
          </div>
          <button class="btn btn-primary mt-16">Update Password</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.6 REGISTRATION -->
  <div class="screen-wrap">
    <div class="screen-label">2.6 Company Registration</div>
    <div class="phone">
      <div class="screen">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div class="topbar no-bg"><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg></div><h2>Register Company</h2><div style="width:36px"></div></div>
        <div class="screen-body">
          <h2 class="txt-xl bold mt-8">Create your account</h2>
          <p class="txt-md text-2 mt-4">For shipping companies, agents &amp; logistics teams</p>
          <div class="mt-16"></div>
          <div class="input-wrap"><div class="input-label">Full Name</div><div class="input-value">Capt. Arjun Mehta</div></div>
          <div class="input-wrap"><div class="input-label">Company Name</div><div class="input-value">OceanLink Shipping Pvt Ltd</div></div>
          <div class="input-wrap"><div class="input-label">Role</div><div class="row-between"><div class="input-value">Operations Manager</div><div class="text-2">▼</div></div></div>
          <div class="input-wrap"><div class="input-label">Work Email</div><div class="input-value">arjun.mehta@oceanlink.in</div></div>
          <div class="input-wrap">
            <div class="input-label">Mobile Number</div>
            <div class="row gap-8"><span class="txt-md semi">🇮🇳 +91</span><span class="input-value">98212 43815</span></div>
          </div>
          <div class="input-wrap"><div class="input-label">IEC / GSTIN (optional)</div><div class="input-placeholder">For tax invoicing</div></div>
          <div class="input-wrap"><div class="input-label">Create Password</div><div class="input-value">••••••••</div></div>
          <div class="row gap-8 mt-8">
            <div style="width:16px;height:16px;border:1.5px solid var(--primary);border-radius:4px;background:var(--primary);color:#fff;font-size:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">✓</div>
            <div class="txt-sm text-2">I agree to the <span class="text-primary semi">Terms</span> &amp; <span class="text-primary semi">Privacy Policy</span></div>
          </div>
          <button class="btn btn-primary mt-16">Create Account</button>
          <div class="txt-sm center mt-12 text-2">Already registered? <span class="text-primary semi">Sign in</span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- 2.7 SESSION EXPIRED -->
  <div class="screen-wrap">
    <div class="screen-label">2.7 Session Expired</div>
    <div class="phone">
      <div class="screen" style="background:var(--bg);">
        <div class="status-bar"><span class="time">9:41</span><span class="icons"><svg width="15" height="11" viewBox="0 0 15 11" fill="currentColor"><path d="M7.5 0C4.6 0 2 1 0 2.7l1.2 1.4C2.8 2.8 5.1 1.9 7.5 1.9s4.7.9 6.3 2.2L15 2.7C13 1 10.4 0 7.5 0zM7.5 3.7c-1.9 0-3.7.7-5 1.8l1.2 1.4c1-.8 2.3-1.3 3.8-1.3s2.8.5 3.8 1.3l1.2-1.4c-1.3-1.1-3.1-1.8-5-1.8zM7.5 7.4c-1 0-1.9.3-2.6.9L7.5 11l2.6-2.7c-.7-.6-1.6-.9-2.6-.9z"/></svg><svg width="25" height="12" viewBox="0 0 25 12" fill="none"><rect x="0.5" y="0.5" width="21" height="11" rx="3" stroke="currentColor" stroke-opacity="0.4"/><rect x="2" y="2" width="18" height="8" rx="1.8" fill="currentColor"/><rect x="22.5" y="4" width="1.5" height="4" rx="0.6" fill="currentColor" fill-opacity="0.4"/></svg></span></div>
        <div style="flex:1;position:relative;opacity:.3;pointer-events:none;">
          <div class="topbar"><div class="icon-btn"><svg viewBox="0 0 24 24"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></div><h2>Vessel Dashboard</h2><div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg></div></div>
          <div style="padding:12px 16px;">
            <div class="card" style="height:80px;"></div>
            <div class="card mt-12" style="height:100px;"></div>
          </div>
        </div>
        <div class="popup-backdrop">
          <div class="popup">
            <div class="icon-box bg-warning-light text-warning" style="width:64px;height:64px;font-size:28px;border-radius:18px;margin:0 auto 12px;">⌛</div>
            <h3 class="txt-lg bold">Session Expired</h3>
            <p class="txt-md text-2 mt-8" style="line-height:1.5;">For security of vessel operations, your session has timed out. Please sign in again.</p>
            <button class="btn btn-primary mt-16">Sign in again</button>
            <div class="txt-sm text-2 center mt-12">Need help? <span class="text-primary semi">Contact support</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="/assets/download.js"></script>
</body>
</html>
