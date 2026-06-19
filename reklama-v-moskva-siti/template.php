<?php
/* =========================================================================
   Страница: /reklama-v-moskva-siti/  (Bitrix). URL и SEO-база сохраняются.
   Вставлять ТОЛЬКО контент между header.php и footer.php — шаблон не трогаем.
   ВНИМАНИЕ: перед заменой сверьте текущие title/description в админке и
   не ухудшайте их. H1 — ровно один (в hero ниже); если шаблон печатает <h1>
   из SetTitle, отключите его для этой страницы.
   ========================================================================= */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->SetPageProperty("title", "Реклама на медиафасадах в Москва-Сити — digital-экраны и размещение для брендов");
$APPLICATION->SetPageProperty("description", "Размещение рекламы в Москва-Сити: медиафасады, digital-экраны, indoor-реклама, промоакции и комплексные кампании. Подберём формат, период и рассчитаем стоимость.");
$APPLICATION->SetPageProperty("canonical", "https://moscow-city.online/reklama-v-moskva-siti/");

// CSS/JS подключаем без дублей. Положите файлы в /local/ и при желании вынесите в шаблон.
$APPLICATION->SetAdditionalCSS("/local/ads-city/ads-city.css");
$APPLICATION->AddHeadScript("/local/ads-city/ads-city.js");
?>

<!-- SVG-спрайт (иконки, без эмодзи) -->
<svg width="0" height="0" aria-hidden="true" focusable="false" style="position:absolute">
  <symbol id="ac-facade" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="4" y="3" width="16" height="18" rx="1"/><path d="M8 7h8M8 11h8M8 15h5"/></symbol>
  <symbol id="ac-screen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M9 21h6M12 17v4"/></symbol>
  <symbol id="ac-indoor" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 21V8l8-5 8 5v13"/><rect x="9" y="13" width="6" height="8"/></symbol>
  <symbol id="ac-promo" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 11l16-7v16L3 13z"/><path d="M3 11v2"/></symbol>
  <symbol id="ac-mail" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/></symbol>
  <symbol id="ac-layers" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3l9 5-9 5-9-5 9-5zM3 13l9 5 9-5"/></symbol>
  <symbol id="ac-rocket" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M5 15c-1 1-1 4-1 4s3 0 4-1m6-12c3 0 5 2 5 5 0 4-5 8-8 9-1-3 1-9 3-14z"/><circle cx="14.5" cy="9.5" r="1.5"/></symbol>
  <symbol id="ac-star" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3l2.6 5.6 6.1.7-4.5 4.1 1.2 6L12 16.9 6.6 19.4l1.2-6L3.3 9.3l6.1-.7z"/></symbol>
  <symbol id="ac-building" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="5" y="3" width="14" height="18"/><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"/></symbol>
  <symbol id="ac-eye" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="2.5"/></symbol>
  <symbol id="ac-users" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="9" cy="8" r="3"/><path d="M3 20c0-3 3-5 6-5s6 2 6 5M16 6a3 3 0 010 6"/></symbol>
  <symbol id="ac-phone" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M6 3h3l1.5 5-2 1.5a12 12 0 006 6l1.5-2 5 1.5v3a2 2 0 01-2 2A16 16 0 014 5a2 2 0 012-2z"/></symbol>
  <symbol id="ac-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="ac-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12l5 5L20 6"/></symbol>
</svg>

