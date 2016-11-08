<?php // Staff Grid Part ?>

<section class="container staff-grid">
  <div class="staff-loader container container--justify-content-center">
    <div class="row">
      <div class="col-10 col-centered text-center">
        <img src="<?php bloginfo('template_url');?>/assets/img/loading.svg" alt="Loading">
      </div>
    </div>
  </div>
  <div class="row row--justify-content-center">
    <div class="col-4 text-center">
      <div id="staff-image-featured" class="staff-image-featured"></div>
    </div>
    <div id="staff-details-featured" class="col-6">

      <img src="<?php bloginfo('template_url'); ?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">

      <h2 id="staff-name">
      </h2>

      <h5 id="staff-title">
      </h5>

      <div id="staff-bio">
      </div>

    </div>
  </div>
  <div class="row">
    <div id="block-grid-container" class="col-8 col-centered text-center">
      <div id="staff-block-grid" class="sm-block-grid-2 block-grid-4">
      </div>
    </div>
  </div>
</section>
