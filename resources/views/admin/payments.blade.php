<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Transactions · PORTDA Admin</title>
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
      <div class="page-title"><h1>Platform Transactions</h1><p>All buyer → vendor + platform → vendor + buyer → platform money flows.</p></div>
      <div class="page-actions"><button class="btn btn-outline">Export GST report</button><button class="btn btn-outline">Reconcile with Razorpay</button></div>
    </div>

    <div class="kpi-grid">
      <div class="kpi"><div class="kpi-label">GMV (MTD)</div><div class="kpi-value">₹6.2 Cr</div><div class="kpi-delta up">▲ 14%</div></div>
      <div class="kpi"><div class="kpi-label">Platform Revenue</div><div class="kpi-value">₹38.4 L</div><div class="kpi-delta up">▲ 18%</div></div>
      <div class="kpi"><div class="kpi-label">Vendor Payouts</div><div class="kpi-value">₹5.82 Cr</div></div>
      <div class="kpi"><div class="kpi-label">UTR Pending</div><div class="kpi-value">23</div><div class="kpi-delta down">₹18.4 L blocked</div></div>
    </div>

    <div class="filter-strip">
      <span class="label">Filter:</span>
      <select><option>All types</option><option>Buyer → Vendor</option><option>Vendor → Bank (payout)</option><option>Subscription billing</option><option>Commission deduction</option><option>Refund</option></select>
      <select><option>All methods</option><option>UPI</option><option>NEFT/RTGS</option><option>Credit Card</option><option>USD Wire</option><option>e-NACH</option></select>
      <select><option>All statuses</option><option>Settled</option><option>Pending</option><option>UTR required</option><option>Failed</option><option>Refunded</option></select>
      <select><option>Currency · all</option><option>INR (₹)</option><option>USD ($)</option></select>
      <div class="spacer"></div>
      <input type="search" placeholder="Search ref/UTR/order…" style="min-width:220px;" />
    </div>

    <div class="tab-strip">
      <a href="#" class="active">All</a><a href="#">UTR Pending (23)</a><a href="#">Failed (4)</a><a href="#">Refunds (12)</a><a href="#">Subscriptions (98)</a><a href="#">Commission (1,706)</a>
    </div>

    <div class="table-wrap">
      <table class="t t-compact">
        <thead><tr><th>Time</th><th>Type</th><th>Counterparty</th><th>Reference</th><th>Method</th><th>Amount</th><th>Status</th><th></th></tr></thead>
        <tbody>
          @forelse ($items as $p)
            <tr>
              <td><strong>{{ $p->reference }}</strong></td>
              <td>#{{ $p->order->reference ?? '—' }}</td>
              <td>{{ strtoupper($p->method) }} · {{ ucfirst($p->type) }}</td>
              <td class="t-amount">₹{{ number_format($p->amount) }}</td>
              <td>{{ $p->utr_number ?? $p->gateway_txn_id ?? '—' }}</td>
              <td><span class="chip @if($p->status==='success') chip-success @elseif($p->status==='failed') chip-danger @else chip-warning @endif">{{ ucfirst($p->status) }}</span></td>
              <td>{{ $p->created_at->format('d M') }}</td>
              <td class="t-actions">
                @if ($p->type==='offline' && $p->status==='pending')
                  <form method="POST" action="/admin/payments/{{ $p->id }}/verify" style="display:inline;">@csrf<button class="btn btn-sm btn-primary">Verify</button></form>
                  <form method="POST" action="/admin/payments/{{ $p->id }}/fail" style="display:inline;">@csrf<button class="btn btn-sm btn-outline">Fail</button></form>
                @else
                  <span class="muted">—</span>
                @endif
              </td>
            </tr>
          @empty
            <tr><td colspan="8" class="muted" style="text-align:center;padding:24px;">No payments.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="/app/admin/admin.js"></script>
<script>AdminShell.mount('payments');</script>
</body>
</html>
