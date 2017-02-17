<?php // Our Work Slider ?>

<section class="container our-work--slider-container">
  <div class="row row--full-width">
    <div class="col-4 stretch">
      <h4>
        <a href="<?php the_permalink();?>">
          <?php the_title();?>
        </a>
      </h4>

      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

      <?php the_excerpt(); ?>
    </div>
    <div class="col-8 col-no-pad stretch">
      <?php if( have_rows('image_slider') ): ?>
        <div class="our-work--slider">
          <?php while( have_rows('image_slider') ): the_row();

            // get slider image size from ACF
            $image_id = get_sub_field('image');
            // and the image size you want to return
            $image_size = 'case-study-slider';
            $image_array = wp_get_attachment_image_src($image_id, $image_size);
            $image_url = $image_array[0];
          ?>
            <div class="slide" style="background: url(<?php echo $image_url;?>) center center no-repeat;">
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif;?>
    </div>
  </div>
</section>
