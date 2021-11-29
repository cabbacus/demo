<?php

// ============================================
// Panel
// ============================================

Kirki::add_panel( 'panel_blog', array(
    'title'         => esc_attr__( 'Blog', 'barberry' ),
    'priority'      => 50,
) );


// ============================================
// Sections
// ============================================

Kirki::add_section( 'blog', array(
    'title'          => esc_attr__( 'Blog Archives', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_blog'
) );

Kirki::add_section( 'blog_single', array(
    'title'          => esc_attr__( 'Single Post', 'barberry' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_blog'
) );


// ============================================
// Controls
// ============================================

require_once( get_template_directory() . '/inc/customizer/backend/blog/archives.php');
require_once( get_template_directory() . '/inc/customizer/backend/blog/single.php');