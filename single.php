<?php
  /**
   * The single post template.
   *
   * Used when a single post is queried.
   */
  get_header();

  get_template_part('parts/standard-hero');

  get_template_part('parts/breadcrumbs');

  ?>

  <section class="container part--intro-content">
    <div class="row">
      <div class="col-10 col-centered text-center">
        <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
        <br>
        <span class="post-data">
          <?php the_time('F d, Y'); ?>
        </span>
        <h1>
          <?php the_title(); ?>
        </h1>
        <?php the_content(); ?>
      </div>
    </div>
  </section>

  <?php
  get_template_part('parts/testimonials');
?>



<?php
  get_footer();
