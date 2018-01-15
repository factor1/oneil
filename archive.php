<?php
  /**
   * The archive template.
   *
   * Used when a category, author, or date is queried.
   */
  get_header();

  get_template_part('parts/standard-hero');

  get_template_part('parts/breadcrumbs');
?>

<section class="container archive-posts--container">
  <div class="row">
    <div class="col-10 col-centered text-center">
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <h1>
        <?php if ( is_category() ) : ?>
          Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
        <?php elseif ( is_tag() ) : ?>
          Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
        <?php elseif ( is_day() ) : ?>
          Archive for <?php the_time( 'F jS, Y' ); ?>
        <?php elseif ( is_month() ) : ?>
          Archive for <?php the_time( 'F, Y' ); ?>
        <?php elseif ( is_year() ) : ?>
          Archive for <?php the_time( 'Y' ); ?>
        <?php elseif ( is_author() ) : ?>
          Author Archive
        <?php elseif ( isset($_GET[ 'paged' ]) && !empty($_GET[ 'paged' ]) ) : ?>
          Blog Archives
        <?php endif; ?>
      </h1>
    </div>
  </div>


<?php if ( have_posts() ) :
  while ( have_posts() ): the_post(); ?>

  <div class="row">
    <div class="col-8 col-centered archive-post-result">
      <h4>
        <a href="<?php the_permalink();?>">
          <?php the_title(); ?>
        </a>
      </h4>
      <img src="<?php bloginfo('template_url');?>/assets/img/line-black.svg" alt="" role="presentation" class="slant">
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?>" class="permalink">
        Go To Page
      </a>
    </div>
  </div>
<?php endwhile;?>

  <div class="row pagination-row">
    <div class="col-10 col-centered text-center">
      <?php the_posts_pagination( array('mid_size' => 2) ); ?>
    </div>
  </div>

<?php endif; ?>

</section>

<?php
get_footer();
