/**
 * Activate by Hardrock: interactions.
 * Vanilla JS, no dependencies.
 */
(function () {
	'use strict';

	var doc = document.documentElement;
	doc.classList.add('js');

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	/* ---------- Sticky header state + scroll progress + back to top ---------- */
	var header = document.querySelector('[data-header]');
	var progress = document.querySelector('[data-progress]');
	var toTop = document.querySelector('[data-to-top]');
	var ticking = false;

	function onScroll() {
		var y = window.scrollY || window.pageYOffset;
		var max = document.body.scrollHeight - window.innerHeight;
		if (header) header.classList.toggle('is-scrolled', y > 20);
		if (progress) progress.style.transform = 'scaleX(' + (max > 0 ? Math.min(y / max, 1) : 0) + ')';
		if (toTop) toTop.classList.toggle('is-visible', y > 800);
		if (!reduceMotion) parallax();
		ticking = false;
	}
	window.addEventListener('scroll', function () {
		if (!ticking) {
			window.requestAnimationFrame(onScroll);
			ticking = true;
		}
	}, { passive: true });

	if (toTop) {
		toTop.addEventListener('click', function () {
			window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
		});
	}

	/* ---------- Parallax ---------- */
	var parallaxEls = [].slice.call(document.querySelectorAll('[data-parallax]'));
	function parallax() {
		var vh = window.innerHeight;
		parallaxEls.forEach(function (el) {
			var rect = el.parentElement.getBoundingClientRect();
			if (rect.bottom < 0 || rect.top > vh) return;
			var speed = parseFloat(el.getAttribute('data-parallax')) || 0.1;
			var offset = (rect.top + rect.height / 2 - vh / 2) * -speed;
			el.style.translate = '0 ' + offset.toFixed(1) + 'px';
		});
	}

	/* ---------- Mobile menu ---------- */
	var menu = document.querySelector('[data-mobile-menu]');
	var toggle = document.querySelector('[data-menu-toggle]');
	var lastFocus = null;

	function openMenu() {
		if (!menu) return;
		lastFocus = document.activeElement;
		menu.classList.add('is-open');
		menu.setAttribute('aria-hidden', 'false');
		toggle.setAttribute('aria-expanded', 'true');
		document.body.classList.add('menu-open');
		var closeBtn = menu.querySelector('.mobile-menu__close');
		if (closeBtn) setTimeout(function () { closeBtn.focus(); }, 50);
	}
	function closeMenu() {
		if (!menu) return;
		menu.classList.remove('is-open');
		menu.setAttribute('aria-hidden', 'true');
		toggle.setAttribute('aria-expanded', 'false');
		document.body.classList.remove('menu-open');
		if (lastFocus) lastFocus.focus();
	}
	if (toggle) toggle.addEventListener('click', openMenu);
	document.querySelectorAll('[data-menu-close]').forEach(function (el) { el.addEventListener('click', closeMenu); });
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && menu && menu.classList.contains('is-open')) closeMenu();
	});
	if (menu) {
		menu.querySelectorAll('.menu-item-has-children > a').forEach(function (a) {
			a.addEventListener('click', function (e) {
				e.preventDefault();
				var li = a.parentElement;
				li.classList.toggle('is-open');
				a.setAttribute('aria-expanded', li.classList.contains('is-open') ? 'true' : 'false');
			});
		});
		menu.querySelectorAll('.sub-menu a, .mobile-menu__foot a').forEach(function (a) {
			a.addEventListener('click', function () {
				if (a.getAttribute('href').charAt(0) === '#') closeMenu();
			});
		});
	}

	/* Desktop dropdown parents with '#' links should not jump */
	document.querySelectorAll('.nav .menu-item-has-children > a[href="#"]').forEach(function (a) {
		a.addEventListener('click', function (e) { e.preventDefault(); });
	});

	/* ---------- Reveal on scroll ---------- */
	var reveals = document.querySelectorAll('.reveal');
	if ('IntersectionObserver' in window && !reduceMotion) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-in');
					io.unobserve(entry.target);
				}
			});
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });
		reveals.forEach(function (el) { io.observe(el); });
	} else {
		reveals.forEach(function (el) { el.classList.add('is-in'); });
	}

	/* ---------- Count up ---------- */
	var counters = document.querySelectorAll('[data-count]');
	function runCount(el) {
		var target = parseInt(el.getAttribute('data-count'), 10) || 0;
		var suffix = el.getAttribute('data-suffix') || '';
		var start = null;
		var dur = 1600;
		function step(ts) {
			if (!start) start = ts;
			var p = Math.min((ts - start) / dur, 1);
			var eased = 1 - Math.pow(1 - p, 3);
			el.textContent = Math.round(target * eased) + suffix;
			if (p < 1) window.requestAnimationFrame(step);
		}
		window.requestAnimationFrame(step);
	}
	if ('IntersectionObserver' in window && !reduceMotion) {
		var co = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					runCount(entry.target);
					co.unobserve(entry.target);
				}
			});
		}, { threshold: 0.6 });
		counters.forEach(function (el) { co.observe(el); });
	}

	/* ---------- Challenge strip: buttons + drag to scroll ---------- */
	var strip = document.querySelector('[data-strip]');
	if (strip) {
		document.querySelectorAll('[data-slide]').forEach(function (btn) {
			btn.addEventListener('click', function () {
				var item = strip.querySelector('.strip__item');
				var w = item ? item.getBoundingClientRect().width + 20 : 400;
				strip.scrollBy({ left: w * parseInt(btn.getAttribute('data-slide'), 10), behavior: 'smooth' });
			});
		});
		var down = false, startX = 0, startScroll = 0, moved = false;
		strip.addEventListener('pointerdown', function (e) {
			if (e.pointerType !== 'mouse') return;
			down = true; moved = false; startX = e.clientX; startScroll = strip.scrollLeft;
			strip.classList.add('is-dragging');
		});
		window.addEventListener('pointermove', function (e) {
			if (!down) return;
			var dx = e.clientX - startX;
			if (Math.abs(dx) > 4) moved = true;
			strip.scrollLeft = startScroll - dx;
		});
		window.addEventListener('pointerup', function () {
			if (!down) return;
			down = false;
			strip.classList.remove('is-dragging');
		});
		strip.addEventListener('click', function (e) { if (moved) e.preventDefault(); }, true);
	}

	/* ---------- Video: load Vimeo on demand ---------- */
	document.querySelectorAll('[data-video]').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var iframe = document.createElement('iframe');
			iframe.src = btn.getAttribute('data-video');
			iframe.title = 'Activate by Hardrock video';
			iframe.allow = 'autoplay; fullscreen; picture-in-picture';
			iframe.allowFullscreen = true;
			btn.parentElement.appendChild(iframe);
			btn.remove();
		});
	});

	/* ---------- Smooth scroll for in-page links ---------- */
	document.querySelectorAll('a[href^="#"]').forEach(function (a) {
		a.addEventListener('click', function (e) {
			var id = a.getAttribute('href');
			if (id.length < 2) return;
			var target = document.querySelector(id);
			if (!target) return;
			e.preventDefault();
			target.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
			var field = target.querySelector('input:not([type="hidden"]):not([tabindex="-1"])');
			if (field) setTimeout(function () { field.focus({ preventScroll: true }); }, 600);
		});
	});

	/* ---------- Form validation ---------- */
	document.querySelectorAll('[data-enquiry]').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			var ok = true;
			form.querySelectorAll('[required]').forEach(function (input) {
				var field = input.closest('.field');
				var valid = input.value.trim() !== '' && (input.type !== 'email' || /.+@.+\..+/.test(input.value));
				if (field) field.classList.toggle('is-invalid', !valid);
				if (!valid && ok) { input.focus(); ok = false; }
			});
			if (!ok) { e.preventDefault(); return; }
			var btn = form.querySelector('button[type="submit"]');
			if (btn) { btn.disabled = true; btn.querySelector('span').textContent = 'Sending...'; }
		});
		form.querySelectorAll('input, textarea').forEach(function (input) {
			input.addEventListener('input', function () {
				var field = input.closest('.field');
				if (field) field.classList.remove('is-invalid');
			});
		});
	});

	onScroll();
})();
