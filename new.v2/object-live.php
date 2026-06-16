<?php
/* ЖИВАЯ ДЕМО-карточка объекта (/new.v2/object-live.php?id=ID). Только ЧТЕНИЕ из Bitrix.
   Боевой сайт не трогаем: НЕ подключаем /bitrix/header.php и /bitrix/footer.php. */
header('Content-Type: text/html; charset=UTF-8');
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: text/html; charset=UTF-8'); // повторно после ядра (на случай 1251 в настройках Bitrix)
@ini_set('display_errors', '0');
require_once(__DIR__ . "/_live-lib.php");

$MCO_ID  = isset($_GET['id']) ? intval($_GET['id']) : 0;
$obj     = $MCO_ID > 0 ? mco_get_object($MCO_ID, 10) : null;
$found   = ($obj !== null);
$pageTitle = $found ? ($obj['name'] . ' — Moscow-City.online') : 'Объект не найден — Moscow-City.online';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <title><?= mco_h($pageTitle) ?></title>
  <meta name="description" content="Карточка объекта Moscow-City.online (живая демо-версия)." />
  <meta name="robots" content="noindex, nofollow" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <script>(function(){try{document.documentElement.setAttribute('data-theme',localStorage.getItem('mco-theme')||'obsidian');}catch(e){document.documentElement.setAttribute('data-theme','obsidian');}})();</script>
  <link rel="stylesheet" href="/new.v2/assets/tokens.css?v=live1" />
  <link rel="stylesheet" href="/new.v2/assets/app.css?v=live1" />
</head>
<body>
  <header class="header" id="header">
    <div class="wrap header__bar">
      <a href="/new.v2/live.php#top" class="brand">Moscow-City<span>.</span>online</a>
      <nav class="nav" aria-label="Главная навигация">
        <a href="/new.v2/live.php#directions">Направления</a>
        <a href="/new.v2/live.php#scenarios">Сценарии</a>
        <a href="/new.v2/live.php#catalog">Аренда и продажа</a>
        <a href="/new.v2/live.php#objects">Объекты</a>
        <a href="/new.v2/live.php#market">Рынок</a>
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

  <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <a href="/new.v2/live.php#directions" data-menu-close>Направления</a>
    <a href="/new.v2/live.php#scenarios" data-menu-close>Сценарии</a>
    <a href="/new.v2/live.php#catalog" data-menu-close>Аренда и продажа</a>
    <a href="/new.v2/live.php#objects" data-menu-close>Объекты</a>
    <a href="/new.v2/live.php#market" data-menu-close>Рынок</a>
    <button class="theme-toggle theme-toggle--mobile" type="button" data-theme-toggle aria-label="Переключить тему">
      <span class="theme-toggle__dot" aria-hidden="true"></span>
      <span class="theme-toggle__label" data-theme-label>Obsidian</span>
    </button>
  </div>

  <main id="top">
<?php if (!$found): ?>
    <!-- Объект не найден / некорректный ID -->
    <section class="dir-hero">
      <div class="wrap">
        <nav class="crumbs" aria-label="Хлебные крошки">
          <a href="/new.v2/live.php#objects">Объекты</a> <span>→</span> Объект не найден
        </nav>
        <div class="eyebrow"><span>—</span> Ошибка</div>
        <h1 class="dir-hero__title">Объект не найден</h1>
        <p class="dir-hero__lede lede">Запрошенный объект не существует, снят с публикации или указан неверный ID. Вернитесь к списку — подберём актуальные варианты.</p>
        <div class="hero__cta" style="margin-top:clamp(24px,3vw,36px)">
          <a href="/new.v2/live.php#objects" class="btn btn--primary">Ко всем объектам <span class="ar">→</span></a>
          <a href="/new.v2/live.php" class="btn btn--ghost">На главную</a>
        </div>
      </div>
    </section>
