<?php
/* Template Name: BigSend */
get_header();

// get template parts
get_template_part('parts/standard-hero');
get_template_part('parts/breadcrumbs');
get_template_part('parts/intro-content');
?>

<section class="container">
  <div class="row">
    <div class="col-8 col-centered">
      <?php get_template_part('parts/big-send'); ?>
    </div>
  </div>
</section>
<?php

get_footer();
