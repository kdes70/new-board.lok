<?php

/**
* View
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
* Функция формирования массива для мета-тегов
*/
    function createDinamicMeta($title = '', $keywords = '', $description = '')
    {
        global $META;

        if(!empty($title) || !empty($keywords) || !empty($description))
        {
            $META = array(
                            'title'       => $title,
                            'keywords'    => $keywords,
                            'description' => $description,
                         );
        }
        else
            $META = NULL;
    }


/**
* Функция формирования мета-тегов
*/
    function getMeta($tag = '', $page = '')
    {
        global $META;
        static $meta;

        if(!empty($META))
        {
            return $META[$tag];
        }
        elseif(empty($meta) && file_exists(DK_ROOT .'/setup/meta.txt'))
            $meta = unserialize(file_get_contents (DK_ROOT .'/setup/meta.txt'));

        if(empty($tag))
            return !empty($meta) ? $meta : array();

        if(!empty($meta[$page][$tag]))
            return htmlspecialchars($meta[$page][$tag]);
        else
            return NULL;

    }

/**
* Функция чтения шаблонов
*/
    function getTpl($tpl)
    {
        if(file_exists(TEMPLATE.'/'. $tpl .'.tpl'))
            return file_get_contents(TEMPLATE.'/'. $tpl .'.tpl');
        else
            die('The template <b>'. $tpl .'.tpl</b> is absent in the specification');
    }

/**
* Функция разбора шаблона
*/
    function parseTpl($cont, $data = '')
    {
        if(is_array($data))
        {

            extract($data, EXTR_PREFIX_ALL, 'tpl');

            ob_start();
                eval('?>'. $cont .'<?php ');
                $cont = ob_get_contents();
            ob_end_clean();
        }
       return $cont;
    }

/**
* Функция обработки переменных для вывода в поток
*/
    function htmlChars($data)
    {
        if(is_array($data))
            $data = array_map("htmlChars", $data);
        else
            $data = htmlspecialchars($data);

        return $data;
    }

/**
* Функция транслитерации ссылок.
* @param string $string
* @return string
*/
    function translateWord($string, $rus = FALSE)
    {
        $string = preg_replace('#[^0-9a-zа-яё\s_-]#ui', '', $string);

        $ru = array(
                        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё',
                        'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М',
                        'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
                        'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы',
                        'Ъ', 'Ь', 'Э', 'Ю', 'Я',
                        'а', 'б', 'в', 'г', 'д', 'е', 'ё',
                        'ж', 'з', 'и', 'й', 'к', 'л', 'м',
                        'н', 'о', 'п', 'р', 'с', 'т', 'у',
                        'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ы',
                        'ъ', 'ь', 'э', 'ю', 'я', ' '
                    );

        $en = array(
                        "A",  "B",  "V",  "G",  "D",  "E",   "E",
                        "ZH", "Z",  "I",  "J",  "K",  "L",   "M",
                        "N",  "O",  "P",  "R",  "S",  "T",   "U",
                        "F" , "X" , "CZ", "CH", "SH", "SHH", "Y",
                        "",   "",   "E", "YU", "YA",
                        "a",  "b",  "v",  "g",  "d",  "e",   "e",
                        "zh", "z",  "i",  "j",  "k",  "l",   "m",
                        "n",  "o",  "p",  "r",  "s",  "t",   "u",
                        "f" , "x" , "cz", "ch", "sh", "shh", "y",
                        "",    "",  "e", "yu", "ya", "-"
                    );

         $string = str_replace($ru, $en, $string);

        if($rus)
        {
            $string = str_replace($en, $ru, $string);
        }


        return  strtolower($string);
    }


 function mb_ucfirst ($word)
{
return mb_strtoupper(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(mb_convert_case($word, MB_CASE_LOWER, 'UTF-8'), 1, mb_strlen($word), 'UTF-8');
}


/**
* Функция разрешения индексации
*/
    function solveIndex($content, $index = false)
    {
        if($index)
             $content = "\n<div class=\"target\">\n". $content;

        if($index)
            $content .= "\n</div>\n";

        return $content;
    }


/**
* Функция формирования аватара
* @access private
* @param int $id_autor
* @param array $avatars
* @return string
*/
    function createAvatar($id_autor, $avatars)
    {
        return empty($avatars[$id_autor]) ? DK_HOST .'/skins/images/no_avatar.png'
                                          : DK_HOST .'/photo/avatars/'. $avatars[$id_autor];
    }


    /**
* Функция формирования online
* @access private
* @param int $id_autor
* @param array $online
* @return string
*/
    function createOnline($id_autor, $online)
    {
        return empty($online[$id_autor]) ? '<p style="color: #AD2503">offline</p>'
                                          : '<img src="'.DK_HOST.'/skins/images/online2.gif" alt="" />';
    }


    //Распечатка массива
    function print_arr($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function showDate($date) // $date --> время в формате Unix time
    {
        $stf = 0;
        $cur_time = time();
        $diff = $cur_time - $date;
     
        $seconds = array('секунда', 'секунды', 'секунд');
        $minutes = array('минута', 'минуты', 'минут');
        $hours = array('час', 'часа', 'часов');
        $days = array('день', 'дня', 'дней');
        $weeks = array('неделя', 'недели', 'недель');
        $months = array('месяц', 'месяца', 'месяцев');
        $years = array('год', 'года', 'лет');
        $decades = array('десятилетие', 'десятилетия', 'десятилетий');
     
        $phrase = array($seconds, $minutes, $hours, $days, $weeks, $months, $years, $decades);
        $length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
     
        for ($i = sizeof($length) - 1; ($i >= 0) && (($no = $diff / $length[$i]) <= 1); $i--) ;
        if ($i < 0) $i = 0;
        $_time = $cur_time - ($diff % $length[$i]);
        $no = floor($no);
        $value = sprintf("%d %s ", $no, getPhrase($no, $phrase[$i]));
     
        if (($stf == 1) && ($i >= 1) && (($cur_time - $_time) > 0)) $value .= time_ago($_time);
     
        return $value . ' назад';
    }
    function getPhrase($number, $titles)
    {
        $cases = array (2, 0, 1, 1, 1, 2);
        return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
    }

    function showexpireflag($date) // $date --> время в формате Unix time
    {
        $stf = 0;
        $cur_time = time();
        $diff = $cur_time - $date;
        $days = $diff / (60*60*24); 
        return $days;
    }
    Источник: http://n-wp.ru/12579



