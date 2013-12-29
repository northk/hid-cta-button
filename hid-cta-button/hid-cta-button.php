<?php
/*
Plugin Name: hid-cta-button
Plugin URI: http://highintegritydesign.com
Description: Provide a call-to-action button using a shortcode within a page.
Version: 1.0
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
            'classes' => "hid-cta-button",  
            'url' => "http://wordpress.org"  
        ), $atts);  

        // construct a link using the URL, classes and button text supplied 
        // in the shortcode attributes or from the default values
        $args['url'] = esc_url($args['url']);
        $args['classes'] = esc_html($args['classes']);
        $args['text'] = esc_html($args['text']);
        $html = "<a href='" . $args['url'] . "' class='" . $args['classes'] . "'>" . 
                $args['text'] . "</a>";
        return $html;
    }  
}

// construct a new instance of the cta button
$hid_cta_button_instance = new HID_CTA_button();  

?>
