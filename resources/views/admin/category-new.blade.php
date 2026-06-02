<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Add Category · PORTDA Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<link rel="stylesheet" href="/app/admin/admin.css" />
<style>
  .icon-picker { display:grid; grid-template-columns:repeat(8,1fr); gap:8px; }
  .icon-picker label { aspect-ratio:1; background:#fff; border:1.5px solid var(--border); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:22px; cursor:pointer; transition:border-color .15s ease, transform .12s ease; }
  .icon-picker label:hover { transform:translateY(-1px); }
  .icon-picker input[type=radio]:checked + label, .icon-picker label.active { border-color:var(--admin-purple); background:var(--admin-purple-light); }

  .color-picker { display:flex; gap:8px; flex-wrap:wrap; }
  .color-picker label { width:34px; height:34px; border-radius:10px; cursor:pointer; border:3px solid transparent; transition:transform .12s ease; }
  .color-picker label.active { border-color:#fff; box-shadow:0 0 0 2px var(--admin-purple); transform:scale(1.05); }
</style>
</head>
<body>
<div class="app-shell admin">
  <div id="admin-shell"></div>
  <main class="main">
    <div class="page-header">
      <div class="page-title">
        <div class="muted" style="font-size:12px;letter-spacing:.5px;margin-bottom:4px;"><a href="/admin/categories" style="color:var(--text-2);">Categories</a> / <strong style="color:var(--text);">New category</strong></div>
        <h1>Add Service Category</h1>
        <p>Top-level service group. After creating, you'll be able to add sub-services.</p>
      </div>
      <div class="page-actions"><a class="btn btn-ghost" href="/admin/categories">Cancel</a></div>
    </div>

    @if ($errors->any())<div class="card" style="background:#FEE2E2;color:#991B1B;margin-bottom:16px;"><ul style="margin:0;padding-left:18px;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

    <form method="POST" action="/admin/categories">
      @csrf
      <div class="card mb-16">
        <div class="card-head"><h3>Basics</h3></div>
        <div class="form-group">
          <label class="form-label">Category name</label>
          <input class="form-input" name="name" value="{{ old('name') }}" placeholder="e.g. Waste Reception" required />
        </div>
        <div class="form-group">
          <label class="form-label">Slug</label>
          <input class="form-input" name="slug" value="{{ old('slug') }}" placeholder="waste-reception" required />
          <div class="form-help">URL-safe identifier. Lowercase, hyphen-separated.</div>
        </div>
        <div class="form-group">
          <label class="form-label">Icon (emoji, optional)</label>
          <input class="form-input" name="icon" value="{{ old('icon') }}" maxlength="8" placeholder="⚓" />
        </div>
        <div class="form-group">
          <label class="form-label">Description</label>
          <textarea class="form-input" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
          <label><input type="checkbox" name="is_active" value="1" checked /> Active</label>
        </div>
      </div>
      <button class="btn btn-primary btn-lg" type="submit">Create category</button>
    </form>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('categories');
  // Icon picker
  document.querySelectorAll('.icon-picker label').forEach(function (l) {
    l.addEventListener('click', function () {
      document.querySelectorAll('.icon-picker label').forEach(function (x) { x.classList.remove('active'); });
      l.classList.add('active');
    });
  });
  document.querySelectorAll('.color-picker label').forEach(function (l) {
    l.addEventListener('click', function () {
      document.querySelectorAll('.color-picker label').forEach(function (x) { x.classList.remove('active'); });
      l.classList.add('active');
    });
  });
</script>
</body>
</html>
