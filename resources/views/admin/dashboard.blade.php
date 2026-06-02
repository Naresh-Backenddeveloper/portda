<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard · PORTDA Admin</title>
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
      <div class="page-title"><h1>Platform Dashboard</h1><p>Real-time overview of the PORTDA marketplace · FY 2026–27</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export</button><a class="btn btn-primary" href="/admin/broadcast">+ Broadcast</a></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-icon purple"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18"/><path d="M5 21V10l7-4 7 4v11"/></svg></div><div class="kpi-label">Vendors</div><div class="kpi-value">{{ $stats['users_by_role']['vendor'] ?? 0 }}</div><div class="kpi-delta up">{{ $stats['pending_kyc'] ?? 0 }} KYC pending</div></div>
      <div class="kpi"><div class="kpi-icon indigo"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div class="kpi-label">Buyers</div><div class="kpi-value">{{ $stats['users_by_role']['buyer'] ?? 0 }}</div><div class="kpi-delta up">{{ $stats['total_requests'] ?? 0 }} requests</div></div>
      <div class="kpi"><div class="kpi-icon green"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div class="kpi-label">GMV</div><div class="kpi-value">₹{{ number_format(($stats['total_revenue'] ?? 0) / 10000000, 2) }} Cr</div><div class="kpi-delta up">{{ $stats['total_orders'] ?? 0 }} orders</div></div>
      <div class="kpi"><div class="kpi-icon orange"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94"/></svg></div><div class="kpi-label">Disputes Open</div><div class="kpi-value">{{ $stats['pending_disputes'] ?? 0 }}</div><div class="kpi-delta up">live tracking</div></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>GMV trend · last 12 months</h3><a class="link" href="/admin/analytics">Detailed analytics →</a></div>
        <div style="display:flex;align-items:flex-end;gap:8px;height:160px;margin-top:8px;">
          <div style="flex:1;background:var(--admin-purple-light);height:30%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:38%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:42%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:48%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:55%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:50%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:62%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple-light);height:68%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple);height:75%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple);height:82%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple);height:90%;border-radius:6px;"></div>
          <div style="flex:1;background:var(--admin-purple);height:95%;border-radius:6px;"></div>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--text-3);margin-top:6px;"><span>Jun</span><span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span><span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>May</span></div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Revenue split (MTD)</h3></div>
        <div class="row-between mb-12"><span>Subscription</span><strong>₹22.8 L · 59%</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;margin-bottom:14px;"><div style="background:var(--admin-purple);height:100%;width:59%;"></div></div>
        <div class="row-between mb-12"><span>Commission</span><strong>₹14.2 L · 37%</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;margin-bottom:14px;"><div style="background:var(--accent);height:100%;width:37%;"></div></div>
        <div class="row-between mb-12"><span>Premium-lead unlocks</span><strong>₹1.4 L · 4%</strong></div>
        <div style="background:var(--bg);height:8px;border-radius:4px;overflow:hidden;"><div style="background:var(--success);height:100%;width:4%;"></div></div>
      </div>
    </div>

    @php
      $topVendors = \App\Models\VendorProfile::with('user:id,name')->orderByDesc('jobs_completed')->limit(3)->get();
      $pendingKycList = \App\Models\KycDocument::with('user:id,name,role')->where('status','pending')->latest()->limit(3)->get();
      $openDisputesList = \App\Models\Dispute::with(['order:id,reference','raiser:id,name'])->whereIn('status',['open','investigating'])->latest()->limit(3)->get();
    @endphp

    <div class="grid-3 mb-20">
      <div class="card" style="border:1.5px solid var(--admin-purple);background:linear-gradient(180deg,rgba(124,58,237,.05) 0%,#fff 60%);">
        <div class="card-head"><h3>KYC queue</h3><a class="link" href="/admin/kyc" style="color:var(--admin-purple);">{{ $stats['pending_kyc'] ?? 0 }} pending →</a></div>
        @forelse ($pendingKycList as $k)
          <div class="activity-item"><div class="activity-icon amber">⏱</div><div class="activity-body"><div class="activity-title">{{ $k->user->name ?? '—' }} <time>{{ $k->created_at->diffForHumans() }}</time></div><div class="activity-sub">{{ ucfirst($k->user->role ?? '') }} · {{ strtoupper($k->doc_type) }}</div></div></div>
        @empty
          <div class="muted" style="padding:14px 0;">No pending KYC.</div>
        @endforelse
        <a class="btn btn-primary btn-block" href="/admin/kyc" style="background:var(--admin-purple);">Open queue</a>
      </div>

      <div class="card">
        <div class="card-head"><h3>Open disputes</h3><a class="link" href="/admin/disputes">{{ $stats['pending_disputes'] ?? 0 }} open →</a></div>
        @forelse ($openDisputesList as $d)
          <div class="activity-item"><div class="activity-icon" style="background:var(--danger-light);color:var(--danger);">!</div><div class="activity-body"><div class="activity-title">#{{ $d->order->reference ?? '—' }} <time>{{ $d->created_at->diffForHumans() }}</time></div><div class="activity-sub">{{ $d->raiser->name ?? '—' }} · {{ Str::limit($d->subject, 50) }}</div></div></div>
        @empty
          <div class="muted" style="padding:14px 0;">No open disputes.</div>
        @endforelse
      </div>

      <div class="card">
        <div class="card-head"><h3>Top vendors</h3><a class="link" href="/admin/vendors">All vendors →</a></div>
        @forelse ($topVendors as $vp)
          <div class="activity-item">
            <div class="avatar" style="width:36px;height:36px;border-radius:9px;background:var(--primary-light);color:var(--primary);font-weight:800;font-size:11px;display:flex;align-items:center;justify-content:center;">{{ strtoupper(substr($vp->company_name,0,2)) }}</div>
            <div class="activity-body"><div class="activity-title">{{ $vp->company_name }} <time>★ {{ number_format($vp->rating, 1) }}</time></div><div class="activity-sub">{{ $vp->jobs_completed }} jobs · {{ $vp->rating_count }} reviews</div></div>
          </div>
        @empty
          <div class="muted" style="padding:14px 0;">No vendors yet.</div>
        @endforelse
      </div>
    </div>

    <div class="table-wrap mb-20">
      <div class="table-head"><h3>Recent orders</h3><a class="link" href="/admin/orders">All orders →</a></div>
      <table class="t">
        <thead><tr><th>Time</th><th>Reference</th><th>Buyer · Vendor</th><th>Value</th><th>Status</th></tr></thead>
        <tbody>
          @forelse ($stats['recent_orders'] ?? [] as $o)
            <tr>
              <td>{{ \Illuminate\Support\Carbon::parse($o['created_at'])->format('d M H:i') }}</td>
              <td><a class="link" href="/admin/orders/{{ $o['id'] }}">#{{ $o['reference'] }}</a></td>
              <td>{{ $o['buyer']['name'] ?? '—' }} → {{ $o['vendor']['name'] ?? '—' }}</td>
              <td class="t-amount">₹{{ number_format($o['total']) }}</td>
              <td>
                @php $s = $o['status']; @endphp
                <span class="chip @if($s==='completed') chip-success @elseif($s==='cancelled') chip-gray @elseif($s==='in_progress') chip-warning @else chip-primary @endif">{{ str_replace('_',' ', ucfirst($s)) }}</span>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="muted" style="text-align:center;padding:24px;">No orders yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="grid-3">
      <div class="card"><div class="card-head"><h3>Subscription health</h3></div><div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;text-align:center;"><div><div style="font-size:24px;font-weight:800;color:var(--admin-purple);">312</div><div class="muted" style="font-size:11px;">SUBSCRIBED</div></div><div><div style="font-size:24px;font-weight:800;">94.2%</div><div class="muted" style="font-size:11px;">RETENTION</div></div></div><div class="divider"></div><div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Pro</span><strong>189</strong></div><div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Elite</span><strong>42</strong></div><div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Starter</span><strong>81</strong></div></div>
      <div class="card"><div class="card-head"><h3>Compliance health</h3></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Vendors KYC-current</span><strong style="color:var(--success);">99.2%</strong></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">DGS expiring &lt; 30d</span><strong style="color:var(--warning);">23</strong></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span class="muted">P&amp;I expired</span><strong style="color:var(--danger);">4</strong></div><div class="row-between" style="font-size:13px;padding:6px 0;"><span class="muted">GSTR-2A match rate</span><strong style="color:var(--success);">99.7%</strong></div></div>
      <div class="card"><div class="card-head"><h3>System status</h3><span class="chip chip-success">All systems normal</span></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span><span class="status-dot green"></span>API · core</span><span class="muted">99.99% · 24h</span></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span><span class="status-dot green"></span>Payments (Razorpay)</span><span class="muted">100% · 24h</span></div><div class="row-between" style="font-size:13px;padding:6px 0;border-bottom:1px solid var(--border-2);"><span><span class="status-dot amber"></span>SMS · OTP</span><span class="muted">98.4% · 24h</span></div><div class="row-between" style="font-size:13px;padding:6px 0;"><span><span class="status-dot green"></span>Email · transactional</span><span class="muted">99.9% · 24h</span></div></div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('dashboard');</script>
</body>
</html>
