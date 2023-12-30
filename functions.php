<?php
/*
* My Theme Function
*/

// Theme Title
add_theme_support('title-tag');

// Theme CSS and jQuery File calling
function almumeetu_css_js_file_calling()
{

	wp_enqueue_style('almumeetu-style', get_stylesheet_uri());
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '6.4.2', 'all');
	wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');

	wp_enqueue_style('bootstrap');
	wp_enqueue_style('custom');




	//jQuery
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '6.4.2', 'true');
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', 'true');
}

add_action('wp_enqueue_scripts', 'almumeetu_css_js_file_calling');



//Theme Function
function almumeetu_customizar_register($wp_customize)
{
	$wp_customize->add_section('almumeetu_header_area', array(
		'title' => __('Header Area', 'almumeetu'),
		'description' => 'Update your Logo.'
	));

	$wp_customize->add_setting('almumeetu_logo', array(
		'default' => get_bloginfo('template_directory') . '/img/saikat2.png',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'almumeetu_logo', array(
		'label' => 'Logo Upload',
		'description' => 'If you interested......',
		'setting' => 'almumeetu_logo',
		'section' => 'almumeetu_header_area',
	) ));


}

add_action('customize_register', 'almumeetu_customizar_register');