<div class="ads-city" id="ads-city">

  <!-- 1. HERO -->
  <header class="ads-city-hero">
    <picture>
      <source srcset="/upload/ads-city/hero.webp" type="image/webp">
      <img class="ads-city-hero__img" src="/upload/ads-city/hero.jpg" alt="Медиафасады и digital-экраны Москва-Сити вечером" width="1920" height="1080" fetchpriority="high" decoding="async">
    </picture>
    <div class="ads-city__wrap">
      <div class="ads-city-hero__content">
        <p class="ads-city-eyebrow">Москва-Сити · Наружная и digital-реклама</p>
        <h1 class="ads-city-h1">Реклама на медиафасадах и digital-экранах в Москва-Сити</h1>
        <p class="ads-city-lead">Медиафасады, digital-экраны, indoor и промо. Подберём форматы под задачу и рассчитаем стоимость размещения.</p>
        <div class="ads-city-hero__cta">
          <a class="ads-city-btn ads-city-btn--primary" href="#ads-city-calc">Получить расчёт</a>
          <a class="ads-city-btn ads-city-btn--ghost" href="tel:+74951234567"><svg aria-hidden="true"><use href="#ac-phone"/></svg> Позвонить</a>
        </div>
        <ul class="ads-city-hero__points">
          <li>Подбор поверхностей под задачу</li>
          <li>Расчёт стоимости за 1 день</li>
          <li>Сопровождение под ключ</li>
        </ul>
      </div>
    </div>
  </header>

  <!-- 5. РЕКЛАМНЫЕ ПОВЕРХНОСТИ -->
  <section class="ads-city-section" aria-labelledby="ac-surf-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head">
        <p class="ads-city-eyebrow">Поверхности</p>
        <h2 class="ads-city-h2" id="ac-surf-t">Рекламные поверхности в Москва-Сити</h2>
        <p class="ads-city-sub">Каталог медиафасадов, медиакубов, indoor-экранов, пилларов и площадок в ТЦ — с ориентировочными ценами «от&nbsp;… ₽&nbsp;/&nbsp;день».</p>
      </div>

      <!-- 5.1 Избранные поверхности -->
      <h3 class="ads-city-surf-subhead">Избранные поверхности</h3>
      <div class="ads-city-surfaces">

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/mediacube-catcher.jpg" alt="Медиакуб «Кэтчер» (Catcher), Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Медиакуб</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Медиакуб «Кэтчер» (Catcher)</h4>
            <p class="ads-city-surf__loc">У башен «Город Столиц»</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Медиакуб</b></li><li><span>Экраны</span><b>1</b></li><li><span>Размер</span><b>15×5 м</b></li><li><span>OTS / сутки</span><b>110 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>288</b></li></ul>
            <p class="ads-city-surf__desc">Отдельно стоящий медиакуб у «Города Столиц»: трансляция на четыре стороны света.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 120 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Медиакуб «Кэтчер» (Catcher)">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/mediacube-eurasia.jpg" alt="3D-медиакуб «Евразия», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Медиакуб</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">3D-медиакуб «Евразия»</h4>
            <p class="ads-city-surf__loc">Башня «Евразия»</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Медиакуб</b></li><li><span>Экраны</span><b>1</b></li><li><span>Размер</span><b>22,24 × 7,68 и две бегущи× строки 25,12 × 0,96 м</b></li><li><span>OTS / сутки</span><b>180 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>288</b></li></ul>
            <p class="ads-city-surf__desc">3D-медиакуб у «Евразии» и «Федерации» для запусков брендов и имиджевых кампаний.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 130 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="3D-медиакуб «Евразия»">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/oko2-mediafacade.jpg" alt="Медиафасад «ОКО-2», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Медиафасад</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Медиафасад «ОКО-2»</h4>
            <p class="ads-city-surf__loc">Башня «ОКО-2»</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Медиафасад</b></li><li><span>Экраны</span><b>1</b></li><li><span>Размер</span><b>50×25 м</b></li><li><span>OTS / сутки</span><b>256 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>288</b></li></ul>
            <p class="ads-city-surf__desc">Два фасадных экрана 50×25 м работают как единая поверхность для масштабных роликов.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 180 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Медиафасад «ОКО-2»">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/north-tower-south.jpg" alt="Северная Башня — Южный медиафасад, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Медиафасад</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Северная Башня — Южный медиафасад</h4>
            <p class="ads-city-surf__loc">Северная Башня</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Медиафасад</b></li><li><span>Экраны</span><b>1</b></li><li><span>Размер</span><b>12×24 м</b></li><li><span>OTS / сутки</span><b>108 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>288</b></li></ul>
            <p class="ads-city-surf__desc">Вертикальный медиафасад Северной Башни на ключевых транспортных артериях Сити.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 210 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Северная Башня — Южный медиафасад">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/north-tower-north.jpg" alt="Северная Башня — Северный медиафасад, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Медиафасад</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Северная Башня — Северный медиафасад</h4>
            <p class="ads-city-surf__loc">Северная Башня</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Медиафасад</b></li><li><span>Экраны</span><b>1</b></li><li><span>Размер</span><b>48×20 м</b></li><li><span>OTS / сутки</span><b>110 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>288</b></li></ul>
            <p class="ads-city-surf__desc">Крупнейший цифровой фасад Северной Башни для имиджевых кампаний с wow-эффектом.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 190 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Северная Башня — Северный медиафасад">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/federation-screens.jpg" alt="Башня «Федерация» — indoor-экраны, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Indoor</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Башня «Федерация» — indoor-экраны</h4>
            <p class="ads-city-surf__loc">Башня «Федерация»</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Indoor</b></li><li><span>Экраны</span><b>4</b></li><li><span>Размер</span><b>8×3 м</b></li><li><span>OTS / сутки</span><b>65 000</b></li><li><span>Время работы</span><b>24 часа</b></li><li><span>Ролик</span><b>10 сек</b></li><li><span>Показы / сутки</span><b>432</b></li></ul>
            <p class="ads-city-surf__desc">Крупные indoor-экраны в самой развитой башне Сити — высокий охват деловой аудитории.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 28 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — indoor-экраны">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/iq-quarter.jpg" alt="IQ-квартал — арт-объект, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">ТЦ</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">IQ-квартал — арт-объект</h4>
            <p class="ads-city-surf__loc">МФК «IQ-квартал»</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>ТЦ</b></li><li><span>Экраны</span><b>3</b></li><li><span>Размер</span><b>4,88 × 2,744 м</b></li><li><span>OTS / сутки</span><b>40 000</b></li><li><span>Время работы</span><b>07.00-00.00</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>408</b></li></ul>
            <p class="ads-city-surf__desc">Медиа арт-объект в МФК «IQ-квартал» — деловой кластер на въезде в Москва-Сити.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 26 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="IQ-квартал — арт-объект">Получить расчёт по поверхности</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media"><img class="ads-city-surf__img" src="/upload/ads-city/screens/street-pillars.jpg" alt="Уличные пиллары Москва-Сити, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-surf__badge">Пиллар</span></div>
          <div class="ads-city-surf__body">
            <h4 class="ads-city-surf__name">Уличные пиллары Москва-Сити</h4>
            <p class="ads-city-surf__loc">Москва-Сити, улица</p>
            <ul class="ads-city-surf__meta"><li><span>Тип</span><b>Пиллар</b></li><li><span>Экраны</span><b>13</b></li><li><span>Размер</span><b>1,0×2,5 м</b></li><li><span>OTS / сутки</span><b>150 000</b></li><li><span>Время работы</span><b>7:00 - 00:00</b></li><li><span>Ролик</span><b>15 сек</b></li><li><span>Показы / сутки</span><b>408</b></li></ul>
            <p class="ads-city-surf__desc">Сеть уличных пилларов Москва-Сити — пешеходный и автомобильный трафик делового центра.</p>
            <div class="ads-city-surf__price"><span class="ads-city-surf__price-label">Стоимость</span><span class="ads-city-surf__price-val">от 55 000 ₽ / день</span></div>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Уличные пиллары Москва-Сити">Получить расчёт по поверхности</a>
          </div>
        </article>

      </div>

      <!-- 5.2 Все поверхности + фильтры (без перезагрузки) -->
      <h3 class="ads-city-surf-subhead">Все поверхности</h3>
      <div class="ads-city-filters" role="group" aria-label="Фильтр поверхностей по типу">
        <button class="ads-city-filter" type="button" data-filter="all" aria-pressed="true">Все</button>
        <button class="ads-city-filter" type="button" data-filter="mediafasady" aria-pressed="false">Медиафасады</button>
        <button class="ads-city-filter" type="button" data-filter="mediakuby" aria-pressed="false">Медиакубы</button>
        <button class="ads-city-filter" type="button" data-filter="indoor" aria-pressed="false">Indoor</button>
        <button class="ads-city-filter" type="button" data-filter="pillary" aria-pressed="false">Пиллары</button>
        <button class="ads-city-filter" type="button" data-filter="tc" aria-pressed="false">ТЦ и галереи</button>
      </div>

      <div class="ads-city-catalog" id="ads-city-catalog">

        <article class="ads-city-cat" data-cat="mediafasady">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/north-tower-south.jpg" alt="Северная Башня — Южный медиафасад, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиафасад</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Северная Башня — Южный медиафасад</h4>
            <p class="ads-city-cat__loc">Северная Башня</p>
            <p class="ads-city-cat__specs">1 экр. · 12×24 м · OTS 108 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Вертикальный медиафасад Северной Башни на ключевых транспортных артериях Сити.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 210 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Северная Башня — Южный медиафасад">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediafasady">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/north-tower-north.jpg" alt="Северная Башня — Северный медиафасад, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиафасад</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Северная Башня — Северный медиафасад</h4>
            <p class="ads-city-cat__loc">Северная Башня</p>
            <p class="ads-city-cat__specs">1 экр. · 48×20 м · OTS 110 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Крупнейший цифровой фасад Северной Башни для имиджевых кампаний с wow-эффектом.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 190 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Северная Башня — Северный медиафасад">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediafasady">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/oko2-mediafacade.jpg" alt="Медиафасад «ОКО-2», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиафасад</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Медиафасад «ОКО-2»</h4>
            <p class="ads-city-cat__loc">Башня «ОКО-2»</p>
            <p class="ads-city-cat__specs">1 экр. · 50×25 м · OTS 256 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Два фасадных экрана 50×25 м работают как единая поверхность для масштабных роликов.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 180 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Медиафасад «ОКО-2»">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediafasady">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/north-tower-south.jpg" alt="Северная Башня — Южный горизонтальный медиафасад, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиафасад</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Северная Башня — Южный горизонтальный медиафасад</h4>
            <p class="ads-city-cat__loc">Северная Башня</p>
            <p class="ads-city-cat__specs">1 экр. · 48×20 м · OTS 170 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Горизонтальный медиафасад Северной Башни с максимальным охватом.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 290 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Северная Башня — Южный горизонтальный медиафасад">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediafasady">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/novotel-facades.jpg" alt="Медиафасады «Новотель», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиафасад</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Медиафасады «Новотель»</h4>
            <p class="ads-city-cat__loc">Гостиница «Новотель»</p>
            <p class="ads-city-cat__specs">2 экр. · 9×19,5 м · OTS 82 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Два медиафасада гостиницы «Новотель» с видимостью на ТТК и центр.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 90 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Медиафасады «Новотель»">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediakuby">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/mediacube-eurasia.jpg" alt="3D-медиакуб «Евразия», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиакуб</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">3D-медиакуб «Евразия»</h4>
            <p class="ads-city-cat__loc">Башня «Евразия»</p>
            <p class="ads-city-cat__specs">1 экр. · 22,24 × 7,68 и две бегущи× строки 25,12 × 0,96 м · OTS 180 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">3D-медиакуб у «Евразии» и «Федерации» для запусков брендов и имиджевых кампаний.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 130 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="3D-медиакуб «Евразия»">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediakuby">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/mediacube-catcher.jpg" alt="Медиакуб «Кэтчер» (Catcher), Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиакуб</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Медиакуб «Кэтчер» (Catcher)</h4>
            <p class="ads-city-cat__loc">У башен «Город Столиц»</p>
            <p class="ads-city-cat__specs">1 экр. · 15×5 м · OTS 110 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Отдельно стоящий медиакуб у «Города Столиц»: трансляция на четыре стороны света.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 120 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Медиакуб «Кэтчер» (Catcher)">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="mediakuby">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/oko-cube.jpg" alt="3D-медиакуб «ОКО», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Медиакуб</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">3D-медиакуб «ОКО»</h4>
            <p class="ads-city-cat__loc">Башня «ОКО»</p>
            <p class="ads-city-cat__specs">1 экр. · 10,5×5 м · ролик 15 сек</p>
            <p class="ads-city-cat__desc">3D-медиакуб у башни «ОКО» — объёмный формат для ярких роликов.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 75 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="3D-медиакуб «ОКО»">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-screens.jpg" alt="Башня «Федерация» — indoor-экраны, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — indoor-экраны</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">4 экр. · 8×3 м · OTS 65 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">Крупные indoor-экраны в самой развитой башне Сити — высокий охват деловой аудитории.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 28 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — indoor-экраны">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-screens.jpg" alt="Башня «Федерация» — главный холл, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — главный холл</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">4 экр. · 3×1 м · OTS 65 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Главный холл самой развитой башни Сити: эскалаторы, кофейни и вход к лифтам.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 15 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — главный холл">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/eurasia-federation.jpg" alt="«Евразия» + «Федерация» — вип-холл и галерея, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Евразия» + «Федерация» — вип-холл и галерея</h4>
            <p class="ads-city-cat__loc">Башни «Евразия» и «Федерация»</p>
            <p class="ads-city-cat__specs">6 экр. · 4×3; 2×2 м · OTS 60 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Две башни сразу: топ-менеджмент ВТБ в «Евразии» и высокий трафик резидентов «Федерации».</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 15 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Евразия» + «Федерация» — вип-холл и галерея">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-pylons.jpg" alt="Башня «Федерация» — 3D-пилоны, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — 3D-пилоны</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">5 экр. · 1,5×2;3×2 м · OTS 60 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">Входная группа и фронт «Федерации» — заметные 3D-пилоны на потоке резидентов.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 10 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — 3D-пилоны">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-lift-hall.jpg" alt="Башня «Федерация» — лифтовый холл, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — лифтовый холл</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">8 экр. · 3×1 м · OTS 45 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Экраны в лифтовых зонах «Федерации» — контакт с аудиторией в момент ожидания лифта.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 9 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — лифтовый холл">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/city-of-capitals-hall.jpg" alt="«Город Столиц» — южный вход, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Город Столиц» — южный вход</h4>
            <p class="ads-city-cat__loc">Башня «Город Столиц»</p>
            <p class="ads-city-cat__specs">1 экр. · 3×2 м · OTS 40 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Южный вход «Города Столиц» со стороны набережной.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 8 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Город Столиц» — южный вход">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/city-of-capitals-hall.jpg" alt="«Город Столиц» — входная группа, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Город Столиц» — входная группа</h4>
            <p class="ads-city-cat__loc">Башня «Город Столиц»</p>
            <p class="ads-city-cat__specs">1 экр. · 4×2 м · OTS 40 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Входная группа «Города Столиц»: холл, офисы и паркинг.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 8 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Город Столиц» — входная группа">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/city-of-capitals-hall.jpg" alt="Башня «На Набережной» — входная группа, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «На Набережной» — входная группа</h4>
            <p class="ads-city-cat__loc">Башня «На Набережной»</p>
            <p class="ads-city-cat__specs">1 экр. · 4×2 м · OTS 30 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Входная группа башни «На Набережной» в деловом ядре Сити.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 5 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «На Набережной» — входная группа">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/oko-hall.jpg" alt="Башня «ОКО» — главный холл, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «ОКО» — главный холл</h4>
            <p class="ads-city-cat__loc">Башня «ОКО»</p>
            <p class="ads-city-cat__specs">2 экр. · 2×4; 3×2 м · OTS 20 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Главный холл башни «ОКО» — один из ключевых деловых адресов Сити.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 11 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «ОКО» — главный холл">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-reception.jpg" alt="Башня «Федерация» — ресепшн и холл, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — ресепшн и холл</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">10 экр. · 1×1;3×1 м · OTS 45 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Ресепшн и холл «Федерации» — сеть экранов на основном пути посетителей.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 8 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — ресепшн и холл">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/federation-lifts.jpg" alt="Башня «Федерация» — лифты (44 экрана), Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Федерация» — лифты (44 экрана)</h4>
            <p class="ads-city-cat__loc">Башня «Федерация»</p>
            <p class="ads-city-cat__specs">44 экр. · 1,2×1 м · OTS 45 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">44 экрана в лифтах апартаментов, офисов, паркингов и пентхаусов «Федерации».</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 28 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Федерация» — лифты (44 экрана)">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/neva-lifts.jpg" alt="«Нева Тауэрс» — лифты, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Нева Тауэрс» — лифты</h4>
            <p class="ads-city-cat__loc">«Нева Тауэрс»</p>
            <p class="ads-city-cat__specs">12 экр. · 0,2×0,15 м · OTS 20 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">Экраны в лифтах «Нева Тауэрс» — частый контакт с резидентами.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 16 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Нева Тауэрс» — лифты">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/mercury-screens.jpg" alt="Башня «Меркурий» — холл, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Меркурий» — холл</h4>
            <p class="ads-city-cat__loc">Башня «Меркурий»</p>
            <p class="ads-city-cat__specs">5 экр. · 5×3 м · OTS 30 000 · ролик 60 сек</p>
            <p class="ads-city-cat__desc">Холл башни «Меркурий» — премиальная аудитория делового кластера.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 18 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Меркурий» — холл">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/mercury-screens.jpg" alt="Башня «Меркурий» — холл апартаментов, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Меркурий» — холл апартаментов</h4>
            <p class="ads-city-cat__loc">Башня «Меркурий»</p>
            <p class="ads-city-cat__specs">2 экр. · 5×3 м · OTS 1 200 · ролик 60 сек</p>
            <p class="ads-city-cat__desc">Холл апартаментов «Меркурий» — резиденты премиальной башни.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 10 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Меркурий» — холл апартаментов">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="indoor">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/empire-screens.jpg" alt="Башня «Империя» — 1 этаж, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Indoor</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Империя» — 1 этаж</h4>
            <p class="ads-city-cat__loc">Башня «Империя»</p>
            <p class="ads-city-cat__specs">5 экр. · 1,2×1,8 м · OTS 30 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Первый этаж башни «Империя» на основном потоке посетителей.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 17 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Империя» — 1 этаж">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="pillary">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/street-pillars.jpg" alt="Уличные пиллары Москва-Сити, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Пиллар</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Уличные пиллары Москва-Сити</h4>
            <p class="ads-city-cat__loc">Москва-Сити, улица</p>
            <p class="ads-city-cat__specs">13 экр. · 1,0×2,5 м · OTS 150 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Сеть уличных пилларов Москва-Сити — пешеходный и автомобильный трафик делового центра.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 55 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Уличные пиллары Москва-Сити">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="pillary">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/street-pillars.jpg" alt="Уличный сити-формат Москва-Сити, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Сити-формат</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Уличный сити-формат Москва-Сити</h4>
            <p class="ads-city-cat__loc">Москва-Сити, улица</p>
            <p class="ads-city-cat__specs">7 экр. · 1,0×1,75 м · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Уличный сити-формат Москва-Сити на пешеходных потоках.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">по запросу</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Уличный сити-формат Москва-Сити">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/iq-quarter.jpg" alt="IQ-квартал — арт-объект, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">ТЦ</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">IQ-квартал — арт-объект</h4>
            <p class="ads-city-cat__loc">МФК «IQ-квартал»</p>
            <p class="ads-city-cat__specs">3 экр. · 4,88 × 2,744 м · OTS 40 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Медиа арт-объект в МФК «IQ-квартал» — деловой кластер на въезде в Москва-Сити.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 26 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="IQ-квартал — арт-объект">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/city-of-capitals-gallery.jpg" alt="«Город Столиц» — галерея, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Галерея</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Город Столиц» — галерея</h4>
            <p class="ads-city-cat__loc">Башня «Город Столиц»</p>
            <p class="ads-city-cat__specs">5 экр. · 4×2 м · OTS 40 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Торговая галерея «Города Столиц» с потоком резидентов и гостей башен.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 16 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Город Столиц» — галерея">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/neva-gallery.jpg" alt="«Нева Тауэрс» — галерея (главный вход), Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Галерея</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Нева Тауэрс» — галерея (главный вход)</h4>
            <p class="ads-city-cat__loc">«Нева Тауэрс»</p>
            <p class="ads-city-cat__specs">1 экр. · 3×2 м · OTS 20 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">Главный вход и галерея МФК «Нева Тауэрс».</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 28 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Нева Тауэрс» — галерея (главный вход)">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/neva-gallery.jpg" alt="«Нева Тауэрс» — галерея (бизнес-центр), Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Галерея</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">«Нева Тауэрс» — галерея (бизнес-центр)</h4>
            <p class="ads-city-cat__loc">«Нева Тауэрс»</p>
            <p class="ads-city-cat__specs">1 экр. · 3×2 м · OTS 20 000 · ролик 10 сек</p>
            <p class="ads-city-cat__desc">Галерея бизнес-центра «Нева Тауэрс» на пути офисной аудитории.</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">по запросу</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="«Нева Тауэрс» — галерея (бизнес-центр)">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/empire-screens.jpg" alt="Башня «Империя» — торговая галерея, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">Галерея</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">Башня «Империя» — торговая галерея</h4>
            <p class="ads-city-cat__loc">Башня «Империя»</p>
            <p class="ads-city-cat__specs">1 экр. · 2,61×2,29 м · OTS 25 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Торговая галерея на −1 этаже «Империи».</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">от 9 000 ₽ / день</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="Башня «Империя» — торговая галерея">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

        <article class="ads-city-cat" data-cat="tc">
          <div class="ads-city-cat__media"><img class="ads-city-cat__img" src="/upload/ads-city/screens/iq-quarter.jpg" alt="IQ-квартал — медиаэкран, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"><span class="ads-city-cat__badge">ТЦ</span></div>
          <div class="ads-city-cat__body">
            <h4 class="ads-city-cat__name">IQ-квартал — медиаэкран</h4>
            <p class="ads-city-cat__loc">МФК «IQ-квартал»</p>
            <p class="ads-city-cat__specs">3 экр. · 1,2×1,8 м · OTS 40 000 · ролик 15 сек</p>
            <p class="ads-city-cat__desc">Медиаэкран в МФК «IQ-квартал».</p>
            <div class="ads-city-cat__foot">
              <span class="ads-city-cat__price">по запросу</span>
              <a class="ads-city-cat__cta" href="#ads-city-calc" data-ads-surface="IQ-квартал — медиаэкран">Расчёт <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a>
            </div>
          </div>
        </article>

      </div>

      <p class="ads-city-catalog-empty" data-catalog-empty hidden role="status" aria-live="polite">В этой категории пока нет поверхностей. Опишите задачу в форме — подберём формат вручную.</p>

      <p class="ads-city-price-note">Цены ориентировочные. Стоимость зависит от периода, хронометража ролика, доли эфира и доступности поверхности. Финальный расчёт подготовим после заявки.</p>

      <div class="ads-city-surfaces-foot">
        <p>Доступность поверхностей, сроки размещения, технические требования и точная стоимость уточняются под конкретную кампанию.</p>
        <a class="ads-city-btn ads-city-btn--ghost" href="#ads-city-calc">Подобрать поверхность для рекламы</a>
      </div>
    </div>
  </section>

  <!-- 5b. КАК СЧИТАЕТСЯ СТОИМОСТЬ -->
  <section class="ads-city-section ads-city-section--alt" aria-labelledby="ac-calc-how-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head">
        <p class="ads-city-eyebrow">Стоимость</p>
        <h2 class="ads-city-h2" id="ac-calc-how-t">Как считается стоимость размещения</h2>
        <p class="ads-city-sub">Финальная цена складывается из нескольких параметров — поэтому считаем индивидуально под задачу.</p>
      </div>
      <div class="ads-city-grid ads-city-grid--3">
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-building"/></svg></div><h3 class="ads-city-h3">Поверхность</h3><p>Тип и охват площадки: медиафасад, медиакуб, indoor-экран или сеть.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-screen"/></svg></div><h3 class="ads-city-h3">Хронометраж ролика</h3><p>10–60 секунд: чем длиннее ролик, тем выше стоимость одного выхода.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-star"/></svg></div><h3 class="ads-city-h3">Период размещения</h3><p>Количество дней и сезон кампании.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-layers"/></svg></div><h3 class="ads-city-h3">Доля эфира</h3><p>Сколько выходов в рекламном блоке принадлежит вашему ролику.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-eye"/></svg></div><h3 class="ads-city-h3">Количество показов</h3><p>Суммарные выходы и охват (OTS) за период размещения.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-promo"/></svg></div><h3 class="ads-city-h3">Скидки за объём</h3><p>Чем больше бюджет и срок размещения — тем выше скидка.</p></article>
      </div>
    </div>
  </section>

  <!-- 5c. УСЛОВИЯ РАЗМЕЩЕНИЯ -->
  <section class="ads-city-section" aria-labelledby="ac-terms-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head">
        <p class="ads-city-eyebrow">Условия</p>
        <h2 class="ads-city-h2" id="ac-terms-t">Условия размещения</h2>
        <p class="ads-city-sub">Прозрачные правила: от хронометража ролика до фотоотчёта о размещении.</p>
      </div>
      <div class="ads-city-grid ads-city-grid--3">
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Фиксированный рекламный блок</h3><p>Ролики выходят в одном фиксированном рекламном блоке по расписанию.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Хронометраж 10/15/20/25/30/60 сек</h3><p>Подбираем длительность ролика под формат поверхности.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Фотоотчёт о размещении</h3><p>После запуска присылаем фотоотчёт, подтверждающий показы.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Проверка макета</h3><p>Проверяем ролик на соответствие техническим требованиям площадки.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Скидки и бонусы за объём</h3><p>За объём и длительный период — скидки и дополнительные выходы.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-check"/></svg></div><h3 class="ads-city-h3">Зависит от доступного эфира</h3><p>Размещение планируется под свободный рекламный эфир на нужные даты.</p></article>
      </div>
    </div>
  </section>

  <!-- 3. КАКИЕ ЗАДАЧИ РЕШАЕМ -->
  <section class="ads-city-section" aria-labelledby="ac-tasks-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Задачи</p><h2 class="ads-city-h2" id="ac-tasks-t">Какие задачи решаем</h2></div>
      <div class="ads-city-grid ads-city-grid--3">
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-rocket"/></svg></div><h3 class="ads-city-h3">Запуск бренда или продукта</h3><p>Громкий старт с заметным охватом в деловом центре города.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-star"/></svg></div><h3 class="ads-city-h3">Имиджевая кампания</h3><p>Ассоциация бренда с масштабом и статусом Москва-Сити.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-building"/></svg></div><h3 class="ads-city-h3">Продвижение недвижимости</h3><p>Показ объектов и проектов платёжеспособной аудитории.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-promo"/></svg></div><h3 class="ads-city-h3">Анонс мероприятия</h3><p>Привлечение внимания к событию, премьере или открытию.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-users"/></svg></div><h3 class="ads-city-h3">Премиальная аудитория</h3><p>Контакт с топ-менеджментом, резидентами и гостями башен.</p></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-eye"/></svg></div><h3 class="ads-city-h3">Информирование в Сити</h3><p>Сообщения для резидентов и гостей делового кластера.</p></article>
      </div>
    </div>
  </section>

  <!-- 4. ФОРМАТЫ РЕКЛАМЫ -->
  <section class="ads-city-section ads-city-section--alt" aria-labelledby="ac-formats-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Форматы</p><h2 class="ads-city-h2" id="ac-formats-t">Форматы рекламы</h2></div>
      <div class="ads-city-grid ads-city-grid--3">
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-facade"/></svg></div><h3 class="ads-city-h3">Медиафасады</h3><p>Крупноформатные экраны на фасадах башен — максимальная видимость.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Медиафасад">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-screen"/></svg></div><h3 class="ads-city-h3">Digital-экраны</h3><p>Видеоэкраны в деловых башнях и общественных зонах.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Digital-экран">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-indoor"/></svg></div><h3 class="ads-city-h3">Indoor-реклама в башнях</h3><p>Холлы, лифтовые группы и входные зоны бизнес-центров.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Indoor">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-promo"/></svg></div><h3 class="ads-city-h3">Промоакции</h3><p>Активности и промо-зоны в проходимых точках Сити.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Промо">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-mail"/></svg></div><h3 class="ads-city-h3">Рассылки по резидентам</h3><p>Адресные коммуникации с аудиторией деловых башен.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Рассылка">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
        <article class="ads-city-card"><div class="ads-city-ico"><svg aria-hidden="true"><use href="#ac-layers"/></svg></div><h3 class="ads-city-h3">Комплексное размещение</h3><p>Связка форматов под единую кампанию и сценарий показа.</p><a class="ads-city-card__link" href="#ads-city-calc" data-ads-format="Комплексное">Уточнить условия <svg aria-hidden="true"><use href="#ac-arrow"/></svg></a></article>
      </div>
    </div>
  </section>

  <!-- 2. ФОРМА РАСЧЁТА (action -> ваш обработчик заявок, см. ads-lead.php / README) -->
  <section class="ads-city-section ads-city-section--alt" id="ads-city-calc" aria-labelledby="ac-calc-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head">
        <p class="ads-city-eyebrow">Расчёт за 1 день</p>
        <h2 class="ads-city-h2" id="ac-calc-t">Рассчитаем стоимость размещения</h2>
        <p class="ads-city-sub">Заполните бриф — подберём поверхности, период и форматы под задачу и бюджет.</p>
      </div>
      <form class="ads-city-form" data-ads-form action="/local/ads-city/ads-lead.php" method="post" autocomplete="on">
        <input type="hidden" name="service" value="[Реклама в Москва-Сити]">
        <input type="hidden" name="format_selected" data-ads-format-target value="">
        <div class="ads-city-form__grid">
          <div class="ads-city-field"><label for="ac-company">Компания / бренд</label>
            <input class="ads-city-input" id="ac-company" name="company" type="text" placeholder="Название" autocomplete="organization"></div>
          <div class="ads-city-field"><label for="ac-format">Формат рекламы</label>
            <select class="ads-city-select" id="ac-format" name="format"><option value="">Пока не знаю</option><option>Медиафасад</option><option>Digital-экран</option><option>Indoor</option><option>Промо</option></select></div>
          <div class="ads-city-field"><label for="ac-period">Период размещения</label>
            <input class="ads-city-input" id="ac-period" name="period" type="text" placeholder="Напр. 2 недели в сентябре"></div>
          <div class="ads-city-field"><label for="ac-creative">Готовый ролик</label>
            <select class="ads-city-select" id="ac-creative" name="creative"><option>Да</option><option>Нет</option><option>Нужна помощь с креативом</option></select></div>
          <div class="ads-city-field"><label for="ac-budget">Бюджет (если есть)</label>
            <input class="ads-city-input" id="ac-budget" name="budget" type="text" inputmode="numeric" placeholder="&#8381;"></div>
          <div class="ads-city-field"><label for="ac-name">Имя <span class="req">*</span></label>
            <input class="ads-city-input" id="ac-name" name="name" type="text" required autocomplete="name" placeholder="Как к вам обращаться"></div>
          <div class="ads-city-field ads-city-field--full"><label for="ac-phone">Телефон <span class="req">*</span></label>
            <input class="ads-city-input" id="ac-phone" name="phone" type="tel" required autocomplete="tel" inputmode="tel" placeholder="+7 ___ ___ __ __"></div>
        </div>
        <button class="ads-city-btn ads-city-btn--primary ads-city-form__submit" type="submit">Получить расчёт размещения</button>
        <p class="ads-city-form__note">Нажимая кнопку, вы соглашаетесь с политикой обработки персональных данных.</p>
        <div class="ads-city-form__ok" role="status" aria-live="polite"><strong>Заявка принята.</strong> Менеджер свяжется с вами и пришлёт расчёт.</div>
      </form>
    </div>
  </section>

  <!-- 6. КОМУ ПОДХОДИТ -->
  <section class="ads-city-section ads-city-section--alt" aria-labelledby="ac-fit-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Аудитория</p><h2 class="ads-city-h2" id="ac-fit-t">Кому подходит</h2></div>
      <div class="ads-city-chips">
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Премиальным брендам</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Девелоперам и недвижимости</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Автомобильным брендам</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Банкам и финтеху</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Ресторанам и клубам</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Организаторам мероприятий</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>Fashion и beauty</span>
        <span class="ads-city-chip"><svg aria-hidden="true"><use href="#ac-check"/></svg>B2B-сервисам</span>
      </div>
    </div>
  </section>

  <!-- 7. ПОЧЕМУ МОСКВА-СИТИ -->
  <section class="ads-city-section" aria-labelledby="ac-why-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Преимущества</p><h2 class="ads-city-h2" id="ac-why-t">Почему реклама в Москва-Сити</h2></div>
      <div class="ads-city-why">
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-users"/></svg><div><b>Качественная деловая аудитория</b><span>Топ-менеджмент, резиденты и сотрудники башен — ежедневно.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-star"/></svg><div><b>Репутация и статус бренда</b><span>Соседство с башнями Сити усиливает восприятие бренда.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-eye"/></svg><div><b>Высокая запоминаемость</b><span>Крупные форматы и 3D-поверхности отлично запоминаются.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-rocket"/></svg><div><b>Яркий современный формат</b><span>Медиафасады, медиакубы и digital-экраны вместо статичных щитов.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-building"/></svg><div><b>Высокая концентрация аудитории</b><span>Один из самых плотных деловых кластеров Европы.</span></div></div>
      </div>
    </div>
  </section>

  <!-- 8. КАК ЗАПУСКАЕМ -->
  <section class="ads-city-section ads-city-section--alt" aria-labelledby="ac-steps-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Процесс</p><h2 class="ads-city-h2" id="ac-steps-t">Как запускаем рекламу</h2></div>
      <div class="ads-city-steps">
        <div class="ads-city-step"><div class="ads-city-step__n">01</div><h3>Задача и аудитория</h3><p>Уточняем цель кампании и кого хотим охватить.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">02</div><h3>Поверхности и форматы</h3><p>Подбираем варианты под задачу и контекст.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">03</div><h3>Доступные даты</h3><p>Проверяем доступность на нужный период.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">04</div><h3>Расчёт стоимости</h3><p>Готовим смету по выбранным форматам.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">05</div><h3>Согласование материалов</h3><p>Проверяем ролик под требования поверхностей.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">06</div><h3>Запуск размещения</h3><p>Выводим кампанию в эфир по графику.</p></div>
        <div class="ads-city-step"><div class="ads-city-step__n">07</div><h3>Отчёт о размещении</h3><p>Передаём отчёт или подтверждение показа.</p></div>
      </div>
    </div>
  </section>

  <!-- 9. FAQ (Microdata FAQPage) -->
  <section class="ads-city-section" aria-labelledby="ac-faq-t">
    <div class="ads-city__wrap ads-city__wrap--narrow">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Вопросы</p><h2 class="ads-city-h2" id="ac-faq-t">Частые вопросы</h2></div>
      <div class="ads-city-faq" itemscope itemtype="https://schema.org/FAQPage">
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Сколько стоит реклама на медиафасаде в Москва-Сити?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Стоимость зависит от поверхности, периода, частоты показов и формата ролика. Рассчитываем смету индивидуально после брифа — оставьте заявку, и мы пришлём расчёт.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Можно ли разместить рекламу на один день?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да, в ряде случаев возможны короткие размещения. Минимальный период и доступность уточняются под конкретную поверхность и дату.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Какие форматы роликов подходят?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Технические требования (разрешение, соотношение сторон, длительность, кодек) зависят от выбранной поверхности. Передадим спецификацию под ваш формат.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Можно ли заказать создание креатива?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да. Поможем с роликом под требования площадки — от адаптации имеющихся материалов до производства с нуля.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Сколько времени занимает запуск рекламы?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Зависит от поверхности и готовности материалов. Точные сроки сообщаем после подбора форматов и согласования ролика.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Какие рекламные поверхности доступны?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Медиафасады, digital-экраны в башнях, indoor-поверхности в холлах, входные группы и промо-зоны. Доступность уточняется под конкретную кампанию.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Можно ли совместить медиафасад и indoor-рекламу?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да, это комплексное размещение: связываем несколько форматов в одну кампанию с единым сценарием показа.</div></div></details>
        <details class="ads-city-faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"><summary itemprop="name">Можно ли разместить рекламу для мероприятия или запуска продукта?</summary><div class="ads-city-faq__a" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"><div itemprop="text">Да — это один из самых частых сценариев: анонс события, премьера или громкий запуск с заметным охватом в деловом центре.</div></div></details>
      </div>
    </div>
  </section>

  <!-- 10. ФИНАЛЬНЫЙ CTA -->
  <section class="ads-city-section ads-city-final" aria-labelledby="ac-final-t">
    <div class="ads-city__wrap ads-city-final__inner">
      <div>
        <h2 class="ads-city-h2" id="ac-final-t">Хотите разместить рекламу в Москва-Сити?</h2>
        <p class="ads-city-lead">Оставьте заявку — подберём рекламные поверхности, период размещения и формат под вашу задачу.</p>
        <div class="ads-city-hero__cta">
          <a class="ads-city-btn ads-city-btn--primary" href="#ads-city-calc">Получить расчёт</a>
          <a class="ads-city-btn ads-city-btn--ghost" href="tel:+74951234567"><svg aria-hidden="true"><use href="#ac-phone"/></svg> Позвонить</a>
        </div>
      </div>
      <form class="ads-city-form" data-ads-form action="/local/ads-city/ads-lead.php" method="post" autocomplete="on">
        <input type="hidden" name="service" value="[Реклама в Москва-Сити]">
        <div class="ads-city-form__grid">
          <div class="ads-city-field"><label for="ac-fname">Имя <span class="req">*</span></label>
            <input class="ads-city-input" id="ac-fname" name="name" type="text" required autocomplete="name" placeholder="Ваше имя"></div>
          <div class="ads-city-field"><label for="ac-fphone">Телефон <span class="req">*</span></label>
            <input class="ads-city-input" id="ac-fphone" name="phone" type="tel" required autocomplete="tel" inputmode="tel" placeholder="+7 ___ ___ __ __"></div>
          <div class="ads-city-field ads-city-field--full"><label for="ac-fformat">Формат рекламы</label>
            <select class="ads-city-select" id="ac-fformat" name="format"><option value="">Пока не знаю</option><option>Медиафасад</option><option>Digital-экран</option><option>Indoor</option><option>Промо</option><option>Комплексное</option></select></div>
          <div class="ads-city-field ads-city-field--full"><label for="ac-fcomment">Комментарий</label>
            <textarea class="ads-city-textarea" id="ac-fcomment" name="comment" placeholder="Задача, период, бюджет"></textarea></div>
        </div>
        <button class="ads-city-btn ads-city-btn--primary ads-city-form__submit" type="submit">Получить расчёт</button>
        <div class="ads-city-form__ok" role="status" aria-live="polite"><strong>Заявка принята.</strong> Скоро свяжемся с вами.</div>
      </form>
    </div>
  </section>

</div>
