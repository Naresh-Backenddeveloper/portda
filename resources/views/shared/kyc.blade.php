<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>KYC Documents · PORTDA</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/app/app.css" />
</head>
<body>

@php $role = auth()->user()->role; $base = $role === 'vendor' ? '/vendor' : '/buyer'; @endphp

<div class="app-shell">
  <aside class="sidebar">
    <div class="sidebar-head">
      <div class="sidebar-logo">⚓</div>
      <div><div class="sidebar-name">PORTDA</div><div class="sidebar-role {{ $role }}">{{ ucfirst($role) }}</div></div>
    </div>
    <nav class="sidebar-nav">
      <a class="nav-item" href="{{ $base }}/dashboard"><span>Dashboard</span></a>
      <a class="nav-item" href="{{ $base }}/profile"><span>Profile</span></a>
      <a class="nav-item active" href="{{ $base }}/kyc"><span>KYC Documents</span></a>
      <a class="nav-item" href="{{ $base }}/notifications"><span>Notifications</span></a>
    </nav>
    <div class="sidebar-foot">
      <a class="user-chip" href="{{ $base }}/profile"><div class="avatar" style="background:linear-gradient(135deg,#8B5CF6,#F59E0B);">{{ strtoupper(substr(auth()->user()->name,0,2)) }}</div><div style="min-width:0;"><div class="name">{{ auth()->user()->name }}</div><div class="role">{{ ucfirst($role) }}</div></div></a>
      <form method="POST" action="/logout" style="display:inline;">@csrf<button class="logout-btn" type="submit" title="Sign out">⏻</button></form>
    </div>
  </aside>

  <header class="topbar"><div class="search"></div></header>

  <main class="main">
    <div class="page-header">
      <div class="page-title">
        <h1>KYC &amp; Compliance Documents</h1>
        <p>Upload the documents below. Approval is typically within 24 hours.</p>
      </div>
    </div>

    @if (session('flash')) <div class="card" style="background:#D1FAE5;color:#065F46;margin-bottom:16px;">{{ session('flash') }}</div> @endif
    @if ($errors->any())
      <div class="card" style="background:#FEE2E2;color:#991B1B;margin-bottom:16px;">
        <ul style="margin:0;padding-left:18px;">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Total</div><div class="kpi-value">{{ $items->count() }}</div></div>
      <div class="kpi"><div class="kpi-label">Pending</div><div class="kpi-value">{{ $items->where('status','pending')->count() }}</div></div>
      <div class="kpi"><div class="kpi-label">Approved</div><div class="kpi-value">{{ $items->where('status','approved')->count() }}</div></div>
      <div class="kpi"><div class="kpi-label">Rejected</div><div class="kpi-value">{{ $items->where('status','rejected')->count() }}</div></div>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-head"><h3>Upload new document</h3></div>
        <form method="POST" action="{{ $base }}/kyc" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label">Document type</label>
            <select class="form-select" name="doc_type" required>
              <option value="gst">GST Certificate</option>
              <option value="pan">PAN Card</option>
              <option value="cin">CIN (Company Incorporation)</option>
              <option value="iec">IEC (Import-Export Code)</option>
              <option value="dgs_license">DGS Licence</option>
              <option value="pi_insurance">P&amp;I Insurance</option>
              <option value="address_proof">Address Proof</option>
              <option value="bank_proof">Bank Account Proof</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Document number (optional)</label>
            <input class="form-input" name="doc_number" placeholder="e.g. 27ABCDE1234F1Z2" />
          </div>
          <div class="form-group">
            <label class="form-label">File (PDF / JPG / PNG, max 5 MB)</label>
            <input class="form-input" type="file" name="file" accept=".pdf,image/*" required />
          </div>
          <button class="btn btn-primary" type="submit">Upload</button>
        </form>
      </div>

      <div class="card">
        <div class="card-head"><h3>Your documents</h3></div>
        @forelse ($items as $k)
          <div style="padding:10px 0;border-bottom:1px solid var(--border-2);">
            <div class="row-between">
              <strong>{{ strtoupper($k->doc_type) }}</strong>
              <span class="chip @if($k->status==='approved') chip-success @elseif($k->status==='rejected') chip-danger @else chip-warning @endif">{{ ucfirst($k->status) }}</span>
            </div>
            <div class="muted" style="font-size:12px;margin-top:4px;">
              {{ $k->doc_number ?: '—' }} ·
              @if ($k->file_path)<a href="{{ Storage::disk('public')->url($k->file_path) }}" target="_blank">{{ $k->original_name }} ↗</a>@endif
              · uploaded {{ $k->created_at->diffForHumans() }}
            </div>
            @if ($k->reject_reason)<div style="font-size:12px;color:var(--danger);margin-top:4px;">Reason: {{ $k->reject_reason }}</div>@endif
            @if ($k->status === 'pending')
              <form method="POST" action="{{ $base }}/kyc/{{ $k->id }}" style="display:inline;margin-top:6px;" onsubmit="return confirm('Remove this pending document?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline">Remove</button></form>
            @endif
          </div>
        @empty
          <div class="muted" style="padding:12px 0;">No documents uploaded yet. Use the form on the left.</div>
        @endforelse
      </div>
    </div>
  </main>
</div>
</body>
</html>
