<?php

/**
* Модель
* @author IT studio IRBIS-team
* @copyright © 2012 IRBIS-team
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
 
    
class Blog_Model extends Line_Model
{
    
/**
* Метод представления.
* @param string $template
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createRows($template, $mod, $link)
    {
       global $POST;
        $rows  = '';    
        $tpl   = getTpl($template);    
        $bb = new IRB_BBdecoder();
       
        while($row = mysqli_fetch_assoc($this->res))
        {
            $this->title       = !empty($row['m_title']) ? htmlChars($row['m_title']) : '';
            $this->keywords    = !empty($row['m_keywords']) ? htmlChars($row['m_keywords']) : '';
            $this->description = !empty($row['m_description']) ? htmlChars($row['m_description']) : '';
         
            $row['title'] = htmlChars($row['title']);
            
            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
				
			//$online = createOnline($online, $this->id_user) ;  
                
            $row['link']  = $link;
            $row['ready'] = !empty($POST['array1']);
            // Добавим в массив элемент с комментариями
            $row['comments'] = $this->comments;
			//если нажата кнопка ответить
			$row['id_parent'] = $this->id_parent;
   
            $num          = ($this->num > 1)  ? $this->num : 0;
            $link_name    = ($mod === 'full') ? translateWord($row['title']) : 0;
            $row['url']   = href('mod='. $mod, 'parent='. $row['id'], 'id='. $link_name, 'num='. $num);
                       
            $rows .= parseTpl($tpl, $row);   
        }
        
        return $rows;    
    } 
}