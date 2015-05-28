<div class="searchform">
    <span class="searchform__toggle">Zoeken</span>

    <form action="<?php echo home_url( '/' ); ?>" method="get">
        <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Zoekopdracht">
        <button type="submit"><span>Zoeken</span></button>
    </form>
</div>