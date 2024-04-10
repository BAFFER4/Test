<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Regestration_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Regestration form
 * Plugin URI:        1
 * Description:       Плагин тестового ТЗ
 * Version:           1.0.0
 * Author:            BAFFER
 * Author URI:        1
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       regestration-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Update it as you release new versions.
 */
define( 'REGESTRATION_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-regestration-form-activator.php
 */
function activate_regestration_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-regestration-form-activator.php';
	Regestration_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-regestration-form-deactivator.php
 */
function deactivate_regestration_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-regestration-form-deactivator.php';
	Regestration_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_regestration_form' );
register_deactivation_hook( __FILE__, 'deactivate_regestration_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-regestration-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_regestration_form() {

	$plugin = new Regestration_Form();
	$plugin->run();

}
run_regestration_form();
