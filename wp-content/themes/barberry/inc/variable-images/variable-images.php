<?php if ( ! defined( 'BARBERRY_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

//-------------------------------------------------------------------------------
// Print admin variation gallery html
//-------------------------------------------------------------------------------

if ( ! function_exists( 'barberry_vg_admin_html' ) ) {
	function barberry_vg_admin_html( $loop, $variation_data, $variation ) {
		global $post;

		if ( ! intval(TDL_Opt::getOption('variation_gallery')) ) {
			return;
		}

		$attachments            = '';
		$variation_gallery_data = get_post_meta( $post->ID, 'barberry_variation_gallery_data', true ) ? get_post_meta( $post->ID, 'barberry_variation_gallery_data', true ) : array();

		foreach ( $variation_gallery_data as $variation_id => $image_ids ) {
			if ( $variation_id == $variation->ID ) {
				$attachments = array_filter( explode( ',', $image_ids ) );
			}
		}	
		
		echo '<div class="barberry-variation-gallery-wrapper">';
			echo '<h4>' . esc_html__( 'Variation Image Gallery', 'barberry' ) . '</h4>';
			echo '<ul class="barberry-variation-gallery-images">';

				if ( $attachments && is_array( $attachments ) ) {
					foreach ( $attachments as $attachment_id ) {
						$image = wp_get_attachment_image_src( $attachment_id );

						echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">';
							echo '<img src="' . esc_url( $image[0] ) . '">';
							echo '<a href="#" class="delete barberry-remove-variation-gallery-image"><span class="dashicons dashicons-dismiss"></span></a>';
						echo '</li>';
					}
				}

			echo '</ul>';

			if ( $attachments ) {
				$attachments = implode( ',', $attachments );
			}

			echo '<input type="hidden" class="variation-gallery-ids" name="barberry_variation_gallery[' . esc_attr( $variation->ID ) . ']" value="' . esc_attr( $attachments ) . '">';

			echo '<a href="#" class="button barberry-add-variation-gallery-image">' . esc_html__( 'Add Gallery Images', 'barberry' ) . '</a>';			
		echo '</div>';	

	}

	add_action( 'woocommerce_variation_options', 'barberry_vg_admin_html', 10, 3 );
}

//-------------------------------------------------------------------------------
// Save variation gallery images
//-------------------------------------------------------------------------------

if ( ! function_exists( 'barberry_save_vg_images' ) ) {
	function barberry_save_vg_images( $variation_id, $i ) {
		$product_id             = wp_get_post_parent_id( $variation_id );
		$variation_gallery_data = get_post_meta( $product_id, 'barberry_variation_gallery_data', true );
		$output                 = $variation_gallery_data ? $variation_gallery_data : array();
		$ids                    = sanitize_text_field( $_POST['barberry_variation_gallery'][ $variation_id ] );

		$output[ $variation_id ] = $ids;
		$output                  = array_filter( $output );

		update_post_meta( $product_id, 'barberry_variation_gallery_data', $output );
	}

	add_action( 'woocommerce_save_product_variation', 'barberry_save_vg_images', 10, 2 );
}

//-------------------------------------------------------------------------------
// Remove unnecessary variation gallery data
//-------------------------------------------------------------------------------

if ( ! function_exists( 'barberry_remove_unnecessary_vg_data' ) ) {
	function barberry_remove_unnecessary_vg_data( $post_id ) {
		if ( ! barberry_woocommerce_installed() ) {
			return;
		}

		$product = wc_get_product( $post_id );

		if ( ! $product || $product->get_type() != 'variable' ) {
			return;
		}

		$available_variations = array();

		foreach ( $product->get_children() as $child_id ) {
			$available_variations[] = $product->get_available_variation( wc_get_product( $child_id ) );
		}

		$available_variations = array_values( array_filter( $available_variations ) );
		
		$variations             = $product->get_type() == 'variable' ? $available_variations : '';
		$variations_ids         = array();
		$variation_gallery_data = get_post_meta( $post_id, 'barberry_variation_gallery_data', true );

		if ( ! $variations || ! $variation_gallery_data ) {
			return;
		}

		foreach ( $variations as $variation ) {
			$variations_ids[] = $variation['variation_id'];
		}

		foreach ( $variation_gallery_data as $key => $data ) {
			if ( ! in_array( $key, $variations_ids ) && isset( $variation_gallery_data[ $key ] ) ) {
				unset( $variation_gallery_data[ $key ] );
			}
		}

		update_post_meta( $post_id, 'barberry_variation_gallery_data', $variation_gallery_data );
	}

	add_action( 'save_post', 'barberry_remove_unnecessary_vg_data' );
}

//-------------------------------------------------------------------------------
// Get variation gallery images data
//-------------------------------------------------------------------------------
if ( ! function_exists( 'barberry_get_vg_data' ) ) {
	function barberry_get_vg_data() {
		if ( ! barberry_woocommerce_installed() ) {
			return;
		}

		$product_id             = get_the_ID();
		$product                = wc_get_product( $product_id );
		$variation_gallery_data = get_post_meta( $product_id, 'barberry_variation_gallery_data', true );
		$default_images_data    = barberry_get_default_vg_data( $product_id );

		if ( ( $product && $product->get_type() !== 'variable' ) || ! $variation_gallery_data ) {
			return;
		}

		foreach ( $variation_gallery_data as $variation_id => $image_ids ) {
			$ids = array_filter( explode( ',', $image_ids ) );

			if ( has_post_thumbnail( $variation_id ) ) {
				array_unshift( $ids, get_post_thumbnail_id( $variation_id ) );
			}

			foreach ( $ids as $id ) {
				$data[ $variation_id ][] = barberry_get_vg_image_data( $id );;
			}
		}

		if ( $default_images_data ) {
			$data['default'] = $default_images_data;
		}

		return $data;
	}
}

//-------------------------------------------------------------------------------
// Get default gallery images data
//-------------------------------------------------------------------------------
if ( ! function_exists( 'barberry_get_default_vg_data' ) ) {
	function barberry_get_default_vg_data( $product_id ) {
		if ( ! barberry_woocommerce_installed() ) {
			return;
		}
		
		$product = wc_get_product( $product_id );

		if ( ! $product ) {
			return;
		}
		
		$default_image_ids = $product->get_gallery_image_ids();
		
		$images = array();
		
		if ( has_post_thumbnail( $product_id ) ) {
			array_unshift( $default_image_ids, get_post_thumbnail_id( $product_id ) );
		}
		
		if ( $default_image_ids && is_array( $default_image_ids ) ) {
			foreach ( $default_image_ids as $id ) {
				$images[] = barberry_get_vg_image_data( $id );
			}
		}

		return $images;
	}
}


//-------------------------------------------------------------------------------
// Get gallery images data
//-------------------------------------------------------------------------------
if ( ! function_exists( 'barberry_get_vg_image_data' ) ) {
	function barberry_get_vg_image_data( $attachment_id ) {
		// barberry_lazy_loading_deinit( true );

		$full_size_image   = wp_get_attachment_image_src( $attachment_id, 'full' );
		$thumbnail         = wp_get_attachment_image_src( $attachment_id, 'woocommerce_thumbnail' );
		$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
		$full_size_image   = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );

		$attributes = array(
			'title'                   => get_post_field( 'post_title', $attachment_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_size_image[0],
			'data-large_image'        => $full_size_image[0],
			'data-flickity-lazyload'  => $full_size_image[0],
			'data-large_image_width'  => $full_size_image[1],
			'data-large_image_height' => $full_size_image[2],
			'class'                   => 'single-product-img wp-post-image',
		);

		$output = array(
			'image'      => wp_get_attachment_image( $attachment_id, 'woocommerce_single', false, $attributes ),
			'data_thumb' => $thumbnail[0],
			'href'       => $full_size_image[0],
		);


		return $output;
	}
}

//-------------------------------------------------------------------------------
// Single product object with gallery data
//-------------------------------------------------------------------------------
if ( ! function_exists( 'barberry_single_product_vg_data' ) ) {
	function barberry_single_product_vg_data() {
		if ( ! intval(TDL_Opt::getOption('variation_gallery')) ) {
			return;
		}

		$images_data = barberry_get_vg_data();

		wp_localize_script( 'barberry-scripts', 'barberry_variation_gallery_data', $images_data );
	}

	add_action( 'wp_enqueue_scripts', 'barberry_single_product_vg_data', 1000001 );
}