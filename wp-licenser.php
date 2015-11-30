<?php
/*
Plugin Name: WP-Licenser
Plugin URI: https://fatesinger.com/76556
Description: Add a licenser.
Version: 1.0.0
Author: Bigfa
Author URI: http://fatesinger.com
Text Domain: wp_licenser
*/


### Create Text Domain For Translations
add_action( 'plugins_loaded', 'licenser_textdomain' );
function licenser_textdomain() {
	load_plugin_textdomain( 'wp_licenser', false, dirname( plugin_basename( __FILE__ ) ) );
}


### Function: Post Views Option Menu
add_action('admin_menu', 'licenser_menu');
function licenser_menu() {
	if (function_exists('add_options_page')) {
		//add_options_page(__('Licenser', 'wp_licenser'), __('Licenser', 'wp_licenser'), 'manage_options', 'wp-licenser/licenser-options.php') ;
	}
}



add_action('wp_enqueue_scripts', 'wp_licenser_enqueue');
function wp_licenser_enqueue() {
    wp_enqueue_style( 'wp-licenser', plugins_url('', __FILE__) . "/static/css/style.css" , array(), '1.0.0' );
}

add_action('admin_enqueue_scripts', 'wp_licenser_admin_enqueue');
function wp_licenser_admin_enqueue() {
    wp_enqueue_style( 'wp-licenser-admin', plugins_url('', __FILE__) . "/static/css/admin.css" , array(), '1.0.0' );
    wp_enqueue_script( 'wp-licenser-admin', plugins_url('', __FILE__) . "/static/js/admin.js" , array(), WPL_VERSION );
    wp_localize_script( 'wp-licenser-admin', 'license_message', array(
        'sa' => __( 'Others must distribute derivatives of your work under the same license.', 'wp_licenser' ),
        'by' => __( 'Others can distribute, remix, and build upon your work as long as they credit you.', 'wp_licenser' ),
        'nd' => __( 'Others can only distribute non-derivative copies of your work.', 'wp_licenser' ),
        'nc' => __( 'Others can use your work for non-commercial purposes only.', 'wp_licenser' ),
        'zero' => __( 'You waive all your copyright and related rights in this work, worldwide.', 'wp_licenser' ),
        'publicdomain' => __( 'Except where otherwise noted, this work is in the public domain.', 'wp_licenser' ),
        'ar' => __( 'Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).', 'wp_licenser' ),
        ));
}

function wp_get_licenser( $license_id = null ){
    $licenses_descriptions = array(
        'sa' => __( 'Others must distribute derivatives of your work under the same license.', 'wp_licenser' ),
        'by' => __( 'Others can distribute, remix, and build upon your work as long as they credit you.', 'wp_licenser' ),
        'nd' => __( 'Others can only distribute non-derivative copies of your work.', 'wp_licenser' ),
        'nc' => __( 'Others can use your work for non-commercial purposes only.', 'wp_licenser' ),
        'zero' => __( 'You waive all your copyright and related rights in this work, worldwide.', 'wp_licenser' ),
        'publicdomain' => __( 'Except where otherwise noted, this work is in the public domain.', 'wp_licenser' ),
        'ar' => __( 'Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).', 'wp_licenser' ),
        );
    switch ( $license_id ) {
        case 'publicdomain':
            $output = '<a class="link" href="https://creativecommons.org/publicdomain/mark/1.0/" data-tooltip="' . $licenses_descriptions['publicdomain'] . '">Public domain</a>';
            break;
        
        case 'zero':
            $output = '<a class="link" href="http://creativecommons.org/publicdomain/zero/1.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work has been dedicated to the public domain using CC0.">No rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['zero'] . '">' . fa_load_svg('svg-creativeCommonsZero-21px-p0') . '</span></span>' ;
            break;

        case 'by':
            $output = '<a class="link" href="http://creativecommons.org/licenses/by/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span></span>' ;
            break;

        case 'by-nd':
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nd/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NoDerivatives 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nd'] . '">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . '</span></span>' ;
            break;

        case 'by-sa':
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-sa/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['sa'] . '">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . '</span></span>' ;
            break;

        case 'by-nc':
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span></span>' ;
            break;    

        case 'by-nc-nd':
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span><span title="' . $licenses_descriptions['nd'] . '">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . '</span></span>' ;
            break;

        case 'by-nc-sa':
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc-sa/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span><span title="' . $licenses_descriptions['sa'] . '">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . '</span></span>' ;
            break;

        default:
            $output = '<span data-tooltip="Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).">All rights reserved by the author</span>';
            break;
    }
    return $output;
}

