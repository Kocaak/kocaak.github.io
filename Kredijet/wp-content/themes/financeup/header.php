<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package financeup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<header>
<!--==================== TOP BAR ====================-->
  <div class="ta-head-detail hidden-xs hidden-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
			<ul class="info-left">
				<?php
				  $financeup_head_info_one = get_theme_mod('financeup_head_info_one','<a><i class="fa fa fa-clock-o"></i>10:00 am &gt; 7:00 pm </a>');
				  $financeup_head_info_two = get_theme_mod('financeup_head_info_two','<a><i class="fa fa fa-phone"></i>9876541230</a>');
				?>
				<li><?php echo $financeup_head_info_one; ?></li>
				<li><?php echo $financeup_head_info_two; ?></li>
			</ul>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
         <ul class="info-right">
          <li>
              <?php if( class_exists('woocommerce')) { ?><a href="<?php echo WC()->cart->get_cart_url(); ?>" 
			  title="<?php esc_attr_e( 'View your shopping cart','financeup'); ?>" class="ta-cart"> <i class="fa fa-shopping-bag"></i><span class="ta-cart-count"> 
			    
			  
			  <span class="ta-cart-item">
				  <?php echo wp_kses_data( sprintf( _n( '%d item -', '%d item(s)', WC()->cart->get_cart_contents_count(), 'financeup' ), WC()->cart->get_cart_contents_count() ) ); ?>
			  </span>
			   </span></a> <?php } ?>
          </li>
        </ul>
</div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="ta-main-nav">
      <div class="container">
      <div class="row">
          <div class="col-md-3">
            <div class="navbar-header">
            <!-- Logo -->
            <?php
            if(has_custom_logo())
            {
            // Display the Custom Logo
            the_custom_logo();
            }
             else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo('name'); ?>
			<br>
            <span class="site-description"><?php echo  get_bloginfo( 'description', 'display' ); ?></span>   
            </a>      
            <?php } ?>
            <!-- Logo -->
            </div>
          </div>
          <div class="col-md-9 hidden-xs hidden-sm">
            <div class="header-widget">
              <div class="col-md-3 col-sm-3">
                <div class="ta-header-box animated flipInX">
                  <div class="ta-header-box-icon">
                    <?php $financeup_header_widget_one_icon = esc_attr(get_theme_mod('financeup_header_widget_one_icon','fa fa-map-marker'));
                    if( !empty($financeup_header_widget_one_icon) ):
                      echo '<i class="fa '.$financeup_header_widget_one_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="ta-header-box-info">
                    <?php $financeup_header_widget_one_title = esc_attr(get_theme_mod('financeup_header_widget_one_title','1240 Park Avenue')); 
                    if( !empty($financeup_header_widget_one_title) ):
                      echo '<h4>'.$financeup_header_widget_one_title.'</h4>';
                    endif; ?>
                    <?php $financeup_header_widget_one_description = esc_attr(get_theme_mod('financeup_header_widget_one_description','NYC, USA 256323'));
                    if( !empty($financeup_header_widget_one_description) ):
                      echo '<p>'.$financeup_header_widget_one_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="ta-header-box animated flipInX">
                  <div class="ta-header-box-icon">
                    <?php $financeup_header_widget_two_icon = esc_attr(get_theme_mod('financeup_header_widget_two_icon','fa fa-clock-o'));
                    if( !empty($financeup_header_widget_two_icon) ):
                      echo '<i class="fa '.$financeup_header_widget_two_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="ta-header-box-info">
                    <?php $financeup_header_widget_two_title = esc_attr(get_theme_mod('financeup_header_widget_two_title','7:30 AM - 7:30 PM')); 
                    if( !empty($financeup_header_widget_two_title) ):
                      echo '<h4>'.$financeup_header_widget_two_title.'</h4>';
                    endif; ?>
                    <?php $financeup_header_widget_two_description = esc_attr(get_theme_mod('financeup_header_widget_two_description','Monday to Saturday'));
                    if( !empty($financeup_header_widget_two_description) ):
                      echo '<p>'.$financeup_header_widget_two_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="ta-header-box wow animated flipInX">
                  <div class="ta-header-box-icon">
                    <?php $financeup_header_widget_three_icon = esc_attr(get_theme_mod('financeup_header_widget_three_icon','fa fa-phone'));
                    if( !empty($financeup_header_widget_three_icon) ):
                      echo '<i class="fa '.$financeup_header_widget_three_icon.'">'.'</i>';
                    endif; ?>
                   </div>
                  <div class="ta-header-box-info">
                    <?php $financeup_header_widget_three_title = esc_attr(get_theme_mod('financeup_header_widget_three_title','+ (007) 548 58 5400')); 
                    if( !empty($financeup_header_widget_three_title) ):
                      echo '<h4>'.$financeup_header_widget_three_title.'</h4>';
                    endif; ?>
                    <?php $financeup_header_widget_three_description = esc_attr(get_theme_mod('financeup_header_widget_three_description','info@themeansar.com'));
                    if( !empty($financeup_header_widget_three_description) ):
                      echo '<p>'.$financeup_header_widget_three_description.'</p>';
                    endif; ?> 
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="ta-header-box wow animated flipInX text-right"> 
                  <?php $financeup_header_widget_four_label = esc_attr(get_theme_mod('financeup_header_widget_four_label','Get Quote')); 
                  $financeup_header_widget_four_link = esc_url(get_theme_mod('financeup_header_widget_four_link'));
                  $financeup_header_widget_four_target = esc_attr(get_theme_mod('financeup_header_widget_four_target')); 

                    if( !empty($financeup_header_widget_four_label) ):?>
                      <a href="<?php echo $financeup_header_widget_four_link; ?>" <?php if( $financeup_header_widget_four_target ==true) { echo "target='_blank'"; } ?> class="btn btn-quote"><?php echo esc_attr($financeup_header_widget_four_label); ?></a> 
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <nav class="navbar navbar-default navbar-static-top navbar-wp">
        <div class="container"> 
          <!-- navbar-toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php __('Toggle Navigation','financeup'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <!-- /navbar-toggle --> 
          <!-- Navigation -->
          
          <div class="collapse navbar-collapse" id="navbar-wp">
            <?php wp_nav_menu( array(  
				'theme_location' => 'primary', 'container'  => '', 'menu_class' => 'nav navbar-nav','fallback_cb' => 'financeup_fallback_page_menu','walker' => new financeup_nav_walker()
				 ) );
			?>
          </div>
          <!-- /Navigation --> 
        </div>
      </nav>
  </div>
</header>
<!-- #masthead --> 