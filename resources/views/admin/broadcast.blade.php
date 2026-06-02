<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Broadcast · PORTDA Admin</title>
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
      <div class="page-title"><h1>Broadcast &amp; Announcements</h1><p>Send platform-wide notifications, marketing pushes, system alerts.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Templates</button><button class="btn btn-primary">+ New broadcast</button></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>New broadcast</h3></div>
        @if ($errors->any())<div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;">{{ $errors->first() }}</div>@endif
        <form method="POST" action="/admin/broadcast">
          @csrf
          <div class="form-group"><label class="form-label">Title</label><input class="form-input" name="title" required /></div>
          <div class="form-group"><label class="form-label">Body</label><textarea class="form-input" name="body" rows="4" required></textarea></div>
          <div class="form-group">
            <label class="form-label">Audience</label>
            <select class="form-select" name="audience" required>
              <option value="all">All users</option>
              <option value="buyers">Buyers</option>
              <option value="vendors">Vendors</option>
              <option value="admins">Admins</option>
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Save as draft</button>
        </form>
      </div>
      <div class="card">
        <div class="card-head"><h3>How sending works</h3></div>
        <ul style="font-size:13px;line-height:1.6;padding-left:18px;color:var(--text-2);">
          <li>Saving creates a draft broadcast.</li>
          <li>Click <strong>Send now</strong> in the table below to fan out a Notification to every targeted user.</li>
          <li>Recipients see the message in their notifications inbox immediately.</li>
        </ul>
      </div>
    </div>

        <div class="table-wrap">
      <div class="table-head"><h3>Recent broadcasts</h3></div>
      <table class="t t-compact">
        <thead><tr><th>Subject</th><th>Audience</th><th>Channels</th><th>Sent</th><th>Reach</th><th>Open rate</th><th>Sent at</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $b)
            <tr>
              <td><strong>{{ $b->title }}</strong><div class="muted" style="font-size:12px;">{{ Str::limit($b->body, 80) }}</div></td>
              <td><span class="chip chip-primary">{{ ucfirst($b->audience) }}</span></td>
              <td>{{ $b->creator->name ?? '—' }}</td>
              <td><span class="chip @if($b->status==='sent') chip-success @else chip-warning @endif">{{ ucfirst($b->status) }}</span></td>
              <td>{{ $b->sent_at ? $b->sent_at->format('d M H:i') : '—' }}</td>
              <td class="t-actions">
                @if ($b->status === 'draft')
                  <form method="POST" action="/admin/broadcast/{{ $b->id }}/send" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Send now</button></form>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="muted" style="text-align:center;padding:24px;">No broadcasts.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('broadcast');</script>
</body>
</html>
