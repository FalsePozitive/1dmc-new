/** Keep the request form reachable in short viewports and with a touch keyboard. */
function initRequestDialog() {
  'use strict';
  const overlay = document.getElementById('rfpmodal');
  const launch = document.getElementById('rfplaunch');
  if (!overlay || !launch) return;
  const dialog = overlay.querySelector('[role="dialog"]');
  const close = overlay.querySelector('.close');
  if (!dialog || !close) return;
  let previousFocus;
  let scrollPosition = 0;
  let bodyStyle;
  const properties = ['position', 'top', 'left', 'right', 'width', 'overflow'];

  function sizeToViewport() {
    const viewport = window.visualViewport;
    overlay.style.setProperty('--dialog-height', (viewport ? viewport.height : window.innerHeight) + 'px');
    overlay.style.setProperty('--dialog-top', (viewport ? viewport.offsetTop : 0) + 'px');
  }
  function closeDialog() {
    if (!overlay.classList.contains('modopened')) return;
    overlay.classList.remove('modopened');
    overlay.setAttribute('aria-hidden', 'true');
    properties.forEach(function (property) {
      if (bodyStyle[property].value) {
        document.body.style.setProperty(property, bodyStyle[property].value, bodyStyle[property].priority);
      } else document.body.style.removeProperty(property);
    });
    window.scrollTo(0, scrollPosition);
    if (previousFocus) previousFocus.focus({ preventScroll: true });
  }
  launch.addEventListener('click', function () {
    if (overlay.classList.contains('modopened')) return;
    previousFocus = document.activeElement;
    scrollPosition = window.scrollY;
    bodyStyle = {};
    properties.forEach(function (property) {
      bodyStyle[property] = { value: document.body.style.getPropertyValue(property), priority: document.body.style.getPropertyPriority(property) };
    });
    document.body.style.position = 'fixed';
    document.body.style.top = -scrollPosition + 'px';
    document.body.style.left = '0';
    document.body.style.right = '0';
    document.body.style.width = '100%';
    document.body.style.overflow = 'hidden';
    sizeToViewport();
    overlay.classList.add('modopened');
    overlay.setAttribute('aria-hidden', 'false');
    dialog.scrollTop = 0;
    dialog.focus({ preventScroll: true });
  });
  close.addEventListener('click', closeDialog);
  overlay.addEventListener('click', function (event) {
    if (event.target === overlay) closeDialog();
  });
  overlay.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') { event.preventDefault(); closeDialog(); return; }
    if (event.key !== 'Tab') return;
    const controls = Array.from(dialog.querySelectorAll('a[href], button, input, textarea, select, [tabindex]'))
      .filter(function (element) { return !element.disabled && element.tabIndex >= 0 && element.getClientRects().length; });
    const first = controls[0];
    const last = controls[controls.length - 1];
    if (event.shiftKey && (document.activeElement === first || document.activeElement === dialog)) {
      event.preventDefault(); if (last) last.focus();
    } else if (!event.shiftKey && (document.activeElement === last || document.activeElement === dialog)) {
      event.preventDefault(); if (first) first.focus();
    }
  });
  window.addEventListener('resize', sizeToViewport);
  if (window.visualViewport) {
    window.visualViewport.addEventListener('resize', sizeToViewport);
    window.visualViewport.addEventListener('scroll', sizeToViewport);
  }
}

// wp_footer() prints scripts before this theme's dialog markup.
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initRequestDialog);
} else {
  initRequestDialog();
}
