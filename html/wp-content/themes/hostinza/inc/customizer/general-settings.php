<?php
$fields[] = array(
	'type'        => 'image',
	'settings'    => 'site_logo',
	'label'       => esc_html__( 'Logo', 'hostinza' ),
	'section'     => 'general_section',
);

$fields[]= array(
    'type'        => 'switch',
    'settings'    => 'show_preloader',
    'label'       => esc_html__( 'Show Preloader', 'hostinza' ),
    'section'     => 'general_section',
    'default'     => '',
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'hostinza' ),
        'off' => esc_attr__( 'Disable', 'hostinza' ),
    ),
);
