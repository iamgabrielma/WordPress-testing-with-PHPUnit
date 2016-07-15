<?php
/*
only methods prefixed with “test” will be considered a unit test. All other methods will be skipped.
*/

/* A TEST IS A COLLECTION OF ASSERTIONS */
class ClassTest extends WP_UnitTestCase {
	/*
	http://wordpress.stackexchange.com/questions/139128/where-can-i-find-documentation-for-the-wp-unittestcase-factory-classes
	https://core.trac.wordpress.org/browser/trunk/tests/phpunit/includes/factory.php
	*/
 	// function test_push_and_pop(){


 	// 	$stack = [];
 	// 	$this->assertEquals(0, count($stack));

 	// 	array_push($stack, 'foo');
 	// 	$this->assertEquals(1, count($stack));

 	// 	// same output, two ways of checking it
 	// 	$this->assertEquals('foo', $stack[0]);
 	// 	$this->assertEquals('foo', $stack[count($stack)-1]);
 		
 	// 	array_pop($stack);
		// $this->assertEquals(0, count($stack)); 		
 	// }

 	function testing_register_meta(){

 		/* Test the register_meta() behaviour, we call register_meta() with given parameters, those parameters will be saved into a global $wp_meta_keys, later on we manufacture an $expected array and compare both, the manufactured array and the actual one that should be present as $wp_meta_keys global variable */

 		global $wp_meta_keys;
 		//https://developer.wordpress.org/reference/functions/register_meta/
 		//register_meta( $meta_type, $meta_key, $sanitize_callback, $auth_callback );
 		//register_meta( string $meta_type, string $meta_key, string|array $sanitize_callback, string|array $auth_callback = null )
 		$meta_type = 'post';
 		$meta_key = 'flight_number';
 		$sanitize_callback = array('object_subtype' => 'post');
 		$auth_callback = null;
 		/*
 		https://make.wordpress.org/core/2016/07/08/enhancing-register_meta-in-4-6/

		object_subtype, a string containing an object subtype slug. If there is no object subtype, meta will not be registered and a WP_Error will be returned instead.
 		*/
 		
 		register_meta( $meta_type, $meta_key, $sanitize_callback, $auth_callback );
 		
 		$actual = $wp_meta_keys;
 		//unregister_meta_key();

 		$expected = array(
 			'post' => array(
 				'post' => array(
 					$meta_key => array(
 						'object_subtype' => 'post',
						'type' => 'string',
						'description' => '',
						'single' => false,
						'sanitize_callback' => null,
						'auth_callback' => '__return_true',
						'show_in_rest' => false,
 					)
 				)
 			)
 		);

 		// testing if two arrays are equal
 		$this->assertEquals($actual, $expected);
 	}



	// function test_sample_string() {
 
	// 	$string = 'Unit tests are sweet';
 
	// 	$this->assertEquals( 'Unit tests are sweet', $string );
	// }
	// function test_fail_sample_string() {
 
	// 	$string = 'Unit tests are sweet';
 
	// 	$this->assertEquals( 'Failing Unit tests are sad', $string );
	// }

	/**
	 * 	Test register_meta()
	 *	/Applications/MAMP/htdocs/wordpress-core/build/wp-includes/class-wp-post-type.php:
	 * 	@group 
	 *	https://core.trac.wordpress.org/ticket/35658
	 /Applications/MAMP/htdocs/wordpress-core/tests/phpunit/tests/test-sample.php:
	 /Applications/MAMP/htdocs/wordpress-core/tests/phpunit/tests/post/wpPostType.php:
	 */

	/* accept metadata into the function similar to register_content_type()*/
	// public function test_instances() {
	// 	global $wp_post_types;

	// 	foreach ( $wp_post_types as $post_type ) {
	// 		$this->assertInstanceOf( 'WP_Post_Type', $post_type );
	// 	}
	// 	var_dump($wp_post_types);

	// }

}
