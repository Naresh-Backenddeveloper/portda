// Admin shell — injects sidebar + topbar so each page stays compact
(function () {
  function sidebarHTML(active) {
    var items = [
      { sec: 'Overview' },
      { id: 'dashboard', label: 'Dashboard', href: 'dashboard.html', icon: '<rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/>' },
      { id: 'analytics', label: 'Analytics', href: 'analytics.html', icon: '<line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/>' },
      { sec: 'Users' },
      { id: 'vendors', label: 'Vendors', href: 'vendors.html', icon: '<path d="M3 21h18"/><path d="M5 21V10l7-4 7 4v11"/>', badge: '1,247' },
      { id: 'users', label: 'Buyers', href: 'users.html', icon: '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>', badge: '428', badgeGray: true },
      { id: 'kyc', label: 'KYC Queue', href: 'kyc.html', icon: '<path d="M9 12l2 2 4-4"/><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/>', badge: '14' },
      { id: 'admins', label: 'Admin Team', href: 'admins.html', icon: '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>' },
      { sec: 'Operations' },
      { id: 'requests', label: 'Requests', href: 'requests.html', icon: '<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>' },
      { id: 'quotes', label: 'Quote Moderation', href: 'quote-moderation.html', icon: '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><path d="M9 14l2 2 4-4"/>', badge: '12' },
      { id: 'orders', label: 'Orders', href: 'orders.html', icon: '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>' },
      { id: 'reviews', label: 'Reviews', href: 'reviews.html', icon: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>' },
      { id: 'disputes', label: 'Disputes', href: 'disputes.html', icon: '<path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>', badge: '6' },
      { sec: 'Finance' },
      { id: 'payments', label: 'Transactions', href: 'payments.html', icon: '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>' },
      { id: 'commission', label: 'Commission', href: 'commission.html', icon: '<circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94"/><path d="M9.69 8h11.48"/><path d="M7.38 12l5.74-9.94"/><path d="M9.69 16L3.95 6.06"/><path d="M14.31 16H2.83"/><path d="M16.62 12l-5.74 9.94"/>' },
      { id: 'subscriptions', label: 'Subscriptions', href: 'subscriptions.html', icon: '<path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>' },
      { id: 'plans', label: 'Pricing Plans', href: 'plans.html', icon: '<rect x="3" y="4" width="18" height="16" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/>' },
      { sec: 'Catalog' },
      { id: 'categories', label: 'Categories', href: 'categories.html', icon: '<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>' },
      { id: 'ports', label: 'Ports', href: 'ports.html', icon: '<path d="M12 2a8 8 0 0 0-8 8c0 5.5 8 12 8 12s8-6.5 8-12a8 8 0 0 0-8-8z"/><circle cx="12" cy="10" r="3"/>' },
      { sec: 'System' },
      { id: 'broadcast', label: 'Broadcast', href: 'broadcast.html', icon: '<polygon points="3 11 22 2 13 21 11 13 3 11"/>' },
      { id: 'audit', label: 'Audit Log', href: 'audit.html', icon: '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>' }
    ];

    var html = '<aside class="sidebar admin">';
    html += '<div class="sidebar-head"><div class="sidebar-logo">⚓</div><div><div class="sidebar-name">PORTDA</div><div class="sidebar-role">Admin Console</div></div></div>';
    html += '<nav class="sidebar-nav">';
    items.forEach(function (it) {
      if (it.sec) {
        html += '<div class="sidebar-section">' + it.sec + '</div>';
      } else {
        var activeCls = it.id === active ? ' active' : '';
        var badge = it.badge ? '<span class="nav-badge' + (it.badgeGray ? ' gray' : '') + '">' + it.badge + '</span>' : '';
        html += '<a class="nav-item' + activeCls + '" href="' + it.href + '">';
        html += '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' + it.icon + '</svg>';
        html += '<span>' + it.label + '</span>' + badge + '</a>';
      }
    });
    html += '</nav>';
    html += '<div class="sidebar-foot">';
    html += '<a class="user-chip" href="admins.html"><div class="avatar" style="background:linear-gradient(135deg,#7C3AED,#F97316);">AS</div><div style="min-width:0;"><div class="name">Aanya Sharma</div><div class="role">Super Admin</div></div></a>';
    html += '<a class="logout-btn" href="login.html" title="Sign out"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></a>';
    html += '</div></aside>';
    return html;
  }

  function topbarHTML(search) {
    return '<header class="topbar admin">' +
      '<div class="search">' +
      '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>' +
      '<input type="search" placeholder="' + (search || 'Search across the platform…') + '" />' +
      '</div>' +
      '<div class="topbar-actions">' +
      '<a class="icon-btn" href="broadcast.html" title="Broadcast"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg></a>' +
      '<a class="icon-btn" href="audit.html" title="Recent activity"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg><span class="dot"></span></a>' +
      '<a class="topbar-avatar" href="admins.html" title="Aanya Sharma · Super Admin">AS</a>' +
      '</div>' +
      '</header>';
  }

  function toast(msg) {
    var t = document.getElementById('admin-toast');
    if (!t) {
      t = document.createElement('div');
      t.id = 'admin-toast';
      t.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#0F172A;color:#fff;padding:12px 20px;border-radius:12px;font-size:13px;font-weight:600;z-index:9999;box-shadow:0 10px 30px rgba(0,0,0,.25);opacity:0;transition:opacity .2s ease, transform .2s ease;pointer-events:none;display:flex;align-items:center;gap:10px;';
      document.body.appendChild(t);
    }
    t.innerHTML = '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#10B981" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>' + msg;
    t.style.opacity = '1';
    t.style.transform = 'translateX(-50%) translateY(0)';
    clearTimeout(t._h);
    t._h = setTimeout(function () { t.style.opacity = '0'; }, 2200);
  }

  function autoWire() {
    // Tab strips & .table-filters .tab — toggle active on click
    document.querySelectorAll('.tab-strip').forEach(function (strip) {
      strip.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function (e) {
          if (a.getAttribute('href') === '#') e.preventDefault();
          strip.querySelectorAll('a').forEach(function (x) { x.classList.remove('active'); });
          a.classList.add('active');
        });
      });
    });
    document.querySelectorAll('.table-filters').forEach(function (group) {
      group.querySelectorAll('.tab').forEach(function (t) {
        t.addEventListener('click', function () {
          group.querySelectorAll('.tab').forEach(function (x) { x.classList.remove('active'); });
          t.classList.add('active');
        });
      });
    });

    // .toggle clicks — flip on/off
    document.querySelectorAll('.toggle').forEach(function (tg) {
      if (tg.dataset.bound) return; tg.dataset.bound = '1';
      tg.addEventListener('click', function () { tg.classList.toggle('on'); });
    });

    // Make table rows hover/click-friendly: clicking the row triggers the row's first .btn-outline / Open link
    document.querySelectorAll('table.t tbody tr').forEach(function (row) {
      var link = row.querySelector('a[href]');
      if (!link) return;
      row.style.cursor = 'pointer';
      row.addEventListener('click', function (e) {
        if (e.target.closest('a, button, input, select, label')) return;
        window.location = link.href;
      });
    });

    // Catch every <button> that has no onclick/no form-submit/no link — show toast
    document.querySelectorAll('button').forEach(function (b) {
      if (b.dataset.bound) return; b.dataset.bound = '1';
      if (b.onclick) return;
      if (b.type === 'submit') return;
      if (b.closest('a')) return;
      b.addEventListener('click', function (e) {
        // Skip if it has its own handler attached via addEventListener elsewhere
        if (b.classList.contains('icon-btn')) return;
        var label = (b.textContent || '').trim() || 'Action';
        toast(label + ' · queued');
      });
    });

    // Search inputs — Enter shows a toast
    document.querySelectorAll('input[type=search]').forEach(function (i) {
      if (i.dataset.bound) return; i.dataset.bound = '1';
      i.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && i.value.trim()) {
          toast('Searching · "' + i.value + '"');
        }
      });
    });

    // Filter selects — show a toast on change
    document.querySelectorAll('.filter-strip select').forEach(function (s) {
      if (s.dataset.bound) return; s.dataset.bound = '1';
      s.addEventListener('change', function () { toast('Filter applied · ' + s.value); });
    });

    // Pagination buttons
    document.querySelectorAll('.btn-sm.btn-outline, .btn-sm.btn-primary').forEach(function (b) {
      if (b.dataset.pbound) return;
      var txt = (b.textContent || '').trim();
      if (txt === '‹' || txt === '›' || /^\d+$/.test(txt) || txt === '…') {
        b.dataset.pbound = '1';
        b.addEventListener('click', function () {
          var siblings = b.parentNode.querySelectorAll('.btn-sm');
          siblings.forEach(function (s) { if (/^\d+$/.test((s.textContent||'').trim())) { s.classList.remove('btn-primary'); s.classList.add('btn-outline'); } });
          if (/^\d+$/.test(txt)) { b.classList.remove('btn-outline'); b.classList.add('btn-primary'); }
        });
      }
    });

    // Forms — block submit, show toast then route to next-step if data-next is on the form
    document.querySelectorAll('form').forEach(function (f) {
      if (f.dataset.bound) return; f.dataset.bound = '1';
      var existingHandler = f.getAttribute('onsubmit');
      if (existingHandler) return; // page has its own redirect
      f.addEventListener('submit', function (e) {
        e.preventDefault();
        toast((f.dataset.toast || 'Saved') + ' ✓');
      });
    });
  }

  window.AdminShell = {
    mount: function (activeNav, searchPlaceholder) {
      var slot = document.getElementById('admin-shell');
      if (slot) slot.outerHTML = sidebarHTML(activeNav) + topbarHTML(searchPlaceholder);
      // Run after DOM ready so injected sidebar + page content are both present
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', autoWire);
      } else {
        autoWire();
      }
    },
    toast: toast
  };
})();
