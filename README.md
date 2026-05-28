# Colophon

The shared starter core behind the [This Is My URL](https://thisismyurl.com) free theme line — and the tool that generates themes from it.

Colophon is a **development-time core**, not a runtime parent. You build *from* it (copy + re-skin), not *on* it (no `Template:` header, no cross-theme `get_template_part`, no shared runtime state). Each theme in the line ships as a fully self-contained WordPress install; Colophon is where the bones evolve.

---

## Who this is for

Developers who want to build a full-site-editing WordPress theme with a real accessibility and performance floor without starting from scratch. You get:

- A six-layer CSS cascade contract (`@layer reset, base, layout, components, blocks, utilities`) declared once, respected everywhere
- WCAG 2.2 AA accessibility scaffolding — skip link, focus ring contract, reduced-motion, ARIA patterns — baked into the core
- A `--cl-*` semantic token contract that survives across the whole theme line
- Zero front-end JavaScript (none, not "minimal")
- Self-hosted OFL fonts (swap in your own; Colophon's seed uses system fonts)
- A PHP namespace instead of a function prefix — one line changes, all callbacks follow
- Full RTL support via CSS logical properties
- A one-file re-prefixing point (`inc/bootstrap.php`) so your theme identity doesn't leak into a dozen files

Then you use the `colophon` CLI to generate your theme and pull core improvements forward without touching your design.

---

## Requirements

- WordPress 7.0 or later
- PHP 8.1 or later
- No plugins required

---

## Install (as a usable theme)

Colophon works as a standalone theme, but it's plain by design — no bundled skin, system fonts only. Most people will prefer one of the finished themes in the line (see [The theme line](#the-theme-line) below).

If you want to run the seed directly:

1. Download the ZIP from [Releases](../../releases)
2. WordPress admin → Appearance → Themes → Add New → Upload Theme
3. Upload the ZIP, activate

---

## The `colophon` CLI

The CLI is a single PHP file — no Composer, no Node, no dependencies. It lives at `colophon` in this repo.

```bash
# Scaffold a new theme from the Colophon core
php colophon new <slug> [--name="Pretty Name"] [--namespace=StudlyName] [--prefix=xx]

# Pull core improvements into an existing generated theme (leaves your design alone)
php colophon sync <slug> [--dry-run]

# Check a theme for common integrity problems
php colophon doctor <slug>

# List themes the CLI can see (siblings of the colophon directory)
php colophon list
```

**What `new` does:** copies every `core` file into a new sibling directory, re-prefixes namespace, text domain, hook names, CSS token prefix, and `SLUG`/`VERSION` constants to your theme's identity, then lays down the `scaffold` files (templates, skin CSS, patterns, `theme.json`) as your starting point. After that, the scaffold is yours.

**What `sync` does:** re-applies the latest `core` files to an existing generated theme — picking up accessibility fixes, performance improvements, or cascade changes from Colophon — without touching anything in the `scaffold` or `generated` buckets. Your design is never overwritten.

**What `doctor` does:** checks a generated theme for stale core files, missing identity fields, mismatched versions, and text-domain integrity.

The full rules — which files are `core` vs `scaffold` vs `generated`, the substitution rules, the CSS cascade contract, the i18n literal gotcha — are in [ARCHITECTURE.md](./ARCHITECTURE.md). Read it before you build.

---

## The three buckets

Every file in a generated theme is one of three kinds:

| Bucket | Owned by | `sync` behaviour |
|---|---|---|
| `core` | Colophon | Overwritten (re-prefixed to your theme) |
| `scaffold` | You, after `new` | Never touched again |
| `generated` | Per-theme tooling | Never touched |

`colophon.manifest.json` is the machine-readable version of this split.

---

## The theme line

Colophon is the core. The finished themes are:

- **[Quillwork](https://github.com/thisismyurl/colophon-quillwork)** — portfolio and editorial; Cormorant Garamond headlines, Newsreader body, deep-teal/warm-ochre palette
- **Masthead** — broadsheet newspaper; three-column print grid, CSS-only breaking-news ticker, Playfair Display/Libre Baskerville/Barlow Condensed
- **Margin** — financial trade publication; ink-on-paper, DM Sans/Fraunces/Source Serif 4, static market band with signed change values

All themes are free, GPL-licensed, and listed at [thisismyurl.com/themes](https://thisismyurl.com/themes/).

---

## Free, forever — no upsell

This repo and every theme in the line are GPL-2.0. No pro version, no feature lock, no "upgrade for support." Build whatever you want with it.

---

## Maintenance status

Active. Colophon is under current development as the theme line evolves.

---

## Support and donations

I build this free theme line because the open web works better when good tools are free. The themes are free to use, with no tracking, no ads, and no upsell.

If one of them saves you time, here are the genuine ways to help:

- **Sponsor the work.** [GitHub Sponsors](https://github.com/sponsors/thisismyurl) is the simplest way, and the Sponsor button at the top of this repo lists it alongside Bitcoin, Dogecoin, PayPal, and Interac e-transfer. Any amount helps, and none of it is expected.
- **Contribute code or ideas.** A pull request or a bug report on the [Issues](../../issues) tab is worth as much as a donation.
- **Share it.** A note on [WordPress.org](https://profiles.wordpress.org/thisismyurl/), [GitHub](https://github.com/thisismyurl), or [LinkedIn](https://linkedin.com/in/thisismyurl) helps other people find work that might save them the same afternoon.

### Report issues and questions

- **Found a bug or want a feature?** Open an issue on the [Issues](../../issues) tab.
- **Have a question?** Start a thread on the [Discussions](../../discussions) tab.

## About This Is My URL

This theme is built and maintained by [This Is My URL](https://thisismyurl.com/), the WordPress development and technical SEO practice of Christopher Ross. I help teams build WordPress sites that stay secure, fast, and maintainable, and I build a small, free theme line for people who want a real accessibility and performance floor without starting from scratch.

### My background

- On the web since 1996, and in WordPress since 2007
- WordPress.org plugin developer with 19 plugins published since 2009
- Technical SEO practitioner focused on performance, security, and search visibility
- Lead instructor and curriculum architect at the M.L. Campbell Training Center, the Sherwin-Williams® international training facility for its industrial wood division

### Ways to connect

- **Website:** [thisismyurl.com](https://thisismyurl.com/)
- **WordPress.org:** [profiles.wordpress.org/thisismyurl](https://profiles.wordpress.org/thisismyurl/)
- **GitHub:** [github.com/thisismyurl](https://github.com/thisismyurl)
- **LinkedIn:** [linkedin.com/in/thisismyurl](https://linkedin.com/in/thisismyurl)

## License

GNU General Public License v2.0 or later — see [LICENSE](./LICENSE).

---
*This project follows the [10 Core Pillars](PILLARS.md). Support quality work [here](https://github.com/sponsors/thisismyurl).*
