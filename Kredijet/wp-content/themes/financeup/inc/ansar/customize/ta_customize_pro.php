<?php
//Pro Button

function financeup_pro_customizer( $wp_customize ) {
    class financeup_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    
    public function render_content() {
    ?>
     <div class="ta-pro-box">
       <a href="<?php echo esc_url( __('https://themeansar.com/themes/financeup/','financeup'));?>" target="_blank" class="upgrade" id="review_pro"> <?php _e( 'Upgrade To Pro','financeup' ); ?></a>
        
    </div>
    <?php
    }
}
    $wp_customize->add_section( 'financeup_pro_section' , array(
		'title' => __('Themeansar Importants Links', 'financeup'),
		'priority' => 1,
   	) );

    $wp_customize->add_setting('upgrade_pro', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new financeup_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'label' => __('Discover financeup Pro','financeup'),
        'section' => 'financeup_pro_section',
		'setting' => 'upgrade_pro',)
    ) );

class financeup_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	<div class="ta-pro-box">
        <a href="<?php echo esc_url( __('https://wordpress.org/support/view/theme-reviews/financeup#postform/', 'financeup'));?>" target="_blank" class="review" id="review_pro"><?php _e( 'Support Forum','financeup' ); ?></a>
	</div>
    <?php
    }
}

    $wp_customize->add_setting( 'pro_Review', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new financeup_Review_Customize_Control( $wp_customize, 'pro_Review', array(	
		'label' => __('Discover financeup Pro','financeup'),
        'section' => 'financeup_pro_section',
		'setting' => 'pro_Review',)
    ) );

class financeup_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="ta-pro-box">
	 <a href="<?php echo esc_url( __('https://themeansar.com/docs/wp/financeup-lite/', 'financeup'));?>" target="_blank" class="document" id="review_pro"><?php _e( 'Documentation','financeup' ); ?></a>
	 
	 <div>
    <?php
    }
}

    class financeup_tastore_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="ta-pro-box">
     <a href="<?php echo esc_url( __('https://themeansar.com/themes/', 'financeup'));?>" target="_blank" class="tastore" id="ta_store"><?php _e( 'Explore Our Themes','financeup' ); ?></a>
     
     <div>
    <?php
    }
}

    

    $wp_customize->add_setting( 'doc_Review', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new financeup_document_Customize_Control( $wp_customize, 'doc_Review', array(	
		'label' => __('Discover financeup Pro','financeup'),
        'section' => 'financeup_pro_section',
		'setting' => 'doc_Review',)
    ) );

    $wp_customize->add_setting( 'ti_store', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new financeup_tastore_Customize_Control( $wp_customize, 'ti_store', array(  
        'label' => __('Discover financeup Pro','financeup'),
        'section' => 'financeup_pro_section',
        'setting' => 'ti_store',)
    ) );

}
add_action( 'customize_register', 'financeup_pro_customizer' );
?>