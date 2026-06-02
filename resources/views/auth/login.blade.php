<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sign in Â· PORTDA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<style>
  .role-picker {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 22px;
  }
  .role-card {
    position: relative;
    text-align: left;
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: 14px;
    padding: 14px;
    cursor: pointer;
    overflow: hidden;
    transition: border-color .15s ease, transform .15s ease, box-shadow .15s ease;
    font-family: inherit;
    color: var(--text);
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .role-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
  .role-card .role-glow {
    position: absolute;
    inset: -40% -40% auto auto;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    opacity: 0;
    transition: opacity .25s ease;
    pointer-events: none;
    filter: blur(20px);
  }
  .role-card.vendor .role-glow { background: var(--primary); }
  .role-card.user .role-glow { background: var(--accent); }
  .role-card.active .role-glow { opacity: .12; }

  .role-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg);
    color: var(--text-2);
    transition: background .15s ease, color .15s ease;
  }
  .role-card.vendor.active .role-icon { background: var(--primary); color: #fff; }
  .role-card.user.active .role-icon { background: var(--accent); color: #fff; }

  .role-eyebrow {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .6px;
    text-transform: uppercase;
    color: var(--text-3);
  }
  .role-card.vendor.active .role-eyebrow { color: var(--primary); }
  .role-card.user.active .role-eyebrow { color: var(--accent); }
  .role-title { font-size: 18px; font-weight: 800; letter-spacing: -.3px; line-height: 1; }
  .role-sub { font-size: 11px; color: var(--text-2); line-height: 1.4; }

  .role-check {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--bg-2);
    color: transparent;
    border: 1.5px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .15s ease, color .15s ease, border-color .15s ease;
  }
  .role-card.vendor.active .role-check { background: var(--primary); color: #fff; border-color: var(--primary); }
  .role-card.user.active .role-check { background: var(--accent); color: #fff; border-color: var(--accent); }

  .role-card.vendor.active { border-color: var(--primary); background: linear-gradient(180deg, rgba(79,70,229,.04) 0%, #fff 60%); }
  .role-card.user.active { border-color: var(--accent); background: linear-gradient(180deg, rgba(249,115,22,.05) 0%, #fff 60%); }

  /* Form theming swaps based on role */
  body.role-user .btn-primary { background: var(--accent); box-shadow: 0 4px 14px rgba(249, 115, 22, .35); }
  body.role-user .btn-primary:hover { background: #C2410C; }
  body.role-user .form-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(249, 115, 22, .12); }
  body.role-user .auth-foot a, body.role-user a[style*="color:var(--primary)"] { color: var(--accent) !important; }

  /* Left panel content swaps too */
  body.role-user .panel-vendor { display: none; }
  body.role-vendor .panel-user { display: none; }

  /* Form swap */
  body.role-user .form-vendor { display: none; }
  body.role-vendor .form-user { display: none; }

  /* Role-link color */
  .role-link { color: var(--primary); }
  body.role-user .role-link { color: var(--accent); }

  /* User-side: indigoâ†’orange gradient on left panel */
  body.role-user .auth-side {
    background: linear-gradient(135deg, #7C2D12 0%, #C2410C 50%, #F59E0B 100%);
  }
  body.role-user .auth-side::before {
    background: radial-gradient(80% 60% at 100% 0%, rgba(79,70,229,.25), transparent 60%);
  }

  /* OTP cells */
  .otp-row {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 8px;
  }
  .otp-cell {
    text-align: center;
    font-size: 22px;
    font-weight: 800;
    padding: 12px 0;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    outline: none;
    transition: border-color .15s ease, box-shadow .15s ease;
    background: #fff;
    color: var(--text);
    font-family: inherit;
  }
  .otp-cell:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(249, 115, 22, .12); }
</style>
</head>
<body class="role-vendor">

<div class="auth-shell">
  <aside class="auth-side">
    <div class="panel-vendor">
      <div class="badge">âš“ For marine service providers</div>
      <h1>Grow your marine business with verified buyers.</h1>
      <p>Receive requests from KYC'd ship-agents. Quote in minutes. Settle to bank the same day.</p>
      <ul>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Verified buyers only â€” every ship-agent KYC'd</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> 0% commission on Subscription plans</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Settlement to bank in &lt; 2 hours (IMPS)</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> GST-compliant invoicing, native</li>
      </ul>
    </div>
    <div class="panel-user">
      <div class="badge">âš“ For ship-agents &amp; charterers</div>
      <h1>Procure marine services at vessel speed.</h1>
      <p>Post once. Compare quotes from licensed vendors in 30 minutes. Pay with full GST trail.</p>
      <ul>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> 1,200+ verified marine service vendors</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Side-by-side quote compare in one click</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Free forever for buyers â€” no platform fee</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Live milestone tracking on every order</li>
      </ul>
    </div>
  </aside>

  <section class="auth-form-side">
    <div class="auth-form">
      <div class="auth-logo"><span class="mark">âš“</span> PORTDA</div>
      <h2>Sign in to PORTDA</h2>
      <p class="lede">Choose how you use PORTDA. Each side is its own app.</p>

      <div class="role-picker" id="role-picker">
        <button type="button" class="role-card vendor active" data-role="vendor" data-email="ops@mumbaimarine.in">
          <div class="role-glow"></div>
          <div class="role-icon">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V10l7-4 7 4v11"/><path d="M9 21v-6h6v6"/><circle cx="12" cy="10" r="1.4"/></svg>
          </div>
          <div class="role-meta">
            <div class="role-eyebrow">For service providers</div>
            <div class="role-title">Vendor</div>
            <div class="role-sub">Ship Agents Â· Multi Modal Transport Â· Bunkering Â· Survey Â· â€¦</div>
          </div>
          <div class="role-check">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </button>
        <button type="button" class="role-card user" data-role="user" data-email="ops@oceanlink.in">
          <div class="role-glow"></div>
          <div class="role-icon">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20h20"/><path d="M3 16l2-6h14l2 6"/><rect x="6" y="11" width="3" height="3"/><rect x="11" y="11" width="3" height="3"/><rect x="15" y="11" width="3" height="3"/><path d="M5 10V6h14v4"/></svg>
          </div>
          <div class="role-meta">
            <div class="role-eyebrow">For ship agents &amp; charterers</div>
            <div class="role-title">User</div>
            <div class="role-sub">Post requests Â· Compare quotes Â· Pay vendors</div>
          </div>
          <div class="role-check">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </button>
      </div>

      <!-- ===== VENDOR FORM (email + password, company sign-in) ===== -->
      <form class="form-vendor" method="POST" action="/login">
        @csrf
        @if ($errors->any())
          <div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:13px;">{{ $errors->first() }}</div>
        @endif
        <div class="form-group">
          <label class="form-label">Company email</label>
          <input class="form-input" type="email" name="email" placeholder="vendor1@portda.test" value="{{ old('email','vendor1@portda.test') }}" required />
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input class="form-input" type="password" name="password" placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢" value="password" required />
          <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;">
            <label style="display:flex;align-items:center;gap:6px;font-size:13px;color:var(--text-2);"><input type="checkbox" name="remember" checked /> Remember this device</label>
            <a href="#" class="role-link" style="font-size:13px;font-weight:600;">Forgot password?</a>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">DGS / IRS licence (optional)</label>
          <input class="form-input" type="text" placeholder="DGS-PILOT-MH-2138" />
          <div class="form-help">Speeds up KYC re-verification if your password is locked.</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign in as Vendor</button>

        <div class="auth-divider">company SSO</div>
        <button type="button" class="btn btn-outline btn-block">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          Continue with Microsoft 365
        </button>
        <p class="auth-foot">New marine vendor? <a class="role-link" href="/signup">Register your company â†’</a></p>
      </form>

      <!-- ===== USER FORM (email + password — OTP UI retained but POST is email/password) ===== -->
      <form class="form-user" method="POST" action="/login">
        @csrf
        @if ($errors->any())
          <div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:13px;">{{ $errors->first() }}</div>
        @endif
        <div class="form-group">
          <label class="form-label">Email address</label>
          <input class="form-input" type="email" name="email" placeholder="buyer1@portda.test" value="{{ old('email','buyer1@portda.test') }}" required />
          <div class="form-help">Demo: buyer1@portda.test / password</div>
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input class="form-input" type="password" name="password" value="password" required />
        </div>
        <div class="form-group" style="display:none;">
          <label class="form-label">Mobile number</label>
          <div style="display:flex;gap:8px;">
            <select class="form-select" style="flex:0 0 96px;"><option>ðŸ‡®ðŸ‡³ +91</option><option>ðŸ‡¸ðŸ‡¬ +65</option><option>ðŸ‡¦ðŸ‡ª +971</option><option>ðŸ‡¬ðŸ‡§ +44</option><option>ðŸ‡ºðŸ‡¸ +1</option></select>
            <input class="form-input" type="tel" placeholder="98765 43210" value="98765 43210" required style="flex:1;" />
          </div>
          <div class="form-help">We'll send a 6-digit code via SMS &amp; WhatsApp.</div>
        </div>

        <button type="button" class="btn btn-block" style="background:var(--bg);color:var(--text);border:1px solid var(--border);margin-bottom:14px;" onclick="this.previousElementSibling.querySelector('.form-help').textContent='Sent âœ“ â€” enter the 6 digits below.'">Send OTP</button>

        <div class="form-group">
          <label class="form-label">Enter OTP</label>
          <div class="otp-row">
            <input class="otp-cell" maxlength="1" value="4" />
            <input class="otp-cell" maxlength="1" value="8" />
            <input class="otp-cell" maxlength="1" value="2" />
            <input class="otp-cell" maxlength="1" value="1" />
            <input class="otp-cell" maxlength="1" value="7" />
            <input class="otp-cell" maxlength="1" />
          </div>
          <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;">
            <span style="font-size:13px;color:var(--text-2);">Resend in <strong>0:24</strong></span>
            <a href="#" class="role-link" style="font-size:13px;font-weight:600;">Use email instead</a>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg">Verify &amp; Sign in</button>

        <div class="auth-divider">or continue with</div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
          <button type="button" class="btn btn-outline">
            <svg viewBox="0 0 24 24" width="14" height="14"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.1c-.22-.66-.35-1.36-.35-2.1s.13-1.44.35-2.1V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.83z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.83C6.71 7.31 9.14 5.38 12 5.38z"/></svg>
            Google
          </button>
          <button type="button" class="btn btn-outline">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="#0A66C2"><path d="M19 0H5a5 5 0 0 0-5 5v14a5 5 0 0 0 5 5h14a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zM8 19H5V8h3v11zM6.5 6.7c-1 0-1.7-.7-1.7-1.7s.7-1.7 1.8-1.7 1.7.7 1.7 1.7-.7 1.7-1.8 1.7zM20 19h-3v-5.6c0-1.4-.6-1.9-1.4-1.9s-1.6.5-1.6 1.9V19h-3V8h3v1.3c.3-.6 1.3-1.5 2.8-1.5 1.6 0 3.2 1 3.2 3.5V19z"/></svg>
            LinkedIn
          </button>
        </div>

        <p class="auth-foot">First time procuring? <a class="role-link" href="/signup">Create a buyer account â†’</a></p>
      </form>

      <p style="text-align:center;margin-top:24px;font-size:12px;color:var(--text-3);">
        <a href="/" style="color:var(--text-3);">â† Back to website</a>
      </p>
    </div>
  </section>
</div>

<script>
  (function () {
    var cards = document.querySelectorAll('#role-picker .role-card');
    var body = document.body;
    cards.forEach(function (card) {
      card.addEventListener('click', function () {
        cards.forEach(function (c) { c.classList.remove('active'); });
        card.classList.add('active');
        var role = card.dataset.role;
        body.classList.remove('role-vendor', 'role-user');
        body.classList.add(role === 'user' ? 'role-user' : 'role-vendor');
      });
    });

    // OTP auto-advance for the User form
    var otpCells = document.querySelectorAll('.otp-cell');
    otpCells.forEach(function (cell, idx) {
      cell.addEventListener('input', function () {
        if (cell.value && otpCells[idx + 1]) otpCells[idx + 1].focus();
      });
      cell.addEventListener('keydown', function (e) {
        if (e.key === 'Backspace' && !cell.value && otpCells[idx - 1]) otpCells[idx - 1].focus();
      });
    });
  })();
</script>

</body>
</html>
