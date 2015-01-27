<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link:       http://www.ninjapress.net
 * @since      1.0.0
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Privacy_Cookie_Law
 * @subpackage Privacy_Cookie_Law/admin
 * @author:       Francesco Mosca <info@ninjapress.net>
 */
class Privacy_Cookie_Law_Public {

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

   /**
    * Initialize the class and set its properties.
    *
    * @since    1.0.0
    * @var      string    $name       The name of the plugin.
    * @var      string    $version    The version of this plugin.
    */
   private $wpsf;

   public function __construct($name, $version) {

      $this->name = $name;
      $this->version = $version;
   }

   /**
    * Register the stylesheets for the public-facing side of the site.
    *
    * @since    1.0.0
    */
   public function enqueue_styles() {

      /**
       * This function is provided for demonstration purposes only.
       *
       * An instance of this class should be passed to the run() function
       * defined in Privacy_Cookie_Law_Public_Loader as all of the hooks are defined
       * in that particular class.
       *
       * The Privacy_Cookie_Law_Public_Loader will then create the relationship
       * between the defined hooks and the functions defined in this
       * class.
       */
      wp_enqueue_style($this->name, plugin_dir_url(__FILE__) . 'css/privacy-cookie-law-public.css', array(), $this->version, 'all');
   }

   /**
    * Register the stylesheets for the public-facing side of the site.
    *
    * @since    1.0.0
    */
   public function enqueue_scripts() {

      /**
       * This function is provided for demonstration purposes only.
       *
       * An instance of this class should be passed to the run() function
       * defined in Privacy_Cookie_Law_Public_Loader as all of the hooks are defined
       * in that particular class.
       *
       * The Privacy_Cookie_Law_Public_Loader will then create the relationship
       * between the defined hooks and the functions defined in this
       * class.
       */
      wp_enqueue_script($this->name, plugin_dir_url(__FILE__) . 'js/privacy-cookie-law-public.js', array('jquery'), $this->version, FALSE);
   }

   public function plugins_loaded() {
      $this->wpsf = new WordPressSettingsFramework(plugin_dir_path(__FILE__) . '../settings/settings.php', 'privacy_cookie_law');
   }

   public function banner() {

      if ((wpsf_get_setting('privacy_cookie_law', 'general', 'enable_enable') == 'enable') and ($_COOKIE['wordpress_pcl_close'] != 1)) {
         ?>
         <div class="pcl">
             <span class="pcl-message">
                 <?= wpsf_get_setting('privacy_cookie_law', 'general', 'message'); ?>

                 <?php if (wpsf_get_setting('privacy_cookie_law', 'general', 'url') != '') : ?>
                    <a href="<?= wpsf_get_setting('privacy_cookie_law', 'general', 'url'); ?>" title="<?= __('Read our Privacy Policy', 'privacy-cookie-law'); ?>">
                        <?= wpsf_get_setting('privacy_cookie_law', 'general', 'link_text'); ?>
                    </a>
                 <?php endif; ?>
                 
             </span>
             <span class="plc-close"><?= __('close', 'privacy-cookie-law'); ?> [X]</span>
         </div>
         <?php
      }
   }

}
