<?php

/**
 *
 * @since             1.0.0
 * @package           GFireMGFireMDateTime
 *
 * @wordpress-plugin
 * Plugin Name:       GFireM Date Time Field
 * Description:       Formidable Date Time field using the datetime picker.
 * Version:           1.0.0
 * Author:            gfirem
 * License:           Apache License 2.0
 * License URI:       http://www.apache.org/licenses/
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'GFireMDateTime' ) ) {

	require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'class-gfirem-date-time-freemius.php';
	GFireMDateTimeFreemius::get_instance();

	class GFireMDateTime {

		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		public static $assets;
		public static $view;
		public static $classes;
		public static $slug = 'gfirem-date-time';
		public static $version = '1.0.0';

		/**
		 * Initialize the plugin.
		 */
		private function __construct() {
			self::$assets  = plugin_dir_url( __FILE__ ) . 'assets/';
			self::$view    = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;
			self::$classes = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR;
			$this->load_plugin_textdomain();
			require_once self::$classes . 'class-gfirem-date-time-manager.php';
			new GFireMDateTimeManager();
		}

		static function getFreemius(){
			return GFireMDateTimeFreemius::getFreemius();
		}

		/**
		 * Get plugin version
		 *
		 * @return string
		 */
		static function getVersion() {
			return self::$version;
		}

		/**
		 * Get plugins slug
		 *
		 * @return string
		 */
		static function getSlug() {
			return self::$slug;
		}

		/**
		 * Return an instance of this class.
		 *
		 * @return object A single instance of this class.
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		/**
		 * Load the plugin text domain for translation.
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'gfirem_date_time-locale', false, basename( dirname( __FILE__ ) ) . '/languages' );
		}
	}

	add_action( 'plugins_loaded', function () {
		global $gfirem;
		$gfirem[ GFireMDateTime::$slug ]['instance'] = GFireMDateTime::get_instance();
	} );

}
