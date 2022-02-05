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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', "ci75377_db");


/** Имя пользователя MySQL */
define('DB_USER', "ci75377_db");


/** Пароль к базе данных MySQL */
define('DB_PASSWORD', "ci75377ci75377A");


/** Имя сервера MySQL */
define('DB_HOST', "localhost");


/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');


/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'TK$2hi_Tpqm.rw$d%*%^/Q2c4n$@cUB<%s$d?lUkd7{Oy1V[#tm%0EIpQzDTTGSK');

define('SECURE_AUTH_KEY',  '~Jy!uxI|9Y,(V#,d13o2n1B(-w]3ZMkxGg|B?w51sc#=LX:R|=@5?jAOnDB1D.P3');

define('LOGGED_IN_KEY',    'Y==bI.pqZ!= T17E5T::9L kcu>|t`U_ni18RZQ}_Zb0E:>`ftyR_WiRCics*e*F');

define('NONCE_KEY',        'UMLH<tk$=5pG;+deuao2p)gD5x`EqDph*kSw_6k<Y05qygThA_AR$d*{hp@4sS.}');

define('AUTH_SALT',        '|E{8v-J7R&TDqQBthuM(snrnvvsa{~p w4$0)qIhr5#^[RgS_$:<RZzic2!N8B_M');

define('SECURE_AUTH_SALT', 'g@MRYwS3rb0TgM.N!ID{U]V?9l}UY5w-::BN1uy0P!<-:KdnMuIJF&RVa<I}RAO^');

define('LOGGED_IN_SALT',   'V*?/L/kpDXL97,k$J2ZQN;))E@Adx#GO?uI4_(Ut!/afrDwA{p74|RGEe$(R&RE.');

define('NONCE_SALT',       'Zt9J7fUW}. T9]g4VW_9C(kuiH/bcneIZ!gz45JvdI1ux=NLjm{7) Vo2 Hv }n&');


/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';


/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');