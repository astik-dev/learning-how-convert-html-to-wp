<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_db' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@r/E6 %_$01FLDy=.ZHn|8m<9ih%v.<Z/2Qq[^_Z~<k)Wa:?T,Bkg /~FC8U%IF4' );
define( 'SECURE_AUTH_KEY',  '}@],j`BId,nif@X~H{$vuO#T!4=w AyzAW,3I-0q_lrsm65r8+jMTHj=#(iPOG6T' );
define( 'LOGGED_IN_KEY',    'A^ &5:Xfa5`Dw<vt01Y2OVX+|(+CN=-bQ%XW@&ugOxo8+bTgjZU8+ptyZxb~rS9A' );
define( 'NONCE_KEY',        '@~INUo!eJLS_0DmE|CkqjD@~%=k4dQFWC[5VgjQVh;YB?Pk]6GyNK?n| 6bt2/XN' );
define( 'AUTH_SALT',        'l8<C{hnL(g7q7kl+XWR)gd`T-^LlW ifq]P%.CUOR)R:O@hesqWE<%AyFI;YxTb|' );
define( 'SECURE_AUTH_SALT', 'VW)e8g{jUrw>*0aba;GDnBbf4sIu)`*VX1PL8C5#l0DtE6Jls7`Tv-u;qh&.P%k$' );
define( 'LOGGED_IN_SALT',   'B-D)/I:d#w&S^U6{7mQC~Ly,sNWgT6%U]_+]!wY=o5~$l=Y%s0uGv1,h3[?4qn}Y' );
define( 'NONCE_SALT',       'rh-.Yz|z&Wrf=TCkpz`/XhcQ(^{`l~a5G?G%uy~0P^a0WkB8rK-kh 7YRv[ck`m.' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
