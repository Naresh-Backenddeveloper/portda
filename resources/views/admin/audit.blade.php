<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Audit Log · PORTDA Admin</title>
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
      <div class="page-title"><h1>Audit Log</h1><p>Every admin action · immutable · 7-year retention · SOC 2 compliant.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export (signed JSON)</button></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All admins</option><option>Aanya Sharma</option><option>Vikram Kapoor</option><option>Priya Goenka</option><option>Rohit Mehta</option><option>Neha Singh</option></select>
      <select><option>All actions</option><option>Sign-in</option><option>KYC approve/reject</option><option>Refund issued</option><option>Plan edit</option><option>Vendor suspend</option><option>Broadcast sent</option></select>
      <select><option>All modules</option><option>Vendors</option><option>Buyers</option><option>KYC</option><option>Finance</option><option>Plans</option><option>Broadcast</option></select>
      <select><option>Last 7 days</option><option>Today</option><option>Last 30 days</option><option>Last 90 days</option><option>This FY</option><option>Custom range…</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="Search action/resource…" style="min-width:240px;" />
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Time</th><th>Admin</th><th>Action</th><th>Resource</th><th>Result</th><th>IP</th><th>Hash</th></tr></thead>
        <tbody>
          @forelse ($items as $l)
            <tr>
              <td>{{ $l->created_at->format('d M H:i:s') }}</td>
              <td>{{ $l->user->name ?? 'system' }}</td>
              <td><strong>{{ $l->action }}</strong></td>
              <td>{{ $l->subject_type ? class_basename($l->subject_type).'#'.$l->subject_id : '—' }}</td>
              <td>{{ $l->ip_address ?: '—' }}</td>
            </tr>
          @empty
            <tr><td colspan="5" class="muted" style="text-align:center;padding:24px;">No audit entries yet.</td></tr>
          @endforelse
        </tbody>
      </table>
      <div style="padding:14px 18px;border-top:1px solid var(--border-2);font-size:12px;color:var(--text-3);text-align:center;">Each row is hash-chained to the previous — tampering is detectable. Export includes Merkle root + admin signatures.</div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('audit');</script>
</body>
</html>
