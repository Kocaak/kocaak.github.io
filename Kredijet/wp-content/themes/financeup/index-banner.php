<?php
/**
 * @package financeup
 */ ?>
<div class="ta-breadcrumb-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="ta-breadcrumb-title">
            <h1>
              <?php the_title(); ?>
            </h1>
          </div>
          <ul class="ta-page-breadcrumb">
            <?php if (function_exists('financeup_custom_breadcrumbs')) financeup_custom_breadcrumbs();?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>