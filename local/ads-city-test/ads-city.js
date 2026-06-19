/* =========================================================================
   ADS · «Реклама в Москва-Сити» — прогрессивное улучшение.
   Без зависимостей. Всё изолировано в #ads-city.
   ========================================================================= */
(function () {
  'use strict';
  var root = document.getElementById('ads-city');
  if (!root) return;
  var REDUCE = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var calc         = document.getElementById('ads-city-calc');
  var formatSelect = document.getElementById('ac-format');
  var formatHidden = root.querySelector('[data-ads-format-target]');

  function scrollTo(el) { if (el) el.scrollIntoView({ behavior: REDUCE ? 'auto' : 'smooth', block: 'start' }); }

  /* 1. «Уточнить условия» -> проставляем формат в форму + скролл к расчёту */
  root.querySelectorAll('[data-ads-format]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var val = link.getAttribute('data-ads-format') || '';
      if (formatSelect) {
        Array.prototype.some.call(formatSelect.options, function (o) {
          if (o.value === val || o.text === val) { formatSelect.value = o.value; return true; }
          return false;
        });
      }
      if (formatHidden) formatHidden.value = val; // формат уедет в заявке всегда
      e.preventDefault();
      scrollTo(calc);
      setTimeout(function () { if (formatSelect) formatSelect.focus({ preventScroll: true }); }, REDUCE ? 0 : 420);
    });
  });

  /* 1b. «Получить расчёт» на карточке поверхности -> метка с поверхностью + скролл */
  var serviceField = document.querySelector('#ads-city-calc [name="service"]');
  root.querySelectorAll('[data-ads-surface]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var s = link.getAttribute('data-ads-surface') || '';
      if (serviceField) serviceField.value = '[Реклама в Москва-Сити]' + (s ? ' / ' + s : '');
      if (formatHidden) formatHidden.value = s;            // поверхность уедет и в format_selected
      e.preventDefault();
      scrollTo(calc);
      setTimeout(function () { var n = document.getElementById('ac-name'); if (n) n.focus({ preventScroll: true }); }, REDUCE ? 0 : 420);
    });
  });

  /* 1c. Каталог поверхностей: фильтры без перезагрузки */
  var catalog = document.getElementById('ads-city-catalog');
  if (catalog) {
    var cards = Array.prototype.slice.call(catalog.querySelectorAll('[data-cat]'));
    var empty = root.querySelector('[data-catalog-empty]');
    var filters = Array.prototype.slice.call(root.querySelectorAll('[data-filter]'));
    filters.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var f = btn.getAttribute('data-filter');
        filters.forEach(function (b) { b.setAttribute('aria-pressed', b === btn ? 'true' : 'false'); });
        var shown = 0;
        cards.forEach(function (c) {
          var ok = f === 'all' || (' ' + c.getAttribute('data-cat') + ' ').indexOf(' ' + f + ' ') > -1;
          c.classList.toggle('is-hidden', !ok);
          if (ok) shown++;
        });
        if (empty) empty.hidden = shown !== 0;
      });
    });
  }

  /* 2. Плавный скролл для остальных внутренних якорей (#ads-city-calc и т.п.) */
  root.querySelectorAll('a[href^="#ads-city"]').forEach(function (a) {
    if (a.hasAttribute('data-ads-format')) return;
    a.addEventListener('click', function (e) {
      var t = document.getElementById(a.getAttribute('href').slice(1));
      if (t) { e.preventDefault(); scrollTo(t); }
    });
  });

  /* 3. Формы: AJAX-отправка с состояниями (если задан action) */
  root.querySelectorAll('[data-ads-form]').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) return;            // нет action или невалидно -> нативное поведение
      var endpoint = form.getAttribute('action');
      if (!endpoint) return;                          // обычная отправка страницей (тоже рабочий вариант)
      e.preventDefault();

      var btn = form.querySelector('[type="submit"]');
      var lbl = btn ? btn.textContent : '';
      var data = new FormData(form);
      if (window.BX && BX.bitrix_sessid) data.append('sessid', BX.bitrix_sessid());

      if (btn) { btn.disabled = true; btn.setAttribute('aria-busy', 'true'); btn.textContent = 'Отправляем…'; }

      fetch(endpoint, { method: 'POST', body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } })
        .then(function (r) { return r.ok ? r.json().catch(function () { return { status: 'success' }; }) : Promise.reject(r.status); })
        .then(function (res) {
          if (res && res.status === 'error') return Promise.reject(res.message || 'error');
          form.classList.add('is-sent');             // CSS покажет .ads-city-form__ok, скроет поля
          var ok = form.querySelector('.ads-city-form__ok'); if (ok && ok.focus) ok.focus();
          if (window.ym) try { ym(0, 'reachGoal', 'ads_lead'); } catch (x) {} // опц. цель Метрики
        })
        .catch(function () {
          if (btn) { btn.disabled = false; btn.removeAttribute('aria-busy'); btn.textContent = lbl; }
          showError(form, 'Не удалось отправить. Попробуйте ещё раз или позвоните нам.');
        });
    });
  });

  function showError(form, msg) {
    var box = form.querySelector('[data-ads-error]');
    if (!box) {
      box = document.createElement('p');
      box.setAttribute('data-ads-error', ''); box.setAttribute('role', 'alert');
      box.style.cssText = 'color:#F87171;font-size:.85rem;margin-top:.5rem';
      form.appendChild(box);
    }
    box.textContent = msg;
  }

  /* 4. FAQ — «открыт только один» (плавность даёт CSS, JS лёгкий) */
  var items = root.querySelectorAll('.ads-city-faq__item');
  items.forEach(function (d) {
    d.addEventListener('toggle', function () {
      if (d.open) items.forEach(function (o) { if (o !== d) o.open = false; });
    });
  });
})();

