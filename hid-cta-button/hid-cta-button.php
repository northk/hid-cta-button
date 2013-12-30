<?php
/*
Plugin Name: hid-cta-button
Plugin URI: http://highintegritydesign.com
Description: Provide a call-to-action button using a shortcode within a page.
Version: 1.2
Author: North Krimsly
Author URI: http://highintegritydesign.com
License: GPL2

hid-cta-button is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

hid-cta-button is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with hid-cta-button. If not, see http://www.gnu.org/licenses/gpl-2.0.html

*/

class HID_CTA_Button {  
    public function __construct()  
    {  
        // attach our 'do' function to the new shortcode. This will automatically
        // work within pages and posts, so we don't need to hook into any additional
        // action or filter hooks.
        add_shortcode('hid-cta-button', array($this, 'do_cta_shortcode'));  
    }  

    public function do_cta_shortcode($atts)  
    {  
        // extract the shortcode attributes into an args[] array and give default values
        // The default class is 'hid-cta-button' so it will hook into css for that.
        $args = shortcode_atts(array(  
            'text' => "Button",  
            'class' => "hid-cta-button",  
            'url' => "http://wordpress.org"  
        ), $atts);  

        // clean up the shortcode attributes
        $args['text'] = esc_html(trim($args['text']));
        $args['class'] = esc_html(trim($args['class']));
        $args['url'] = esc_url(trim($args['url']));

        // validate the class name against a regexp
        if (!preg_match('/^[a-zA-Z]+[_a-zA-Z0-9-]*/', $args['class'])) {        
            if ( true === WP_DEBUG ) {
                error_log('hid-cta-button plugin: invalid class name attribute.');
            }
            return;
        }

        // validate the URL
        if (!filter_var($args['url'], FILTER_VALIDATE_URL)) {
            if ( true === WP_DEBUG ) {
                error_log('hid-cta-button plugin: invalid url attribute.');
            }
            return;
        }

        // construct a link using the URL, classes and button text supplied 
        // in the shortcode attributes or from the default values
        $html = "<a href='" . $args['url'] . "' class='" . $args['class'] . "'>" . 
                $args['text'] . "</a>";
        return $html;
    }  
}

// construct a new instance of the cta button
$hid_cta_button_instance = new HID_CTA_button();  

?>
