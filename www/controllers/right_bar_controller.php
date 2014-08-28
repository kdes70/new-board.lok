<?php

/**
 * @author B)DIMON
 * @copyright 2013
 */

    $news = new Line_Model('news');
    $news->clear = true; //отчищаем от смайлов
    $news -> createPreview(DK_CONFIG_MAIN_ROWS, DK_CONFIG_NUM_WORDS, false);       
    $news_rows = $news -> createRows('news/news_rows', 'full', 'news', DK_LANG_FULL); 

?>