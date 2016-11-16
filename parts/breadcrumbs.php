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
    <div class="col-4 text-right" style="padding-top: 16px;">
      <share-button></share-button>
    </div>
  </div>
</div>
