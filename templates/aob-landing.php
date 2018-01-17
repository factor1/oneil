<?php
// Template Name: AOB Landing
?>

<?php get_header(); ?>

<section class="container part--intro-content">
	<div class="row">
		<div class="col-11 col-centered">
			<div class="row flex-reverse-mobile">
				<div class="col-7">
					<h1><?php the_field( 'intro_content_headline' ); ?></h1>
					<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
					<?php the_field( 'intro_content' ); ?>
				</div>
				<div class="col-5 book-col">
					<div class="book-image">
						<img src="<?php the_field( 'intro_content_image' ); ?>" alt="Accent Image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container about-aob">
	<figure class="background">
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/loader.png" class="responsive"
			 alt="" data-src='{"m":"<?php the_field( 'about_section_mobile_background' ) ?>","d":"<?php the_field( 'about_section_desktop_background' ) ?>"}'
		/>
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/loader.png" alt="background">
	</figure>
	<div class="row row--justify-content-center">
		<div class="col-6 video-col">
			<img src="<?php the_field( 'video_poster_image' ); ?>" class="video-poster" alt="Video Poster">
		</div>
		<div class="col-6">
			<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
			<h2>About the art</h2>
			<?php the_content(); ?>
		</div>
	</div>
</section>

<section class="container past-work">
	<div class="row">
		<div class="col-12 col-centered text-center">
			<h2>Past work</h2>
			<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
			<div class="past-work-slider">
				<?php if ( have_rows( 'work_images' ) ): ?>
					<?php while ( have_rows( 'work_images' ) ): the_row();
						$img = get_sub_field( 'image' );
						?>
						<div class="past-work-slide">
							<img src="<?php echo $img; ?>" alt="Past work Image">
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section class="container aob-contact">
	<div class="row">
		<div class="col-10 col-centered form-wrap">
			<div class="static-header">
				<h2>Request a book.</h2>
			</div>
			<div class="floating-header">
				<h3>Request a book.</h3>
			</div>
			<?php gravity_form( 5, false, false, false, '', true, 12 ); ?>
		</div>
	</div>
</section>

<div class="video-modal">
	<div class="overlay"></div>
	<div class="modal-inner">
		<div class="close">
			<svg viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
				<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
			</svg>
		</div>
		<?php the_field( 'video_embed' ); ?>
	</div>
</div>

<?php get_footer(); ?>
