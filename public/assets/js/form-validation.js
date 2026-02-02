// form-validation.js - simple accessible validation for contact form
(function(){
    'use strict';
    function qs(sel){ return document.querySelector(sel); }
    const form = qs('form.contact-form');
    if(!form) return;
  
    form.addEventListener('submit', function(e){
      const name = form.querySelector('[name="name"]');
      const email = form.querySelector('[name="email"]');
      const message = form.querySelector('[name="message"]');
      let valid = true;
      [name,email,message].forEach(el => {
        if(!el.value.trim()){ valid = false; el.classList.add('input-error'); }
        else el.classList.remove('input-error');
      });
      // basic email check
      if(email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){ valid=false; email.classList.add('input-error'); }
      if(!valid){
        e.preventDefault();
        const first = form.querySelector('.input-error');
        if(first) first.focus();
      }
    });
  })();
  