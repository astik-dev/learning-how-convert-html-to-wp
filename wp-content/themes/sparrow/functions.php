<?php

// Подключаемся к хуку загрузки скриптов
add_action("wp_enqueue_scripts", "style_theme");
add_action("wp_footer", "scripts_theme");
add_action("after_setup_theme", "myMenu");
add_action('widgets_init', 'register_my_widgets');



// Функция подключения стилей
function style_theme() {

	// get_stylesheet_uri() - Возвращает путь к файлу style.css который находится в корне темы
	wp_enqueue_style("style", get_stylesheet_uri());

	// et_template_directory_uri() - возвращает путь к папке с темой
	wp_enqueue_style("default", get_template_directory_uri() . "/assets/css/default.css");
	wp_enqueue_style("fonts", get_template_directory_uri() . "/assets/css/fonts.css");
	wp_enqueue_style("layout", get_template_directory_uri() . "/assets/css/layout.css");
	wp_enqueue_style("media-queries", get_template_directory_uri() . "/assets/css/media-queries.css");
}



// Функция подключения скриптов
function scripts_theme() {

	// Поключение jQuery
	// отменяем зарегистрированный jQuery и jquery-migrate.js
	wp_deregister_script( 'jquery-core' );
	wp_deregister_script('jquery');
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_register_script( 'jquery', false, array('jquery-core'), null, true );
	wp_enqueue_script( 'jquery' );

	// Подключение локальных скриптов
	wp_enqueue_script("jquery-migrate-1.2.1.min", get_template_directory_uri() . "/assets/js/jquery-migrate-1.2.1.min.js");
	wp_enqueue_script("jquery.flexslider", get_template_directory_uri() . "/assets/js/jquery.flexslider.js");
	wp_enqueue_script("doubletaptogo", get_template_directory_uri() . "/assets/js/doubletaptogo.js");
	wp_enqueue_script("init", get_template_directory_uri() . "/assets/js/init.js");
}



function myMenu() {
	register_nav_menu("top", "Меню в шапке");
	register_nav_menu("footer", "Меню в подвале");
}



// регистрация виджетов
function register_my_widgets(){

	// регистрация сайдбара
	register_sidebar( array(
		'name'          => "Right Sidebar",
		'id'            => "right-sidebar",
		'description'   => 'Описание сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'	=> "</div>\n",
		'before_title'	=> '<h5 class="widgettitle">',
		'after_title'	=> "</h5>\n",
	) );
}