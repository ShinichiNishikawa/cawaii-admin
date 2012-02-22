<?php 
/*
Plugin Name: Cawaii Admin
Plugin URI: http://wordpress.org/extend/plugins/cawaii-admin/
Description: make your admin panel cawaii!
Version: 0.2.0
Author: Shinichi Nishikawa
Author URI: http://nskw-style.com/
*/

// I18n
function cawaii_I18n() {
	$plugin_dir = basename(dirname(__FILE__)); 
	load_plugin_textdomain( 'cawaii-admin', false, $plugin_dir . '/lang' );	
}
add_action('plugins_loaded', 'cawaii_I18n');

global $wp_version;



/*****************************************
			------- UPDATE OPTIONS -------
******************************************/
$post_data = stripslashes_deep( $_POST );
	$dashboard_right_now = intval($post_data['dashboard_right_now']);
	$dashboard_recent_comments = intval($post_data['dashboard_recent_comments']);
	$dashboard_incoming_links = intval($post_data['dashboard_incoming_links']);
	$dashboard_plugins = intval($post_data['dashboard_plugins']);
	$dashboard_primary = intval($post_data['dashboard_primary']);
	$dashboard_secondary = intval($post_data['dashboard_secondary']);
	$dashboard_quick_press = intval($post_data['dashboard_quick_press']);
	$dashboard_recent_drafts = intval($post_data['dashboard_recent_drafts']);
	$cawaii_dshbrd_metaboxes = array(
		'dashboard_right_now' => $dashboard_right_now,
		'dashboard_recent_comments' => $dashboard_recent_comments,
		'dashboard_incoming_links' => $dashboard_incoming_links, 
		'dashboard_plugins' => $dashboard_plugins,
		'dashboard_primary' => $dashboard_primary,
		'dashboard_secondary' => $dashboard_secondary,
		'dashboard_quick_press' => $dashboard_quick_press,
		'dashboard_recent_drafts' => $dashboard_recent_drafts
	);

	$postcustom = intval($post_data['postcustom']);
	$postexcerpt = intval($post_data['postexcerpt']);
	$commentstatusdiv = intval($post_data['commentstatusdiv']);
	$trackbacksdiv = intval($post_data['trackbacksdiv']);
	$revisionsdiv = intval($post_data['revisionsdiv']);
	$formatdiv = intval($post_data['formatdiv']);
	$slugdiv = intval($post_data['slugdiv']);
	$authordiv = intval($post_data['authordiv']);
	$postimagediv = intval($post_data['postimagediv']);
	$tagsdiv_post_tag = intval($post_data['tagsdiv_post_tag']);
	$cawaii_post_metaboxes = array(
		'postcustom' => $postcustom,
		'postexcerpt' => $postexcerpt,
		'commentstatusdiv' => $commentstatusdiv,
		'trackbacksdiv' => $trackbacksdiv,
		'revisionsdiv' => $revisionsdiv,
		'formatdiv' => $formatdiv,
		'slugdiv' => $slugdiv,
		'authordiv' => $authordiv,
		'postimagediv' => $postimagediv,
		'tagsdiv_post_tag' => $tagsdiv_post_tag
	);
	
