<?php

$sep_id  = 7320;
$section = 'shop_myaccount';

Kirki::add_field( 'barberry', array(
    'type'        => 'toggle',
    'settings'    => 'myaccount_icons',
    'label'       => esc_attr__( 'Show My Account Menu Icons', 'barberry' ),
    'section'     => $section,
    'default'     => true,
    'priority'    => 10,
) );