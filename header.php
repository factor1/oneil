<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:site_name" content="<?php bloginfo('name') ?>">

  <?php
  /* Theme color for browsers that support it
  <meta name="theme-color" content="#000">
  */
  ?>

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>

  <?php if (is_search()) { ?>
   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

  <?php wp_head(); ?>

  <?php // TypeKit ?>
  <script src="https://use.typekit.net/eji2vat.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>

<body <?php body_class(); ?>>

  <?php // Header ?>
  <header>
    <?php
    if( is_page_template('templates/home.php') ):
      get_template_part('parts/nav-home');
    endif;
    get_template_part('parts/nav-global');
    ?>
  </header>

  <?php // Search Container ?>
  <div id="search-container" class="search-container">
    <div class="container container--justify-content-center">
      <div class="row">
        <div class="col-10 col-centered">
          <div class="row">
            <div class="col-10">
              <img src="<?php bloginfo('template_url');?>/assets/img/line-white.svg" alt="" role="presentation" class="slant">
              <p>
                Enter keyword(s) below and hit enter
              </p>
            </div>
            <div class="col-2 text-right">
              <a id="close-search" href="#">
                <img src="<?php bloginfo('template_url');?>/assets/img/close.svg" alt="Close Search" role="button">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="nifty-panel">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php wp_nav_menu(array('theme_location' => 'mobile'));?>

          <div class="mobile-icon-items">
            <a href="#">
              <div>
                <img src="<?php bloginfo('template_url');?>/assets/img/quote.svg" alt="Request a Quote">
              </div>
              <span>Request A Quote</span>
            </a>
            <a href="#">
              <div>
                <img src="<?php bloginfo('template_url');?>/assets/img/upload.svg" alt="Upload a File">
              </div>
              <span>Upload a File</span>
            </a>
            <a href="#">
              <div>
                <img src="<?php bloginfo('template_url');?>/assets/img/contact.svg" alt="Contact">
              </div>
              <span>Contact</span>
            </a>
          </div>

          <div class="mobile-contact-items">
            <span>
              Call us today!
            </span>
            <br>
            <span>
              O
            </span>
            <span class="contact-item">
              602.258.7789
            </span>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php // Main Content ?>
  <main>
