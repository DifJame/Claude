# Moscow-city.online project instructions

This repository is used for work on Moscow-city.online and related Claude Code workflows.

## Main project context

Moscow-city.online is being developed as a service portal for Moscow City.

Current service directions:

- advertising on media facades and digital / indoor screens
- daily apartment rentals
- excursions
- renovation and design
- apartment management
- events and venues
- coworking and mini-offices
- restaurant bookings
- news, video, FAQ

The ideal user action is an application or a phone call.

## Current active page

Active test page for advertising:

- `/reklama-v-moskva-siti-test/`

Do not touch the production page unless the user explicitly confirms it:

- `/reklama-v-moskva-siti/`

Main files for the advertising test page:

- `reklama-v-moskva-siti-test/template.php`
- `local/ads-city-test/ads-city.css`
- `local/ads-city-test/ads-city.js`
- `local/ads-city-test/ads-lead.php`
- `local/ads-city-test/data/surfaces.json`
- `upload/ads-city-test/`

## Hard safety rules

- Prefer minimal safe patches.
- Discuss concept and UX before changing code when the user asks for design or structure.
- Do not edit production pages without explicit confirmation.
- Do not break lead forms.
- Do not break Telegram or email lead delivery.
- Do not expose tokens, passwords, `.env` files, or credentials.
- Be careful with Bitrix templates and encoding.
- Do not remove existing Bitrix logic without proving it is unused.

## Indexation safety rule

Do not break current indexation on Moscow-city.online.

Before changing templates, URLs, SEO fields, robots, sitemap, redirects, canonical tags, headers, or public page structure, check whether the change can harm existing Google or Yandex indexation.

Protect:

- existing public URLs
- current real estate object pages while the separate real estate site is still in development
- current service pages
- title and meta description
- one H1 per page
- canonical URLs
- robots.txt rules
- sitemap.xml / sitemap generation
- public images, CSS, and JS used for rendering
- internal links
- correct HTTP status codes
- redirects for changed URLs

Never add `noindex`, block crawlers, remove indexed pages, or change public URLs without explicit user approval and a redirect/indexation plan.

Any SEO-sensitive change must be flagged before implementation and verified manually in Yandex Webmaster and Google Search Console before production deployment.

## Current design direction for the advertising test page

The current advertising test page uses a premium city-tech style:

- light base
- dark photo hero
- blue accent `#2563EB`
- white cards
- slate text colors
- clean business layout
- no gold / beige / dark vanilla unless the user explicitly asks for a redesign

## Recommended skills

Use project skills when relevant:

- `/premium-design-review`
- `/luxury-copywriting`
- `/bitrix-code-review`
- `/seo-landing-audit`
