	<div id="colog-nav-box">
		<ul id="colog-admin-nav">
		    <li><a href="<?php echo get_admin_url(); ?>"><?php _e( 'Dashboard', 'cawaii-admin' ); ?></a></li>
		    <li class="diary"><a href="<?php echo get_admin_url('', 'post-new.php'); ?>">&#9660;<?php _e( 'Posts/Pages', 'cawaii-admin' ); ?> </a>
		        <ul>
		            <li><a href="<?php echo get_admin_url('', 'post-new.php'); ?>"><?php _e( 'New post', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'edit.php'); ?>"><?php _e( 'View all posts', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'edit-tags.php?taxonomy=category'); ?>"><?php _e( 'Categories', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'edit-tags.php?taxonomy=post_tag'); ?>"><?php _e( 'Post tags', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'edit.php?post_type=page'); ?>"><?php _e( 'view all pages', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'edit-comments.php'); ?>"><?php _e( 'Comments', 'cawaii-admin' ); ?></a></li>
		        </ul>
		    </li>
		    <li class="design"><a href="<?php echo get_admin_url('', 'themes.php'); ?>">&#9660;<?php _e( 'Themes', 'cawaii-admin' ); ?> </a>
		        <ul>
		            <li><a href="<?php echo get_admin_url('', 'themes.php'); ?>"><?php _e( 'Choose theme', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'widgets.php'); ?>"><?php _e( 'Widgets', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'themes.php?page=custom-header'); ?>"><?php _e( 'Header Image', 'cawaii-admin' ); ?></a></li>
		        </ul>
		    </li>
		    <li class="users"><a href="<?php echo get_admin_url('', 'plugins.php'); ?>">&#9660;<?php _e( 'Plugins', 'cawaii-admin' ); ?> </a>
		        <ul>
		            <li><a href="<?php echo get_admin_url('', 'plugins.php'); ?>"><?php _e( 'Plugins', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'plugin-install.php'); ?>"><?php _e( 'Add new', 'cawaii-admin' ); ?></a></li>
		        </ul>
		    </li>
		    <li class="media"><a href="<?php echo get_admin_url('', 'upload.php'); ?>">&#9660; <?php _e( 'Media', 'cawaii-admin' ); ?></a>
		        <ul>
		            <li><a href="<?php echo get_admin_url('', 'media-new.php'); ?>"><?php _e( 'Add new', 'cawaii-admin' ); ?></a></li>	        		
		            <li><a href="<?php echo get_admin_url('', 'upload.php'); ?>"><?php _e( 'View all', 'cawaii-admin' ); ?></a></li>
		            <li><a href="<?php echo get_admin_url('', 'options-media.php'); ?>"><?php _e( 'Media settings', 'cawaii-admin' ); ?></a></li>
		        </ul>
		    </li>
		    <li class="options"><a href="<?php echo get_admin_url('', 'options-general.php?page=cawaii-admin/cawaii-admin.php'); ?>">&#9660; <?php _e( 'Other settings', 'cawaii-admin' ); ?></a>
		        <ul>
		        	<li><a href="<?php echo get_admin_url('', 'options-general.php?page=cawaii-admin/cawaii-admin.php'); ?>"><?php _e( 'Cawaii admin', 'cawaii-admin' ); ?></a></li>
		        </ul>
		    </li>
		</ul>
	</div>