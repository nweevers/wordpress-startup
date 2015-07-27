<?php get_header(); ?>

<h1><?php printf( 'Zoekresultaten: ' . get_search_query() . '' ); ?></h1>

<?php

if ( ! have_posts() ) { ?>

    <p>Er zijn geen resultaten met de zoekterm '<?php printf(get_search_query()) ?>' gevonden.</p>

<?php } else
{
    $pp = get_option('posts_per_page');
    if ($pp == '') { $pp = 10;};
    if ( !is_archive() && !is_search() ) :
        $query = array(
            'posts_per_page' => $pp,
            'order'    => 'DESC',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : true ),
            'post_status'     => 'publish'
          );
         query_posts($query);
    endif; ?>

        <ul>
        <?php
        while ( have_posts() ) : the_post();

        $category = get_the_category();
        $num_comments = get_comments_number();
        $format = get_post_meta($post->ID,'meta_blogposttype',true);
        ?>

            <li>
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?><br>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Lees meer &raquo;</a>
            </li>


        <?php
        endwhile; // End the loop.
        ?>
        </ul>
<?php } ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div class="pagination"><?php posts_nav_link(' ', '<span class="prev">Vorige</span>', '<span class="next">Volgende</span>'); ?></div>
<?php endif; wp_reset_query();?>

<?php get_footer(); ?>
