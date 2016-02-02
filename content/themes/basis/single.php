<?php get_header(); ?>

<h1><?php the_title(); ?></h1>
<div class="cms">
<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            //
            // Post Content here
            //
            the_content();
        } // end while
    } // end if
?>
</div>

<?php
$category = get_the_category();
    if( isset( $category[0] ) ) {
        echo '<p><a href="'.get_category_link($category[0]->term_id ).'">&lsaquo; Terug naar \'' . $category[0]->cat_name . '\'</a></p>';
    }
?>

<?php get_footer(); ?>