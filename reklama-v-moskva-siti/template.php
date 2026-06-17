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
      <p class="ads-city-eyebrow">Москва-Сити · Наружная и digital-реклама</p>
      <h1 class="ads-city-h1">Реклама на медиафасадах и digital-экранах в Москва-Сити</h1>
      <p class="ads-city-lead">Подберём рекламные поверхности в Москва-Сити под вашу задачу: медиафасады, digital-экраны, indoor-реклама, промоакции и комплексные размещения.</p>
      <div class="ads-city-hero__cta">
        <a class="ads-city-btn ads-city-btn--primary" href="#ads-city-calc">Получить расчёт</a>
        <a class="ads-city-btn ads-city-btn--ghost" href="tel:+74951234567"><svg aria-hidden="true"><use href="#ac-phone"/></svg> Позвонить</a>
      </div>
    </div>
  </header>

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

  <!-- 5. КЛЮЧЕВЫЕ РЕКЛАМНЫЕ ПОВЕРХНОСТИ -->
  <section class="ads-city-section" aria-labelledby="ac-surf-t">
    <div class="ads-city__wrap">
      <div class="ads-city-head"><p class="ads-city-eyebrow">Поверхности</p><h2 class="ads-city-h2" id="ac-surf-t">Ключевые рекламные поверхности в Москва-Сити</h2>
        <p class="ads-city-sub">Показываем несколько самых заметных форматов размещения: медиакубы, высотные медиафасады и экраны с большим охватом деловой аудитории.</p></div>
      <div class="ads-city-surfaces">

        <article class="ads-city-surf">
          <div class="ads-city-surf__media">
            <picture><source srcset="/upload/ads-city/surf-catcher.webp" type="image/webp"><img class="ads-city-surf__img" src="/upload/ads-city/surf-catcher.jpg" alt="Медиакуб «Кэтчер» возле башен «Город Столиц», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"></picture>
            <span class="ads-city-surf__badge">Медиакуб</span>
          </div>
          <div class="ads-city-surf__body">
            <h3 class="ads-city-surf__name">Медиакуб «Кэтчер» / Catcher</h3>
            <ul class="ads-city-surf__meta">
              <li><span>Локация</span><b>У башен «Город Столиц»</b></li>
              <li><span>Формат</span><b>Медиакуб</b></li>
              <li><span>Площадь</span><b>304 м²</b></li>
            </ul>
            <p class="ads-city-surf__desc">Отдельно стоящий медиакуб рядом с «Городом Столиц»: трансляция на четыре стороны света. Подходит для имиджевых кампаний, запусков брендов и заметных городских сообщений.</p>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Медиакуб Кэтчер">Получить расчёт</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media">
            <picture><source srcset="/upload/ads-city/surf-eurasia.webp" type="image/webp"><img class="ads-city-surf__img" src="/upload/ads-city/surf-eurasia.jpg" alt="3D-медиакуб у башни «Евразия», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"></picture>
            <span class="ads-city-surf__badge">3D-медиакуб</span>
          </div>
          <div class="ads-city-surf__body">
            <h3 class="ads-city-surf__name">3D-медиакуб у башни «Евразия»</h3>
            <ul class="ads-city-surf__meta">
              <li><span>Локация</span><b>У башен «Евразия» и «Федерация»</b></li>
              <li><span>Формат</span><b>3D-медиакуб</b></li>
              <li><span>Площадь</span><b>370 м²</b></li>
              <li><span>Охват</span><b>&gt; 185 000 / сутки</b></li>
            </ul>
            <p class="ads-city-surf__desc">Эффектный 3D-формат для ярких роликов, презентаций продуктов, мероприятий и премиальных кампаний — когда нужен визуальный wow-эффект.</p>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="3D медиакуб Евразия">Получить расчёт</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media">
            <picture><source srcset="/upload/ads-city/surf-mercury.webp" type="image/webp"><img class="ads-city-surf__img" src="/upload/ads-city/surf-mercury.jpg" alt="Высотный медиафасад башни «Меркурий», Москва-Сити" loading="lazy" decoding="async" width="800" height="500"></picture>
            <span class="ads-city-surf__badge">Медиафасад</span>
          </div>
          <div class="ads-city-surf__body">
            <h3 class="ads-city-surf__name">Медиафасад башни «Меркурий»</h3>
            <ul class="ads-city-surf__meta">
              <li><span>Локация</span><b>Башня «Меркурий»</b></li>
              <li><span>Формат</span><b>Высотный медиафасад</b></li>
              <li><span>Площадь</span><b>1350 м² · 60–68 этаж</b></li>
            </ul>
            <p class="ads-city-surf__desc">Один из самых заметных высотных медиафасадов Сити. Видимость с набережной, Нового Арбата, ТТК, Кутузовского проспекта и центральных направлений Москвы.</p>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Медиафасад Меркурий">Получить расчёт</a>
          </div>
        </article>

        <article class="ads-city-surf">
          <div class="ads-city-surf__media">
            <picture><source srcset="/upload/ads-city/surf-severnaya.webp" type="image/webp"><img class="ads-city-surf__img" src="/upload/ads-city/surf-severnaya.jpg" alt="Вертикальный медиафасад Северной Башни, Москва-Сити" loading="lazy" decoding="async" width="800" height="500"></picture>
            <span class="ads-city-surf__badge">Вертикальный экран</span>
          </div>
          <div class="ads-city-surf__body">
            <h3 class="ads-city-surf__name">Северная Башня</h3>
            <ul class="ads-city-surf__meta">
              <li><span>Локация</span><b>Северная Башня</b></li>
              <li><span>Формат</span><b>Вертикальный экран / медиафасад</b></li>
              <li><span>Охват</span><b>&gt; 1 000 000 / сутки</b></li>
            </ul>
            <p class="ads-city-surf__desc">Экран с сильным охватом автомобильного и пешеходного трафика. Для крупных кампаний, которым нужна высокая заметность на въездах и транспортных артериях Сити.</p>
            <a class="ads-city-btn ads-city-btn--primary ads-city-surf__cta" href="#ads-city-calc" data-ads-surface="Северная Башня">Получить расчёт</a>
          </div>
        </article>

      </div>

      <div class="ads-city-surfaces-foot">
        <p>Это не полный список доступных поверхностей. Подберём формат под задачу, период кампании и бюджет.</p>
        <a class="ads-city-btn ads-city-btn--ghost" href="#ads-city-calc">Подобрать поверхность для рекламы</a>
      </div>
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
      <div class="ads-city-head"><p class="ads-city-eyebrow">Локация</p><h2 class="ads-city-h2" id="ac-why-t">Почему Москва-Сити</h2></div>
      <div class="ads-city-why">
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-users"/></svg><div><b>Высокая концентрация деловой аудитории</b><span>Топ-менеджмент, резиденты и сотрудники башен ежедневно.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-star"/></svg><div><b>Премиальный городской контекст</b><span>Современная архитектура усиливает восприятие бренда.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-eye"/></svg><div><b>Видимость для пешего и авто-трафика</b><span>Резиденты, гости и плотный автомобильный поток.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-building"/></svg><div><b>Ассоциация с масштабом и статусом</b><span>Современный город как фон для сообщения бренда.</span></div></div>
        <div class="ads-city-why__row"><svg aria-hidden="true"><use href="#ac-rocket"/></svg><div><b>Формат для имиджа и громких запусков</b><span>Идеально для премьер, анонсов и репутационных кампаний.</span></div></div>
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
    <div class="ads-city__wrap" style="max-width:920px">
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
