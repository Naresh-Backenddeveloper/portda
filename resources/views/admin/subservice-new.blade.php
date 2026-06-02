<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Add Sub-service · Ship Agents · PORTDA Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
<link rel="stylesheet" href="/app/admin/admin.css" />
<style>
  .icon-picker { display:grid; grid-template-columns:repeat(10,1fr); gap:6px; }
  .icon-picker label { aspect-ratio:1; background:#fff; border:1.5px solid var(--border); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px; cursor:pointer; transition:border-color .15s ease, transform .12s ease; }
  .icon-picker label.active { border-color:var(--admin-purple); background:var(--admin-purple-light); }
  .field-row { display:flex; gap:8px; align-items:center; margin-bottom:8px; }
  .field-row input { flex:1; padding:8px 12px; border:1px solid var(--border); border-radius:8px; font-size:13px; outline:none; font-family:inherit; }
  .field-row input:focus { border-color:var(--admin-purple); }
  .field-row .btn-ghost { padding:6px 10px; }
</style>
</head>
<body>
<div class="app-shell admin">
  <div id="admin-shell"></div>
  <main class="main">
    <div class="page-header">
      <div class="page-title">
        <h1>Add Sub-service</h1>
        <p>Specific service within a category that vendors can offer.</p>
      </div>
      <div class="page-actions"><a class="btn btn-ghost" href="/admin/categories">Cancel</a></div>
    </div>

    @if ($errors->any())<div class="card" style="background:#FEE2E2;color:#991B1B;margin-bottom:16px;"><ul style="margin:0;padding-left:18px;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif

    <form method="POST" action="/admin/subservices">
      @csrf
      <div class="card">
        <div class="form-group">
          <label class="form-label">Parent category</label>
          <select class="form-select" name="category_id" required>
            <option value="">— Select —</option>
            @foreach ($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
          </select>
        </div>
        <div class="form-group"><label class="form-label">Name</label><input class="form-input" name="name" required /></div>
        <div class="form-group"><label class="form-label">Slug</label><input class="form-input" name="slug" required /></div>
        <div class="form-group"><label class="form-label">Description</label><textarea class="form-input" name="description" rows="3"></textarea></div>
        <div class="form-group"><label><input type="checkbox" name="is_active" value="1" checked /> Active</label></div>
      </div>
      <button class="btn btn-primary btn-lg mt-12" type="submit">Add sub-service</button>
    </form>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('categories');
  document.querySelectorAll('.icon-picker label').forEach(function (l) {
    l.addEventListener('click', function () {
      document.querySelectorAll('.icon-picker label').forEach(function (x) { x.classList.remove('active'); });
      l.classList.add('active');
    });
  });
</script>
</body>
</html>
