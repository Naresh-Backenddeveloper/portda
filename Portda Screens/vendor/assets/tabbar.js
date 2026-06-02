// PORTDA Vendor — shared tab bar injector for the vendor (seller) app.
// Mirrors the user app pattern. Screens opt in via data-tab="...".

(function () {
  var TABS = [
    { key: 'home',    label: 'Home',    svg: '<svg viewBox="0 0 24 24"><path d="M3 10.5L12 3l9 7.5V20a2 2 0 0 1-2 2h-3v-7h-8v7H5a2 2 0 0 1-2-2z"/></svg>' },
    { key: 'inbox',   label: 'Inbox',   svg: '<svg viewBox="0 0 24 24"><path d="M22 12h-6l-2 3h-4l-2-3H2"/><path d="M5.5 5h13l3.5 7v6a2 2 0 0 1-2 2h-16a2 2 0 0 1-2-2v-6z"/></svg>' },
    { key: 'jobs',    label: 'Jobs',    svg: '<svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/><path d="M3 13h18"/></svg>' },
    { key: 'chat',    label: 'Chat',    svg: '<svg viewBox="0 0 24 24"><path d="M21 12a8 8 0 0 1-11.6 7.1L4 21l1.9-5.4A8 8 0 1 1 21 12z"/></svg>' },
    { key: 'wallet',  label: 'Wallet',  svg: '<svg viewBox="0 0 24 24"><path d="M21 12V7a2 2 0 0 0-2-2H5a2 2 0 0 0 0 4h14a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7"/><circle cx="17" cy="14" r="1.2" fill="currentColor"/></svg>' }
  ];

  function buildTabBar(activeKey) {
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
    if (screen.querySelector(':scope > .tab-bar')) return;
    screen.insertAdjacentHTML('beforeend', buildTabBar(tab));
  });
})();
