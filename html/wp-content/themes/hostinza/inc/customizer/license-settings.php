<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$fields[] = array(
  'type'        => 'custom',
  'label' => __('Activate the theme license', 'hostinza'),
  'description'  => __('In order to get regular update, support and demo content, you must activate the theme license. Please <a href="'. admin_url('themes.php?page=license') .'">Goto License Page</a> and activate the theme license as soon as possible.', 'hostinza'),
  'section'     => 'license_section',
);


