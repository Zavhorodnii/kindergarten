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
define( 'DB_NAME', 'kindergarten' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
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
define( 'AUTH_KEY',         'H>f|ngXVB35 3f`gj8BS?k@nit w?LUtonp2T1u /B=F+t +~~%Dt!T?jmB6+`BM' );
define( 'SECURE_AUTH_KEY',  'm[xHPd#$eF0VIMj&f`r_m3hsig>J4P#{Px f.r3<}e)2b !Byeu`._6exw$~fCO(' );
define( 'LOGGED_IN_KEY',    'tM(1|s|Uuah>rPb+1`i*8h@49oF;MBiLc`5O}&2t5-;,pFV}::H boiqE[5TnyQG' );
define( 'NONCE_KEY',        'a~`o8HD&Kl@3~$:Pq84=4Pyo]?!KQ<(L+.&A6`BL^fvCk:E)k.bEY>Zggr$KkA+<' );
define( 'AUTH_SALT',        '@#=(Cm2zc$,hA6)$ef6MEGo=:Wz^9:)E?sim{D-lX`5.yn]N3M?|*z34zo4{(gC`' );
define( 'SECURE_AUTH_SALT', 'ZaW_)K&IqO5! PMI=Sj/2e_94<q/.WB4o8m(Pz=~Eyy!.@M~)SAns5_D;!o Y1|V' );
define( 'LOGGED_IN_SALT',   'DPH8yk@i8b+}j_!D1*khu>w%wfpmt8d)%7R,%TP:+q75Wi_s?2;D+)9L;xT u;]]' );
define( 'NONCE_SALT',       ');c*(S/R3ZN;*v}hO8wT]0}[{zq/ndEjm&|pdV+,bl91k?dS*uu3{yek%1!A[%X}' );

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
