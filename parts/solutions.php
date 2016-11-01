<?php // Solutions Template Part ?>

<section class="container part--solutions">
  <div class="row">
    <div class="col-10 col-centered text-center">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h1>
        O'Neil and Our Solutions
      </h1>
      <h6>
        <?php the_field('solutions_copy'); ?>
      </h6>
    </div>
  </div>
  <?php if( have_rows('solutions_grid') ): ?>
    <div class="row">
      <div class="col-12">
        <div class="sm-block-grid-2 block-grid-4 solutions-grid">
          <?php while( have_rows('solutions_grid') ): the_row(); ?>
            <div class="col stretch text-center">
              <div class="icon-container">
                <img src="<?php the_sub_field('solutions_icon');?>" alt="" role="presentation">
              </div>
              <div class="headline-container">
                <h5>
                  <?php the_sub_field('solutions_headline'); ?>
                </h5>
              </div>
            </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  <?php endif;?>
</section>
