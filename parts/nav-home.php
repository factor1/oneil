<?php // Home Navigation ?>
<div class="container">
  <div class="row home-nav">
    <div class="col-3">
      <a href="<?php echo get_home_url();?>/" title="O'Neil Printing">
        <img src="<?php bloginfo('template_url');?>/assets/img/logo.svg" alt="O'Neil Printing - Made to Impress">
      </a>
    </div>
    <div class="col-9 text-right header--top-icons">
      <ul>
        <li>
          <a href="#">
            <div>
              <img src="<?php bloginfo('template_url');?>/assets/img/quote.svg" alt="Request a Quote">
            </div>
            <span>Request A Quote</span>
          </a>
        </li>
        <li>
          <a href="#">
            <div>
              <img src="<?php bloginfo('template_url');?>/assets/img/upload.svg" alt="Upload a File">
            </div>
            <span>Upload a File</span>
          </a>
        </li>
        <li>
          <a href="#">
            <div>
              <img src="<?php bloginfo('template_url');?>/assets/img/contact.svg" alt="Contact">
            </div>
            <span>Contact</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

<?php // Bottom Nav Row ?>
<div class="container home-nav--bottom">
  <div class="row row--justify-content-end">
    <nav class="col-11">
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </nav>
    <div class="col-1 text-right">
      <div class="search-icon">
        <img src="<?php bloginfo('template_url');?>/assets/img/search.svg" alt="Search">
      </div>
    </div>
  </div>
</div>
