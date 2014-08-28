<div id="add_photo_1" class="float_left add_photo" 
style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_1" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_1" name="frame_photo_1"></iframe>
				<form id="upload_photo_1" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_1">
					<input type="hidden" name="date" value="29-07-14" />
				<input id="input_upload_photo_1" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
</div>
				
				<div id="add_photo"></div>
    <div class="file-input">
<input type="file" name="upload" size="0" />
<div class="indicator">
<div class="ready">Выбрать файл</div>
<div class="go">Загрузка...</div>
</div>
</div>

	

<script type="text/javascript">


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

