<?php
/**
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class GFireMDateTimeFreemius {

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;
	protected static $slug = 'gfirem-date-time';

	public function __construct() {
		$this->freemius();
	}

	/**
	 * @return Freemius
	 */
	public static function getFreemius() {
		global $gfirem;

		return $gfirem[ self::$slug ]['freemius'];
	}

	// Create a helper function for easy SDK access.
	public function freemius() {
		global $gfirem;

		if ( ! isset( $gfirem[ self::$slug ]['freemius'] ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/include/freemius/start.php';

			$gfirem[ self::$slug ]['freemius'] = fs_dynamic_init( array(
				'id'                  => '1700',
				'slug'                => 'gfirem-date-time',
				'type'                => 'plugin',
				'public_key'          => 'pk_d57788f941e747dd3d9bfd86a162f',
				'is_premium'          => true,
				'is_premium_only'     => true,
				// If your plugin is a serviceware, set this option to false.
				'has_premium_version' => true,
				'has_addons'          => false,
				'has_paid_plans'      => true,
				'is_org_compliant'    => false,
				'trial'               => array(
					'days'               => 14,
					'is_require_payment' => false,
				),
				'menu'                => array(
					'slug'           => 'gfirem-date-time',
					'first-path'     => 'admin.php?page=gfirem-date-time',
					'support'        => false,
				),
				// Set the SDK to work in a sandbox mode (for development & testing).
				// IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
				'secret_key'          => 'sk_pqRDJ3RsjXwq=^y1PU*bXTaQCP}Wy',
			) );
		}

		return $gfirem[ self::$slug ]['freemius'];
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return GFireMDateTimeFreemius A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}