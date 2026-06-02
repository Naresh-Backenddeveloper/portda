// PORTDA — per-screen download. Adds a "Download PNG" button next to each
// screen label. Uses html2canvas (loaded from CDN in the page) to rasterise
// the .phone element and trigger a PNG download.

(function () {
  function init() {
    if (typeof html2canvas === 'undefined') {
      // html2canvas not loaded yet — retry shortly
      return setTimeout(init, 200);
    }

    document.querySelectorAll('.screen-wrap').forEach(function (wrap) {
      var label = wrap.querySelector('.screen-label');
      var phone = wrap.querySelector('.phone');
      if (!label || !phone || label.querySelector('.dl-btn')) return;

      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'dl-btn';
      btn.setAttribute('aria-label', 'Download screen as PNG');
      btn.innerHTML =
        '<svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">'
        + '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>'
        + '<polyline points="7 10 12 15 17 10"/>'
        + '<line x1="12" y1="15" x2="12" y2="3"/>'
        + '</svg>'
        + '<span>PNG</span>';
      label.appendChild(btn);

      btn.addEventListener('click', function (e) {
        e.preventDefault();
        if (btn.dataset.busy) return;
        btn.dataset.busy = '1';
        btn.classList.add('is-busy');

        html2canvas(phone, {
          scale: 3,
          backgroundColor: null,
          useCORS: true,
          logging: false
        }).then(function (canvas) {
          var raw = label.textContent.replace('PNG', '').trim();
          var safe = raw.replace(/[^\w\s.-]/g, '').replace(/\s+/g, '_').replace(/_+$/, '');
          var filename = 'PORTDA_' + (safe || 'screen') + '.png';
          canvas.toBlob(function (blob) {
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            setTimeout(function () { URL.revokeObjectURL(url); }, 1000);
            btn.classList.remove('is-busy');
            delete btn.dataset.busy;
          });
        }).catch(function () {
          btn.classList.remove('is-busy');
          delete btn.dataset.busy;
          alert('Could not capture screen. Try again.');
        });
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
