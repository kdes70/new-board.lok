<?php

/**
 * @author Dimon
 * @copyright 2012
 * @email 
 * NEWbord
 */



    
    class Online
    {
        public $online;
        private $res;
       // $this->user = empty($_SESSION['userdata']['id'])? 0 :$_SESSION['userdata']['id']; 
        
       /* public function __construct($table)
        {
            $this->table = $table;
           // $this->id_user = $id_user;
			//$this->id_session = $id_session;
        }
		*/
		
		
		
		/**
* ����� ������� � �� MySQL online 
* @access private
* @return array
 */    
    public static function onlineQuery($users)
    {
        $online = array();
     
        $res = mysqlQuery("SELECT `id_user` FROM `". DK_DBPREFIX ."online`");
        
           while($row = mysqli_fetch_assoc($res))
        {   
            $online[$row['id_user']] = $users;           
        }
            
        return $online; 
    }              
        
/**
* Записи времени всех входяших и удаление через минуту
* @param int $id_user
*/ 
        public static function insertOnline($id_session, $user = '')
        {    
            if(isset($_SESSION['userdata']['id']))
            {
                $user = $_SESSION['userdata']['id'];
            }
            else
                $user = 0;
            
             mysqlQuery("INSERT INTO `". DK_DBPREFIX ."online` 
                    SET `id_session` = '".$id_session."',
						`time`       = NOW(),
						`id_user`    = '".(int)$user."'
                    ON DUPLICATE KEY UPDATE
                    `time`        = NOW() "
                    	
                  );

          mysqlQuery("DELETE FROM `". DK_DBPREFIX ."online` 
                      WHERE `time` < NOW() - INTERVAL '3' MINUTE "
                  );
                    
        }
        
        
 
/**
*  Количество юзеров онлайн
*/ 
    public function countOnline()
    {
       $count = mysqlQuery("SELECT COUNT(*) AS count FROM `". DK_DBPREFIX .$this->table."` ");
       
       $count_online = mysql_result($count,0);
        
        return $count_online;
    }      
        
        
     public function onlineUsers()
     {  
        $online = array();
        
        $this->res = mysqlQuery("SELECT * FROM `". DK_DBPREFIX .$this->table."` WHERE `id_user`= ".$this->id_user." ");
                    
                    if(mysqli_num_rows($this->res) > 0)
                    {
                    while($row = mysqli_fetch_assoc($this->res))
                        {   
                            $online[$row['id_user']] = $this->id_user;           
                        }
                        
                        return $online;
                    }
                    else 
                    return NULL;
                    
     }   
        
 

 
         
 
}