/* === TEST: SHORT POPUP LEAD FORM START === */
(function () {
  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    var root = document.querySelector('.ads-city');
    if (!root) return;

    var action = '/local/ads-city-test/ads-lead.php';

    function getSessid() {
      if (window.ADS_CITY_SESSID) return window.ADS_CITY_SESSID;
      var input = document.querySelector('input[name="sessid"]');
      if (input && input.value) return input.value;
      if (window.BX && typeof BX.bitrix_sessid === 'function') return BX.bitrix_sessid();
      return '';
    }

    function getSurfaceName(trigger) {
      if (!trigger) return '';
      var card = trigger.closest('.ads-city-surf, .ads-city-card, [data-surface-card]');
      if (!card) return '';
      var title = card.querySelector('.ads-city-surf__name, .ads-city-card__title, h3, h4');
      return title ? title.textContent.trim() : '';
    }

    var modal = document.createElement('div');
    modal.className = 'ads-city-modal';
    modal.setAttribute('aria-hidden', 'true');
    modal.innerHTML = ''
      + '<div class="ads-city-modal__overlay" data-ac-modal-close></div>'
      + '<div class="ads-city-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="ads-city-modal-title">'
      + '  <button class="ads-city-modal__close" type="button" aria-label="Закрыть" data-ac-modal-close>×</button>'
      + '  <div class="ads-city-modal__head">'
      + '    <p class="ads-city-modal__eyebrow">Быстрая заявка</p>'
      + '    <h3 id="ads-city-modal-title">Получить расчёт размещения</h3>'
      + '    <p>Оставьте имя и телефон — подберём поверхности и подготовим расчёт.</p>'
      + '  </div>'
      + '  <form class="ads-city-modal__form" data-ac-popup-form>'
      + '    <input type="hidden" name="sessid" value="">'
      + '    <input type="hidden" name="service" value="[Реклама в Москва-Сити]">'
      + '    <input type="hidden" name="format" value="Заявка из попапа">'
      + '    <input type="hidden" name="comment" value="">'
      + '    <label>Имя<input name="name" type="text" autocomplete="name" placeholder="Ваше имя" required></label>'
      + '    <label>Телефон<input name="phone" type="tel" autocomplete="tel" placeholder="+7 ___ ___-__-__" required></label>'
      + '    <button class="ads-city-btn ads-city-btn--primary" type="submit">Отправить заявку</button>'
      + '    <p class="ads-city-modal__note">Нажимая кнопку, вы соглашаетесь на обработку персональных данных.</p>'
      + '    <div class="ads-city-modal__status" aria-live="polite"></div>'
      + '  </form>'
      + '</div>';

    document.body.appendChild(modal);

    var form = modal.querySelector('[data-ac-popup-form]');
    var status = modal.querySelector('.ads-city-modal__status');
    var nameInput = modal.querySelector('input[name="name"]');
    var sessidInput = modal.querySelector('input[name="sessid"]');
    var commentInput = modal.querySelector('input[name="comment"]');
    var formatInput = modal.querySelector('input[name="format"]');

    function openModal(trigger) {
      var surface = getSurfaceName(trigger);
      sessidInput.value = getSessid();

      if (surface) {
        formatInput.value = surface;
        commentInput.value = 'Интересует поверхность: ' + surface;
      } else {
        formatInput.value = 'Заявка из попапа';
        commentInput.value = 'Заявка с рекламной страницы';
      }

      status.textContent = '';
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      document.documentElement.classList.add('ads-city-modal-open');

      setTimeout(function () {
        nameInput.focus();
      }, 60);
    }

    function closeModal() {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      document.documentElement.classList.remove('ads-city-modal-open');
    }

    document.addEventListener('click', function (e) {
      var close = e.target.closest('[data-ac-modal-close]');
      if (close) {
        e.preventDefault();
        closeModal();
        return;
      }

      var trigger = e.target.closest('.ads-city a, .ads-city button');
      if (!trigger) return;

      var text = (trigger.textContent || '').trim().toLowerCase();
      var href = trigger.getAttribute('href') || '';

      var shouldOpen =
        href === '#ads-city-calc' ||
        text.indexOf('получить расчёт') !== -1 ||
        text.indexOf('получить расчет') !== -1 ||
        text.indexOf('получить подборку') !== -1 ||
        text.indexOf('подобрать') !== -1 ||
        text.indexOf('рассчитать') !== -1;

      if (shouldOpen && !trigger.closest('.ads-city-modal')) {
        e.preventDefault();
        openModal(trigger);
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      status.textContent = '';
      var btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.textContent = 'Отправляем...';

      fetch(action, {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin'
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (data && data.status === 'success') {
            status.textContent = 'Спасибо! Заявка отправлена.';
            form.reset();
            sessidInput.value = getSessid();
            setTimeout(closeModal, 1200);
          } else {
            status.textContent = (data && data.message) ? data.message : 'Не удалось отправить заявку.';
          }
        })
        .catch(function () {
          status.textContent = 'Ошибка отправки. Попробуйте ещё раз.';
        })
        .finally(function () {
          btn.disabled = false;
          btn.textContent = 'Отправить заявку';
        });
    });
  });
})();
/* === TEST: SHORT POPUP LEAD FORM END === */

