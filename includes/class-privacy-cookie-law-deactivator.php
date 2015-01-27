<?php

/**
 * Fired during plugin deactivation
 *
 * @link:       http://www.ninjapress.net
 * @since      1.0.0
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 * @author:       Francesco Mosca <info@ninjapress.net>
 */
class Privacy_Cookie_Law_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
      delete_option( 'privacy_cookie_law_settings' );
	}

}
