<?php

/**
* @author B)DIMON
* @copyright 2013
*
* Контроллер добавления нового объявления
* ---------------------------------------
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



    $cat_s = new Categories_Model('category');
    $cat_select = $cat_s->getCategory();


    print_arr($cat_select);

     include DK_ROOT . TEMPLATE .'tpl/board/add_form.tpl';
