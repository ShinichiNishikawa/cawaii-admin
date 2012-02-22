<div class="wrap">
<div id="cawaii-admin-icon32" class="icon32"></div><h2>Cawaii Admin</h2>

<form action="" method="post">

<h3><?php _e( 'Menu Type', 'cawaii-admin' ); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Select where to display menus', 'cawaii-admin' ); ?></th>
		<td>
			<label for="menu_noside"><input type="radio" name="menu_pattern" value="menu_noside" id="menu_noside" <?php if(get_option('menu_pattern') == 'menu_noside' ){ echo ' checked="checked"'; } ?> />　<?php _e( 'No Sidebar and Display cawaii menu in header which contains minimums.', 'cawaii-admin' ); ?></label><br />
			<label for="menu_default"><input type="radio" name="menu_pattern" value="menu_default" id="menu_default" <?php if(get_option('menu_pattern') == 'menu_default' ){ echo ' checked="checked"'; } ?> />　<?php _e( 'Display the default WordPress menu on Sidebar.', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
</table>

<h3><?php _e( 'Background', 'cawaii-admin' ); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Background Image', 'cawaii-admin' ); ?></th>
		<td id="bg_css">
			<label for="bg_brown"><input type="radio" name="bg_css" value="bg_brown" id="bg_brown" <?php if(get_option('bg_css') == 'bg_brown' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/bg_brown.gif" alt="" width="30" height="30" />　<?php _e( 'Pale Brown', 'cawaii-admin' ); ?></label><br />
			<label for="bg_check"><input type="radio" name="bg_css" value="bg_paper1" id="bg_paper1" <?php if(get_option('bg_css') == 'bg_paper1' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/bg_paper1.gif" alt="" width="30" height="30" />　<?php _e( 'Paper', 'cawaii-admin' ); ?></label><br />
			<label for="bg_check"><input type="radio" name="bg_css" value="bg_shick1" id="bg_shick1" <?php if(get_option('bg_css') == 'bg_shick1' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/bg_shick1.gif" alt="" width="30" height="30" />　<?php _e( 'Lily heraldic emblem on green fabric', 'cawaii-admin' ); ?></label><br />
			<label for="bg_check"><input type="radio" name="bg_css" value="bg_shick2" id="bg_shick2" <?php if(get_option('bg_css') == 'bg_shick2' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/bg_shick2.gif" alt="" width="30" height="30" />　<?php _e( 'carpet', 'cawaii-admin' ); ?></label><br />
			<label for="bg_check"><input type="radio" name="bg_css" value="bg_heart" id="bg_heart" <?php if(get_option('bg_css') == 'bg_heart' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/bg_heart.gif" alt="" width="30" height="30" />　<?php _e( 'Hearts', 'cawaii-admin' ); ?></label><br />
			<label for="bg_none"><input type="radio" name="bg_css" value="bg_none" id="bg_none" <?php if(get_option('bg_css') == 'bg_none' ){ echo ' checked="checked"'; } ?> />　<img src="<?php echo plugins_url(); ?>/cawaii-admin/img/white.png" alt="" width="30" height="30" />　<?php _e( 'WordPress default(white)', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
	<tr>
		<th valign="top"><?php _e( 'Scroll or fixed', 'cawaii-admin' ); ?></th>
		<td>
			<label for="bg_at_scroll"><input type="radio" name="bg_at" value="bg_at_scroll" id="bg_at_scroll" <?php if( get_option('bg_at') == 'bg_at_scroll' ){ echo ' checked="checked"'; } ?> /> <?php _e( 'Scroll', 'cawaii-admin' ); ?></label>
			　<label for="bg_at_fixed"><input type="radio" name="bg_at" value="bg_at_fixed" id="bg_at_fixed" <?php if( get_option('bg_at') == 'bg_at_fixed' ){ echo ' checked="checked"'; } ?> /> <?php _e( 'Fixed', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
</table>

<h3><?php _e( 'Colors', 'cawaii-admin' ); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Colors of textx, links and boxes', 'cawaii-admin' ); ?></th>
		<td>
			<label for="color_warm"><input type="radio" name="color_css" value="color_warm" id="color_warm" <?php if(get_option('color_css') == 'color_warm' ){ echo ' checked="checked"'; } ?> />　<?php _e( 'Warm colors', 'cawaii-admin' ); ?></label><br />
			<label for="color_cold"><input type="radio" name="color_css" value="color_cold" id="color_cold" <?php if(get_option('color_css') == 'color_cold' ){ echo ' checked="checked"'; } ?> />　<?php _e( 'Cold colors', 'cawaii-admin' ); ?></label><br />
			<label for="color_default"><input type="radio" name="color_css" value="color_default" id="color_default" <?php if(get_option('color_css') == 'color_default' ){ echo ' checked="checked"'; } ?> />　<?php _e( 'Default colors', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
</table>
<h3><?php _e( 'Logos', 'cawaii-admin' ); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><label for="cawaii_header_logo"><?php _e( 'Logo on the header of the admin panel', 'cawaii-admin' ); ?></label></th>
		<td>
			<input type="radio" name="force_default_header_logo" id="force_user_header_logo" value="force_user_header_logo" <?php if(get_option('force_default_header_logo') == 'force_user_header_logo' ){ echo ' checked="checked"'; } ?> />　<input type="text" id="cawaii_header_logo" name="cawaii_header_logo" class="media" value="<?php echo form_option('cawaii_header_logo'); ?>" />　<a class="media-upload" href="JavaScript:void(0);" rel="cawaii_header_logo"><?php _e( 'Choose', 'cawaii-admin' ); ?></a>　(<?php _e( 'Check and upload image file around 60px height.', 'cawaii-admin' ); ?>)<br />
			<input type="radio" name="force_default_header_logo" id="force_wapuu_header_logo" value="force_wapuu_header_logo" <?php if(get_option('force_default_header_logo') == 'force_wapuu_header_logo' ){ echo ' checked="checked"'; } ?> />　<label for="force_default_login_logo"><?php _e( 'Wapuu logo', 'cawaii-admin' ); ?></label><br />
			<input type="radio" name="force_default_header_logo" id="force_wp_header_logo" value="force_wp_header_logo" <?php if(get_option('force_default_header_logo') == 'force_wp_header_logo' ){ echo ' checked="checked"'; } ?> />　<label for="force_default_login_logo"><?php _e( 'WordPress logo', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="cawaii_login_logo"><?php _e( 'Logo on login page', 'cawaii-admin' ); ?></label></th>
		<td>
			<input type="radio" name="force_default_login_logo" id="force_user_login_logo" value="force_user_login_logo" <?php if(get_option('force_default_login_logo') == 'force_user_login_logo' ){ echo ' checked="checked"'; } ?> />　<input type="text" id="cawaii_login_logo" name="cawaii_login_logo" value="<?php echo form_option('cawaii_login_logo'); ?>" />　<a class="media-upload" href="JavaScript:void(0);" rel="cawaii_login_logo"><?php _e( 'Choose', 'cawaii-admin' ); ?></a>　(<?php _e( 'Check and upload image file around 80px height and 325px width', 'cawaii-admin' ); ?>)<br />
			<input type="radio" name="force_default_login_logo" id="force_wapuu_login_logo" value="force_wapuu_login_logo" <?php if(get_option('force_default_login_logo') == 'force_wapuu_login_logo' ){ echo ' checked="checked"'; } ?> />　<label for="force_default_login_logo"><?php _e( 'Wapuu logo', 'cawaii-admin' ); ?></label><br />
			<input type="radio" name="force_default_login_logo" id="force_wp_login_logo" value="force_wp_login_logo" <?php if(get_option('force_default_login_logo') == 'force_wp_login_logo' ){ echo ' checked="checked"'; } ?> />　<label for="force_default_login_logo"><?php _e( 'WordPress default logo', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
</table>

<h3><?php _e( 'metaboxes', 'cawaii-admin' ); ?></h3>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Dashboard metaboxes', 'cawaii-admin' ); ?></th>
		<td><?php _e( '(Select metaboxes to remove from the dashboard)', 'cawaii-admin' ); ?><br />
<?php 

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
?>
			<input type="checkbox" name="dashboard_right_now" id="dashboard_right_now" value="1" <?php if( $dashboard_right_now ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Right Now', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_recent_comments" id="dashboard_recent_comments" value="1" <?php if( $dashboard_recent_comments ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Recent Comments', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_incoming_links" id="dashboard_incoming_links" value="1" <?php if( $dashboard_incoming_links ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Incoming Links', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_plugins" id="dashboard_plugins" value="1" <?php if( $dashboard_plugins ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Plugins', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_primary" id="dashboard_primary" value="1" <?php if( $dashboard_primary ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'WordPress Developers Blog', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_secondary" id="dashboard_secondary" value="1" <?php if( $dashboard_secondary ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Forums', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_quick_press" id="dashboard_quick_press" value="1" <?php if( $dashboard_quick_press ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Quick Press', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="dashboard_recent_drafts" id="dashboard_recent_drafts" value="1" <?php if( $dashboard_recent_drafts ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Recent Drafts', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Edit page metaboxes', 'cawaii-admin' ); ?></th>
		<td><?php _e( '(Select metaboxes to remove from the post and page edit pages)', 'cawaii-admin' ); ?><br />
<?php 
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
	$postimagediv = intval($post_removed_meta_boxes['postimagediv']);
	$tagsdiv_post_tag = intval($post_removed_meta_boxes['tagsdiv_post_tag']);
?>
			<input type="checkbox" name="postcustom" id="postcustom" value="1" <?php if( $postcustom ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Customfield', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="postexcerpt" id="postexcerpt" value="1" <?php if( $postexcerpt ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Excerpt', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="commentstatusdiv" id="commentstatusdiv" value="1" <?php if( $commentstatusdiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Comments', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="trackbacksdiv" id="trackbacksdiv" value="1" <?php if( $trackbacksdiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Trackback', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="revisionsdiv" id="revisionsdiv" value="1" <?php if( $revisionsdiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Revisions', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="formatdiv" id="formatdiv" value="1" <?php if( $formatdiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Format', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="slugdiv" id="slugdiv" value="1" <?php if( $slugdiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Slug', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="authordiv" id="authordiv" value="1" <?php if( $authordiv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Author', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="postimagediv" id="postimagediv" value="1" <?php if( $postimagediv ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Featured Image', 'cawaii-admin' ); ?></label><br />
			<input type="checkbox" name="tagsdiv_post_tag" id="tagsdiv_post_tag" value="1" <?php if( $tagsdiv_post_tag ){ echo 'checked="checked"'; } ?> />　<label for="xxx"><?php _e( 'Post Tags', 'cawaii-admin' ); ?></label>
		</td>
	</tr>
</table>

<input type="hidden" name="cawaii_desuka" value="yes" />
<?php wp_nonce_field('cawaii_admin'); ?>
<p class="submit"><input type="submit" name="cawaii_submit" class="button-primary" value="<?php _e( 'Save Settings', 'cawaii-admin' ); ?>" /></p>
</form>

<div id="cawaii-credit">
	<ul>
		<li>Background Images by <a href="http://www.bgpatterns.com/" target="_blank">http://www.bgpatterns.com/</a>, <a href="http://josweb.co.uk/blog/2010/02/5-free-tiling-paper-patterns/" target="_blank">http://josweb.co.uk/</a></li>
	</ul>
</div>

</div><!-- .wrap -->