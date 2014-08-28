<?php


/**
* @author B)DIMON
* @copyright 2013
*
* Модель
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

   
    $news = new Line_Model('news', $GET['num']);

    if($GET['mod'] === 'full')
    {       
        $news -> createFull($GET['parent']);
        $rows_news = $news -> createRows('news/rows', 'all', 'news', DK_LANG_BACK);
        $page_menu = '';
    }
    else
    {   
       // $news->clear = true;
        $news -> createPreview(DK_CONFIG_NUM_ROWS, DK_CONFIG_NUM_WORDS);       
        $rows_news = $news -> createRows('news/rows', 'full', 'news', DK_LANG_FULL); 
        $page_menu = $news->menu;       
    }

    include DK_ROOT .'/skins/tpl/news/show.tpl';
