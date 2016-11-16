<?php // Global Navigation ?>

<div id="global-nav">
  <div class="container container--justify-content-center">
    <div class="row row--align-items-center sm-hide">

      <div class="col-1">
        <a href="<?php echo get_home_url();?>/">
          <img src="<?php bloginfo('template_url');?>/assets/img/logo-simple.svg" alt="O'neil Printing" class="logo-simple">
        </a>
      </div>

      <div class="col-7">
        <nav>
          <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        </nav>
      </div>

      <div class="col-3">

        <div class="search-icon-global">
          <a href="#">
            <img src="<?php bloginfo('template_url');?>/assets/img/search.svg" alt="Search">
          </a>
        </div>

        <div class="quote-icon">
          <a href="<?php echo get_home_url();?>/request-a-quote/">
            <img src="<?php bloginfo('template_url');?>/assets/img/quote.svg" alt="Request a Quote">
          </a>
        </div>

        <div class="upload-icon">
          <a href="<?php echo get_home_url();?>/upload/">
            <img src="<?php bloginfo('template_url');?>/assets/img/upload.svg" alt="Upload a File">
          </a>
        </div>

        <div class="contact-icon">
          <a href="<?php echo get_home_url();?>/contact/">
            <img src="<?php bloginfo('template_url');?>/assets/img/contact.svg" alt="Contact">
          </a>
        </div>

      </div>

    </div>

    <?php // Mobile Navigation ?>
    <div class="row sm-only">
      <div class="sm-col-6">
        <a href="<?php echo get_home_url();?>/" title="O'Neil Printing">
          <img src="<?php bloginfo('template_url');?>/assets/img/logo.svg" alt="O'Neil Printing - Made to Impress">
        </a>
      </div>
      <div class="sm-col-6 sm-only">
        <a id="nifty-nav-toggle"><span></span></a>
      </div>
    </div>

  </div>
</div>
