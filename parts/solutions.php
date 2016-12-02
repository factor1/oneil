<?php // Solutions Template Part ?>

<section class="container part--solutions" style="background-color: <?php the_field('solutions_bg_color');?>;">
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
        <div class="sm-block-grid-1 block-grid-4 solutions-grid">
          <?php while( have_rows('solutions_grid') ): the_row(); ?>
            <div class="col stretch text-center">
              <div class="icon-container">
                <a href="<?php the_sub_field('solutions_link');?>">
                  <img src="<?php the_sub_field('solutions_icon');?>" alt="" role="presentation">
                </a>
              </div>
              <div class="headline-container">
                <h5>
                  <a href="<?php the_sub_field('solutions_link');?>">
                    <?php the_sub_field('solutions_headline'); ?>
                  </a>
                </h5>
              </div>
            </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  <?php endif;?>
</section>
