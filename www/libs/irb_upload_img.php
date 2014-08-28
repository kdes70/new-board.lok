<?php
/**
 * IRB_Upload_Img - Класс загрузки изображений
 * NOTE: Requires PHP version 5 or later 
 * @package IRB_Upload_Img
 * @author IT studio IRBIS-team (www.irbis-team.com)
 * @copyright © 2012 IRBIS-team
 * @version 0.1
 * @license http://www.opensource.org/licenses/rpl1.5.txt
 */

class IRB_Upload_Img
{
    public $error, $name, $new_name, $dir, $upload_name;
    public $width = 1200;
    public $height = 1200;    
    
    public function __construct($error)
    {
        $this->error = $error;
    }
/**
* Метод загрузки файла на сервер
* @param string $file
* @param string $dir
* @return mixed
*/
    public function uploadFile($file, $dir = 'photo/')
    {
             
        if(!empty($this->error[$_FILES[$file]['error']])) 
            return $this->error[$_FILES[$file]['error']]; 
        elseif(($extension = $this->checkFile($file)) === false)    
            return $this->error['UPLOAD_ERR_EXTENTION']; 
            
        $img = getimagesize($_FILES[$file]['tmp_name']);
            
        if($img[2] < 1 || $img[2] > 3)
            return $this->error['UPLOAD_ERR_EXTENTION'];
        elseif($img[0] > $this->width + $this->width * 0.1) 
            return $this->error['UPLOAD_ERR_WIDTH'];
        elseif($img[1] > $this->height + $this->height * 0.1) 
            return $this->error['UPLOAD_ERR_HEIGHT'];            
        else
        {
            $this->dir  = $dir;
            $this->name = $this->generateFilename($file);
            $this->name .=  '.'. $extension;            
            $this->new_name  = DK_HOST . $this->dir . $this->name;
            $this->upload_name = DK_ROOT .'/'. $this->dir . $this->name; 
         

            
            if(move_uploaded_file($_FILES[$file]['tmp_name'], $this->upload_name))
                return false; 
            else  
                return $this->error['UPLOAD_ERR_UPLOAD'];    
        }
    }    

    
    

   
       
                      
    
    
 private  function getError( /*int*/ $error )
{
    switch( $error )
    {
        case UPLOAD_ERR_INI_SIZE   : ;
        case UPLOAD_ERR_FORM_SIZE  : return 'Файл слишком большой.';
          break;
         
        case UPLOAD_ERR_PARTIAL    : return 'Файл получен частично.';
            break;
             
        case UPLOAD_ERR_NO_FILE    : return 'Файл не был загружен.';
            break;
             
        case UPLOAD_ERR_NO_TMP_DIR : return 'Ошибка сервера: отсутствует временная папка.';
            break;
             
        case UPLOAD_ERR_CANT_WRITE : return 'Ошибка сервера: не удалось записать файл на диск.';
            break;
             
        case UPLOAD_ERR_EXTENSION  : return 'PHP-расширение остановило загрузку файла.';
            break;
    }
} 
    
       
    
/**
* Метод проверки типа файла
* @param string
* @return string
*/
    public function checkFile($file)
    {
        $extension = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION); 
        $valid_extensions = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG');        
        return in_array($extension, $valid_extensions) ? $extension : false;
        
    }
    
/**
* Метод генерации уникального имени
* @return string
*/
    public function generateFilename($file)
    {
        return time() . strtolower(substr($_FILES[$file]['tmp_name'], -8, 4)); 
    }
    
    
    
    
