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

    }
}
new td_api_plugin_vdm_pack();