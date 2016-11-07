<?php // Content Part ?>

<div class="col-6">

  <img src="<?php bloginfo('template_url');?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">

  <h2 class="white">
    <?php the_sub_field('headline'); ?>
  </h2>

  <?php the_sub_field('content');

  if( get_sub_field('button_destination') === 'internal' ):
    $button_link = get_sub_field('internal_link');
  else:
    $button_link = get_sub_field('external_link');
  endif;

  $button_text = get_sub_field('button_text');
  ?>

  <a href="<?php echo $button_link;?>" class="button button--blue">
    <?php echo $button_text; ?>
  </a>

</div>
