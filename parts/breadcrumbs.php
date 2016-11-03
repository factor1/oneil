<?php // Breadcrumbs ?>

<div class="container">
  <div class="row">
    <div class="col-8">
      <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('
        <p id="breadcrumbs">','</p>
        ');
      }
      ?>
    </div>
  </div>
</div>
