# Build a theme line on Colophon

Colophon is a free WordPress starter core. This file is the rest of the gift: a plain-spoken walk through what the core is and how to spin your own themes out of it, so you can build a whole line without the pain that usually comes with one.

There's no upsell here. No Pro tier behind a button, no "unlock the real core" wall, no newsletter gate between you and the useful part. The core is GPL, the CLI is GPL, and this guide gives away how both work. If you read it and ship a better line of your own, that's the whole point — you don't need my permission, and I'd like to see it.

A note on who this is for: you write WordPress themes, or you'd like to. I'll assume you know what `theme.json` is and why a block theme keeps its markup in `templates/`. I won't assume you've ever tried to keep *five* themes consistent at once, because that's the problem Colophon solves, and it's a stranger problem than it first looks. The deep version of everything below lives in [ARCHITECTURE.md](ARCHITECTURE.md); this is the on-ramp.

## What you get

Installing Colophon gives you a reading-first site with warm type, classical proportions, and nothing in the way of the words. Three touchpoints get you started: **Settings → Reading** to choose a front page, **Appearance → Editor** to browse templates and adjust styles, **Posts → Add New** to write something. The theme handles the rest — self-hosted fonts with no third-party requests, WCAG 2.2 AA focus and heading hierarchy, a skip link, and clean templates for posts, archives, author pages, and media attachments.

If you want a site that looks different, start in **Styles** inside the Site Editor. Change the typeface. Change the palette. Nothing is permanent until you click Save, and nothing you do there can break the theme from underneath.

## Understanding Full-Site Editing

Before block themes, a WordPress site was divided into two territories: PHP templates you edited in a code editor, and content you edited in the admin. Every header, footer, sidebar, and archive page lived in a `.php` file. To change the structure of a page, you had to write code.

Full-site editing collapses that boundary. In Colophon, every template is an `.html` file containing block markup — not PHP. You can open **Appearance → Editor**, click into any template, and rearrange the blocks directly in the browser, the same way you edit a post. Want to move the author box below the content? Drag it. Want a different layout for your archive? Edit the template. Changes live in your database, not on disk, so they survive theme updates.

The building blocks are **templates** and **template parts**. A template is the whole-page layout for a content type — the single-post layout, the home-page layout, the archive layout. A template part is a reusable chunk those templates share — the header, the footer. Colophon ships one of each that matters: a single-post template, an archive template, an author archive, a media attachment page, a 404, a header part, and a footer part. You can leave them alone, adjust them in the Editor, or override them entirely by duplicating them in the Editor and editing the copy.

The thing worth holding onto: **you edit this in the browser, not in a `.php` file.** If you've been building WordPress sites since before block themes, this will feel strange for about three days and then obvious. The code is there if you want it — templates are plain `.html` files, `theme.json` is readable JSON — but you do not have to touch code to change the layout of a page.

## The one idea: copied, not inherited

Here's the decision the whole thing hangs on. **Themes built on Colophon do not inherit from it. They copy it and re-skin it.**

That sounds backwards — child themes exist so you *don't* copy. So let me say why I went the other way. A parent/child setup means every theme in the line carries a runtime dependency on the parent: the child won't install without it, WordPress.org treats it as a published-theme requirement, and you've coupled themes that should be able to live and die on their own. I wanted each theme in the line to be a single, self-contained thing you can install, audit, and trust without dragging a parent along.

So Colophon is a *development-time* core, not a runtime one. You build theme number two by copying the tree and re-skinning it. The bones evolve in one place while you work; the shipped themes share DNA without sharing a dependency. Each one stands alone.

The cost of that choice is duplication, and duplication is usually a smell. The trick that makes it pay is that the duplication is *mechanical* — and a tool can do mechanical. That tool is the next section.

## The CLI does the boring half

`colophon` is one self-contained PHP file in the seed. No Composer, no Node. It has four jobs:

