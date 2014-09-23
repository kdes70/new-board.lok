<?php

/**
* @author B)DIMON
* @copyright 2013
*
* Контроллер
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
       exit(file_get_contents('../404.html'));
    }
/////////////////////////////////////////////////////////

    $cat = new Categories_Model('category');
   // $cat->getCategory();
    $cat_row = $cat->getCategory();
    //print_r();
    include DK_ROOT . TEMPLATE . '/tpl/admin/category/show.tpl';