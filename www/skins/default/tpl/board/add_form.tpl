 <section id="container"> 
            <div class="clear"></div>
            <div id="main_block">
                <div id="main_header">
                    <h3><i class="icon-bell"></i> Новое объявление</h3>
                    
                </div>
                <form id="add_adv"  method="POST" enctype="multipart/form-data">
                <p>
                <label for="add_title"><span>*</span>Ведите загаловок:</label>
                    <input type="text" name="form[value1]" id="add_title" value="<?=$_SESSION['add_adv']['title']; ?>">
                    <span id="text_count">50</span>
                </p>
                <hr>
                <div class="fl_left">
                    <p><label for=""><span>*</span>Выберите категорию:</label>
                        <select name="form[value2]" id="sel_cat">
                        <option value="">Выберите категорию...</option>
                        <?php if(is_array($cat_select)): ?>
                            <?php foreach ($cat_select as $key => $value):?>
                                <?php if(isset($value['sub'])): ?>
                                    <option value="<?php echo  $key; ?>" label="<?php echo $value[0]; ?>"
                                    style="background: rgb(103,178,58) none repeat scroll 0% 50%;
                                            -moz-background-clip: -moz-initial;
                                            -moz-background-origin: -moz-initial;
                                            -moz-background-inline-policy: -moz-initial;">
                                    <?php foreach ($value['sub'] as $k => $v):?>
                                       <option <?php echo returnSelect( $_SESSION['add_adv']['category'], $k); ?> value="<?php echo $k; ?>"><?php echo $v;?></option>
                                    <?php endforeach; ?>

                                      </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </select>
                    </p>
                </div>
                <div class="fl_right">
                <p>
                    <label for="sel_city"><span>*</span>Ваш город:</label>
                    <select name="form[value3]" id="sel_city">
                        <optgroup label="Томская область">
                        <option value="00"><b>Все города</b></option>
                       <?php if($citys_arr) :?>
                        <?php foreach ($citys_arr as $key => $value):?>
                            <option <?php echo returnSelect($GET['city'],$value['city_name_en']); ?> value="<?php echo $value['id']; ?>"><?php echo $value['city_name_ru']; ?></option>
                            <?php //echo $value;?>
                        <?php endforeach; ?>
                       <?php endif; ?>
                        </optgroup>
                    </select>
                </p>
                </div>
                <p style="margin-bottom: 240px">
                <label for="editor"><span>*</span>Текст объявления:</label><br/>
                    <textarea id="editor" name="form[value4]" cols="90" rows="15"><?php echo $_SESSION['add_adv']['text']; ?></textarea>
                </p>

               

              <!--   <p>
                    <label for="main_file"><span>*</span>Главное фото</label><br>
                    <input type="file" name="file" id="main_file" >
                </p>
                <p id="block_file">
                    <label for="main_file">Галлерея фото</label><br>
                    <div><input  type="file" name="gallery_file[]" ></div>
                </p>
                <p>
                    <input type="button" id="add" value="Добавить поле" />
                    <input type="button" id="del" value="Удалить поле" />
                </p> -->


<div class="clear"></div>
                
                <div class="fl_left">
                    <p>
                    <label for="">Цена:</label>
                    <input type="text" name="form[value5]" id="add_price" maxlength="10" placeholder=".руб" onkeyup="this.value = this.value.replace (/\D/, '')" value="<?php echo $_SESSION['add_adv']['price']; ?>">
                </p>
                </div>
                <div class="fl_right">
                    <p>
                        <label for=""><span>*</span>Тип:</label>
                        <select name="form[value6]" id="sel_type">
                            <option value="" disabled selected>спрос или предложение&hellip;</option>
                        <?php if(is_array($type_select)): ?>
                            <?php foreach ($type_select as $value):?>
                                 <option value="<?php echo $value['id_type']; ?>" <?php echo returnSelect( $_SESSION['add_adv']['type'], $value['id_type']); ?>><?php echo $value['name'];?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        </select>
                    </p>
                </div>
            <hr>

       <div id="main_header">
            <h3><i class="icon-bell"></i> Контактные данные:</h3>
        </div>
        <div class="clear"></div>
         <div class="fl_left">
            <p>
                <label for=""><span>*</span>Телефон</label>
                <input type="tel" name="form[value7]" id="add_price" maxlength="11"  onkeyup="this.value = this.value.replace (/\D/, '')"
                pattern"^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" value="<?php echo $_SESSION['userdata']['phone']; ?>">
            </p>
         </div>
         <div class="fl_right">
         <?php if(!isset($_SESSION['userdata'])): ?>
            <p>
                <label for=""><span>*</span>Email <span class="toolTip" title="Заполните поле Email для добавления объявления не зарегистрированных пользователей">&nbsp;</span></label>
                <input type="email" name="form[value8]" id="add_price" value="<?php echo $_SESSION['userdata']['email']; ?>"  ><span class="tooltip"></span>
            </p>
        <?php endif; ?>
         </div>


    <br/>
    <div class="clear"></div>
    <div class="fl_left">
<div id="block-captcha">

<img src="<?php echo DK_HOST; ?>components/captcha/reg_captcha.php" />
<input type="text" name="reg_captcha" id="reg-captcha"  />

<p id="reloadcaptcha"><i class="fa fa-refresh"></i></p>
</div>
</div>
<div class="fl_right">
<p>
    <button class="sub_add" type="submit" name="ok" value="ok"><i class="fa fa-plus"></i> ДОБАВИТЬ</button>
