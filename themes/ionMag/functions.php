<?php
/*
	Load the speed booster framework + theme specific files
*/
// load the deploy mode
require_once('td_deploy_mode.php');

// load the config
require_once('includes/td_config.php');
add_action('td_global_after', array('td_config', 'on_td_global_after_config'), 9); //we run on 9 priority to allow plugins to updage_key our apis while using the default priority of 10



// check and load the wp_booster framework
//if (!file_exists('includes/wp_booster/td_wp_booster_functions.php')) {
//    echo ':( wp_booster Framework not found! The framework should be in ' . TD_THEME_NAME . '/includes/wp_booster';
//    die;
//}
require_once('includes/wp_booster/td_wp_booster_functions.php');

require_once('includes/td_css_generator.php');
require_once('includes/widgets/td_page_builder_widgets.php'); // widgets

//td_demo_state::update_state("premium_magazine", 'full');





/**
 * tdStyleCustomizer.js is required
 */
if (TD_DEBUG_LIVE_THEME_STYLE) {
    add_action('wp_footer', 'td_theme_style_footer');
    function td_theme_style_footer() {
        ?>
        <div id="td-theme-settings" class="td-live-theme-demos td-theme-settings-small">
            <div class="td-skin-body">
                <div class="td-skin-wrap">
                    <div class="td-skin-container td-skin-buy"><a target="_blank" href="http://themeforest.net/item/newspaper/9512331?ref=tagdiv">FREE DOWNLOAD NOW!</a></div>
                    <div class="td-skin-container td-skin-header">GET AN AWESOME START!</div>
                    <div class="td-skin-container td-skin-desc">The theme comes with the following demos. You can start your site using one of them or make your own design.</div>
                    <div class="td-skin-container td-skin-content">
                        <div class="td-demos-list">
                            <?php
                            $td_demo_names = array();

                            foreach (td_global::$demo_list as $demo_id => $stack_params) {
                                $td_demo_names[$stack_params['text']] = $demo_id;
                                ?>
                                <div class="td-set-theme-style"><a href="<?php echo td_global::$demo_list[$demo_id]['demo_url'] ?>" class="td-set-theme-style-link td-popup td-popup-<?php echo $td_demo_names[$stack_params['text']] ?>" data-img-url="<?php echo td_global::$get_template_directory_uri ?>/demos_popup/large/<?php echo $demo_id; ?>.jpg"></a></div>
                            <?php } ?>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty1"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty5"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty2"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty6"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty3"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty7"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty4"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty8"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty9"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty10"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty11"></a></div>
                            <div class="td-set-theme-style-empty"><a href="#" class="td-popup td-popup-empty12"></a></div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="td-skin-scroll"><i class="td-icon-read-down"></i></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="td-set-hide-show"><a href="#" id="td-theme-set-hide"></a></div>
            <div class="td-screen-demo" data-width-preview="380"></div>
            <div class="td-screen-demo-extend"></div>
        </div>
        <?php
    }
}
