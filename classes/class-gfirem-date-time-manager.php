<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GFireMDateTimeManager {

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'fs_is_submenu_visible_' . GFireMDateTime::getSlug(), array( $this, 'handle_sub_menu' ), 10, 2 );

		require_once 'class-gfirem-date-time-logs.php';
		new GFireMDateTimeLogs();

		try {
			//Check formidable pro
			if ( class_exists( 'FrmAppHelper' ) && method_exists( 'FrmAppHelper', 'pro_is_installed' )
			     && FrmAppHelper::pro_is_installed() ) {
				if ( GFireMDateTime::getFreemius()->is_paying() ) {
					add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_style' ) );
                    require_once 'class-gfirem-fieldbase.php';
                    require_once 'class-gfirem-date-time-field.php';
                    new  GFireMDateTimeField();

				}
			} else {
				add_action( 'admin_notices', array( $this, 'required_formidable_pro' ) );
			}
		} catch ( Exception $ex ) {
			GFireMDateTimeLogs::log( array(
				'action'         => 'loading_dependency',
				'object_type'    => GFireMDateTime::getSlug(),
				'object_subtype' => get_class( $this ),
				'object_name'    => $ex->getMessage(),
			) );
		}
	}
	
	public function admin_enqueue_style() {
		$current_screen = get_current_screen();
		if ( 'toplevel_page_formidable' === $current_screen->id ) {
			wp_enqueue_style( 'formidable_key_field', GFireMDateTime::$assets . 'css/gfirem_date_time.css' );
		}
	}

	public function required_formidable_pro() {
		require GFireMDateTime::$view . 'formidable_notice.php';
	}
	
	/**
	 * Handle freemius menus visibility
	 *
	 * @param $is_visible
	 * @param $menu_id
	 *
	 * @return bool
	 */
	public function handle_sub_menu( $is_visible, $menu_id ) {
		if ( $menu_id == 'account' ) {
			$is_visible = false;
		}

		return $is_visible;
	}

	/**
	 * Adding the Admin Page
	 */
	public function admin_menu() {
		add_menu_page( __( 'Date Time', 'gfirem_date_time-locale' ), __( 'Date Time', 'gfirem_date_time-locale' ), 'manage_options', GFireMDateTime::getSlug(), array( $this, 'screen' ), 'dashicons-calendar-alt' );
	}

	/**
	 * Screen to admin page
	 */
	public function screen() {
		GFireMDateTime::getFreemius()->get_logger()->entrance();
		GFireMDateTime::getFreemius()->_account_page_load();
		GFireMDateTime::getFreemius()->_account_page_render();
	}
}
