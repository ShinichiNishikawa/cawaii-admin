<?php 
/*
Original Header
*/

global $current_user;
get_currentuserinfo();
$user_name = $current_user->display_name;
?>

<div id="colog-admin-menu" class="clearfix">
	<p id="logoarea">
		<?php
		$stored_path = get_option('cawaii_header_logo');
		if ( ( get_option('force_default_header_logo') == 'force_user_header_logo' ) && isset( $stored_path ) ) {
			$cawaii_header_logo_url = get_option('cawaii_header_logo');
		} elseif ( get_option('force_default_header_logo') == 'force_wp_header_logo' ) {
			$cawaii_header_logo_url = plugins_url() . '/cawaii-admin/img/head-wp-logo.png';
		} else {
			$cawaii_header_logo_url = plugins_url() . '/cawaii-admin/img/wapuu-60.gif';
		}
		?>
		<a href="<?php echo get_admin_url(); ?>"><img src="<?php echo htmlspecialchars($cawaii_header_logo_url); ?>" title="<?php _e( 'Dashboard', 'cawaii-admin' ); ?>管理画面トップ" alt="<?php _e( 'Dashboard', 'cawaii-admin' ); ?>管理画面" class="colog-admin-logo" /></a>
	</p>
	
	<p id="basicarea">
		<?php _e( 'Hello, ', 'cawaii-admin' ); ?> <a href="<?php echo get_admin_url('', 'profile.php') ?>"><?php echo $user_name; ?>!</a>
		<a style="margin-left:10px;" href="<?php bloginfo('url'); ?>" target="_blank">&rarr;<?php bloginfo('name'); ?></a>
		<a style="margin-left:10px;" href="<?php echo wp_logout_url(); ?>"><?php _e( 'logout', 'cawaii-admin' ); ?></a>
	</p>