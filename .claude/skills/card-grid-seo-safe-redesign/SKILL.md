---
name: card-grid-seo-safe-redesign
description: Use when changing cards, grids, catalogs, event cards, real estate object cards, advertising surface cards, news cards, filters, pagination, or load-more blocks on Moscow-city.online.
---

# Card Grid SEO Safe Redesign

Use this skill before changing any card grid, catalog, carousel, event listing, real estate listing, service card list, news grid, or advertising surface grid.

## Main rule

Cards are not just design elements. They often contain internal links, page context, images, prices, locations, and data that help both users and search engines understand the site.

Do not redesign cards until the original links, text, images, and filtering behavior are understood.

## Before editing

1. Find the original files that render the cards.
2. Read the original files first.
3. Identify the data source: Bitrix component, JSON, PHP array, static HTML, or JavaScript.
4. List current card URLs.
5. List current card fields: title, location, price, area, date, type, image, alt, CTA.
6. Check whether each card links to a detail page.
7. Check filters, sorting, pagination, and load-more behavior.
8. Check if cards are visible in initial HTML or loaded later.
9. Check if the page has breadcrumbs, FAQ, or schema.

## During editing

- Keep card links to detail pages unless the user approved a different flow.
- Keep important card text.
- Keep useful image markup and alt text.
- Keep object, event, and service pages reachable.
- Do not replace links with click-only behavior.
- Do not hide all important cards behind JavaScript-only loading.
- Do not remove prices, locations, or key facts only for visual minimalism.
- Do not break filters or pagination.
- Avoid creating empty filtered states.
- Keep changes minimal and scoped.

## Event page specific checks

For event or venue pages, preserve where relevant:

- event or venue title
- location / tower / address
- capacity
- area
- format
- price or price logic
- image and alt text
- link to detail page or lead path
- date and time if this is a real event page
- structured data only if it matches visible content

## After editing

Check:

1. Diff against original files.
2. Card URLs still work.
3. Important cards are still linked.
4. Important text did not disappear.
5. Images still render and have useful alt text where relevant.
6. Filters still show correct results.
7. Pagination or load-more still exposes content safely.
8. Mobile cards remain usable.
9. No unrelated templates changed.
10. Manual checks are listed before production deployment.

## Output format

Respond in Russian.

Use this structure:

1. `Оригинальные карточки`
2. `Что меняем визуально`
3. `Какие ссылки и поля сохраняем`
4. `Риски для индексации`
5. `Фильтры / пагинация / JS`
6. `Сравнение с оригиналом`
7. `Что проверить руками`
8. `Можно ли принимать патч`
