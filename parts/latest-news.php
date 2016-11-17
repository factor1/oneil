<?php // Latest News
// WP_Query arguments
$args = array (
	'post_type'              => array( 'post' ),
	'nopaging'               => false,
	'posts_per_page'         => '3',
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>

<section class="container part--latest-news">
  <div class="row">
    <div class="col-12">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">
      <h2 class="white">
        What's New At O'Neil
      </h2>
      <h5>
        <a href="<?php echo get_home_url();?>/news/" class="white">
          View All News Stories
        </a>
      </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="sm-block-grid-1 block-grid-3">
        <?php while( $query->have_posts() ): $query->the_post();?>
          <div class="col stretch news-post-col">
            <span class="post-data">
              <?php the_time('F d, Y'); ?>
						</span>
						<h4>
							<a href="<?php the_permalink();?>" class="white">
								<?php the_title(); ?>
							</a>
						</h4>
						<img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
						<?php the_excerpt(); ?>
          </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>
</section>

<?php endif; wp_reset_postdata();
