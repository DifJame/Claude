---
name: header-footer-safe-redesign
description: Use when changing the Moscow-city.online header, footer, menu, mobile menu, logo area, contacts, or footer links. Compare with original files and protect navigation and indexation.
---

# Header Footer Safe Redesign

Use this skill before any visual or structural work on the site header or footer.

## Main rule

Visual changes are allowed, but navigation and indexation must stay safe.

Always compare changed files with the original or previous version before approving a patch.

## Before editing

1. Find the exact header and footer files.
2. Read the original files first.
3. List current header links.
4. List current footer links.
5. Mark important links: services, real estate, advertising, daily rental, excursions, renovation, management, news, FAQ, contacts.
6. Confirm which links must stay.
7. Define what is visual-only and what can affect SEO.

## During editing

- Keep important links as normal crawlable links.
- Keep the homepage logo link unless the user asks otherwise.
- Keep phone and contact links unless the user asks otherwise.
- Keep or improve footer internal linking.
- Do not move all navigation into JS-only behavior.
- Do not remove real estate navigation while the separate real estate site is still in development.
- Do not change public URLs during a visual patch.
- Do not change SEO logic during a visual patch.
- Keep changes minimal and scoped.

## After editing

Check:

1. Diff against the original files.
2. Header links are preserved.
3. Footer links are preserved.
4. Mobile menu still has important links.
5. Public URLs are unchanged.
6. SEO behavior is unchanged.
7. Existing real estate navigation still exists.
8. No unrelated files were changed.

## Output format

Respond in Russian.

Use this structure:

1. `Оригинал: что было`
2. `Что меняем визуально`
3. `Что обязаны сохранить`
4. `Риски для индексации`
5. `Сравнение с оригиналом`
6. `Что проверить руками`
7. `Можно ли принимать патч`

If original files are not available, stop before editing and locate them first.
