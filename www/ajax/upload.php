<?php 

/** 
* Устанавливаем ключ-константу 
*/    
    define('DK_KEY', true);

	include '../config.php';

    include DK_ROOT .'/libs/mysql.php';    
    include DK_ROOT .'/libs/default.php';



    $dir_dest = DK_ROOT.'/photo/temp/';
    $dir_dest1 = DK_ROOT.'/photo/temp/crop/';
    //$info = array();
    //$files = array();
    $max_size = DK_CONFIG_MAX_SIZE_IMG; // Мак. размер файла 1024*50
    $name = 'diboard-img';        // Имя большой картинки

     include DK_ROOT .'/libs/class.upload.php';
   // $smoll_name = 


    $handle = new Upload($_FILES['upload'], 'ru_RU');
    if ($handle->uploaded){
       			
                # разрешаем к загрузке только картинки(проверка MIME-type)
                $handle->allowed            = array('image/*');
                # не больше 2 Мб
                $handle->file_max_size      =  $max_size;
    			# указываем переименовывать файлы если есть с таким именем
                # чтоб можно было загрузить несколько юзерпиков
                # (вконце будут добавлятся цифры)
                $handle->file_auto_rename   = true;
                $handle->file_new_name_body = $name;
                # конвертим в jpg
                $handle->image_convert      = 'jpg';
                $handle->jpeg_quality       = 80;
                $handle->image_resize        = true;
                $handle->image_x             = 500;
                $handle->image_y             = 500;
                $handle->image_ratio         = true;
             // $handle->image_resize       = true;
                //$handle->image_x            = 600;
             // $handle->image_ratio_y      = true;
                $handle->image_ratio_no_zoom_in  = true;
                $handle->image_watermark    = DK_ROOT . TEMPLATE ."/images/watermark.png";
                $handle->image_watermark_x  = 10;
                $handle->image_watermark_y  = 10;



            $handle->Process($dir_dest);//ресайз ширина 600

                $handle->file_auto_rename   = true;
                $handle->file_new_name_body = $name ;
                # разрешаем к загрузке только картинки(проверка MIME-type)
                $handle->allowed            = array('image/*');
                # не больше 2 Мб
                $handle->file_max_size      = $max_size;
                # конвертим в jpg
                $handle->image_convert      = 'jpg';
                $handle->jpeg_quality       = 80;
                $handle->image_resize       = true;
                $handle->image_ratio_crop   = true;
                $handle->image_y            = 140;
                $handle->image_x            = 140;

    $handle->Process($dir_dest1);// обрезаем превью

    
	    if ($handle->processed)
	     {
	         echo 'yas__'.$handle->file_dst_name;
	         
	         $handle->Clean();
	    }
	    else
	    {  // one error occured
	       echo $handle->error;
	       $handle->Clean();

	    }
    }
   

 ?>