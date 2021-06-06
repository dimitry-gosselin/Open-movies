<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="flx <?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">
		<?php $blog_info = get_bloginfo( 'name' ); ?>
		<?php if ( ! empty( $blog_info ) ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php endif; ?>

		<div class="search-block">
			<form action="/" method="get" id="search" method="post">
				<div class="search-box input-with-icon">
					<input class="black" id="search_input" name="s" placeholder="Recherche ..." type="text" autocomplete="off" value="<?php echo get_search_query(); ?>">
					<button><i class="material-icons">search</i></button>
				</div>
			</form>
		</div>

		<div id="menuToggle" class="btn-menu">
			<!--	
			A fake / hidden checkbox is used as click reciever,
			so you can use the :checked selector on it.
			-->
			<input type="checkbox" />
			
			<!--
			Some spans to act as a hamburger.
			
			They are acting like a real hamburger,
			not that McDonalds stuff.
			-->
			<span></span>
			<span></span>
			<span></span>
			
			<!--
			Too bad the menu has to be inside of the button
			but hey, it's pure CSS magic.
			-->
			<?php 
			$args = array(
				'post_type' => 'genre',
				'hierarchical' => 0,
				// 'orderby' => 'publish_date',
				// 'order' => 'ASC',
				// 'posts_per_page' => 20,
				// 'paged' => $paged
			);
			$genres = new WP_Query( $args );
			?>
			<ul id="menu">
				<div class="search-block">
					<form action="/" method="get" id="search" method="post">
						<div class="search-box input-with-icon">
							<input id="search_input" name="s" placeholder="Recherche ..." type="text" autocomplete="off" value="<?php echo get_search_query(); ?>">
							<button><i class="material-icons">search</i></button>
						</div>
					</form>
				</div>
				<?php while ( $genres->have_posts() ) : $genres->the_post(); ?>
					<a href="<?php echo get_permalink() ?>"><li><?php echo get_field('titre'); ?></li></a>
				<?php endwhile; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div>

		<!-- <div class="btn-menu"><a href="#wrap"><i class="material-icons">dehaze</i></a></div> -->
	</header>
	<div id="content" class="site-content">
	