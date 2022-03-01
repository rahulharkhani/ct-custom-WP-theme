<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
	<div class="top-bar-container">
		<div id="top-bar">
			<div>
				<p class="top-bar-left">CALL US Now!</p>
				<p class="top-bar-right">385.154.11.28.35</p>
			</div>
			<div>
				<p class="top-bar-left">LOGIN</p>
				<p class="top-bar-right">SIGNUP</p>
			</div>
		</div>
	</div>
<div class="header-container">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			//the_custom_logo();
			global $themeoption;
			
			if(!empty($themeoption['logo'])) {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( $themeoption['logo'] ); ?>" rel="home" />
				</a>	
				<?php
			} else {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo site_url().'/wp-content/uploads/2022/02/logo-1.png'; ?>" rel="home" />
				</a>
				<?php
			}

			/* if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;*/
			?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ct-custom' ); ?></button>
			<a class="toggle-nav" href="#">&#9776;</a>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
</div>
<div id="breadcrumb">
	<div>
		<p>Home / Who we are / <span class="active-bc">Contact</span></p>
	</div>
</div>
	<div id="content" class="site-content">
