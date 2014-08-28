<?php

/**
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

    
class Static_Model
{
    
    public $file, $content;

/**
* Конструктор
* @param string $filename
*/
    public function __construct($filename)
    {
        $this->file = DK_ROOT .'/setup/'. $filename .'.txt';
        $content = @file_get_contents($this->file);
     
        if(!empty($content))
            $this->content = $content;
        else
            $this->content = 'No page '. $filename .'.txt or no content';
    }
    
 
/**
* Метод представления.
* @return void 
*/      
    public function createContent()
    {
$bb = new IRB_BBdecoder();
        return $bb -> createBBtags($this->content);
    }

/**
* Метод представления для редактирования.
* @return void 
*/      
    public function editContent()
    {
        return htmlChars($this->content);
    }

/**
* Метод представления для редактирования.
* @return void 
*/      
    public function saveContent($content)
    {
        file_put_contents($this->file, $content);
    }
}    