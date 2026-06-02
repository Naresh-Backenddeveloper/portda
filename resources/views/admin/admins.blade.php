<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Team · PORTDA Admin</title>
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
      <div class="page-title"><h1>Admin Team &amp; Roles</h1><p>People with access to the admin console · scoped by role.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Activity log</button><button class="btn btn-primary">+ Invite admin</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Admin Users</div><div class="kpi-value">14</div></div>
      <div class="kpi"><div class="kpi-label">Active (24h)</div><div class="kpi-value">9</div><div class="kpi-delta up">avg 4 sessions</div></div>
      <div class="kpi"><div class="kpi-label">Super Admins</div><div class="kpi-value">3</div></div>
      <div class="kpi"><div class="kpi-label">Pending invites</div><div class="kpi-value">2</div></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>Roles</h3><button class="btn btn-sm btn-outline">+ Custom role</button></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>Super Admin</strong><div class="muted" style="font-size:12px;">Full access · all modules · billing · destructive ops</div></div><span class="chip chip-purple">3 users</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>KYC Reviewer</strong><div class="muted" style="font-size:12px;">Approve / reject KYC, view vendor + buyer profiles</div></div><span class="chip chip-purple">4 users</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>Support</strong><div class="muted" style="font-size:12px;">Manage disputes, refunds (≤ ₹1L), chat with users</div></div><span class="chip chip-purple">5 users</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>Finance</strong><div class="muted" style="font-size:12px;">Transactions, commission, subscription billing, refunds</div></div><span class="chip chip-purple">2 users</span></div>
        <div class="row-between" style="padding:10px 0;"><div><strong>Read-only Analyst</strong><div class="muted" style="font-size:12px;">View-only across all modules · reports + audit</div></div><span class="chip chip-purple">0 users</span></div>
      </div>

      <div class="card">
        <div class="card-head"><h3>Security</h3><span class="chip chip-success">Hardened</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>2FA required</strong><div class="muted" style="font-size:12px;">All admin sign-ins</div></div><span class="chip chip-success">Enforced</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>Session timeout</strong><div class="muted" style="font-size:12px;">After 4 hrs idle</div></div><span>4h</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>IP allowlist</strong><div class="muted" style="font-size:12px;">3 office IPs + VPN</div></div><span class="chip chip-success">On</span></div>
        <div class="row-between" style="padding:10px 0;border-bottom:1px solid var(--border-2);"><div><strong>SSO (Okta)</strong><div class="muted" style="font-size:12px;">Primary auth provider</div></div><span class="chip chip-success">On</span></div>
        <div class="row-between" style="padding:10px 0;"><div><strong>Audit log retention</strong><div class="muted" style="font-size:12px;">SOC 2 / 7 years</div></div><span>7y</span></div>
      </div>
    </div>

    <div class="table-wrap">
      <div class="table-head"><h3>Admin users</h3><div class="table-filters"><span class="tab active">All (14)</span><span class="tab">Active</span><span class="tab">Suspended</span><span class="tab">Invited (2)</span></div></div>
      <table class="t t-compact">
        <thead><tr><th>Admin</th><th>Email</th><th>Role</th><th>Last active</th><th>Sessions (30d)</th><th>2FA</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $a)
            <tr>
              <td><strong>{{ $a->name }}</strong></td>
              <td>{{ $a->email }}</td>
              <td>{{ $a->phone ?: '—' }}</td>
              <td><span class="chip @if($a->status==='active') chip-success @else chip-warning @endif">{{ ucfirst($a->status) }}</span></td>
              <td>{{ $a->last_login_at ? $a->last_login_at->diffForHumans() : '—' }}</td>
              <td>{{ $a->created_at->format('d M Y') }}</td>
            </tr>
          @empty
            <tr><td colspan="6" class="muted" style="text-align:center;padding:24px;">No admins found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('admins');</script>
</body>
</html>
