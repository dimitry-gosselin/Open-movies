<?php
get_header();
?>


<div id="homepage" class="content-area">

    <div class="movie-list grid-4">
		<?php
    		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
			$args = array(
				'post_type' => 'film',
				'hierarchical' => 0,
				'orderby' => 'publish_date',
				'order' => 'ASC',
				'posts_per_page' => 20,
				'paged' => $paged
			);
			$films = new WP_Query( $args );
		?>

		<?php while ( $films->have_posts() ) : $films->the_post(); ?>
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

		<?php endwhile; ?>
    </div>

	<div class="pagination">
		<?php 
			echo paginate_links( array(
				'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'total'        => $films->max_num_pages,
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'format'       => '?paged=%#%',
				'show_all'     => false,
				'type'         => 'plain',
				'end_size'     => 2,
				'mid_size'     => 1,
				'prev_next'    => true,
				'prev_text'    => sprintf( '<i></i> %1$s', __( 'Précédent', 'text-domain' ) ),
				'next_text'    => sprintf( '%1$s <i></i>', __( 'Suivant', 'text-domain' ) ),
				'add_args'     => false,
				'add_fragment' => '',
			) );
		?>
	</div>

</div>



<?php
get_footer();
