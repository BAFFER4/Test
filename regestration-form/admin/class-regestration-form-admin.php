<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Regestration_Form
 * @subpackage Regestration_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Regestration_Form
 * @subpackage Regestration_Form/admin
 * @author     BAFFER
 */
class Regestration_Form_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $regestration_form    The ID of this plugin.
	 */
	private $regestration_form;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $regestration_form       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $regestration_form, $version ) {

		$this->regestration_form = $regestration_form;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Regestration_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Regestration_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->regestration_form, plugin_dir_url( __FILE__ ) . 'css/regestration-form-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Regestration_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Regestration_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->regestration_form, plugin_dir_url( __FILE__ ) . 'js/regestration-form-admin.js', array( 'jquery' ), $this->version, false );

	}

}
