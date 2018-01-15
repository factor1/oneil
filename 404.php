<?php
  /**
   * The 404 Not Found template.
   *
   * Used when WordPress encounters an unknown URL.
   */
  get_header();
?>

  <section class="container container--justify-content-center error-404">
    <div class="row">
      <div class="col-10 col-centered text-center">
          <h1>
            Sorry, but we could not find the page you were looking for.
          </h1>
          <p>
            You can return to the O’Neil <a href="<?php echo get_home_url();?>/">homepage</a> or use the navigation to help
            get you to where you want to go. If you have arrived here via a broken link
            or would like to send us a message, feel free to <a href="<?php echo get_home_url();?>/contact/">Contact Us</a>.
          </p>
      </div>
    </div>
  </section>

<?php
  get_footer();
