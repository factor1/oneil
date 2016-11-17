<?php
  /**
   * The search results template.
   *
   * Used when a search is performed.
   */
  get_header();

  get_template_part('parts/standard-hero');

  get_template_part('parts/breadcrumbs');
?>

  <section class="container search-results">

    <div class="row">
      <div class="col-6 col-centered text-center">
        <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
        <h1>
          Search Results
        </h1>
        <h3>
          "<?php echo esc_html( get_search_query( false ) ); ?>"
        </h3>
      </div>
    </div>

    <?php if ( have_posts() ) :
      while( have_posts() ): the_post(); ?>

        <div class="row">
          <div class="col-8 col-centered search-result">
            <h4>
              <?php the_title(); ?>
            </h4>
            <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
            <?php the_excerpt(); ?>
          </div>
        </div>

      <?php endwhile; ?>

      <div class="row">
        <div class="col-10 col-centered text-center">
          <?php the_posts_pagination( array('mid_size' => 2) ); ?>
        </div>
      </div>

    <?php endif; ?>

  </section>

<?php
  get_footer();
