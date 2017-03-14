<?php // Featured Case Study Slider

// query posts
// WP_Query arguments
$args = array (
	'post_type'              => array( 'our_work' ),
	'work_category'          => 'case-studies',
	'tag'                    => 'featured',
	'nopaging'               => true,
	'posts_per_page'         => '3',
);

// The Query
$query = new WP_Query( $args );

if( $query-> have_posts() ):
?>

<section class="container featured-case-study">
  <div class="row">
    <div class="col-12">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h2>
        Featured Case Study
      </h2>
      <h5>
        <a href="<?php echo get_home_url();?>/case-studies/">
          View All Case Studies
        </a>
      </h5>
    </div>
  </div>

  <?php // SLIDER ?>
  <div class="row">
    <div class="col-10 col-centered">
      <div id="featured-case-study-slider">
        <?php while( $query->have_posts() ): $query->the_post(); ?>
          <div class="case-study-slide">

            <div class="work-image" style="background: url(<?php featuredURL();?>) center center no-repeat;"></div>

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

          </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>

</section>

<?php endif; wp_reset_postdata();
