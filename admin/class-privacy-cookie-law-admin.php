<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link:       http://www.ninjapress.net
 * @since      1.0.0
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/admin
 * @author:       Francesco Mosca <info@ninjapress.net>
 */
class Privacy_Cookie_Law_Admin {

   /**
    * The ID of this plugin.
    *
    * @since    1.0.0
    * @access   private
    * @var      string    $name    The ID of this plugin.
    */
   private $name;

   /**
    * The version of this plugin.
    *
    * @since    1.0.0
    * @access   private
    * @var      string    $version    The current version of this plugin.
    */
   private $version;
   private $wpsf;

   /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    * @var      string    $name       The name of this plugin.
    * @var      string    $version    The version of this plugin.
    */
   public function __construct($name, $version) {

      $this->name = $name;
      $this->version = $version;
   }

   /**
    * Register the stylesheets for the Dashboard.
    *
    * @since    1.0.0
    */
   public function enqueue_styles() {

      /**
       * This function is provided for demonstration purposes only.
       *
       * An instance of this class should be passed to the run() function
       * defined in Privacy_Cookie_Law_Admin_Loader as all of the hooks are defined
       * in that particular class.
       *
       * The Privacy_Cookie_Law_Admin_Loader will then create the relationship
       * between the defined hooks and the functions defined in this
       * class.
       */
      wp_enqueue_style($this->name, plugin_dir_url(__FILE__) . 'css/privacy-cookie-law-admin.css', array(), $this->version, 'all');
   }

   /**
    * Register the JavaScript for the dashboard.
    *
    * @since    1.0.0
    */
   public function enqueue_scripts() {

      /**
       * This function is provided for demonstration purposes only.
       *
       * An instance of this class should be passed to the run() function
       * defined in Privacy_Cookie_Law_Admin_Loader as all of the hooks are defined
       * in that particular class.
       *
       * The Privacy_Cookie_Law_Admin_Loader will then create the relationship
       * between the defined hooks and the functions defined in this
       * class.
       */
      wp_enqueue_script($this->name, plugin_dir_url(__FILE__) . 'js/privacy-cookie-law-admin.js', array('jquery'), $this->version, FALSE);
   }

   public function plugins_loaded() {
      $this->wpsf = new WordPressSettingsFramework(plugin_dir_path(__FILE__) . '../settings/settings.php', 'privacy_cookie_law');

      add_filter($this->wpsf->get_option_group() . '_settings_validate', array(&$this, 'validate_settings'));
   }

   public function add_menu() {
      add_options_page('Privacy Cookie Law', 'Privacy Cookie Law', 'manage_options', 'wp_privacy_cookie_law', array(&$this, 'plugin_settings_page'));
   }

   public function plugin_settings_page() {
      ?>
      <div class="wrap">
          <h2>Privacy Cookie LAw</h2>

          <div class="postbox">
              <p> 
                  &nbsp; Watch other 
                  <a  target="_blank" href="http://www.ninjapress.net/">
                      free plugins
                  </a> 
                  of our suite. Read the 
                  <a  target="_blank" href="http://www.ninjapress.net/plugins/privacy-cookie-law/">
                      F.A.Q.
                  </a> 
                  for questions.
              </p>
          </div>

          <?php $this->wpsf->settings(); ?>

          <a href="http://www.ninjapress.net/suite/" target="_blank">
              <img style="float:right" src="<?= plugins_url('admin/images/ninjapress-logo.png', dirname(__FILE__)); ?>" />
          </a>
      </div>
      <?php
   }

   function validate_settings($input) {

      $input['privacy_cookie_law_general_url'] = esc_url($input['privacy_cookie_law_general_url'], 'http');

      return $input;
   }

   function settings_link($links) {
      $mylinks = array(
          '<a href="' . admin_url('options-general.php?page=wp_privacy_cookie_law') . '">Settings</a>',
      );

      return array_merge($links, $mylinks);
   }

}
