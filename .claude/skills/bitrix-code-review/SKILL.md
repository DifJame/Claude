---
name: bitrix-code-review
description: Use when reviewing code changes, diffs, commits, or pull requests in the Moscow-city.online Bitrix/PHP repository. Focus on bugs, encoding, lead forms, production safety, indexation safety, regressions, and minimal safe patches.
---

# Bitrix Code Review

Use this skill before committing, merging, or deploying changes in the Moscow-city.online repository.

## Safety rules

- Prefer minimal safe patches.
- Do not suggest editing production pages unless the user explicitly confirms it.
- For the advertising page, the active test page is `/reklama-v-moskva-siti-test/`.
- Do not touch `/reklama-v-moskva-siti/` without explicit confirmation.
- Be careful with `template.php` encoding. It may use cp1251.
- Do not break lead forms.
- Be especially careful with `local/ads-city-test/ads-lead.php` because it sends leads to Telegram and email.
- Be careful with `local/ads-city-test/data/surfaces.json`; it contains ad surface data.
- Do not remove existing Bitrix component logic without proving it is unused.

## Indexation safety rules

Do not break the current indexation of Moscow-city.online.

Before approving or suggesting changes, check that the patch does not accidentally:

- add `noindex`, `nofollow`, or `X-Robots-Tag` to important public pages
- change `robots.txt` in a way that blocks public pages, images, CSS, JS, or service sections
- remove or damage `sitemap.xml` / sitemap generation
- change canonical URLs without a clear reason
- remove or duplicate important `title`, `description`, or H1 tags
- create duplicate H1 on a page
- remove existing indexed real estate pages while the new real estate site is still in development
- break existing public URLs or slugs without 301 redirects
- turn public pages into empty, hidden, JS-only, or non-rendered content for crawlers
- add redirects, authorization checks, or status codes that make public pages unavailable
- hide important page text in a way that search engines cannot read
- accidentally point the test page canonical to the wrong production URL or vice versa

If a change affects SEO or indexation, mark it as a risk and require manual verification in Yandex Webmaster and Google Search Console before production deployment.

## Review checklist

Check:

1. PHP syntax and template structure
2. file encoding
3. paths to CSS, JS, images, JSON, and PHP handlers
4. form submit flow
5. Telegram and email lead delivery flow
6. JavaScript console errors
7. mobile layout regressions
8. JSON structure validity
9. accidental edits to production files
10. large unnecessary rewrites
11. SEO / indexation regressions
12. robots, sitemap, canonical, title, description, H1, redirects, and status codes when relevant
13. rollback path

## Output format

Respond in Russian unless the user asks otherwise.

Use this format:

1. `Критичные стоп-факторы`
2. `Риски среднего уровня`
3. `Мелкие замечания`
4. `Что проверить руками`
5. `Что можно принять`
6. `Рекомендованный следующий шаг`

If there are no serious issues, say so directly, but still list manual checks.

## Review style

Be strict but practical. The goal is to keep the site alive, leads working, indexation intact, and production untouched unless explicitly requested.
