<?php

/**
 * ACF Helper Functions
 */

if ( ! function_exists( 'barberry_have_rows' ) ) {
	function barberry_have_rows( $args, $options = '' ) {

		if ( function_exists( 'have_rows' ) ) {
			return have_rows( $args, $options );
		} else {
			return false;
		}

	}
}

if ( ! function_exists( 'barberry_get_field' ) ) {
	function barberry_get_field( $args, $options = '' ) {

		if ( function_exists( 'get_field' ) ) {
			return get_field( $args, $options );
		} else {
			return false;
		}

	}
}

if ( ! function_exists( 'barberry_get_allowed_html' ) ) {
	/**
	 * Return allowed html tags
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	function barberry_get_allowed_html() {
		return apply_filters(
			'barberry_allowed_html',
			array(
				'br'     => array(),
				'i'      => array(),
				'b'      => array(),
				'u'      => array(),
				'em'     => array(),
				'del'    => array(),
				'a'      => array(
					'href'  => true,
					'class' => true,
					'title' => true,
					'rel'   => true,
				),
				'strong' => array(),
				'span'   => array(
					'style' => true,
					'class' => true,
				),
			) 
		);
	}
}

if ( ! function_exists( 'barberry_clean' ) ) {
	/**
	 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
	 * Non-scalar values are ignored.
	 *
	 * @param string|array $var Data to sanitize.
	 * @return string|array
	 */
	function barberry_clean( $var ) {
		if ( is_array( $var ) ) {
			return array_map( 'barberry_clean', $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}
}