function cawaii_update_option() {
	global $post_data, $cawaii_dshbrd_metaboxes, $cawaii_post_metaboxes;
	if ( isset( $post_data['cawaii_desuka'] ) && $post_data['cawaii_desuka'] == 'yes' ) {
		cawaii_check_admin_referer('cawaii_admin');
		if ( isset( $post_data['bg_css'] ) && in_array( $post_data['bg_css'], array( 'bg_brown', 'bg_paper1', 'bg_paper2', 'bg_shick1', 'bg_shick2', 'bg_heart', 'bg_none' ) ) ) {
			update_option( 'bg_css', $post_data['bg_css'] );
		}
		if ( isset( $post_data['bg_at'] ) && in_array( $post_data['bg_at'], array( 'bg_at_scroll', 'bg_at_fixed' ) ) ) {
			update_option( 'bg_at', $post_data['bg_at'] );
		}
		if ( isset( $post_data['color_css'] ) && in_array( $post_data['color_css'], array( 'color_warm', 'color_cold', 'color_default' ) ) ) {
			update_option( 'color_css', $post_data['color_css'] );
		}
		if ( isset( $post_data['menu_pattern'] ) && in_array( $post_data['menu_pattern'], array( 'menu_noside', 'menu_default' ) ) ) {
			update_option( 'menu_pattern', $post_data['menu_pattern'] );
		}
		if ( isset( $post_data['cawaii_header_logo'] ) && cawaii_is_url( $post_data['cawaii_header_logo'] ) )  {
			update_option( 'cawaii_header_logo', trim($post_data['cawaii_header_logo']) );
		}
		if ( isset( $post_data['cawaii_login_logo'] ) && cawaii_is_url( $post_data['cawaii_login_logo'] ) )  {
			update_option( 'cawaii_login_logo', $post_data['cawaii_login_logo'] );
		}
		update_option('cawaii_dshbrd_metaboxes', $cawaii_dshbrd_metaboxes);
		update_option('cawaii_post_metaboxes', $cawaii_post_metaboxes);
		if ( isset( $post_data['force_default_login_logo'] ) && in_array( $post_data['force_default_login_logo'], array('force_wapuu_login_logo', 'force_wp_login_logo', 'force_user_login_logo') ) ) {
			update_option('force_default_login_logo', $post_data['force_default_login_logo']);
		}
		if ( isset( $post_data['force_default_header_logo'] ) && in_array( $post_data['force_default_header_logo'], array('force_user_header_logo', 'force_wapuu_header_logo', 'force_wp_header_logo') ) ) {
			update_option('force_default_header_logo', $post_data['force_default_header_logo']);
		}
	}
}
add_action('admin_head-settings_page_cawaii-admin/cawaii-admin', 'cawaii_update_option');


/*****************************************
			------- OUTPUT depending on conditions -------
******************************************/
/* MENU TYPE */
	if ( ( empty( $_POST['cawaii_desuka'] ) && get_option('menu_pattern') == 'menu_noside' ) || ( ( isset( $_POST['cawaii_desuka'] ) && $_POST['cawaii_desuka'] == 'yes' ) && $_POST['menu_pattern'] == 'menu_noside' ) ) {
		//  NO sidebar but HEADER
		add_action('admin_menu', 'cawaii_remove_menus'); //remove sidebar menus
		add_action('adminmenu', 'cawaii_header_menu_all'); // display all the header
		add_action('admin_head', 'cawaii_admin_noside_css'); // css to remove sidebar
		add_action('admin_head', 'cawaii_dropdown_js'); // load dropdown js
	} elseif ( ( empty( $_POST['cawaii_desuka'] ) && get_option('menu_pattern') == 'menu_default' ) || ( ( isset( $_POST['cawaii_desuka'] ) && $_POST['cawaii_desuka'] == 'yes' ) && $_POST['menu_pattern'] == 'menu_default' ) ) {
		add_action('adminmenu', 'cawaii_header_half'); // ヘッダーを半分出す
		if ( $wp_version >= 3.3 ) {
			add_action('admin_head', 'cawaii_admin_side_css');
		}
	}

