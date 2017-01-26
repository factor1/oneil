<?php // Home Hero ?>

<section id="home-hero" class="container container--justify-content-center home--hero" style="background: url(<?php the_field('home_hero_background');?>) center center no-repeat;">
  <div class="row">
    <div class="col-8 col-centered text-center">
      <h1 class="headline">
        <?php the_field('home_hero_headline'); ?>
      </h1>
      <h2 class="subhead">
        <?php the_field('home_hero_subheadline'); ?>
      </h2>
      <a href="<?php the_field('hero_button_page_link');?>" class="button button--blue">
        Learn More
      </a>
    </div>
  </div>
</section>
