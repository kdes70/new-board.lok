<?php

/** 
 * DK_Cache - клас файлового кэширования 
 * NOTE: Requires PHP version 5 or later  
 * Info: http://irbis-team.ru   
 * @author IT studio IRBIS-team 
 * @copyright © 2012 IRBIS-team 
 * @version 0.1 
 * @license http://www.opensource.org/licenses/rpl1.5.txt 
 */  
    
class DK_Cache
{   
 
    static $cache = DK_CONFIG_CACHE;
/**
* Метод записи в кэш
* @param string $key
* @param string $value
* @param string $time
* @return bool
*/
    static function setCached($key, $value, $time = 0)
    {
        if(!self::$cache)
            return false; 
            
        if(is_array($value))
        {
            $value = serialize($value);
            $type  = 'array';
        }
        else
            $type = 'string';
     
        $time = !empty($time) ? $time + time() : 0;    
     
        $mark = "--". $type .';'. $time ."--";
     
        return file_put_contents(DK_ROOT .'/cache/'. md5($key) .'.ich', $mark . $value);
    }    
    
/**
* Метод получения кэша
* @param string $key
* @return mixed
*/      
    static function getCached($key)
    {
        if(!self::$cache)
            return false;    
     
        $result = @file_get_contents(DK_ROOT .'/cache/'. md5($key) .'.ich');
        
        if($result === false)
            return false;
     
        preg_match('#^--(.+?);(.+?)--(.*)#uis', $result, $out);
     
        if($out[2] > 0 && time() > $out[2])
            return !self::delete($key);
      
        return ($out[1] == 'array') ? unserialize($out[3]) : $out[3];
    }

/**
* Метод очистки кэша
* @param string $key
* @return bool
*/ 
    static function delete($key)     
    {          
        return @unlink(DK_ROOT .'/cache/'. md5($key) .'.ich'); 
    }    
}  

