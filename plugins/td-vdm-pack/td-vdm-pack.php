<?php
/*
Plugin Name: ionMag VDM Pack
Plugin URI: http://wpion.com
Description: VDM Templates and Block for the ionMag Theme
Author: WPion
Version: 1.0
Author URI: http://wpion.com
*/
class td_api_plugin_vdm_pack {
    var $plugin_url = '';
    var $plugin_path = '';

    function __construct() {
        $this->plugin_url = plugins_url('', __FILE__); // path used for elements like images, css, etc which are available on end user
        $this->plugin_path = dirname(__FILE__); // used for internal (server side) files

        add_action('td_global_after', array($this, 'hook_td_global_after')); // hook used to add or modify items via Api
        add_action('admin_enqueue_scripts', array('td_api_plugin_vdm_pack', 'td_plugin_wpadmin_css')); // hook used to add custom css for wp-admin area
        add_action('wp_enqueue_scripts', array('td_api_plugin_vdm_pack', 'td_plugin_frontend_css')); // hook used to add custom css used on frontend area
    }

    static function td_plugin_wpadmin_css() {
        wp_enqueue_style('td-plugin-categories-vdm-framework', plugins_url('', __FILE__) . '/style-admin.css'); // backend css (admin_enqueue_scripts)
    }

    static function td_plugin_frontend_css() {
        wp_enqueue_style('td-plugin-categories-vdm-framework', plugins_url('', __FILE__) . '/style.css'); // frontend css (wp_enqueue_scripts)
    }

    function hook_td_global_after()    { //add the api code inside this function

        /**
         * category templates
         */
        td_api_category_template::add('td_category_template_vdm_1',
            array (
                'file' => $this->plugin_path . '/category_templates/td_category_template_vdm_1.php',
                'img' => $this->plugin_url . '/images/panel/category_templates/icon-category-vdm-1.png',
                'text' => 'Style VDM 1'
            )
        );

        //  td_api_module::add('td_module_vdm_1',
        //     array(
        //         'file' => $this->plugin_path . '/modules/td_module_vdm_1.php',
        //         'text' => 'Module VDM 1',
        //         'img' => $this->plugin_url . '/images/modules/td_module_vdm_1.png',
        //         'used_on_blocks' => array('Block VDM 1'),
        //         'excerpt_title' => 12,
        //         'excerpt_content' => '',
        //         'enabled_on_more_articles_box' => true,
        //         'enabled_on_loops' => true,
        //         'uses_columns' => true,
        //         'category_label' => true,
        //         'class' => 'td_module_wrap td-animation-stack',
        //         'group' => '' // '' - main theme, 'mob' - mobile theme, 'woo' - woo theme
        //     )
        // );
        // 
        // Blocks list
        td_api_block::add('td_block_vdm_1',
            array(
                'map_in_visual_composer' => true,
                "name" => 'Block VDM Titre',
                "base" => 'td_block_vdm_1',
                "class" => 'td_block_rd_13',
                "controls" => "full",
                "category" => 'Blocks',
                'tdc_category' => 'Blocks',
                'icon' => 'icon-pagebuilder-td_block_rd_13',
                'file' => $this->plugin_path . '/shortcodes/td_block_vdm_1.php',
                "params" => array_merge(
                    td_config::get_map_block_general_array()
                )
            )
        );

        td_api_block::add('td_block_author_vdm',
            array(
                'map_in_visual_composer' => true,
                "name" => 'Author box VDM',
                "base" => "td_block_author_vdm",
                "class" => "",
                "controls" => "full",
                "category" => 'Blocks',
                'icon' => 'icon-pagebuilder-td_block_author',
                'file' => $this->plugin_path . '/shortcodes/td_block_author_vdm.php',
                "params" => array(
                    array(
                        "param_name" => "custom_title",
                        "type" => "textfield",
                        "value" => 'Block title',
                        "heading" => "Block title",
                        "description" => "Custom title for this block",
                        "holder" => "div",
                        "class" => "tdc-textfield-extrabig",
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => 'Title text color',
                        "param_name" => "header_text_color",
                        "value" => '', //Default Red color
                        "description" => 'Optional - Choose a custom title text color for this block',
                    ),
                    array(
                        "type" => "colorpicker",
                        "holder" => "div",
                        "class" => "",
                        "heading" => 'Title background color',
                        "param_name" => "header_color",
                        "value" => '', //Default Red color
                        "description" => 'Optional - Choose a custom title background color for this block',
                    ),
                    array(
                        "param_name" => "author_id",
                        "type" => "textfield",
                        "value" => '',
                        "heading" => "Author ID",
                        "description" => 'Set the author id',
                        "holder" => "div",
                        "class" => "tdc-textfield-small",
                    ),
                    array(
                        "param_name" => "author_url_text",
                        "type" => "textfield",
                        "value" => '',
                        "heading" => "Author page link text",
                        "description" => "",
                        "holder" => "div",
                        "class" => "tdc-textfield-big",
                    ),
                     array(
                        "param_name" => "block_width",
                        "type" => "textfield",
                        "value" => '',
                        "heading" => 'Block width',
                        "description" => "",
                        "holder" => "div",
                        "class" => "tdc-textfield-small"
                    ),
                    array(
                        "param_name" => "author_info_text",
                        "type" => "textfield",
                        "value" => '',
                        "heading" => "Author description text",
                        "description" => "",
                        "holder" => "div",
                        "class" => "tdc-textfield-big",
                    ),
                    array(
                        "param_name" => "author_url",
                        "type" => "textfield",
                        "value" => '',
                        "heading" => "Author page link url",
                        "description" => "",
                        "holder" => "div",
                        "class" => "tdc-textfield-big",
                    ),
                    array(
                        "param_name" => "open_in_new_window",
                        "type" => "checkbox",
                        "value" => '',
                        "heading" => "Open in new window",
                        "description" => "",
                        "holder" => "div",
                        "class" => ""
                    ),
                    array(
                        "param_name" => "separator",
                        "type" => "horizontal_separator",
                        "value" => "",
                        "class" => ""
                    ),
                    array(
                        'param_name' => 'el_class',
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => 'Extra class',
                        'description' => 'Style particular content element differently - add a class name and refer to it in custom CSS',
                        'class' => 'tdc-textfield-extrabig',
                        'group' => ''
                    ),
                    array (
                        'param_name' => 'css',
                        'value' => '',
                        'type' => 'css_editor',
                        'heading' => 'Css',
                        'group' => 'Design options',
                    ),
                    array (
                        'param_name' => 'tdc_css',
                        'value' => '',
                        'type' => 'tdc_css_editor',
                        'heading' => '',
                        'group' => 'Design options',
                    ),
                )
            )
        );

        // td_api_single_template::add('single_template_vdm_1',
        //     array(
        //         'file' => $this->plugin_path . '/single_template_vdm_1.php',
        //         'text' => 'Single template VDM Video',
        //         'img' => $this->plugin_url . '/images/panel/single_templates/single_template_rd_9.png',
        //         'show_featured_image_on_all_pages' => true,
        //         'bg_disable_background' => false,          // disable the featured image
        //         'bg_box_layout_config' => 'auto',                // auto | td-boxed-layout | td-full-layout
        //         'bg_use_featured_image_as_background' => false,   // uses the featured image as a background
        //         'exclude_ad_content_top' => false,
        //     )
        // );

    }
}
new td_api_plugin_vdm_pack();