<?php
/**
 * загрузка массива изображений
*/ 
 function imgUploadMass($pic_weight, $pic_height, $id_board)
    {
 //ширина и высота в пикселях
$pic_weight = 3000;
$pic_height = 3000;
$info[] = ''; 
if (isset($_FILES))
{
  //пролистываем весь массив изображений по одному $_FILES['file']['name'] as $k=>$v
  foreach ($_FILES['files']['name'] as $k=>$v)
  {
    //директория загрузки
    $uploaddir = "photo/average/";
    //новое имя изображения
    $apend=date('YmdHis').rand(100,1000).'.jpg';
    //путь к новому изображению
    
    $uploadfile = "$uploaddir$apend";
    // массив размеров и типа изображения.
    $img_mime = getimagesize($_FILES['files']['tmp_name'][$k]); 
    
    //Проверка расширений загружаемых изображений
    if($_FILES['files']['type'][$k] == "image/gif" || $_FILES['files']['type'][$k] == "image/png" ||
    $_FILES['files']['type'][$k] == "image/jpg" || $_FILES['files']['type'][$k] == "image/jpeg")
    {   
        //Проверка являится ли фаил изображением
        if($img_mime['mime'] == 'image/gif' || $img_mime['mime'] == 'image/jpeg' 
        || $img_mime['mime'] =='image/png' || $img_mime['mime'] == 'image/jpg')
      {      
      //черный список типов файлов
      $blacklist = array(".php", ".phtml", ".php3", ".php4");
      foreach ($blacklist as $item)
      {
        if(preg_match("/$item\$/i", $_FILES['files']['name'][$k]))
        {
          $info[] = "Нельзя загружать скрипты.";
          exit;
        }
      }
 		
      //перемещаем файл из временного хранилища
      if (move_uploaded_file($_FILES['files']['tmp_name'][$k], $uploadfile))
      {
        //получаем размеры файла
        $size = getimagesize($uploadfile);
        //проверяем размеры файла, если они нам подходят, то оставляем файл
        if ($size[0] < $pic_weight && $size[1] < $pic_height)
        {
          //.....код
          
          // заношу имя  изображения в бд
         mysqlQuery("INSERT INTO ".DK_DBPREFIX."photo 
                     SET `photo` = '".escapeString($apend)."',
                     `id_bord` = ". (int)$id_board);
                
          //.....код
 
          $info[] = "<center><br><img src=\"".DK_HOST  . $uploadfile ."\" width=\"110\"> Файл ($uploadfile) загружен.</center>";
        }
        //если размеры файла нам не подходят, то удаляем файл unlink($uploadfile);
        else
        {
          $info[] = "<center><br>Размер пикселей превышает допустимые нормы.</center>";
          //Удолить из базы
          unlink($uploadfile);
        }
      }
      else
        $info[] = "<center><br>Файл не загружен, вернитесь и попробуйте еще раз.</center>";
        
        }
        else
            $info[] = "К сожалению, мы принимаем только GIF, JPEG, PNG изображений";
    }
    else
      $info[] = "<center><br>Можно загружать только изображения в форматах jpg, jpeg, gif и png.</center>";
  }
}
}
 return $info;  
?>