function wp_licenser(){
    global $post;
    $license_id = get_post_meta( $post->ID , '_license' , true);
    $licenses_descriptions = array(
        'sa' => __( 'Others must distribute derivatives of your work under the same license.', 'wp_licenser' ),
        'by' => __( 'Others can distribute, remix, and build upon your work as long as they credit you.', 'wp_licenser' ),
        'nd' => __( 'Others can only distribute non-derivative copies of your work.', 'wp_licenser' ),
        'nc' => __( 'Others can use your work for non-commercial purposes only.', 'wp_licenser' ),
        'zero' => __( 'You waive all your copyright and related rights in this work, worldwide.', 'wp_licenser' ),
        'publicdomain' => __( 'Except where otherwise noted, this work is in the public domain.', 'wp_licenser' ),
        'ar' => __( 'Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).', 'wp_licenser' ),
        );
    switch ( $license_id ) {
        case 1:
            $output = '<a class="link" href="https://creativecommons.org/publicdomain/mark/1.0/" data-tooltip="' . $licenses_descriptions['publicdomain'] . '">Public domain</a>';
            break;
        
        case 2:
            $output = '<a class="link" href="http://creativecommons.org/publicdomain/zero/1.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work has been dedicated to the public domain using CC0.">No rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['zero'] . '">' . fa_load_svg('svg-creativeCommonsZero-21px-p0') . '</span></span>' ;
            break;

        case 4:
            $output = '<a class="link" href="http://creativecommons.org/licenses/by/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span></span>' ;
            break;

        case 5:
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nd/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NoDerivatives 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nd'] . '">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . '</span></span>' ;
            break;

        case 6:
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-sa/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-ShareAlike 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['sa'] . '">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . '</span></span>' ;
            break;

        case 7:
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span></span>' ;
            break;    

        case 8:
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc-nd/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span><span title="' . $licenses_descriptions['nd'] . '">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . '</span></span>' ;
            break;

        case 9:
            $output = '<a class="link" href="https://creativecommons.org/licenses/by-nc-sa/4.0/" rel="license cc:license" target="_blank" data-tooltip="Except where otherwise noted, this work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International license.">Some rights reserved</a>  by the author.<span class="postMeta-licenseIcons"><span title="' . $licenses_descriptions['by'] . '">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . '</span><span title="' . $licenses_descriptions['nc'] . '">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . '</span><span title="' . $licenses_descriptions['sa'] . '">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . '</span></span>' ;
            break;

        default:
            $output = '<span data-tooltip="Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).">All rights reserved by the author</span>';
            break;
    }
    return $output;
}

add_action('save_post', 'wp_licenser_post_save_hook');
function wp_licenser_post_save_hook($post_id) {
    global $post;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST['wp_licenser_hidden_flag'])) {

        $custom_meta_fields = array(
            '_license' );

        foreach ($custom_meta_fields as $custom_meta_field) {
            if (isset($_POST[$custom_meta_field])) {
                update_post_meta($post_id, $custom_meta_field, htmlspecialchars(stripslashes($_POST[$custom_meta_field])));
            } else {
                delete_post_meta($post_id, $custom_meta_field);
            }

        }

        $get_meta = get_post_custom($post_id);

    }
}



add_action("admin_init", "wp_licenser_posts_init");
function wp_licenser_posts_init() {
    add_meta_box("wp_licenser_post_options", "License", "wp_licenser_post_options_module", "post", "normal", "high");
}

