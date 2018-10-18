<?php 
$financeup_callout_enable = get_theme_mod('financeup_callout_enable');
$financeup_callout_background = get_theme_mod('financeup_callout_background','');
$financeup_overlay_callout_color_control = get_theme_mod('financeup_overlay_callout_color_control','');
$financeup_callout_button_one_label = get_theme_mod('financeup_callout_button_one_label');
$financeup_callout_button_one_link = get_theme_mod('financeup_callout_button_one_link');
$financeup_callout_button_one_target = get_theme_mod('financeup_callout_button_one_target');
$financeup_callout_button_two_label = get_theme_mod('financeup_callout_button_two_label');
$financeup_callout_button_two_link = get_theme_mod('financeup_callout_button_two_link');
$financeup_callout_button_two_target = get_theme_mod('financeup_callout_button_two_target');
?>
<!--==================== CALLOUT SECTION ====================-->
<?php 
if($financeup_callout_enable) {
if($financeup_callout_background != '') { ?>

<section class="ta-callout" style="background-image:url('<?php echo esc_url($financeup_callout_background);?>');">
<?php } else { ?>
<section class="ta-callout">
  <?php } ?>
  <div class="overlay" style="background:<?php echo $financeup_overlay_callout_color_control;?>">
    <div class="container">
      <div class="row">
            
            <?php $financeup_callout_title = esc_attr(get_theme_mod('financeup_callout_title'));
          
            if( !empty($financeup_callout_title) ):

              echo '<h3 class="padding-bottom-30">'.($financeup_callout_title).'</h3>';

            endif;
             ?>
          <div class="col-md-8 col-md-offset-2">
          <?php $financeup_callout_description = esc_attr(get_theme_mod('financeup_callout_description'));

            if( !empty($financeup_callout_description) ):

              echo '<p class="padding-bottom-30">'.$financeup_callout_description.'</p>';

            endif; ?>

        <?php if( !empty($financeup_callout_button_one_label) ): ?>
            <a href="<?php echo esc_url($financeup_callout_button_one_link); ?>" <?php if( $financeup_callout_button_one_target == true) { echo "target='_blank'"; } ?> class="btn btn-theme margin-bottom-10">
          <?php echo esc_attr($financeup_callout_button_one_label); ?></a>
          <?php
          endif;

          if( !empty($financeup_callout_button_two_label) ): ?>
            <a href="<?php echo esc_url($financeup_callout_button_two_link); ?>" <?php if( $financeup_callout_button_two_target ==true) { echo "target='_blank'"; } ?> class="btn btn-theme-two margin-bottom-10"><?php echo esc_attr($financeup_callout_button_two_label); ?></a>
        <?php endif; ?> 

        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>