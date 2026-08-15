/**
 * Comptoir d’Auguste — theme interactions
 * Header sticky, mobile menu, hero carousel, reveal on scroll.
 */
(function () {
  "use strict";

  function ready(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  ready(function () {
    initHeader();
    initHeroCarousel();
    initFeaturedCarousel();
    initReveal();
    initContactForm();
  });

  function initHeader() {
    var header = document.querySelector("[data-ca-header]");
    if (!header) return;

    var onScroll = function () {
      header.classList.toggle("ca-Header-scrolled", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });

    var toggle = header.querySelector("[data-ca-menu-toggle]");
    var panel = document.getElementById("mobile-menu");
    if (!toggle || !panel) return;

    toggle.addEventListener("click", function () {
      var open = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", open ? "false" : "true");
      toggle.classList.toggle("ca-Header-menuOpen", !open);
      panel.hidden = open;
      panel.classList.toggle("ca-Header-mobileOpen", !open);
      document.body.style.overflow = open ? "" : "hidden";
    });

    panel.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        toggle.setAttribute("aria-expanded", "false");
        toggle.classList.remove("ca-Header-menuOpen");
        panel.hidden = true;
        panel.classList.remove("ca-Header-mobileOpen");
        document.body.style.overflow = "";
      });
    });
  }

  function initHeroCarousel() {
    var root = document.querySelector("[data-ca-hero]");
    if (!root) return;

    var slides = Array.prototype.slice.call(root.querySelectorAll("[data-ca-slide]"));
    var dots = Array.prototype.slice.call(root.querySelectorAll("[data-ca-dot]"));
    var prev = root.querySelector("[data-ca-prev]");
    var next = root.querySelector("[data-ca-next]");
    var index = 0;
    var paused = false;
    var timer = null;

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      slides.forEach(function (slide, n) {
        slide.classList.toggle("ca-Hero-slideActive", n === index);
      });
      dots.forEach(function (dot, n) {
        var active = n === index;
        dot.classList.toggle("ca-Hero-dotActive", active);
        dot.setAttribute("aria-selected", active ? "true" : "false");
      });
    }

    function start() {
      stop();
      timer = window.setInterval(function () {
        if (!paused) goTo(index + 1);
      }, 5200);
    }

    function stop() {
      if (timer) window.clearInterval(timer);
      timer = null;
    }

    dots.forEach(function (dot, n) {
      dot.addEventListener("click", function () {
        goTo(n);
        start();
      });
    });
    if (prev) prev.addEventListener("click", function () { goTo(index - 1); start(); });
    if (next) next.addEventListener("click", function () { goTo(index + 1); start(); });

    root.addEventListener("mouseenter", function () { paused = true; });
    root.addEventListener("mouseleave", function () { paused = false; });

    goTo(0);
    start();
  }

  function initFeaturedCarousel() {
    var root = document.querySelector("[data-ca-featured]");
    if (!root) return;

    var track = root.querySelector("[data-ca-featured-track]");
    var slides = Array.prototype.slice.call(root.querySelectorAll("[data-ca-featured-slide]"));
    var controls = root.querySelector("[data-ca-featured-controls]");
    var dotsWrap = root.querySelector("[data-ca-featured-dots]");
    var prev = root.querySelector("[data-ca-featured-prev]");
    var next = root.querySelector("[data-ca-featured-next]");
    if (!track || !slides.length) return;

    var index = 0;
    var visible = 3;
    var timer = null;

    function visibleCount() {
      if (window.matchMedia("(max-width: 767px)").matches) return 1;
      if (window.matchMedia("(max-width: 1023px)").matches) return 2;
      return 3;
    }

    function maxIndex() {
      return Math.max(0, slides.length - visible);
    }

    function renderDots() {
      if (!dotsWrap) return;
      dotsWrap.innerHTML = "";
      var pages = maxIndex() + 1;
      for (var i = 0; i < pages; i++) {
        var btn = document.createElement("button");
        btn.type = "button";
        btn.setAttribute("role", "tab");
        btn.setAttribute("aria-label", "Page " + (i + 1));
        btn.className = "ca-FeaturedDishes-dot" + (i === index ? " ca-FeaturedDishes-dotActive" : "");
        btn.setAttribute("aria-selected", i === index ? "true" : "false");
        (function (n) {
          btn.addEventListener("click", function () {
            goTo(n);
            start();
          });
        })(i);
        dotsWrap.appendChild(btn);
      }
    }

    function render() {
      visible = visibleCount();
      if (track) track.setAttribute("data-count", String(visible));
      if (index > maxIndex()) index = maxIndex();

      slides.forEach(function (slide, n) {
        var show = n >= index && n < index + visible;
        slide.hidden = !show;
      });

      if (controls) {
        controls.hidden = slides.length <= visible;
      }
      renderDots();
    }

    function goTo(i) {
      var total = maxIndex() + 1;
      index = ((i % total) + total) % total;
      render();
    }

    function start() {
      stop();
      if (slides.length <= visibleCount()) return;
      timer = window.setInterval(function () {
        goTo(index + 1);
      }, 5200);
    }

    function stop() {
      if (timer) window.clearInterval(timer);
      timer = null;
    }

    if (prev) prev.addEventListener("click", function () { goTo(index - 1); start(); });
    if (next) next.addEventListener("click", function () { goTo(index + 1); start(); });
    window.addEventListener("resize", function () {
      render();
      start();
    });

    render();
    start();
  }

  function initReveal() {
    var nodes = document.querySelectorAll(".reveal");
    if (!nodes.length) return;

    if (!("IntersectionObserver" in window)) {
      nodes.forEach(function (n) { n.classList.add("is-visible"); });
      return;
    }

    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.16, rootMargin: "0px 0px -8% 0px" }
    );

    nodes.forEach(function (n) { observer.observe(n); });
  }

  function initContactForm() {
    var form = document.querySelector("[data-ca-contact-form]");
    if (!form) return;
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      var status = form.querySelector("[data-ca-form-status]");
      if (status) status.hidden = false;
    });
  }
})();
