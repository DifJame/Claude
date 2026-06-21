---
name: premium-design-review
description: Use when reviewing the Moscow-city.online advertising test page, premium city-tech service pages, UI layouts, Figma screenshots, landing pages, hero blocks, cards, forms, and visual direction based on the current light blue Moscow City design system.
---

# Premium Design Review

Use this skill to review or improve the visual concept of a page, block, mockup, screenshot, or landing structure for Moscow-city.online.

## Current visual direction

The current advertising test page uses a `premium city-tech` style:

- light theme as the main base
- dark photo hero with blue glow / overlay
- clean white cards
- cool blue accent
- strict business layout
- modern digital advertising feel
- Moscow City / media facade / digital screen context
- no gold, no beige luxury palette, no black/platinum/dark-vanilla redesign

Do not replace the current system with a warm luxury palette unless the user explicitly asks for a redesign.

## Actual palette from the test page

Use these colors as the current source of truth:

- page background: `#FFFFFF`
- secondary background: `#F4F6FA`
- V2 clean landing background: `#EEF3FA`
- card / surface: `#FFFFFF`
- soft input / card background: `#F8FAFC`
- main text: `#0E1726` / `#0F172A`
- secondary text: `#46566B`
- muted text: `#64748B`
- accent blue: `#2563EB`
- accent hover: `#1D4ED8`
- soft accent: `rgba(37,99,235,.10-.12)`
- line: `rgba(15,23,42,.07-.16)`
- dark hero / blue section base: `#07152E`, `#103B7B`, `#155EEF`
- hero light blue text: `#A9C7FF`

## Layout language

Preserve and improve the current layout language:

- centered hero content
- dark hero over image with readable white text
- blue primary CTA with white text
- ghost CTA on dark hero with transparent background and white border
- white rounded cards with subtle borders
- large clean typography, strong H1/H2 hierarchy
- section cards with 18-20px radius
- V2 sections inside a light `#EEF3FA` canvas
- blue gradient sections only where they support contrast and rhythm
- carousels / horizontal rows on mobile should feel intentional and easy to swipe

## Avoid

Avoid recommending:

- gold / beige / dark vanilla palette
- full black luxury redesign
- heavy neon cyberpunk style
- random glassmorphism everywhere
- overly dark sections after the hero
- too many gradients
- dense blocks with small text
- decorative icons that do not help conversion
- major rewrites when a small UX patch is enough

## What to review

Check:

1. First-screen clarity: does the visitor instantly understand the advertising offer?
2. Hero: is the dark photo overlay readable, premium, and not too heavy?
3. Palette consistency: does the page stay within white / slate / blue city-tech colors?
4. CTA visibility: is the blue CTA obvious without looking cheap?
5. Card quality: do surfaces, prices, meta rows, and badges look clean and business-like?
6. Section rhythm: do white and blue sections alternate naturally?
7. Mobile UX: are horizontal rows, cards, forms, and CTAs easy to use on phone?
8. Forms: are forms short, readable, and tied to the user's advertising task?
9. Trust and proof: are media surfaces, OTS, sizes, locations, process, and calculation logic visible?
10. Bitrix isolation: do not suggest global styles; keep styles scoped under `.ads-city` / `#ads-city`.

## Output format

Respond in Russian unless the user asks otherwise.

Use this structure:

1. `Что уже хорошо`
2. `Что выбивается из текущей палитры`
3. `Что мешает заявке`
4. `Что поднять выше`
5. `Что упростить`
6. `Какие блоки добавить / убрать`
7. `Точные правки для дизайна`
8. `Приоритет: что сделать первым`

Be direct. Avoid generic praise. Give practical changes that can be turned into a Claude Code task.

## Moscow-city.online safety note

When the review concerns advertising pages:

- active test page: `/reklama-v-moskva-siti-test/`
- production page must not be changed unless the user explicitly confirms: `/reklama-v-moskva-siti/`

Do not suggest large rewrites when a minimal UX patch would solve the problem.
