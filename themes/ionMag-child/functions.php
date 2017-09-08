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

add_theme_support('category-thumbnails');

register_sidebar(array(
	'name'=>'Footer Top',
	'id' => 'td-footer-top',
	'before_widget' => '<div class="td-pb-span4 widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="block-title"><span>',
	'after_title' => '</span></div>'
));

function sm_youtube_subscribe_shortcode_vdm( $atts ){
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
	$instance = get_option( 'sm_youtube_subscribe_options' );

	if(!empty($atts)){
		$instance = array_merge($instance,$atts);
	}

	$title 			= ($instance['title'])?$instance['title']:'';
	$channel_id 	= ($instance['sm_youtube_channel_id'])?$instance['sm_youtube_channel_id']:'UCqCoPdssS6PLjnjtU1bwqdQ';	     
	$layout    		= ($instance['sm_full_layout'])?'full':'default';	     
    $theme    		= ($instance['sm_dark_theme'])?'dark':'default';	     
    $count    		= ($instance['sm_subscriber_count_hide'])?'hidden':'default';	
	ob_start();
	?>

	<script src="https://apis.google.com/js/platform.js"></script>
	<?php if($title):?>
	<h3><?= $title;?></h3>
	<?php endif;?>
	<div 
		class="g-ytsubscribe" 
		data-channelid="<?php echo $channel_id; ?>" 
		data-layout="<?php echo $layout; ?>" 
		data-theme="<?php echo $theme; ?>" 
		data-count="<?php echo $count; ?>">			
	</div>
	<?php
	return ob_get_clean();
}

remove_shortcode('sm-youtube-subscribe');
add_shortcode( 'sm-youtube-subscribe', 'sm_youtube_subscribe_shortcode_vdm' );

// redirect de la catégorie vidéo

if($_SERVER['REQUEST_URI'] == '/video/') {
	wp_redirect( '/videos', 301 );
	exit;
}

add_action('after_setup_theme','remove_core_updates');
function remove_core_updates()
{
	if(! current_user_can('update_core')){return;}
	add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	add_filter('pre_option_update_core','__return_null');
	add_filter('pre_site_transient_update_core','__return_null');
}