<div class="table-wrap">
      @forelse ($items as $n)
        <div class="notif-item @if(!$n->read_at) unread @endif">
          <div class="activity-icon indigo">{{ strtoupper(substr($n->type ?? 'N', 0, 1)) }}</div>
          <div class="activity-body">
            <div class="activity-title">{{ $n->title }} <time>{{ $n->created_at->diffForHumans() }}</time></div>
            @if ($n->body) <div class="activity-sub">{{ $n->body }}</div> @endif
          </div>
          @if ($n->action_url)
            <a class="btn btn-sm btn-outline" href="{{ $n->action_url }}">Open</a>
          @endif
        </div>
      @empty
        <div class="notif-item"><div class="activity-body muted" style="text-align:center;padding:24px;">No notifications.</div></div>
      @endforelse
    </div>
  </main>
</div>
</body>
</html>
