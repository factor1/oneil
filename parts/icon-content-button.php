<?php // Icon - Content - Button ?>

<section class="container part--icb">
  <div class="row">
    <div class="col-10 col-centered text-center">

      <img src="<?php the_field('icb_content_icon');?>" class="content-icon" role="presentation" alt="">

      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

      <h2 class="white">
        <?php the_field('icb_headline');?>
      </h2>

      <?php the_field('icb_content');?>

      <?php // button logic
      $button_destination = get_field('icb_button_destination');
      if( $button_destination == 'internal' ){
        $button_link = get_field('icb_button_internal');
      } else {
        $button_link = get_field('icb_button_external');
      }
      ?>
      <a href="<?php echo $button_destination;?>" class="button button--white">
        <?php the_field('icb_button_text'); ?>
      </a>

    </div>
  </div>
</section>
