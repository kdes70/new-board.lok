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
    $board = new Admin_Board_model('bord', $GET['num'], $GET['id_city']);
    
    $board->getAllBoard();
    $rows = $board->createRows('admin/board/myboard_row', 'full');
    $title = 'Все объявления';
    include DK_ROOT .'/skins/tpl/admin/board/myboard_show.tpl';
