<?php

/*
 * TGM REQUIRE PLUGIN
 * require or recommend plugins for your WordPress themes
 */

/** @internal */
function _action_hostinza_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Unyson Custom', 'hostinza' ),
			'slug'		 => 'unyson',
			'required'	 => true,
			'version'	 => '2.8.2',
			'source'	 =>  esc_url(HOSTINZA_GLOBAL_PLUGIN . '/unyson.zip'),
		),
		array(
			'name'		 => esc_html__( 'Elementor', 'hostinza' ),
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'One Click Demo Import', 'hostinza' ),
			'slug'		 => 'one-click-demo-import',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Kirki', 'hostinza' ),
			'slug'		 => 'kirki',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'WHMCS Bridge', 'hostinza' ),
			'slug'		 => 'whmcs-bridge',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Hostinza Assistance', 'hostinza' ),
			'slug'		 => 'hostinza-assistance',
			'required'	 => true,
			'version'	 => '1.4',
			'source'	 =>  esc_url(HOSTINZA_REMOTE_URL . '/hostinza-assistance.zip'),
		),
        array(
			'name'		 => esc_html__( 'Hostinza domain checker', 'hostinza' ),
			'slug'		 => 'wp-domain-checker',
			'required'	 => true,
			'source'	 =>  esc_url(HOSTINZA_REMOTE_URL . '/wp-domain-checker.zip'),
            'version'	 => '5.0.5',
		),
        array(
            'name'		 => esc_html__( 'Contact Form 7', 'hostinza' ),
            'slug'		 => 'contact-form-7',
            'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Slider Revolution', 'hostinza' ),
			'slug'		 => 'revslider',
			'required'	 => true,
			'version'	 => '6.7.34',
			'source'	 =>  esc_url(HOSTINZA_GLOBAL_PLUGIN . '/revslider.zip'),
		),
		array(
			'name'		 => esc_html__( 'MailChimp for WordPress', 'hostinza' ),
			'slug'		 => 'mailchimp-for-wp',
			'required'	 => true,
		),
        array(
            'name'		 => esc_html__( 'ElementsKit', 'hostinza' ),
            'slug'		 => 'elementskit-lite',
        ),
		array(
            'name'		 => esc_html__( 'GetGenie – Conversion-Friendly & SEO-Optimized Content with AI Magic', 'hostinza' ),
            'slug'		 => 'getgenie',
        ),
	);


	$config = array(
		'id'			 => 'hostinza', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'hostinza-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', '_action_hostinza_register_required_plugins' );