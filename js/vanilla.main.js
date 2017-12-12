'use strict';

// General functions
function log(logText) {
	console.log(logText);
}

var hasClass = function hasClass(element, cls) {
	return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
};

function addClass(element, cls) {
	if (!hasClass(element, cls)) {
		var empty = '';
		if (element.classList.value != "") empty = ' ';
		element.className += empty + cls;
	}
}

function removeClass(element, cls) {
	if (hasClass(element, cls)) element.classList.remove(cls);
}

function toggleClass(element, cls) {
	hasClass(element, cls) ? removeClass(element, cls) : addClass(element, cls);
}

var exists = function exists(element) {
	return typeof element != 'undefined' && element != null;
};

(function () {
	document.addEventListener("DOMContentLoaded", function () {

		var classes = {
			active: 'active',
			menuActive: 'vnav__menu_active'

			
		};

		if( exists(document.querySelector('.vsite-header') ) ){
			var header = document.querySelector('.vsite-header');
			header.setAttribute('data-emergence', 'hidden');
		}
		
		// Initialize scrolling effects
		emergence.init();

		// Anchors links
		function scrollTo(element, to, duration) {
			if (duration <= 0) return;
			var difference = to - element.scrollTop - 75;
			var perTick = difference / duration * 10;
			setTimeout(function () {
				element.scrollTop = element.scrollTop + perTick;
				if (element.scrollTop === to) return;
				scrollTo(element, to, duration - 10);
			}, 10);
		}

		// Anchors
		var anchors = document.getElementsByClassName('anchor');

		for (var _i = 0; _i < anchors.length; _i++) {
			anchors[_i].addEventListener('click', function (e) {
				e.preventDefault();
				var href = this.getAttribute("href").replace("#", "");
				var scrollAnchor = document.getElementById(href);
				scrollTo(document.body, scrollAnchor.offsetTop, 600);
			});
		}

		// Navigation
		var jsNav = document.getElementById('navigation');

		// Navigation links
		var jsNavLinks = document.querySelectorAll('.vnav__menu a[href*="#"]');

		for (var i = 0; i < jsNavLinks.length; i++) {
			jsNavLinks[i].addEventListener('click', function (e) {
				e.preventDefault();

				var vnavhref = this.getAttribute("href").replace("#", "");
				var vnavscrollAnchor = document.getElementById(vnavhref);

				removeClass(jsNavBtn, classes.active);
				removeClass(jsNav, classes.menuActive);

				scrollTo(document.body, vnavscrollAnchor.offsetTop, 600);
			});
		}

		// Button HAMBURGER
		var jsNavBtn = document.getElementById('js-vnav__btn');

		if (exists(jsNavBtn)) {
			jsNavBtn.addEventListener('click', function () {
				toggleClass(this, classes.active);
				toggleClass(jsNav, classes.menuActive);
			});
		}

		// Click on toggle element in navigation
		var jsNavText = document.getElementById('js-vnav-addition');
		if (exists(jsNavText)) {
			jsNavText.addEventListener('click', function () {
				toggleClass(this, classes.active);
			});
		}


		// Window scrolling JS
		var jsNavWrapper = document.getElementById('nav-wrapper');
		function checkScroll(){
			var windowScroll = window.scrollY;
			windowScroll > 0 ? addClass(jsNavWrapper, 'vnav_scrolled') : removeClass(jsNavWrapper, 'vnav_scrolled');
		}
		checkScroll()
		window.addEventListener("scroll", checkScroll);

	});
})();