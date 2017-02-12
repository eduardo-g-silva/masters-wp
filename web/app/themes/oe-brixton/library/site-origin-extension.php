<?php
/**
* extending page builder plugins
*
* @link http://open-ecommeerce.org
* @subpackage oe-brixton
* @since oe-brixton 1.0.0
*/


function oebrixton_extend_button_form( $form_options, $widget ){
    // Lets add a new theme option
    if( !empty($form_options['design']['fields']['theme']['options']) ) {
        $form_options['design']['fields']['theme']['options']['test'] = __('Test Style', 'oebrixton');
    }

    return $form_options;
}
add_filter('siteorigin_widgets_form_options_sow-button', 'oebrixton_extend_button_form', 10, 2);


function oebrixton_button_template_file( $filename, $instance, $widget ){
    if( !empty($instance['design']['theme']) && $instance['design']['theme'] == 'test' ) {
        // And this one for themes
        $filename = get_stylesheet_directory() . 'page-builder/tpl/button/button.php';
    }
    return $filename;
}
add_filter( 'siteorigin_widgets_template_file_sow-button', 'oebrixton_button_template_file', 10, 3 );
