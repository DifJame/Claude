---
name: indexation-safety-gate
description: Use before any Moscow-city.online change that can affect search visibility, public URLs, templates, navigation, cards, filters, pagination, page text, images, SEO fields, or site structure.
---

# Indexation Safety Gate

Use this skill before planning, approving, committing, or deploying any change that can affect search visibility on Moscow-city.online.

## Main rule

The current indexation of Moscow-city.online is a key asset. Do not treat design changes as visual-only until links, page content, URLs, and SEO behavior are checked.

## When to use

Use this skill for changes to:

- header or footer
- menus and mobile menus
- object cards and event cards
- real estate catalog pages
- service landing pages
- filters and sorting
- pagination and load-more blocks
- page titles, headings, descriptions, and canonical behavior
- images and image markup
- internal links
- redirects and public URL structure
- sitemap or robots behavior
- templates shared by many pages

## Before editing

1. Find the original files.
2. Read the original files first.
3. Identify current public URLs affected by the change.
4. List current important links.
5. List current titles, H1, descriptions, and canonical behavior if relevant.
6. Check whether the page has cards, filters, pagination, breadcrumbs, FAQ, or schema.
7. Define what is purely visual and what can affect search visibility.
8. Stop if the original files are missing.

## During editing

- Keep public URLs stable unless the user approved a redirect plan.
- Keep important internal links.
- Keep object and service pages reachable.
- Keep important text visible in server-rendered HTML where possible.
- Keep image tags and useful alt text for important images.
- Keep one clear H1 per page.
- Avoid creating duplicate filter pages without a plan.
- Avoid hiding all key content behind JavaScript-only behavior.
- Keep changes minimal and scoped.

## After editing

Check:

1. Diff against the original files.
2. Public URLs are unchanged or redirected by plan.
3. Important links still exist.
4. Cards still link to detail pages where needed.
5. Titles, descriptions, H1, and canonical behavior are preserved or intentionally changed.
6. Images still have useful markup and alt text where relevant.
7. Filters and pagination do not create accidental duplicate or empty pages.
8. Mobile version still exposes important links and content.
9. No unrelated files changed.
10. Manual verification is listed before production deployment.

## Output format

Respond in Russian.

Use this structure:

1. `Что может повлиять на индексацию`
2. `Оригинал: что было`
3. `Что меняем`
4. `Что обязаны сохранить`
5. `Риски`
6. `Сравнение с оригиналом`
7. `Ручная проверка перед выкладкой`
8. `Можно ли продолжать`
