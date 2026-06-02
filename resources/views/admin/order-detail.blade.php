<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Order #PORT-48217 · PORTDA Admin</title>
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
      <div class="page-title">
        <div class="muted" style="font-size:12px;letter-spacing:.5px;margin-bottom:4px;"><a href="/admin/orders" style="color:var(--text-2);">Orders</a> / <strong style="color:var(--text);">{{ $order->reference }}</strong></div>
        <h1>Order #{{ $order->reference }}</h1>
        <p>{{ $order->serviceRequest->title ?? '' }} · created {{ $order->created_at->format('d M Y H:i') }}</p>
      </div>
      <div class="page-actions">
        @if (! in_array($order->status, ['completed','cancelled']))
          <form method="POST" action="/admin/orders/{{ $order->id }}/complete" style="display:inline;">@csrf<button class="btn btn-primary">Force complete</button></form>
          <form method="POST" action="/admin/orders/{{ $order->id }}/cancel" style="display:inline;" onsubmit="return confirm('Force-cancel this order?');">
            @csrf<input type="hidden" name="reason" value="Admin force cancel." />
            <button class="btn btn-danger">Force cancel</button>
          </form>
        @endif
      </div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">Status</div><div class="kpi-value">{{ str_replace('_',' ', ucfirst($order->status)) }}</div></div>
      <div class="kpi"><div class="kpi-label">Payment</div><div class="kpi-value">{{ ucfirst($order->payment_status) }}</div></div>
      <div class="kpi"><div class="kpi-label">Total</div><div class="kpi-value">₹{{ number_format($order->total) }}</div></div>
      <div class="kpi"><div class="kpi-label">Commission</div><div class="kpi-value">₹{{ number_format($order->commission) }}</div></div>
    </div>

    <div class="grid-2 mb-20">
      <div class="card">
        <div class="card-head"><h3>Parties &amp; service</h3></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Buyer</span><a class="link" href="/admin/users/{{ $order->buyer_id }}">{{ $order->buyer->name ?? '—' }}</a></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Vendor</span><a class="link" href="/admin/vendors/{{ $order->vendor_id }}">{{ $order->vendor->name ?? '—' }}</a></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Request</span><span>#{{ $order->serviceRequest->reference ?? '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Vessel</span><span>{{ $order->serviceRequest->vessel_name ?? '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Port</span><span>{{ optional($order->serviceRequest?->port)->name ?? '—' }}</span></div>
        <div class="row-between" style="padding:8px 0;"><span class="muted">Scheduled</span><span>{{ $order->scheduled_at ? $order->scheduled_at->format('d M Y H:i') : '—' }}</span></div>
      </div>
      <div class="card">
        <div class="card-head"><h3>Financials</h3></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Subtotal</span><strong>₹{{ number_format($order->subtotal) }}</strong></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Tax</span><span>₹{{ number_format($order->tax) }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Commission</span><span>₹{{ number_format($order->commission) }}</span></div>
        <div class="row-between" style="padding:8px 0;border-bottom:1px solid var(--border-2);"><span class="muted">Total</span><strong style="font-size:18px;color:var(--accent);">₹{{ number_format($order->total) }}</strong></div>
        <div class="row-between" style="padding:8px 0;"><span class="muted">Invoice</span><span>{{ optional($order->invoice)->number ?? 'not issued' }}</span></div>
      </div>
    </div>

    <div class="grid-2">
      <div class="card">
        <div class="card-head"><h3>Payments ({{ $order->payments->count() }})</h3></div>
        @forelse ($order->payments as $p)
          <div style="padding:10px 0;border-bottom:1px solid var(--border-2);">
            <div class="row-between"><strong>{{ $p->reference }}</strong><span class="chip @if($p->status==='success') chip-success @elseif($p->status==='failed') chip-danger @else chip-warning @endif">{{ ucfirst($p->status) }}</span></div>
            <div class="muted" style="font-size:12px;">{{ strtoupper($p->method) }} · ₹{{ number_format($p->amount) }} · {{ $p->created_at->format('d M H:i') }}</div>
            @if ($p->utr_number)<div class="muted" style="font-size:12px;">UTR: {{ $p->utr_number }}</div>@endif
          </div>
        @empty
          <div class="muted" style="padding:8px 0;">No payments recorded.</div>
        @endforelse
      </div>
      <div class="card">
        <div class="card-head"><h3>Timeline</h3></div>
        @forelse ($order->events as $e)
          <div class="row" style="gap:10px;padding:8px 0;border-bottom:1px solid var(--border-2);align-items:flex-start;">
            <div style="min-width:60px;font-size:11px;color:var(--text-3);">{{ $e->created_at->format('d M H:i') }}</div>
            <div class="flex-1">
              <strong style="font-size:13px;">{{ str_replace('_',' ', ucfirst($e->event)) }}</strong>
              @if ($e->message)<div class="muted" style="font-size:12px;">{{ $e->message }}</div>@endif
            </div>
          </div>
        @empty
          <div class="muted" style="padding:8px 0;">No events.</div>
        @endforelse
      </div>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('orders');</script>
</body>
</html>
