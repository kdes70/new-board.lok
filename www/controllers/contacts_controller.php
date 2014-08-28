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


       $news = new Line_Model('news');

    $news -> createPreview(DK_CONFIG_MAIN_ROWS, DK_CONFIG_NUM_WORDS, false);       
    $news_rows = $news -> createRows('news/news_rows', 'full', DK_LANG_FULL); 
    
    if($GET['mod'] === 'full')
    {
        $news -> createFull($GET['parent']);    
        $main_content = $news -> createRows('news/rows', 'all', DK_LANG_BACK);    
    }
    else
    {
        $stc = new Static_Model('main');
        $main_content = $stc -> createContent();
    }
    
    include DK_ROOT .'/skins/tpl/main/show.tpl';
    
?>