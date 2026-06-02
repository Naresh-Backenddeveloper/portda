<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Chat Â· PORTDA Buyer</title>
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
      <a class="nav-item" href="/buyer/new-request"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg><span>New Request</span></a>
      <a class="nav-item" href="/buyer/requests"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg><span>My Requests</span><span class="nav-badge">4</span></a>
      <a class="nav-item" href="/buyer/quotations"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg><span>Quotations</span><span class="nav-badge">12</span></a>
      <a class="nav-item" href="/buyer/orders"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg><span>Orders</span><span class="nav-badge gray">5</span></a>
      <a class="nav-item active" href="/buyer/chat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg><span>Chat</span><span class="nav-badge">3</span></a>
      <div class="sidebar-section">Finance</div>
      <a class="nav-item" href="/buyer/payments"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/></svg><span>Payments</span></a>
      <a class="nav-item" href="/buyer/invoices"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/></svg><span>Invoices</span></a>
      <div class="sidebar-section">Network</div>
      <a class="nav-item" href="/buyer/vendors"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Vendors</span></a>
      <a class="nav-item" href="/buyer/profile"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg><span>Company Profile</span></a>
    </nav>
    <div class="sidebar-foot"><a class="user-chip" href="/buyer/profile"><div class="avatar" style="background:var(--accent);">OL</div><div style="min-width:0;"><div class="name">OceanLink Shipping</div><div class="role">Capt. Rajesh K.</div></div></a><a class="logout-btn" href="/login" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a></div>
  </aside>

  <header class="topbar">
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg><input type="search" placeholder="Search conversationsâ€¦" /></div>
    <div class="topbar-actions"><a class="icon-btn" href="/buyer/notifications"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg><span class="dot"></span></a><a class="topbar-avatar" href="/buyer/profile">RK</a></div>
  </header>

  <main class="main" style="padding:0;">
    @php
      $u = auth()->user();
      $base = $u->role === 'vendor' ? '/vendor' : '/buyer';
    @endphp
    <div style="display:grid;grid-template-columns:320px 1fr;height:calc(100vh - 80px);">
      <!-- Rooms list -->
      <aside style="border-right:1px solid var(--border-2);overflow-y:auto;background:var(--bg);">
        <div style="padding:16px;border-bottom:1px solid var(--border-2);"><h3 style="margin:0;">Messages ({{ $rooms->count() }})</h3></div>
        @forelse ($rooms as $r)
          @php
            $other = $u->id === $r->buyer_id ? $r->vendor : $r->buyer;
            $last = $r->lastMessage->first() ?? null;
            $isActive = isset($activeRoom) && $activeRoom && $activeRoom->id === $r->id;
          @endphp
          <a href="{{ $base }}/chat?room={{ $r->id }}" style="display:flex;gap:10px;padding:12px 16px;text-decoration:none;color:var(--text);border-bottom:1px solid var(--border-2);@if($isActive)background:var(--primary-light);border-left:3px solid var(--primary);@endif">
            <div style="width:40px;height:40px;border-radius:50%;background:var(--primary-light);color:var(--primary);font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0;">{{ strtoupper(substr($other->name ?? 'U',0,2)) }}</div>
            <div style="flex:1;min-width:0;">
              <div style="display:flex;justify-content:space-between;gap:6px;">
                <strong style="font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $other->name ?? '—' }}</strong>
                <span class="muted" style="font-size:11px;flex-shrink:0;">{{ optional($r->last_message_at)->diffForHumans() ?? '' }}</span>
              </div>
              @if ($r->serviceRequest)<div class="muted" style="font-size:11px;">#{{ $r->serviceRequest->reference }}</div>@endif
              @if ($last)<div class="muted" style="font-size:12px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ Str::limit($last->body ?? '[attachment]', 40) }}</div>@endif
            </div>
          </a>
        @empty
          <div class="muted" style="padding:32px 16px;text-align:center;">No chat rooms yet.</div>
        @endforelse
      </aside>

      <!-- Active room -->
      <section style="display:flex;flex-direction:column;overflow:hidden;">
        @isset($activeRoom)
          @php $other = $u->id === $activeRoom->buyer_id ? $activeRoom->vendor : $activeRoom->buyer; @endphp
          <header style="padding:16px;border-bottom:1px solid var(--border-2);display:flex;gap:12px;align-items:center;">
            <div style="width:38px;height:38px;border-radius:50%;background:var(--primary-light);color:var(--primary);font-weight:800;display:flex;align-items:center;justify-content:center;">{{ strtoupper(substr($other->name ?? 'U',0,2)) }}</div>
            <div>
              <div style="font-weight:700;">{{ $other->name ?? '—' }}</div>
              @if ($activeRoom->serviceRequest)<div class="muted" style="font-size:12px;">on #{{ $activeRoom->serviceRequest->reference }} · {{ $activeRoom->serviceRequest->title }}</div>@endif
            </div>
          </header>

          <div style="flex:1;overflow-y:auto;padding:18px;background:var(--bg);">
            @forelse ($activeRoom->messages as $m)
              @php $mine = $m->sender_id === $u->id; @endphp
              <div style="display:flex;justify-content:{{ $mine ? 'flex-end' : 'flex-start' }};margin-bottom:10px;">
                <div style="max-width:65%;">
                  <div style="background:{{ $mine ? 'var(--primary)' : '#fff' }};color:{{ $mine ? '#fff' : 'var(--text)' }};padding:10px 14px;border-radius:14px;border:1px solid var(--border-2);">
                    @if ($m->body){{ $m->body }}@endif
                    @if ($m->attachment_path)<a href="{{ Storage::disk('public')->url($m->attachment_path) }}" target="_blank" style="color:inherit;text-decoration:underline;">📎 attachment</a>@endif
                  </div>
                  <div class="muted" style="font-size:10px;margin-top:4px;text-align:{{ $mine ? 'right' : 'left' }};">{{ $m->sender->name ?? '' }} · {{ $m->created_at->format('d M H:i') }}</div>
                </div>
              </div>
            @empty
              <div class="muted" style="text-align:center;padding:32px;">No messages yet. Say hi.</div>
            @endforelse
          </div>

          <form method="POST" action="{{ $base }}/chat/{{ $activeRoom->id }}/messages" enctype="multipart/form-data" style="padding:14px;border-top:1px solid var(--border-2);background:#fff;">
            @csrf
            <input type="hidden" name="type" value="text" />
            <div style="display:flex;gap:8px;">
              <input class="form-input" name="body" placeholder="Type a message…" required style="flex:1;" />
              <button class="btn btn-primary" type="submit">Send</button>
            </div>
          </form>
        @else
          <div class="muted" style="display:flex;align-items:center;justify-content:center;height:100%;font-size:14px;">Pick a conversation from the left.</div>
        @endisset
      </section>
    </div>
  </main>
</div>
</body>
</html>
