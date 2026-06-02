<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Commission · PORTDA Admin</title>
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
      <div class="page-title"><h1>Commission Rules</h1><p>Per-category and per-port commission rates applied to confirmed orders.</p></div>
    </div>

    @if (session('flash'))<div class="card" style="background:#D1FAE5;color:#065F46;margin-bottom:16px;">{{ session('flash') }}</div>@endif

    <div class="card mb-20">
      <div class="card-head"><h3>Add rule</h3></div>
      <form method="POST" action="/admin/commission">
        @csrf
        <div class="grid-3" style="gap:12px;">
          <div class="form-group">
            <label class="form-label">Category (optional)</label>
            <select class="form-select" name="category_id"><option value="">— All —</option>@foreach ($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach</select>
          </div>
          <div class="form-group">
            <label class="form-label">Port (optional)</label>
            <select class="form-select" name="port_id"><option value="">— All —</option>@foreach ($ports as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach</select>
          </div>
          <div class="form-group">
            <label class="form-label">Type</label>
            <select class="form-select" name="type"><option value="percentage">Percentage (%)</option><option value="flat">Flat amount (₹)</option></select>
          </div>
          <div class="form-group">
            <label class="form-label">Value</label>
            <input class="form-input" type="number" step="0.0001" min="0" name="value" required />
          </div>
          <div class="form-group"><label><input type="checkbox" name="is_active" value="1" checked /> Active</label></div>
        </div>
        <button class="btn btn-primary mt-12" type="submit">Add rule</button>
      </form>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Category</th><th>Port</th><th>Type</th><th>Value</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $r)
            <tr>
              <td>{{ optional($r->category)->name ?? '— All —' }}</td>
              <td>{{ optional($r->port)->name ?? '— All —' }}</td>
              <td>{{ ucfirst($r->type) }}</td>
              <td><strong>{{ $r->type === 'percentage' ? $r->value.' %' : '₹'.number_format($r->value, 2) }}</strong></td>
              <td><span class="chip @if($r->is_active) chip-success @else chip-gray @endif">{{ $r->is_active ? 'Active' : 'Inactive' }}</span></td>
              <td><form method="POST" action="/admin/commission/{{ $r->id }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form></td>
            </tr>
          @empty
            <tr><td colspan="6" class="muted" style="text-align:center;padding:24px;">No rules yet — default 10% will apply.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('commission');</script>
</body>
</html>