```
php colophon new <slug> [--name="Pretty Name"] [--namespace=StudlyName] [--prefix=xx]
php colophon sync <slug> [--dry-run]
php colophon doctor <slug>
php colophon list
```

- **`new`** scaffolds a fresh theme beside Colophon: it copies the core *and* the scaffold, and rewrites every `Colophon` / `colophon` / `cl-` token to your theme's name on the way in. You come out the other side with a prefixed, installable theme to start designing.
- **`sync`** pulls later core improvements forward into a theme you've already started — re-prefixed as it goes — and never touches your design files. Run it with `--dry-run` first; it tells you exactly which core files it would replace.
- **`doctor`** checks a theme for stray Colophon identity, `theme.json` drift from core, and a stale core version. Run it before you ship.
- **`list`** shows every theme in the folder and where each one sits relative to core.

The rules the CLI applies are the substitution rules in [ARCHITECTURE.md §4](ARCHITECTURE.md). The CLI is the executable version of that document; if the two ever disagree, the doc is the intent and the CLI is the bug.

## Core, skin, generated

Every path in a theme is exactly one of three kinds, and `colophon.manifest.json` is the machine-readable list:

- **Core** is portable and design-agnostic — the reset, the cascade-layer order, the accessibility scaffolding, the Core Web Vitals discipline, the font-loading mechanism, the template skeletons. `sync` owns it; you lift it verbatim into the next theme.
- **Skin** is the personality — palette, type families, scales, pattern content, component styling. `new` lays it down once, then it's yours; `sync` leaves it alone.
- **Generated** is made fresh per theme — your `colophon.json` identity record, the `.pot`, the `screenshot.png`.

The rule of thumb the in-file comments lean on: *if changing it changes how the theme looks, it's skin. If changing it changes how the theme works, stays accessible, or stays fast, it's core.* The full table is in [ARCHITECTURE.md §1](ARCHITECTURE.md).

## The file you rename

WordPress.org won't accept a theme that reuses another theme's function prefix or text domain, and rightly so. Most theme lines solve this by find-and-replacing a prefix across a dozen files and every hook string — exactly the job where one missed string silently breaks a hook in production.

Colophon uses a PHP namespace instead and concentrates the whole identity into `inc/bootstrap.php`:

```php
namespace Colophon;

const SLUG    = 'colophon';   // text domain + asset handles + pattern prefix
const VERSION = '1.0.0';
```

Callbacks register as `__NAMESPACE__ . '\\setup'`, so renaming the namespace at the top of each file carries every hook along with it. There's no second list of callback strings to keep in sync, because there's no list at all — the namespace *is* the prefix. The CLI does this rename for you; this is just so you know what it's doing.

## Where "tidy" is a bug

There's one spot where the code looks repetitive on purpose, and I want to warn you before you clean it up. Text domains in `__()`, `esc_html__()` and friends are written as the literal string `'colophon'`, *not* the `SLUG` constant — even though `SLUG` holds the same value and DRY is screaming at you.

The reason is `wp i18n make-pot`. The extractor reads your source statically and only recognises a *literal* as the text-domain argument. Hand it a constant and it extracts nothing, and you ship a theme that looks translation-ready and quietly isn't. So the split is deliberate: the text domain stays a literal; everything else identity-shaped reads from the constants. The CLI rewrites the literal too, so it survives a re-skin and stays a literal.

## The updater you can delete

`inc/github-updater.php` is a small core file that gives a theme distributed from a GitHub repo the one-click update banner in **Appearance → Themes** — no library, no service, nothing phoned home but GitHub's release API. It ships dormant; a theme turns it on with one filter in its `inc/skin.php`:

```php
add_filter( 'colophon/github_updater_repo', static fn () => 'owner/repo' );
```

The release needs a real `.zip` asset whose name starts with the theme slug (e.g. `colophon-1.3.0.zip`). And the headline feature is the off-switch: **delete the one file and it's gone** — the loader is `file_exists`-guarded, so nothing else needs touching. Do delete it before a WordPress.org submission, because .org supplies updates there and a self-updater gets a theme rejected.

