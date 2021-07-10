<?php
get_header();
?>


<div id="movie-page" class="content-area">
    <div id="player">
        <iframe src="https://www.youtube.com/embed/<?php echo get_field('youtube'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <div class="fiche-movie">
        <h2 class="titre">
            <?php echo get_field('titre'); ?>
            <?php if(get_field('titre') != get_field('titre_original')): ?>
                <span class="original-title">(<?php echo get_field('titre_original'); ?>)</span>
            <?php endif; ?>
            - <?php echo get_field('annee_de_sortie'); ?>
        </h2>
        <p class="genre">
            Genre: 
            <?php
                $genres = get_field('genre');
                $tmp = [];
                if( $genres ){
                    foreach( $genres as $genre ){
                        $tmp[] = "<a href='".get_permalink($genre->ID)."'>".get_field('titre', $genre->ID)."</a>";
                    }
                }
            ?>
            <?php echo implode(' / ', $tmp); ?>
        </p>
        <p class="synopsis"><?php echo get_field('synopsis'); ?></p>
    </div>
</div>

<?php
get_footer();
