<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link:       http://www.ninjapress.net
 * @since      1.0.0
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 * @author:       Francesco Mosca <info@ninjapress.net>
 */
class Privacy_Cookie_Law {

   /**
    * The loader that's responsible for maintaining and registering all hooks that power
    * the plugin.
    *
    * @since    1.0.0
    * @access   protected
    * @var      Privacy_Cookie_Law_Loader    $loader    Maintains and registers all hooks for the plugin.
    */
   protected $loader;

   /**
    * The unique identifier of this plugin.
    *
    * @since    1.0.0
    * @access   protected
    * @var      string    $Privacy_Cookie_Law    The string used to uniquely identify this plugin.
    */
   protected $Privacy_Cookie_Law;

   /**
    * The current version of the plugin.
    *
    * @since    1.0.0
    * @access   protected
    * @var      string    $version    The current version of the plugin.
    */
   protected $version;

   /**
    * Define the core functionality of the plugin.
    *
    * Set the plugin name and the plugin version that can be used throughout the plugin.
    * Load the dependencies, define the locale, and set the hooks for the Dashboard and
    * the public-facing side of the site.
    *
    * @since    1.0.0
    */
   public function __construct() {

      $this->plugin_name = 'privacy-cookie-law';
      $this->version = '1.0.1';

      $this->load_dependencies();
      $this->set_locale();
      $this->define_admin_hooks();
      $this->define_public_hooks();
   }

   /**
    * Load the required dependencies for this plugin.
    *
    * Include the following files that make up the plugin:
    *
    * - Privacy_Cookie_Law_Loader. Orchestrates the hooks of the plugin.
    * - Privacy_Cookie_Law_i18n. Defines internationalization functionality.
    * - Privacy_Cookie_Law_Admin. Defines all hooks for the dashboard.
    * - Privacy_Cookie_Law_Public. Defines all hooks for the public side of the site.
    *
    * Create an instance of the loader which will be used to register the hooks
    * with WordPress.
    *
    * @since    1.0.0
    * @access   private
    */
   private function load_dependencies() {


      /**
       * utils.php
       *
       * util.php is a collection of useful functions and snippets that you need or could use every day, designed to avoid conflicts with existing projects.
       *
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'includes/util.php';



      /**
       * WordPress Settings Framework
       *
       * The WordPress Settings Framework aims to take the pain out of creating settings pages for your WordPress plugins by effectively creating a wrapper around the WordPress settings API and making it super simple to create and maintain settings pages.
       *
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'includes/wp-settings-framework.php';

      /**
       * The class responsible for orchestrating the actions and filters of the
       * core plugin.
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-privacy-cookie-law-loader.php';

      /**
       * The class responsible for defining internationalization functionality
       * of the plugin.
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-privacy-cookie-law-i18n.php';

      /**
       * The class responsible for defining all actions that occur in the Dashboard.
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-privacy-cookie-law-admin.php';

      /**
       * The class responsible for defining all actions that occur in the public-facing
       * side of the site.
       */
      require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-privacy-cookie-law-public.php';

      $this->loader = new Privacy_Cookie_Law_Loader();
   }

   /**
    * Define the locale for this plugin for internationalization.
    *
    * Uses the Privacy_Cookie_Law_i18n class in order to set the domain and to register the hook
    * with WordPress.
    *
    * @since    1.0.0
    * @access   private
    */
   private function set_locale() {

      $plugin_i18n = new Privacy_Cookie_Law_i18n();
      $plugin_i18n->set_domain($this->get_plugin_name());

      $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
   }

   /**
    * Register all of the hooks related to the dashboard functionality
    * of the plugin.
    *
    * @since    1.0.0
    * @access   private
    */
   private function define_admin_hooks() {

      $plugin_admin = new Privacy_Cookie_Law_Admin($this->get_plugin_name(), $this->get_version());

      $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
      $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

      $this->loader->add_action('admin_menu', $plugin_admin, 'add_menu');
      $this->loader->add_action('plugins_loaded', $plugin_admin, 'plugins_loaded');

      $this->loader->add_filter("plugin_action_links_privacy-cookie-law/privacy-cookie-law.php", $plugin_admin, 'settings_link');
   }

   /**
    * Register all of the hooks related to the public-facing functionality
    * of the plugin.
    *
    * @since    1.0.0
    * @access   private
    */
   private function define_public_hooks() {

      $plugin_public = new Privacy_Cookie_Law_Public($this->get_plugin_name(), $this->get_version());

      $this->loader->add_action('plugins_loaded', $plugin_public, 'plugins_loaded');

      $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
      $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
      
      $this->loader->add_action('wp_footer', $plugin_public, 'banner');
   }

   /**
    * Run the loader to execute all of the hooks with WordPress.
    *
    * @since    1.0.0
    */
   public function run() {
      $this->loader->run();
   }

   /**
    * The name of the plugin used to uniquely identify it within the context of
    * WordPress and to define internationalization functionality.
    *
    * @since     1.0.0
    * @return    string    The name of the plugin.
    */
   public function get_plugin_name() {
      return $this->plugin_name;
   }

   /**
    * The reference to the class that orchestrates the hooks with the plugin.
    *
    * @since     1.0.0
    * @return    Privacy_Cookie_Law_Loader    Orchestrates the hooks of the plugin.
    */
   public function get_loader() {
      return $this->loader;
   }

   /**
    * Retrieve the version number of the plugin.
    *
    * @since     1.0.0
    * @return    string    The version number of the plugin.
    */
   public function get_version() {
      return $this->version;
   }

}