// output css to display background image in <head>
	function cawaii_output_bg_css() { 
		$bg_img_url = plugin_dir_url(__FILE__) . 'img/' . get_option('bg_css') . '.gif';
		if ( get_option('bg_at') == 'bg_at_fixed' ) {
			$bg_attachment_type = 	'fixed';
		} else {
			$bg_attachment_type = 'scroll';
		}
	?>
		<style type="text/css" charset="utf-8">
			html, #post-body, #media-buttons, #poststuff #titlewrap, #wp-content-editor-tools {
				background: url("<?php echo $bg_img_url; ?>") repeat <?php echo $bg_attachment_type; ?> 0 0 ;
			}
			.cawaii-select-img {
				position: relative;
				top: 6px;
			}
			#bg_css img {
				border: 2px solid gray;
			}
			<?php if($wp_version >= 3.3){?>
				.wp-editor-container, .wp-editor-container {
					background: #fff !important;
				}
			<?php } ?>
		</style>
		<?php 
	}
	add_action('admin_head', 'cawaii_output_bg_css');

	// load common css
	function cawaii_admin_base_css() {
		echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url(__FILE__) . 'inc/cawaii-style-base.css" />';
	}
	add_action('admin_head', 'cawaii_admin_base_css', 11);

	function cawaii_admin_color_css() {
		switch ( get_option('color_css') )  {
			case 'color_cold':
				echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url(__FILE__) . 'inc/cawaii-style-fonts-cold.css" />';
				break;
			case 'color_warm':
				echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url(__FILE__) . 'inc/cawaii-style-fonts-warm.css" />';
				break;
		}
	}
	add_action('admin_head', 'cawaii_admin_color_css', 11);

// Output css for login page
function cawaii_login_css()	{
	// path to the background image
	$bg_img_url = plugin_dir_url(__FILE__) . 'img/' . get_option('bg_css') . '.gif';
	// attachment
	if ( get_option('bg_at') == 'bg_at_fixed' ) {
		$bg_attachment_type = 	'fixed';
	} else {
		$bg_attachment_type = 'scroll';
	}
	// warm or cold
	if ( get_option('color_css') == 'color_warm' ) {
		$cawaii_button_color = 'F186B6';
	} elseif ( get_option('color_css') == 'color_cold' ) {
		$cawaii_button_color = 'F48120';
	}
	// Login logo
	// 1: img by user, 2: wp default, 3: wapuu
	if ( get_option('force_default_login_logo') == 'force_user_login_logo' && get_option('cawaii_login_logo') ) {
		$cawaii_login_logo_path = get_option('cawaii_login_logo');
	} elseif ( get_option('force_default_login_logo') == 'force_wp_login_logo' ) {
		$cawaii_login_logo_path = plugin_dir_url(__FILE__) . 'img/logo-login.png';
	} else {
		$cawaii_login_logo_path = plugin_dir_url(__FILE__) . 'img/wapuu-login.png';
	}
?>
<style type="text/css" charset="utf-8">
	html, #post-body, #media-buttons, #poststuff #titlewrap, body.login {
		background: url("<?php echo $bg_img_url; ?>") repeat <?php echo $bg_attachment_type; ?> 0 0 !important;
	}
	#nav, #backtoblog {
		text-shadow: none;
	}
	input.button-primary, button.button-primary, a.button-primary {
		background-color: #<?php echo $cawaii_button_color; ?>;
		background-image: none;
		border-color: #<?php echo $cawaii_button_color; ?>;
		text-shadow: none;
	}
	<?php if ( $wp_version >= 3.3 ) {?>
	.login .button-primary {
		background-color: #<?php echo $cawaii_button_color; ?>;
	}
	<?php }?>
	h1 a, .login h1 a {
		background: url("<?php echo $cawaii_login_logo_path; ?>") no-repeat scroll center top transparent;
	}
	form, .login form {
		border-color: #<?php echo $cawaii_button_color; ?>;
		border-width: 2px;
	}
</style>
<?php
}
add_action('login_head', 'cawaii_login_css');

// Dont't allow plugins by other plugins
remove_all_actions('wp_dashboard_setup');

