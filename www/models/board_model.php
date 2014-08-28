<?php

/**
* @author B)DIMON
* @copyright 2013
*    Модель Объявлений
*
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



class Board_Model
{


    public $table, $menu, $title, $keywords, $description, $author, $img, $id, $user_id;
    public $type;
    public $clear  = true;
    protected $res, $num, $and, $city;
    public $count;

/**
* Конструктор
* @param string $table
* @param int $num
*/
    public function __construct($table, $num = 1, $city, $public = true)
    {
        $this->table = $table;
        $this->num   = $num;
        $this->city  = $city;
        $this->vit_row = DK_CONFIG_NUM_VIP_ROWS; //8 defaut

       // $this->type  = $type;

        $this->where = $public ? "WHERE `confirm` = '1' AND `id_city`=".(int)$this->city."" : '';
        $this->and   = $public ? " AND   `confirm` = '1' AND `id_city`=".(int)$this->city." " : '';
    }



/**
 * Функция генерации привью объявлении
 * @param int $num_rows количество рядов;
 *
 */
    public function createPreview($num_rows)
    {
       // $where = !defined('DK_ADMIN') ? "WHERE `public` = '1' AND `id_city`=".(int)$this->city."" : '';
      $where = !defined('DK_ADMIN') ? "WHERE `confirm` = '1' AND `is_vip` = '0'" : '';
        $pag = new IRB_Paginator($this->num, $num_rows);

        $this->res = $pag -> countQuery("SELECT * FROM `".DK_DBPREFIX.$this->table."`
                                        ".$where."
                                        ORDER BY `id_adv` DESC"
                                        );

        $this->menu = $pag -> createMenu();
        $this->count = $pag->TableCount;
    }

  /**
   * Функция генерации привью -VIP- объявлении
   * @param int $num_rows количество рядов;
   *
   */
      public function createVipPreview()
      {
         // $where = !defined('DK_ADMIN') ? "WHERE `public` = '1' AND `id_city`=".(int)$this->city."" : '';
        $where = !defined('DK_ADMIN') ? "WHERE `confirm` = '1' AND `is_vip` = '1' " : '';
          $pag = new IRB_Paginator($this->num, $this->vit_row);

          $this->res = $pag -> countQuery("SELECT * FROM `".DK_DBPREFIX.$this->table."`
                                          ".$where."
                                          ORDER BY `id_adv` DESC "
                                          );

          $this->menu = $pag -> createMenu();
          $this->count = $pag->TableCount;
      }
/**
* Метод генерации списка типа объявления
* @return void
*/
    public function createAdvType()
    {
        $res = mysqlQuery("SELECT * FROM `".DK_DBPREFIX."adv_type` ");
        if($res)
        {
            while ($row = mysqli_fetch_assoc($res)) {
                 $type[] = $row;
             }
             return $type;
        }
        else
            return NULL;
    }

 /**
* Метод генерации списка категорий
* @return void
*/
   /*  public function createCategory($id = '')
    {
        $sql = empty($id) ? ' ORDER BY `id` ASC ' : ' WHERE `id` = '.(int)$id ;

        $res = mysqlQuery("SELECT *
                            FROM `". DK_DBPREFIX . $this->table ."_cat`
                            ". $sql
                            );

        if(!empty($id))
       {
       $row = mysqli_fetch_assoc($res);
            $this->cat_name = $row['title'];
            $this->cat_desc = $row['meta_d'];
       }
       else
       {    $tpl   = getTpl('board/rows_cat');
            $rows = '';
            while($row = mysqli_fetch_assoc($res))
            {
                $row['url']   = href('page=board', 'mod=cat', 'parent='. $row['id']);
                $rows .= parseTpl($tpl, $row);
            }
            return $rows;
       }
            $this->res = $res;
    }*/



/**
* Метод генерации объявления
* @param int $id
* @return void
*/
   public function creareFull($id)
    {

     $this->res = mysqlQuery("SELECT * FROM ".DK_DBPREFIX.$this->table."
                                WHERE `id_adv` = ".(int)$id
                        );
           // $r = mysqli_fetch_assoc($this->res);
           //      $this->author = $r['id_user'];

    }

