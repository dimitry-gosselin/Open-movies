<?php
get_header();
?>


<div id="genre-page" class="content-area">
    <h1><?php echo get_field('titre'); ?></h1>

    <div class="movie-list grid-4">
		<?php
    		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
			$args = array(
				'post_type' => 'film',
				'hierarchical' => 0,
				'orderby' => 'publish_date',
				'order' => 'ASC',
				'posts_per_page' => 20,
				'paged' => $paged,
                'meta_query' => array(
                    array(
                        'key' => 'genre', // name of custom field
                        'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
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
</div>

<?php
get_footer();
