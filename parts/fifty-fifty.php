<?php // Fifty Fifty Content Part ?>

<section class="container part--fifty-fifty">
  <div class="row row--full-width">
    <div class="col-6 stretch">
      <div>
        <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
        <h3>
          <?php the_field('headline_5050');?>
        </h3>
        <?php the_field('content_5050'); ?>
      </div>
    </div>
    <div class="col-6 stretch">
      <div>
        <img src="<?php the_field('image_5050');?>" alt="" role="presentation">
      </div>
    </div>
  </div>
</section>
