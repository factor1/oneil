<?php
// Template Name: Landing
get_header();
?>

<section class="landing-content">
	<div class="content-header">
		<div class="container">
			<img src="<?php bloginfo('template_url');?>/assets/img/logo.svg" alt="logo" class="logo">
		</div>
	</div>
	<figure class="background-wrap">
		<div class="overlay"></div>
		<?php $background = get_field('background_image')[0]['desktop_image']['url']; ?>
		<div style="background-image:url(<?php echo $background; ?>);" class="background"></div>
	</figure>
	<div class="content">
		<div class="content-inner">
			<div class="fl-col fl-col-8">
				<div class="inner">
					<?php $title = get_field('title') ?: the_title('','',false); ?>
					<h1 class="title"><?php echo $title; ?></h1>
					<p class="sub-text"><?php the_field('sub_text'); ?></p>
					<ul class="bullet-items">
						<li>
							<p>Updated indoor/outdoor signage increases average sales by 10%</p>
						</li>
						<li>
							<p>Built to last through hot/cold seasons withstanding sunlight</p>
						</li>
						<li>
							<p>Ability to print on unique substrates like acrylic and wood</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="fl-col fl-col-4">
				<p class="center form-call-to-action"><?php the_field('form_call_to_action'); ?></p>
				<?php gravity_form( get_field('form_id'), $display_title = false, $display_description = false ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>