<?php

/**
 * Demo Content Import for One Click Demo Import plugin
 */
function hostinza_import_files()
{
	$demo_content_installer	 = 'https://wp.xpeedstudio.com/demo-content/hostinza';

	return [
		[
			'import_file_name'           => esc_html__( 'Home 1 to 6', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/default/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/default/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/default/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer . '/ocdi/default/screenshot.png',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza/',
		],
		[
			'import_file_name'           => esc_html__( 'Home 7', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/home-7/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/home-7/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/home-7/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer . '/ocdi/home-7/home-seven.jpg',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza-v2/',
		],
		[
			'import_file_name'           => esc_html__( 'Home 8', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/home-8/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/home-8/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/home-8/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer . '/ocdi/home-8/home-seven.jpg',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza-v2/home-eight-rev/',
		],
		[
			'import_file_name'           => esc_html__( 'Home 9', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/home-9/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/home-9/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/home-9/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer . '/ocdi/home-9/home-nine.jpg',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza-v2/home-nine/',
		],
		[
			'import_file_name'           => esc_html__( 'Home 10', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/home-10/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/home-10/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/home-10/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer . '/ocdi/home-10/home-ten.jpg',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza-v2/home-ten/',
		],
		[
			'import_file_name'           => esc_html__( 'Home 11', 'hostinza' ),
			'categories'                 => ['General'],
			'import_file_url'            =>  $demo_content_installer . '/ocdi/home-11/content.xml',
			'import_widget_file_url'     =>  $demo_content_installer . '/ocdi/home-11/widgets.wie',
			'import_customizer_file_url' =>  $demo_content_installer . '/ocdi/home-11/customizer.dat',
			'import_preview_image_url'   =>  $demo_content_installer .  '/ocdi/home-11/home-eleven.jpg',
			'preview_url'                => 'https://wp.xpeedstudio.com/hostinza-v2/home-eleven/',
		]	
	];
}
add_filter( 'ocdi/import_files', 'hostinza_import_files' );

function hostinza_after_import($selected_import)
{
	$all_demo_front_pages = array(
		'Home 1 to 6' => 'Home One',
		'Home 7' => 'Home Seven',
		'Home 8' => 'Home Eight',
		'Home 9' => 'Home Nine',
		'Home 10' => 'Home Ten',
		'Home 11' => 'Home Eleven'
	);

	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

	if ($main_menu) {
		set_theme_mod('nav_menu_locations', [
			'primary' => $main_menu->term_id,
		]);
	}

	$front_page_id = '';

	foreach( $all_demo_front_pages as $key => $value ) {

		if ($key == $selected_import['import_file_name']) {
			$front_page_id = get_page_by_title($value);
		}
	}

	$blog_page_id  = get_page_by_title('Blog');

	update_option('show_on_front', 'page');

	if( $front_page_id ) {
		update_option('page_on_front', $front_page_id->ID);
	}

	if( $blog_page_id ) {
		update_option('page_for_posts', $blog_page_id->ID);
	}

	//RevSlider import when importing the demo content.
	if ( class_exists( 'RevSliderSlider' ) ) {

		$demo_content_installer	 = 'https://wp.xpeedstudio.com/demo-content/hostinza';

		if($selected_import['import_file_name'] == 'Home 1 to 6') {
			
			$slider_url_one = $demo_content_installer . '/ocdi/default/slider/home-01.zip';
			$slider_url_two = $demo_content_installer . '/ocdi/default/slider/home-02.zip';
			$slider_url_three = $demo_content_installer . '/ocdi/default/slider/home-03.zip';
			$slider_url_four = $demo_content_installer . '/ocdi/default/slider/home-04.zip';
			$slider_url_five = $demo_content_installer . '/ocdi/default/slider/home-05.zip';
			$slider_url_hero_one = $demo_content_installer . '/ocdi/default/slider/hostinza-hero-1.zip';
			$slider_url_hero_tow = $demo_content_installer . '/ocdi/default/slider/hostinza-slider.zip';
			
			$sliders_array = array(
				download_url( $slider_url_one ),
				download_url( $slider_url_two ),
				download_url( $slider_url_three ),
				download_url( $slider_url_four ),
				download_url( $slider_url_five ),
				download_url( $slider_url_hero_one ),
				download_url( $slider_url_hero_tow ),
			);
		}else{

			$slider_url_hero_one = $demo_content_installer . '/ocdi/default/slider/hostinza-hero-1.zip';
			$slider_url_hero_tow = $demo_content_installer . '/ocdi/default/slider/hostinza-slider.zip';
			
			$sliders_array = array(
				download_url( $slider_url_hero_one ),
				download_url( $slider_url_hero_tow ),
			);
		}
		
		$slider = new RevSlider();

		if(is_array( $sliders_array )) {

			foreach( $sliders_array as $filepath ) {
				$slider->importSliderFromPost( true, true, $filepath );
			}
		}
	}
}

add_action( 'pt-ocdi/after_import', 'hostinza_after_import' );

function demo_license_content() {
	?>
	<div class="license-wrap">
		<h2 class="license-title"><?php esc_html_e( 'Please Activate Your License', 'hostinza' ); ?></h2>
		<div class="license-desc">
			<div class="notice-icon">
				<svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.27148 5.6001V9.80009" stroke="#FF7129" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M15.536 6.26402V11.736C15.536 12.632 15.056 13.464 14.28 13.92L9.52801 16.664C8.75201 17.112 7.792 17.112 7.008 16.664L2.256 13.92C1.48 13.472 1 12.64 1 11.736V6.26402C1 5.36802 1.48 4.53599 2.256 4.07999L7.008 1.336C7.784 0.888 8.74401 0.888 9.52801 1.336L14.28 4.07999C15.056 4.53599 15.536 5.36002 15.536 6.26402Z" stroke="#FF7129" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M8.27148 12.3599V12.4399" stroke="#FF7129" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<p>
			<?php 
				echo hostinza_kses('In order to get regular update, support and demo content, you must activate the theme license. Please  <a href="'. admin_url('themes.php?page=license') .'">Goto License Page</a> and activate the theme license as soon as possible.');
			?>
			</p>
		</div>
	</div>
	<?php
}

function set_license_menu() {
	if ( theme_is_valid_license() ) {
		return;
	}

	remove_submenu_page('themes.php', 'one-click-demo-import');
	$page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';

	if ('one-click-demo-import' === $page) {
		// wp_die('Sorry, you are not allowed to access this page', '');
		wp_redirect(admin_url("themes.php?page=license"));
	}

	add_submenu_page(
		'themes.php',
		'Import Demo Data',
		'Import Demo Data',
		'manage_options',
		'one-click-demo-import',
		'demo_license_content'
	);
}

add_action('admin_menu', 'set_license_menu', 999);