/* === TEST: POPUP UX FIX START === */
(function () {
  if (window.__adsCityPopupUxFix) return;
  window.__adsCityPopupUxFix = true;

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  ready(function () {
    var root = document.querySelector('.ads-city');
    var modal = document.querySelector('.ads-city-modal');
    if (!root || !modal) return;

    var form = modal.querySelector('[data-ac-popup-form]');
    var dialog = modal.querySelector('.ads-city-modal__dialog');
    var title = modal.querySelector('#ads-city-modal-title');
    var status = modal.querySelector('.ads-city-modal__status');

    if (!form || !dialog) return;

    var savedScrollY = 0;

    if (!modal.querySelector('.ads-city-modal__success')) {
      var success = document.createElement('div');
      success.className = 'ads-city-modal__success';
      success.innerHTML = ''
        + '<div class="ads-city-modal__success-icon">✓</div>'
        + '<h3>Заявка отправлена</h3>'
        + '<p>Мы получили ваши контакты и скоро свяжемся для расчёта размещения.</p>'
        + '<button type="button" class="ads-city-btn ads-city-btn--primary" data-ac-modal-close>Хорошо</button>';

      dialog.appendChild(success);
    }

    function getSessid() {
      if (window.ADS_CITY_SESSID) return window.ADS_CITY_SESSID;
      var input = document.querySelector('input[name="sessid"]');
      if (input && input.value) return input.value;
      if (window.BX && typeof BX.bitrix_sessid === 'function') return BX.bitrix_sessid();
      return '';
    }

    function getSurfaceName(trigger) {
      if (!trigger) return '';
      var card = trigger.closest('.ads-city-surf, .ads-city-card, [data-surface-card]');
      if (!card) return '';
      var title = card.querySelector('.ads-city-surf__name, .ads-city-card__title, h3, h4');
      return title ? title.textContent.trim() : '';
    }

    function isLeadTrigger(trigger) {
      if (!trigger || trigger.closest('.ads-city-modal')) return false;

      var text = (trigger.textContent || '').trim().toLowerCase();
      var href = trigger.getAttribute('href') || '';

      return (
        href === '#ads-city-calc' ||
        text.indexOf('получить расчёт') !== -1 ||
        text.indexOf('получить расчет') !== -1 ||
        text.indexOf('получить подборку') !== -1 ||
        text.indexOf('подобрать') !== -1 ||
        text.indexOf('рассчитать') !== -1
      );
    }

    function lockPage() {
      savedScrollY = window.scrollY || document.documentElement.scrollTop || 0;

      document.documentElement.classList.add('ads-city-modal-open');
      document.body.classList.add('ads-city-modal-open');

      document.body.style.position = 'fixed';
      document.body.style.top = '-' + savedScrollY + 'px';
      document.body.style.left = '0';
      document.body.style.right = '0';
      document.body.style.width = '100%';
    }

    function unlockPage() {
      document.documentElement.classList.remove('ads-city-modal-open');
      document.body.classList.remove('ads-city-modal-open');

      document.body.style.position = '';
      document.body.style.top = '';
      document.body.style.left = '';
      document.body.style.right = '';
      document.body.style.width = '';

      window.scrollTo(0, savedScrollY);
    }

    function openModal(trigger) {
      var surface = getSurfaceName(trigger);

      modal.classList.remove('is-success');

      var sessidInput = form.querySelector('input[name="sessid"]');
      var formatInput = form.querySelector('input[name="format"]');
      var commentInput = form.querySelector('input[name="comment"]');
      var nameInput = form.querySelector('input[name="name"]');

      if (sessidInput) sessidInput.value = getSessid();

      if (surface) {
        if (formatInput) formatInput.value = surface;
        if (commentInput) commentInput.value = '';
      } else {
        if (formatInput) formatInput.value = 'Заявка из попапа';
        if (commentInput) commentInput.value = '';
      }

      if (status) status.textContent = '';

      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');

      lockPage();

      setTimeout(function () {
        if (nameInput) nameInput.focus();
      }, 80);
    }

    function closeModal() {
      modal.classList.remove('is-open');
      modal.classList.remove('is-success');
      modal.setAttribute('aria-hidden', 'true');
      unlockPage();

      if (form) form.reset();
      if (status) status.textContent = '';
      if (title) title.textContent = 'Получить расчёт размещения';
    }

    document.addEventListener('click', function (e) {
      var closeBtn = e.target.closest('[data-ac-modal-close]');
      if (closeBtn && modal.contains(closeBtn)) {
        e.preventDefault();
        e.stopImmediatePropagation();
        closeModal();
        return;
      }

      var trigger = e.target.closest('.ads-city a, .ads-city button');
      if (!isLeadTrigger(trigger)) return;

      e.preventDefault();
      e.stopImmediatePropagation();

      openModal(trigger);
    }, true);

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) {
        e.preventDefault();
        closeModal();
      }
    }, true);

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();

      var btn = form.querySelector('button[type="submit"]');
      var sessidInput = form.querySelector('input[name="sessid"]');

      if (sessidInput) sessidInput.value = getSessid();
      if (status) status.textContent = '';

      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Отправляем...';
      }

      fetch('/local/ads-city-test/ads-lead.php', {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin'
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (data && data.status === 'success') {
            modal.classList.add('is-success');
            if (title) title.textContent = 'Готово';
            if (status) status.textContent = '';
          } else {
            if (status) status.textContent = (data && data.message) ? data.message : 'Не удалось отправить заявку.';
          }
        })
        .catch(function () {
          if (status) status.textContent = 'Ошибка отправки. Попробуйте ещё раз.';
        })
        .finally(function () {
          if (btn) {
            btn.disabled = false;
            btn.textContent = 'Отправить заявку';
          }
        });
    }, true);
  });
})();
/* === TEST: POPUP UX FIX END === */

