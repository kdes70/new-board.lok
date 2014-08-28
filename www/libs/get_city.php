<?php

/**
 * @author B)DIMON
 * @copyright 2013
 */

/**
* Citu
* Функции представления
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
       exit(file_get_contents('./404.html'));
    }

/**
*
*/
class GeoCity extends Geo
{
    protected $region; // указываем ID регеона

    protected $table_city; // Название таблици БД городов

    protected $city; // Текуший город

    protected $city_name_ru; // Поле таблицы с названием городов на русском

    protected $city_name_en; // Поле таблицы с названием городов на english


    public $citys_arr = array();

    public$city_en = array();


    function __construct($region, $table_city, $city)
    {
      // Получаем ip города
    $ip_city = parent::get_ip();
   // echo $ip_city;
        // Определяем данные
    $this->region = $region;
    $this->table_city = $table_city;
    $this->city = $city;
    $this->city_name_ru = "city_name_ru";
    $this->city_name_en = "city_name_en";
// получаем массив городов
    $this->citys_arr = $this->createArrayCitys();

// (Безопасность) если в GET[city] нет города из базы редирект по дефолту
    if(!in_array($this->city, $this->city_en, TRUE))
    {
       reDirect('city=Tomsk');
    }



    }
/**
 *  Метод получения массива городов одного региона
 *
 */
    public function createArrayCitys()
    {
        $arr = '';

        $res = mysqlQuery("SELECT `id`, `city_name_ru`, `city_name_en`
                            FROM `".DK_DBPREFIX.$this->table_city."`
                            WHERE `id_region` =".$this->region."
                            ORDER BY `city_name_ru`");

        while ($row = mysqli_fetch_assoc($res))
        {
            $arr[] = $row;
            $this->city_en[] = $row[$this->city_name_en];
        }
    return $arr;

    }
}


/*function getCity($id)
{
    $res = mysqlQuery("SELECT `city` FROM ".DK_DBPREFIX."city
                        WHERE `id`=".(int)$id);
     $city = mysqli_fetch_array($res);
     if($city)
     return $city['city'];
     else
     return null;
}

function selectCitys($region)
{
    $res = mysqlQuery("SELECT * FROM `".DK_DBPREFIX."city`
                        WHERE `id_region` =".$region."
                        ORDER BY `city_name_ru`");
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    return$rows;
}



function postCity()
    {

        $query = mysqlQuery("SELECT * FROM ".DK_DBPREFIX."city ");

        $rows = '';

        while($row = mysqli_fetch_array($query))
        {

           $rows .= "<li><a href=\""
                 . href('city='.$row['url'].'','id_city='.(int)$row['id'], 'page=board', 'mod=read' )
                 . "\">".$row['city']."</a></li>\n";


        }


        return $rows;
    }

 //$city_select = postCity();*/

 $logo_city = $GET['city'];
?>
