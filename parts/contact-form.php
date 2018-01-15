<?php
// Contact Form

$args = array(
	'post_type'      => array( 'simple_testimonials' ),
	'nopaging'       => true,
	'meta_key'       => 'featured',
	'meta_value'     => '1',
	'posts_per_page' => '5',
);
$query = new WP_Query( $args );

?>

<section class="container contact--form-container">
	<div class="row row--justify-content-center">
		<div class="col-6 stretch contact--benefits">
			<div>
				<h3>Our Commitments</h3>
				<?php the_field( 'benefits_content' ); ?>
			</div>
			<?php if ( $query->have_posts() ): ?>
				<div class="testimonials">
					<h3>Testimonials</h3>
					<?php while ( $query->have_posts() ): $query->the_post(); ?>
						<div class="testimonial-wrap">
							<div class="testimonial">
								<?php the_field( 'testimonial' ); ?>
							</div>
							<p> - <?php the_field( 'citation' ); ?></p>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif;
			wp_reset_postdata(); ?>
		</div>
		<div class="col-6 stretch contact--form">
			<?php the_field( 'form_embed' ); ?>
		</div>
	</div>
</section>
<section class="contact-info container">
	<h2>Contact Info</h2>
	<div class="row row--justify-content-center">
		<div class="col-4 text-center">
			<h3>Office</h3>
			<div itemscope itemtype="http://schema.org/ContactPoint">
				<div itemscope itemtype="schema.org/PostalAddress">
					<span itemprop="streetAddress"><?php the_field( 'street_address', 'option' ); ?><br></span>
					<span itemprop="addressLocality"><?php the_field( 'city', 'option' ); ?>,</span>
					<span itemprop="addressRegion"> <?php the_field( 'state', 'option' ); ?></span>
					<span itemprop="postalCode"><?php the_field( 'zip_code', 'option' ); ?></span>
				</div>
			</div>
		</div>
		<div class="col-4 text-center">
			<h3>Contact</h3>
			<span><?php the_field( 'office_phone_number', 'option' ); ?></span>
		</div>
		<div class="col-4 text-center">
			<h3>Fax</h3>
			<span><?php the_field( 'fax_phone_number', 'option' ); ?></span>
		</div>
	</div>
</section>