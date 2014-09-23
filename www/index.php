<?php

/**
* The main router
* Главный маршрутизатор (роутер)
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////


/**
* Устанавливаем кодировку и уровень ошибок
*/
    header("Content-Type: text/html; charset=utf-8");
  // error_reporting(E_ALL);
	error_reporting (E_ALL & ~E_NOTICE);
    session_start();
    ob_start();

  $start = microtime(true);


/**
* Debug
* Дебаггер
* @TODO To clean in release
*/
    define('DK_TRACE', true);
    include './debug.php';

/**
* Устанавливаем ключ-константу
*/
    define('DK_KEY', true);

/**
* Подключаем файлы ядра
*/
	// Фаилы ядра
    include './config.php';
    include DK_ROOT .'/variables.php';
    include DK_ROOT .'/language/ru.php';
    // Потключение БД MYSQL
    include DK_ROOT .'/libs/mysql.php';
    include DK_ROOT .'/libs/default.php';
    include DK_ROOT .'/libs/view.php';
    // Geo-location
    include DK_ROOT .'/libs/get_city.php';
    // Конвертация BBcoda
    include DK_ROOT .'/libs/Protect_model.php';
     

      


	//include DK_ROOT .'/libs/online.php';
   // include DK_ROOT .'/libs/img_UploadMass.php';
//    include DK_ROOT .'/libs/class.upload.php';

 //Авторизация
    if($autch)
    {
      include DK_ROOT .'/components/registration/router.php';

      if(isset($_SESSION['userdata']['id_user']))
      {
          //Если авторизация прошла успешно
          exit();
      }else{
          //Или если не удачно
          exit();
      }
    }

// echo $city;
$region = 1672;//Томская область 

 //$citys_arr = selectCitys($region);//

//print_arr($_SESSION);

 $myCity = new GeoCity($region, "city", $GET['city']);
 //$myCity->createArrayCitys();

 $citys_arr = $myCity->citys_arr;

 $city_id = $myCity->getIdcity($GET['city']);
 //$b = GeoCity :: getIdcity($GET['city'], $citys_arr);

 //print_arr($citys_arr); 


/**
* Если есть кука hash и пользователь незалогинен,
* получаем учетные данные и прописываем их в сессию
*/
    if(!empty($_COOKIE['hash']) && empty($_SESSION['userdata']))
      {
          if(($userdata = look::autologin($_COOKIE['hash'])) !== false)
              $_SESSION['userdata'] = $userdata;
      }

  //Получаем ID сессии

	//Online::insertOnline(session_id());

/**
* Переключатель страниц
*/
    switch($GET['page'])
    {

    case 'registration' :
      include DK_ROOT .'/controllers/left_sitebar_controller.php';
        include DK_ROOT .'/components/registration/router.php';
     
 

    break;

		case 'users' :

			include DK_ROOT .'/controllers/left_sitebar_controller.php';
            include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/users_controller.php';

        break;

        case 'profile' :

			include DK_ROOT .'/controllers/left_sitebar_controller.php';
         //   include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/profile_controller.php';

        break;


        case 'board' :
        
             include DK_ROOT .'/controllers/left_sitebar_controller.php';
         //   include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/board_controller.php';

        break;
        // Страница добавления нового обьявлния
        /* case 'add_advert' :
            include DK_ROOT .'/controllers/left_sitebar_controller.php';
            include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/add_advert_controller.php';

        break;*/

        case 'test' :

            include DK_ROOT .'/controllers/left_sitebar_controller.php';
            include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/test_controller.php';

        break;

        case 'news' :

            include DK_ROOT .'/controllers/left_sitebar_controller.php';
            //include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/news_controller.php';

        break;

        case 'blog' :
            include DK_ROOT .'/controllers/left_sitebar_controller.php';
         //   include DK_ROOT .'/controllers/right_bar_controller.php';
             include DK_ROOT .'/controllers/blog_controller.php';

        break;

        case 'production' :

            include DK_ROOT .'/controllers/left_sitebar_controller.php';
            include DK_ROOT .'/controllers/right_bar_controller.php';
             include DK_ROOT .'/controllers/production_controller.php';
        break;

        case 'guest' :

            include DK_ROOT .'/controllers/right_bar_controller.php';
             include DK_ROOT .'/controllers/guest_controller.php';
        break;

        case 'contacts' :

            include DK_ROOT .'/controllers/contacts_controller.php';
        break;

        case 'ban' :
            include DK_ROOT .'/skins/tpl/ban.tpl';
        break;

		case 'bbb' :
            include DK_ROOT .'/bbb.php';
        break;

        default :
           include DK_ROOT .'/controllers/left_sitebar_controller.php';
         //   include DK_ROOT .'/controllers/right_bar_controller.php';
            include DK_ROOT .'/controllers/board_controller.php';
        break;
    }

   $title       = getMeta('title', $GET['page']);
   $keywords    = getMeta('keywords', $GET['page']);
   $description = getMeta('description', $GET['page']);





//$title_city = getCity($GET['id_city']);
// Заканчиваем буферизацию и помещаем вывод в переменную $content
   $content = ob_get_clean();


/**
* Подключаем главный шаблон
*/
    include TEMPLATE . 'index.tpl';








echo '<br /><br /><br />';
echo 'Время генерации страницы: '. sprintf("%01.4f", microtime(true) - $start) .'<br />';
echo 'Количество подключённых файлов: '. count(get_included_files()) .'<br />';
echo 'Количество запросов: '. DB::$count .'<br />';

