<?php
/* ZHIVAYA DEMO (/new.v2/prodazha-apartamentov-live.php). Only READ from Bitrix. Production not touched:
   /bitrix/header.php and /bitrix/footer.php are NOT included. */
header('Content-Type: text/html; charset=UTF-8');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: text/html; charset=UTF-8');
@ini_set('display_errors', '0');
require_once(__DIR__ . "/_live-lib.php");

$MCO_PRESET = ["deal" => "sale", "type" => "apartment", "limit" => 9];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <title>Продажа апартаментов в Москва-Сити — Moscow-City.online</title>
  <meta name="description" content="Видовые апартаменты на продажу в башнях Москва-Сити: для жизни, статуса и долгосрочного владения. Актуальные лоты и подбор под задачу." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <script>(function(){try{document.documentElement.setAttribute('data-theme',localStorage.getItem('mco-theme')||'obsidian');}catch(e){document.documentElement.setAttribute('data-theme','obsidian');}})();</script>
  <link rel="stylesheet" href="/new.v2/assets/tokens.css?v=live1" />
  <link rel="stylesheet" href="/new.v2/assets/app.css?v=live1" />
</head>
<body>
  <!-- BITRIX:HEADER START · include header (шапка + меню + переключатель тем) -->
  <header class="header" id="header">
    <div class="wrap header__bar">
      <a href="live.php#top" class="brand">Moscow-City<span>.</span>online</a>
      <nav class="nav" aria-label="Главная навигация">
        <a href="live.php#catalog">Аренда и продажа</a>
        <a href="live.php#directions">Направления</a>
        <a href="live.php#scenarios">Сценарии</a>
        <a href="live.php#objects">Объекты</a>
        <a href="live.php#market">Рынок</a>
      </nav>
      <div class="header__right">
        <button class="theme-toggle" type="button" data-theme-toggle aria-label="Переключить тему">
          <span class="theme-toggle__dot" aria-hidden="true"></span>
          <span class="theme-toggle__label" data-theme-label>Obsidian</span>
        </button>
        <a class="header__phone mono" href="tel:+79998258888">+7 999 825 88 88</a>
        <button class="burger" id="burger" type="button" aria-label="Меню" aria-expanded="false" aria-controls="mobileMenu"><span></span></button>
      </div>
    </div>
  </header>
  <!-- BITRIX:HEADER END -->

  <!-- BITRIX:MOBILE-MENU START · повторяемый include -->
  <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <a href="live.php#catalog" data-menu-close>Аренда и продажа</a>
    <a href="live.php#directions" data-menu-close>Направления</a>
    <a href="live.php#scenarios" data-menu-close>Сценарии</a>
    <a href="live.php#objects" data-menu-close>Объекты</a>
    <a href="live.php#market" data-menu-close>Рынок</a>
    <button class="theme-toggle theme-toggle--mobile" type="button" data-theme-toggle aria-label="Переключить тему">
      <span class="theme-toggle__dot" aria-hidden="true"></span>
      <span class="theme-toggle__label" data-theme-label>Obsidian</span>
    </button>
  </div>

  <!-- BITRIX:MOBILE-MENU END -->

  <main id="top">
    <!-- BITRIX:HERO START -->
    <section class="dir-hero">
      <div class="wrap">
        <nav class="crumbs" aria-label="Хлебные крошки">
          <a href="live.php#catalog">Аренда и продажа</a> <span>→</span> Продажа апартаментов
        </nav>
        <div class="eyebrow"><span>01</span> Каталог · Продажа</div>
        <h1 class="dir-hero__title">Продажа апартаментов</h1>
        <p class="dir-hero__lede lede">Видовые апартаменты в башнях Москва-Сити для жизни, статуса и долгосрочного владения активом. Ниже актуальные лоты; закрытую базу пришлём под вашу задачу.</p>
        <div class="dir-facts">
          <div><span>В подборке</span><b>18</b><small>актуальных лотов</small></div>
          <div><span>Локация</span><b>Москва-Сити</b><small>Federation, OKO, Neva, Capital</small></div>
          <div><span>Формат</span><b>Видовые лоты</b><small>студии–3 спальни</small></div>
          <div><span>Сценарий</span><b>Жизнь · актив</b><small>владение и аренда</small></div>
        </div>
        <div class="hero__cta" style="margin-top:clamp(30px,4vw,44px)">
          <button class="btn btn--primary" type="button" data-modal-open data-selection="Продажа апартаментов">Подобрать лот</button>
          <a href="#objects" class="btn btn--ghost">Все объекты <span class="ar">→</span></a>
        </div>
      </div>
    </section>
    <!-- BITRIX:HERO END -->

    <!-- BITRIX:OBJECTS-LIST START -->
    <section class="section" id="objects" style="padding-top:clamp(20px,3vw,40px)">
      <div class="wrap">
        <div class="listings__top" data-reveal>
          <div>
            <div class="eyebrow"><span>02</span> Актуальные варианты</div>
            <h2 class="h2">Апартаменты на продажу</h2>
          </div>
          <button class="text-link" type="button" data-modal-open data-selection="Закрытая подборка · продажа апартаментов">Не нашли — пришлём закрытую подборку →</button>
        </div>
                <!-- TODO BITRIX FILTER (UI-chips): podklyuchit pozzhe. Server preset aktiven: prodazha + apartamenty. -->
        <!-- BITRIX-COMPONENT: mco:element.list (IBLOCK_ID=10) | fields: ID,NAME,PRICE,TOTAL_PRICE,KVAD,TOWER,FLOOR_,ADRESS,PHOTO,URL_DETAIL | FILTER: DEAL=sale & TYPE=apartment -->
        <div class="cards" id="cards">
