<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Request Inbox · PORTDA Vendor</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>

<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head"><div class="sidebar-logo">⚓</div><div><div class="sidebar-name">PORTDA</div><div class="sidebar-role">Vendor</div></div></div>
    <nav class="sidebar-nav">
      <div class="sidebar-section">Operate</div>
      <a class="nav-item" href="/vendor/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg><span>Dashboard</span></a>
      <a class="nav-item active" href="/vendor/inbox"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>Request Inbox</span><span class="nav-badge">7</span></a>
      <a class="nav-item" href="/vendor/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/></svg><span>Quotations</span></a>
      <a class="nav-item" href="/vendor/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item" href="/vendor/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">2</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/vendor/payouts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Payouts</span></a>
      <a class="nav-item" href="/vendor/billing"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg><span>Plan &amp; Billing</span></a>
      <div class="sidebar-section">Business</div>
      <a class="nav-item" href="/vendor/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg><span>Company Profile</span></a>
      <a class="nav-item" href="/vendor/reviews"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span>Reviews</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/vendor/profile"><div class="avatar">MM</div><div style="min-width:0;"><div class="name">Mumbai Marine</div><div class="role">★ 4.9 · Pro</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search requests, buyers, vessels…" /></div>
    <div class="topbar-actions">
      <a class="icon-btn" href="/vendor/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="dot"></span></a>
      <a class="topbar-avatar" href="/vendor/profile">MM</a>
    </div>
  </header>

  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Request Inbox</h1><p>Live feed of marine service requests in your categories and ports.</p></div>
      <div class="page-actions">
        <button class="btn btn-outline"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg> Filters</button>
        <button class="btn btn-outline">Export CSV</button>
      </div>
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All (24)</a>
      <a href="#">New (7)</a>
      <a href="#">Quoted (12)</a>
      <a href="#">Declined (3)</a>
      <a href="#">Expired (2)</a>
    </div>

    <div class="card mb-16" style="display:flex;gap:12px;align-items:center;background:linear-gradient(90deg,#FFFBEB,#fff 60%);border:1px solid #FDE68A;">
      <div style="width:38px;height:38px;background:linear-gradient(135deg,#F59E0B,#F59E0B);border-radius:10px;color:#fff;display:flex;align-items:center;justify-content:center;">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
      </div>
      <div class="flex-1">
        <div style="font-weight:700;font-size:14px;">2 Premium leads available this week</div>
        <div style="font-size:12px;color:var(--text-2);">Premium leads are reserved for Pro and Elite tiers — upgrade to view buyer &amp; full request details.</div>
      </div>
      <a class="btn" style="background:linear-gradient(135deg,#F59E0B,#F59E0B);color:#fff;" href="/vendor/billing">Upgrade to Pro</a>
    </div>

    <div class="table-wrap">
      <div class="table-head">
        <h3>Inbox · {{ $items->total() }} live leads</h3>
      </div>

      @forelse ($items as $r)
        <div class="lead-card">
          <div class="lead-meta">
            <span class="lead-id">#{{ $r->reference }}</span>
            <span class="chip @if($r->urgency==='critical') chip-danger @elseif($r->urgency==='urgent') chip-warning @else chip-gray @endif">{{ ucfirst($r->urgency) }}</span>
            <span class="chip chip-gray">{{ $r->category->name ?? '—' }}</span>
            <span class="chip chip-gray">{{ optional($r->port)->code }}</span>
          </div>
          <div class="lead-body">
            <div class="row" style="gap:10px;margin-bottom:6px;">
              <div class="t-buyer"><div class="avatar b1">{{ strtoupper(substr($r->buyer->name ?? 'B',0,2)) }}</div><div><div class="name">{{ $r->buyer->name ?? '—' }}</div><div class="sub">IMO {{ $r->imo_number ?: '—' }}</div></div></div>
            </div>
            <div class="lead-title">{{ $r->vessel_name }} · {{ $r->title }}</div>
            <div class="lead-sub">{{ $r->service_date ? $r->service_date->format('d M Y') : 'date TBC' }} {{ $r->service_time ?? '' }} · {{ optional($r->port)->name }}</div>
            @if ($r->description)<div class="muted" style="font-size:12px;margin-top:6px;">{{ Str::limit($r->description, 160) }}</div>@endif
          </div>
          <div class="lead-actions">
            <a class="btn btn-primary btn-sm" href="/vendor/inbox/{{ $r->id }}/quote">Submit quote</a>
            <span class="muted" style="font-size:12px;">{{ $r->quotations_count }} quotes already · {{ $r->created_at->diffForHumans() }}</span>
          </div>
        </div>
      @empty
        <div class="card muted" style="text-align:center;padding:32px;">No leads match your categories &amp; ports right now. Update your profile to see more.</div>
      @endforelse
    </div>

    @isset($quoteRequest)
      <div class="card mt-16" id="new">
        <h3>Submit a quotation for #{{ $quoteRequest->reference }}</h3>
        <p class="muted">{{ $quoteRequest->title }} · {{ $quoteRequest->vessel_name }}</p>
        @if ($errors->any())
          <div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="/vendor/quotations">
          @csrf
          <input type="hidden" name="service_request_id" value="{{ $quoteRequest->id }}" />
          <div class="grid-2" style="gap:16px;">
            <div class="form-group">
              <label class="form-label">Quote amount (₹)</label>
              <input class="form-input" type="number" name="amount" step="0.01" min="0" required value="{{ old('amount') }}" />
            </div>
            <div class="form-group">
              <label class="form-label">Valid until</label>
              <input class="form-input" type="date" name="valid_until" value="{{ old('valid_until') }}" />
            </div>
            <div class="form-group" style="grid-column:1/-1;">
              <label class="form-label">Notes (optional)</label>
              <textarea class="form-input" name="notes" rows="3">{{ old('notes') }}</textarea>
            </div>
          </div>
          <div class="row" style="gap:12px;margin-top:14px;">
            <a class="btn btn-outline" href="/vendor/inbox">Cancel</a>
            <button class="btn btn-primary" type="submit">Submit quote</button>
          </div>
        </form>
      </div>
    @endisset
  </main>
</div>

</body>
</html>
