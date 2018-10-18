<?php
/**
 * financeup Admin Class.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'financeup_Admin' ) ) :

/**
 * financeup_Admin Class.
 */
class financeup_Admin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'financeup_admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'financeup_hide_notices' ) );
		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'financeup_activation_admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function financeup_admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'financeup' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'financeup' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'financeup-welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'financeup_enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function financeup_enqueue_styles() {
		global $financeup_version;

		wp_enqueue_style( 'financeup-welcome', get_template_directory_uri() . '/css/themeinfo.css', array(), $financeup_version );
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function financeup_hide_notices() {
		if ( isset( $_GET['financeup-hide-notice'] ) && isset( $_GET['_financeup_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_financeup_notice_nonce'], 'financeup_financeup_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'financeup' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'financeup' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['financeup-hide-notice'] );
		}
	}

	public function financeup_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'financeup_admin_notice' ), 99 );
		}
	}
	
	/**
	 * Display an admin notice linking to the welcome screen
	 * @sfunctionse 1.8.2.4
	 */
	public function financeup_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Financeup! 
For the best use of Financeup theme, visit the Wecome page %swelcome page%s.', 'financeup' ), '<a href="' . esc_url( admin_url( 'themes.php?page=financeup-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=financeup-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Financeup', 'financeup' ); ?></a></p>
			</div>
		<?php
	}
	
	/**
	 * financeup_intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function financeup_intro() {
		global $financeup_version;

		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		$major_version = substr( $financeup_version, 0, 3 );
		?>
		<div class="financeup-theme-info">
			<h1>
				<?php esc_html_e('About', 'financeup'); ?>
				<?php echo $theme->display( 'Name' ); ?>
				<?php printf( '%s', $major_version ); ?>
			</h1>
		</div>

		<p class="financeup-actions">
			<a href="<?php echo esc_url( 'https://themeansar.com/themes/financeup/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'financeup' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/financeup/' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'financeup' ); ?></a>

			<a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/financeup/default/' ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'financeup' ); ?></a>

			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/financeup/reviews/#new-post' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rating this theme', 'financeup' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'financeup-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'financeup-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo $theme->display( 'Name' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'financeup-welcome', 'tab' => 'supported_plugins' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Supported Plugins', 'financeup' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'financeup-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'financeup' ); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'import_dummy_data' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'financeup-welcome', 'tab' => 'import_dummy_data' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Import Financeup Demo Data', 'financeup' ); ?>
			</a>
			
			
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->financeup_intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Theme Cusomization features availbale in Customizer setting : -   Appearance &#8594; Customize', 'financeup' ) ?></p>
						<p><a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'financeup' ); ?></a></p>
					</div>
					
					<div class="col">
						<h3><?php esc_html_e( 'Home Page Section Widget', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Homepage Section Widget like: Financeup Service Widget availbale: -  Appearance &#8594; Widgets', 'financeup' ) ?></p>
						<p><a href="<?php echo admin_url( 'widgets.php' ); ?>" class="button button-secondary"><?php esc_html_e( 'Widgets', 'financeup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'financeup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/docs/wp/financeup/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Documentation', 'financeup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Please Put your question / query on support forum.', 'financeup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/financeup' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support Forum', 'financeup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more functionality / features?', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features and functionlaity.', 'financeup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/demo/wp/financeup/' ); ?>" class="button button-secondary"><?php esc_html_e( 'View Pro', 'financeup' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got sales related question?', 'financeup' ); ?></h3>
						<p><?php esc_html_e( 'Please send it via our sales contact page.', 'financeup' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themeansar.com/contact/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Contact Page', 'financeup' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'financeup' );
							echo ' ' . $theme->display( 'Name' );
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'financeup' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/financeup' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'financeup' );
								echo ' ' . $theme->display( 'Name' );
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard financeup">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'financeup' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'financeup' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'financeup' ) : esc_html_e( 'Go to Dashboard', 'financeup' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the supported plugins screen.
	 */
	public function supported_plugins_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->financeup_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins:', 'financeup' ); ?></p>
			<ol>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>" target="_blank"><?php esc_html_e( 'Contact Form 7', 'financeup' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>" target="_blank"><?php esc_html_e( 'WooCommerce', 'financeup' ); ?></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/polylang/' ); ?>" target="_blank"><?php esc_html_e( 'Polylang', 'financeup' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'financeup'); ?>
				</li>
				<li><a href="<?php echo esc_url( 'https://wpml.org/' ); ?>" target="_blank"><?php esc_html_e( 'WPML', 'financeup' ); ?></a>
					<?php esc_html_e('Fully Compatible in Pro Version', 'financeup'); ?>
				</li>
			</ol>

		</div>
		<?php
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->financeup_intro(); ?>

			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'financeup' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'financeup'); ?></h3></th>
						<th><h3><?php esc_html_e('financeup Lite', 'financeup'); ?></h3></th>
						<th><h3><?php esc_html_e('financeup Pro', 'financeup'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Slider', 'financeup'); ?></h3></td>
						<td><?php esc_html_e('3', 'financeup'); ?></td>
						<td><?php esc_html_e('Unlimited Slides', 'financeup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Slider Settings', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Slides type, duration & delay time', 'financeup'); ?></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Color Palette', 'financeup'); ?></h3></td>
						<td><?php esc_html_e('Primary Color Option', 'financeup'); ?></td>
						<td><?php esc_html_e('Multiple Color Options', 'financeup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Additional Top Header', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e('Social Icons + Menu + Header text option', 'financeup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Social Icons', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Boxed & Wide layout option', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Light & Dark Color skin', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Compatible', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Woocommerce Page Layouts', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Translation Ready', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WPML Compatible', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Polylang Compatible', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Footer Copyright Editor', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Demo Content', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Support', 'financeup'); ?></h3></td>
						<td><?php esc_html_e('Forum', 'financeup'); ?></td>
						<td><?php esc_html_e('Forum + Emails/Support Ticket', 'financeup'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('MailChimp Subscriber', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Services widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Call to Action widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Single page widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured widget (Recent Work/Portfolio)', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Testimonial Widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Featured Posts', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Our Clients widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('About us Template', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Teams Widget', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Portfolio 2 , 3 , 4 Column Template', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Prizing Template Template', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td><h3><?php esc_html_e('Contact us Template', 'financeup'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'financeup_pro_theme_url', 'https://themeansar.com/themes/financeup-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'financeup' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
	
	public function import_dummy_data_screen() {
	?>
	<div class="wrap about-wrap">
	<?php $this->financeup_intro(); ?>
	<?php if ( has_action( 'financeup_import_content_tab' ) ) {
                    do_action( 'financeup_import_content_tab' );
                } else { ?>
                    <div id="plugin-filter" class="demo-import-boxed">
                        <?php
                        $plugin_name = 'one-click-demo-import';
                        $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
                        $button_class = 'install-now button';
                        $button_txt = esc_html__( 'Install Now', 'financeup' );
                        if ( ! $status ) {
                            $install_url = wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'install-plugin',
                                        'plugin' => $plugin_name
                                    ),
                                    network_admin_url( 'update.php' )
                                ),
                                'install-plugin_'.$plugin_name
                            );

                        } else {
                            $install_url = add_query_arg(array(
                                'action' => 'activate',
                                'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
                                'plugin_status' => 'all',
                                'paged' => '1',
                                
                                'external_url' => network_admin_url('themes.php?page=financeup-welcome&tab=import_dummy_data'),
                            ), network_admin_url('themes.php?page=financeup-welcome&tab=import_dummy_data'));
                            $button_class = 'activate-now button-primary';
                            $button_txt = esc_html__( 'Active Now', 'financeup' );
                        }

                        $detail_link = add_query_arg(
                            array(
                                'tab' => 'plugin-information',
                                'plugin' => $plugin_name,
                                'TB_iframe' => 'true',
                                'width' => '772',
                                'height' => '349',

                            ),
                            network_admin_url( 'plugin-install.php' )
                        );

                        ?>
                        <h3><?php _e('Import Dummy Data','financeup'); ?><h3>
                        <?php echo sprintf(__('<p><strong>One Click Demo Import</strong> is the WordPress Plugin helps to create exact replica of financeup theme. Click and Process.</p>','financeup')); ?>
                        <h4><?php _e('Key Notes:','financeup'); ?></h4>
                    
                            <li><?php _e('Click the button to install the plugin. Ignore if already installed.','financeup'); ?></li>
                            <li><?php _e('After activation go to Appreance >> Import Demo Data.','financeup'); ?></li>
                        
                        <?php
						echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
                        ?> 
                         
                        
                    </div>
                <?php } ?>
            </div>
	<?php }
	
	
}

endif;

return new financeup_Admin();