/* Theme switcher — Obsidian default */
(() => {
  const themes = [
    { key: 'obsidian', label: 'Obsidian' },
    { key: 'midnight', label: 'Полночь' },
    { key: 'quiet',    label: 'Тихий капитал' }
  ];
  const root = document.documentElement;
  const buttons = [...document.querySelectorAll('[data-theme-toggle]')];
  const labels = [...document.querySelectorAll('[data-theme-label]')];
  const get = () => { try { return localStorage.getItem('mco-theme') || 'obsidian'; } catch (e) { return 'obsidian'; } };
  const norm = k => themes.some(t => t.key === k) ? k : 'obsidian';
  const apply = key => {
    const t = themes.find(x => x.key === norm(key)) || themes[0];
    root.setAttribute('data-theme', t.key);
    labels.forEach(l => l.textContent = t.label);
    buttons.forEach(b => b.setAttribute('aria-label', `Тема: ${t.label}. Переключить`));
    try { localStorage.setItem('mco-theme', t.key); } catch (e) {}
  };
  const next = () => {
    const i = themes.findIndex(t => t.key === norm(root.getAttribute('data-theme') || get()));
    apply(themes[(i + 1) % themes.length].key);
  };
  apply(get());
  buttons.forEach(b => b.addEventListener('click', next));
})();

/* Header scroll, mobile menu, modal, filters */
(() => {
  const header = document.getElementById('header');
  const burger = document.getElementById('burger');
  const menu = document.getElementById('mobileMenu');
  const modal = document.getElementById('modal');
  const $ = id => document.getElementById(id);

  const onScroll = () => header && header.classList.toggle('scrolled', window.scrollY > 20);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  const openMenu = () => { menu?.classList.add('open'); menu?.setAttribute('aria-hidden', 'false'); burger?.setAttribute('aria-expanded', 'true'); };
  const closeMenu = () => { menu?.classList.remove('open'); menu?.setAttribute('aria-hidden', 'true'); burger?.setAttribute('aria-expanded', 'false'); };
  burger?.addEventListener('click', () => menu?.classList.contains('open') ? closeMenu() : openMenu());
  document.querySelectorAll('[data-menu-close]').forEach(el => el.addEventListener('click', closeMenu));

  const defaults = {
    title: 'Обсудим вашу задачу',
    text: 'Оставьте контакты — эксперт предложит сценарий и объекты из закрытой базы. Первый разбор — без обязательств.',
    success: 'Спасибо. Эксперт свяжется с вами в течение рабочего дня.'
  };
  const setContent = d => {
    if ($('selectionName')) $('selectionName').value = d.selection || '';
    if ($('modalTitle')) $('modalTitle').textContent = d.title || defaults.title;
    if ($('modalText')) $('modalText').textContent = d.text || defaults.text;
    if ($('modalSuccessText')) $('modalSuccessText').textContent = d.success || defaults.success;
  };
  const openModal = (d = {}) => {
    if (!modal) return;
    setContent(d);
    $('modalFormView').hidden = false; $('modalSuccessView').hidden = true;
    modal.classList.add('open'); modal.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden';
  };
  const closeModal = () => { if (!modal) return; modal.classList.remove('open'); modal.setAttribute('aria-hidden', 'true'); document.body.style.overflow = ''; };
  document.querySelectorAll('[data-modal-close]').forEach(el => el.addEventListener('click', closeModal));
  document.querySelectorAll('[data-modal-open]').forEach(t => t.addEventListener('click', e => {
    e.preventDefault(); closeMenu();
    const sel = t.dataset.selection || '';
    openModal({ selection: sel, title: sel ? 'Заявка на подборку' : defaults.title, text: sel ? `Оставьте контакты — пришлём «${sel}».` : defaults.text });
  }));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') { closeModal(); closeMenu(); } });

  document.querySelectorAll('#leadForm, #finalForm').forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      if (!form.checkValidity()) { form.reportValidity(); return; }
      if (form.id === 'leadForm') { $('modalFormView').hidden = true; $('modalSuccessView').hidden = false; }
      else { form.innerHTML = '<p class="lede">Спасибо. Эксперт свяжется с вами в течение рабочего дня.</p>'; }
    });
  });

  // Filters
  document.querySelectorAll('.chip[data-filter]').forEach(chip => {
    chip.addEventListener('click', () => {
      const f = chip.dataset.filter;
      document.querySelectorAll('.chip[data-filter]').forEach(c => c.setAttribute('aria-pressed', 'false'));
      chip.setAttribute('aria-pressed', 'true');
      document.querySelectorAll('#cards .prop').forEach(card => {
        const tags = (card.dataset.type || '') + ' ' + (card.dataset.geo || '');
        card.classList.toggle('hide', !(f === 'all' || tags.includes(f)));
      });
    });
  });

  // Focus trap
  let last = null;
  const isOpen = () => modal && modal.classList.contains('open');
  const focusable = () => modal ? [...modal.querySelectorAll('button,[href],input,select,textarea,[tabindex]:not([tabindex="-1"])')].filter(n => !n.disabled && n.offsetParent !== null) : [];
  if (modal) {
    new MutationObserver(() => {
      if (isOpen() && !modal.contains(document.activeElement)) { last = last || document.activeElement; const n = focusable(); if (n.length) setTimeout(() => n[0].focus({ preventScroll: true }), 0); }
      if (!isOpen() && last) { const t = last; last = null; if (document.contains(t)) t.focus({ preventScroll: true }); }
    }).observe(modal, { attributes: true, attributeFilter: ['class'] });
  }
  document.addEventListener('keydown', e => {
    if (e.key !== 'Tab' || !isOpen()) return;
    const n = focusable(); if (!n.length) { e.preventDefault(); return; }
    const first = n[0], lastEl = n[n.length - 1];
    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); lastEl.focus(); }
    else if (!e.shiftKey && document.activeElement === lastEl) { e.preventDefault(); first.focus(); }
  });
})();

/* Reveal on scroll */
(() => {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
  const targets = document.querySelectorAll('[data-reveal]');
  targets.forEach(el => el.classList.add('reveal'));
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
  }, { rootMargin: '0px 0px -8% 0px', threshold: 0.06 });
  targets.forEach(el => io.observe(el));
})();

