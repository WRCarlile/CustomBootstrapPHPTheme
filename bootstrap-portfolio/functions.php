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

?>
