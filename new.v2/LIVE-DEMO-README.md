# LIVE-DEMO — живая тестовая версия в `/new.v2/`

PHP-слой поверх дизайна **Obsidian Atlas**. Выглядит как прототип, но объекты
тянутся из Bitrix (`IBLOCK_ID = 10`). **Боевой сайт не трогается** —
подключается только ядро (`prolog_before.php`), без боевого header/footer.

## 1. Файлы (залить поверх `/new.v2/`)

```
/new.v2/_live-lib.php               ← библиотека (ОБЯЗАТЕЛЬНО)
/new.v2/live.php                    ← живая главная
/new.v2/object-live.php             ← живая карточка (?id=)
/new.v2/arenda-apartamentov-live.php
/new.v2/arenda-ofisov-live.php
/new.v2/prodazha-apartamentov-live.php
/new.v2/prodazha-ofisov-live.php
/new.v2/live-filter-debug.php       ← debug значений DEAL/DEST (noindex)
/new.v2/index.html                  ← статика главной (обновлён блок «Актуальные варианты»)
/new.v2/LIVE-DEMO-README.md
/new.v2/assets/...                  ← app.css (+ .segment-card), tokens.css, app.js, hero/, segments/
```

Старые HTML-файлы прототипа не удалялись.

## 2. URL для проверки

- `/new.v2/live.php`
- `/new.v2/object-live.php?id=44163`
- `/new.v2/arenda-apartamentov-live.php` — **аренда + апартаменты**
- `/new.v2/arenda-ofisov-live.php` — **аренда + офисы**
- `/new.v2/prodazha-apartamentov-live.php` — **продажа + апартаменты**
- `/new.v2/prodazha-ofisov-live.php` — **продажа + офисы**
- `/new.v2/live-filter-debug.php` — проверить реальные значения свойств

## 3. Preset-фильтры (серверные, через `CIBlockElement::GetList`)

Фильтрация на стороне Bitrix (НЕ на JS). Каждая страница вызывает
`mco_render_live($MCO_PRESET)`, где preset:

| Страница | Preset |
|---|---|
| `arenda-apartamentov-live.php` | `["deal"=>"rent","type"=>"apartment"]` |
| `arenda-ofisov-live.php` | `["deal"=>"rent","type"=>"office"]` |
| `prodazha-apartamentov-live.php` | `["deal"=>"sale","type"=>"office→apartment"]` |
| `prodazha-ofisov-live.php` | `["deal"=>"sale","type"=>"office"]` |
| `live.php` (главная) | `["limit"=>6]` — последние активные |

Preset → фильтр Bitrix строит функция `getLiveObjects()` в `_live-lib.php`.

### Какие значения свойств используются (конфиг в `_live-lib.php` → `$MCO_CFG`)
- Свойство сделки: **`PROPERTY_DEAL`** — значения: аренда → `аренда`;
  продажа → `продажа` (плюс варианты написания).
- Свойство типа: **`PROPERTY_DEST`** — апартаменты → `апартаменты`/`квартира`;
  офисы → `офис`/`офисы`.
- Фильтр умный: если свойство — **список (enum)**, функция сама находит ID
  значения по тексту (`CIBlockPropertyEnum`); если строка — фильтрует по тексту.

**Важно:** значения выше — предполагаемые. Откройте
`/new.v2/live-filter-debug.php` — он покажет реальные значения `DEAL`/`DEST`
и их тип. Если они отличаются — впишите реальные в `$MCO_CFG` (массивы
`deal` и `dest`) в `_live-lib.php`. Больше нигде править не нужно.

## 4. Ссылки карточек

В демо **все карточки объектов ведут на** `/new.v2/object-live.php?id=ID`
(чтобы оставаться внутри демо). Это задаётся одним параметром
`$MCO_CFG['detail_url']` в `_live-lib.php`.

**Для боевого внедрения** поменяйте там же:
```php
'detail_url' => '/realestate/%d/',
```
и все карточки сразу станут вести на реальные страницы объектов.

## 5. Блок «Актуальные варианты» (4 карточки с фото)

Карточки переведены в компонент `.segment-card` (тёмные, с приглушённым
фото и overlay, в стиле Obsidian, без glow). Фото — `loading="lazy"`,
карточка кликабельна целиком, на мобиле — в одну колонку.

