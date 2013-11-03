<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package techcontinuum1_s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
	<!--
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>
	
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/tc-logo.png" class="tc-logo-left header-image" width="" height="" alt="" /></a>
	-->
		<div class="main-logo">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/tc-logo-square.png" class="tc-logo-left header-image" width="" height="" alt="" /> -->
				<div class="logo-text">Tech Continuum</div>
			</a>
				
		</div>
		<div class="head-img-group2">
			<img src="<?php echo get_template_directory_uri(); ?>/images/tc-settings.png" />
			<img class="img-left-space-40" src="<?php echo get_template_directory_uri(); ?>/images/tc-tablet.png" />
			<img class="img-left-space-40" src="<?php echo get_template_directory_uri(); ?>/images/tc-cloud.png" />
			<img class="img-left-space-40" src="<?php echo get_template_directory_uri(); ?>/images/tc-dots.png" />	
		</div>
		<div class="clear-both"></div>
		<div class="nav-block">
				<nav id="site-navigation" class="navigation-main" role="navigation">
					<h1 class="menu-toggle"><?php _e( 'Menu', 'techcontinuum1_s' ); ?></h1>
					<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'techcontinuum1_s' ); ?>"><?php _e( 'Skip to content', 'techcontinuum1_s' ); ?></a></div>

					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
				<nav id="site-navigation2" class="navigation-main" role="navigation">
					<!--<h1 class="menu-toggle"><?php _e( 'Menu', 'techcontinuum1_s' ); ?></h1>
					<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'techcontinuum1_s' ); ?>"><?php _e( 'Skip to content', 'techcontinuum1_s' ); ?></a></div>
		            -->
					<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
				</nav><!-- #site-navigation2-->	
		</div>	
		
	</header><!-- #masthead -->

	<div id="main" class="site-main">
