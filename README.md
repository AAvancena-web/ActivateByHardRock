# Activate by Hardrock: WordPress Homepage Redesign

Custom WordPress theme (`activate-hardrock/`) with a global header and footer and a fully redesigned, conversion focused homepage for [activatebyhardrock.com.au](https://www.activatebyhardrock.com.au/).

## Install

1. Copy the `activate-hardrock` folder into `wp-content/themes/`.
2. In **Appearance > Themes**, activate **Activate by Hardrock**.
3. In **Settings > Reading**, set "Your homepage displays" to **A static page** and choose any page as the Homepage. WordPress then uses `front-page.php`.
4. (Optional) **Appearance > Menus**: assign menus to **Primary Menu** and **Footer Useful Links**. Until you do, the theme shows a built in menu that mirrors the current site map.
5. **Appearance > Customize > Activate: Business Details** to edit phone, email, address, hours, booking and waiver URLs, form recipient, social links, or to paste a form plugin shortcode.

## What's included

| File | Purpose |
| --- | --- |
| `header.php` | Global header: top bar, sticky nav with dropdowns, phone icon (circular border, dark background) beside the hamburger, off canvas mobile menu |
| `footer.php` | Global contact section (info, Google Map, form) directly above the footer, footer columns, floating mobile Call Now button |
| `front-page.php` | Homepage sections (see below) |
| `template-parts/enquiry-form.php` | Shared enquiry form (hero and contact versions) |
| `template-parts/contact-section.php` | Contact info, Google Map embed and form |
| `inc/enquiry.php` | Form handler: nonce, honeypot, time trap, `wp_mail()` delivery, `abh_enquiry_submitted` hook for CRM integrations |
| `inc/customizer.php` | Editable business details |
| `inc/helpers.php` | Image map, options, helpers |
| `assets/css/main.css` | All styles |
| `assets/js/main.js` | Interactions (vanilla JS, no jQuery) |

## Homepage sections

1. **Hero**: H1, intro, Book Tickets and Plan a Birthday Party CTAs plus trust points on the left, enquiry form on the right. Content shows immediately (no reveal animation).
2. Animated activity ticker
3. Intro with image collage and count up stats
4. Activities bento grid (every card fully clickable)
5. Draggable "Inside the Arena" challenge gallery
6. Birthday parties feature
7. Groups and functions cards (fully clickable)
8. How it works (3 steps) with Book and Waiver CTAs
9. Video (Vimeo loads on click for speed)
10. Passes and gift cards (fully clickable)
11. Facilities grid
12. FAQs
13. Latest news (pulls the 3 most recent posts)
14. Final CTA band
15. Contact info, Google Map and form (global, just above the footer)

## Design rules applied

- Container max width 1440px on desktop and laptop, 1880px on screens 1920px and wider.
- Centred titles and paragraphs have no max width.
- All CTAs use solid backgrounds (no transparent buttons).
- No em dashes anywhere in content or eyebrows.
- Scroll reveal, parallax, count up, marquee, hover and shine effects, all disabled for users who prefer reduced motion.
- No analytics code in the header.

## Images

All imagery is the real Activate by Hardrock photography from the existing media library (`/media/...`). The map lives in `abh_img()` in `inc/helpers.php`. To self host any image, drop a file with the same name into `activate-hardrock/assets/images/` and the theme uses it automatically.

## Forms

The built in form emails the address set in the Customizer (default `info@activatebyhardrock.com.au`). For reliable delivery, install an SMTP plugin (e.g. WP Mail SMTP). To use Contact Form 7, Gravity Forms or similar instead, paste its shortcode into **Customize > Activate: Business Details > Optional form shortcode**.

## Content to confirm with the client

- FAQ answers (what to wear, viewing areas) are general guidance.
- Opening hours text points to the booking page; replace it with real hours if preferred.
- "Leap of Faith" and "Vertical Drop Slide" cards link to `/clip-n-climb/`; update if dedicated pages exist.
