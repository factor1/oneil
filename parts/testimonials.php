<?php // Testimonial Part

$bgcolor = get_field('testimonial_background_color');
$yellow = 'f0b323';
$red = 'f4364c';
$drkGrey = '333f48';

if( $bgcolor === $drkGrey ){
	$testimonial_class = 'drkGrey';
	$line_color = 'white';
} elseif ($bgcolor === $yellow) {
		$testimonial_class = 'yellow';
		$line_color = 'black';
} elseif ($bgcolor === $red) {
		$testimonial_class = 'red';
		$line_color = 'black';
}

// WP_Query arguments
$args = array (
	'post_type'              => array( 'simple_testimonials' ),
	'nopaging'               => true,
	'posts_per_page'         => '5',
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>

<section class="container testimonials--container <?php echo $testimonial_class; ?>" style="background-color: #<?php echo $bgcolor;?>;">
  <div class="row">
    <div class="col-10 col-centered">
      <div class="testimonials--slider">
        <?php while( $query->have_posts() ): $query->the_post();?>

          <div class="slide">
            <div class="row">
              <div class="col-4 text-center">
                <div class="testimonial-image" style="background: url(<?php featuredURL('testimonial-thumb');?>) center center no-repeat;">
                </div>
              </div>
              <div class="col-8 testimonial-content">
                <img src="<?php bloginfo('template_url');?>/assets/img/line-<?php echo $line_color;?>.svg" alt="" role="presentation" class="slant">
                <?php the_field('testimonial'); ?>
                <h3>
                  <?php the_field('citation');?>
                </h3>
                <a href="<?php the_field('citation_link');?>">
                  <?php the_field('citation_link_text');?>
                </a>
              </div>
            </div>
          </div>

        <?php endwhile;?>
      </div>
    </div>
  </div>
</section>

<?php endif; wp_reset_postdata();
