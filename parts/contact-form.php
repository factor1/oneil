<?php // Contact Form ?>

<section class="container contact--form-container">
  <div class="row row--justify-content-center">
    <div class="col-6 stretch contact--form">
      <?php the_field('form_embed'); ?>
    </div>
    <div class="col-4 stretch contact--info">
      <h3>
        Office
      </h3>
      <div itemscope itemtype="http://schema.org/ContactPoint">
         <div itemscope itemtype="schema.org/PostalAddress">
            <span itemprop="streetAddress"><?php the_field('street_address', 'option');?><br></span>
            <span itemprop="addressLocality"><?php the_field('city', 'option');?>,</span>
            <span itemprop="addressRegion"> <?php the_field('state', 'option');?></span>
            <span itemprop="postalCode"><?php the_field('zip_code', 'option');?></span>
         </div>
      </div>
      <h3>
        Contact Info
      </h3>
      <span>
        <strong>
          O
        </strong>
        <?php the_field('office_phone_number', 'option');?>
      </span>
      <br>
      <span>
        <strong>
          F
        </strong>
        <?php the_field('fax_phone_number', 'option');?>
      </span>
    </div>
  </div>
</section>
