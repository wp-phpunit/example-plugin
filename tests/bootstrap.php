<?php
/**
 * PHPUnit bootstrap file
 */

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Determine the test suite to use.
$wp_version = getenv( 'WP_VERSION' );
$tests_dir = getenv( 'WP_TESTS_DIR' );

// Use WP-PHPUnit if no WP_VERSION is set or explicitly calls for Composer-installed version
if ( ! $wp_version || 'composer' === $wp_version ) {
    $tests_dir = getenv( 'WP_PHPUNIT__DIR' );
}

// Give access to tests_add_filter() function.
require_once $tests_dir . '/includes/functions.php';

tests_add_filter( 'muplugins_loaded', function() {
    // test set up, plugin activation, etc.
    require dirname( __DIR__ ) . '/example-plugin.php';
} );

// Start up the WP testing environment.
require $tests_dir . '/includes/bootstrap.php';