/* === TEST: CLEAN LANDING V2 START === */
(function () {
  if (window.__adsCityCleanLandingV2) return;
  window.__adsCityCleanLandingV2 = true;

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  function getDirectChild(root, el) {
    while (el && el.parentElement && el.parentElement !== root) {
      el = el.parentElement;
    }
    return el && el.parentElement === root ? el : null;
  }

  function cleanClone(card) {
    var clone = card.cloneNode(true);
    clone.querySelectorAll('[id]').forEach(function (n) { n.removeAttribute('id'); });
    clone.classList.remove('hidden', 'is-hidden', 'ads-city-surf-is-hidden');
    clone.style.display = '';
    clone.style.visibility = '';
    clone.style.opacity = '';
    return clone;
  }

  function initCarousel(block) {
    var row = block.querySelector('[data-v2-row]');
    var prev = block.querySelector('[data-v2-prev]');
    var next = block.querySelector('[data-v2-next]');
    if (!row || !prev || !next) return;

    function step() {
      return Math.max(280, Math.round(row.clientWidth * 0.88));
    }

    function update() {
      var max = row.scrollWidth - row.clientWidth - 4;
      prev.disabled = row.scrollLeft <= 4;
      next.disabled = row.scrollLeft >= max || max <= 4;
    }

    prev.addEventListener('click', function () {
      row.scrollBy({ left: -step(), behavior: 'smooth' });
    });

    next.addEventListener('click', function () {
      row.scrollBy({ left: step(), behavior: 'smooth' });
    });

    row.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    setTimeout(update, 80);
  }

  function sectionHeader(kicker, title, text) {
    return ''
      + '<div class="ads-city-v2-head">'
      + '  <div class="ads-city-v2-kicker">' + kicker + '</div>'
      + '  <h2>' + title + '</h2>'
      + (text ? '<p>' + text + '</p>' : '')
      + '</div>';
  }

  function carouselShell(title, text, cards, className) {
    var shell = document.createElement('section');
    shell.className = 'ads-city-v2-section ' + className;

    shell.innerHTML = ''
      + sectionHeader('Поверхности', title, text)
      + '<div class="ads-city-v2-carousel-nav">'
      + '  <button type="button" data-v2-prev aria-label="Назад">‹</button>'
      + '  <button type="button" data-v2-next aria-label="Вперёд">›</button>'
      + '</div>'
      + '<div class="ads-city-v2-carousel-row" data-v2-row></div>';

    var row = shell.querySelector('[data-v2-row]');
    cards.forEach(function (card) {
      row.appendChild(cleanClone(card));
    });

    return shell;
  }

  ready(function () {
    var root = document.querySelector('.ads-city');
    if (!root || root.querySelector('.ads-city-clean-landing-v2')) return;

    var hero = root.querySelector('.ads-city-hero');
    var heroBlock = getDirectChild(root, hero) || hero;

    var sourceCards = Array.prototype.slice.call(root.querySelectorAll('.ads-city-surf'))
      .filter(function (card) {
        return !card.closest('.ads-city-modal');
      });

    if (!heroBlock || !sourceCards.length) return;

    var landing = document.createElement('div');
    landing.className = 'ads-city-clean-landing-v2';

    var featuredCards = sourceCards.slice(0, 8);
    var featured = carouselShell(
      'Избранные фасады и digital-поверхности',
      'Ключевые варианты размещения в Москва-Сити, которые чаще всего подходят для охватных и имиджевых кампаний.',
      featuredCards,
      'ads-city-v2-section--white ads-city-v2-featured'
    );

    var all = document.createElement('section');
    all.className = 'ads-city-v2-section ads-city-v2-section--blue ads-city-v2-all';
    all.innerHTML = ''
      + sectionHeader('Каталог', 'Все фасады и поверхности', 'Сначала показываем основные варианты. Остальные можно раскрыть кнопкой, чтобы страница не превращалась в бесконечную ленту.')
      + '<div class="ads-city-v2-all-grid"></div>'
      + '<div class="ads-city-v2-loadmore"><button type="button" class="ads-city-btn ads-city-btn--ghost">Показать ещё</button></div>';

    var allGrid = all.querySelector('.ads-city-v2-all-grid');
    sourceCards.forEach(function (card) {
      allGrid.appendChild(cleanClone(card));
    });

    var allCards = Array.prototype.slice.call(allGrid.querySelectorAll('.ads-city-surf'));
    var visible = 6;
    var loadBtn = all.querySelector('.ads-city-v2-loadmore button');

    function updateAllCards() {
      allCards.forEach(function (card, i) {
        card.classList.toggle('ads-city-v2-card-hidden', i >= visible);
      });

      if (visible >= allCards.length) {
        loadBtn.textContent = 'Свернуть';
      } else {
        loadBtn.textContent = 'Показать ещё';
      }
    }

    loadBtn.addEventListener('click', function () {
      if (visible >= allCards.length) {
        visible = 6;
        updateAllCards();
        all.scrollIntoView({ behavior: 'smooth', block: 'start' });
        return;
      }

      visible = Math.min(visible + 6, allCards.length);
      updateAllCards();
    });

    updateAllCards();

    var formats = document.createElement('section');
    formats.className = 'ads-city-v2-section ads-city-v2-section--white ads-city-v2-formats';
    formats.innerHTML = ''
      + sectionHeader('Форматы', 'Форматы размещения', 'Подбираем формат под задачу: охват, имидж, спецпроект или контакт с аудиторией внутри башен.')
      + '<div class="ads-city-v2-format-row">'
      + '  <article><b>Медиафасады</b><span>Крупная реклама на башнях и фасадах.</span></article>'
      + '  <article><b>Медиакубы</b><span>Эффектные digital-форматы в заметных точках.</span></article>'
      + '  <article><b>Indoor</b><span>Экраны внутри башен, галерей и деловых пространств.</span></article>'
      + '  <article><b>Спецпроекты</b><span>Промо, события, бренд-зоны и нестандартные интеграции.</span></article>'
      + '</div>';

    var tasks = document.createElement('section');
    tasks.className = 'ads-city-v2-section ads-city-v2-section--blue ads-city-v2-tasks';
    tasks.innerHTML = ''
      + sectionHeader('Задачи', 'Какие задачи решаем', 'Не просто показываем экран, а подбираем размещение под понятную бизнес-задачу.')
      + '<div class="ads-city-v2-carousel-nav">'
      + '  <button type="button" data-v2-prev aria-label="Назад">‹</button>'
      + '  <button type="button" data-v2-next aria-label="Вперёд">›</button>'
      + '</div>'
      + '<div class="ads-city-v2-task-row" data-v2-row>'
      + '  <article><b>Охватная реклама</b><span>Быстро получить видимость в деловом центре.</span></article>'
      + '  <article><b>Запуск бренда</b><span>Громко выйти на премиальную аудиторию.</span></article>'
      + '  <article><b>Продвижение события</b><span>Анонс мероприятия, открытия или презентации.</span></article>'
      + '  <article><b>Трафик в локацию</b><span>Привести людей в ресторан, офис, шоурум или ТЦ.</span></article>'
      + '  <article><b>Имидж</b><span>Поддержать статус бренда в Москва-Сити.</span></article>'
      + '  <article><b>Спецпроект</b><span>Собрать нестандартную рекламную механику.</span></article>'
      + '</div>';

    var launch = document.createElement('section');
    launch.className = 'ads-city-v2-section ads-city-v2-section--white ads-city-v2-launch';
    launch.innerHTML = ''
      + sectionHeader('Запуск', 'Как запускаемся', 'Короткий процесс без бюрократического квеста, насколько это вообще возможно в реальном мире.')
      + '<div class="ads-city-v2-launch-grid">'
      + '  <article><span>01</span><b>Заявка</b><p>Вы оставляете контакты и задачу.</p></article>'
      + '  <article><span>02</span><b>Подбор</b><p>Подбираем поверхности и период.</p></article>'
      + '  <article><span>03</span><b>Расчёт</b><p>Готовим стоимость и медиаплан.</p></article>'
      + '  <article><span>04</span><b>Запуск</b><p>Согласовываем материалы и размещение.</p></article>'
      + '</div>';

    var cta = document.createElement('section');
    cta.className = 'ads-city-v2-section ads-city-v2-section--blue ads-city-v2-final';
    cta.innerHTML = ''
      + '<div>'
      + '  <div class="ads-city-v2-kicker">Заявка</div>'
      + '  <h2>Получить подборку поверхностей</h2>'
      + '  <p>Оставьте заявку, и мы подготовим варианты размещения под вашу кампанию.</p>'
      + '</div>'
      + '<div class="ads-city-v2-final-actions">'
      + '  <button type="button" class="ads-city-btn ads-city-btn--primary">Получить расчёт</button>'
      + '  <a class="ads-city-btn ads-city-btn--ghost" href="tel:+79648899868">Позвонить</a>'
      + '</div>';

    landing.appendChild(featured);
    landing.appendChild(all);
    landing.appendChild(formats);
    landing.appendChild(tasks);
    landing.appendChild(launch);
    landing.appendChild(cta);

    root.insertBefore(landing, heroBlock.nextSibling);

    Array.prototype.slice.call(root.children).forEach(function (child) {
      if (
        child === heroBlock ||
        child === landing ||
        child.classList.contains('ads-city-modal') ||
        ['svg', 'script', 'style', 'link'].indexOf(child.tagName.toLowerCase()) !== -1
      ) {
        return;
      }

      child.classList.add('ads-city-v2-legacy-hidden');
    });

    landing.querySelectorAll('.ads-city-v2-featured, .ads-city-v2-tasks').forEach(initCarousel);
  });
})();
/* === TEST: CLEAN LANDING V2 END === */













