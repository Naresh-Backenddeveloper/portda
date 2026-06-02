<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Sign in · PORTDA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<link rel="stylesheet" href="/app/admin/admin.css" />
<style>
  .auth-side { background: linear-gradient(135deg, #0A0F2E 0%, #1E1B4B 50%, #8B5CF6 100%); }
  .auth-side::before { background: radial-gradient(80% 60% at 100% 0%, rgba(249,115,22,.2), transparent 60%); }
  .btn-primary { background: var(--admin-purple); box-shadow: 0 4px 14px rgba(124,58,237,.35); }
  .btn-primary:hover { background: #6D28D9; }
  .auth-logo .mark { background: linear-gradient(135deg, var(--admin-purple), var(--accent)); }
  .form-input:focus { border-color: var(--admin-purple); box-shadow: 0 0 0 3px rgba(124,58,237,.12); }
  .role-tag { display:inline-flex; align-items:center; gap:6px; font-size:11px; font-weight:700; letter-spacing:.6px; text-transform:uppercase; padding:4px 10px; border-radius:999px; background:rgba(124,58,237,.12); color:#8B5CF6; margin-bottom:10px; }
</style>
</head>
<body>
<div class="auth-shell">
  <aside class="auth-side">
    <div class="badge">⚓ Admin Console</div>
    <h1>PORTDA platform operations</h1>
    <p>Manage vendors, buyers, KYC, payments, plans and the entire marketplace from one console.</p>
    <ul>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> 1,247 vendors · 428 buyers · 14 ports</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> ₹42 Cr settled this FY</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Full audit trail · SOC 2 compliant</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Role-based access · IP allowlist</li>
    </ul>
  </aside>

  <section class="auth-form-side">
    <div class="auth-form">
      <div class="auth-logo"><span class="mark">⚓</span> PORTDA</div>
      <div class="role-tag">🛡 Restricted · Admin only</div>
      <h2>Admin sign in</h2>
      <p class="lede">Use your work email + 2FA code. Sessions auto-expire after 4 hours.</p>

      <form method="POST" action="/admin/login">
        @csrf
        @if ($errors->any())
          <div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:13px;">{{ $errors->first() }}</div>
        @endif
        <div class="form-group">
          <label class="form-label">Work email</label>
          <input class="form-input" name="email" type="email" value="{{ old('email','admin@portda.test') }}" required />
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input class="form-input" name="password" type="password" value="password" required />
          <div class="form-help">Demo admin: admin@portda.test / password</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign in</button>
      </form>

      <p class="auth-foot" style="margin-top:18px;">Locked out? <a href="#" style="color:var(--admin-purple);font-weight:700;">Contact security@portda.in</a></p>
      <p style="text-align:center;margin-top:18px;font-size:12px;color:var(--text-3);"><a href="/" style="color:var(--text-3);">← Back to website</a></p>
    </div>
  </section>
</div>
</body>
</html>