/**
 * 
 */   //////////////////////
    public function imgResize($width, $height, $dir = 'photo/smoll/')
    {  
        $upload_name = DK_ROOT .'/'. $this->dir . $this->name; 
        $smal_name   = DK_ROOT .'/'. $dir . $this->name;
      
        if (!file_exists($upload_name)) return false;
        
        $size = getimagesize($upload_name);
     
        if ($size === false) return false;
        
        $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
       
        $icfunc = "imagecreatefrom" . $format;
        if (!function_exists($icfunc)) return false;
        
        $x_ratio = $width / $size[0];
        $y_ratio = $height / $size[1];
        
        $ratio       = min($x_ratio, $y_ratio);
        $use_x_ratio = ($x_ratio == $ratio);
        
        $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
        $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
        $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
        $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
        
        $isrc = $icfunc($upload_name);
        $idest = imagecreatetruecolor($width, $height);
        
        imagefill($idest, 0, 0, 0xF2F2F2);
        imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0, 
        $new_width, $new_height, $size[0], $size[1]);
        
        imagejpeg($idest, $smal_name, 70);
        
        imagedestroy($isrc);
        imagedestroy($idest);
        
        return true;

    }
    
    /**
* Обрезка изображения
*
* Функция работает с PNG, GIF и JPEG изображениями.
* Обрезка идёт как с указанием абсоютной длины, так и относительной (отрицательной).
*
* @param string Расположение исходного файла
* @param string Расположение конечного файла
* @param array Координаты обрезки
* @param bool Размеры даны в пискелях или в процентах
* @return bool
*/
public function crop($dir = 'photo/smoll/', $crop = 'square',$percent = false)
 {  
    $upload_name = DK_ROOT .'/'. $this->dir . $this->name;
    $crop_name   = DK_ROOT .'/'. $dir . $this->name;
    
    list($w_i, $h_i, $type) = getimagesize($upload_name);
    if (!$w_i || !$h_i) {
        $info[] = 'Невозможно получить длину и ширину изображения';
        return;
    }
    $types = array('','gif','jpeg','jpg','png','GIF','GPEG','JPG','PNG');
    $ext = $types[$type];
    if ($ext) {
        $func = 'imagecreatefrom'.$ext;
        $img = $func($upload_name);
    } else {
        $info[] = 'Некорректный формат файла';
        return;
    }
    if ($crop == 'square') {
        $min = $w_i;
        if ($w_i > $h_i) $min = $h_i;
        $w_o = $h_o = $min;
    } else {
        list($x_o, $y_o, $w_o, $h_o) = $crop;
        if ($percent) {
            $w_o *= $w_i / 100;
            $h_o *= $h_i / 100;
            $x_o *= $w_i / 100;
            $y_o *= $h_i / 100;
        }
        if ($w_o < 0) $w_o += $w_i;
        $w_o -= $x_o;
        if ($h_o < 0) $h_o += $h_i;
        $h_o -= $y_o;
    }
    $img_o = imagecreatetruecolor($w_o, $h_o);
    imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
    if ($type == 2) {
        return imagejpeg($img_o,$crop_name,100);
    } else {
        $func = 'image'.$ext;
        return $func($img_o,$crop_name);
    }
}
    
    
    // $outfile -  путь к файлу, который получится после преобразования
// $neww - ширина в px, к которой преобразуем
// $infile - путь к файлу, который преобразуем
// $quality - качество изображения в %
// вызов функции выглядит примерно так:
//
// imageresize("images/out_image.jpg",150,"uploads/image.jpg",100);

public function imageresize($neww, $quality, $dir = 'photo/big/') {

    $infile = DK_ROOT .'/'. $this->dir . $this->name; 
    $outfile   = DK_ROOT .'/'. $dir . $this->name;
    $im=imagecreatefromjpeg($infile);

    $newh=$neww*imagesy($im)/imagesx($im);

    $im1=imagecreatetruecolor($neww,$newh);
    imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));
    if($neww >= 250)//добавляем водяной знак на изображения больше среднего размера
    {              //путь к изображению с водяным знаком
    $image_logo = DK_ROOT ."/skins/images/watermark.png";
    $im_logo = imagecreatefrompng($image_logo);
    imagecopy($im1, $im_logo, 10, 10, 0, 0, 54, 26);
    }
    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }
    
    
    
    //////////////////////////////////////
    
    
   

}    
    
    
    
    