<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quote Moderation · PORTDA Admin</title>
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
      <div class="page-title"><h1>Quote Moderation</h1><p>Vendor quotes pending review · approve before they're released to the buyer.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Approval policy</button></div>
    </div>

    <div class="card mb-20" style="background:linear-gradient(90deg,rgba(124,58,237,.06),#fff 60%);border:1.5px solid var(--admin-purple-light);">
      <div class="row" style="gap:14px;align-items:center;">
        <div style="width:42px;height:42px;background:var(--admin-purple-light);color:var(--admin-purple);border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 12l2 2 4-4"/><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
        </div>
        <div class="flex-1">
          <strong style="font-size:14px;">How quote moderation works</strong>
          <div class="muted" style="font-size:13px;margin-top:2px;line-height:1.5;">Vendors submit quotes here for admin review. Once approved, quotes are <strong>automatically released to the buyer</strong>. If rejected or returned, the vendor sees the feedback and can resubmit.</div>
        </div>
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Pending review</div><div class="kpi-value">12</div><div class="kpi-delta down">avg SLA 18 min</div></div>
      <div class="kpi"><div class="kpi-label">Approved MTD</div><div class="kpi-value">1,684</div><div class="kpi-delta up">98.8% approval rate</div></div>
      <div class="kpi"><div class="kpi-label">Returned to vendor</div><div class="kpi-value">22</div><div class="kpi-delta">missing PDF / pricing</div></div>
      <div class="kpi"><div class="kpi-label">Rejected MTD</div><div class="kpi-value">8</div><div class="kpi-delta">policy violation</div></div>
    </div>

    <div class="tab-strip">
      <a href="/admin/quote-moderation" class="@if(!request('status')) active @endif">All</a>
      <a href="/admin/quote-moderation?status=submitted">Submitted</a>
      <a href="/admin/quote-moderation?status=accepted">Accepted</a>
      <a href="/admin/quote-moderation?status=rejected">Rejected</a>
    </div>

    <div class="grid-2">
      <div>
        @forelse ($items as $q)
          <div class="card mb-12">
            <div class="row" style="gap:14px;align-items:flex-start;">
              <div class="avatar" style="width:48px;height:48px;border-radius:12px;background:var(--primary-light);color:var(--primary);font-weight:800;font-size:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">{{ strtoupper(substr($q->vendor->name ?? 'V',0,2)) }}</div>
              <div class="flex-1">
                <div class="row-between">
                  <strong>{{ $q->reference }} · {{ $q->vendor->name ?? '—' }}</strong>
                  <span class="chip @if($q->status==='accepted') chip-success @elseif(in_array($q->status,['rejected','withdrawn','expired'])) chip-gray @else chip-warning @endif">{{ ucfirst($q->status) }}</span>
                </div>
                <div class="muted" style="font-size:12px;margin-top:2px;">→ {{ $q->serviceRequest->buyer->name ?? '—' }} · #{{ $q->serviceRequest->reference ?? '' }} · {{ $q->serviceRequest->title ?? '' }}</div>
                <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;margin-top:10px;">
                  <div style="padding:8px;background:var(--bg);border-radius:8px;text-align:center;"><div class="muted" style="font-size:10px;letter-spacing:.5px;">QUOTE</div><strong style="font-size:14px;">₹{{ number_format($q->amount) }}</strong></div>
                  <div style="padding:8px;background:var(--bg);border-radius:8px;text-align:center;"><div class="muted" style="font-size:10px;letter-spacing:.5px;">VALID</div><strong style="font-size:14px;">{{ $q->valid_until ? $q->valid_until->format('d M') : '—' }}</strong></div>
                  <div style="padding:8px;background:var(--bg);border-radius:8px;text-align:center;"><div class="muted" style="font-size:10px;letter-spacing:.5px;">CREATED</div><strong style="font-size:14px;">{{ $q->created_at->diffForHumans() }}</strong></div>
                </div>
                @if ($q->notes)<div class="muted" style="font-size:12px;margin-top:8px;">{{ Str::limit($q->notes, 180) }}</div>@endif
                @if ($q->status === 'submitted')
                  <div style="display:flex;gap:6px;margin-top:12px;">
                    <form method="POST" action="/admin/quotations/{{ $q->id }}/flag" style="display:inline;" onsubmit="return confirm('Flag and reject this quote?');">@csrf<button class="btn btn-sm btn-danger">Flag &amp; Reject</button></form>
                  </div>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="card muted" style="text-align:center;padding:32px;">No quotations.</div>
        @endforelse
      </div>
      <div class="card" style="height:fit-content;">
        <div class="card-head"><h3>Moderation policy</h3></div>
        <ul style="font-size:13px;line-height:1.6;padding-left:18px;color:var(--text-2);">
          <li>Flag quotes that violate platform pricing guidance.</li>
          <li>Quotes outside ±30% of the buyer's stated budget get auto-tagged.</li>
          <li>Repeat policy violations roll up to admin escalation.</li>
        </ul>
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('quotes');</script>
</body>
</html>
