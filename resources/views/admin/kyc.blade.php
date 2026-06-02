<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>KYC Queue · PORTDA Admin</title>
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
      <div class="page-title"><h1>KYC Verification Queue</h1><p>Pending vendor &amp; buyer onboarding · review documents and approve.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export queue</button><button class="btn btn-primary">Bulk auto-verify (eligible)</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">In Queue</div><div class="kpi-value">14</div><div class="kpi-delta down">▼ 3 vs yesterday</div></div>
      <div class="kpi"><div class="kpi-label">Avg TAT</div><div class="kpi-value">6.4 hrs</div><div class="kpi-delta up">SLA 24h</div></div>
      <div class="kpi"><div class="kpi-label">Approved (MTD)</div><div class="kpi-value">82</div><div class="kpi-delta up">▲ 18%</div></div>
      <div class="kpi"><div class="kpi-label">Rejected (MTD)</div><div class="kpi-value">4</div><div class="kpi-delta">missing docs</div></div>
    </div>

    <div class="tab-strip">
      <a href="/admin/kyc?status=pending"  class="@if($status==='pending') active @endif">Pending</a>
      <a href="/admin/kyc?status=approved" class="@if($status==='approved') active @endif">Approved</a>
      <a href="/admin/kyc?status=rejected" class="@if($status==='rejected') active @endif">Rejected</a>
    </div>

    <div class="grid-2">
      <div>
        @forelse ($items as $k)
          <div class="card mb-12">
            <div class="row" style="gap:14px;align-items:flex-start;">
              <div class="avatar" style="width:48px;height:48px;border-radius:12px;background:var(--admin-purple-light);color:var(--admin-purple);font-weight:800;font-size:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">{{ strtoupper(substr($k->user->name ?? 'U',0,2)) }}</div>
              <div class="flex-1">
                <div class="row-between">
                  <strong>{{ $k->user->name ?? '—' }}</strong>
                  <span class="chip @if($k->status==='approved') chip-success @elseif($k->status==='rejected') chip-danger @else chip-warning @endif">{{ ucfirst($k->status) }}</span>
                </div>
                <div class="muted" style="font-size:12px;margin-top:2px;">{{ ucfirst($k->user->role ?? '') }} · {{ strtoupper($k->doc_type) }}{{ $k->doc_number ? ' · '.$k->doc_number : '' }}</div>
                @if ($k->original_name)
                  <div class="muted" style="font-size:12px;margin-top:4px;"><a href="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($k->file_path) }}" target="_blank">{{ $k->original_name }} ↗</a></div>
                @endif
                @if ($k->reject_reason)<div style="font-size:12px;color:var(--danger);margin-top:6px;">Reason: {{ $k->reject_reason }}</div>@endif
                @if ($k->status === 'pending')
                  <div style="display:flex;gap:6px;margin-top:12px;align-items:center;flex-wrap:wrap;">
                    <form method="POST" action="/admin/kyc/{{ $k->id }}/approve" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Approve</button></form>
                    <form method="POST" action="/admin/kyc/{{ $k->id }}/reject" style="display:inline;">
                      @csrf
                      <input type="text" name="reason" placeholder="reason" style="width:160px;font-size:11px;" required />
                      <button class="btn btn-sm btn-ghost" style="color:var(--danger);">Reject</button>
                    </form>
                  </div>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="card muted" style="text-align:center;padding:32px;">Queue is empty.</div>
        @endforelse
      </div>
      <div class="card" style="height:fit-content;">
        <div class="card-head"><h3>Review tips</h3></div>
        <ul style="font-size:13px;line-height:1.6;padding-left:18px;color:var(--text-2);">
          <li>Verify GST against the GSTN portal.</li>
          <li>Confirm PAN matches the entity name.</li>
          <li>For vendors, DGS/IRS licence must be currently valid.</li>
          <li>P&amp;I insurance: verify coverage period covers FY 26–27.</li>
        </ul>
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('kyc', 'Search applicants…');</script>
</body>
</html>
