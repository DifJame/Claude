# CHANGELOG — live-демо `/new.v2/` (presentation-ready)

Доведение live-демо до состояния «показать руководителю». Боевой сайт не
затрагивается; всё внутри `/new.v2/`.

## Изменено в этой итерации
- **Точка входа `/new.v2/`**: добавлен `index.php` (рендерит `live.php`) и
  `DirectoryIndex` + `Options -Indexes` в `.htaccess` — теперь при открытии
  `/new.v2/` сразу открывается live-демо, а не список файлов или `.md`.
- **Видео на hero** главной: фоновое `<video>` (`assets/hero/city-hero.mp4`,
  ~6.8 МБ, autoplay/muted/loop/playsinline) под тёмной вуалью — текст читаем,
  стиль Obsidian сохранён. Постер-фолбэк `slide-4.jpg`; при `prefers-reduced-motion`
  видео отключается. Лёгкий вес — быстрый старт. Применено к `live.php` и `index.html`.

- **Preset-фильтры аренда/продажа × тип** доведены и проверены: каждая
  каталожная страница тянет только релевантные лоты (сервер, не JS).
- **Карточка объекта `object-live.php`** усилена: показывает тип сделки и тип
  объекта (если заданы), «умные» похожие объекты.
- **Похожие объекты**: тот же тип (DEST), с исключением текущего ID; если
  совпадений нет — активные объекты без текущего. Все ссылки → `object-live.php`.
- **`live-filter-debug.php`** расширен: показывает по активным объектам
  ID, NAME, DEAL (VALUE / ENUM / XML_ID), DEST (VALUE / ENUM / XML_ID),
  PRICE, KVAD, TOWER + сводку уникальных значений.
- Добавлены `PRESENTATION-NOTES.md` (для руководителя) и этот `CHANGELOG.md`.
- Усилена ASCII-безопасность PHP-кода (символы → HTML-сущности), чтобы файлы
  не ломались при пересохранении в windows-1251.

## Фильтры (серверные, через `CIBlockElement::GetList`)
| Страница | Preset |
|---|---|
| `arenda-apartamentov-live.php` | deal=rent, type=apartment |
| `arenda-ofisov-live.php` | deal=rent, type=office |
| `prodazha-apartamentov-live.php` | deal=sale, type=apartment |
| `prodazha-ofisov-live.php` | deal=sale, type=office |
| `live.php` (главная) | последние активные (без сделки/типа) |

## Значения свойств `PROPERTY_DEAL` / `PROPERTY_DEST`
Конфиг в `_live-lib.php` → `$MCO_CFG`:
- `prop_deal = DEAL`, `prop_dest = DEST`.
- deal: rent → `аренда` (+ варианты); sale → `продажа` (+ варианты).
- dest: apartment → `апартаменты`/`квартира` (+ варианты); office → `офис`/`офисы`.
- Сопоставление умное: для свойств-списков (enum) ID значения находится по
  тексту автоматически; обе стороны нормализуются `live_to_utf8()` →
  работает и при UTF-8, и при windows-1251.
- **Проверка реальных значений:** `/new.v2/live-filter-debug.php`. Если на
  вашем инфоблоке значения отличаются — вписать их в `$MCO_CFG` (одно место).

## Ссылки карточек
Все динамические карточки (главная, каталоги, похожие) ведут на
`/new.v2/object-live.php?id=ID` (параметр `$MCO_CFG['detail_url']`).
**Для боя:** заменить на `'/realestate/%d/'`.

## Фото в «Актуальных вариантах»
`assets/segments/rent-apartments.jpg`, `rent-offices.jpg`,
`sale-apartments.jpg`, `sale-offices.jpg` — сейчас **временные плейсхолдеры**
(разные кадры Сити). Заменить на тематические (интерьер апартаментов, офис,
видовой лот, офисная башня) — имена файлов оставить те же, правки кода не нужны.

## Поля форм (единые)
`name`, `phone`, `interest`/`selection`, `message`, скрытое `source_page`,
атрибуты `data-form="lead"`, `data-source`. **Обработчик не подключён** —
формы визуально готовы, отправка заявки подключается следующим этапом.

## Кодировка
`header('Content-Type: text/html; charset=UTF-8')` (до и после ядра),
`live_to_utf8()` / `live_e()` на данных Bitrix, `.htaccess` (UTF-8 + noindex),
`charset-test.php`, все файлы UTF-8 без BOM.

## Что осталось после презентации
1. Подтвердить значения DEAL/DEST по `live-filter-debug.php` (при необходимости).
2. Подключить боевой обработчик форм.
3. Полноценный фильтр-поиск по параметрам.
4. «Живые» страницы направлений.
5. Перенос в боевой шаблон Bitrix (главная, карточка `/realestate/{ID}/`,
   каталог, посадочные) — поэтапно, с сохранением URL.
6. Заменить плейсхолдеры фото на финальные.