</p>
</div>



   <div class="clear"></div>
   <div id="hidden_inputs">
		
		<input id="hidden_date" type="hidden" name="post_date" value="19-08-14" />
		<input id="hidden_photo_1" class="validate_photo1" type="hidden" name="photo_1" />
		<input id="hidden_photo_2" class="validate_photo2" type="hidden" name="photo_2" />
		<input id="hidden_photo_3" class="validate_photo3" type="hidden" name="photo_3" />
		<input id="hidden_photo_4" class="validate_photo4" type="hidden" name="photo_4" />
		<input id="hidden_photo_5" class="validate_photo5" type="hidden" name="photo_5" />
	</div>

                </form>

                <div id="images_block">
 <p>
                	<label>Фото</label>
                </p>
<!--  -->
<div id="add_photo_1" class="add_photo" >
	<div id="plus_photo_1" class="icon_add">
	+
	</div>
		<div class="upload">
			
			<form id="upload_photo_1" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_1">
				<input type="hidden" name="date" value="29-07-14" />
				<input id="input_upload_photo_1" class="upload_photo" type="file" name="upload"/>

			</form>
			<iframe style="display: none;" id="frame_photo_1" name="frame_photo_1"></iframe>
		</div>  
</div>
<!--  -->
<div id="add_photo_2" class="add_photo" >
	<div id="plus_photo_2" class="icon_add">
	+
	</div>
		<div class="upload">
			<iframe style="display: none;" id="frame_photo_2" name="frame_photo_2"></iframe>
			<form id="upload_photo_2" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_2">
				<input type="hidden" name="date" value="29-07-14" />
			<input id="input_upload_photo_2" class="upload_photo" type="file" name="upload"/>
			</form>
		</div>  
</div>
<!--  -->
<div id="add_photo_3" class="add_photo" >
	<div id="plus_photo_3" class="icon_add">
	+
	</div>
		<div class="upload">
			<iframe style="display: none;" id="frame_photo_3" name="frame_photo_3"></iframe>
			<form id="upload_photo_3" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_3">
				<input type="hidden" name="date" value="29-07-14" />
			<input id="input_upload_photo_3" class="upload_photo" type="file" name="upload"/>
			</form>
		</div>  
</div>
<!--  -->
<div id="add_photo_4" class="add_photo" >
	<div id="plus_photo_4" class="icon_add">
	+
	</div>
		<div class="upload">
			<iframe style="display: none;" id="frame_photo_4" name="frame_photo_4"></iframe>
			<form id="upload_photo_4" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_4">
				<input type="hidden" name="date" value="29-07-14" />
			<input id="input_upload_photo_4" class="upload_photo" type="file" name="upload"/>
			</form>
		</div>  
</div>
<!--  -->
<div id="add_photo_5" class="add_photo" >
	<div id="plus_photo_5" class="icon_add">
	+
	</div>
		<div class="upload">
			<iframe style="display: none;" id="frame_photo_5" name="frame_photo_5"></iframe>
			<form id="upload_photo_5" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_5">
				<input type="hidden" name="date" value="29-07-14" />
			<input id="input_upload_photo_5" class="upload_photo" type="file" name="upload"/>
			</form>
		</div>  
</div>

                	
</div>

            </div>
<?php echo dbg($_POST); ?>
<?php echo dbg($POST); ?>
<?php echo dbg($_SESSION); ?>
<?php echo dbg($_FILES); ?>
        </section>
        <!-- Init WysiBB BBCode editor -->
<script>
    $(document).ready(function() {

    var wbbOpt = {
        lang :   "ru",
        buttons: "bold,italic,underline,|,img,smilebox,link,|,bullist,numlist,justifyleft,justifycenter,justifyright,|,fontcolor,fontsize,|,removeFormat"
    }
    $("#editor").wysibb(wbbOpt);


// Загрустка изображений
/*	$(".delete_photo").click(function() {
	var id = $(this).attr("id").split("_")[2];
	$("#hidden_photo_"+id).val('');
	$("#add_photo_"+id).css({'opacity':'0.2'});
	$(this).hide();
});*/


$(".upload_photo").change(function(){


var id = $(this).attr("id").split("_")[3];  

var i = $(this).children('input'); //это импут
var a = ['jpg', 'png', 'zip']; //массив разрешенных расширений для клиентской проверки
var ext = $(this).val().split('.').pop();

console.log(ext);
if (a.indexOf(ext) == -1){ //сама проверка расшерения
i.parent().each(
function(){
this.reset();
}
);
return alert('недопустимое расширение файла!');
}
$("#upload_photo_"+id).submit();



	$("#frame_photo_"+id).load(function () {
               iframeContents = $("#frame_photo_"+id)[0].contentWindow.document.body.innerHTML;
               var accept = iframeContents.split("__")[0];
              // var dd = iframeContents.split("_")[1];
				alert(iframeContents);
			//	alert(dd);
				if (accept == 'yas') {
					var filename = iframeContents.split("__")[1];

					//alert(filename);
					$("#plus_photo_"+id).hide();
					
					$("#add_photo_"+id).prepend('<img style="display:block; position:absolute; z-index:0; top:0px; max-width:135px; max-height:135px;" src="/photo/advert/'+filename+'" />');
					  $("#hidden_photo_"+id).val(filename);
					

				} else {
				
				}
           });




});
				

  //подсчет символов
    $(function() {
$("input[id='add_title']").keyup(function countRemainingChars(){
maxchars = 50;
number = $("input[id='add_title']").val().length;
if(number <= maxchars){
$("#text_count").html(maxchars-number);
}
if(number == maxchars) {
$("#add_title").attr({ maxlength: maxchars});
}
});
});




    }); 
    </script>
