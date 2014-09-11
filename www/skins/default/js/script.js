$(document).ready(function(){

/*=====Блок категорий=====*/
	 $('#block-category > ul > li > a').click(function(){

    if ($(this).attr('class') != 'active'){

	$('#block-category > ul > li > ul').slideUp(400);
    $(this).next().slideToggle(400);

            $('#block-category > ul > li > a').removeClass('active');
			$(this).addClass('active');
            $.cookie('select_cat', $(this).attr('id'));

		}else
        {

            $('#block-category > ul > li > a').removeClass('active');
            $('#block-category > ul > li > ul').slideUp(400);
            $.cookie('select_cat', '');
        }
	});
if ($.cookie('select_cat') != '')
{
$('#block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}




//Блок авторизации отк-зак
$('#autch_in').click(function(){
	$('#autch_form').slideToggle();
});

//Авторизация
  $("#button-auth").click(function(e) {
     e.preventDefault();
     var login = $("#login").val();
     var pass  = $("#pass").val();
     var auth  = $("#autch").val();

      if ($("#rememberme").prop('checked'))
      {
        rememberme = 'yes';
      }else{
        rememberme = '';
      }

      //Валидация логина
      if (login == "" || login.length > 30 )
      {
        $("#login").css("borderColor","#FDB6B6");
        $("#message-auth").slideDown(400).html('Поля логин/пароль должны быть заполнены!');
        send_login = 'no';
      }else {$("#login").css("borderColor","#DBDBDB");
        send_login = 'yes';
      }

      //Валидация пароля
      if (pass == "" || pass.length > 15 )
      {
        $("#pass").css("borderColor","#FDB6B6");
        $("#message-auth").slideDown(400).html('Поля логин/пароль должны быть заполнены!');
        send_pass = 'no';
      }else { $("#pass").css("borderColor","#DBDBDB");
        send_pass = 'yes';
      }

  if ( send_login == 'yes' && send_pass == 'yes' )
  {
   $("#button-auth").hide();
   $(".auth-loading").show();
      $.ajax({
        url: '/registration/read',
        type: 'POST',
        data: {autch: auth, 'form[value1]': login, 'form[value2]': pass, 'form[value3]': rememberme},
        success: function(res){
         // console.log(url);
          if(res != 'Поля логин/пароль должны быть заполнены!' && res != 'Ошибка ввода данных')
          {
            //Если пользователь успешно авторзован
            //$('#input-auth li').hide();
            $("#message-auth").slideDown(400).html(res);

            if (res == 'Добро пожаловать!')
            {
              $('#auth_form').hide();
              $("#button-auth").hide();
              $(".auth-loading").show();
              $().toastmessage('showSuccessToast', "Добро пожаловать!")
              setTimeout(function(){
                  location.reload();
                }, 800)
            }
            }else{
            //Если авторизация не удачна
            $("#message-auth").slideDown(400).html(res);
            $(".auth-loading").hide();
            $("#button-auth").show();
          }


        },
         error: function(){
               // $().toastmessage({sticky : true});
                $().toastmessage('showErrorToast', "Ошибка");
               /* setTimeout(function(){
                  location.reload();
                }, 900)*/
           }
      });
  }

  });




//размер навигации
	var touch 	= $('#touch-menu');
	var menu 	= $('.menu');

	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});


 /* ===Галерея товаров=== */
    var ImgArr, ImgLen;
    //Предварительная загрузка
    function Preload (url)
    {
       if (!ImgArr){
           ImgArr=new Array();
           ImgLen=0;
       }
       ImgArr[ImgLen]=new Image();
       ImgArr[ImgLen].src=url;
       ImgLen++;
    }
    $('.item_thumbs a').each(function(){
       Preload( $(this).attr('href') );
    })

    //обвес клика по превью
    $('.item_thumbs a').click(function(e){
       e.preventDefault();
       if(!$(this).hasClass('active')){
           var target = $(this).attr('href');

           $('.item_thumbs a').removeClass('active');
           $(this).addClass('active');

           $('.item_img img').fadeOut('fast', function(){
               $(this).attr('src', target).load(function(){
                   $(this).fadeIn();
               })
           })
       }
    });
    $('.item_thumbs a:first').trigger('click');
    /* ===Галерея товаров=== */



/* МОДЕЛЬНОЕ ОКНО */
/* Находим все ссылки, которые содержат модальные окна */
$('a[name=modal]').click(function(){

// В конец html документа добавляем маску, она затемнит весь документ
// для выделения модальноого окна
$('body').append('<div id="mask"></div>');

// Заносим в переменную значение атрибута href ссылки
var openBox = $(this).attr('href');

// Показываем маску и модальное окно
$('#mask').fadeIn();
$(openBox).fadeIn();

// Удаляем маску и скрываем модальное окно
// при клике по закрывающему элементу
$('.close').click(function(){
  $('#mask').remove();
  $(openBox).fadeOut();
});

// Запрещаем обычное поведение ссылки
  return false
});
/* МОДЕЛЬНОЕ ОКНО */



/* ДИНАМИЧЕСКОЕ ДОБАВЛЕНИЕ ПОЛЕЙ КАРТИНОК не используется */
  var max = 5;
  var min = 1;
  $("#del").attr("disabled", true);
  $("#add").click(function(){
    var total = $("input[name='gallery_file[]']").length;
    if(total < max)
    {
      $("#block_file").append('<div><input type="file" name="gallery_file[]" ></div>');
      if(max == total + 1)
      {
        $("#add").attr("disabled", true);
      }
      $("#del").removeAttr("disabled");
    }
  });
  $("#del").click(function(){
    var total = $("input[name='gallery_file[]']").length;
    if(total > min)
    {
      $("#block_file div:last-child").remove();
      if(min == total - 1)
      {
         $("#del").attr("disabled", true);
      }
      $("#add").removeAttr("disabled");
    }
  });
/* ДИНАМИЧЕСКОЕ ДОБАВЛЕНИЕ ПОЛЕЙ КАРТИНОК */

// вывод сообщений
//$().toastmessage('showNoticeToast', 'some message here');
//$().toastmessage('showSuccessToast', "some message here");
//$().toastmessage('showWarningToast', "some message here");
//$().toastmessage('showErrorToast', "some message here");





 //подсчет символов
    $(function() {
$("input[id='add_title']").keyup(function countRemainingChars(){
maxchars = 30;
number = $("input[id='add_title']").val().length;
if(number <= maxchars){
$("#text_count").html(maxchars-number);
}
if(number == maxchars) {
$("#add_title").attr({ maxlength: maxchars});
}
});
});


/*НАСТРОЙКА BBcoda РЕДАКТОРА*/

  //Init WysiBB BBCode editor

 var wbbOpt = {
        lang :   "ru",
        buttons: "bold,italic,underline,|,img,smilebox,link,|,bullist,numlist,justifyleft,justifycenter,justifyright,|,fontcolor,fontsize,|,removeFormat"
    }
    $("#editor").wysibb(wbbOpt);






});
