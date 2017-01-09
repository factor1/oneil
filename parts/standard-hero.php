<?php // Standard Hero

if( is_singular() && !has_post_thumbnail() ):
  // ssshhh

elseif( is_home() ): ?>

  <section class="standard-hero" style="background: url(<?php bloginfo('template_url');?>/assets/img/News-press.jpg) center center no-repeat;"></section>

<?php elseif( is_search() ): ?>

  <section class="standard-hero" style="background: url(<?php bloginfo('template_url');?>/assets/img/search-results.jpg) center center no-repeat;"></section>

<?php else: ?>

  <section class="standard-hero" style="background: url(<?php featuredURL('standard-hero');?>) center center no-repeat;"></section>

<?php
endif;
