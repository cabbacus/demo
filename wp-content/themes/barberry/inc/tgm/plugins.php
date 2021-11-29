<?php


function barberry_theme_register_required_plugins() {

  $plugins = array(
        'woocommerce' => array(
        'name'               => 'WooCommerce',
        'slug'               => 'woocommerce',
        'required'           => true,
        'description'        => 'The eCommerce engine of your WordPress site.',
        'demo_required'      => true
        ),
        'js_composer' => array(
          'name'               => 'WPBakery Page Builder',
          'slug'               => 'js_composer',
          'source'             => 'https://temash.design/tdplugins/barberry/2.9.8.1/js_composer.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'The page builder plugin coming with the theme.',
          'demo_required'      => true,
          'version'            => '6.7.0'
        ),
        'revslider' => array(
          'name'               => 'Slider Revolution',
          'slug'               => 'revslider',
          'source'             => 'https://temash.design/tdplugins/barberry/2.9.8.2/revslider.zip',
          'required'           => false,
          'external_url'       => '',
          'description'        => 'Slider Revolution - Premium responsive slider',
          'demo_required'      => true,
          'version'            => '6.5.9'
        ),  

        'advanced-custom-fields-pro'=> array(
          'name'               => 'Advanced Custom Fields PRO',
          'slug'               => 'advanced-custom-fields-pro',
          'source'             => 'https://temash.design/tdplugins/barberry/2.9.8.1/advanced-custom-fields-pro.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'Customize WordPress with powerful, professional and intuitive fields.',
          'demo_required'      => true,
          'version'            => '5.10.2'          
        ), 

        'yith-woocommerce-wishlist'=> array(
          'name'               => 'YITH WooCommerce Wishlist',
          'slug'               => 'yith-woocommerce-wishlist',
          'required'           => false,
          'description'        => 'YITH WooCommerce Wishlist gives your users the possibility to create, fill, manage and share their wishlists allowing you to analyze their interests and needs to improve your marketing strategies.',
          'demo_required'      => false
        ), 
        'contact-form-7'=> array(
          'name'               => 'Contact Form 7',
          'slug'               => 'contact-form-7',
          'required'           => false,
          'description'        => 'Just another contact form plugin. Simple but flexible.',
          'demo_required'      => false
        ), 
        'variation-swatches-for-woocommerce'=> array(
          'name'               => 'WooCommerce Variation Swatches',
          'slug'               => 'variation-swatches-for-woocommerce',
          'required'           => false,
          'description'        => 'An extension of WooCommerce to make variable products be more beauty and friendly with users.',
          'demo_required'      => false
        ),         

        'envato-market'        => array(
          'name'               => 'Envato Market',
          'slug'               => 'envato-market',
          'required'           => false,
          'demo_required'      => false,
          'source'             => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
          'description'        => 'Enables updates for all your Envato purchases.',
        ),
        'tdl-barberry-extensions' => array(
          'name'               => 'Barberry Theme Extensions',
          'slug'               => 'tdl-barberry-extensions',
          'source'             => 'https://temash.design/tdplugins/barberry/2.9.8.3/tdl-barberry-extensions.zip',
          'required'           => true,
          'external_url'       => '',
          'description'        => 'Extends the functionality of with theme-specific features.',
          'demo_required'      => true,
          'version'            => '1.9.7'
        ),
        'safe-svg'=> array(
          'name'               => 'Safe SVG',
          'slug'               => 'safe-svg',
          'required'           => false,
          'description'        => 'Allows SVG uploads into WordPress and sanitizes the SVG before saving it',
          'demo_required'      => true
        ),
      );

  $config = array(
    'id'               => 'barberry',
    'default_path'      => '',
    'parent_slug'       => 'themes.php',
    'menu'              => 'tgmpa-install-plugins',
    'has_notices'       => false,
    'is_automatic'      => true,
  );

  tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'barberry_theme_register_required_plugins' );