/**
* Метод генерации списка объявлений выбранной категории
* @param int $cat
* @return void
*/

   public function creareCatBoard($id, $num_rows)
    {

        // устарело!!!
     //   $and = !defined('DK_ADMIN')  ? " AND   `public` = '1' AND `id_city`=".(int)$this-> city." " : '';

    	 $pag = new IRB_Paginator($this->num, $num_rows);

        $this->res = $pag -> countQuery("SELECT * FROM `".DK_DBPREFIX.$this->table."`
                                WHERE  `id_cat`=".(int)$id."


                                ORDER BY `id_adv` DESC "
                                        );

        $this->menu = $pag -> createMenu();
        $this->count = $pag->TableCount;

           if(mysqli_num_rows($this->res) > 0)
        {
            return NULL;
        }
        else
            return DK_LANG_NOT_BORD_CAT;

    }

    /**
* Метод записи.
* @param string $title
* @param string $text
* @return mixed
*/
    public function addAdvert($title, $category, $city, $text, $price, $type, $phone, $email, $author)
    {
        // $title    = trim($title);
        // $category = (int)$category;
        // $city     = (int)$city;
        // $text     = escapeString($text);
        // $price    = (int)$price;
        // $type     = (int)$type;
        // $author   = (int)$author;

        // unset($_SESSION['img_captcha']);
        // Если заголовок пуст
         if(empty($title))
        {
            $_SESSION['msg'] = DK_LANG_NO_HEADER;
            $_SESSION['add_adv']['category'] = $category;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['text'] = $text;
            $_SESSION['add_adv']['price'] = $price;
            return FALSE;
        }
        // Если не выбрали категорию
        if (empty($category))
        {
            $_SESSION['msg'] = DK_LANG_NO_CAT;
            $_SESSION['add_adv']['title'] = $title;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['text'] = $text;
            $_SESSION['add_adv']['price'] = $price;
            return FALSE;
        }
        // Если город не определен
        if (empty($city))
         {
            $_SESSION['msg'] = DK_LANG_NO_CITY;
            return FALSE;
         }
         // Если нет текста объявления
        if(empty($text))
        {
            $_SESSION['msg'] = DK_LANG_NO_TEXT;
            $_SESSION['add_adv']['category'] = $category;
            $_SESSION['add_adv']['title'] = $title;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['price'] = $price;
            return FALSE;
        }
        // Если тип не выбран
        if(empty($type))
        {
            $_SESSION['msg'] = DK_LANG_NO_TYPE;
            $_SESSION['add_adv']['category'] = $category;
            $_SESSION['add_adv']['title'] = $title;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['text'] = $text;
            $_SESSION['add_adv']['price'] = $price;
            return FALSE;
        }
      if(empty($phone))
        {
            $_SESSION['msg'] = DK_LANG_NO_TYPE;
            $_SESSION['add_adv']['category'] = $category;
            $_SESSION['add_adv']['title'] = $title;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['text'] = $text;
            $_SESSION['add_adv']['price'] = $price;
            $_SESSION['add_adv']['type'] = $type;
            return FALSE;
        }

  // Если есть фотка и она не пустая
        if(!empty($photo))
            $photo = ", `img` = '". escapeString($photo) ."'";
        // Если есть пользователь
        /*else{
            $_SESSION['msg'] = "Нет фото";
            return FALSE;
        }*/
        if(!isset($_SESSION['userdata']))
        {
            if(empty($email))
            {
                $_SESSION['msg'] = DK_LANG_EMPTY_EMAIL;
                $_SESSION['add_adv']['category'] = $category;
                $_SESSION['add_adv']['title'] = $title;
                $_SESSION['add_adv']['city'] = $city;
                $_SESSION['add_adv']['text'] = $text;
                $_SESSION['add_adv']['price'] = $price;
                $_SESSION['add_adv']['type'] = $type;
                return FALSE;
            }
             if(!checkEmails($email))
            {
                $_SESSION['msg'] = "Email не коректен";
                return FALSE;
            }
        }



         if (empty($_SESSION['img_captcha']) || $_SESSION['img_captcha'] !== $_POST['reg_captcha'])
        {
            $_SESSION['msg'] = "Ведите капчу првельно";
            $_SESSION['add_adv']['title'] = $title;
            $_SESSION['add_adv']['category'] = $category;
            $_SESSION['add_adv']['city'] = $city;
            $_SESSION['add_adv']['text'] = $text;
            $_SESSION['add_adv']['price'] = $price;
            $_SESSION['add_adv']['type'] = $type;
            return FALSE;
        }


        if(isset($author))
        {
            mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->table ."`
                             SET
                                 `over_time`  =  NOW() + INTERVAL 30 DAY,
                                 `title`    = '". escapeString($title) ."',
                                 `text`     = '". $text ."',
                                 `price`    = '". $price ."',
                                 `phone`    = '". $phone ."',
                                 `id_city`  = '". (int)$city ."',
                                 `id_cat`   = '". (int)$category ."',
                                 `id_user`  = '". (int)$author ."',
                                 `id_type`  = '". (int)$type ."',
                                 `confirm`  = '1'
                                 ".$photo
                             );

           if(mysqli_affected_rows(DB::$link) > 0)
            {
                $this->id = mysqli_insert_id(DB::$link);
              //  $_SESSION['guest_id'] = (int)$author;
                $_SESSION['msg'] = "Объявление добавленно № ". $this->id;

             // Look::autchGuest($id_author, $email);

                unset($_SESSION['add_adv']);
                return TRUE;
            }
            else
            {
                $_SESSION['msg'] = IRB_LANG_FATAL_ERROR;
                return FALSE;
            }
        }
        else
        {
            $_SESSION['msg'] = IRB_LANG_FATAL_ERROR." НЕТ ПОЛЬЗОВАТЕЛЯ";
            return FALSE;
        }
    }




