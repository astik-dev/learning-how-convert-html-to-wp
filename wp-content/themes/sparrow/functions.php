<?php

// Подключаемся к хуку загрузки скриптов
add_action("wp_enqueue_scripts", "style_theme");
add_action("wp_footer", "scripts_theme");
add_action("after_setup_theme", "myMenu");
add_action('widgets_init', 'register_my_widgets');

// Добавление своего action
add_action("my_action", "action_function");
function action_function() {
	echo "My action";
}



// добавление фильтров
add_filter( "document_title_separator", "my_sep" );
function my_sep( $sep ) {
	$sep = " | ";
	return $sep;
}

add_filter( "the_content", "test_content" );
function test_content( $content ) {
	$content .= "Спасибо за прочтение статьи!";
	return $content;
}




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

	// Превью для записей
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	// Размер картинки (миниатюры)
	add_image_size( 'post_thumb', 1300, 500, true );

	// удаляет H2 из шаблона пагинации
	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
		/*
		Вид базового шаблона:
		<nav class="navigation %1$s" role="navigation">
			<h2 class="screen-reader-text">%2$s</h2>
			<div class="nav-links">%3$s</div>
		</nav>
		*/
		return '
		<nav class="navigation %1$s" role="navigation">
			<div class="nav-links">%3$s</div>
		</nav>
		';
	}
	// выводим пагинацию
	the_posts_pagination( array(
		'end_size' => 2,
	) );
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