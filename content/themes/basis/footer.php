        &copy; <?php echo date('Y') . ' ' . get_bloginfo( 'name' ); ?>

        <?php wp_footer(); ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script>
            head.js(
                { all: '<?php echo get_template_directory_uri(); ?>/resources/scripts/all.min.js' }
            );
        </script>
    </body>
</html>
