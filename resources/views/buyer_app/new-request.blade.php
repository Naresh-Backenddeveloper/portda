<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>New Request Â· PORTDA Buyer</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>
<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head"><div class="sidebar-logo">âš“</div><div><div class="sidebar-name">PORTDA</div><div class="sidebar-role buyer">Buyer</div></div></div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Procurement</div>
      <a class="nav-item" href="/buyer/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item active" href="/buyer/new-request"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg><span>New Request</span></a>
      <a class="nav-item" href="/buyer/requests"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>My Requests</span><span class="nav-badge">4</span></a>
      <a class="nav-item" href="/buyer/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span><span class="nav-badge">12</span></a>
      <a class="nav-item" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Searchâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>New Service Request</h1><p>Post a request — verified vendors in matching categories &amp; ports will be notified instantly.</p></div>
    </div>

    @if ($errors->any())
      <div class="card" style="background:#FEE2E2;color:#991B1B;margin-bottom:16px;">
        <ul style="margin:0;padding-left:18px;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form method="POST" action="/buyer/new-request">
      @csrf
      <div class="card">
        <div class="grid-2" style="gap:16px;">
          <div class="form-group">
            <label class="form-label">Port</label>
            <select class="form-select" name="port_id" required>
              <option value="">— Select port —</option>
              @foreach ($ports as $p)
                <option value="{{ $p->id }}" {{ old('port_id') == $p->id ? 'selected' : '' }}>{{ $p->name }} ({{ $p->code }})</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Category</label>
            <select class="form-select" name="category_id" required>
              <option value="">— Select category —</option>
              @foreach ($categories as $c)
                <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>{{ $c->icon }} {{ $c->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Vessel name</label>
            <input class="form-input" type="text" name="vessel_name" value="{{ old('vessel_name') }}" placeholder="MV Pacific Bridge" required />
          </div>
          <div class="form-group">
            <label class="form-label">IMO number (optional)</label>
            <input class="form-input" type="text" name="imo_number" value="{{ old('imo_number') }}" placeholder="9456712" />
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Title</label>
            <input class="form-input" type="text" name="title" value="{{ old('title') }}" placeholder="Pilotage at JNPT — MV Pacific Bridge" required />
          </div>
          <div class="form-group" style="grid-column:1/-1;">
            <label class="form-label">Description</label>
            <textarea class="form-input" name="description" rows="3" placeholder="Vessel arrives 18 May. Requires inbound pilotage.">{{ old('description') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label">Service date</label>
            <input class="form-input" type="date" name="service_date" value="{{ old('service_date') }}" />
          </div>
          <div class="form-group">
            <label class="form-label">Time</label>
            <input class="form-input" type="text" name="service_time" value="{{ old('service_time') }}" placeholder="09:00 IST" />
          </div>
          <div class="form-group">
            <label class="form-label">Budget min (₹)</label>
            <input class="form-input" type="number" name="budget_min" value="{{ old('budget_min') }}" step="0.01" min="0" />
          </div>
          <div class="form-group">
            <label class="form-label">Budget max (₹)</label>
            <input class="form-input" type="number" name="budget_max" value="{{ old('budget_max') }}" step="0.01" min="0" />
          </div>
          <div class="form-group">
            <label class="form-label">Urgency</label>
            <select class="form-select" name="urgency" required>
              <option value="standard" {{ old('urgency')==='standard' ? 'selected' : '' }}>Standard</option>
              <option value="urgent"   {{ old('urgency')==='urgent' ? 'selected' : '' }}>Urgent</option>
              <option value="critical" {{ old('urgency')==='critical' ? 'selected' : '' }}>Critical</option>
            </select>
          </div>
        </div>
        <div class="row" style="gap:12px;margin-top:18px;">
          <a class="btn btn-outline" href="/buyer/requests">Cancel</a>
          <button class="btn btn-primary" type="submit">Post request</button>
        </div>
      </div>
    </form>
  </main>
</div>

<style>
  /* Stepper */
  .stepper { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 22px; padding: 6px; background: #fff; border: 1px solid var(--border-2); border-radius: 14px; }
  .step-pill { display: flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 10px; font-size: 13px; font-weight: 600; color: var(--text-3); transition: background .15s ease, color .15s ease; flex: 1; min-width: 0; justify-content: center; }
  .step-pill .num { width: 22px; height: 22px; border-radius: 50%; background: var(--bg-2); display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; flex-shrink: 0; }
  .step-pill.active { background: var(--accent-light); color: var(--accent); }
  .step-pill.active .num { background: var(--accent); color: #fff; }
  .step-pill.done { color: var(--success); }
  .step-pill.done .num { background: var(--success); color: #fff; }
  .step-pill .lbl { white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

  /* Wizard steps */
  .wizard-step { display: none; animation: fadeIn .25s ease; }
  .wizard-step.active { display: block; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: none; } }
  .step-title { font-size: 18px; font-weight: 800; margin: 0 0 4px; letter-spacing: -.3px; }
  .sub-label { font-size: 11px; font-weight: 700; color: var(--text-3); letter-spacing: 1px; text-transform: uppercase; margin: 0 0 10px; }

  /* Category tiles */
  .cat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
  .cat-tile { display: flex; align-items: center; gap: 12px; padding: 14px; background: #fff; border: 1.5px solid var(--border); border-radius: 14px; cursor: pointer; transition: border-color .15s ease, transform .15s ease, box-shadow .15s ease; }
  .cat-tile:hover { transform: translateY(-2px); box-shadow: var(--shadow-sm); }
  .cat-tile.active { border-color: var(--accent); background: linear-gradient(180deg, rgba(249,115,22,.06) 0%, #fff 70%); }
  .cat-tile.vertical { flex-direction: column; text-align: center; gap: 8px; padding: 18px 12px; }
  .cat-ico { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
  .cat-ico-lg { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; margin: 0 auto; }

  /* Berth grid */
  .berth-grid { display: grid; grid-template-columns: repeat(8, 1fr); gap: 8px; }
  .berth { background: #fff; border: 1.5px solid var(--border); border-radius: 10px; padding: 14px 8px; text-align: center; cursor: pointer; transition: border-color .15s ease; }
  .berth:hover { border-color: var(--accent); }
  .berth.active { border-color: var(--accent); background: var(--accent-light); color: var(--accent); }

  /* Vendor pick cards */
  .vendor-pick { display: block; padding: 12px; border: 1.5px solid var(--border); border-radius: 12px; cursor: pointer; transition: border-color .15s ease, background .15s ease; }
  .vendor-pick:hover { border-color: var(--accent); }
  .vendor-pick.active { border-color: var(--accent); background: var(--accent-light); }
  .vendor-pick .t-buyer .avatar { width: 36px; height: 36px; }

  /* Documents */
  .doc-list { display: flex; flex-direction: column; gap: 8px; }
  .doc-row { display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg); border-radius: 10px; }
  .doc-ico { width: 36px; height: 36px; background: var(--danger-light); color: var(--danger); border-radius: 8px; font-size: 11px; font-weight: 800; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .doc-upload { padding: 28px; border: 1.5px dashed var(--border); border-radius: 12px; text-align: center; color: var(--text-2); cursor: pointer; transition: border-color .15s ease, background .15s ease; display: flex; flex-direction: column; align-items: center; }
  .doc-upload:hover { border-color: var(--accent); background: var(--accent-light); color: var(--accent); }

  /* Wizard nav */
  .wizard-nav { position: sticky; bottom: 0; margin-top: 24px; padding: 14px 18px; background: #fff; border: 1px solid var(--border-2); border-radius: 14px; display: flex; align-items: center; justify-content: space-between; gap: 12px; box-shadow: 0 -4px 14px rgba(15, 23, 42, .04); }

  /* Service-type list (mobile-style full list) */
  .svc-list { display: flex; flex-direction: column; gap: 8px; }
  .svc-row { display: flex; align-items: center; gap: 14px; padding: 14px 16px; background: #fff; border: 1.5px solid var(--border); border-radius: 12px; cursor: pointer; transition: border-color .15s ease, background .15s ease; }
  .svc-row:hover { border-color: var(--accent); }
  .svc-row.active { border-color: var(--accent); background: linear-gradient(180deg, rgba(249,115,22,.06) 0%, #fff 70%); }
  .svc-ico { width: 42px; height: 42px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 20px; flex-shrink: 0; }
  .svc-dot { width: 18px; height: 18px; border-radius: 50%; border: 1.5px solid var(--border); flex-shrink: 0; transition: border-color .15s ease, background .15s ease; }
  .svc-row.active .svc-dot { border-color: var(--accent); background: var(--accent); box-shadow: inset 0 0 0 3px #fff; }

  /* Inline search bar */
  .search-row { display: flex; align-items: center; gap: 10px; padding: 10px 14px; background: #fff; border: 1px solid var(--border); border-radius: 10px; color: var(--text-3); }
  .search-row input { flex: 1; border: none; outline: none; font-size: 14px; background: transparent; color: var(--text); font-family: inherit; }

  /* Override default primary to accent (buyer theme) */
  body .btn-primary { background: var(--accent); box-shadow: 0 4px 14px rgba(249, 115, 22, .25); }
  body .btn-primary:hover { background: #C2410C; }

  @media (max-width: 1100px) {
    .cat-grid { grid-template-columns: repeat(2, 1fr); }
    .berth-grid { grid-template-columns: repeat(4, 1fr); }
    .step-pill .lbl { display: none; }
    .step-pill { flex: 0 0 auto; padding: 8px 10px; }
  }
</style>

<script>
  (function () {
    var TOTAL = 8; // includes the confirmation
    var current = 1;
    var steps = document.querySelectorAll('.wizard-step');
    var pills = document.querySelectorAll('.step-pill');
    var btnBack = document.getElementById('btn-back');
    var btnNext = document.getElementById('btn-next');
    var progress = document.getElementById('step-progress');
    var caption = document.getElementById('step-caption');
    var nav = document.getElementById('wizard-nav');
    var stepper = document.getElementById('stepper');

    var captions = {
      1: 'Step 1 of 7 Â· Quick start â€” pick a service category.',
      2: 'Step 2 of 7 Â· Choose the exact service type.',
      3: 'Step 3 of 7 Â· Pick the sub-service and movement type.',
      4: 'Step 4 of 7 Â· Where will the service happen?',
      5: 'Step 5 of 7 Â· When does it need to happen?',
      6: 'Step 6 of 7 Â· Attach supporting documents.',
      7: 'Step 7 of 7 Â· Review and post.',
      8: 'Done â€” your request is live with verified vendors.'
    };

    function render() {
      steps.forEach(function (s) { s.classList.toggle('active', +s.dataset.step === current); });
      pills.forEach(function (p, i) {
        p.classList.toggle('active', i + 1 === current);
        p.classList.toggle('done', i + 1 < current);
      });
      btnBack.disabled = current === 1 || current === 8;
      btnNext.textContent = current === 7 ? 'Post Request' : (current === 8 ? 'View Quotes' : 'Continue â†’');
      progress.innerHTML = current <= 7 ? 'Step <strong style="color:var(--text);">' + current + '</strong> of 7' : 'Submitted âœ“';
      caption.textContent = captions[current] || '';
      nav.style.display = current === 8 ? 'none' : 'flex';
      stepper.style.display = current === 8 ? 'none' : 'flex';
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    btnBack.addEventListener('click', function () {
      if (current > 1) { current--; render(); }
    });
    btnNext.addEventListener('click', function () {
      if (current < TOTAL) { current++; render(); }
    });
    pills.forEach(function (p, i) {
      p.addEventListener('click', function () { current = i + 1; render(); });
    });

    // Tile + berth + vendor selection toggles
    document.querySelectorAll('.cat-tile').forEach(function (tile) {
      tile.addEventListener('click', function () {
        var radio = tile.querySelector('input[type=radio]');
        if (!radio) return;
        document.querySelectorAll('input[name="' + radio.name + '"]').forEach(function (r) {
          r.closest('.cat-tile').classList.remove('active');
        });
        tile.classList.add('active');
      });
    });
    document.querySelectorAll('.berth').forEach(function (b) {
      b.addEventListener('click', function () {
        document.querySelectorAll('.berth').forEach(function (x) { x.classList.remove('active'); });
        b.classList.add('active');
      });
    });
    document.querySelectorAll('.svc-row').forEach(function (r) {
      r.addEventListener('click', function () {
        document.querySelectorAll('.svc-row').forEach(function (x) { x.classList.remove('active'); });
        r.classList.add('active');
      });
    });
    document.querySelectorAll('.vendor-pick').forEach(function (v) {
      v.addEventListener('click', function () {
        v.classList.toggle('active');
        var cb = v.querySelector('input[type=checkbox]');
        if (cb) cb.checked = !cb.checked;
      });
    });
  })();
</script>
</body>
</html>
