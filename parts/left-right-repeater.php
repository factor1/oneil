<?php // Left / Right Repeater
if( have_rows('left_right_repeater') ):
?>

<section class="container part--left-right-repeater">
  <?php while( have_rows('left_right_repeater') ): the_row(); ?>
    <div class="row">

      <?php
      if( get_sub_field('image_position') === 'left' ):
        get_template_part('parts/icon-part');
        get_template_part('parts/content-part');
      else:
        get_template_part('parts/content-part');
        get_template_part('parts/icon-part');
      endif;
      ?>

    </div>
  <?php endwhile;?>
</section>

<?php endif;
