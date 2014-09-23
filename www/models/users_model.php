<?php

/**
 * Клас пользователей
 * @author Dimon
 * @copyright 2012
 * @email 
 * NEWbord
 */

     class Users_Model
    {
        public $table, $menu, $id_user, $count_user, $avatar;
        private $res, $num;
        
    
    public function __construct()
    {
        $this->table = 'users';
        $this->num = $GET['num'];
        //$this->id_user =(int) $id_user; 
        
    }
    
/**
* Метод выборки АВАТАРА 
* 
*/  
    public function getAvatar()
    {
        $res = mysqlQuery("SELECT `avatar` FROM `".DK_DBPREFIX. $this->table."_setting`
                            WHERE `id_parent` = ". $this->id_user);
                            
           $row = mysqli_fetch_assoc($res);
            
          // $this->avatar = $row['avatar'];
           
           $this->avatar = !empty($row['avatar']) ? '<img src="'. DK_HOST .'photo/avatars/'
                                       . $row['avatar'] .'" width="50" border="0" />' 
                                       : '<img src="'. DK_HOST .'skins/images/net-avatara.jpg" width="50" border="0" />';
            
        return $this->avatar;
    }



/**
 * Выводим всех пользователей
 * @param int $num_rows количество строк в IRB_Pagenator
 * @return array 
 * 
 */
    public function usersAll($num_rows)
    {   
       // $pag = new IRB_Paginator($this->num, $num_rows);
        
        $this->res = mysqlQuery("SELECT *
									FROM `".DK_DBPREFIX. $this->table."_setting` 
	                                JOIN `".DK_DBPREFIX. $this->table."`                                   
	                                ON `".DK_DBPREFIX. $this->table."_setting`.`id_parent`=`".DK_DBPREFIX. $this->table."`.`id` 
	                              "
								  );
										                  
       	//$this->count_user = $pag -> TableCount;
                    
       // $this->menu = $pag -> createMenu();
      
    }

/**
* Метод вызова порльзователя по ID с данными
* @param int $id user
* @return array user_seting
*/
     public function createUser($id_user)
     {
        $res = mysqlQuery("SELECT `id_user`, `login`, `email`, `phone`, `city` FROM `".DK_DBPREFIX. $this->table."`
        						WHERE `id_user`= ".$id_user
								);
        return$res;
          //  $this->res[] = mysqli_fetch_assoc($res);
     }
 
/**
*  Метод универсальной выборки для users(Выбрать все по id_user)
* @param string $relation таблица
*/    
     public function SampleUsers($relation, $where)
     {
        $this->res = mysqlQuery("SELECT * FROM ".DK_DBPREFIX. $relation."
                                WHERE ".$where." =".(int)$this->id_user);
								
		
     }
/**
* Метод воборки логина
*/
    public function getUser($to_id)
    {
        $res = mysqlQuery("SELECT login FROM `".DK_DBPREFIX. $this->table."`
                            WHERE `id` = ". $to_id);
        $login = mysqli_fetch_assoc($res);
        
        $login = $login['login'];
        
        return $login;
    }
        
  /**
* Вывод пользователя по ID 
*/
 public function userGet($id)
    {
        $qve = mysqlQuery("SELECT id_user FROM ".DK_DBPREFIX."bord
                            WHERE `id` = ".(int)$id);
        if(mysql_num_rows($qve)>0)
        {   
            $id_user = mysql_result($qve, 0); 
            
          return $id_user;  
        }
        else 
            return NULL;
     
    }

    public function createEdit($id_user)
    {
    	$this->createFull($id_user);
    	 return htmlChars($this->res[0]);
    }

    public function getMyBoard($id_user)
    {
    	$adv = new Board_Model('advert', $GET['num'], $GET['city']);

    	$this->res = $adv->myUserDesk($id_user);

    	return $this->res;
    }

         
      /**
* Метод представления.
* @param string $template 
* @param string $mod
* @param string $link
* @return string 
*/      
    public function createUsersRows($template, $mod)
     {
        global $POST;
        $rows  = '';    
        $tpl   = getTpl($template);
        $num   = ($this->num > 1) ? $this->num : 1;   
        // $num   = ($GET['num'] > 1) ? $GET['num'] * DK_CONFIG_NUM_ROWS - DK_CONFIG_NUM_ROWS - 1 : 1;
    //   $online = Online::onlineQuery($this->id_user);
        
         
         while($row = mysqli_fetch_assoc($this->res))
         {  
             
         //   $row['login'] = htmlspecialchars($row['login']);
            
            $row['email']  = nl2br(htmlspecialchars($row['email']));
            
            $row['num'] = $num++;
             
            $row['ready'] = !empty($POST['array1']);
             
             $row['avatar'] =  !empty($row['avatar']) ? '<img src="'. DK_HOST .'photo/avatars/'
                                       . $row['avatar'] .'" width="50" border="0" />' 
                                       : '<img src="'. DK_HOST .'skins/images/net-avatara.jpg" width="50" border="0" />';
             $this->avatar = $row['avatar'];

             $row['login'] = !empty($row['login'])?htmlspecialchars($row['login']):'Гость';
         //    $row['online'] = createOnline($row['id'], $online);   
             
        //     $row['comments'] = $this->comments;
            
          //   $row['id_parent'] = $this->id_parent;
             
             //$row['count'] = $us_count;
            // $row['link']  = $link;
           //  $activ = ($row['public'] === 1) ? 'checked' :  ''; 
            // $num = ($this->num > 1) ? $this->num : 0;
            // $row['url']   = href('mod='. $mod, 'parent='. $row['id'],  'num='. $num); 
             $row['url']   = href('page=users', 'mod='. $mod, 'parent='. $row['id']); 
             $rows .= parseTpl($tpl, $row);   
         }
         
         return $rows;    
     }
	 
		

        
        
    
     
       
    }   
        
      

?>