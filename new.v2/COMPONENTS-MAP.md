# COMPONENTS-MAP — повторяемые блоки → Bitrix include / component

Все повторяемые блоки размечены в HTML парными комментариями
`<!-- BITRIX:<NAME> START -->` … `<!-- BITRIX:<NAME> END -->`.
Точки динамических данных — `<!-- BITRIX-DATA: ... -->` и
`<!-- BITRIX-COMPONENT: ... -->`.

## Сквозные включаемые области (на всех страницах)

| Блок | Маркер | Где встречается | Статика | Динамика | Тип в Bitrix |
|---|---|---|---|---|---|
| Шапка | `BITRIX:HEADER` | все страницы | логотип, телефон, соцсети | пункты меню (тип «меню»), телефон из настроек | `include` header.php + `bitrix:menu` |
| Мобильное меню | `BITRIX:MOBILE-MENU` | все страницы | разметка | те же пункты меню | `include` (один источник с десктоп-меню) |
| Переключатель тем | (внутри header/menu, `[data-theme-toggle]`) | все страницы | весь JS | — | статический include + `app.js` |
| Футер | `BITRIX:FOOTER` | все страницы | колонки, контакты | меню футера, контакты из настроек | `include` footer.php + `bitrix:menu` |
| Модалка-заявка | `BITRIX:LEAD-MODAL` | все страницы | разметка/верстка | обработка заявки | `include` + AJAX-обработчик (`bitrix:form` или кастом) |
| Плавающие мессенджеры | `BITRIX:FLOATING-WIDGET` | все страницы | ссылки | номера из настроек | статический include |

## Контентные блоки

| Блок | Маркер | Страница | Статика | Динамика | Тип компонента |
|---|---|---|---|---|---|
| Hero | `BITRIX:HERO` | все | заголовок, лид, CTA | (опц.) заголовок направления | include / свойства раздела |
| Актуальные варианты | `BITRIX:CURRENT-OFFERS` | главная | 4 карточки-входа | счётчики объектов (по фильтру) | `element.list` (count) или статикой |
| С чего начать | `BITRIX:START-GUIDE` | главная | 4 входа | — | статический include |
| Направления | `BITRIX:DIRECTIONS` | главная | карточки | список разделов «Направления» | `bitrix:catalog.section.list` |
| Сценарии владения | `BITRIX:SCENARIOS` | главная, каталоги | карточки | — | статический include |
| Подборки под задачу | `BITRIX:COLLECTIONS` | главная | строки-подборки | (опц.) инфоблок «Подборки» | `news.list` / статикой |
| Избранные объекты | `BITRIX:OBJECTS-LIST` | главная | карточки-примеры | **объекты IBLOCK_ID=10** | `mco:element.list` |
| Список объектов | `BITRIX:OBJECTS-LIST` | каталоги, направления | карточки-примеры | **объекты IBLOCK_ID=10 (фильтр)** | `mco:element.list` |
| Объект в фокусе | `BITRIX:FEATURED-OBJECT` | главная | один объект | избранный элемент инфоблока | `element` / `element.list limit=1` |
| Карточка объекта | `BITRIX:OBJECT-DETAIL` | object.html | верстка | **все поля объекта** | `mco:element.page` |
| Похожие объекты | `BITRIX:SIMILAR-OBJECTS` | object.html | 3 карточки | объекты того же раздела | `mco:element.list` |
| Критерии подбора | `BITRIX:SELECTION-CRITERIA` | каталоги | текст | — | статический include |
| Рынок/аналитика | `BITRIX:MARKET-DATA` | направления | метрики, график | (опц.) инфоблок аналитики | статикой / `news.list` |
| Районы | `BITRIX:AREAS` | направления | карточки районов | (опц.) разделы | статикой / `section.list` |
| Методика / Процесс / Сопровождение / FAQ | `BITRIX:METHOD/PROCESS/SUPPORT/FAQ` | главная, направления | тексты | FAQ — (опц.) инфоблок | статический include / `news.list` |
| Контактная форма (CTA) | `BITRIX:CONTACT-FORM` | все | форма | обработка заявки | AJAX-обработчик |

## Карточка объекта (повторяемый компонент)

Используется в: `BITRIX:OBJECTS-LIST`, `BITRIX:FEATURED-OBJECT`,
`BITRIX:SIMILAR-OBJECTS`. Разметка `.prop` (фото-вариант) и
`.prop--plate` (data-вариант для Дубая).

Поля из IBLOCK_ID=10:
`ID, NAME, PRICE, TOTAL_PRICE, KVAD, TOWER, FLOOR_, ADRESS, PHOTO, URL_DETAIL`.

## Карточки направления / подборки
- Карточка направления — `.dir-card` (фото) / `.dir-card--plate` (заглушка):
  статика или `catalog.section.list`.
- Карточка подборки — строка `.idx-row`: статика или инфоблок «Подборки».

## Формы (единая структура)
Поля: `name`, `phone`, `interest` (или `selection`), `message`,
`source_page` (скрытое). Атрибуты: `data-form="lead"`,
`data-source="<страница>:<место>"`. Один AJAX-обработчик на все формы;
источник лида берётся из `source_page` / `data-source`.
