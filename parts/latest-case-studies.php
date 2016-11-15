<?php // Latest Case Studies

// WP_Query arguments
$args = array (
	'post_type'              => array( 'our_work' ),
	'work_category'          => 'case-studies',
	'nopaging'               => true,
	'posts_per_page'         => '3',
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>

<section class="container latest-case-studies">
  <div class="row">
    <div class="col-12">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h2>
        Latest Case Studies
      </h2>
      <h5>
        <a href="<?php echo get_home_url();?>/case-studies/">
          View All Case Studies
        </a>
      </h5>
    </div>
  </div>
  <div class="row latest-case-study--row">
    <?php while( $query->have_posts() ): $query->the_post(); ?>
      <div class="col-4 stretch">
        <a href="<?php the_permalink();?>">
          <div class="case-study--image" style="background: url(<?php featuredURL('latest-case-study');?>) center center no-repeat;"></div>
        </a>
        <div class="case-study--content">
          <span class="post-data">
            <?php the_time('F d, Y'); ?>
          </span>
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
    <?php endwhile; ?>
  </div>
</section>

<?php endif; wp_reset_postdata();
