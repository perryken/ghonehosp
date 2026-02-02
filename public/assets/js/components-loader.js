// components-loader.js
// Dynamically load HTML components into elements with data-include
// Executes scripts safely and binds nav/header behaviors

(function () {
    'use strict';
  
    async function loadIncludes() {
      const elements = document.querySelectorAll('[data-include]');
  
      for (const el of elements) {
        const path = el.getAttribute('data-include');
        try {
          const res = await fetch(path);
          if (!res.ok) throw new Error('Fetch error: ' + res.status);
  
          const html = await res.text();
          el.innerHTML = html;
  
          // Execute scripts safely
          const scripts = el.querySelectorAll('script');
          scripts.forEach(s => {
            const ns = document.createElement('script');
            if (s.type) ns.type = s.type;
  
            if (s.src) {
              ns.src = s.src;
              ns.async = false;
            } else if (s.textContent.trim() !== "") {
              ns.textContent = s.textContent;
            }
  
            document.body.appendChild(ns);
            s.remove();
          });
  
        } catch (err) {
          console.error('Include failed:', path, err);
          el.innerHTML = '<!-- component failed to load: ' + path + ' -->';
        }
      }
  
      // Bind nav/header after components are injected
      initHeader();
    }
  
    // NAV, STICKY HEADER, DARK MODE, MOBILE MENU
    function initHeader() {
  
      const navToggle = document.getElementById("nav-toggle");
      const menu = document.getElementById("primary-menu");
  
      // IMPORTANT: Sticky now applies to .header-inner, not .site-header
      const headerInner = document.querySelector('.header-inner');
  
      const darkToggle = document.getElementById("dark-toggle");
  
      /* -------------------------------
         MOBILE MENU TOGGLE
      --------------------------------*/
      if (navToggle && menu && !navToggle.dataset.bound) {
        navToggle.addEventListener("click", () => {
          const isOpen = menu.classList.toggle("open");
          navToggle.setAttribute("aria-expanded", isOpen);
        });
        navToggle.dataset.bound = "true";
      }
  
      /* -------------------------------
         STICKY HEADER BEHAVIOR
         Applies "scrolled" class to <header> 
         But sticky is handled in CSS
      --------------------------------*//* -----------------------------------------
   FIXED HEADER + SHRINK + SLIDE ANIMATION
------------------------------------------*/
const headerRoot = document.querySelector('.site-header');
const logoImg = document.querySelector('.logo img');

if (headerRoot && !headerRoot.dataset.stickyBound) {
  let lastScroll = 0;

  window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;

    // Apply fixed header after 100px
    if (currentScroll > 100) {
      headerRoot.classList.add('fixed-header');
    } else {
      headerRoot.classList.remove('fixed-header');
    }

    // Detect scrolling down to hide, up to show
    if (currentScroll > lastScroll && currentScroll > 150) {
      // scrolling down → hide
      headerRoot.classList.add('header-hidden');
    } else {
      // scrolling up → show
      headerRoot.classList.remove('header-hidden');
    }

    lastScroll = currentScroll;
  });

  headerRoot.dataset.stickyBound = "true";
}

  
      /* -------------------------------
          ACTIVE MENU HIGHLIGHT
      --------------------------------*/
      document.querySelectorAll('.nav-link').forEach(link => {
        if (link.href === window.location.href) {
          link.classList.add("active");
        }
      });
  
      // Handle breadcrumbs visibility and dynamic current page
const breadcrumbs = document.querySelector('nav.breadcrumbs');
if (breadcrumbs && !breadcrumbs.dataset.bound) {
  breadcrumbs.dataset.bound = "true"; // prevent multiple executions

  let path = window.location.pathname.split('/').pop(); // get file name

  // Hide breadcrumbs on home page
  if (path === '' || path === 'index.html') {
    breadcrumbs.style.display = 'none';
  } else {
    breadcrumbs.style.display = 'block';

    // Update current page text
    const breadcrumbsCurrent = breadcrumbs.querySelector('[data-current-page]');
    if (breadcrumbsCurrent) {
      let pageName = path.replace('.html', '').replace(/-/g, ' ');
      pageName = pageName.replace(/\b\w/g, l => l.toUpperCase());
      breadcrumbsCurrent.textContent = pageName;
    }
  }
}


      /* -------------------------------
         DARK MODE TOGGLE
      --------------------------------*/
      if (darkToggle && !darkToggle.dataset.bound) {
        darkToggle.addEventListener("click", () => {
          document.documentElement.classList.toggle("dark");
          localStorage.setItem(
            "theme",
            document.documentElement.classList.contains("dark") ? "dark" : "light"
          );
        });
        darkToggle.dataset.bound = "true";
      }
  
      // Load saved theme
      if (localStorage.getItem("theme") === "dark") {
        document.documentElement.classList.add("dark");
      }
    }
  
    /* ---------------------------------
       INITIAL LOAD
    ----------------------------------*/
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', loadIncludes);
    } else {
      loadIncludes();
    }
  
    /* ---------------------------------
       WATCH FOR DYNAMICALLY ADDED NAV
    ----------------------------------*/
    const observer = new MutationObserver(() => {
      initHeader();
    });
  
    observer.observe(document.body, { childList: true, subtree: true });
  
  })();
  