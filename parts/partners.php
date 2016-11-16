<?php // Partners Slider

if( have_rows('partners_slider') ):
?>

<section class="container part--partners">
  <div class="row">
    <div class="col-10 col-centered text-center">
      <h2>
        Our Partners
      </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-10 col-centered">
      <div class="partners-slider">
        <?php while( have_rows('partners_slider') ): the_row(); ?>
          <div class="partner-slide">
            <a href="<?php the_sub_field('partner_link');?>">
              <img src="<?php the_sub_field('partner_image');?>">
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>

<?php endif;
