<?php

/**
 * WordPress Settings Framework
 *
 * @author Gilbert Pellegrom
 * @link https://github.com/gilbitron/WordPress-Settings-Framework
 * @license MIT
 */
/**
 * Define your settings
 */
add_filter('wpsf_register_settings', 'wpsf_example_settings');

function wpsf_example_settings($wpsf_settings) {

   /*
     // General Settings section
     $wpsf_settings[] = array(
     'section_id' => 'general',
     'section_title' => 'General Settings',
     'section_description' => 'Some intro description about this section.',
     'section_order' => 5,
     'fields' => array(
     array(
     'id' => 'text',
     'title' => 'Nome',
     'desc' => 'This is a description.',
     'placeholder' => 'This is a placeholder.',
     'type' => 'text',
     'std' => 'This is std'
     ),
     array(
     'id' => 'password',
     'title' => 'Password',
     'desc' => 'This is a description.',
     'placeholder' => 'This is a placeholder.',
     'type' => 'password',
     'std' => 'Example'
     ),
     array(
     'id' => 'textarea',
     'title' => 'Textarea',
     'desc' => 'This is a description.',
     'placeholder' => 'This is a placeholder.',
     'type' => 'textarea',
     'std' => 'This is std'
     ),
     array(
     'id' => 'select',
     'title' => 'Select',
     'desc' => 'This is a description.',
     'type' => 'select',
     'std' => 'green',
     'choices' => array(
     'red' => 'Red',
     'green' => 'Green',
     'blue' => 'Blue'
     )
     ),
     array(
     'id' => 'radio',
     'title' => 'Radio',
     'desc' => 'This is a description.',
     'type' => 'radio',
     'std' => 'green',
     'choices' => array(
     'red' => 'Red',
     'green' => 'Green',
     'blue' => 'Blue'
     )
     ),
     array(
     'id' => 'checkbox',
     'title' => 'Checkbox',
     'desc' => 'This is a description.',
     'type' => 'checkbox',
     'std' => 1
     ),
     array(
     'id' => 'checkboxes',
     'title' => 'Checkboxes',
     'desc' => 'This is a description.',
     'type' => 'checkboxes',
     'std' => array(
     'red',
     'blue'
     ),
     'choices' => array(
     'red' => 'Red',
     'green' => 'Green',
     'blue' => 'Blue'
     )
     ),
     array(
     'id' => 'color',
     'title' => 'Color',
     'desc' => 'This is a description.',
     'type' => 'color',
     'std' => '#ffffff'
     ),
     array(
     'id' => 'file',
     'title' => 'File',
     'desc' => 'This is a description.',
     'type' => 'file',
     'std' => ''
     ),
     array(
     'id' => 'editor',
     'title' => 'Editor',
     'desc' => 'This is a description.',
     'type' => 'editor',
     'std' => ''
     )
     )
     );


    */
   // More Settings section
   $wpsf_settings[] = array(
       'section_id' => 'general',
       'section_title' => __('General Settings', 'privacy-cookie-law'),
       'section_order' => 10,
       'fields' => array(
           array(
               'id' => 'enable',
               'title' => __('Enable Plugin', 'privacy-cookie-law'),
               'desc' => __('Enable Privacy Cookie Law.', 'privacy-cookie-law'),
               'type' => 'checkboxes',
               'std' => array(
               ),
               'choices' => array(
                   'enable' => __('Enable', 'privacy-cookie-law')
               )
           ),
           array(
               'id' => 'message',
               'title' => __('Message', 'privacy-cookie-law'),
               'desc' => __('Message to display.', 'privacy-cookie-law'),
               'placeholder' => __('Message to display.', 'privacy-cookie-law'),
               'type' => 'textarea',
               'std' => __('Cookies help us to provide our services. Using these services, you agree to the use of cookies on our part.', 'privacy-cookie-law')
           ),
           array(
               'id' => 'url',
               'title' => __('URL Privacy Page', 'privacy-cookie-law'),
               'desc' => __('Page address of the Privacy Act', 'privacy-cookie-law'),
               'placeholder' => __('http://', 'privacy-cookie-law'),
               'type' => 'text',
               'std' => ''
           ),
           array(
               'id' => 'link_text',
               'title' => __('Link Text', 'privacy-cookie-law'),
               'desc' => __('Link text of the page privacy', 'privacy-cookie-law'),
               'placeholder' => __('More Info', 'privacy-cookie-law'),
               'type' => 'text',
               'std' => __('More Info', 'privacy-cookie-law')
           ),
       )
   );

   return $wpsf_settings;
}
