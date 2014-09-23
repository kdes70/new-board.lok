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
    $adv = new Admin_Board_model('advert', $GET['num'], false, false);
    
    $adv->getAllAdvert(6);
    $rows = $adv->createRows('admin/board/row_adv', 'full');
    $title = 'Все объявления';
    $page_menu = $adv->menu;
    $count_adv = $adv->count;

    include DK_ROOT . TEMPLATE . '/tpl/admin/board/show.tpl';