function wp_licenser_post_options_module() {
    global $post;
    $get_meta = get_post_custom($post->ID);
    ?>

    <input type="hidden" name="wp_licenser_hidden_flag" value="true" />
    <div class="tiepanel-item">
        <?php

    $current_value = $get_meta['_license'][0] ? $get_meta['_license'][0] : 3;
    $licenses = array(
        array(1,'Public domain'),
        array(2,'Creative Commons copyright waiver'),
        array(3,'All rights reserved'),
        array(4,'Attribution'),
        array(5,'Attribution, no derivatives'),
        array(6,'Attribution, share alike'),
        array(7,'Attribution, non-commercial'),
        array(8,'Attribution, non-commercial, no derivatives'),
        array(9,'Attribution, non-commercial, share alike'),
        );
    $licenses_descriptions = array(
        'sa' => __( 'Others must distribute derivatives of your work under the same license.', 'wp_licenser' ),
        'by' => __( 'Others can distribute, remix, and build upon your work as long as they credit you.', 'wp_licenser' ),
        'nd' => __( 'Others can only distribute non-derivative copies of your work.', 'wp_licenser' ),
        'nc' => __( 'Others can use your work for non-commercial purposes only.', 'wp_licenser' ),
        'zero' => __( 'You waive all your copyright and related rights in this work, worldwide.', 'wp_licenser' ),
        'publicdomain' => __( 'Except where otherwise noted, this work is in the public domain.', 'wp_licenser' ),
        'ar' => __( 'Others cannot copy, distribute, or perform your work without your permission (or as permitted by fair use).', 'wp_licenser' ),
        );
    $output .= '<div class="licenseSelector-group">';
    foreach ($licenses as $key => $license) {
        $output .= '<label class="label label--radio label--block"><input type="radio" id="_license" name="_license" value="' . $license[0] . '" class="radio u-hide v-hide"';
        if ( $current_value == $license[0] ) $output .= ' checked=true';
        $output .='><span class="radioInput"></span>' .$license[1] . '
    </label>';
    if( $license[0] ==1 || $license[0] ==2) $output .= '</div><div class="licenseSelector-group">';
    }
    $output .= '</div><div class="licenseSelector-descriptors">';

    switch ( $current_value ) {
        case 1:
            $output .= '<div class="licenseSelector-descriptor">'  . $licenses_descriptions['publicdomain'] . '</div>';
            break;
        
        case 2:
            $output .= '<div class="licenseSelector-descriptor">' . $licenses_descriptions['zero'] . '</div>';
            break;

        case 3:
            $output .= '<div class="licenseSelector-descriptor">' . $licenses_descriptions['ar'] . '</div>';
            break;

        case 4:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            break;
            
        case 5:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . $licenses_descriptions['nd'] . '</div>';
            break;
            
        case 6:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . $licenses_descriptions['sa'] . '</div>'; 
            break;
            
        case 7:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . $licenses_descriptions['nc'] . '</div>'; 
            break;
            
        case 8:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . $licenses_descriptions['nc'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsNd-21px-p0') . $licenses_descriptions['nd'] . '</div>'; 
            break;
            
        case 9:
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsBy-21px-p0') . $licenses_descriptions['by'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsNc-21px-p0') . $licenses_descriptions['nc'] . '</div>';
            $output .= '<div class="licenseSelector-descriptor">' . fa_load_svg('svg-creativeCommonsSa-21px-p0') . $licenses_descriptions['sa'] . '</div>'; 
            break;                            
        default:
            # code...
            break;
    }
    

    $output .= '</div>';
    echo $output;
    ?>
    </div>
<?php
}

function fa_load_svg( $type = null , $size = 21 ){
    return '<svg viewBox="0 0 ' . $size . ' ' . $size . '" width="' . $size . '" height="' . $size . '" class="svgIcon"><use class="svgIcon-use" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icons.svg#' . $type . '"></use></svg>';
}