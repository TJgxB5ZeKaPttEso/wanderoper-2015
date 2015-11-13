<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wanderoper Brandenburg 2015
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="page-wrap">


		<a class="skip-link screen-reader-text"
		   href="#content"><?php esc_html_e( 'Skip to content', 'wanderoper-2015' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<?php
			/**
			 * Slider Revolution setup
			 */
			if ( is_plugin_active( 'revslider/revslider.php' ) ) {
				//------------ Get Post Slug

				$post_id = ( get_the_ID() );
				$post    = get_post( $post_id );
				$slug    = $post->post_name;
				echo $slug;

				//------------ Check for corresponding slider Alias

				$aliases = all_rev_sliders_in_array();
				//print_r(array_values($aliases));
				if ( ! is_home() ) {
					if ( in_array( $slug, $aliases ) ) {
						putRevSlider( $slug );
					} else {
						if ( is_page() || is_single() ) {
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								wanderoper_header_thumbnail_before();
								the_title();
								wanderoper_header_thumbnail_after();

							} else {
								wanderoper_no_header_thumbnail_before();
								the_title();
								wanderoper_header_thumbnail_after();
							}

						}
						if ( is_category() ) {
							$title        = get_the_archive_title();
							$croppedTitle = str_replace( 'Kategorie: ', '', $title );
							wanderoper_no_header_thumbnail_before();
							echo $croppedTitle;
							wanderoper_header_thumbnail_after();


						}
						if ( is_post_type_archive() ) {

							// Get Archive name and delete Archive from string
							$title        = get_the_archive_title();
							$croppedTitle = str_replace( 'Archive: ', '', $title );

							wanderoper_no_header_thumbnail_before();
							echo $croppedTitle;
							wanderoper_header_thumbnail_after();
						}

					}
				} else {
					putRevSlider( 'home-slider-main' );
				}
			}

			?>


			<?php if ( wp_get_post_parent_id( $post_ID ) == '774' ) : ?>
				<nav id="repertoire-navigation" class="repertoire-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'repertoire', 'menu_id' => 'repertoire' ) ); ?>
				</nav>  <?php endif; ?>


			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu"
				        aria-expanded="false"><?php esc_html_e( 'Menu', 'wanderoper-2015' ); ?></button>
				<a class="skip-link screen-reader-text"
				   href="#content"><?php _e( 'Skip to content', 'wanderoper-2015' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<!-- #site-navigation -->
			<?php //wanderoper_permalink (); ?>

		</header>
		<!-- #masthead -->
		<div id="content" class="site-content">
