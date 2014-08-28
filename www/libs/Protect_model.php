<?php
/*
 автор скритпа PATCH
 все права защищены xDD
 script author PATCH
 All rights reserved xDD
 */
class Protect_model  {

	//path to folder in smiles
	private $smile_root="styles/images/smiles/";

	//from bbcode to html
	function bbcode_decode($markup){
		//smiles
		$markup = str_replace(':)', '<img src="'.$this->smile_root.'sm1.png'.'">', $markup);
		$markup = str_replace(':(', '<img src="'.$this->smile_root.'sm8.png'.'">', $markup);
		$markup = str_replace(':D', '<img src="'.$this->smile_root.'sm2.png'.'">', $markup);
		$markup = str_replace(';)', '<img src="'.$this->smile_root.'sm3.png'.'">', $markup);
		$markup = str_replace(':up:', '<img src="'.$this->smile_root.'sm4.png'.'">', $markup);
		$markup = str_replace(':down:', '<img src="'.$this->smile_root.'sm5.png'.'">', $markup);
		$markup = str_replace(':shock:', '<img src="'.$this->smile_root.'sm6.png'.'">', $markup);
		$markup = str_replace(':angry:', '<img src="'.$this->smile_root.'sm7.png'.'">', $markup);
		$markup = str_replace(':sick:', '<img src="'.$this->smile_root.'sm9.png'.'">', $markup);
		//br
		$markup =str_replace("\r\n","<br>",$markup);
		//li
		$markup =str_replace("[*]","<li>",$markup);
		$markup =str_replace("[/*]","</li>",$markup);
		//TABLE
		$markup =str_replace("[table]","<table>",$markup);
		$markup =str_replace("[/table]","</table>",$markup);
		$markup =str_replace("[tr]","<tr>",$markup);
		$markup =str_replace("[/tr]","</tr>",$markup);
		$markup =str_replace("[td]","<td>",$markup);
		$markup =str_replace("[/td]","</td>",$markup);

		$preg = array(
			  // Text arrtibutes
			  '~\[s\](.*?)\[\/s\]~si'  => '<s>$1</s>',
			  '~\[b\](.*?)\[\/b\]~si'  => '<b>$1</b>',
			  '~\[i\](.*?)\[\/i\]~si'  => '<i>$1</i>',
			  '~\[u\](.*?)\[\/u\]~si'  => '<u>$1</u>',
			  '~\[sup\](.*?)\[\/sup\]~si'  => '<sup>$1</sup>',
			  '~\[sub\](.*?)\[\/sub\]~si'  => '<sub>$1</sub>',
			  '~\[color=(.*?)\](.*?)\[\/color\]~si' => '<span style="color:$1">$2</span>',

			  //align
			  '~\[center\](.*?)\[\/center\]~si' => '<div style="text-align: center">$1</div>',
			  '~\[left\](.*?)\[\/left\]~si' => '<div style="text-align: left">$1</div>',
			  '~\[right\](.*?)\[\/right\]~si' => '<div style="text-align: right">$1</div>',

			  //font size,font type
			  '~\[size=200\](.*?)\[\/size\]~si' => '<font size="6">$1</font>',
			  '~\[size=150\](.*?)\[\/size\]~si' => '<font size="4">$1</font>',
			  '~\[size=100\](.*?)\[\/size\]~si' => '<font size="3">$1</font>',
			  '~\[size=85\](.*?)\[\/size\]~si' => '<font size="2">$1</font>',
			  '~\[size=50\](.*?)\[\/size\]~si' => '<font size="1">$1</font>',
			  '~\[font=(.*?)\](.*?)\[\/font\]~si' => '<font face="$1">$2</font>',


			 //video
			 '~\[video\](.*?)\[\/video\]~si'  =>
			 '<iframe src="http://www.youtube.com/embed/$1" width="400" height="300" frameborder="0"></iframe>',
			 //list

			 '~\[list\](.*?)\[\/list\]~si'  => '<ul>$1</ul>',
			 '~\[list=1\](.*?)\[\/list\]~si' => '<ol>$1</ol>',

			 // links
			  '~\[url=(.*?)?\](.*?)\[\/url\]~si' => '<a href="$1">$2</a>',

			  // images
			  '~\[img\](.*?)\[\/img\]~si' => '<img src="$1" alt="$1"/>',

			  // [code][/code]
			  '~\[code\](.*?)\[\/code\]~si'  =>
			  '<div class="codewrap"><div class="codetop" contenteditable="false">Код:</div><div class="codemain"><span>$1</span></div></div>',
			 // [offtop][/offtop]
			  '~\[offtop\](.*?)\[\/offtop\]~si'  => '<span style="font-size:10px;color:#ccc">$1</span>',
			  // quote
			  '~\[quote\](.*?)\[\/quote\]~si'  => '<span class="quote">$1</span>',
	  );
	   return preg_replace(array_keys($preg), array_values($preg), $markup);
	}
	//from html to  bbcode
	function bbcode_encode($markup)
	{
		//smiles
		$markup = str_replace('<img src="'.$this->smile_root.'sm1.png'.'">',':)', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm8.png'.'">',':(', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm2.png'.'">',':D', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm3.png'.'">',';)', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm4.png'.'">',':up:', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm5.png'.'">',':down:', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm6.png'.'">',':shock:', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm7.png'.'">',':angry:', $markup);
		$markup = str_replace('<img src="'.$this->smile_root.'sm9.png'.'">',':sick:', $markup);
		//br
		$markup =str_replace("<br>","\r\n",$markup);
		//li
		$markup =str_replace("<li>","[*]",$markup);
		$markup =str_replace("</li>","[/*]",$markup);
		//TABLE
		$markup =str_replace("<table>","[table]",$markup);
		$markup =str_replace("</table>","[/table]",$markup);
		$markup =str_replace("<tr>","[tr]",$markup);
		$markup =str_replace("</tr>","[/tr]",$markup);
		$markup =str_replace("<td>","[td]",$markup);
		$markup =str_replace("</td>","[/td]",$markup);

		$preg = array(
			  // Text arrtibutes
			  '~\<s\>(.*?)\<\/s\>~si'  => '[s]$1[/s]',
			  '~\<b\>(.*?)\<\/b\>~si'  => '[b]$1[/b]',
			  '~\<i\>(.*?)\<\/i\>~si'  => '[i]$1[/i]',
			  '~\<u\>(.*?)\<\/u\>~si'  => '[u]$1[/u]',
			  '~\<sup\>(.*?)\<\/sup\>~si'  => '[sup]$1[/sup]',
			  '~\<sub\>(.*?)\<\/sub\>~si'  => '[sub]$1[/sub]',
			  '~\<span style="color:(.*?)"\>(.*?)\<\/span\>~si' => '[color=$1]$2[/color]',

			  //align
			  '~\<div style="text-align: center"\>(.*?)\<\/div\>~si' => '[center]$1[/center]',
			  '~\<div style="text-align: left"\>(.*?)\<\/div\>~si' => '[left]$1[/left]',
			  '~\<div style="text-align: right"\>(.*?)\<\/div\>~si' => '[right]$1[/right]',

			  //font size,font type
			  '~\<font size="6"\>(.*?)\<\/font\>~si' => '[size=200]$1[/size]',
			  '~\<font size="4"\>(.*?)\<\/font\>~si' => '[size=150]$1[/size]',
			  '~\<font size="3"\>(.*?)\<\/font\>~si' => '[size=100]$1[/size]',
			  '~\<font size="2"\>(.*?)\<\/font\>~si' => '[size=85]$1[/size]',
			  '~\<font size="1"\>(.*?)\<\/font\>~si' => '[size=50]$1[/size]',
			  '~\<font face="(.*?)"\>(.*?)\<\/font\>~si' => '[font=$1]$2[/font]',

			 //video
			 '~\<iframe src="http://www.youtube.com/embed/(.*?)" width="400" height="300" frameborder="0"\>\<\/iframe\>~si'  => '[video]$1[/video]',
			 //list

			 '~\<ul\>(.*?)\<\/ul\>~si'  => '[list]$1[/list]',
			 '~\<ol\>(.*?)\<\/ol\>~si' => '[list=1]$1[/list]',

			 // links
			  '~\<a href="(.*?)"\>(.*?)\<\/a\>~si' => '[url=$1]$2[/url]',

			  // images
			  '~\<img src="(.*?)" alt="(.*?)"\/>~si' => '[img]$1[/img]',

			  // [code][/code]
			  '~\<div class="codewrap"\>\<div class="codetop" contenteditable="false"\>Код:\<\/div\>\<div class="codemain"\>\<span\>(.*?)\<\/span\>\<\/div\>\<\/div\>~si'  => '[code]$1[/code]',
			 // [offtop][/offtop]
			  '~\<span style="font-size:10px;color:#ccc"\>(.*?)\<\/span\>~si'  => '[offtop]$1[/offtop]',
			  // quote
			  '~\<span class="quote"\>(.*?)\<\/span\>~si'  => '[quote]$1[/quote]',
	  );
	  return preg_replace(array_keys($preg), array_values($preg), $markup);
	}
}
?>
