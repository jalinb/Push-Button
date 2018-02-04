<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="navigation-top site-navigation-fixed">
	<div class="wrap">
		<div class="header-left-wrap">
			<nav id="site-navigation" class="main-navigation toggled-on" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
				<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( '', 'twentyseventeen' ); ?></button>
				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
				) ); ?>

				<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
					<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
				<?php endif; ?>
			</nav><!-- #site-navigation -->

			<div class="social-wrap">
				<ul>
					<li class="social-item">
	    				<a href="https://www.facebook.com/pushbuttonproductions" target="blank">
	        			<i class="fa fa-facebook" aria-hidden="true"></i></a>
	        		</li>
	        		<li class="social-item">
	    				<a href="https://plus.google.com/u/0/b/102115838725517091425/102115838725517091425/about" target="blank">
	        			<i class="fa fa-google-plus" aria-hidden="true"></i></a>
	        		</li>
	        		<li class="social-item">
	    				<a href="https://twitter.com/@pbproductions" target="blank">
	        			<i class="fa fa-twitter" aria-hidden="true"></i></a>
	        		</li>
	        		<li class="social-item">
	    				<a href="https://vimeo.com/user14300355" target="blank">
	        			<i class="fa fa-vimeo" aria-hidden="true"></i></a>
	        		</li>
				</ul>
			</div>
		</div>
		<a href="<?php echo site_url(); ?>">
			<img src="<?php echo site_url(); ?>/wp-content/themes/pushbutton/assets/images/push-button-logo-01.png" class="header-logo" alt="Push Button Creative Audio" />
		</a>

		<div class="header-phone">888-494-PUSH<span>(7874)</span></div>
	</div><!-- .wrap -->
</div><!-- .navigation-top -->

<div class="mobile-nav">
	<div class="col-xs-12">
		<div class="header-left-wrap">
			<nav id="mobile-navigation" class="main-navigation toggled-on" role="navigation" aria-label="<?php _e( 'Top Menu', 'twentyseventeen' ); ?>">
				<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( '', 'twentyseventeen' ); ?></button>
				<?php wp_nav_menu( array(
					'theme_location' => 'top',
					'menu_id'        => 'top-menu',
				) ); ?>

				<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
					<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'twentyseventeen' ); ?></span></a>
				<?php endif; ?>
			</nav><!-- #site-navigation -->
		</div>
		<a href="<?php echo site_url(); ?>">
			<img src="<?php echo site_url(); ?>/wp-content/themes/pushbutton/assets/images/push-button-logo-blue.png" class="header-logo" alt="Push Button Creative Audio" />
		</a>
	</div><!-- .col-xs-12 -->
</div><!-- .mobile-nav -->
