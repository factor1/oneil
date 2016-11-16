<?php // Capabilities Component ?>

<section class="container capabilities text-center">
  <div class="row">
    <div class="col-10 col-centered">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h2>
        <?php the_field('capabilities_headline'); ?>
      </h2>
      <?php the_field('capabilities_content'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-11 col-centered text-center">
      <?php // Capability Icons
      if( have_rows('capability_icons') ):
        while( have_rows('capability_icons') ): the_row();
      ?>
        <img src="<?php the_sub_field('icon');?>" alt="">
      <?php endwhile;
      endif;
      ?>
    </div>
  </div>
</section>