// remove metaboxes from dashboard
function cawaii_rmv_dshbrd() {
$dashboard_removed_meta_boxes = get_option('cawaii_dshbrd_metaboxes');
$dashboard_removed_meta_boxes = stripslashes_deep( $dashboard_removed_meta_boxes );
	$dashboard_right_now = intval($dashboard_removed_meta_boxes['dashboard_right_now']);
	$dashboard_recent_comments = intval($dashboard_removed_meta_boxes['dashboard_recent_comments']);
	$dashboard_incoming_links = intval($dashboard_removed_meta_boxes['dashboard_incoming_links']);
	$dashboard_plugins = intval($dashboard_removed_meta_boxes['dashboard_plugins']);
	$dashboard_primary = intval($dashboard_removed_meta_boxes['dashboard_primary']);
	$dashboard_secondary = intval($dashboard_removed_meta_boxes['dashboard_secondary']);
	$dashboard_quick_press = intval($dashboard_removed_meta_boxes['dashboard_quick_press']);
	$dashboard_recent_drafts = intval($dashboard_removed_meta_boxes['dashboard_recent_drafts']);
	global $wp_meta_boxes;
	if ( $dashboard_right_now ) {
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);//status
	}
	if ( $dashboard_recent_comments ) {
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);//recent comment
	}
	if ( $dashboard_incoming_links ) {
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);// IncomingLinks
	}
	if ( $dashboard_plugins ) {
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);//  Plugins
	}
	if ( $dashboard_primary ) {
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);//  Wordpress Developer Blog
	}
	if ( $dashboard_secondary ) {
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);// Forum
	}
	if ( $dashboard_quick_press ) {
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);// quick press
	}
	if ( $dashboard_recent_drafts ) {
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);// recent drafts
	}
}
add_action('wp_dashboard_setup', 'cawaii_rmv_dshbrd');

// remove metaboxes from post/page edit pages
function remove_default_post_screen_metaboxes() {
	$post_removed_meta_boxes = get_option('cawaii_post_metaboxes');
	$post_removed_meta_boxes = stripslashes_deep( $post_removed_meta_boxes );
		$postcustom = intval($post_removed_meta_boxes['postcustom']);
		$postexcerpt = intval($post_removed_meta_boxes['postexcerpt']);
		$commentstatusdiv = intval($post_removed_meta_boxes['commentstatusdiv']);
		$trackbacksdiv = intval($post_removed_meta_boxes['trackbacksdiv']);
		$revisionsdiv = intval($post_removed_meta_boxes['revisionsdiv']);
		$formatdiv = intval($post_removed_meta_boxes['formatdiv']);
		$slugdiv = intval($post_removed_meta_boxes['slugdiv']);
		$authordiv = intval($post_removed_meta_boxes['authordiv']);
	if ( $postcustom ) {
		remove_meta_box( 'postcustom','post','normal' ); // custom fields
	}
	if ( $postexcerpt ) {
		remove_meta_box( 'postexcerpt','post','normal' ); // excerpts
	}
	if ( $commentstatusdiv ) {
		remove_meta_box( 'commentstatusdiv','post','normal' ); // comment status
	}
	if ( $trackbacksdiv ) {
		remove_meta_box( 'trackbacksdiv','post','normal' ); // trackbacks
	}
	if ( $revisionsdiv ) {
		remove_meta_box( 'revisionsdiv','post','normal' ); // revisions for post
		remove_meta_box( 'revisionsdiv','page','normal' ); // revisions for page
	}
	if ( $formatdiv ) {
		remove_meta_box( 'formatdiv','post','normal' ); // format
	}
	if ( $slugdiv ) {
		remove_meta_box( 'slugdiv','post','normal' ); // slugs
		remove_meta_box( 'slugdiv','page','normal' ); // slugs
	}
	if ( $authordiv ) {
		remove_meta_box( 'authordiv','post','normal' ); // author
	}
}
add_action('admin_menu','remove_default_post_screen_metaboxes');
// remove metaboxes from post/page edit pages (right side)
function remove_image_box() {
	$post_removed_meta_boxes = get_option('cawaii_post_metaboxes');
	$post_removed_meta_boxes = stripslashes_deep( $post_removed_meta_boxes );
		$postimagediv = intval($post_removed_meta_boxes['postimagediv']);
		$tagsdiv_post_tag = intval($post_removed_meta_boxes['tagsdiv_post_tag']);
	if ( $postimagediv ) {
		remove_meta_box( 'postimagediv','post','side' );
		remove_meta_box( 'postimagediv','page','side' );		
	}
	if ( $tagsdiv_post_tag ) {
		remove_meta_box( 'tagsdiv-post_tag', 'post' , 'side' );		
	}
}
add_action('do_meta_boxes', 'remove_image_box');


