<?php

/**
* @author B)DIMON
* @copyright 2013
*
* Контроллер
* @author IT studio DK_IS-team
* @copyright © 2011 DK_IS-team
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

  


   
    $prod = new Admin_Production_Model('production');
    
    if($GET['mod'] === 'cat')
    {
// Блок чтения ленты продуктов
        $prod -> createCategory($GET['parent']);
        $prod -> createListProduct($GET['parent'], DK_CONFIG_NUM_WORDS);        
        $back_link  = '<a href="'. href('mod=all') .'">'. DK_LANG_BACK .'</a>';       
        $production = $prod -> createRows('admin/production/product_rows', 'product', true);
        include DK_ROOT .'/skins/tpl/admin/production/product_form.tpl';    
    }
    elseif($GET['mod'] === 'addprod')
    {
// Блок добавления новой продукции
        if($ok)
        {
            $info[] = $prod -> addProductImg($lang_file_error);
            
            if(empty($info[0]))
                $info[] = $prod -> addProduction($GET['parent'], 
                                                 $POST['value1'],
                                                 $POST['value2'],
                                                 $POST['value3'],
                                                 $prod->img
                                                 );
           
            if(empty($info[0]))
                reDirect('mod=editprod', 'parent='. $prod->id);
            
        }   
        
        $name  = $POST['value1'];
        $description = $POST['value2'];
        $price = $POST['value3'];        
        $production  = '';
        
        include DK_ROOT .'/skins/tpl/admin/production/product_form.tpl';   
    }
    elseif($GET['mod'] === 'editprod')
    {
// Блок редактирования продукции
        if($edit)
        {
            $info[] = $prod -> addProductImg($lang_file_error);
            
            if(empty($info[0]))   
                $info[] = $prod -> editProduction($GET['parent'], 
                                                  $POST['value1'],
                                                  $POST['value2'],
                                                  $POST['value3'],
                                                  $prod->img
                                                  );
           
            if(empty($info[0]))
                reDirect();
            
        }
// Блок удаления продукции      
        if($delete)
        {
            $info[] = $prod -> deleteProduction($GET['parent']);
            
            if(empty($info[0]))
                reDirect('mod=all');
            
        }  
        
        $edit  = $prod -> createEditProduction($GET['parent']);
        $name  = $edit['name'];
        $description = $edit['description'];
        $price = $edit['price'];        
        $prod -> createEditProduction($GET['parent'], false);        
        $production = $prod -> createRows('admin/production/product', 'cat');
        
        include DK_ROOT .'/skins/tpl/admin/production/product_form.tpl';    
    }
    elseif($GET['mod'] === 'addcat')
    {
// Блок добавления категории
        if($ok)
        {
            $info[] = $prod -> addProductImg($lang_file_error);
            
            if(empty($info[0]))
                $info[] = $prod -> addCategories($POST['value1'], 
                                                 $POST['value2'], 
                                                 $prod->img
                                                );
           
            if(empty($info[0]))
                reDirect('mod=editcat', 'parent='. $prod->id);
            
        }   
        
        $name = $POST['value1'];
        $description = $POST['value2'];
        $categories  = '';
        
        include DK_ROOT .'/skins/tpl/admin/production/categories_form.tpl';    
    }
    elseif($GET['mod'] === 'editcat')
    {
// Блок редактирования категории     
        if($edit)
        {
            $info[] = $prod -> addProductImg($lang_file_error);
            
            if(empty($info[0]))  
                $info[] = $prod -> editCategories($GET['parent'],
                                                  $POST['value1'],
                                                  $POST['value2'],
                                                  $prod->img
                                                  );
           
            if(empty($info[0]))
                reDirect();
            
        }
// Блок удаления категории       
        if($delete)
        {
            $info[] = $prod -> deleteCategories($GET['parent']);
            
            if(empty($info[0]))
                reDirect('mod=all');
            
        }  
        
        $edit = $prod -> createEditCat($GET['parent']);
        $name = $edit['name'];
        $description = $edit['description'];
        $prod -> createEditCat($GET['parent'], false);        
        $categories = $prod -> createRows('admin/production/cat_rows', 'cat');
        
        include DK_ROOT .'/skins/tpl/admin/production/categories_form.tpl';    
    }
    else
    {
// Блок чтения ленты категорий    
        $prod -> createCategory();
        $cat_name = '';        
        $categories = $prod -> createRows('admin/production/cat_rows', 'cat');
        
        include DK_ROOT .'/skins/tpl/admin/production/categories_form.tpl';            
    }