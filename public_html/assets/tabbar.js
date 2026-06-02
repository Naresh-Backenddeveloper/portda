// PORTDA — shared tab bar injector.
// Reads `data-tab` on each .screen and injects the footer with the
// matching item set active. Skips screens that already have a .tab-bar
// or are explicitly marked with data-tab="none" (modals, onboarding, auth).

(function () {
  var TABS = [
    { key: 'home',     label: 'Home',     svg: '<svg viewBox="0 0 24 24"><path d="M3 10.5L12 3l9 7.5V20a2 2 0 0 1-2 2h-3v-7h-8v7H5a2 2 0 0 1-2-2z"/></svg>' },
    { key: 'requests', label: 'Requests', svg: '<svg viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="17" rx="2"/><path d="M9 3h6a1 1 0 0 1 1 1v2H8V4a1 1 0 0 1 1-1z"/><path d="M8 11h8M8 15h8M8 19h5"/></svg>' },
    { key: 'vendors',  label: 'Vendors',  svg: '<svg viewBox="0 0 24 24"><path d="M3 9l1.5-5h15L21 9"/><path d="M4 9v11a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9"/><path d="M9 21v-6h6v6"/></svg>' },
    { key: 'chat',     label: 'Chat',     svg: '<svg viewBox="0 0 24 24"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 21l1.9-5.4A8 8 0 1 1 21 12z"/></svg>' },
    { key: 'history',  label: 'Orders',   svg: '<svg viewBox="0 0 24 24"><path d="M3 3v5h5"/><path d="M3.05 13A9 9 0 1 0 6 5.3L3 8"/><path d="M12 7v5l3 2"/></svg>' }
  ];

  function buildTabBar(activeKey) {
    // 'me' is no longer a tab; profile screens that were data-tab="me" render the
    // footer with no active item (still a valid value, just no longer highlighted).
    var html = '<div class="tab-bar">';
    TABS.forEach(function (t) {
      var isActive = t.key === activeKey ? ' active' : '';
      html += '<div class="tab-item' + isActive + '">'
        + '<div class="ti">' + t.svg + '</div>'
        + '<div>' + t.label + '</div>'
        + '</div>';
    });
    html += '</div>';
    return html;
  }

  document.querySelectorAll('.screen').forEach(function (screen) {
    var tab = screen.getAttribute('data-tab');
    if (!tab || tab === 'none') return;
    if (screen.querySelector(':scope > .tab-bar')) return; // already injected manually
    screen.insertAdjacentHTML('beforeend', buildTabBar(tab));
  });
})();