/*****************************************
			------- functions -------
******************************************/

// Remove Sidebar
function cawaii_remove_menus() {
		global $menu;
		unset($menu[2]);//dashboard
		unset($menu[5]);//post
		unset($menu[10]);//media
		unset($menu[15]);//links
		unset($menu[20]);//page
		unset($menu[25]);//comment
		unset($menu[60]);//theme
		unset($menu[65]);//plugin
		unset($menu[70]);//user
		unset($menu[75]);//tool
		unset($menu[80]);//settings
		unset($menu[90]);//menu-line
		unset($menu[99]);//unknown..
}

// Remove Sidebars (css)
function cawaii_admin_noside_css() {
	echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url(__FILE__) . 'inc/cawaii-style-noside.css" />';
}
function cawaii_admin_side_css() {
	echo '<link rel="stylesheet" type="text/css" href="' . plugin_dir_url(__FILE__) . 'inc/cawaii-style-side.css" />';
}

// Display header (Half)
function cawaii_header_half() {
		echo '</ul></div>';
		require_once('inc/cawaii-admin-header.php');
		echo '</div><div><ul>';
}

// Display header (All)
function cawaii_header_menu_all() {
		echo '</ul></div>';
		require_once('inc/cawaii-admin-header.php');
		require_once('inc/cawaii-admin-header-menu.php');	
		echo '</div><div><ul>';
}

// Add setting page
function cawaii_admin_setting_page() {
	require_once('inc/cawaii_admin_setting_page.php');
}
function cawaii_admin_subpage() {
	add_submenu_page('options-general.php', 'Cawaii Admin', 'Cawaii Admin', 'administrator', __FILE__, 'cawaii_admin_setting_page');
}
add_action('admin_menu', 'cawaii_admin_subpage');
// load scripts
add_action('admin_print_scripts-settings_page_cawaii-admin/cawaii-admin', 'my_admin_scripts');
add_action('admin_print_styles-settings_page_cawaii-admin/cawaii-admin', 'my_admin_styles');
add_action('admin_head-settings_page_cawaii-admin/cawaii-admin', 'media_up_by_firegoby');
function my_admin_styles() {
    wp_enqueue_style('thickbox');
}
function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
}
function media_up_by_firegoby() { // http://firegoby.theta.ne.jp/archives/2261
	require_once('inc/cawaii-admin-upload.php');
}

// Load dropdown js
function cawaii_dropdown_js() {
	echo '<script type="text/javascript" src="' . plugin_dir_url(__FILE__) . 'inc/drop-down.js"></script>';
}

// verifi it's an url
function cawaii_is_url($text) {
    if (preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $text)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
function cawaii_check_admin_referer($action = -1, $query_arg = '_wpnonce') {
	if ( -1 == $action )
		_doing_it_wrong( __FUNCTION__, __( 'You should specify a nonce action to be verified by using the first parameter.' ), '3.2' );
	$adminurl = strtolower(admin_url());
	$referer = strtolower(wp_get_referer());
	$result = isset($_REQUEST[$query_arg]) ? wp_verify_nonce($_REQUEST[$query_arg], $action) : false;
	if ( !$result && !(-1 == $action && strpos($referer, $adminurl) === 0) ) {
		wp_nonce_ays($action);
		die();
	}
	do_action('check_admin_referer', $action, $result);
	return $result;
}

// CSS for the setting page of this plugin
function cawaii_admin_setting_page_css() { 
	$url = preg_replace( '/^https?:/', '', plugin_dir_url( __FILE__ ) ) . 'img/wapuu-32.png'; ?>
	<style type="text/css" charset="utf-8">
	#cawaii-admin-icon32 {
		background: url( <?php echo plugin_dir_url( __FILE__ ); ?>/img/wapuu-32.gif ) no-repeat center;
	}
	</style>
<?php }
add_action('admin_print_styles-settings_page_cawaii-admin/cawaii-admin', 'cawaii_admin_setting_page_css');