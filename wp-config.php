<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp_site' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'DaV;cMPB,dQC[7;56pV8ceye{8qha2W8:f6mNL@X* g:9=&GTUcb4dAqZ0.k~UvL' );
define( 'SECURE_AUTH_KEY',  'dxWX3R]eqvRb7!W&oz1MI78xuzrwUv$Smxd,]CEVL^X5MSiE8Tb>[E4jdKIqK2DM' );
define( 'LOGGED_IN_KEY',    '$Skla=]bTct`WxPRi[!#J{Z7s^S{RyolQf$;%z1/3S&<))=mG[}bxLB7jBGT5zh;' );
define( 'NONCE_KEY',        'Xi]}&s?TTNh?p{`O89wz;Nj^?eRE32,z|jAL5r0l?^_t8e;b-YS@eHz!|q>LbI({' );
define( 'AUTH_SALT',        '_q{8Q[.D8;yOh^wW}3aQTnH:2XQi|pP+Qx#$}R?u9^gvN4D@%Dt55SSUQ)5p+AO}' );
define( 'SECURE_AUTH_SALT', '1>E<TF:X-!{[sqUu0%yA1 @y@b@/`Cj+l/I$e6o+xJUoG]#:h BkYmY8o9Q@j9Gb' );
define( 'LOGGED_IN_SALT',   'VGlsO]y%s-ah%%P}.o<,u6;g^q,j*`9pj(n^UCo%7Mexk4v|HCO2f)DM>3.5ghJF' );
define( 'NONCE_SALT',       '_f>V&~u6*@ns,vy2Nts(t_b&(0rq.1`f{%5ATAmHtH1Hk(F$iE>D@hB8:<0hiF6e' );

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

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
