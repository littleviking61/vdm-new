<?php
/*  ----------------------------------------------------------------------------
    IonMag Child theme
 */




/*  ----------------------------------------------------------------------------
    add the parent style + style.css from this folder
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 1001);
function theme_enqueue_styles() {
    wp_enqueue_style('ionMag', get_template_directory_uri() . '/style.css', '', TD_THEME_VERSION . 'c' , 'all' );
    wp_enqueue_style('ionMag-child', get_stylesheet_directory_uri() . '/style.css', array('td-theme'), TD_THEME_VERSION . 'c', 'all' );
}