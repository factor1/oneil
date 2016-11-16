<?php // Content Block with Buttons ?>

<section class="container part--content-buttons">
  <div class="row">
    <div class="col-10 col-centered text-center">

      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">

      <h2>
        <?php the_field('headline_content_buttons');?>
      </h2>

      <?php
      // Content
      the_field('content_content_buttons');

      // Button 1 Logic
      $button1_destination = get_field('button1_destination_content_buttons');

      if( $button1_destination === 'internal' ){
        $button1_link = get_field('button1_internal_content_buttons');
      } else{
        $button1_link = get_field('button1_external_content_buttons');
      }

      // If we have button 2 go through with that logic as well
      if( get_field('show_button_2_content_buttons') === true ){
        if( $button2_destination === 'internal' ){
          $button2_link = get_field('button2_internal_content_buttons');
        } else{
          $button2_link = get_field('button2_external_content_buttons');
        }
      }
      ?>

      <a href="<?php echo $button1_link;?>" class="button button--blue">
        <?php the_field('button1_text_content_buttons'); ?>
      </a>

      <?php if( get_field('show_button_2_content_buttons') === true ): ?>
        <a href="<?php echo $button2_link;?>" class="button button--yellow">
          <?php the_field('button2_text_content_buttons'); ?>
        </a>
      <?php endif; ?>



    </div>
  </div>
</section>
