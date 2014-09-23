<?php

/**
* Configuration file
* Конфигурационный файл
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");
       exit(file_get_contents('./404.html'));
    }

///////////////////////////////////////////////////////////////
//                THE GENERAL OPTIONS
//                  ОбЩИЕ НАСТРОЙКИ
///////////////////////////////////////////////////////////////


    $admins = array(
                      'root'   => 'root', // Изменить в релизе
                      'admin'  => '12345',
                    );

/**
* E-mail техподдержки
*/
   define('DK_SUPPORT_EMAIL', 'dimbord@mail.ru');
/**
* Включает модуль перенаправления
*/
    define('DK_REWRITE', 'on');

 /**
* Активация аккаунта по письму
*/
   define('DK_REGISTRATION_ACTIVATE', 'off');

/**
* Количество рядов в постраничном режиме
*/
    define('DK_CONFIG_NUM_ROWS', 20);

/**
* Количество рядов в постраничном режиме для VIP
*/
    define('DK_CONFIG_NUM_VIP_ROWS', 8);

/**
* Количество новостей на главной странице
*/
    define('DK_CONFIG_MAIN_ROWS', 3);

 /**
* Количество слов в анонсе
*/
    define('DK_CONFIG_NUM_WORDS', 40);


///////////////////////////////////////////////////////////////
//                OPTIONS OF CONNECTION WITH A DB
//                  НАСТРОЙКИ СОЕДИНЕНИЯ С БД
///////////////////////////////////////////////////////////////

/**
* Префикс таблиц БД.
* Сервер БД.
* Пользователь БД
* Пароль БД
* Название базы
*/
    define('DK_DBPREFIX', 'kd_');
    define('DK_DBSERVER', 'localhost');
    define('DK_DBUSER', 'mysql');
    define('DK_DBPASSWORD', 'mysql');
    define('DK_DATABASE', 'board_db');


///////////////////////////////////////////////////////////////
//                  СИСТЕМНЫЕ НАСТРОЙКИ
///////////////////////////////////////////////////////////////
/**
* Устанавливает физический путь до корневой директории скрипта
*/
    define('DK_ROOT', str_replace('\\', '/', dirname(__FILE__)));

/**
* Устанавливает путь до корневой директории скрипта
* по протоколу HTTP
*/
    define('DK_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/');

/**
 * Устанавливаем путь к виду
 */
  define('SKINS', 'default');

/**
* Устанавлаваем активный шаблон
*/
 

define('STYLES', '/skins/'.SKINS.'/');

 define('TEMPLATE', DK_ROOT.STYLES.'tpl/');

/**
* Путь для автолоада моделей
*/
     $INCLUDE_PATCH = array(
                            'libs',
                            'models',
                            'views',
                            'components/registration',
                            'ajax/'
                           // 'components/captcha/'
                          );

/**
* Временая папка для загруски картинок
*/
  define('IMG_DIR_TEMP', DK_ROOT.'/photo/tmp/');

/**
* Максимальный размер файла для загрузки
*/
	define('DK_CONFIG_MAX_SIZE_IMG', 1048576);

/**
* Директория загруски изображения
*/
	define('DK_CONFIG_UPLOAD_PATH', DK_ROOT."/photo/advert/");

  /**
 * СОЛЬ ПАРОЛЯ
 */
    define('DK_CONFIG_SALT', 'bou5s@l#mea2d');













