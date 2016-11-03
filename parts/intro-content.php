<?php // Intro Content ?>

<section class="container part--intro-content">
  <div class="row">
    <div class="col-10 col-centered text-center">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h1>
        <?php the_field('intro_content_headline'); ?>
      </h1>
      <?php the_field('intro_content'); ?>
    </div>
  </div>
</section>
