<?php // Latest Work ?>

<section class="container part--latest-work">
  <div class="row">
    <div class="col-12">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">
      <h2 class="white">
        Our Latest Work
      </h2>
      <h5 class="white">
        <a href="#" class="white">
          View All Past Work
        </a>
      </h5>
    </div>
  </div>

  <?php // Query For Latest Work Tagged Featured
    // WP_Query arguments
  $args = array (
  	'post_type'              => array( 'our_work' ),
  	'tag'                    => 'featured',
  	'nopaging'               => true,
  	'posts_per_page'         => '3',
  );

  // The Query
  $query = new WP_Query( $args );

  if( $query->have_posts() ):
  ?>

    <div class="row work-grid-row">

      <?php while( $query->have_posts() ): $query->the_post();?>

        <div class="work-col">

          <div class="work-image" style="background: url(<?php featuredURL('latest-work');?>) center center no-repeat;"></div>

          <?php // Work Content Container ?>
          <div class="work-content">

            <h4>
              <a href="<?php the_permalink();?>">
                <?php the_title();?>
              </a>
            </h4>

            <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

            <?php the_excerpt(); ?>

            <a href="<?php the_permalink();?>" class="permalink">
              Go To Project
            </a>

          </div>
          <?php // End Work Content Container ?>

        </div>

      <?php endwhile; ?>
    </div>

  <?php endif; wp_reset_postdata();?>

</section>
