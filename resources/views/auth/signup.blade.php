<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Register Â· PORTDA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>

<div class="auth-shell">
  <aside class="auth-side">
    <div class="badge">âš“ Join 1,200+ verified vendors</div>
    <h1>Register your marine business in 5 minutes.</h1>
    <p>Provide your company details, service categories, sub-services, work locations and KYC. We verify within 4â€“24 hours and your first request lands soon after.</p>
    <ul>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Subscription unlocks lead access Â· 5% commission on conversions</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Choose Commission or Subscription after KYC</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Bid across 14 leading global ports from one inbox</li>
      <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Verified buyers â€” every ship agent KYC'd</li>
    </ul>
  </aside>

  <section class="auth-form-side">
    <div class="auth-form" style="max-width:440px;">
      <div class="auth-logo"><span class="mark">âš“</span> PORTDA</div>
      <h2>Create your account</h2>
      <p class="lede">Step 1 of 5 â€” basic company info. After KYC you'll pick a subscription tier to start viewing leads.</p>

      <div style="display:flex;gap:6px;margin-bottom:22px;">
        <div style="flex:1;height:4px;background:var(--primary);border-radius:2px;"></div>
        <div style="flex:1;height:4px;background:var(--border-2);border-radius:2px;"></div>
        <div style="flex:1;height:4px;background:var(--border-2);border-radius:2px;"></div>
        <div style="flex:1;height:4px;background:var(--border-2);border-radius:2px;"></div>
        <div style="flex:1;height:4px;background:var(--border-2);border-radius:2px;"></div>
      </div>

      <form method="POST" action="/signup">
        @csrf
        @if ($errors->any())
          <div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:13px;">
            <ul style="margin:0;padding-left:18px;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
          </div>
        @endif
        <div class="form-group">
          <label class="form-label">Company / Your name</label>
          <input class="form-input" name="name" type="text" placeholder="Your company name" value="{{ old('name') }}" required />
        </div>
        <div class="form-group">
          <label class="form-label">I am a</label>
          <select class="form-select" name="role" required>
            <option value="buyer" {{ old('role') === 'buyer' ? 'selected' : '' }}>Buyer (Shipping company / Agent)</option>
            <option value="vendor" {{ old('role') === 'vendor' ? 'selected' : '' }}>Vendor (Marine service provider)</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Work email</label>
            <input class="form-input" name="email" type="email" placeholder="you@company.in" value="{{ old('email') }}" required />
          </div>
          <div class="form-group">
            <label class="form-label">Phone</label>
            <input class="form-input" name="phone" type="tel" placeholder="+91 22 0000 0000" value="{{ old('phone') }}" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Password</label>
            <input class="form-input" name="password" type="password" minlength="8" required />
          </div>
          <div class="form-group">
            <label class="form-label">Confirm password</label>
            <input class="form-input" name="password_confirmation" type="password" minlength="8" required />
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg">Create account â†’</button>
      </form>

      <div style="margin-top:14px;padding:10px 12px;background:var(--bg);border:1px dashed var(--border);border-radius:10px;font-size:12px;color:var(--text-2);line-height:1.5;">
        <strong style="color:var(--text);">How charges work:</strong> Subscription (â‚¹4,999â€“â‚¹29,999/qtr) unlocks lead access Â· PORTDA also takes <strong>5% commission</strong> when a lead converts to a confirmed order. Both apply to every active vendor.
      </div>

      <p class="auth-foot">Already have an account? <a href="/login">Sign in â†’</a></p>
      <p style="text-align:center;margin-top:18px;font-size:12px;color:var(--text-3);">
        <a href="/" style="color:var(--text-3);">â† Back to website</a>
      </p>
    </div>
  </section>
</div>

</body>
</html>
