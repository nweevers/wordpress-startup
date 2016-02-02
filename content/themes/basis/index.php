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

<?php get_footer(); ?>