<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * this starts the plugin.
 *
 * @link:       http://www.ninjapress.net
 * @since             1.0.0
 * @package           Privacy_Cookie_Law
 *
 * @wordpress-plugin
 * Plugin Name:       Privacy Cookie Law
 * Plugin URI:        http://www.ninjapress.net
 * Description:        
 * Version:           1.0.1
 * Author:            Ninja Press
 * Author URI:        http://www.ninjapress.net
 * License:            GPL-2.0+
 * License URI:        http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:            privacy-cookie-law
 * Domain Path:            /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-privacy-cookie-law-activator.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-privacy-cookie-law-deactivator.php';

/** This action is documented in includes/class-privacy-cookie-law-activator.php */
register_activation_hook( __FILE__, array( 'Privacy_Cookie_Law_Activator', 'activate' ) );

/** This action is documented in includes/class-privacy-cookie-law-deactivator.php */
register_activation_hook( __FILE__, array( 'Privacy_Cookie_Law_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-privacy-cookie-law.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_Privacy_Cookie_Law() {

	$plugin = new Privacy_Cookie_Law();
	$plugin->run();

}
run_Privacy_Cookie_Law();