<?php else: ?>
<?php
  // summary (башня · этаж · площадь — без пустых)
  $sum = [];
  if ($obj['tower']  !== '') $sum[] = mco_h($obj['tower']);
  if ($obj['floor']  !== '') $sum[] = 'Этаж ' . mco_h($obj['floor']);
  if ($obj['kvad']   !== '') $sum[] = mco_h($obj['kvad']) . ' &#1084;&#178;';
  if ($obj['adress'] !== '') $sum[] = mco_h($obj['adress']);
  // галерея
  $photos = $obj['photos'];
  if (empty($photos)) { $photos = [mco_fallback(3), mco_fallback(0), mco_fallback(1)]; }
  $gMain  = $photos[0];
  $gSmall = array_slice($photos, 1, 2);
  $gExtra = max(0, count($photos) - 3);
  $sel = $obj['name'] . ' · #' . $obj['id'];
?>
    <section class="obj-hero">
      <div class="wrap">
        <nav class="crumbs" aria-label="Хлебные крошки">
          <a href="/new.v2/live.php#directions">Направления</a> <span>→</span>
          <a href="/new.v2/live.php#objects">Объекты</a> <span>→</span>
          <?= mco_h($obj['name']) ?>
        </nav>
        <div class="eyebrow"><span>01</span> <?php
          $ebparts = [];
          if ($obj['deal'] !== '') $ebparts[] = mco_h($obj['deal']);
          if ($obj['dest'] !== '') $ebparts[] = mco_h($obj['dest']);
          echo $ebparts ? implode(' <i>·</i> ', $ebparts) : 'Объект · Москва-Сити';
        ?></div>
        <h1 class="obj-title"><?= mco_h($obj['name']) ?></h1>
        <?php if (!empty($sum)): ?>
        <div class="obj-summary"><?= implode(' <i>·</i> ', $sum) ?></div>
        <?php endif; ?>

        <div class="obj-gallery" data-reveal aria-label="Галерея объекта">
          <figure><i style="background-image:url('<?= mco_h($gMain) ?>')"></i></figure>
          <?php foreach ($gSmall as $i => $ph): ?>
          <figure><i style="background-image:url('<?= mco_h($ph) ?>')"></i><?php if ($gExtra > 0 && $i === count($gSmall) - 1): ?><button class="more" type="button" data-modal-open data-selection="<?= mco_h('Все фото · ' . $sel) ?>">+<?= intval($gExtra) ?> фото</button><?php endif; ?></figure>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section" style="padding-top:clamp(20px,3vw,36px)">
      <div class="wrap obj-layout">
        <article class="obj-content">
          <div>
            <div class="obj-block-title">Описание</div>
            <div class="body">
              <?php $d = trim(strip_tags($obj['desc'])); if ($d !== ''): ?>
              <p><?= nl2br(mco_h($d)) ?></p>
              <?php else: ?>
              <p>Описание уточняется. Свяжитесь с экспертом — пришлём детали, планировку и условия по объекту.</p>
              <?php endif; ?>
            </div>
          </div>

          <?php if ($obj['kvad'] !== '' || $obj['floor'] !== ''): ?>
          <div>
            <div class="obj-block-title">Объект</div>
            <div class="obj-specs">
              <?php if ($obj['kvad']  !== ''): ?><div><span>Площадь</span><b><?= mco_h($obj['kvad']) ?> м²</b></div><?php endif; ?>
              <?php if ($obj['floor'] !== ''): ?><div><span>Этаж</span><b><?= mco_h($obj['floor']) ?></b></div><?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($obj['tower'] !== '' || $obj['adress'] !== ''): ?>
          <div>
            <div class="obj-block-title">Здание и локация</div>
            <div class="obj-specs">
              <?php if ($obj['tower']  !== ''): ?><div><span>Башня / ЖК</span><b><?= mco_h($obj['tower']) ?></b></div><?php endif; ?>
              <?php if ($obj['adress'] !== ''): ?><div><span>Адрес</span><b><?= mco_h($obj['adress']) ?></b></div><?php endif; ?>
            </div>
            <?php if ($obj['adress'] !== ''): ?>
            <div class="obj-map" style="margin-top:14px" aria-label="Карта локации (заглушка прототипа)">
              <span>Карта · <?= mco_h($obj['adress']) ?></span>
            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </article>

        <aside class="obj-aside" aria-label="Цена и контакт">
          <div class="obj-price-card">
            <div class="eyebrow eyebrow--plain"><span>—</span> Стоимость</div>
            <div class="obj-price"><?= $obj['price'] !== '' ? $obj['price'] : 'Цена по запросу' ?></div>
            <?php $meter = mco_meter($obj); if ($meter !== ''): ?>
            <div class="obj-meter"><?= mco_h($meter) ?></div>
            <?php endif; ?>
            <div class="broker">
              <div class="broker__ph" aria-hidden="true">MC</div>
              <div><b>Эксперт Moscow-City.online</b><span>Премиальная недвижимость</span></div>
            </div>
            <button class="btn btn--primary btn--block" type="button" data-modal-open data-selection="<?= mco_h('Просмотр · ' . $sel) ?>">Записаться на просмотр</button>
            <a class="btn btn--ghost btn--block" href="/new.v2/live.php#objects" style="margin-top:10px">Ко всем объектам</a>
            <div class="obj-trust">Демо-карточка <code>/new.v2/</code>. В бою откроется по адресу <span class="mono"><?= mco_h($obj['real_url']) ?></span></div>
          </div>
        </aside>
      </div>
    </section>

    <section class="section section--alt" id="similar">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <div class="eyebrow"><span>—</span> Похожие объекты</div>
          <h2 class="h2">Ещё из базы</h2>
        </div>
        <div class="cards" id="cards">
