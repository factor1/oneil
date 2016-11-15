<?php // Default Slider

if( have_rows('default_slider') ):
?>

<section class="container part--default-slider">
  <div class="row">
    <div class="col-10 col-centered">
      <div id="default-page-slider">
        <?php while( have_rows('default_slider') ): the_row();

        // get image info
        $image_id = get_sub_field('image');
        $image_size = 'standard-hero';
        $image_array = wp_get_attachment_image_src($image_id, $image_size);
        $image_url = $image_array[0];

        // get permalink
        $permalink = get_sub_field('link');
        ?>
          <div class="slide">

            <div class="work-image" style="background: url(<?php echo $image_url; ?>) center center no-repeat;"></div>

            <?php // Work Content Container ?>
            <div class="work-content">

              <span class="post-data">
                <?php the_field('date'); ?>
              </span>
              <h4>
                <a href="<?php echo $permalink;?>">
                  <?php the_sub_field('headline');?>
                </a>
              </h4>

              <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

              <?php the_sub_field('content'); ?>

              <a href="<?php echo $permalink;?>" class="permalink">
                Go To Project
              </a>

            </div>

          </div>
        <?php endwhile;?>
      </div>

    </div>
  </div>
</section>

<?php endif;
