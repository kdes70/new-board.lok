<section id="container">
	  <div id="main_block">
	 
  
  
  <!--   <div id="add_photo_block">


	<div id="add_photo_1"></div>
    <div class="file-input">
		<input type="file" name="upload_1" size="0" />
		<div class="indicator">
			<div class="ready">Выбрать файл</div>
			<div class="go">Загрузка...</div>
		</div>
	</div>

	<div id="add_photo_2"></div>
    <div class="file-input">
		<input type="file" name="upload_2" size="0" />
		<div class="indicator">
			<div class="ready">Выбрать файл</div>
			<div class="go">Загрузка...</div>
		</div>
	</div>

	  </div> --><!-- add_photo_block -->



	

<!-- <script type="text/javascript">


if (!Array.indexOf) { //поддержка indexOf обособливо для ие, нужно будет для проверки расширения
Array.prototype.indexOf = function (obj, start) {
for (var i = (start || 0); i < this.length; i++) {
if (this[i] == obj) {
return i;
}
}
return -1;
}
}

$('.file-input').each(function(x){
var i = $(this).children('input'); //это импут
var d = $('.indicator', this); //это индикатор
var a = ['jpg', 'png', 'zip']; //массив разрешенных расширений для клиентской проверки
var form = $('<form action="/ajax/upload.php" method="post" enctype="multipart/form-data" target="iframe-name' + x + '"></form>');

i.before('<iframe name="iframe-name' + x + '" src="#"></iframe>').delay(1500).wrap(form).parent().append(d);
var $s = function(){ //проверка данных и сабмит формы
var ext = i.val().split('.').pop();
if (a.indexOf(ext) == -1){ //сама проверка расшерения
i.parent().each(
function(){
this.reset();
}
);
return alert('недопустимое расширение файла!');
}
i.parent().addClass('progress');
$(this).parent().submit().prev().one('load',
function(){
i.parent().removeClass('progress');
$(this).next()[0].reset(); //очищает инпут для того что бы не сабмитить файл в родительской форме
var img = $(this).contents().find('body').html();
alert(img); //вывод алертом сообщения от сервера, загруженного во фрейм
$("#add_photo").prepend('<img src="/photo/advert/'+img+'" class="add_photo_view" >');
});
}
i.change($s);//обработчик на изменения файл инпута
});




</script>
 -->

<!-- <section id="container">-->
<strong style="color:red"><?php echo getInfo($info); ?></strong><br /><br />




<div id="add_photo_1"
style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_1" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_1" name="frame_photo_1"></iframe>
				<form id="upload_photo_1" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_1">
					<input type="hidden" name="date" value="29-07-14" />
				<input id="input_upload_photo_1" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
</div>
				

				<div id="add_photo_2" class="float_left add_photo" 
style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_2" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_2" name="frame_photo_2"></iframe>
				<form id="upload_photo_2" method="post" enctype="multipart/form-data" action="/ajax/upload.php" target="frame_photo_2">
					<input type="hidden" name="date" value="29-07-14" />
				<input id="input_upload_photo_2" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"  />
				</form>
			</div>  
</div>
				

				<div id="add_photo_3" class="float_left add_photo" 
style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_3" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_3" name="frame_photo_3"></iframe>
				<form id="upload_photo_3" method="post" enctype="multipart/form-data" action="board/test" target="frame_photo_3">
					<input type="hidden" name="dates" value="29-07-14" />
				<input id="input_upload_photo_3" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
</div>

<div id="hidden_inputs">
		<input id="hidden_cover_1" type="hidden" name="cover_1" />
		<input id="hidden_cover_2" type="hidden" name="cover_2" />
		<input id="hidden_cover_3" type="hidden" name="cover_3" />
		<input id="hidden_cover_4" type="hidden" name="cover_4" />
		<input id="hidden_cover_5" type="hidden" name="cover_5" />
		
		<input id="hidden_date" type="hidden" name="post_date" value="19-08-14" />
		<input id="hidden_photo_1" class="validate_photo1" type="hidden" name="photo_1" />
		<input id="hidden_photo_2" class="validate_photo2" type="hidden" name="photo_2" />
		<input id="hidden_photo_3" class="validate_photo3" type="hidden" name="photo_3" />
		<input id="hidden_photo_4" class="validate_photo4" type="hidden" name="photo_4" />
		<input id="hidden_photo_5" class="validate_photo5" type="hidden" name="photo_5" />
	</div>




  </div>
</section>
<script type="text/javascript">

$(".delete_photo").click(function() {
	var id = $(this).attr("id").split("_")[2];
	$("#hidden_photo_"+id).val('');
	$("#add_photo_"+id).css({'opacity':'0.2'});
	$(this).hide();
});


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
               var accept = iframeContents.split("_")[0];
              // var dd = iframeContents.split("_")[1];
				alert(iframeContents);
			//	alert(dd);
				if (accept == 1) {
					var filename = iframeContents.split("__")[1];

					//alert(filename);
					$("#plus_photo_"+id).hide();
					
					$("#add_photo_"+id).prepend('<img style="display:block; position:absolute; z-index:0; top:0px; max-width:135px; max-height:135px;" src="/photo/advert/'+filename+'" />');
					  $("#hidden_photo_"+id).val(filename);
					

				} else {
				
				}
           });




});
</script>
				
 
