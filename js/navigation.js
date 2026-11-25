/** One menu state shared by touch, keyboard and desktop navigation. */
(function () {
  'use strict';
  const navigation = document.getElementById('site-navigation');
  if (!navigation) return;
  const button = navigation.querySelector('.menu-toggle');
  const menu = navigation.querySelector('#primary-menu');
  if (!button || !menu) return;
  const compact = window.matchMedia('(max-width: 1280px)');
  menu.classList.add('nav-menu');

  function setOpen(open) {
    navigation.classList.toggle('toggled', open);
    button.setAttribute('aria-expanded', String(open));
    button.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
  }
  button.addEventListener('click', function () {
    setOpen(button.getAttribute('aria-expanded') !== 'true');
  });
  document.addEventListener('click', function (event) {
    if (!navigation.contains(event.target)) setOpen(false);
  });
  navigation.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      setOpen(false);
      button.focus();
    }
  });
  compact.addEventListener('change', function () { setOpen(false); });
  menu.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function () {
      if (!link.parentElement.classList.contains('menu-item-has-children')) setOpen(false);
    });
    ['focus', 'blur'].forEach(function (type) {
      link.addEventListener(type, function () {
        let item = link.parentElement;
        while (item && item !== menu) {
          if (item.tagName === 'LI') item.classList.toggle('focus', type === 'focus');
          item = item.parentElement;
        }
      });
    });
  });
  menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a').forEach(function (link) {
    link.addEventListener('touchstart', function (event) {
      const item = link.parentElement;
      if (!item.classList.contains('focus')) {
        event.preventDefault();
        Array.from(item.parentElement.children).forEach(function (sibling) {
          sibling.classList.remove('focus');
        });
        item.classList.add('focus');
      }
    }, { passive: false });
  });
}());
