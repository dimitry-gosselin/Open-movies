<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="search" class="content-area">
		<!-- <main id="main" class="site-main"> -->

		<?php if ( have_posts() ) : ?>

			<h1 class="page-title">
				Recherche:
				<span class="page-description"><?php echo get_search_query(); ?></span>
			</h1>
			
			<div class="search-block">
				<form action="/" method="get" id="search" method="post">
					<div class="search-box input-with-icon">
						<input class="black" id="searxh-inout" name="s" placeholder="Recherche ..." type="text" autocomplete="off" value="<?php echo get_search_query(); ?>">
						<button><i class="material-icons">search</i></button>
					</div>
				</form>
			</div>
			
			<div class="movie-list grid-4">
				<?php
				// Start the Loop.
				while ( have_posts() ) :
					the_post();
				?>
				<div class="movie-block">
					<a class="movie-panel" href="<?php echo get_permalink(); ?>" title="<?php echo get_field('titre'); ?>">
						<div class="poster">
							<?php 
								$poster = get_field('poster'); 
								$poster =  esc_url($poster["url"]);
							?>
							<img src="<?php echo $poster; ?>" alt="<?php echo get_field('titre'); ?>">
						</div>
						<div class="th-desc">
							<h4 class="th-title nowrap"><?php echo get_field('titre'); ?></h4>
							<div class="th-cat nowrap">
								<!-- Comédie / Nouveaux Films  -->
								<?php
									$genres = get_field('genre');
									$tmp = [];
									if( $genres ){
										foreach( $genres as $genre ){
											$tmp[] = get_field('titre', $genre->ID);
										}
									}
								?>
								<?php echo implode(' / ', $tmp); ?>
							</div>
						</div>
					</a>
				</div>
				<?php

					// End the loop.
				endwhile;
			?>
			</div>
			<?php


			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		<!-- </main> -->
	</div><!-- #primary -->

<?php
get_footer();
