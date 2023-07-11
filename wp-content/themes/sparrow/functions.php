<?php

// Подключаемся к хуку загрузки скриптов
add_action("wp_enqueue_scripts", "style_theme");
add_action("wp_footer", "scripts_theme");
add_action("after_setup_theme", "myMenu");
add_action('widgets_init', 'register_my_widgets');

add_action( 'init', 'register_post_types' );
function register_post_types(){

	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Портфолио', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		],
		'description'            => 'Работы в портфолио',
		'public'                 => true,
		'publicly_queryable' 	 => true, // зависит от public
		'exclude_from_search' 	 => false, // зависит от public
		'show_ui'             	 => true, // зависит от public
		'show_in_nav_menus'   	 => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_admin_bar'   	 => true, // зависит от show_in_menu
		'show_in_rest'        	 => true, // добавить в REST API. C WP 4.7
		'rest_base'           	 => null, // $post_type. C WP 4.7
		'menu_position'       	 => 4,
		'menu_icon'           	 => "dashicons-format-gallery",
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'comments', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ 'skills' ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

// регистрация новой таксономии
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	register_taxonomy( 'skills', [ 'portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навык',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Смотреть навыки',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Изменить навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Новое имя навыка',
			'menu_name'         => 'Навыки',
			'back_to_items'     => '← Назад к навыкам',
		],
		'description'           => 'Навыки, которые использовались в работе над проектом', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

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



// добавление shortcode
// используется для того, чтобы добавлять его можно было
// добавить прямо в редакторе текста при создании поста
// в админке WP
add_shortcode("my_short", "short_func");
function short_func() {
	return "<b>My shortcode</b>";
}

add_shortcode( 'iframe', 'Generate_iframe' );
function Generate_iframe( $atts ) {
	$atts = shortcode_atts( array(
		'href'   => 'http://example.com',
		'height' => '550px',
		'width'  => '600px',
	), $atts );

	return '<iframe src="'. $atts['href'] .'" width="'. $atts['width'] .'" height="'. $atts['height'] .'"> <p>Your Browser does not support Iframes.</p></iframe>';
}
// использование:
// [iframe href="http://www.exmaple.com" height="480" width="640"]



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
	add_theme_support( 'post-thumbnails', array( 'post', "portfolio" ) );
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

	// Добавляем шаблоны для записей 
	add_theme_support( 'post-formats', array( 'video', 'aside' ) );
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

	// регистрация сайдбара для Contacts
	register_sidebar( array(
		'name'          => "Right Contacts Sidebar",
		'id'            => "right-contacts-sidebar",
		'description'   => 'Специализированный сайдбар для страницы контактов',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'	=> "</div>\n",
		'before_title'	=> '<h5 class="widgettitle">',
		'after_title'	=> "</h5>\n",
	) );
}



// Validation: image
function ic_sanitize_image( $file, $setting ) {

	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);

	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );

	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}

add_action('customize_register', 'mytheme_customize_register');

function mytheme_customize_register($wp_customize) {
    
    // Header
    $wp_customize->add_section('header', array(
        'title' => 'Шапка',
        'priority' => 1,
    ));

    $wp_customize->add_setting("header_logo", array(
        'default' => '',
        'sanitize_callback' => 'ic_sanitize_image',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "header_logo", array(
    	'label' => "Лого",
    	'section' => 'header',
    	'setting' => "header_logo",
    )));



    // Footer
    $wp_customize->add_panel('footer', array(
        'title' => 'Подвал',
        'priority' => 2,
    ));

    $wp_customize->add_section('footer_top', array(
        'title' => 'Верхняя секция подвала',
        'priority' => 1,
        'panel' => 'footer',
    ));

    $wp_customize->add_setting("footer_top_text", array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_text", array(
        'label' => 'Текст',
        'type' => 'textarea',
    	'section' => 'footer_top',
    	'setting' => "footer_top_text",
    ));

    $wp_customize->add_setting("footer_top_text_link", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_text_link", array(
        'label' => 'Ссылка в конце текста',
        'type' => 'url',
    	'section' => 'footer_top',
    	'setting' => "footer_top_text_link",
    ));

    $wp_customize->add_setting("footer_top_date_text", array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_date_text", array(
        'label' => 'Текст даты',
        'type' => 'text',
    	'section' => 'footer_top',
    	'setting' => "footer_top_date_text",
    ));

    $wp_customize->add_setting("footer_top_date_link", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_date_link", array(
        'label' => 'Ссылка даты',
        'type' => 'url',
    	'section' => 'footer_top',
    	'setting' => "footer_top_date_link",
    ));

    $wp_customize->add_setting("footer_top_btn_text", array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_btn_text", array(
        'label' => 'Текст кнопки',
        'type' => 'text',
    	'section' => 'footer_top',
    	'setting' => "footer_top_btn_text",
    ));

    $wp_customize->add_setting("footer_top_btn_link", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control("footer_top_btn_link", array(
        'label' => 'Ссылка кнопки',
        'type' => 'url',
    	'section' => 'footer_top',
    	'setting' => "footer_top_btn_link",
    ));
}