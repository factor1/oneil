<?php // Close main ?>
</main>

<footer class="container">
  <div class="row row--justify-content-start">
    <div class="col-2 footer--social-icons">
      <a href="#">
        <i class="fa fa-facebook"></i>
      </a>
      <a href="#">
        <i class="fa fa-twitter"></i>
      </a>
      <a href="#">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="#">
        <i class="fa fa-linkedin"></i>
      </a>
    </div>
    <div class="col-4 sm-hide footer--phone">
      <?php
      $phoneStripped = get_field('office_phone_number', 'option');
      $phoneStripped = strtr($phoneStripped, array('.' => '', ',' => ''));
      ?>
      <span>
        Call us today at
        <strong>
          <a href="tel:<?php echo $phoneStripped;?>">
            <?php the_field('office_phone_number', 'option'); ?>
          </a>
        </strong>
      </span>
    </div>
  </div>
  <div class="row">
    <div class="col-7">
      <div class="row">
        <div class="col-4 sm-col-6">
          <?php wp_nav_menu(array('theme_location' => 'footer_left'));?>
        </div>
        <div class="col-4 sm-hide">
          <?php wp_nav_menu(array('theme_location' => 'footer_right'));?>
        </div>
        <div class="col-4 sm-col-6 footer--address sm-text-left">

          <a href="<?php the_field('google_maps_link', 'option');?>" class="google-map-link">
            <div itemscope itemtype="http://schema.org/ContactPoint">
               <div itemscope itemtype="schema.org/PostalAddress">
                  <span itemprop="streetAddress"><?php the_field('street_address', 'option');?></span>
                  <span itemprop="addressLocality"><?php the_field('city', 'option');?>,</span>
                  <span itemprop="addressRegion"> <?php the_field('state', 'option');?></span>
                  <span itemprop="postalCode"><?php the_field('zip_code', 'option');?></span>
               </div>
            </div>
          </a>

          <span>
            <strong>
              O
            </strong>
            <?php the_field('office_phone_number', 'option');?>
          </span>
          <span>
            <strong>
              F
            </strong>
            <?php the_field('fax_phone_number', 'option');?>
          </span>

        </div>
      </div>
    </div>
    <div class="col-4 footer--logos">
      <a href="<?php echo get_home_url(); ?>">
        <img src="<?php bloginfo('template_url');?>/assets/img/logo-white.svg" class="footer-logo" alt="O'Neil - Made to Impress">
      </a>
      <div>
        <img src="<?php bloginfo('template_url');?>/assets/img/fsc.svg" alt="" class="partner-logo">
      </div>
      <div class="fsc-tag">
        <p>
          O’Neil Printing is FSC® Certified and licensed to print FSC on product
          labeling on projects which are produced on FSC Certified Papers.
        </p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-6 footer--copyright">
      <p>
        &copy; O'Neil Printing. All Rights Reserved
      </p>
    </div>
    <div class="col-6 text-right sm-text-left footer--credits">
      <p>
        Site designed by <a href="http://rule29.com">Rule29</a> and developed by <a href="https://factor1studios.com">factor1</a>
      </p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
