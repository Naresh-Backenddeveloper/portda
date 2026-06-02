<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Pricing Plans · PORTDA Admin</title>
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
      <div class="page-title"><h1>Pricing Plans</h1><p>Configure plan tiers, lead limits, billing cycles, commission rate &amp; pricing.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Pricing history</button><button class="btn btn-primary">+ New plan</button></div>
    </div>

    <div class="grid-3 mb-20">
      @forelse ($items as $p)
        <div class="card">
          <div class="row-between mb-12"><h3 style="font-size:16px;margin:0;">{{ $p->name }}</h3><span class="chip @if($p->is_active) chip-success @else chip-gray @endif">{{ $p->is_active ? 'Live' : 'Inactive' }}</span></div>
          <div style="font-size:32px;font-weight:900;">₹{{ number_format($p->price_monthly) }}<span style="font-size:13px;font-weight:500;color:var(--text-3);">/ month</span></div>
          <div class="muted" style="font-size:12px;">or ₹{{ number_format($p->price_yearly) }}/yr</div>
          <div class="divider"></div>
          <div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Audience</span><strong>{{ ucfirst($p->audience) }}</strong></div>
          <div class="row-between" style="font-size:13px;padding:4px 0;"><span class="muted">Lead credits / mo</span><strong>{{ $p->lead_credits }}</strong></div>
          @if ($p->features)
            <div style="margin-top:8px;font-size:12px;color:var(--text-2);">
              @foreach ((array) $p->features as $f)<div>✓ {{ $f }}</div>@endforeach
            </div>
          @endif
          <form method="POST" action="/admin/plans/{{ $p->id }}" class="mt-12" onsubmit="return confirm('Delete this plan?');">@csrf @method('DELETE')<button class="btn btn-outline btn-block">Delete plan</button></form>
        </div>
      @empty
        <div class="card muted" style="text-align:center;padding:32px;">No plans yet — add one below.</div>
      @endforelse
    </div>

    <div class="card">
      <div class="card-head"><h3>Create plan</h3></div>
      @if ($errors->any())<div style="background:#FEE2E2;color:#991B1B;padding:10px 14px;border-radius:8px;margin-bottom:14px;">{{ $errors->first() }}</div>@endif
      <form method="POST" action="/admin/plans">
        @csrf
        <div class="grid-2" style="gap:14px;">
          <div class="form-group"><label class="form-label">Name</label><input class="form-input" name="name" required /></div>
          <div class="form-group"><label class="form-label">Slug</label><input class="form-input" name="slug" required /></div>
          <div class="form-group">
            <label class="form-label">Audience</label>
            <select class="form-select" name="audience"><option value="vendor">Vendor</option><option value="buyer">Buyer</option></select>
          </div>
          <div class="form-group"><label class="form-label">Lead credits</label><input class="form-input" type="number" name="lead_credits" value="0" /></div>
          <div class="form-group"><label class="form-label">Price (monthly ₹)</label><input class="form-input" type="number" step="0.01" name="price_monthly" required /></div>
          <div class="form-group"><label class="form-label">Price (yearly ₹)</label><input class="form-input" type="number" step="0.01" name="price_yearly" required /></div>
          <div class="form-group" style="grid-column:1/-1;"><label class="form-label">Features (one per line)</label><textarea class="form-input" name="features" rows="4"></textarea></div>
          <div class="form-group"><label><input type="checkbox" name="is_active" value="1" checked /> Active</label></div>
        </div>
        <button class="btn btn-primary mt-12" type="submit">Create plan</button>
      </form>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('plans');</script>
</body>
</html>