/* === TEST: STABLE ALL FACADES JSON RENDER START === */
(function () {
  if (window.__adsCityStableAllFacadesJsonRender) return;
  window.__adsCityStableAllFacadesJsonRender = true;

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  function esc(value) {
    return String(value || '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function getItems(data) {
    var found = [];

    function walk(x) {
      if (Array.isArray(x)) {
        x.forEach(walk);
        return;
      }

      if (!x || typeof x !== 'object') return;

      if (x.id && x.name && (x.price_label || x.price_from_rub || x.image)) {
        found.push(x);
        return;
      }

      Object.keys(x).forEach(function (key) {
        walk(x[key]);
      });
    }

    walk(data);

    var seen = {};
    return found.filter(function (item) {
      var key = String(item.id || item.name).toLowerCase();
      if (seen[key]) return false;
      seen[key] = true;
      return true;
    });
  }

  function getImage(value) {
    if (!value) return '';

    var img = String(value).trim();

    if (img.indexOf('http') === 0 || img.indexOf('/') === 0) return img;

    if (img.indexOf('screens/') === 0) {
      return '/upload/ads-city-test/' + img;
    }

    return '/upload/ads-city-test/screens/' + img;
  }

  function getPrice(item) {
    if (item.price_label) return item.price_label;

    if (item.price_from_rub) {
      var num = parseInt(String(item.price_from_rub).replace(/[^\d]/g, ''), 10);
      if (num) return 'от ' + num.toLocaleString('ru-RU') + ' ₽ / день';
    }

    return 'по запросу';
  }

  function makeCard(item) {
    var image = getImage(item.image);
    var price = getPrice(item);

    var meta = '';

    if (item.type_label) meta += '<li><span>Тип</span><b>' + esc(item.type_label) + '</b></li>';
    if (item.tower) meta += '<li><span>Башня</span><b>' + esc(item.tower) + '</b></li>';
    if (item.screens_count) meta += '<li><span>Экраны</span><b>' + esc(item.screens_count) + '</b></li>';
    if (item.size) meta += '<li><span>Размер</span><b>' + esc(item.size) + '</b></li>';
    if (item.ots_daily) meta += '<li><span>OTS / сутки</span><b>' + Number(item.ots_daily).toLocaleString('ru-RU') + '</b></li>';
    if (item.clip_seconds) meta += '<li><span>Ролик</span><b>' + esc(item.clip_seconds) + ' сек</b></li>';

    var html = ''
      + '<article class="ads-city-surf ads-city-stable-facade-card">'
      + (image ? '<div class="ads-city-surf__media"><img src="' + esc(image) + '" alt="' + esc(item.alt || item.name) + '" loading="lazy"></div>' : '')
      + '<div class="ads-city-surf__body">'
      + '  <div class="ads-city-surf__top">'
      + '    <h3 class="ads-city-surf__name">' + esc(item.name) + '</h3>'
      + '    <div class="ads-city-surf__price">' + esc(price) + '</div>'
      + '  </div>'
      + (item.description ? '<p class="ads-city-surf__desc">' + esc(item.description) + '</p>' : '')
      + (meta ? '<ul class="ads-city-surf__meta">' + meta + '</ul>' : '')
      + '  <button type="button" class="ads-city-btn ads-city-btn--primary ads-city-surf__cta">Получить расчёт</button>'
      + '</div>'
      + '</article>';

    var wrap = document.createElement('div');
    wrap.innerHTML = html;

    var card = wrap.firstElementChild;
    var media = card.querySelector('.ads-city-surf__media');
    var img = card.querySelector('img');

    if (img && media) {
      img.addEventListener('error', function () {
        media.style.display = 'none';
      });
    }

    return card;
  }

  function render(items) {
    var root = document.querySelector('.ads-city');
    var grid = root && root.querySelector('.ads-city-v2-all-grid');
    var loadWrap = root && root.querySelector('.ads-city-v2-loadmore');
    var section = root && root.querySelector('.ads-city-v2-all');

    if (!grid || !loadWrap || !items.length) return;

    grid.innerHTML = '';

    items.forEach(function (item) {
      grid.appendChild(makeCard(item));
    });

    loadWrap.innerHTML = '<button type="button" class="ads-city-btn ads-city-btn--ghost">Показать ещё</button>';

    var btn = loadWrap.querySelector('button');
    var cards = Array.prototype.slice.call(grid.querySelectorAll('.ads-city-surf'));
    var visible = 6;
    var step = 6;

    function update() {
      cards.forEach(function (card, index) {
        card.classList.toggle('ads-city-v2-card-hidden', index >= visible);
      });

      if (cards.length <= 6) {
        loadWrap.style.display = 'none';
        return;
      }

      loadWrap.style.display = '';

      if (visible >= cards.length) {
        btn.textContent = 'Свернуть';
      } else {
        btn.textContent = 'Показать ещё (' + Math.min(visible, cards.length) + ' из ' + cards.length + ')';
      }
    }

    btn.addEventListener('click', function () {
      if (visible >= cards.length) {
        visible = 6;
        update();

        if (section) {
          section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        return;
      }

      visible = Math.min(visible + step, cards.length);
      update();
    });

    update();
    console.log('[ads-city] stable facades render:', cards.length);
  }

  ready(function () {
    function run(attempt) {
      attempt = attempt || 0;

      if (!document.querySelector('.ads-city-v2-all-grid')) {
        if (attempt < 30) setTimeout(function () { run(attempt + 1); }, 150);
        return;
      }

      fetch('/local/ads-city-test/data/surfaces.json?v=stable-facades-render-1', {
        credentials: 'same-origin',
        cache: 'no-store'
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          render(getItems(data));
        })
        .catch(function (err) {
          console.warn('[ads-city] stable facades render failed', err);
        });
    }

    run(0);
  });
})();
/* === TEST: STABLE ALL FACADES JSON RENDER END === */

/* === TEST: UX POLISH MARK STEPS START === */
(function () {
  if (window.__adsCityUxPolishMarkSteps) return;
  window.__adsCityUxPolishMarkSteps = true;

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  function markStepsSection() {
    var root = document.querySelector('.ads-city-clean-landing-v2');
    if (!root) return;

    var blocks = root.querySelectorAll('section, .ads-city-v2-section, div');

    blocks.forEach(function (block) {
      var heading = block.querySelector('h2, h3');
      if (!heading) return;

      var text = heading.textContent.toLowerCase();

      if (
        text.indexOf('как запуска') !== -1 ||
        text.indexOf('запускается') !== -1 ||
        text.indexOf('запуск') !== -1
      ) {
        block.classList.add('ads-city-v2-steps-ux');
      }
    });
  }

  ready(function () {
    markStepsSection();
    setTimeout(markStepsSection, 300);
    setTimeout(markStepsSection, 1000);
  });
})();
/* === TEST: UX POLISH MARK STEPS END === */







/* === TEST: CAROUSEL EXACT CARD SCROLL START === */
(function () {
  if (window.__adsCityCarouselExactCardScroll) return;
  window.__adsCityCarouselExactCardScroll = true;

  function ready(fn) {
    if (document.readyState !== 'loading') fn();
    else document.addEventListener('DOMContentLoaded', fn);
  }

  function isMobile() {
    return window.matchMedia && window.matchMedia('(max-width: 760px)').matches;
  }

  function findRow(section) {
    if (!section) return null;

    return section.querySelector(
      '[data-v2-row], ' +
      '.ads-city-v2-featured-row, ' +
      '.ads-city-v2-format-row, ' +
      '.ads-city-v2-task-row, ' +
      '.ads-city-v2-row, ' +
      '.ads-city-v2-cards'
    );
  }

  function getCards(row) {
    if (!row) return [];

    return Array.prototype.slice.call(row.children).filter(function (el) {
      var style = window.getComputedStyle(el);
      return style.display !== 'none' && el.offsetWidth > 0;
    });
  }

  function nearestCardIndex(row, cards) {
    var rowCenter = row.scrollLeft + row.clientWidth / 2;
    var bestIndex = 0;
    var bestDistance = Infinity;

    cards.forEach(function (card, index) {
      var cardCenter = card.offsetLeft + card.offsetWidth / 2;
      var distance = Math.abs(cardCenter - rowCenter);

      if (distance < bestDistance) {
        bestDistance = distance;
        bestIndex = index;
      }
    });

    return bestIndex;
  }

  function scrollToCard(row, card) {
    if (!row || !card) return;

    var left = card.offsetLeft - (row.clientWidth - card.offsetWidth) / 2;

    row.scrollTo({
      left: Math.max(0, left),
      behavior: 'smooth'
    });
  }

  function bindNav(nav) {
    if (!nav || nav.dataset.exactCardScrollBound === '1') return;

    var section = nav.closest(
      '.ads-city-v2-featured, ' +
      '.ads-city-v2-formats, ' +
      '.ads-city-v2-tasks, ' +
      '.ads-city-v2-section, ' +
      'section'
    );

    var row = findRow(section);
    if (!row) return;

    var buttons = nav.querySelectorAll('button');
    if (buttons.length < 2) return;

    nav.dataset.exactCardScrollBound = '1';

    buttons[0].addEventListener('click', function (e) {
      if (isMobile()) return;

      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();

      var cards = getCards(row);
      if (!cards.length) return;

      var index = nearestCardIndex(row, cards);
      scrollToCard(row, cards[Math.max(0, index - 1)]);
    }, true);

    buttons[1].addEventListener('click', function (e) {
      if (isMobile()) return;

      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();

      var cards = getCards(row);
      if (!cards.length) return;

      var index = nearestCardIndex(row, cards);
      scrollToCard(row, cards[Math.min(cards.length - 1, index + 1)]);
    }, true);
  }

  function init() {
    var root = document.querySelector('.ads-city-clean-landing-v2');
    if (!root) return;

    var navs = root.querySelectorAll('.ads-city-v2-carousel-nav');
    navs.forEach(bindNav);
  }

  ready(function () {
    init();
    setTimeout(init, 300);
    setTimeout(init, 1000);
    setTimeout(init, 2000);
  });
})();
/* === TEST: CAROUSEL EXACT CARD SCROLL END === */