/**
* Метод загрузки дополнительных фото для объявления
* @param array $_FILES
* @return string $name
*/
function UploadImgFiles($filess, $parent)
{

    $dir_dest = DK_ROOT.'/photo/advert/';
    $dir_dest1 = DK_ROOT.'/photo/advert/crop/';
    $info = array();
    $files = array();
    $max_size = DK_CONFIG_MAX_SIZE_IMG; // Мак. размер файла 1024*50
    $name = $parent.'image';        // Имя большой картинки
   // $smoll_name = 


    foreach ($filess as $k => $l) {
        foreach ($l as $i => $v) {
            if (!array_key_exists($i, $files))
                $files[$i] = array();
            $files[$i][$k] = $v;
        }
    }
    foreach ($files as $file) {

    $handle = new Upload($file);
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
                $handle->image_y            = 100;
                $handle->image_x            = 100;

    $handle->Process($dir_dest1);// обрезаем превью

    
	    if ($handle->processed)
	     {
	         $info[] = $handle->file_dst_name;
	         $handle->Clean();

	    }
	    else
	    {  // one error occured
	       $info[] =  $handle->error;
	       $handle->Clean();

	    }
    }
    return $info;
}

}
    /**
* Метод загрузки изображения
* @param string $img
* @return mixed
*/
   /* public function addProductImg($lang_file_error)
    {

            if($_FILES['file']['error'] === 0)
        {
            $upload = new IRB_Upload_Img($lang_file_error);
            $upload->width  = 1200;
            $upload->height = 1200;

            if($error = $upload -> uploadFile('file', 'photo/'))
               return $error;


            $upload->imageresize(600, 90, 'photo/big/');
            $upload->crop('photo/smoll/');

            $this->img = $upload -> name;

        }
        else
            return NULL;
    }*/






/*public function getPhotoBoard($id)
{
    $rows = '';

    $res = mysqlQuery("SELECT `photo` FROM `".DK_DBPREFIX."photo`
                        WHERE `id_bord` = ".(int)$id);

       while($row = mysqli_fetch_assoc($res))
        {
           $rows[] = $row['photo'];
        }

        return $rows;

}
*/


