# Colophon — the shared theme-line core

Colophon is a **development-time core**, not a runtime parent. Themes are built
*from* it (copied + re-skinned), never built *on* it (inherited). Every theme in
the line ships as a self-contained WordPress.org submission with no `Template:`
header, no `get_template_part()` reaching across themes, and no shared runtime
state. The bones evolve in one place; the shipped themes share DNA without
sharing a dependency.

This is the contract. If you're building a theme on Colophon, read it top to
bottom — the re-skin is mostly mechanical, and the `colophon` CLI does the
mechanical half for you.

---

## 1. Three buckets — what the CLI owns, and what's yours

Every path in a theme is exactly one of three kinds. `colophon.manifest.json` is
the machine-readable version of this table; this section is the human one.

### `core` — Colophon owns it; `colophon sync` overwrites it

The portable engine and the accessibility / performance floor. You never hand-edit
these in a generated theme — `sync` will overwrite them (re-prefixed to your
theme on the way in). If you must diverge, list the path in your theme's
`colophon.json` `overrides` and `sync` will skip it.

| Path | Why it's core |
| --- | --- |
| `functions.php` | Thin loader; identical everywhere. |
| `inc/bootstrap.php` | The namespace + SLUG/VERSION. Identity is re-injected from `colophon.json` on every sync. |
| `inc/setup.php` | Supports, i18n, nav menus, skip link, emoji-dequeue — the shared floor. |
| `inc/assets.php` | Cascade-ordered enqueue + the filterable font-preload mechanism. |
| `inc/bindings.php` | Footer copyright-year + removable credit (reads the theme's own header, so it carries no theme string). |
| `inc/admin.php` | The WP.org-compliant Get-started page + welcome notice (mechanism only; the copy is filtered in from skin). |
| `assets/css/core/reset.css` | Declares the `@layer` order + a design-agnostic reset. |
| `assets/css/core/base.css` | A11y scaffolding + the `--cl-*` semantic-token contract. |
| `assets/css/core/print.css` | A generic ink-on-white print proof keyed only off core-block selectors. |

### `scaffold` — Colophon lays it down once; then it's yours

The starting point for your design. `colophon new` copies these and rewrites the
`Colophon`/`colophon`/`cl-` tokens to your theme's; after that **`sync` leaves
them alone**. They're where the design lives, and design is per-theme.

`templates/*.html`, `parts/header.html`, `parts/footer.html`,
`assets/css/skin.css`, `assets/css/editor-style.css`,
`assets/css/admin-get-started.css`, `inc/skin.php`, `theme.json`,
`patterns/*.php`, `style.css`, `readme.txt`.

### `generated` — made fresh per theme, never copied

`colophon.json` (your identity record), `languages/{slug}.pot` (run `wp i18n
make-pot`), `screenshot.png` (your 1200×900 capture).

> **What "updatable" honestly covers.** `sync` propagates improvements to the
> *engine and the a11y/CWV/cascade floor* — the `core` bucket. It does **not**
> touch your design (templates, skin CSS, patterns, theme.json), because design
> is the part that's supposed to differ. That's the right boundary: the shared
> value is the standards and the plumbing, not the markup.

---

## 2. The single re-prefixing point + the `--cl-` contract

WordPress.org rejects a theme that reuses another's function prefix or text
domain. Two mechanisms keep every theme unique without scattering the identity:

**PHP — a namespace, not a `mytheme_` prefix.** Callbacks register as
`__NAMESPACE__ . '\\fn'`, so the namespace declaration is the only thing that
changes per theme; every hook follows it automatically. `inc/bootstrap.php` holds
the namespace + the `SLUG`/`VERSION` constants — the whole identity in one file.

**CSS — a stable semantic-token namespace.** Core CSS can't reference
`--wp--preset--color--teal` (that's one skin's word). Instead core references
`--cl-focus-ring`, `--cl-skip-bg`, `--cl-skip-fg`, `--cl-focus-ring-inverse`,
and each skin **binds** those tokens to its own palette in `skin.css` (in an
unlayered `:root` so the binding beats core's layered fallbacks). The `--cl-`
namespace is shared across the whole line and is **never re-prefixed** — it's
common vocabulary, like `--wp--preset--`.

---

## 3. The i18n literal — the one place "tidy" is a bug

Text domains in `__()`/`_e()`/`esc_html__()` are written as the **literal string**
`'colophon'`, never the `SLUG` constant. `wp i18n make-pot` parses source
statically and only recognises a literal as the domain argument; hand it a
constant and it extracts nothing and ships an untranslatable theme. The CLI
rewrites the literal too, so it survives a re-skin and stays a literal.

---

## 4. How the CLI re-prefixes (the substitution rules)

`colophon new` and `colophon sync` apply these to every `core` file (and `new`
also to `scaffold` files) as they're written into the target theme:

1. `namespace Colophon;` → `namespace {Namespace};`
2. `'colophon` → `'{slug}` — catches the text-domain literal **and** every hook
   name (`'colophon/setup'`, `'colophon/footer_credit'`, …) and the `SLUG`
   constant value, in one rule. The leading single-quote means prose mentioning
   "Colophon" is never touched.
3. `@package colophon` → `@package {slug}`
4. `const VERSION = '…';` → the theme's version from `colophon.json`.
5. (scaffold only, at `new` time) `cl-` → `{prefix}-` and `Colophon` → `{Name}`
   in templates / skin CSS / patterns.

Because callbacks use `__NAMESPACE__`, there is no second list of callback
strings to keep in sync — rule 1 carries them all.

---

## 5. The CSS cascade contract

`assets/css/core/reset.css` declares the order once, first thing:

```css
@layer reset, base, layout, components, blocks, utilities;
```

`reset` and `base` are core; `layout`, `components`, `blocks`, `utilities` are
the skin's, populated in `skin.css`. Because the order is declared up front, rule
arrival order is irrelevant — a later-loaded skin rule in `@layer components`
still loses to nothing in `base`, and beats anything in `layout`. One caveat
worth knowing: WordPress core ships some **unlayered** CSS, and unlayered always
beats layered regardless of specificity — so the rare skin override that has to
beat core CSS goes unlayered (or uses `!important`), on purpose.

---

## 6. Fonts (line standard)

Self-hosted, OFL-licensed, declared as `@font-face` in `theme.json`
`settings.typography.fontFamilies[].fontFace` with `"fontDisplay": "swap"`. No
`fonts.googleapis.com` link, no third-party connection. Every family stack lists
a system fallback so type still cascades if a file is removed. Colophon's own
default skin uses **system fonts only** (no bundled files) — a theme adds its
families, drops the WOFF2 + `OFL.txt` into `assets/fonts/<family>/`, and opts the
LCP font into preload via the `colophon/preload_fonts` filter in `inc/skin.php`.

---

## 7. Building a theme on Colophon

```
php colophon new <slug>           # scaffold a theme from the core
# …re-skin: theme.json tokens, skin.css, patterns, templates, fonts…
php colophon doctor <slug>        # check theme.json core-key drift + overrides
wp i18n make-pot . languages/<slug>.pot
# add screenshot.png (1200×900), then submit
```

When Colophon improves later:

```
php colophon sync <slug> --dry-run   # see exactly which core files would change
php colophon sync <slug>             # apply; your design is untouched
```

### The verification gate (before WP.org submission)

```
php -l                                            # every PHP file
grep -rn "colophon" inc/ --include=*.php          # ZERO hits in a generated theme
grep -rn "Colophon" inc/ --include=*.php          # ZERO hits in a generated theme
wp i18n make-pot . languages/<slug>.pot           # non-empty POT, correct domain
```

A surviving `colophon`/`Colophon` identifier in a generated theme is a duplicate
prefix/domain — a WP.org rejection. Those two greps are the whole safety net, and
they're why the prefixing is concentrated, not scattered.

---

## 8. Re-evaluation notes (v1.1.0 — proven against three themes)

The core was re-evaluated after Quillwork, Masthead, and Margin were built on it.
What the three themes taught, and what changed:

**Contrast is verified, never trusted.** Two design specs shipped contrast ratios
that were arithmetically wrong; one set was implemented and produced real WCAG
failures (green data on a saturated blue band at 2.5:1). The fix is a discipline,
made executable: `php colophon contrast <fg> <bg>` prints the WCAG 2.1 ratio and
the AA/AAA verdicts. **Every text/background pair a skin introduces is checked
with this before it ships — no number from a spec is trusted on faith.** It also
catches wrong-direction fixes (a "darker" suggestion for dim-on-dark text makes
contrast worse, not better — the tool says so in one line).

**The re-prefix now covers CSS-class strings.** `colophon new` originally rewrote
the namespace, text domain, and hook names, but not the bare `colophon-` CSS
class strings in `inc/admin.php`. Two themes shipped stray `colophon-` admin
classes as a result. v1.1.0 adds the `colophon-` → `{slug}-` substitution, applied
to core + scaffold, and `colophon doctor` now reports a residual `colophon` count
at `[info]` so a green identity check can never again mask an incomplete re-prefix.

**A `.distignore` ships in the scaffold.** Generated themes carry one so the
build-time files (`colophon.json`, `DESIGN-UPLIFT.md`, dev docs) stay out of a
distributable `.zip`.

**Conventions the band-heavy and motion-heavy themes needed** (documented, not yet
abstracted into core — abstract them only when a fourth theme proves the shape):

- **Full-bleed chrome bands.** A newspaper's ticker / meta bar / section nav are
  full-width bands that sit outside the constrained `<main>` but inside the header
  composition. The pattern that works: compose them as separate template parts
  (registered in the skin's `theme.json` `templateParts`, area `header`) and align
  inner content to the page measure with an unlayered gutter rule. If a fourth
  theme needs the same, promote a `--cl-page-gutter` token + a `.cl-band` utility
  into core base.css.
- **Reduced-motion that re-lays-out.** The global reduced-motion guard in
  `core/reset.css` freezes animation with `!important` — correct. But a skin whose
  motion needs to *restructure* under reduced motion (a ticker becoming a stacked
  list, a marquee, a carousel) must put its restructure rules in an **unlayered**
  `@media (prefers-reduced-motion: reduce)` block in `skin.css` — unlayered beats
  the layered reset, and you're changing layout, not re-enabling animation. The one
  place a motion skin reaches past the layer system on purpose.
- **The broadsheet double-rule** (`3px double`) is pure CSS — `theme.json` border
  tokens don't express `double`. It lives in `skin.css`. Not a core gap; a note so
  the next editorial skin doesn't hunt for a token that isn't there.
