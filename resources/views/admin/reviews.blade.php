<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Reviews · PORTDA Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<link rel="stylesheet" href="/app/admin/admin.css" />
</head>
<body>
<div class="app-shell admin">
  <div id="admin-shell"></div>
  <main class="main">
    <div class="page-header">
      <div class="page-title"><h1>Reviews Moderation</h1><p>Buyer reviews on completed orders · approve, hide, or remove inappropriate content.</p></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Total Reviews</div><div class="kpi-value">14,628</div></div>
      <div class="kpi"><div class="kpi-label">Avg Rating</div><div class="kpi-value">★ 4.7</div><div class="kpi-delta up">stable</div></div>
      <div class="kpi"><div class="kpi-label">Flagged (24h)</div><div class="kpi-value">8</div><div class="kpi-delta down">needs review</div></div>
      <div class="kpi"><div class="kpi-label">Vendor responses</div><div class="kpi-value">62%</div><div class="kpi-delta up">▲ 4pts</div></div>
    </div>

    <div class="tab-strip">
      <a href="/admin/reviews" class="active">All ({{ $items->total() }})</a>
    </div>

    @forelse ($items as $rv)
      <div class="card mb-12">
        <div class="row" style="gap:14px;align-items:flex-start;">
          <div class="avatar" style="width:42px;height:42px;border-radius:50%;background:var(--primary-light);color:var(--primary);font-weight:800;display:flex;align-items:center;justify-content:center;font-size:13px;flex-shrink:0;">{{ strtoupper(substr($rv->buyer->name ?? 'B',0,2)) }}</div>
          <div class="flex-1">
            <div class="row-between" style="margin-bottom:4px;">
              <div>
                <strong>{{ $rv->buyer->name ?? 'Anonymous' }}</strong>
                <div class="muted" style="font-size:12px;">{!! str_repeat('★', $rv->rating) !!}{!! str_repeat('☆', 5 - $rv->rating) !!} · #{{ $rv->order->reference ?? '—' }} · about {{ $rv->vendor->name ?? '—' }} · {{ $rv->created_at->format('d M Y') }}</div>
              </div>
              <span class="chip @if($rv->status==='published') chip-success @elseif($rv->status==='flagged') chip-danger @else chip-warning @endif">{{ ucfirst($rv->status) }}</span>
            </div>
            @if ($rv->title)<strong>{{ $rv->title }}</strong>@endif
            @if ($rv->body)<p style="font-size:14px;line-height:1.5;margin:8px 0;padding:10px;background:var(--bg);border-radius:8px;">{{ $rv->body }}</p>@endif
            @if ($rv->vendor_reply)
              <div class="muted" style="font-size:12px;background:var(--warning-light);padding:8px;border-radius:8px;"><strong>Vendor reply:</strong> {{ $rv->vendor_reply }}</div>
            @endif
          </div>
        </div>
      </div>
    @empty
      <div class="card muted" style="text-align:center;padding:32px;">No reviews to moderate.</div>
    @endforelse
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('reviews');</script>
</body>
</html>
