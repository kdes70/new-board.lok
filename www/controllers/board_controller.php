<?php

/**
* @author B)DIMON
* @copyright 2013
*
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
/////////////////////////////////////////////////////////

    //$board = new Board_Model('bord', $GET['num'], $GET['id_city']);
$adv = new Board_Model('advert', $GET['num'], $GET['city'], $city_id);

/**-----------------------------------------------------------------------
 *                Вывод параметров
 =========================================================================*/
// Список категорий
    $cat_s = new Categories_Model('category');
    $cat_select = $cat_s->getCategory();

// Список городов
    $citys_select = array();

// Список типа объявления
   $type_select = $adv->createAdvType();




    switch ($GET['mod'])
    {
        case 'add_advert':
            include DK_ROOT . TEMPLATE .'tpl/board/unknown.tpl';
            break;

        case 'add_advert_free': // Добавления нового объявления FREE



// Запись нового обьявления по нажатию на кнопку
   if($ok)
   {
       // Если пользователь залогинен берем его ID
    if(isset($_SESSION['userdata']))
    {
        $id_user = $_SESSION['userdata']['id_user'];
    } //Если не авторизован
    else
    {   // Или если не залогинен но есть кука
        if(!isset($_SESSION['userdata']) && isset($_COOKIE['guest']))
        {   // Достаем ID гостя из БД по куке
            $id_user = Look::getGuestHash($_COOKIE['guest']);
        }
        if(!$id_user)
        {
           // Если нет ID то записываем как нового гостя и создаем ему куку
            $id_user = Look::insertNewGuest($POST['value8']);
        }
    }
    if(isset($POST['array1']))
    {
    	 $POST['array1'] = array_filter($POST['array1']);
         $img = implode("|", $POST['array1']);
       
    }
    
    if($id_user)
    {
         //Отпровляем данные в базу
                 if($adv->addAdvert($POST['value1'], //title,
                                     $POST['value2'], //category,
                                     $POST['value3'], //city,
                                     $POST['value4'], //text,
                                     $POST['value5'], //price,
                                     $POST['value6'], //type,
                                     $POST['value7'], //phone
                                     $POST['value8'], //email
                                     $id_user,         //author,
                                     $img
                                     )
                     )
                      reDirect('page=board') ;

    }



   }

        include DK_ROOT . TEMPLATE .'tpl/board/add_form.tpl';

        break;

     /*   case 'add_advert_vip':

       if(Look::check())
       {

                 $_SESSION['msg'] = "Только зарегистрированый пользователь может добавлять";

        }

        include DK_ROOT . TEMPLATE .'tpl/board/add_form.tpl';


            break;
*/

    case 'read':
        // Вывод VIP
        $adv->createVipPreview();
        $vip_rows = $adv->createRows('board/vip_row', 'advert');
        $page_menu_vip = $adv->menu;
        $adv_count_vip = $adv->count;
        // Вывод FREE
        $adv->createPreview(6);
        $free_rows = $adv->createRows('board/free_row', 'advert');
        $page_menu_free = $adv->menu;
        $adv_count_free = $adv->count;

        include DK_ROOT . TEMPLATE .'tpl/board/show.tpl';

        break;

    case 'category':

        $info[] = $adv->creareCatBoard($GET['parent'], 6, true);
        $vip_rows = $adv->createRows('board/vip_row', 'advert');
        $page_menu = $adv->menu;
        $adv_count = $adv->count;

        $info1[] = $adv->creareCatBoard($GET['parent'], 10);
        $free_rows = $adv->createRows('board/free_row', 'advert');
        $page_menu = $adv->menu;
        $adv_count = $adv->count;

         include DK_ROOT . TEMPLATE .'tpl/board/show.tpl';
        break;

    case 'advert':
$adv->clear = TRUE;
         $info[] = $adv->creareFull($GET['parent']);
        $rows = $adv->createRows('board/full', 'board');
       // print_r($info);

        include DK_ROOT . TEMPLATE .'tpl/board/advert.tpl';
        break;


    case 'test':

		include DK_ROOT . TEMPLATE .'tpl/board/test.tpl';

        break;

    default:
        include DK_ROOT . TEMPLATE .'tpl/board/show.tpl';
        break;
    }


