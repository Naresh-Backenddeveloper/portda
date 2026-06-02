<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Categories · PORTDA Admin</title>
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
      <div class="page-title"><h1>Service Catalog</h1><p>Manage service categories &amp; sub-services that vendors offer and buyers post for.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Reorder</button><a class="btn btn-primary" href="/admin/categories/new">+ Add category</a></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Categories</div><div class="kpi-value">10</div></div>
      <div class="kpi"><div class="kpi-label">Sub-services</div><div class="kpi-value">54</div></div>
      <div class="kpi"><div class="kpi-label">Most quoted</div><div class="kpi-value">Ship Agents</div><div class="kpi-delta">28% of requests</div></div>
      <div class="kpi"><div class="kpi-label">Coverage gap</div><div class="kpi-value">Legal / Lawyers</div><div class="kpi-delta down">only 6 vendors</div></div>
    </div>

    @if (session('flash'))<div class="card" style="background:#D1FAE5;color:#065F46;margin-bottom:16px;">{{ session('flash') }}</div>@endif

    @forelse ($items as $cat)
      <div class="card mb-12">
        <div class="row" style="gap:14px;align-items:center;">
          <div style="width:48px;height:48px;background:var(--primary-light);color:var(--primary);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">{{ $cat->icon ?? '⚓' }}</div>
          <div class="flex-1">
            <div class="row-between">
              <strong style="font-size:16px;">{{ $cat->name }}</strong>
              <span class="chip @if($cat->is_active) chip-success @else chip-gray @endif">{{ $cat->is_active ? 'Live' : 'Inactive' }}</span>
            </div>
            <div class="muted" style="font-size:13px;">{{ $cat->subcategories->count() }} sub-services · slug {{ $cat->slug }}</div>
            @if ($cat->subcategories->count())
              <div class="row" style="gap:6px;flex-wrap:wrap;margin-top:8px;">
                @foreach ($cat->subcategories as $sub)<span class="chip chip-gray">{{ $sub->name }}</span>@endforeach
              </div>
            @endif
          </div>
          <div class="row" style="gap:6px;">
            <a class="btn btn-sm btn-outline" href="/admin/subservices/new">+ Sub-service</a>
            <a class="btn btn-sm btn-ghost" href="/admin/categories/{{ $cat->id }}">Open</a>
            <form method="POST" action="/admin/categories/{{ $cat->id }}" style="display:inline;" onsubmit="return confirm('Delete category?');">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
          </div>
        </div>
      </div>
    @empty
      <div class="card muted" style="text-align:center;padding:32px;">No categories yet. <a class="link" href="/admin/categories-new">Add one →</a></div>
    @endforelse
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('categories');</script>
</body>
</html>