<?php mco_render_live($MCO_PRESET); ?>
        </div>
      </div>
    </section>
    <!-- BITRIX:OBJECTS-LIST END -->

    <!-- BITRIX:SELECTION-CRITERIA START -->
    <section class="section section--alt">
      <div class="wrap method" data-reveal>
        <div>
          <div class="eyebrow"><span>03</span> Критерии подбора</div>
          <h2 class="h2">Как отбираем апартаменты к покупке</h2>
          <blockquote>При покупке считаем не только метры, но и ликвидность, право и экономику владения.</blockquote>
        </div>
        <div class="crit">
          <div class="crit__item"><span>01</span><div><h3>Локация и ликвидность</h3><p>Спрос, башня и перспектива адреса на годы вперёд.</p></div></div>
          <div class="crit__item"><span>02</span><div><h3>Этаж и вид</h3><p>Видовые характеристики, инсоляция, приватность.</p></div></div>
          <div class="crit__item"><span>03</span><div><h3>Право и история</h3><p>Чистота, структура сделки и история владения.</p></div></div>
          <div class="crit__item"><span>04</span><div><h3>Экономика владения</h3><p>Бюджет, налоги, расходы и потенциал аренды.</p></div></div>
        </div>
      </div>
    </section>
    <!-- BITRIX:SELECTION-CRITERIA END -->

    <!-- BITRIX:SCENARIOS START -->
    <section class="section">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <div class="eyebrow"><span>04</span> Сценарии</div>
          <h2 class="h2">Зачем покупают апартамент в Сити</h2>
        </div>
        <div class="support" data-reveal>
          <article><span>Для жизни</span><h3>Свой дом</h3><p>Видовая квартира для статусной жизни.</p></article>
          <article><span>Инвестиция</span><h3>Под аренду</h3><p>Лот с прогнозируемой ставкой и спросом.</p></article>
          <article><span>Капитал</span><h3>Сохранение</h3><p>Ликвидный адрес, который держит стоимость.</p></article>
          <article><span>Статус</span><h3>Знаковый объект</h3><p>Редкий лот с именем и историей.</p></article>
        </div>
      </div>
    </section>
    <!-- BITRIX:SCENARIOS END -->

    <!-- BITRIX:CONTACT-FORM START -->
    <section class="section final">
      <div class="wrap final__inner" data-reveal>
        <div>
          <div class="eyebrow"><span>05</span> Не нашли подходящий?</div>
          <h2 class="h2">Пришлём <em>закрытую</em> подборку</h2>
          <p>Опишите задачу — бюджет, башню, число спален и сроки. Подберём апартаменты из закрытой базы, посчитаем бюджет владения и согласуем показы. Первый разбор — без обязательств.</p>
        </div>
        <div class="final__form">
          <form id="finalForm" class="form" data-form="lead" data-source="prodazha-apartamentov:final" novalidate>
            <input type="hidden" name="source_page" value="prodazha-apartamentov">
            <label><span>Имя</span><input type="text" name="name" placeholder="Как к вам обращаться" required></label>
            <label><span>Телефон</span><input type="tel" name="phone" placeholder="+7 ___ ___ __ __" required></label>
            <label><span>Задача и бюджет</span><input type="text" name="interest" placeholder="Например: 2 спальни, Federation, до 200 млн"></label>
            <button class="btn btn--primary btn--block" type="submit">Получить подборку</button>
          </form>
        </div>
      </div>
    </section>
    <!-- BITRIX:CONTACT-FORM END -->
  </main>

  <!-- BITRIX:FOOTER START · include footer -->
  <footer class="footer">
    <div class="wrap footer__inner">
      <div>
        <b>Moscow-City.online</b>
        <p>Недвижимость со смыслом. Подбор, инвестиции и управление активами — Москва-Сити, Москва, Рублёвка, Крым, Дубай.</p>
      </div>
      <div>
        <div class="footer__col-title">Аренда и продажа</div>
        <a href="arenda-apartamentov-live.php">Аренда апартаментов</a><a href="arenda-ofisov-live.php">Аренда офисов</a><a href="prodazha-apartamentov-live.php">Продажа апартаментов</a><a href="prodazha-ofisov-live.php">Продажа офисов</a>
      </div>
      <div>
        <div class="footer__col-title">Контакты</div>
        <a href="tel:+79998258888">+7 999 825 88 88</a>
        <a href="https://wa.me/79998258888" target="_blank" rel="noopener">WhatsApp</a>
        <a href="https://t.me/+79998258888" target="_blank" rel="noopener">Telegram</a>
      </div>
      <div>
        <div class="footer__col-title">Компания</div>
        <a href="live.php#meaning">Подход</a><a href="live.php#method">Как мы отбираем</a><a href="live.php#process">Как работаем</a>
      </div>
    </div>
  </footer>
  <!-- BITRIX:FOOTER END -->

  <!-- BITRIX:LEAD-MODAL START · форма заявки (повторяемый include) -->
  <div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal__scrim" data-modal-close></div>
    <div class="modal__panel">
      <button class="modal__close" type="button" data-modal-close aria-label="Закрыть">×</button>
      <div class="modal__form" id="modalFormView">
        <div class="eyebrow eyebrow--plain"><span>—</span> Заявка</div>
        <h3 id="modalTitle">Подберём апартамент к покупке</h3>
        <p id="modalText">Оставьте контакты — пришлём актуальные лоты под вашу задачу и согласуем показы.</p>
        <form id="leadForm" class="form" data-form="lead" data-source="prodazha-apartamentov:modal" novalidate>
          <input type="hidden" name="selection" id="selectionName" value="Продажа апартаментов">
          <input type="hidden" name="source_page" value="prodazha-apartamentov">
          <label><span>Имя</span><input name="name" type="text" placeholder="Как к вам обращаться" required></label>
          <label><span>Телефон</span><input name="phone" type="tel" placeholder="+7 ___ ___ __ __" required></label>
          <label><span>Комментарий</span><textarea name="message" placeholder="Башня, бюджет, число спален, сроки"></textarea></label>
          <button class="btn btn--primary btn--block" type="submit">Отправить заявку</button>
        </form>
      </div>
      <div class="modal__success" id="modalSuccessView" hidden>
        <h3>Заявка принята</h3>
        <p id="modalSuccessText">Спасибо. Эксперт свяжется с вами в течение рабочего дня.</p>
        <button class="btn btn--ghost" type="button" data-modal-close>Закрыть</button>
      </div>
    </div>
  </div>

  <!-- BITRIX:LEAD-MODAL END -->
  <!-- BITRIX:FLOATING-WIDGET START -->
  <div class="floating" aria-label="Связаться">
    <a href="https://t.me/+79998258888" target="_blank" rel="noopener" aria-label="Telegram">TG</a>
    <a href="https://wa.me/79998258888" target="_blank" rel="noopener" aria-label="WhatsApp">WA</a>
  </div>

  <!-- BITRIX:FLOATING-WIDGET END -->
  <script src="/new.v2/assets/app.js?v=live1" defer></script>
</body>
</html>
