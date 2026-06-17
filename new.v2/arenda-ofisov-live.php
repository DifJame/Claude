<?php
/* ZHIVAYA DEMO (/new.v2/arenda-ofisov-live.php). Only READ from Bitrix. Production not touched:
   /bitrix/header.php and /bitrix/footer.php are NOT included. */
header('Content-Type: text/html; charset=UTF-8');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: text/html; charset=UTF-8');
@ini_set('display_errors', '0');
require_once(__DIR__ . "/_live-lib.php");

$MCO_PRESET = ["deal" => "rent", "type" => "office", "limit" => 9];

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <title>Аренда офисов в Москва-Сити — Moscow-City.online</title>
  <meta name="description" content="Офисные блоки и представительские этажи в аренду в башнях Москва-Сити: отделка, мебель, инженерия. Актуальные варианты и подбор под задачу." />
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
          <a href="live.php#catalog">Аренда и продажа</a> <span>→</span> Аренда офисов
        </nav>
        <div class="eyebrow"><span>01</span> Каталог · Аренда</div>
        <h1 class="dir-hero__title">Аренда офисов</h1>
        <p class="dir-hero__lede lede">Готовые офисные блоки и представительские этажи в башнях Москва-Сити — с отделкой, мебелью и инженерией. Ниже актуальные варианты; полную базу пришлём под вашу задачу.</p>
        <div class="dir-facts">
          <div><span>В подборке</span><b>11</b><small>актуальных блоков</small></div>
          <div><span>Локация</span><b>Москва-Сити</b><small>Federation, OKO, IQ, Neva</small></div>
          <div><span>Состояние</span><b>Отделка · мебель</b><small>готовы к въезду</small></div>
          <div><span>Площади</span><b>от 90 м²</b><small>блоки и этажи</small></div>
        </div>
        <div class="hero__cta" style="margin-top:clamp(30px,4vw,44px)">
          <button class="btn btn--primary" type="button" data-modal-open data-selection="Аренда офисов">Подобрать офис</button>
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
            <h2 class="h2">Офисы в аренду</h2>
          </div>
          <button class="text-link" type="button" data-modal-open data-selection="Закрытая подборка · аренда офисов">Не нашли — пришлём закрытую подборку →</button>
        </div>
                <!-- TODO BITRIX FILTER (UI-chips): podklyuchit pozzhe. Server preset aktiven: arenda + ofisy. -->
        <!-- BITRIX-COMPONENT: mco:element.list (IBLOCK_ID=10) | fields: ID,NAME,PRICE,TOTAL_PRICE,KVAD,TOWER,FLOOR_,ADRESS,PHOTO,URL_DETAIL | FILTER: DEAL=rent & TYPE=office -->
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
          <h2 class="h2">На что смотрим при подборе офиса в аренду</h2>
          <blockquote>В офисе важны класс здания, планировка и инженерия — то, что определяет работу команды и расходы.</blockquote>
        </div>
        <div class="crit">
          <div class="crit__item"><span>01</span><div><h3>Локация и класс здания</h3><p>Башня, этаж, входная группа, парковка и окружение.</p></div></div>
          <div class="crit__item"><span>02</span><div><h3>Планировка и инженерия</h3><p>Open space или кабинеты, вентиляция, выделенные мощности.</p></div></div>
          <div class="crit__item"><span>03</span><div><h3>Условия аренды</h3><p>Ставка, срок, индексация, отделка и мебель.</p></div></div>
          <div class="crit__item"><span>04</span><div><h3>Сервис и управление</h3><p>Эксплуатация, ресепшн, безопасность 24/7.</p></div></div>
        </div>
      </div>
    </section>
    <!-- BITRIX:SELECTION-CRITERIA END -->

    <!-- BITRIX:SCENARIOS START -->
    <section class="section">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <div class="eyebrow"><span>04</span> Сценарии</div>
          <h2 class="h2">Кому подходит офис в аренду</h2>
        </div>
        <div class="support" data-reveal>
          <article><span>Штаб-квартира</span><h3>Представительство</h3><p>Адрес и вид, которые работают на бренд.</p></article>
          <article><span>Рост команды</span><h3>Гибкий метраж</h3><p>Блок под текущий штат с запасом на рост.</p></article>
          <article><span>Релокация</span><h3>Быстрый старт</h3><p>Готовый офис с отделкой и мебелью.</p></article>
          <article><span>Филиал</span><h3>Точка в Сити</h3><p>Компактный блок для присутствия в деловом ядре.</p></article>
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
          <p>Опишите задачу — бюджет, башню, площадь и срок аренды. Подберём офисные блоки из закрытой базы и согласуем показы. Первый разбор — без обязательств.</p>
        </div>
        <div class="final__form">
          <form id="finalForm" class="form" data-form="lead" data-source="arenda-ofisov:final" novalidate>
            <input type="hidden" name="source_page" value="arenda-ofisov">
            <label><span>Имя</span><input type="text" name="name" placeholder="Как к вам обращаться" required></label>
            <label><span>Телефон</span><input type="tel" name="phone" placeholder="+7 ___ ___ __ __" required></label>
            <label><span>Задача и бюджет</span><input type="text" name="interest" placeholder="Например: 200 м², Federation, с мебелью"></label>
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
        <h3 id="modalTitle">Подберём офис в аренду</h3>
        <p id="modalText">Оставьте контакты — пришлём актуальные офисы под вашу задачу и согласуем показы.</p>
        <form id="leadForm" class="form" data-form="lead" data-source="arenda-ofisov:modal" novalidate>
          <input type="hidden" name="selection" id="selectionName" value="Аренда офисов">
          <input type="hidden" name="source_page" value="arenda-ofisov">
          <label><span>Имя</span><input name="name" type="text" placeholder="Как к вам обращаться" required></label>
          <label><span>Телефон</span><input name="phone" type="tel" placeholder="+7 ___ ___ __ __" required></label>
          <label><span>Комментарий</span><textarea name="message" placeholder="Башня, бюджет, срок, пожелания"></textarea></label>
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
