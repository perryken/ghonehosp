<div class="doctor-modal" id="doctorModal" aria-hidden="true">
  <div class="modal-content">

    <button class="modal-close" id="closeModal" aria-label="Close modal">&times;</button>

    <div class="modal-image">
      <img id="modalImage" src="" alt="">
    </div>

    <div class="modal-body">
      <h3 id="modalName"></h3>
      <p class="doctor-role" id="modalRole"></p>

      <div class="doctor-social" id="modalSocials"></div>

      <div class="doctor-tabs">
        <button class="tab active" data-tab="bio">Bio</button>
        <button class="tab" data-tab="experience">Experience</button>
        <button class="tab" data-tab="education">Education</button>
        <button class="tab" data-tab="schedule">Schedule</button>
      </div>

      <div class="tab-content active" id="bio"></div>
      <div class="tab-content" id="experience"></div>
      <div class="tab-content" id="education"></div>
      <div class="tab-content" id="schedule"></div>
    </div>

  </div>
</div>
