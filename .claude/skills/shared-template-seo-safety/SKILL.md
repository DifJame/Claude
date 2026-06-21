---
name: shared-template-seo-safety
description: Use when changing shared Bitrix templates, layout files, components, header/footer includes, list templates, detail templates, or any file used by many pages on Moscow-city.online.
---

# Shared Template SEO Safety

Use this skill before changing shared templates or components that can affect many pages at once.

## Main rule

Shared templates are high risk. A small change can affect hundreds of public pages.

Do not change a shared template until the affected page types and original behavior are known.

## When to use

Use for changes to:

- header and footer includes
- Bitrix component templates
- catalog list templates
- object detail templates
- news templates
- service page templates
- common layout files
- shared CSS or JS used site-wide
- breadcrumbs
- forms embedded across pages
- image rendering helpers

## Before editing

1. Identify which pages use the template.
2. Read the original file.
3. Check whether the file affects titles, headings, links, breadcrumbs, images, cards, forms, or public URLs.
4. List affected page types.
5. Check if the change is truly needed globally.
6. Prefer a scoped override when only one page needs the change.

## During editing

- Keep public page structure stable.
- Keep detail page links and list page links.
- Keep breadcrumbs if they already exist.
- Keep title and heading logic unless the user approved a separate SEO change.
- Keep image output useful and readable.
- Keep forms working.
- Avoid global CSS that breaks unrelated pages.
- Avoid changing shared JS behavior without checking all affected pages.

## After editing

Check:

1. Diff against original file.
2. Affected page types are listed.
3. List pages still link to detail pages.
4. Detail pages still show important content.
5. Breadcrumbs still work if relevant.
6. Titles and headings are not accidentally duplicated or removed.
7. Images and alt text still render where relevant.
8. Forms still submit where relevant.
9. Mobile layout is not broken.
10. Rollback path is clear.

## Output format

Respond in Russian.

Use this structure:

1. `Затронутые шаблоны`
2. `Какие страницы зависят от них`
3. `Что меняем`
4. `Что обязаны сохранить`
5. `SEO и индексация: риски`
6. `Сравнение с оригиналом`
7. `Проверка перед выкладкой`
8. `Можно ли принимать патч`
