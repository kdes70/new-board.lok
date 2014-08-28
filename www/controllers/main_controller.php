<?php 

/**
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
   	$news->clear = true;
    $news -> createPreview(DK_CONFIG_MAIN_ROWS, DK_CONFIG_NUM_WORDS, false);       
    $news_rows = $news -> createRows('news/news_rows', 'full', 'news', DK_LANG_FULL); 
    
    

     //Все объявления в городе
  
    $board = new Board_Model('bord', $GET['num'], $GET['id_city']);

    $board->photo = '';
    $board->comments = '';
    $desc_cat = 'Объявления';
    
    $board->createPreview(DK_CONFIG_NUM_ROWS); 
    $main_board = $board -> createRows('board/rows', 'full');
    $page_menu = $board->menu;
    
    
    include DK_ROOT .'/skins/tpl/main/show.tpl';
    