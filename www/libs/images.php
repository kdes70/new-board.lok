<?php

class Images
 {
    
    public $dir; 
    public $error; 
   // public $files = array();
    public $info = array();
     
     //ширина и высота в пикселях
    public $pic_weight ;
    public $pic_height ;
   
 
    function __construct($pic_weight, $pic_height, $error) 
    {    
        //$this->files = $files;
        $this->error = $error; 
        $this->pic_weight = $pic_weight;
        $this->pic_height = $pic_height;
    }
    
    public function imgsUpload($files, $dir = 'photo/big/')
    {
           //пролистываем весь массив изображений по одному $_FILES['file']['name'] as $k=>$v
        foreach($_FILES[$files]['name'] as $k=>$v)
      // for( $k = 0, $length = count( $_FILES[$files]['name'] ); $k < $length; $k++)
        {
            if(!empty($this->error[$_FILES[$files]['error'][$k]])) 
            return $this->error[$_FILES[$files]['error'][$k]];
             
           elseif(($extension = $this->checkFile($files)) === false)    
            return $this->error['UPLOAD_ERR_EXTENTION'];        
                    
            $img = getimagesize($_FILES[$files]['tmp_name'][$k]);
            
        if($img[2] < 1 || $img[2] > 3)
            return $this->error['UPLOAD_ERR_EXTENTION'];
        elseif($img[0] > $this->pic_weight + $this->pic_weight * 0.1) 
            return $this->error['UPLOAD_ERR_WIDTH'];
        elseif($img[1] > $this->pic_height + $this->pic_height * 0.1) 
            return $this->error['UPLOAD_ERR_HEIGHT'];            
        else
        {
            $this->dir  = $dir;
            $this->name = time() . strtolower(substr($_FILES[$files]['tmp_name'][$k], -8, 4));
            $this->name .=  '.'. $extension;            
            $this->new_name  = DK_HOST . $this->dir . $this->name;
            $this->upload_name = DK_ROOT .'/'. $this->dir . $this->name; 
         

            
            if(move_uploaded_file($_FILES[$files]['tmp_name'][$k], $this->upload_name))
                return false; 
            else  
                return $this->error['UPLOAD_ERR_UPLOAD'];    
        }
        }
    }
    
    /*function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}*/
    
    
/**
* Метод проверки типа файла
* @param string
* @return string
*/
    public function checkFile($files)
    {    
         foreach ($_FILES[$files]['name'] as $k=>$v)
         {
             
         
             $extension = pathinfo($_FILES[$files]['name'][$k], PATHINFO_EXTENSION); 
            $valid_extensions = array('jpg', 'jpeg', 'gif', 'png');        
           return in_array($extension, $valid_extensions) ? $extension : false;
         }
             
        
    }
    
    /**
* Метод генерации уникального имени
* @return string
*/
    public function generateFilename($files)
    {    
        foreach ($_FILES[$files]['name'] as $k=>$v)
        {
        return time() . strtolower(substr($_FILES[$files]['tmp_name'][$k], -8, 4));
       } 
    }
    
    
    
    
    
    
    public function checkSizeFiles($file)
    {
        
    }
    
    public function blacklistType($file)
    {
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
          foreach ($blacklist as $item)
          {
            if(preg_match("/$item\$/i", $_FILES['files']['name'][$k]))
            {
              $info[] = "Нельзя загружать скрипты.";
              exit;
            }
          }
    }
    
    
}



 ?>