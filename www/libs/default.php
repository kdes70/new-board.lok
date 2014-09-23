<?php

/**
* Библиотека общих функций
* @author IT studio IRBIS-team
* @copyright © 2011 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* Generation of page of an error at access out of system
* Генерация страницы ошибки при доступе вне системы
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");
       exit(file_get_contents('../404.html'));
    }






function checkValue($value)
    {
      if(preg_match("/[a-zA-Z]/",$value,$array))
      {
         $date_error = date("Y-m-d G:i:s");
         $ip_error = $_SERVER['REMOTE_ADDR'];
         $type_error = "Попытка ввода подозрительной переменной в переменную ".$value." в пользовательском блоке";
         $text_error = htmlspecialchars($value);
         unset($value);
         $result = mysqlQuery("INSERT INTO ".DK_DBPREFIX."error
                                (date_error,ip_error,type_error,text_error)
                                VALUES ('$date_error','$ip_error','$type_error','$text_error')"
                                );
         echo "<html><head><meta http-equiv='Refresh' content='0, URL=index.php'></head></html>";
      }
   }


/**   
* Функция формирования GET-параметров  
*/   
    function href()   
    {   
        global $GET;     // Объявляем массив $GET, сформированный ранее, глобальным 
        $tmp = $GET;     //Переписываем переменную, что бы не влиять на глобальный массив 
        $href = '';  
        $host = DK_HOST;  
        // Получаем массив аргументов переданных в функцию  href(тут_вот)
        $arg = func_get_args();  
        // Задел на будущее - ссылки для админки
        if(defined('KD_ADMIN'))              
            $host .= '/admin'; 
        // Ссылка на корень сайта 
        if($arg[0] == 'host')  
            return DK_HOST; 
        // Если аргумент - массив, берем первый элемент.    
        if(is_array($arg[0]))  
            $arg = $arg[0];            
        // Перебираем полученные аргументы
        foreach($arg as $var)       
        {   
            $param = explode('=', $var); // Разделяем имя переменной и значение (page=gallery, например)   
            // Если в массиве $GET ($tmp) есть ключ, полученный выше (в данном случае 'page')   
            if(array_key_exists($param[0], $tmp))   
                $tmp[$param[0]] = $param[1]; // То этому ключу присваиваем полученное значение    
             else   // Иначе выдаем ошибку, что такая переменная не зарегистрирована
                 die('The variable <b>'. $param[0] .'</b> is not defined');     
        }   
        // обрезаем те параметры, которые не передавались в аргумент    
        $cnt = array_flip(array_keys($tmp));
        $tmp = array_slice($tmp, 0, $cnt[$param[0]] + 1);  
        // Теперь поочередно вставляем значения из $GET ($tmp) в ссылку
        foreach($tmp as $var => $val)    
            if(DK_REWRITE === 'on')    
              $href .= '/'. $val; // Если реврайт включен, через слэш
            elseif(!empty($val))   
              $href .= '&'. $var .'='. $val;  // Если нет - обычные GET параметры 
        // Обрезаем пустоту скраю, чтобы было красивее
        if(DK_REWRITE === 'on')   
            return $host . hrefTrim($href); // Обычная функция trim() не подходит, пользуем свою 
        else   
            return $host .'?'. trim($href, '&');          
    }
/**   
* Адаптированный аналог функции trim() 
*/   
    function hrefTrim($link)
    {
        return preg_replace('#(/0)+$#', '',  $link);
    } 
    
/**
* Автозагрузка классов      
*/      
    function __autoload($classname)
    {
        global $INCLUDE_PATCH;
        
        foreach ($INCLUDE_PATCH as $include_path)
        {
            $files[] = DK_ROOT .'/'. str_replace(array('_', "\0"),
                                                  array('/', ''), 
                                                  $classname).'.php';
            $files[] = DK_ROOT .'/'. $include_path .'/'. strtolower($classname) .'.php';
            $files[] = DK_ROOT .'/'. $include_path .'/'. strtolower($classname) .'.class.php';
            
            foreach($files as $file)
            {
                if(file_exists($file))
                {
                    include_once $file;
                    break 2;
                }
            }
        }
    }

 /**
 * Умная обрезка строки
 * @param string $str - исходная строка
 * @param int $lenght - желаемая длина результирующей строки
 * @param string $end - завершение длинной строки
 * @param string $charset - кодировка
 * @param string $token - символ усечения
 * @return string - обрезанная строка
 */
function cutStr($str, $lenght = 100, $end = '&nbsp;&hellip;', $charset = 'UTF-8', $token = '~') {
    $str = strip_tags($str);
    if (mb_strlen($str, $charset) >= $lenght) {
        $wrap = wordwrap($str, $lenght, $token);
        $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, $token, 0, $charset), $charset);
        return $str_cut .= $end;
    } else {
        return $str;
    }
}


/**
* Функция перенаправления
*/
    function reDirect()
    {
        $arguments = func_get_args();

        if(count($arguments))
            header('location: '. href($arguments));
        else
            header('location: '. str_replace("/index.php", "", $_SERVER['HTTP_REFERER']));

        exit();

    }

/**
* Вывод информации
*/
    function getInfo($info)
    {
        if(count($info))
           // echo count($info);
            return ' ' . implode('<br>', $info);
        else
            return '&nbsp;';
    }


/**
* Возврат чекбоксов
* @param $id integr
* @param $return integr
* @return string
*/
    function returnCheck($id, $return)
    {
       return ($id == $return) ? 'checked="checked"' : NULL;
    }

/**
* Возврат селектов
* @param $id integr
* @param $return integr
* @return string
*/
    function returnSelect($id, $return)
    {
       return ($id == $return) ? 'selected="selected"' : NULL;
    }

 /**
* Функция генерации случайной строки
* @param $len integr
* return string
*/
    function randStr($len = 10)
    {
        $arr = array_merge(range('#', '&'), range(0, 9), range('a', 'z'));
        shuffle($arr);
        return implode('', array_slice($arr, 0, $len));
    }

/**
* Функция беззнакового представления числа
* @param $number integr
* return integr
*/
    function unsignet($number)
    {
        return ($number > 0) ? $number : 0;
    }

/**
* Функция очистки массивов от пустых значений
* @param $number integr
* return bool
*/
    function emptyfilter($val)
    {
        return (bool)$val;
    }

/**
 * Преобразорвание результата работы функции выборки в ассоциативный массив
 *
 * @param recordset $rs набор строк - результат работы SELECT
 * @return array
 */
    function createResArray($res)
    {
        if(!$res) return FALSE;

        $arrayRes = array();
        while ( $row = mysqli_fetch_assoc($res))
        {
            $arrayRes[] = $row;
        }
         return $arrayRes;
    }


    /**
    * Проверка корректности электронного адреса
    * @param string  $email
    * @access private
    * @return string or boolean
    */
       function checkEmails($email)
       {
           if (function_exists('filter_var'))
               return filter_var($email, FILTER_VALIDATE_EMAIL);
           else
               return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $email);
       }