<?php mco_render_items(mco_get_similar($obj, 3)); ?>
        </div>
      </div>
    </section>
<?php endif; ?>
  </main>

  <footer class="footer">
    <div class="wrap footer__inner">
      <div>
        <b>Moscow-City.online</b>
        <p>Недвижимость со смыслом. Подбор, инвестиции и управление активами — Москва-Сити, Москва, Рублёвка, Крым, Дубай.</p>
      </div>
      <div>
        <div class="footer__col-title">Аренда и продажа</div>
        <a href="/new.v2/arenda-apartamentov-live.php">Аренда апартаментов</a><a href="/new.v2/arenda-ofisov-live.php">Аренда офисов</a><a href="/new.v2/prodazha-apartamentov-live.php">Продажа апартаментов</a><a href="/new.v2/prodazha-ofisov-live.php">Продажа офисов</a>
      </div>
      <div>
        <div class="footer__col-title">Контакты</div>
        <a href="tel:+79998258888">+7 999 825 88 88</a>
        <a href="https://wa.me/79998258888" target="_blank" rel="noopener">WhatsApp</a>
        <a href="https://t.me/+79998258888" target="_blank" rel="noopener">Telegram</a>
      </div>
      <div>
        <div class="footer__col-title">Демо</div>
        <a href="/new.v2/live.php">Главная (live)</a><a href="/new.v2/live.php#objects">Объекты</a>
      </div>
    </div>
  </footer>

  <div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal__scrim" data-modal-close></div>
    <div class="modal__panel">
      <button class="modal__close" type="button" data-modal-close aria-label="Закрыть">×</button>
      <div class="modal__form" id="modalFormView">
        <div class="eyebrow eyebrow--plain"><span>—</span> Заявка</div>
        <h3 id="modalTitle">Записаться на просмотр</h3>
        <p id="modalText">Оставьте контакты — эксперт согласует удобное время показа.</p>
        <form id="leadForm" class="form" data-form="lead" data-source="object-live:modal" novalidate>
          <input type="hidden" name="selection" id="selectionName" value="<?= $found ? mco_h($obj['name'] . ' · #' . $obj['id']) : 'Объект' ?>">
          <input type="hidden" name="source_page" value="object-live">
          <label><span>Имя</span><input name="name" type="text" placeholder="Как к вам обращаться" required></label>
          <label><span>Телефон</span><input name="phone" type="tel" placeholder="+7 ___ ___ __ __" required></label>
          <label><span>Комментарий</span><textarea name="message" placeholder="Удобное время, пожелания"></textarea></label>
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

  <div class="floating" aria-label="Связаться">
    <a href="https://t.me/+79998258888" target="_blank" rel="noopener" aria-label="Telegram">TG</a>
    <a href="https://wa.me/79998258888" target="_blank" rel="noopener" aria-label="WhatsApp">WA</a>
  </div>

  <script src="/new.v2/assets/app.js?v=live1" defer></script>
</body>
</html>
