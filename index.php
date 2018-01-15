<?php
  /**
   * The default blog / index template.
   */
  get_header();

  get_template_part('parts/standard-hero');

  get_template_part('parts/breadcrumbs');

  get_template_part('parts/intro-content');
?>

<section class="container news-posts">
  <div class="row">
    <div class="col-10 col-centered text-center">
      <div class="dropdown">
        <div class="dropdown--current-selection">
          Filter Stories by Category
        </div>
        <ul id="post-categories">
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="staff-loader"><img src="<?php bloginfo('template_url');?>/assets/img/loading.svg" alt="Loading..."></div>
      <div id="masonry" class="posts-container sm-block-grid-1 block-grid-3 row--justify-content-start"></div>
      <div class="load-more-container"></div>
    </div>
  </div>
</section>


<?php
  get_footer();
