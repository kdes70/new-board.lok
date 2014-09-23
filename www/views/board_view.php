<?php 

/**
* Генерация страницы ошибки при доступе вне системы
*/
	if(!defined('DK_KEY'))
	{
	   header("HTTP/1.1 404 Not Found");
	   exit(file_get_contents('../404.html'));
	}
/////////////////////////////////////////////////////////

class Board_View extends Board_Model
{

	/**
	*	Конструктор
	* ------------------------
	*	@param string $table
	*	@param sting $template
	*	@param int $num_rows 
	*
	*/
	public function __construct($table, $template, $num = 1, $city)
	{
		$this->table = $table;
		$this->num = $num;
		$this->city = $city;
		$this->tpl = new IRB_Template($template);
		$objCity = new GeoCity($this->region_, 'city', $this->city);
		$this->city_id = $objCity->getIdcity($this->city);
	}

/**
* Полное объявление
* @param int $id_topic
* @return void
*/
	public function actionFull($id_topic)
	{
		$this->creareFull($id_topic);
		$this->createRows('advert', 'all', KD_LANG_BACK);
	}



	 /**
	* Метод представления.
	* @param string $template
	* @param string $mod
	* @param string $link
	* @return string
	*/
		public function createRows($block, $mod, $link)
		{ 
			//$page = !empty($pages)? 'page='.$pages : NULL;
			global $GET;
			$rows  = '';
			// BBcode
			$bbb = new Protect_model();

			while($row = mysqli_fetch_assoc($this->res))
			{	

				$this->title       = !empty($row['title']) ? htmlChars($row['title']) : '';
				$this->keywords    = !empty($row['m_keywords']) ? htmlChars($row['m_keywords']) : '';
				$this->description = !empty($row['m_description']) ? htmlChars($row['m_description']) : '';
								// уризаем страку
				$row['title'] = cutStr($row['title'], 40);

				$this->author = $row['id_user'];

				$this->add_time = $row['add_time'];

				$this->id_adv = $row['id_adv'];

				$row['img'] = explode("|", $row['img']);
					
				$row['text'] = $bbb->bbcode_decode($row['text']);
			// $row['text'] = $bbb->bbcode_encode($row['text']);

				// if($this->clear)
				//     $row['text'] = $bb -> stripBBtags($row['text']);
				// else
				//     $row['text'] = $bb -> createBBtags($row['text']);

				$row['link']  = $link;
				$num          = ($this->num > 1) ? $this->num : 0;
				$link_name    = ($mod == 'advert') ? translateWord($row['title']) : 0;
				$row['url']   = href('page=board','mod='. $mod, 'parent='. $row['id_adv'], 'id='. $link_name, 'num='. $num);
				$this->assign($row)->setBlock($block);
			}
		
			return $rows;
		}

/**
* Передача данных в шаблонизатор
* @param mix $var
* @param mix $value
* @return object
*/
	public function assign($var, $value='')
	{
		$this->tpl->assign($var, $value);
		return $this->tpl;
	}

/**
* Рендер
* @return void
*/
	public function run()
	{
		$this->tpl->extendsTpl('show', 'rows')->display();
	}


}