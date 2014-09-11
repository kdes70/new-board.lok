<?php    

/**  
* АДМИН-ПАНЕЛЬ
* Главный маршрутизатор (роутер)  
* @author IT studio IRBIS-team 
* @copyright © 2011 IRBIS-team 
*/ 
///////////////////////////////////////////////////////// 

/** 
* Устанавливаем кодировку и уровень ошибок 
*/ 
    header("Content-Type: text/html; charset=utf-8"); 
    error_reporting(E_ALL); 

    session_start();
    ob_start(); 
    $start = microtime(true); 

/**  
* Debug  
* Дебаггер 
* @TODO To clean in release 
*/ 
    define('DK_TRACE', true);    
    include '../debug.php';     
           
/** 
* Устанавливаем ключи-константы 
*/    
    define('DK_KEY', true);
    define('DK_ADMIN', true);    
/** 
* Подключаем файлы ядра 
*/     
    include '../config.php';
    include DK_ROOT .'/variables_adm.php'; 
    include DK_ROOT .'/language/ru.php';
    include DK_ROOT .'/libs/mysql.php';    
    include DK_ROOT .'/libs/default.php';    
    include DK_ROOT .'/libs/view.php';     

/** 
* Переключатель страниц 
*/ 
    if(isset($_SESSION['admin']) && file_exists(DK_ROOT .'/admin/'. $GET['page'] .'_controller.php'))
        include DK_ROOT .'/admin/'. $GET['page'] .'_controller.php';    
    else
        include DK_ROOT .'/admin/enter_controller.php';
    

// Заканчиваем буферизацию и помещаем вывод в переменную $content
   $content = ob_get_clean(); 
/** 
* Подключаем главный шаблон 
*/     
    include DK_ROOT . TEMPLATE . '/tpl/admin/index.tpl';
    
// echo '<br /><br /><br />';
// echo 'Время генерации страницы: '. sprintf("%01.4f", microtime(true) - $start) .'<br />';
// echo 'Количество подключённых файлов: '. count(get_included_files()) .'<br />';
// echo 'Количество запросов: '. DB::$count .'<br />';