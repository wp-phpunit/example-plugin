<?php

class Example_Test extends WP_UnitTestCase {

	function test_wordpress_and_plugin_are_loaded() {
		$this->assertTrue( function_exists( 'do_action' ) );
		$this->assertTrue( function_exists( 'example_plugin_file' ) );
		$this->assertTrue( class_exists( 'Example\\Plugin' ) );
	}

	function test_wp_phpunit_is_loaded_via_composer() {
		if ( ! $this->is_wp_phpunit() ) {
			$this->markTestSkipped( 'WP PHPUnit is not currently used' );
		}

		$this->assertStringStartsWith(
			dirname( __DIR__ ) . '/vendor/',
			getenv( 'WP_PHPUNIT__DIR' )
		);

		$this->assertUsingWpPhpunit();
	}

	function test_wp_phpunit_is_not_used_when_intended() {
		if ( $this->is_wp_phpunit() ) {
			$this->markTestSkipped( 'WP PHPUnit is the intended test suite' );
		}

		$this->assertNotUsingWpPhpunit();
	}

	protected function is_wp_phpunit() {
		$wp_version = getenv( 'WP_VERSION' ) ?: 'composer';
		
		return 'composer' === $wp_version;
	}

	protected function assertUsingWpPhpunit( $alt = '' ) {
		$this->{"assertStringStarts{$alt}With"}(
			dirname( __DIR__ ) . '/vendor/',
			( new ReflectionClass( 'WP_UnitTestCase' ) )->getFileName()
		);
	}

	protected function assertNotUsingWpPhpunit() {
		$this->assertUsingWpPhpunit( 'Not' );
	}
}