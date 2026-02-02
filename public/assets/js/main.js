const swiper = new Swiper('#hero-slider', {
  loop: true,
  speed: 800,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  effect: 'slide',
  on: {
    init: function () {
      resetAllSlides();
      animateActiveSlide();
    },
    slideChangeTransitionStart: function () {
      resetAllSlides();
    },
    slideChangeTransitionEnd: function () {
      animateActiveSlide();
    }
  }
});

// Reset all slides
function resetAllSlides() {
  document.querySelectorAll('#hero-slider .swiper-slide .slide-content').forEach(content => {
    const title = content.querySelector('.slide-title');
    const desc = content.querySelector('.slide-desc');
    const btn = content.querySelector('.slide-btn');

    content.style.opacity = '0';
    if(title) { title.style.opacity = '0'; title.style.transform = 'translateY(20px)'; }
    if(desc) { desc.style.opacity = '0'; desc.style.transform = 'translateY(20px)'; }
    if(btn)  { btn.style.opacity = '0'; btn.style.transform = 'translateY(20px)'; }
  });
}

// Animate current active slide
function animateActiveSlide() {
  const activeSlide = document.querySelector('#hero-slider .swiper-slide-active');
  if(!activeSlide) return;

  const content = activeSlide.querySelector('.slide-content');
  const title = content.querySelector('.slide-title');
  const desc = content.querySelector('.slide-desc');
  const btn = content.querySelector('.slide-btn');

  content.style.opacity = '1';
  if(title) { title.style.opacity = '1'; title.style.transform = 'translateY(0)'; }
  if(desc)  { setTimeout(() => { desc.style.opacity = '1'; desc.style.transform = 'translateY(0)'; }, 150); }
  if(btn)   { setTimeout(() => { btn.style.opacity = '1'; btn.style.transform = 'translateY(0)'; }, 300); }
}

document.addEventListener("DOMContentLoaded", function() {
  const swiper = new Swiper('#hero-slider', {
    loop: true,
    speed: 800,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    effect: 'slide',
    on: {
      init: function () { resetAllSlides(); animateActiveSlide(); },
      slideChangeTransitionStart: function () { resetAllSlides(); },
      slideChangeTransitionEnd: function () { animateActiveSlide(); }
    }
  });

  function resetAllSlides() {
    document.querySelectorAll('#hero-slider .swiper-slide .slide-content').forEach(content => {
      const title = content.querySelector('.slide-title');
      const desc = content.querySelector('.slide-desc');
      const btn = content.querySelector('.slide-btn');
      content.style.opacity = '0';
      if(title) title.style.opacity = '0', title.style.transform = 'translateY(20px)';
      if(desc)  desc.style.opacity = '0', desc.style.transform = 'translateY(20px)';
      if(btn)   btn.style.opacity = '0', btn.style.transform = 'translateY(20px)';
    });
  }

  function animateActiveSlide() {
    const activeSlide = document.querySelector('#hero-slider .swiper-slide-active');
    if(!activeSlide) return;
    const content = activeSlide.querySelector('.slide-content');
    const title = content.querySelector('.slide-title');
    const desc = content.querySelector('.slide-desc');
    const btn = content.querySelector('.slide-btn');

    content.style.opacity = '1';
    if(title) title.style.opacity = '1', title.style.transform = 'translateY(0)';
    if(desc)  setTimeout(() => { desc.style.opacity = '1'; desc.style.transform = 'translateY(0)'; }, 150);
    if(btn)   setTimeout(() => { btn.style.opacity = '1'; btn.style.transform = 'translateY(0)'; }, 300);
  }
});

document.addEventListener("DOMContentLoaded", () => {
  // Modal elements
  const modal = document.getElementById("doctorModal");
  const closeBtn = document.getElementById("closeModal");
  const modalImage = document.getElementById("modalImage");
  const modalName = document.getElementById("modalName");
  const modalRole = document.getElementById("modalRole");
  const socialsContainer = document.getElementById("modalSocials");
  const tabs = document.querySelectorAll(".doctor-tabs .tab");
  const contents = document.querySelectorAll(".tab-content");

  let doctorsData = [];

  // Fetch doctor data
  fetch("./json/doctors.json")
    .then(res => res.json())
    .then(data => {
      doctorsData = data;
    })
    .catch(err => console.error("Error loading doctors.json:", err));

  // Event delegation for all View Profile buttons
  document.querySelector(".team-slider").addEventListener("click", e => {
    const btn = e.target.closest(".view-profile");
    if (!btn) return;

    const doctorId = btn.dataset.id;
    const doctor = doctorsData.find(d => d.id == doctorId);
    if (!doctor) return;

    // Populate modal
    modalImage.src = doctor.image;
    modalImage.alt = `${doctor.name} – ${doctor.role}`;
    modalName.textContent = doctor.name;
    modalRole.textContent = doctor.role;

    document.getElementById("bio").textContent = doctor.fullBio;
    document.getElementById("experience").textContent = doctor.experience;
    document.getElementById("education").textContent = doctor.education;
    document.getElementById("schedule").textContent = doctor.schedule;

    // Socials
    socialsContainer.innerHTML = "";
    Object.entries(doctor.social).forEach(([key, value]) => {
      if (!value) return;
      const icon = key === "facebook" ? "fa-facebook-f" :
                   key === "linkedin" ? "fa-linkedin-in" :
                   key === "x" ? "fa-x" : "";
      if (icon) {
        socialsContainer.innerHTML += `
          <a href="${value}" target="_blank" aria-label="${key}">
            <i class="fa-brands ${icon}"></i>
          </a>`;
      }
    });

    // Show modal
    modal.classList.add("active");
    document.body.style.overflow = "hidden";

    // Reset tabs
    tabs.forEach(t => t.classList.remove("active"));
    contents.forEach(c => c.classList.remove("active"));
    if (tabs[0] && contents[0]) {
      tabs[0].classList.add("active");
      contents[0].classList.add("active");
    }
  });

  // Close modal
  const closeModal = () => {
    modal.classList.remove("active");
    document.body.style.overflow = "";
  };

  closeBtn.addEventListener("click", closeModal);
  modal.addEventListener("click", e => {
    if (e.target === modal) closeModal();
  });

  // Tabs
  tabs.forEach(tab => {
    tab.addEventListener("click", () => {
      tabs.forEach(t => t.classList.remove("active"));
      contents.forEach(c => c.classList.remove("active"));
      tab.classList.add("active");
      const content = document.getElementById(tab.dataset.tab);
      if (content) content.classList.add("active");
    });
  });

  // Initialize Swiper
  new Swiper(".team-slider", {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: false,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 15 },
      1024: { slidesPerView: 2, spaceBetween: 20 },
      1280: { slidesPerView: 3, spaceBetween: 30 },
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".testimonial-slider", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 5000,        // 5 seconds per slide
      disableOnInteraction: false, // Continue autoplay after user interacts
    },
    pagination: { 
      el: ".swiper-pagination", 
      clickable: true 
    },
    navigation: { 
      nextEl: ".swiper-button-next", 
      prevEl: ".swiper-button-prev" 
    },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 15 },
      1024: { slidesPerView: 2, spaceBetween: 20 },
      1280: { slidesPerView: 2, spaceBetween: 30 },
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const servicesSwiper = new Swiper(".services-slider", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 15 },
      1024: { slidesPerView: 2, spaceBetween: 20 },
      1280: { slidesPerView: 3, spaceBetween: 30 },
    },
  });
});