/**
* Формеруем список категорий
* select <option>
* @param
*/
   public function get_cat_select()
    {

        $query = mysqlQuery("SELECT * FROM ".DK_DBPREFIX. $this->table."_cat ORDER BY id ASC");

        $count = mysqli_num_rows($query);

        $rows = '';

        while($row = mysqli_fetch_assoc($query))
        {
           $rows .= "<option value='".$row['id'] ."'>". $row['title'] ."</option>";
        }
    return array('rows'=>$rows, 'count'=>$count);
    }


/**
* Формируем список городов
* select <option>
* @param
*/
  public function get_city_select()
    {
        $query = mysqlQuery("SELECT * FROM ".DK_DBPREFIX."city ");
       // $count = mysql_num_rows($query);
        $rows = '';

          while($row = mysqli_fetch_assoc($query))
          {
          $rows .= "<option  value=".$row['id'].">".$row['city']."</option>";
          }
          $this->city_id = $row['id'];

    return $rows;
    }





    public function myUserDesk($id_user)
    {
        $this->res = mysqlQuery("SELECT * FROM ".DK_DBPREFIX. $this->table."
                                 WHERE `id_user` = ".$id_user."
                                 ORDER BY `date` DESC ");

    }

 /**
* Метод представления.
* @param string $template
* @param string $mod
* @param string $link
* @return string
*/
    public function createRows($template, $mod)
    {
		//$page = !empty($pages)? 'page='.$pages : NULL;
        $rows  = '';
        $tpl   = getTpl($template);
        $bb = new IRB_BBdecoder();

        $bbb = new Protect_model();
      //  $author = $this->createAuthor();
      $num   = ($this->num > 1) ? $this->num : 0;
        while($row = mysqli_fetch_assoc($this->res))
        {
            $this->title       = !empty($row['title']) ? htmlChars($row['title']) : '';
            $this->keywords    = !empty($row['m_keywords']) ? htmlChars($row['m_keywords']) : '';
            $this->description = !empty($row['m_description']) ? htmlChars($row['m_description']) : '';
         					// уризаем страку
            $row['title'] = cutStr($row['title'], 40);

            $this->author = $row['id_user'];

           // $this->id = $row['id'];

           $row['text'] = $bbb->bbcode_decode($row['text']);
        // $row['text'] = $bbb->bbcode_encode($row['text']);

           //  $row['filum'] = $_SESSION['filum'] = rand(1000, 10000);
           //   for ($i=0; $i < count($this->getPhotoBoard($row['id'])) ; $i++) {
                # code...
               //  $row['photo'] = $this->getPhotoBoard($row['id']);
           //   }
            $row['img'] = DK_HOST.'photo/tmp/'.$row['img'];

            if($this->clear)
                $row['text'] = $bb -> stripBBtags($row['text']);
            else
                $row['text'] = $bb -> createBBtags($row['text']);
//$html = bbcode_to_html($row['text']);

            // Добавим в сессию и скрытое поле рандомное число

           // $row['link']  = $link;
            //$num          = ($this->num > 1) ? $this->num : 0;
            $link_name    = ($mod == 'advert') ? translateWord($row['title']) : 0;
            $row['url']   = href('page=board','mod='. $mod, 'parent='. $row['id_adv'], 'id='. $link_name, 'num='. $num);
            $rows .= parseTpl($tpl, $row);
        }

        return $rows;
    }





    
        function upFilesImg()
    {	
    	$file = $_FILES['userfile']['name'];
    	$path = DK_CONFIG_UPLOAD_PATH;
    	$max_size = DK_CONFIG_MAX_SIZE_IMG;
    	$ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file)); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
        

       // print_r($max_size);


        if($_FILES['userfile']['size'] > $max_size)
        {
        	$res = array("answer" => "Максимальный размер файла ".$max_size." Мб!");
        	exit(json_encode($res));
        }
        if($_FILES['userfile']['error'])
        {
        	$res = array("answer" => "Ошибка загруски, возможно фаил слишком большой ".$max_size);
        	exit(json_encode($res));
        }
        else
        	$res = array("answer" => "OK");
        	exit(json_encode($res));
    }

}
