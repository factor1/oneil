<?php // Work Samples Slider ?>

<section class="container work-samples">
  <div class="row">
    <div class="col-8 col-centered text-center">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">
      <h3>
        Work Samples
      </h3>
      <?php the_field('work_samples_intro'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-10 col-centered">
      
      <div class="staff-loader">
        <img src="<?php bloginfo('template_url');?>/assets/img/loading.svg" alt="Loading...">
      </div>

      <div id="work-samples-slider">
      </div>
      <div id="work-samples-nav">
      </div>
    </div>
  </div>
</section>
