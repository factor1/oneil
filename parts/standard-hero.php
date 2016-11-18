<?php // Standard Hero

if( is_singular() && !has_post_thumbnail() ):
  // ssshhh
else: ?>

  <section class="standard-hero" style="background: url(<?php featuredURL('standard-hero');?>) center center no-repeat;"></section>

<?php
endif;
