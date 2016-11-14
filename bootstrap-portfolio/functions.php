<?php
	/*
	# =================================================
	# functions.php
	#
	# The theme's functions.
	# =================================================
	*/

	/* ------------------------------------------------ */
	/* 1. CONSTANTS */
	/* ------------------------------------------------ */
	define( 'THEMEROOT', get_stylesheet_directory_uri() );
	define( 'IMAGES', THEMEROOT . '/img' );
	define( 'JS', THEMEROOT . '/js' );

/* ------------------------------------------------ */
/* 2. THEME SETUP */
/* ------------------------------------------------ */
if ( ! function_exists('tuts_theme_setup')) {
	function tuts_theme_setup() {
		/* Make the theme available for translation. */
        $lang_dir = THEMEROOT . '/languages';
        load_theme_textdomain( 'tuts', $lang_dir );

        /* Add support for automatic feed links. */
        add_theme_support( 'automatic-feed-links' );

        /* Add support for post thumbnails. */
        add_theme_support( 'post-thumbnails' );

        /* Register nav menus. */
        register_nav_menus( array(
            'main-menu' => __( 'Main Menu', 'tuts' )
        ) );
    }

    add_action( 'after_setup_theme', 'tuts_theme_setup' );
}
/* ------------------------------------------------ */
/* 3. GET POST META */
/* ------------------------------------------------ */
if ( ! function_exists( 'tuts_post_meta' ) ) {
    function tuts_post_meta() {
        if ( get_post_type() === 'post' ) {
            /* Post author. */
            echo '<p class="post-meta">';
            _e( 'by', 'tuts' );
            printf( '<a href="%1$s" rel="author"> %2$s </a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
            _e( 'on', 'tuts' );
            echo ' <span>' . get_the_date() . '</span></p>';
        }
    }
}
/* ------------------------------------------------ */
/* 4. NUMBERED PAGINATION */
/* ------------------------------------------------ */
if ( ! function_exists( 'tuts_numbered_pagination' ) ) {
    function tuts_numbered_pagination() {
        $args = array(
            'prev_next' => false,
            'type' => 'array'
        );

        echo '<div class="col-md-12">';
        $pagination = paginate_links( $args );

        if ( is_array( $pagination ) ) {
            echo '<ul class="nav nav-pills">';
            foreach ( $pagination as $page ) {
                if ( strpos( $page, 'current' ) ) {
                    echo '<li class="active"><a href="#">' . $page . '</a></li>';
                } else {
                    echo '<li>' . $page . '</li>';
                }
            }

            echo '</ul>';
        }

        echo '</div>';
    }
}

?>
