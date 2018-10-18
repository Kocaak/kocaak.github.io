<?php
$financeup_service_enable = get_theme_mod('financeup_service_enable');
if($financeup_service_enable){	

$financeup_service_button = get_theme_mod('financeup_service_button','Load More'); ?>

<!--==================== SERVICE SECTION ====================-->

<section id="service" class="ta-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-12 fadeInDown animated padding-bottom-50 text-center">
        <div class="ta-heading">
		  <?php $financeup_service_title = esc_attr(get_theme_mod('financeup_service_title'));
		  if( !empty($financeup_service_title) ):

		  echo '<h3 class="ta-heading-inner">'.$financeup_service_title.'</h3>';

		  endif;  
		  $financeup_service_subtitle = esc_attr(get_theme_mod('financeup_service_subtitle'));

		  if( !empty($financeup_service_subtitle) ):

		  echo '<p>'.$financeup_service_subtitle.'</p>';

		  endif; ?>
		</div>
      </div>
    </div>
    <div class="row"> 
    	<?php if(is_active_sidebar( 'sidebar-service' )): dynamic_sidebar( 'sidebar-service' ); endif; ?>
    </div>
  </div>
</section>
<?php } ?>