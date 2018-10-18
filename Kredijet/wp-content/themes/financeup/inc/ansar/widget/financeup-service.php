<?php 
add_action('widgets_init','financeup_service_widget');
function financeup_service_widget(){
	
	return register_widget('financeup_service_widget');
}

class financeup_service_widget extends WP_Widget{
	
	function __construct() {
		parent::__construct(
			'financeup_service_widget', // Base ID
			__('financeup - Service Widget', 'financeup'), // Name
			array( 'description' => __( 'Service Section Widget', 'financeup'), ) // Args
		);
	}

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		$service_page=(isset($instance['service_page'])?$instance['service_page']:'');
		
		if(($instance['service_page']) !=null) {
		$page= get_post($instance['service_page']);
		$post_thumbnail_id = get_post_thumbnail_id($service_page);
		$post_thumbnail_url = esc_url(wp_get_attachment_url( $post_thumbnail_id ));
		?>



        <div class="col-sm-6 col-md-4 swing animated">
        	<div class="ta-service" style="<?php if($post_thumbnail_url) { ?> background: url(<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($instance['service_page']) )) ?>) center / cover; <?php } ?>" >
	        	<div class="ta-service-inner">
	                <?php echo '<h3>'. $page->post_title .'</h3>'; 
	                if($page->post_content) echo '<p>'.$page->post_content. '</p>'; // check for the page content ?>
	    		</div>
	    	</div>
        </div>

        <?php
		}

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
		absint( $instance );
		$instance['service_page'] = ( ! empty( $new_instance['service_page'] ) ) ? $new_instance['service_page'] : '';
	    return $instance;

    }

    function form($instance) {

        ?>
        <table>
        	<tr>
        	<p>
			<label for="<?php echo $this->get_field_id( 'service_page' ); ?>"><?php _e( 'Select Pages:','financeup' ); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'service_page' ); ?>" name="<?php echo $this->get_field_name( 'service_page' ); ?>">
				<option value>--Select--</option>
				<?php
					$service_page = $instance['service_page'];
					$pages = get_pages($service_page); 				
					foreach ( $pages as $page ) {
						$option = '<option value="' . $page->ID . '" ';
						$option .= ( $page->ID == $service_page ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $page->post_title;
						$option .= '</option>';
						echo $option;
					}
				?>
						
			</select>
			<br/>
			</p>
			</tr>
		</table>
    <?php
    }

}