Изображения (замените на тематические, размер ~1600×1100, тёмные/приглушённые):

```
/new.v2/assets/segments/rent-apartments.jpg   — премиальные апартаменты / интерьер / видовое окно
/new.v2/assets/segments/rent-offices.jpg      — современный офис / переговорная / бизнес-пространство
/new.v2/assets/segments/sale-apartments.jpg   — видовые апартаменты / жилая башня / интерьер
/new.v2/assets/segments/sale-offices.jpg      — офисная башня / деловое пространство / skyline Сити
```

Сейчас там временные плейсхолдеры (кадры Сити). Просто положите свои файлы
с теми же именами — разметку и CSS менять не нужно.

Ссылки карточек: статика (`index.html`) → `*.html`; live (`live.php`) →
`*-live.php`.

## 6. Безопасность
Всё через `htmlspecialchars`; `id` → `intval`; проверка модуля `iblock`;
проверка фото перед `CFile::GetPath`; пустые поля пропускаются; без SQL;
без правок настроек/прод-файлов; `display_errors` выключен на демо-страницах;
debug закрыт `noindex,nofollow` и только читает данные.

## 7. Что НЕЛЬЗЯ трогать
`/index.php`, `/realestate/`, `/local/templates/site2/`, `/local/components/`,
`/urlrewrite.php`, `/bitrix/.settings.php`, `/dbconn.php`, `/.htaccess`.
Демо в `/new.v2/` ничего из этого не меняет.

## 8. Если что-то не выводится
1. **Пустой блок / комментарий «модуль iblock недоступен»** — открыто не на
   боевом Bitrix. Проверять только на сервере.
2. **На каталоге пусто, а на главной объекты есть** — preset-значения
   `DEAL`/`DEST` не совпали. Откройте `live-filter-debug.php`, возьмите
   реальные значения и впишите в `$MCO_CFG` (`_live-lib.php`).
3. **Нет фото объектов** — проверьте код свойства `PHOTO` (тип «Файл»). Пока
   нет — показываются заглушки из `/new.v2/assets/hero/`.
4. **Нет цены/площади/башни** — другие коды свойств; замените
   `PRICE/TOTAL_PRICE/KVAD/TOWER/FLOOR_/ADRESS` в `_live-lib.php`.
5. **«Объект не найден»** — объект не активен / не в инфоблоке 10 / неверный id.

## Кодировка (принудительный UTF-8)

Если ядро Bitrix работает в `windows-1251`, данные из инфоблока приходят в 1251
и на UTF-8-страницах были бы «кракозябры». Решено на всех уровнях:

1. **Серверный заголовок** в каждом live-PHP — `header('Content-Type: text/html;
   charset=UTF-8')` до вывода и повторно после подключения ядра.
2. **Конвертация данных** — `live_to_utf8()` в `_live-lib.php`: уже-UTF-8 строки
   не трогает, 1251 переводит в UTF-8 (`iconv`/`mb_convert_encoding`), числа и
   пустые значения не ломает. Все поля объектов прогоняются через неё. Хелпер
   `live_e()` = конвертация + `htmlspecialchars`.
3. **`.htaccess`** в `/new.v2/` — `AddDefaultCharset UTF-8`, `X-Robots-Tag
   noindex` на папку; `Content-Type: text/html; charset=UTF-8` задаётся **только
   для `.php`** (через `FilesMatch`), чтобы не сломать отдачу css/js/изображений.
4. **`<meta charset="UTF-8">`** есть в `<head>` каждой страницы.
5. Все файлы сохранены в **UTF-8 без BOM**.

Диагностика: **`/new.v2/charset-test.php`** — покажет `LANG_CHARSET` ядра и
тестовый русский текст. Если ядро в 1251 — конвертация уже включена, текст на
live-страницах будет корректным.

## Для боевого внедрения (потом)
- `detail_url` → `/realestate/%d/`.
- Preset-фильтры перенести в компонент `mco:element.list` (см. `BITRIX-MAP.md`,
  `COMPONENTS-MAP.md`).
- Заменить плейсхолдеры сегментов на тематические фото.
