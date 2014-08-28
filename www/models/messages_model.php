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


	class Messages_Model {
		
		public $author, $user_to, $m_table, $t_dialog, $menu, $online = array();
		private $res, $id_dialog, $num;
		
		
	public function __construct($m_table, $t_dialog, $author, $user_to, $num = 1) {
			
			  $this->m_table = $m_table ;
			  $this->author = $author ;
			  $this->t_dialog = $t_dialog;
			  $this->user_to =$user_to;
			  $this->num = $num;
		}


/**
* Метод записи сообщения и открытия диалога
* @param undefined $user
* @param undefined $text 
*
*/	
	public function checkDialog($text)
	{
	
	//проверяем есть ли диалог с данным пользователем обновляем время 
	//Если нет записываем новый 
	$this->res = mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->t_dialog ."` 
							SET `from_user` = ".(int)$this->author.",
								`to_user`    = ".(int)$this->user_to."  
							ON DUPLICATE KEY UPDATE 
								`date`=NOW()
							");
			//Получаем ID диалога 
		 if(($this->id_dialog = mysqli_insert_id(DB::$link)) > 0)
		 {
		 	 if(empty($text))
            return DK_LANG_NO_TEXT;
		
				 mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->m_table ."`
								SET `id_dialog` = '".(int)$this->id_dialog."',
									`user_id`      = '".(int)$this->author."',
									`message`   = '".escapeString($text)."',
									`date`      = NOW(),
									`from_del`  = '0',
									`to_del`    = '0',
									`view`      = '1'
									
								");
		 }
		
	}
	
	
/**
* 
* @param undefined $user
* @param undefined $text
* 
*/	
	public function isertMessages($text)
	{
        
        if(empty($text))
            return DK_LANG_NO_TEXT;
		
	 mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->m_table ."`
								SET `id_dialog` = '".(int)$this->id_dialog."',
									`user_id`      = '".(int)$this->author."',
									`message`   = '".escapeString($text)."',
									`date`      = NOW(),
									`from_del`  = '0',
									`to_del`    = '0',
									`view`      = '1'
									
								");
	
	}
/**
* Входяшие диалоги
* @param undefined $template
* @param undefined $mod
* 
*/	

	public function myDialogs()
	{
		
        $this->res = mysqlQuery("SELECT a.`to_user` AS `user_id`, b.`login`, c.`avatar`  
                                		FROM `dk_users_dialog`a 
                                	LEFT JOIN `dk_users`b ON (b.`id` =  a.`to_user`)
                                	LEFT JOIN `dk_users_setting`c ON (c.`id_parent` = a.`to_user`)
                                		WHERE a.`from_user` = ".(int)$this->author."
                                UNION
                                SELECT a.`from_user` AS `user_id`, b.`login`, c.`avatar`
                                		FROM `dk_users_dialog`a
                                	LEFT JOIN `dk_users`b ON (b.`id` =  a.`from_user`) 
                                	LEFT JOIN `dk_users_setting`c ON (c.`id_parent` = a.`from_user`) 
                                		WHERE a.`to_user` =".(int)$this->author."

                                GROUP BY user_id
                               ");
                                        
		//выберем id получателя, id диалога и дату где я автор 
   /*$this->res = mysqlQuery("SELECT a.*, b.`id`, b.`login`, c.`avatar`, c.`motto` 
                        FROM `". DK_DBPREFIX . $this->t_dialog ."` a
                        LEFT JOIN `".DK_DBPREFIX."users`b ON (a.`from_user`  = b.`id`)
						LEFT JOIN `".DK_DBPREFIX."users_setting`c ON (c.`id_parent` = b.`id`)
					WHERE a.`to_user` =". (int)$this->author);*/
		
   

	}
	
																							
	//переписать функцию для постраничи
	public function setMessages($num_rows, $list = true)
	{
		$pag = new IRB_Paginator($this->num, $num_rows);
		
	$this->res = $pag -> countQuery("SELECT DISTINCT a.*, b.*, c.`id`, c.`login`, d.`motto`, d.`avatar`
	   		           FROM `". DK_DBPREFIX . $this->t_dialog ."`a
						LEFT JOIN `". DK_DBPREFIX . $this->m_table ."`b ON (b.`id_dialog` = a.`id_dialog`)
						LEFT JOIN `dk_users`c ON (a.`from_user` = c.`id`)
						LEFT JOIN `".DK_DBPREFIX."users_setting`d ON (d.`id_parent` = c.`id`)
							WHERE (a.`from_user` =".(int)$this->author." AND a.`to_user` = ".(int)$this->user_to.") 
							OR ( a.`from_user` = ".(int)$this->user_to." AND  a.`to_user` = ".(int)$this->author.")
							ORDER BY b.`date` DESC");
							
	
		
			/* while($row = mysqli_fetch_assoc($this->res))
        	{
            $this->authors[] = $row['user_id'];
        	}*/
								
						
	 if($list)
	 
            $this->menu = $pag -> createMenu();

    } 
	
	
	
	
	//выбор исходящих диалогов
	
	public function sentDialog()
	{
	$this->res = mysqlQuery("SELECT  a.*, b.`id`, b.`login`, c.`avatar`, c.`motto` FROM `dk_users_dialog`a 
							LEFT JOIN `dk_users`b ON (a.`to_user`  = b.`id`)
							LEFT JOIN `dk_users_setting`c ON (c.`id_parent` = b.`id`)
							WHERE a.`from_user` = ".$this->author."
							ORDER BY a.`date` DESC
							");
		
	}	
	

	
 /**
* Метод представления.
* @param string $template 
* @param string $mod
* @param string $link
* @return string 
*/      
   public function createMessRows($template, $mod)
     {
       // global $POST;
        $rows  = '';    
        $tpl   = getTpl($template);
         $num          = ($this->num > 1) ? $this->num : 0;   
       //  $num   = ($GET['num'] > 1) ? $GET['num'] * DK_CONFIG_NUM_ROWS - DK_CONFIG_NUM_ROWS - 1 : 1;
         
		 $this-> _authorMess();
		 
		 $online = Online::onlineQuery($this->authors);
		 
         while($row = mysqli_fetch_assoc($this->res))
         {  
             
             $row['login'] = htmlspecialchars($row['login']);
           //  $row['email']  = nl2br(htmlspecialchars($row['email']));
           //  $row['num'] = $num++;
             
             $row['ready'] = !empty($POST['array1']);
             
             $row['avatar'] =  !empty($row['avatar']) ? '<img src="'. DK_HOST .'photo/avatars/'
                                       . $row['avatar'] .'" border="0" />' 
                                       : '<img src="'. DK_HOST .'skins/images/net-avatara.jpg" border="0" />';
             
           
              $row['online'] = createOnline($row['user_id'], $online);
          //   $row['comments'] = $this->comments;
            
            // $row['id_parent'] = $this->id_parent;
             
             //$row['count'] = $us_count;
            // $row['link']  = $link;
           //  $activ = ($row['public'] === 1) ? 'checked' :  ''; 
             $num          = ($this->num > 1) ? $this->num : 0;
             $row['url']   = href('mod='. $mod, 'parent='. $row['user_id'],  'num='. $num); 
            // $row['url']   = href('mod='. $mod, 'parent='. $row['id']); 
             $rows .= parseTpl($tpl, $row);   
         }
         
         return $rows;    
     }	
		
		
	private function _authorMess()
	{	
		$authors = array();
		
		$res = mysqlQuery("SELECT user_id FROM dk_users_messages
						   GROUP BY user_id");
		
		
		 while($r = mysqli_fetch_assoc($res))
        {
           // $rows[] = $r;
            $this->authors[] = $r['user_id'];
        }
   // return $row;       
	}
		
		
		
		
	}