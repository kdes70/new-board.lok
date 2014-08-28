<?php

/**
* ������
* @author IT studio IRBIS-team
* @copyright � 2012 IRBIS-team
*/
/////////////////////////////////////////////////////////

/**
* ��������� �������� ������ ��� ������� ��� �������
*/
    if(!defined('DK_KEY'))
    {
       header("HTTP/1.1 404 Not Found");     
       exit(file_get_contents('../404.html'));
    }
/////////////////////////////////////////////////////////
    
class Comment_Model
{
    public $table, $id_topic, $parent_table;  
   // �������������� ����� �������� (�������� ������� � ����������).
   
    public $user_table = 'users_setting';
	
   // � ��� ���� ���������, ��� ����, ��� �� �������� �������.
    private $autors  = array(), $online = array();
    
   
/**
* �����������
* @access public
* @param string $table 
* @param int $id_topic
* @param string $parent_table 
* @param string $user_table 
*/   
    public function __construct($table, $id_topic, $parent_table = '')
    {
        $this->table        = $table;
        $this->id_topic     = $id_topic;
        $this->parent_table = $parent_table;
    }
    
/**
* ����� ���������� ������ �����������
* @access public
* @param string $text
* @param int $id_parent
* @param int $id_autor
* @param string $autor
* @return bool
*/         
    public function addComment($text, $id_parent, $id_autor, $autor)
    { 
        $text = trim($text);
        
        if(empty($text))
            return false;
        
        mysqlQuery("INSERT INTO `". DK_DBPREFIX . $this->table ."`
                    SET 
                        `date`      = NOW(),
                        `id_topic`  = ".(int)$this->id_topic .",
                        `id_parent` = ".(int)$id_parent .",                    
                        `id_autor`  = ".(int)$id_autor .",
                        `autor`     ='". escapeString($autor) ."',
                        `text`      ='". escapeString($text) ."'"
                 ); 
     
        if(mysqli_affected_rows() > 0)
        { 
            mysqlQuery("UPDATE `". DK_DBPREFIX . $this->parent_table ."`
                         SET `cnt_comment` = `cnt_comment` + 1
                         WHERE `id`  = ".(int)$this->id_topic
                         );
        }
        else
            return false;
     
        return (mysqli_affected_rows() > 0);
    } 

/**
* ����� ������������ ������
* @access public 
* @param string $tpl 
* @return string
*/ 
    public function createComment($tpl)
    {
        $i = 0;
        $view    = '';
        $cont    = getTpl($tpl);
        $bb      = new IRB_BBdecoder;
        $rows    = $this->_getQuery();
        // �������� ������ ���������� ��������
        $avatars = $this->_getAvatars();
		
		$online = Online::onlineQuery($this->autors);
       
        if(!empty($rows))
        {
            foreach($rows as $data)
            {   
                $data['autor']  = htmlChars($data['autor']);               
                $data['text']   = $bb -> createBBtags($data['text']);
            // ��������� �������� (������� createAvatar() ���� � ����� view.php �� ���������)
                $data['avatar']    = createAvatar($data['id_autor'], $avatars);
               
                
               $data['online'] = createOnline($data['id_autor'], $online);
               // $data['online'] = createOnline($data['id_autor'],$online);
                
                $arr[$i]['id']        = $data['id'];
                $arr[$i]['id_parent'] = $data['id_parent'];
                $arr[$i]['rows']      = parseTpl($cont, $data);
                
                ++$i; 
            }
            
            $tree = new IRB_Tree($arr); 
            $view = $tree -> createTree();        
        }
     
        return $view;
    }
	
	
	/*public function newMessetch()
	{
	$this->res = mysqlQuery("SELECT * FROM ". DK_DBPREFIX . $this->table ."
								WHERE `id_topic` = ".$this->id_topic."
								ORDER BY `id` DESC");
	}*/
	
	
	
	
	
    

   
/**
* ����� ������� � �� MySQL
* @access private
* @return array
*/     
    private function _getQuery()
    {
        $rows = array();
     
        $res = mysqlQuery("SELECT DATE_FORMAT(`date`,'%d-%m-%Y') AS `date`,
                           `id`, `id_parent`, `id_autor`, `autor`, `text`
                            FROM `". DK_DBPREFIX . $this->table ."`
                            WHERE `id_topic` = ".(int)$this->id_topic
                            );
     
        while($row = mysqli_fetch_assoc($res))
        {
            $rows[] = $row;
            $this->autors[] = $row['id_autor'];
        }
            
        return $rows;
      
    }  
    
/**
* ����� ��������� ���������� ��������
* @access private
* @return array
*/     
    private function _getAvatars()
    {
        $avatars = array();
        // ���� ���� �����������
        if(!empty($this->autors))
        {   // ������� �������
            $this->autors = array_unique($this->autors);
            // � �������� ���������� ��������
            $res = mysqlQuery("SELECT `id_parent`, `avatar`
                                FROM `". DK_DBPREFIX . $this->user_table ."`
                                WHERE `id_parent` IN (". implode(',', $this->autors) .")"
                                );
            // ��������� �� ������� ������
            while($row = mysqli_fetch_assoc($res))
                    $avatars[$row['id_parent']] = $row['avatar'];
        }
        
        return $avatars;
    }    
    
} 
    
