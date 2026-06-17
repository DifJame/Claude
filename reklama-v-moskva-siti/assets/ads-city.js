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
