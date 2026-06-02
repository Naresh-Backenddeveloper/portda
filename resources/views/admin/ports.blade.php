<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ports · PORTDA Admin</title>
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
      <div class="page-title"><h1>Port Directory</h1><p>Global ports + berths/anchorages where PORTDA operates.</p></div>
    </div>

    @if (session('flash'))<div class="card" style="background:#D1FAE5;color:#065F46;margin-bottom:16px;">{{ session('flash') }}</div>@endif

    <div class="card mb-20">
      <div class="card-head"><h3>Add port</h3></div>
      <form method="POST" action="/admin/ports">
        @csrf
        <div class="grid-2" style="gap:12px;">
          <div class="form-group"><label class="form-label">Name</label><input class="form-input" name="name" required /></div>
          <div class="form-group"><label class="form-label">Code (unique, 3-16 chars)</label><input class="form-input" name="code" required /></div>
          <div class="form-group"><label class="form-label">Country</label><input class="form-input" name="country" value="India" /></div>
          <div class="form-group"><label class="form-label">Region</label><input class="form-input" name="region" /></div>
        </div>
        <button class="btn btn-primary mt-12" type="submit">Add port</button>
      </form>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Active ports</div><div class="kpi-value">14</div></div>
      <div class="kpi"><div class="kpi-label">Total berths</div><div class="kpi-value">218</div></div>
      <div class="kpi"><div class="kpi-label">Pipeline (next 90d)</div><div class="kpi-value">4</div><div class="kpi-delta">Tuticorin · Krishnapatnam · Pipavav · Dahej</div></div>
      <div class="kpi"><div class="kpi-label">Most active</div><div class="kpi-value">JNPT</div><div class="kpi-delta">412 orders MTD</div></div>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Port</th><th>State</th><th>Berths · Anchorage</th><th>Vendors</th><th>Buyers</th><th>Orders MTD</th><th>GMV MTD</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $p)
            <tr>
              <td><strong>{{ $p->name }}</strong></td>
              <td>{{ $p->code }}</td>
              <td>{{ $p->country }}</td>
              <td>{{ $p->region ?: '—' }}</td>
              <td><span class="chip @if($p->is_active) chip-success @else chip-gray @endif">{{ $p->is_active ? 'Active' : 'Disabled' }}</span></td>
              <td class="t-actions">
                <form method="POST" action="/admin/ports/{{ $p->id }}" style="display:inline;" onsubmit="return confirm('Delete this port?');">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="muted" style="text-align:center;padding:24px;">No ports yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('ports');</script>
</body>
</html>
