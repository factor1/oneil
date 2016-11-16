<?php // Child Page Navigation ?>

<section class="container part--child-pages">
  <div class="row">
    <div class="col-12 text-center">
      <ul>
        <?php
          global $id;
          wp_list_pages( array(
              'title_li'    => '',
              'child_of'    => $id,
          ) );
          ?>
      </ul>
    </div>
  </div>
</section>