## A worked example: Masthead in two files

The fastest way to believe the CORE/SKIN claim is to read a sibling. Here is
Masthead — the newspaper skin — reduced to the only two files that differ from
Colophon. Everything else (templates, accessibility scaffolding, bindings,
onboarding, the WooCommerce guard) is inherited verbatim.

**`inc/bootstrap.php`** — the single re-prefix point. Three lines carry the whole
identity; renaming the namespace re-points every hook and asset handle at once:

```php
namespace Masthead;

const SLUG    = 'masthead';      // text domain + asset handles + pattern prefix
const VERSION = '1.0.0';
```

**`inc/skin.php`** — the personality. Same function names as Colophon's skin, new
content. A newspaper wants a wider hero crop, a self-hosted display face, an
editorial block style, and its own onboarding voice:

```php
namespace Masthead;

defined( 'ABSPATH' ) || exit;

// Masthead runs a wide 3:1 banner crop for front-page leads.
function skin_image_sizes(): void {
	add_image_size( 'masthead-banner', 1800, 600, true );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\skin_image_sizes' );

// Preload the LCP-critical display face Masthead ships in assets/fonts/.
add_filter(
	'masthead/preload_fonts',
	static function ( array $fonts ): array {
		$fonts[] = get_template_directory_uri() . '/assets/fonts/masthead-display.woff2';
		return $fonts;
	}
);

// A drop-cap lead paragraph — the one block style a newspaper actually needs.
function skin_block_styles(): void {
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'masthead-lead',
			'label' => __( 'Drop-cap lead', 'masthead' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\\skin_block_styles' );

// Onboarding in Masthead's own voice.
add_filter(
	'masthead/get_started_content',
	static function ( array $content ): array {
		$content['lead'] = __( 'Masthead is a digital-newspaper theme built on the Colophon core. Set your sections, drop in your lead story, and publish.', 'masthead' );
		return $content;
	}
);
```

That is the entire delta. The skin's design tokens live in `theme.json` and its
CSS treatment in `assets/css/skin.css`; neither needs the core touched. Run
`colophon sync` and Masthead inherits every accessibility, security, and i18n fix
Colophon ships, without a merge. Two files of personality on top of one shared
core is the whole promise — and now you have read it, not just been told it.

## About the footer credit

A theme built on Colophon leaves a small credit in its footer. I'd be glad if your users kept it, and I've made it genuinely easy to remove, because a credit you're forced to keep isn't a thank-you, it's a tax. Two clicks does it: open the Site Editor, edit the footer part, delete the line. Or filter `colophon/footer_credit` to an empty string in code. Either way — and this matters — a credit that's easy to remove is the one people actually leave up.

## Who made this, and why you can build on it

I'm Christopher Ross. I've been building the web since 1996 and working in WordPress since 2007. Along the way I've shipped 19 plugins to the WordPress.org repository and spoken at more than 18 WordCamps, which mostly means I've made a lot of the mistakes this core is designed to keep you from making. Earlier I was a senior web developer at Corel and a director of technology at Yorkville. These days I lead a training centre, and the teaching is the part I love most.

I tell you this because it's the honest answer to a fair question: *why trust this core enough to build a line on it?* The answer is that you don't have to take my word for any of it. Colophon is built to the WordPress.org Theme Review standard, passes Theme Check clean, and meets WCAG 2.2 AA — and every one of those claims is auditable against the code sitting right next to this guide. Don't trust the architecture because I described it well. Read it.

## Go build something

Colophon is GPL, and so is everything in this guide. Copy the core, re-skin it, ship your own line, sell it if you like — the licence allows it and I won't be offended. I'm not selling the architecture; I'm giving it to a community that gave me a career.

If you build on it, I'd genuinely like to know. And if you find the place where I was wrong — there's always a place where I was wrong — tell me that too. That's how the next version gets better.

— Christopher
