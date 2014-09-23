<?php


/**
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }
/////////////////////////////////////////////////////////
/**
* Представление
* @author IT studio IRBIS-team
* @copyright © 2014 IRBIS-team
*/
/////////////////////////////////////////////////////////

class Blog_View extends Blog_Model
{

/**
* Конструктор
* @param string $table
* @param string $template
* @param int $num_rows
*/
    public function __construct($table, $template, $num = 1)
    {
        $this->table = $table;
        $this->num   = $num; 
        $this->tpl   = new IRB_Template($template);
    }

/**
* Акшен ленты статей
* @return void
*/
    public function actionАll()
    {
        $this->clear = true;
        $this->createPreview(DK_CONFIG_NUM_ROWS, DK_CONFIG_NUM_WORDS);       
        $this->createRows('rows', 'full', DK_LANG_FULL);
        $this->assign('menu',  $this->menu);
    }    
    
    
/**
* Полная статья
* @param int $id_topic
* @return void
*/
    public function actionFull($id_topic)
    {
    // Если авторизован - дадим форму  
      //  if(look::check(false))
     //   {  // Снабдим её bb-тегами
           // $tbb = new IRB_Template('bbcode');
           // $this->assign('bbcode', $tbb->parseTpl());        
            //$this->tpl->setBlock('form');
   //     }
   //     else // А на нет - формы нет.
      //      $this->tpl->setBlock('no_access');
     
        $this->createFull($id_topic);
        $this->createRows('full', 'all', DK_LANG_BACK);
    }
/**
* Метод генерации ленты статей.
* @param string $template
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createRows($block, $mod, $link)
    {
        global $GET;
        $rows  = '';      
        $bb = new IRB_BBdecoder();
       
        while($row = mysqli_fetch_assoc($this->res))
        {
            $row['m_title']       = !empty($row['m_title']) ? htmlChars($row['m_title']) : '';
            $row['m_keywords']    = !empty($row['m_keywords']) ? htmlChars($row['m_keywords']) : '';
            $row['m_description'] = !empty($row['m_description']) ? htmlChars($row['m_description']) : '';
         
            $row['title'] = htmlChars($row['title']);
            
            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
            
            $row['link']      = $link;
            
            $num          = ($this->num > 1)  ? $this->num : 0;
            $link_name    = ($mod === 'full') ? translateWord($row['title']) : 0;
            
            $row['url']   = href('mod='. $mod, 'parent='. $row['id'], 'id='. $link_name, 'num='. $num);
            $this->assign($row)->setBlock($block); 
        }
        
        return $rows;    
    } 
    
/**
* Передача данных в шаблонизатор.
* @param mix $var
* @param mix $value
* @return object 
*/ 
    public function assign($var, $value = '')
    {
        $this->tpl->assign($var, $value);
        return $this->tpl;
    }  
    
/**
* Рендер
* @return void 
*/ 
    public function run()
    { 
        $this->tpl->extendsTpl('blog/blog', '')->display();
    }   
}  