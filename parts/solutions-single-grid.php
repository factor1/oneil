<?php // Solutions Single Grid

// get the page slug
global $post;
$post_slug=$post->post_name;

// WP_Query arguments
$args = array (
	'post_type'              => array( 'our_work' ),
	'work_category'          => $post_slug,
	'nopaging'               => true,
	'posts_per_page'         => '-1',
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>

  <section class="container part--solutions-single-grid">
    <div class="row">
      <div class="col-12">
        <div class="sm-block-grid-1 block-grid-3">
          <?php while( $query->have_posts() ): $query->the_post(); ?>
            <div class="col">
              <div class="solution-work-container" style="background: url(<?php featuredURL('profile-image');?>) center center no-repeat;">
                <div class="solution-overlay">
                  <span class="post-data">
                    <?php the_time('F d, Y'); ?>
                  </span>
                  <h4>
                    <a href="<?php the_permalink();?>">
                      <?php the_title();?>
                    </a>
                  </h4>

                  <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

                  <?php if( have_rows('capability_icons') ): ?>
                    <div class="capability-icons">
                      <?php while( have_rows('capability_icons') ): the_row(); ?>
                        <img src="<?php the_sub_field('icon');?>" alt="" role="presentation">
                      <?php endwhile; ?>
                    </div>
                  <?php endif;?>

                </div>
              </div>
            </div>
          <?php endwhile;?>
        </div>
      </div>
    </div>
  </section>

<?php endif; wp_reset_postdata();
