<?php
  /**
   * The default page template.
   *
   * Used when a default template individual page is queried.
   */

  get_header();

  get_template_part('parts/standard-hero');

  get_template_part('parts/breadcrumbs');

  get_template_part('parts/intro-content');

  get_template_part('parts/default-slider');

  get_template_part('parts/testimonials');

  get_footer();
