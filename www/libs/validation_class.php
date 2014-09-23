<?php 

/**
* 
*/
class Validation 
{	
	private $_post = array(); // Массив пост
	private $_post_key = array(); //Массив ключей массива пост
	private $_post_val = array(); //Масив значений массива пост


	
	function __construct($post)
	{
		echo "класс валидации доступен";

		print_arr($post);

		$this->_post = $post;

	}

	public function setRules()
	{
		echo count($this->_post);

		//print_arr(array_count_values($this->_post));
		foreach ($this->_post as $key => $value) {
				
				echo "key - ". $key . "| val - ". $value ."\n";
				$this->_post_key[] = $key;
				$this->_post_val[] = $value;

				


		}
		print_arr($this->_post_key);
	}



}










 ?>