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






<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Фотодоска, Томск, Фотодоска Томск, продам квартиру, Томск, объявления недвижимость, товары в Томск, Томск, Фотодоска Томск, Фотодоска объявлений, бесплатные объявления, сайт объявления, объявления, бесплатные объявления, частные объявления, доска объявлений, бесплатные доски, подать бесплатное объявление, бесплатные доски объявлений, объявления продажа, объявления продаю, сайт объявления, бесплатное объявление бесплатно, объявления, бесплатные объявления Томск, продажа автомобилей, запчасти для японских автомобилей, недорогие товары, барахолка, купить дешево, купить, продать, разместить объявление, купить в Томске, бесплатные объявления о продаже, подать объявление о  продаже, смартфоны, купить телефон" />
		<meta name="description" content="Фотодоска - сайт бесплатных объявлений! С нами легко подать бесплатные объявления!" />
    <title>Фотодоска &mdash; Томск &mdash; сайт бесплатных объявлений</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/styles.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="http://photodoska.ru/css/redactor.css" rel="stylesheet" type="text/css" media="screen" />
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22275317-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
  
</head>
<body>

<div class="wrapper">



<div style="clear:both; margin-top:10px;" class="width_1088px">


	</div>

<div style="clear:both; margin-bottom:10px; background:#fff; width:100%;">
	<div class="width_1088px">
		<div style="background:#fff; width:728px; height:90px; margin:0 auto; margin-bottom:10px; clear:both;">
<!--	<div id="yandex_ad110"></div>
<script type="text/javascript">
(function(w, d, n, s, t) {
w[n] = w[n] || [];
w[n].push(function() {
Ya.Direct.insertInto(121049, "yandex_ad110", {
ad_format: "direct",
type: "728x90",
border_type: "block",
site_bg_color: "FFFFFF",
border_color: "FBE5C0",
title_color: "0000CC",
url_color: "006600",
text_color: "000000",
hover_color: "0066FF",
favicon: true,
no_sitelinks: false
});
});
t = d.getElementsByTagName("script")[0];
s = d.createElement("script");
s.src = "//an.yandex.ru/system/context.js";
s.type = "text/javascript";
s.async = true;
t.parentNode.insertBefore(s, t);
})(window, document, "yandex_context_callbacks");
</script> -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<ins class="adsbygoogle"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-2695058290448089"
data-ad-slot="1963762539"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>	</div>
</div>

<div style="clear:both; margin-bottom:10px; background:#999; height:29px; width:100%;">
	<div class="width_1088px">
		<div style="float:right;">
			<ul id="top_menu">
	<!--<li><a href="/barter/city-1/"><i class="fa fa-exchange"></i>&nbsp;Бартер</a></li>-->
	<li>
		<a href="#">Ваш город:&nbsp;<span style="border-bottom:1px dashed #fff;">Томск</span>&nbsp;<i class="fa fa-caret-down"></i></a>
		<ul class="top_submenu">
			<li><a href="/ads/city-2/">Северск</a></li><li><a href="/ads/city-1/">Томск</a></li><li><a href="/ads/city-22/">Ханты-Мансийск</a></li>		</ul>
	</li>
	<li><a href="/index.php?c=1&amp;content=add_ads">Добавить объявление</a></li>
	
	<li><a href="#">Справочная информация&nbsp;<i class="fa fa-caret-down"></i></a>
		<ul class="top_submenu" style="background:#f2f2f2;">
			<li><a href="/index.php?c=1&amp;content=text&amp;id=2">Виды объявлений</a></li>
			<li><a href="/index.php?c=1&amp;content=text&amp;id=4">Экспресс-реклама</a></li>
			<li><a href="/index.php?c=1&amp;content=text&amp;id=1">Правила</a></li>
			<li><a href="/index.php?c=1&amp;content=text&amp;id=5">Прайс</a></li>
            <li><a href="/ads/city-1/ad-30172/">Партнёрская программа</a></li>
		</ul>
	</li>
</ul>
		</div>
		<div style="float:left;">
			<a class="logo_link" href="/ads/city-1/"><i class="fa fa-camera"></i>&nbsp;Фотодоска.ру</a>
		</div>
	</div>
</div>
<div class="width_1088px" style="clear:both; margin-top:10px;">
	<div id="left_column" class="width_170px float_left height_100percent bottom_padding_10">
	<div class="width_100p open_sans" style="font-size:14px; background:#f2f2f2">
<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Статистика</h2>
<ul class="sidebar_menu">
<li style="background:#e6e6e6;"><p><i class="fa fa-user"></i>&nbsp;Пользователи</p></li>
<li><p>Онлайн: 167</p></li>
<li style="background:#e6e6e6;"><p><i class="fa fa-file-text"></i>&nbsp;Объявления</p></li>
<li><a href="/index.php?c=1&amp;content=statistic&amp;var=today" class="sidebar_link open_sans">Сегодня: 35</a></li>
<li><a href="/index.php?c=1&amp;content=statistic&amp;var=yesterday" class="sidebar_link open_sans">Вчера: 1222</a></li>
<li><p>Неделя: 5439</p></li>

</ul>
</div>
<div class="width_100p top_margin_0 open_sans" style="font-size:14px; background:#f2f2f2">

<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Авторизация</h2>
<ul class="sidebar_menu">
<li><a href="/index.php?c=1&amp;content=enter" class="sidebar_link open_sans">Вход</a></li>
<li><a href="/index.php?c=1&amp;content=registration" class="sidebar_link open_sans">Регистрация</a></li>
</ul>

</div>
<div class="width_100p open_sans" style="font-size:14px; background:#f2f2f2">

<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Рубрики</h2>
<ul class="sidebar_menu">
<li><a href="/ads/city-1/rubric-282/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;! Знакомства</a></li><li><a href="/ads/city-1/rubric-29/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Apple</a></li><li><a href="/ads/city-1/rubric-1/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Автомобили</a></li><li><a href="/ads/city-1/rubric-2/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Аудио</a></li><li><a href="/ads/city-1/rubric-110/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Бизнес</a></li><li><a href="/ads/city-1/rubric-129/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Бытовая техника</a></li><li><a href="/ads/city-1/rubric-153/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Детям</a></li><li><a href="/ads/city-1/rubric-147/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Для дома</a></li><li><a href="/ads/city-1/rubric-162/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Животные</a></li><li><a href="/ads/city-1/rubric-270/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Защита</a></li><li><a href="/ads/city-1/rubric-31/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Компьютеры</a></li><li><a href="/ads/city-1/rubric-78/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Консоли</a></li><li><a href="/ads/city-1/rubric-175/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Красота</a></li><li><a href="/ads/city-1/rubric-46/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Мебель</a></li><li><a href="/ads/city-1/rubric-126/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Муз. инструменты</a></li><li><a href="/ads/city-1/rubric-263/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Недвижимость</a></li><li><a href="/ads/city-1/rubric-135/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Одежда</a></li><li><a href="/ads/city-1/rubric-269/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Охота/Рыбалка</a></li><li><a href="/ads/city-1/rubric-186/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Планшеты</a></li><li><a href="/ads/city-1/rubric-198/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Прокат</a></li><li><a href="/ads/city-1/rubric-199/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Прочие услуги</a></li><li><a href="/ads/city-1/rubric-113/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Работа</a></li><li><a href="/ads/city-1/rubric-205/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Разное</a></li><li><a href="/ads/city-1/rubric-206/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Спорт</a></li><li><a href="/ads/city-1/rubric-17/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Телефоны</a></li><li><a href="/ads/city-1/rubric-3/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Фото/видео</a></li><li><a href="/ads/city-1/rubric-169/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Хобби/Искусство</a></li><li><a href="/ads/city-1/rubric-134/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Часы</a></li><li><a href="/ads/city-1/rubric-133/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Куплю</a></li><li><a href="/ads/city-1/rubric-279/" class="sidebar_link open_sans"><i class="fa fa-caret-right"></i>&nbsp;Форум - Общение</a></li></ul>

</div>
<div class="width_100p open_sans" style="font-size:14px; padding-bottom:5px; background:#F2F2F2;">

<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Интересное</h2>
<div style="height:600px; width:160px; background:#F2F2F2; margin-left:5px; margin-top:5px;">
<!-- Яндекс.Директ -->
<!--<div id="yandex_ad_sky"></div>
<script type="text/javascript">
(function(w, d, n, s, t) {
w[n] = w[n] || [];
w[n].push(function() {
Ya.Direct.insertInto(121049, "yandex_ad_sky", {
ad_format: "direct",
type: "160x600",
site_bg_color: "FFFFFF",
header_bg_color: "F2F2F2",
bg_color: "F2F2F2",
title_color: "000000",
url_color: "006600",
text_color: "666666",
hover_color: "0066FF",
favicon: true,
no_sitelinks: false
});
});
t = d.getElementsByTagName("script")[0];
s = d.createElement("script");
s.src = "//an.yandex.ru/system/context.js";
s.type = "text/javascript";
s.async = true;
t.parentNode.insertBefore(s, t);
})(window, document, "yandex_context_callbacks");
</script>
	-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-2695058290448089"
     data-ad-slot="1710180936"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

</div>
<div class="width_100p open_sans" style="font-size:14px; padding-bottom:5px; text-align:center;  background:#e6e6e6">

<h2 class="block_header ios_orange open_sans" style="font-weight:300; margin-bottom:10px; text-align:left;">Счётчики</h2>

                    <span style="margin:0;padding:0" id="tbec"><a href="http://www.tbex.ru/#site/photodoska.ru">TBEx</a><script type="text/javascript">setTimeout(function(){var s=document.createElement("SCRIPT");s.type="text/javascript";s.src="http://c.tbex.ru/p/5!8816!photodoska.ru!c.js?rev=4-"+(new Date().getTime());(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(s)},1);</script></span><noscript><a href="http://www.tbex.ru/site/photodoska.ru/"><img src="http://c.tbex.ru/p/5!8816!photodoska.ru!c.gif" alt="www.tbex.ru" /></a></noscript>
					<!-- Yandex.Metrika informer -->
					<a href="https://metrika.yandex.ru/stat/?id=24168766&amp;from=informer"
					target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/24168766/3_0_FFFFCDFF_FADFADFF_0_pageviews"
					style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:24168766,lang:'ru'});return false}catch(e){}"/></a>
					<!-- /Yandex.Metrika informer -->

					<!-- Yandex.Metrika counter -->
					<script type="text/javascript">
					(function (d, w, c) {
						(w[c] = w[c] || []).push(function() {
							try {
								w.yaCounter24168766 = new Ya.Metrika({id:24168766,
										webvisor:true,
										clickmap:true,
										trackLinks:true,
										accurateTrackBounce:true});
							} catch(e) { }
						});

						var n = d.getElementsByTagName("script")[0],
							s = d.createElement("script"),
							f = function () { n.parentNode.insertBefore(s, n); };
						s.type = "text/javascript";
						s.async = true;
						s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

						if (w.opera == "[object Opera]") {
							d.addEventListener("DOMContentLoaded", f, false);
						} else { f(); }
					})(document, window, "yandex_metrika_callbacks");
					</script>
					<noscript><div><img src="//mc.yandex.ru/watch/24168766" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
					<!-- /Yandex.Metrika counter -->
					<!--LiveInternet counter--><script type="text/javascript">document.write("<a href='http://www.liveinternet.ru/click' target=_blank><img src='//counter.yadro.ru/hit?t14.7;r" + escape(document.referrer) + ((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)) + ";u" + escape(document.URL) + ";" + Math.random() + "' border=0 width=88 height=31 alt='' title='LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня'><\/a>")</script><!--/LiveInternet-->


</div>
<div class="width_100p open_sans" style="font-size:14px; padding-bottom:5px; background:#f2f2f2">

<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Контакты</h2>
<div style="padding:5px; text-align:center; font-weight:bold; font-size:12px;">

photodoska@gmail.com<br />

</div>

</div>

	</div>
	
	<div class="width_170px float_right height_100percent">
	<div class="width_100p open_sans" style="font-size:14px; background:#f2f2f2">
<h2 class="block_header ios_orange open_sans" style="font-weight:300;">Твиттер</h2>
<ul id="twitter" data-id="0">
	<li id="tweet_159985">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Могу поменять на такой же миник, 32 гб без 3г. Цены почти одинаковы" href="/ads/city-1/ad-281879/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/771a04eef587072f8cc49c052256a365.jpeg" alt="Ipad mini" />
				<div style="width:125px; float:left;">
				Могу поменять на такой же миник,...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159984">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="nekls, нетГость, нет" href="/ads/city-1/ad-282013/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/517746fbbbd92d37fb26adc56501eac2.jpeg" alt="продам срочно" />
				<div style="width:125px; float:left;">
				nekls, нетГость, нет				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159983">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="обмен интересен?" href="/ads/city-1/ad-281939/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/7331fbb2470911ad2c37a2cb5f227a57.jpeg" alt="Продам" />
				<div style="width:125px; float:left;">
				обмен интересен?				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159982">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Продам айфон 4 срочно
Писать в лс" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				Продам айфон 4 срочно
Писать в лс				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159981">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="то,что на заборе написано....только в барельефе или линогравюре))))..." href="/ads/city-1/ad-281777/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/9281f86292e9c95797872432b6ca46e5.jpeg" alt="АЭРОГРАФИЯ" />
				<div style="width:125px; float:left;">
				то,что на заборе...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159980">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="может проще отремонтировать его?!...искать то долго можно" href="/ads/city-1/ad-282072/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/26-08-14/0ec4f33483e4cf8d30013a4995bf7d2c.jpeg" alt="Куплю Зарядное устройство" />
				<div style="width:125px; float:left;">
				может проще отремонтировать...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159979">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="го на айпад мини?" href="/ads/city-1/ad-282013/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/517746fbbbd92d37fb26adc56501eac2.jpeg" alt="продам срочно" />
				<div style="width:125px; float:left;">
				го на айпад мини?				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159978">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="что там будет  за 15 тысяч?" href="/ads/city-1/ad-281777/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/9281f86292e9c95797872432b6ca46e5.jpeg" alt="АЭРОГРАФИЯ" />
				<div style="width:125px; float:left;">
				что там будет  за 15 тысяч?				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159977">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="На фото - А101" href="/ads/city-1/ad-278926/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/23-08-14/05c05f567b07299a2c3dc664bd04e4b2.jpeg" alt="продам пневмат" />
				<div style="width:125px; float:left;">
				На фото - А101				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159976">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, спасибо брат :)" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				Гость, спасибо брат :)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159975">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, ссылка есть?пока думаю о продаже,так что подумаю." href="/ads/city-1/ad-282071/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/056db15ab212ddec5946ca395c1e5cef.jpeg" alt="Продам" />
				<div style="width:125px; float:left;">
				Гость, ссылка есть?пока думаю о...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159974">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Обмен на галакси айс 3?состояние нормальное.?" href="/ads/city-1/ad-282071/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/056db15ab212ddec5946ca395c1e5cef.jpeg" alt="Продам" />
				<div style="width:125px; float:left;">
				Обмен на галакси айс 3?состояние...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159973">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=")...а ценник норм,главное барыгам не продавать,а то тут ушлых как на районе..." href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				)...а ценник норм,главное барыгам...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159972">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, обмен на ps3 ?" href="/ads/city-1/ad-282013/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/517746fbbbd92d37fb26adc56501eac2.jpeg" alt="продам срочно" />
				<div style="width:125px; float:left;">
				Гость, обмен на ps3 ?				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159971">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Это оченЬ заметно кстати)" href="/ads/city-1/ad-281221/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/644bb5d581db0d333e2161e1e31290bd.jpeg" alt="часы porsche" />
				<div style="width:125px; float:left;">
				Это оченЬ заметно кстати)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159970">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, с аккумулятором, состояние на 4+" href="/ads/city-1/ad-281956/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/005839052543bc46efc51414a533625c.jpeg" alt="UPS " />
				<div style="width:125px; float:left;">
				Гость, с аккумулятором,...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159969">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Может у кого есть?" href="/ads/city-1/ad-282072/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/26-08-14/0ec4f33483e4cf8d30013a4995bf7d2c.jpeg" alt="Куплю Зарядное устройство" />
				<div style="width:125px; float:left;">
				Может у кого есть?				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159968">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="За 7 продаю айфон 4 16гб
Писать в лс срочно" href="/ads/city-1/ad-278790/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/23-08-14/d67c853b31e8d083bb44e405316fab80.jpeg" alt="iphone 4" />
				<div style="width:125px; float:left;">
				За 7 продаю айфон 4 16гб
Писать в лс...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159967">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="namespace, ну я же не зря написал дилемма.
А прирост на самом деле 1866 на 2400 хороший, лишь бы процессор поддерживал..." href="/ads/city-1/ad-276877/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/22-08-14/f0f48a7702b9d099c9b44ea20d4c97f2.jpeg" alt="КУПЛЮ АМ3+ FM2+" />
				<div style="width:125px; float:left;">
				namespace, ну я же не зря написал...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159966">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, вот блин подкинул ложку дёгтя :)так то дизайн прикольный" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				Гость, вот блин подкинул ложку...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159964">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="89131189470,без симки(" href="/ads/city-1/ad-277056/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/22-08-14/996ffc4e86a648459e53ed1d74d6e022.jpeg" alt="Продам Honda JDM" />
				<div style="width:125px; float:left;">
				89131189470,без симки(				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159963">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="xiaomi не рассматривай,запчасти только из китая...акб очень слабая,менять через год" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				xiaomi не рассматривай,запчасти...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159962">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Продам шипы Континенталь" href="/ads/city-1/ad-281981/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/21239cc750302f49173d30802383ae1f.jpeg" alt="Продам 2баллонаШИПЫContinental" />
				<div style="width:125px; float:left;">
				Продам шипы Континенталь				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159961">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="кюгенпротзессор,епть...)))" href="/ads/city-1/ad-262233/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/11-08-14/504142f350328d7311ba6f7219b7d39e.jpeg" alt="Процессор кухонный" />
				<div style="width:125px; float:left;">
				кюгенпротзессор,епть...)))				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159960">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="прошу прощения забыл указать предпочитаемые модели 
sgs s4
sgs note 2
sgs note 3
2 сим i new 3 13Mpix
Xiaomi MI3 16Gb
iphone 5
iphone 5s" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				прошу прощения забыл указать...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159959">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="продали ужы" href="/ads/city-1/ad-278790/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/23-08-14/d67c853b31e8d083bb44e405316fab80.jpeg" alt="iphone 4" />
				<div style="width:125px; float:left;">
				продали ужы				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159957">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="какая цена?????????????" href="/ads/city-1/ad-221907/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/10-07-14/6963fde43217b34dc23ed20fc2f5986f.jpeg" alt="Велотренажер &quot;Кеттлер консул&quot;" />
				<div style="width:125px; float:left;">
				какая цена?????????????				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159954">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Обмен на iPhone 4 8гб отс +доплата" href="/ads/city-1/ad-281665/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/be8d49dbe764c4667c5a5461505458fa.jpeg" alt="Обмен k900 32gb" />
				<div style="width:125px; float:left;">
				Обмен на iPhone 4 8гб отс +доплата				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159953">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="куплю 3200" href="/ads/city-1/ad-280402/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/24-08-14/f414228a393497065a14c0296c3db565.jpeg" alt="штиль оригинал " />
				<div style="width:125px; float:left;">
				куплю 3200				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159951">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="епта, да это ж настоящее дерево!!!!...а все настоящее дерево-это MADE`n`JAPAN...клевый звук у нее был когда..." href="/ads/city-1/ad-272262/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/18-08-14/d5bf5e739c2a75a2781520445d870eb2.jpeg" alt=" JVC SK 12a" />
				<div style="width:125px; float:left;">
				епта, да это ж настоящее...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159949">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Продам простую 4
СРОЧНО!!!
Писать в лс" href="/ads/city-1/ad-281992/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/a623016bf43a94f0f983d0caae8a2c5f.jpeg" alt="обмен 4 ы" />
				<div style="width:125px; float:left;">
				Продам простую 4
СРОЧНО!!!
Писать...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159948">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="если вы обиделись за смайлик то зря, если у кого и есть такая память то за сотку гиг не отдадут :)
и всё ж..." href="/ads/city-1/ad-281837/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/e5dab3b024e2a43d8381c15dbb5c28d1.jpeg" alt="Куплю DDR" />
				<div style="width:125px; float:left;">
				если вы обиделись за смайлик то...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159946">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Посмотри я там выложил объяву с фото чуть выше!!!" href="/ads/city-1/ad-281874/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/b98a0eee481c6e3fa692565c0dc2fac4.jpeg" alt=" литьё на 14 с летней резиной" />
				<div style="width:125px; float:left;">
				Посмотри я там выложил объяву с...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159945">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=":)" href="/ads/city-1/ad-209458/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/01-07-14/98ff80368882f5ce9efcaff183e27c8e.jpeg" alt="4ядра S775 SSD64Gb + 320Gb " />
				<div style="width:125px; float:left;">
				:)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159944">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=":)" href="/ads/city-1/ad-209458/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/01-07-14/98ff80368882f5ce9efcaff183e27c8e.jpeg" alt="4ядра S775 SSD64Gb + 320Gb " />
				<div style="width:125px; float:left;">
				:)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159943">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=":)" href="/ads/city-1/ad-209458/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/01-07-14/98ff80368882f5ce9efcaff183e27c8e.jpeg" alt="4ядра S775 SSD64Gb + 320Gb " />
				<div style="width:125px; float:left;">
				:)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159942">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=":)" href="/ads/city-1/ad-239451/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-07-14/977a7601d163062db5edfcfef73912c4.jpeg" alt="office pc" />
				<div style="width:125px; float:left;">
				:)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159941">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Kobasen, fm2+ как и am3+ станут неактуальны только когда ddr4 придет в массовый потребительский сегмент (наверно через..." href="/ads/city-1/ad-276877/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/22-08-14/f0f48a7702b9d099c9b44ea20d4c97f2.jpeg" alt="КУПЛЮ АМ3+ FM2+" />
				<div style="width:125px; float:left;">
				Kobasen, fm2+ как и am3+ станут...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159939">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="за 1100 возьму" href="/ads/city-1/ad-281433/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/cbb8306e30a6be659ec06b5cac265aa5.jpeg" alt="Новый WD 1 Tb" />
				<div style="width:125px; float:left;">
				за 1100 возьму				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159938">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Если что за 4 5 заберу!" href="/ads/city-1/ad-281427/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/2e438cde3e6e9669306315441f3e4924.jpeg" alt="ARDO" />
				<div style="width:125px; float:left;">
				Если что за 4 5 заберу!				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159937">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title=":)" href="/ads/city-1/ad-259674/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/09-08-14/806176e5de619ad2fb8f98062a1e85a0.jpeg" alt="Связка S775 + память + кулер" />
				<div style="width:125px; float:left;">
				:)				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159935">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="продам айфон 4
срочно! Писать в лс" href="/ads/city-1/ad-272133/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/18-08-14/d53cd2f16f4f47a1d44cf3ab1e26cce6.jpeg" alt="Продам CD player Sony " />
				<div style="width:125px; float:left;">
				продам айфон 4
срочно! Писать в лс				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159934">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="За 4 тр. 1:10 можно взять тогоже качества." href="/ads/city-1/ad-244087/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/29-07-14/5950dcde0b403f889bb5e7fcde21d1a6.jpeg" alt="Hsp caribe 50 км|ч Срооооочнооооо" />
				<div style="width:125px; float:left;">
				За 4 тр. 1:10 можно взять тогоже...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159930">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="одна решетка чего стоит!" href="/ads/city-1/ad-272262/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/18-08-14/d5bf5e739c2a75a2781520445d870eb2.jpeg" alt=" JVC SK 12a" />
				<div style="width:125px; float:left;">
				одна решетка чего стоит!				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159929">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="продам 4
срочно" href="/ads/city-1/ad-281962/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/d48f912abce8d3be07f634bdadbda428.jpeg" alt="Продам iPhone 5" />
				<div style="width:125px; float:left;">
				продам 4
срочно				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159928">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="За 3тр. могу завтра забрать(если дифы живые)" href="/ads/city-1/ad-258429/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/08-08-14/6972e52106fe4b70a085cb9582923cb6.jpeg" alt="maverick strada xt evo" />
				<div style="width:125px; float:left;">
				За 3тр. могу завтра забрать(если...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159927">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="мдауж...." href="/ads/city-1/ad-272133/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/18-08-14/d53cd2f16f4f47a1d44cf3ab1e26cce6.jpeg" alt="Продам CD player Sony " />
				<div style="width:125px; float:left;">
				мдауж....				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159926">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Вы цену то  -правильно написали ???????????? он в магазине дешевле стоит 
http://www.top-shop.ru/product/63015-prorab-forward-162-igbt/
а это где..." href="/ads/city-1/ad-281363/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/82e6f6bdb758a0b829c7d057093d9abf.jpeg" alt="Сварочник" />
				<div style="width:125px; float:left;">
				Вы цену то  -правильно написали...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159925">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="звоите в любое время" href="/ads/city-1/ad-282013/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/517746fbbbd92d37fb26adc56501eac2.jpeg" alt="продам срочно" />
				<div style="width:125px; float:left;">
				звоите в любое время				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159924">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Buyertomsk, Там должны быть молекулы сероводорода США, внутри." href="/ads/city-1/ad-280378/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/24-08-14/37f3909ccb3dc7f986061e142fabf8ad.jpeg" alt="Продам Sony PlayStation 4." />
				<div style="width:125px; float:left;">
				Buyertomsk, Там должны быть молекулы...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159923">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="...не нужно стесняться...
сезон то не за горами)))" href="/ads/city-1/ad-281784/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/25-08-14/165c922f0ada6164d4930489c71cfc3d.jpeg" alt="из Англии" />
				<div style="width:125px; float:left;">
				...не нужно стесняться...
сезон то...				</div>			
			</a>
		</div>
	</li>
		<li id="tweet_159921">
		<div style="clear:both;">
			<a lang="ru" class="twitter_link" style="display:block; line-height:16px; word-wrap:break-word; overflow:hidden" title="Гость, покраска дисков от 2500 до 5000 за комплект!" href="/ads/city-1/ad-103157/">		
				<img style="float:left; width:30px; height:30px;" src="http://photodoska.ru/upload/23-04-14/fcae6f15c8dbfd703cb7068d262d1836.jpeg" alt="Жидкая резина Rubber Paint" />
				<div style="width:125px; float:left;">
				Гость, покраска дисков от 2500 до...				</div>			
			</a>
		</div>
	</li>
	</ul>
</div>
	</div>
	
	<div class="width_728px left_margin_10 float_left height_100percent">
	<div class="block_header open_sans ios_orange" style="font-size:16px; padding:0; font-weight:300;">
<form method="get" action="/index.php">
<input type="hidden" name="c" value="1" />
<input type="hidden" name="content" value="search" />

<input class="search_field" style="background:#fff; color:#000; height:25px; width:588px; margin-left:2px; padding-left:10px;" type="text" name="q" value="Найти " />
<button type="submit" class="btn search_button ios_orange" style="height:29px; margin:0px; width:120px;">Поиск</button>

</form>
</div>
	
	<form method="post" action="/index.php?action=add_ads">
	<div class="open_sans width_728px top_margin_10" style="text-align:center;">
		<h2 class="open_sans" style="font-weight:300; text-align:center;">Добавление объявления</h2>
	</div>
	<div class="open_sans width_349px float_left round_padding_10 right_padding_5 top_margin_10 bottom_margin_10" style="text-align:center; background:#e6e6e6;">
		<h4 class="open_sans" style="font-weight:300; text-align:left;">Ваш город:</h4>
		<select name="main_city_id" class="width_100p top_margin_10 city_select round_padding_5" style="border:1px solid #fff">
		<option value="2">Северск</option><option selected value="1">Томск</option><option value="22">Ханты-Мансийск</option>		</select>
	</div>
	<div class="open_sans width_349px float_right round_padding_10 left_padding_5 top_margin_10 bottom_margin_10" style="text-align:center; background:#e6e6e6;">
		<h4 class="open_sans" style="font-weight:300; text-align:left;">Выберите рубрику:</h4>
		<select name="rubric_id" class="width_100p top_margin_10 round_padding_5 validate_rubric" style="border:1px solid #fff">
		<option value="0">Выберите рубрику...</option>
		<option style="background:#ccc" value="282">&ndash;&nbsp;! Знакомства&nbsp;&ndash;</option><option style="background:#ccc" value="29">&ndash;&nbsp;Apple&nbsp;&ndash;</option><option value="39">Аксессуары Apple</option><option value="36">iMac/Mac Pro</option><option value="275">MacBook</option><option value="34">iPad</option><option value="33">iPhone</option><option value="35">iPod</option><option value="118">Услуги</option><option style="background:#ccc" value="1">&ndash;&nbsp;Автомобили&nbsp;&ndash;</option><option value="40">Автозвук</option><option value="41">Аксессуары</option><option value="86">Грузовые</option><option value="38">Запчасти</option><option value="85">Иномарки</option><option value="42">Колеса</option><option value="88">Мототехника</option><option value="89">Отечественные</option><option value="90">Скутеры</option><option value="43">Спецтехника</option><option value="91">Тюнинг</option><option value="87">Другое</option><option value="44">Услуги</option><option style="background:#ccc" value="2">&ndash;&nbsp;Аудио&nbsp;&ndash;</option><option value="120">Акустика</option><option value="121">MP3-плейеры</option><option value="122">Наушники</option><option value="139">Аксессуары</option><option value="125">Другое</option><option value="231">Запчасти</option><option value="123">Услуги</option><option style="background:#ccc" value="110">&ndash;&nbsp;Бизнес&nbsp;&ndash;</option><option value="112">Продам</option><option value="111">Куплю</option><option style="background:#ccc" value="129">&ndash;&nbsp;Бытовая техника&nbsp;&ndash;</option><option value="130">Телевизоры</option><option value="131">Холодильники</option><option value="132">Стиральные</option><option value="141">Плиты</option><option value="144">Аксессуары</option><option value="142">Другое</option><option value="232">Запчасти</option><option value="143">Услуги</option><option style="background:#ccc" value="153">&ndash;&nbsp;Детям&nbsp;&ndash;</option><option value="154">Автокресла</option><option value="156">Обувь</option><option value="157">Одежда</option><option value="155">Игрушки</option><option value="158">Коляски</option><option value="161">Аксессуары</option><option value="159">Другое</option><option value="160">Услуги</option><option style="background:#ccc" value="147">&ndash;&nbsp;Для дома&nbsp;&ndash;</option><option value="148">Посуда</option><option value="149">Стройматериалы</option><option value="150">Инструмент</option><option value="151">Другое</option><option value="152">Услуги</option><option style="background:#ccc" value="162">&ndash;&nbsp;Животные&nbsp;&ndash;</option><option value="163">Собаки</option><option value="164">Кошки</option><option value="165">Птицы</option><option value="167">Аксессуары</option><option value="166">Другое</option><option value="168">Услуги</option><option style="background:#ccc" value="270">&ndash;&nbsp;Защита&nbsp;&ndash;</option><option value="271">Оружие</option><option value="272">Видеорегистраторы</option><option value="273">Сигнализации</option><option value="274">Видеонаблюдение</option><option style="background:#ccc" value="31">&ndash;&nbsp;Компьютеры&nbsp;&ndash;</option><option value="109">Блоки питания</option><option value="92">Видеокарты</option><option value="94">Жесткие диски</option><option value="280">Звуковые карты</option><option value="95">Клавиатуры</option><option value="96">Мат. платы</option><option value="97">Сетевое</option><option value="98">Мониторы</option><option value="99">Мыши</option><option value="100">Настольные</option><option value="101">Нетбуки</option><option value="102">Ноутбуки</option><option value="103">Память</option><option value="104">Приводы</option><option value="105">Принтеры</option><option value="106">Процессоры</option><option value="108">Флешки</option><option value="281">SSD  (NEW!)</option><option value="93">Другое</option><option value="223">Запчасти</option><option value="107">Услуги</option><option style="background:#ccc" value="78">&ndash;&nbsp;Консоли&nbsp;&ndash;</option><option value="79">PlayStation</option><option value="80">X-Box</option><option value="81">Nintendo</option><option value="83">Игры</option><option value="82">Аксессуары</option><option value="233">Запчасти</option><option value="84">Услуги</option><option style="background:#ccc" value="175">&ndash;&nbsp;Красота&nbsp;&ndash;</option><option value="268">Здоровье</option><option value="176">Косметика</option><option value="182">Маникюр</option><option value="180">Массаж</option><option value="177">Парикмахерские</option><option value="183">Украшения</option><option value="181">Фитнес</option><option value="178">Аксессуары</option><option value="179">Другое</option><option style="background:#ccc" value="46">&ndash;&nbsp;Мебель&nbsp;&ndash;</option><option value="47">Кухни</option><option value="50">Гостиные</option><option value="52">Диваны</option><option value="49">Детские</option><option value="48">Спальни</option><option value="53">Матрасы</option><option value="51">Прихожие</option><option value="234">Фурнитура</option><option value="54">Другое</option><option value="117">Услуги</option><option style="background:#ccc" value="126">&ndash;&nbsp;Муз. инструменты&nbsp;&ndash;</option><option value="127">Куплю</option><option value="128">Продам</option><option value="237">Запчасти</option><option style="background:#ccc" value="263">&ndash;&nbsp;Недвижимость&nbsp;&ndash;</option><option value="264">Куплю</option><option value="265">Продам</option><option value="266">Сдам</option><option value="267">Сниму</option><option style="background:#ccc" value="135">&ndash;&nbsp;Одежда&nbsp;&ndash;</option><option value="136">Мужская одежда</option><option value="184">Мужская обувь</option><option value="137">Женская одежда</option><option value="185">Женская обувь</option><option value="276">Аксессуары</option><option style="background:#ccc" value="269">&ndash;&nbsp;Охота/Рыбалка&nbsp;&ndash;</option><option style="background:#ccc" value="186">&ndash;&nbsp;Планшеты&nbsp;&ndash;</option><option value="187">Acer</option><option value="189">Asus</option><option value="221">DNS</option><option value="220">HP</option><option value="219">Huawei</option><option value="218">Lenovo</option><option value="191">Motorola</option><option value="192">Rover</option><option value="227">Ritmix</option><option value="193">Samsung</option><option value="228">Sony</option><option value="194">ViewSonic</option><option value="197">Китайские</option><option value="195">Прочие</option><option value="217">Аксессуары</option><option value="222">Запчасти</option><option value="196">Услуги</option><option style="background:#ccc" value="198">&ndash;&nbsp;Прокат&nbsp;&ndash;</option><option style="background:#ccc" value="199">&ndash;&nbsp;Прочие услуги&nbsp;&ndash;</option><option value="200">Грузоперевозки</option><option value="201">Досуг</option><option value="202">Обучение</option><option value="203">Ремонт</option><option value="204">Другое</option><option style="background:#ccc" value="113">&ndash;&nbsp;Работа&nbsp;&ndash;</option><option value="114">Резюме</option><option value="116">Вакансии</option><option style="background:#ccc" value="205">&ndash;&nbsp;Разное&nbsp;&ndash;</option><option style="background:#ccc" value="206">&ndash;&nbsp;Спорт&nbsp;&ndash;</option><option value="207">Велосипеды</option><option value="213">Тренажеры</option><option value="212">Спорт. питание</option><option value="211">Скейты</option><option value="277">Сноуборды</option><option value="210">Одежда</option><option value="209">Коньки, лыжи</option><option value="208">Инвентарь</option><option value="215">Другое</option><option value="214">Аксессуары</option><option value="216">Услуги</option><option style="background:#ccc" value="17">&ndash;&nbsp;Телефоны&nbsp;&ndash;</option><option value="72">3G/4G модемы</option><option value="61">Acer</option><option value="37">Alcatel</option><option value="62">Asus</option><option value="64">Dell</option><option value="225">DNS</option><option value="71">Fly</option><option value="65">HTC</option><option value="230">Huawei</option><option value="229">Lenovo</option><option value="66">LG</option><option value="67">Motorola</option><option value="68">Nokia</option><option value="226">Prestigio</option><option value="45">Samsung</option><option value="262">Sony</option><option value="73">Siemens</option><option value="75">Китайские</option><option value="76">Прочие</option><option value="74">Аксессуары</option><option value="224">Запчасти</option><option value="77">Услуги</option><option style="background:#ccc" value="3">&ndash;&nbsp;Фото/видео&nbsp;&ndash;</option><option value="55">Видеокамеры</option><option value="58">Вспышки</option><option value="60">Зеркалки</option><option value="57">Объективы</option><option value="56">Фотоаппараты</option><option value="124">Фоторамки</option><option value="59">Аксессуары</option><option value="140">Другое</option><option value="235">Запчасти</option><option value="119">Услуги</option><option style="background:#ccc" value="169">&ndash;&nbsp;Хобби/Искусство&nbsp;&ndash;</option><option value="170">Антиквариат</option><option value="171">Живопись</option><option value="172">Книги</option><option value="173">Нумизматика</option><option value="174">Другое</option><option style="background:#ccc" value="134">&ndash;&nbsp;Часы&nbsp;&ndash;</option><option value="145">Оригинальные</option><option value="146">Дубликаты</option><option value="236">Запчасти</option><option style="background:#ccc" value="133">&ndash;&nbsp;Куплю&nbsp;&ndash;</option><option value="238">Apple</option><option value="250">Муз. инструменты</option><option value="252">Фото/видео</option><option value="253">Работа</option><option value="254">Одежда</option><option value="255">Планшеты</option><option value="257">Разное</option><option value="258">Спорт</option><option value="259">Телефоны</option><option value="249">Мебель</option><option value="248">Красота</option><option value="247">Консоли</option><option value="239">Автомобили</option><option value="240">Аудио</option><option value="241">Бизнес</option><option value="242">Бытовая техника</option><option value="243">Детям</option><option value="244">Для дома</option><option value="245">Животные</option><option value="246">Компьютеры</option><option value="261">Часы</option><option style="background:#ccc" value="279">&ndash;&nbsp;Форум - Общение&nbsp;&ndash;</option>		</select>
	</div>

	
	<div class="open_sans width_708px round_padding_10 bottom_margin_10" style="position:relative; text-align:center; background:#e6e6e6; clear:both;  margin-bottom:203px;">
		<h4 class="open_sans" style="font-weight:300; text-align:left;">Заголовок объявления: (<input readonly type="text" name="count" style="width:28px; background:#e6e6e6; text-align:center" value="30"/> знаков осталось)
			<span class="tooltip" style="border-bottom:1px dotted #464451; color:#464451; cursor:pointer;" data-id="tooltip_title"><i class="fa fa-warning"></i></span>			
		</h4>
		<input type="text" maxlength="30" data-max-length="30" onKeyDown="limitText(this,this.form.count,30);" onKeyUp="limitText(this,this.form.count,30);" class="round_padding_5 top_margin_10 input_md width_698px title_for_google_search validate_title" style="border:1px solid #fff;" name="title" />
		
			<div id="tooltip_title" style="display:none; position:absolute; float:left; left:210px; top:-20px; z-index:10;">
				<div class="round_padding_10 open_sans" style="background:#464451; color:#fff; font-weight:300; line-height:normal;">
					Для лучшего представления вашего объявления, укажите в поле &laquo;Заголовок объявления&raquo; название вашего товара или услуги - так ваше объявление будет легче найти.
				</div>
			</div>
	</div>
	
	<div class="open_sans width_708px round_padding_10 bottom_margin_10 validate_content" style="position:relative; text-align:left; background:#e6e6e6; clear:both;">
		<h4 class="open_sans bottom_margin_10" style="font-weight:300; text-align:left;">Описание:
		<span class="tooltip" style="border-bottom:1px dotted #464451; color:#464451; cursor:pointer;" data-id="tooltip_text"><i class="fa fa-warning"></i></span>
		<a class="google_search" target="_blank" href="https://www.google.ru">Поиск в Google</a>
		</h4>
			<div id="tooltip_text" style="display:none; position:absolute; float:left; left:200px; top:-20px; z-index:10;">
				<div class="round_padding_10 open_sans" style="background:#464451; color:#fff; font-weight:300; line-height:normal;">
					Пожалуйста, не указывайте цену товара или услуги в объявлении. Цена, занесённая в поле &laquo;Цена&raquo; будет выделена крупным, заметным шрифтом.
				</div>
			</div>
		<textarea class="width_698px round_padding_5 top_margin_10 redactor validate_text" name="content"><br /><br /><br /><br /><br /><br /><br /><br /></textarea>
	</div>
	
	<div class="open_sans width_349px float_left round_padding_10 right_padding_5" style="text-align:center; background:#e6e6e6; margin-bottom:10px;">
		<h4 class="open_sans" style="font-weight:300; text-align:left;">Цена:</h4>
		<input type="text" name="price" class="top_margin_10 round_padding_5 validate_price" style="width:339px" />
	</div>
		<div class="open_sans width_349px float_right round_padding_10 left_padding_5 bottom_margin_10" style="text-align:center; background:#e6e6e6; margin-bottom:10px;">
		<h4 class="open_sans" style="font-weight:300; text-align:left;">Номер телефона:</h4>
		<input type="text" name="phonenumber" class="top_margin_10 round_padding_5 validate_phone" style="width:339px" value="" />
	</div>

		<div class="open_sans width_708px round_padding_10 bottom_margin_10" style="position:relative; text-align:left; background:#e6e6e6; clear:both;">
		<input id="rules_checkbox" type="checkbox" checked name="rules" value="1"/>&nbsp;<label for="rules_checkbox">
        			Я с <a target="_blank" href="http://photodoska.ru/index.php?c=1&content=text&id=1">правилами</a> согласен
			        </label>
	</div>
	<div class="open_sans width_708px round_padding_10 bottom_margin_10" style="position:relative; line-height:normal; text-align:left; background:#e6e6e6; clear:both;">
		<input id="comment_radio_1" type="radio"  disabled checked name="comment_denied" value="0"/>&nbsp;<label for="comment_radio_1">Разрешить комментирование</label>
				<span class="tooltip" style="border-bottom:1px dotted #464451; color:#464451; cursor:pointer;" data-id="tooltip_comment_denied"><i class="fa fa-warning"></i></span>
		<div id="tooltip_comment_denied" style="display:none; position:absolute; float:left; left:300px; top:-5px; z-index:10;">
			<div class="round_padding_10 open_sans" style="background:#464451; color:#fff; font-weight:300; line-height:normal;">
				Чтобы ограничить комментирование, необходимо зарегистрироваться
			</div>
		</div>
				<br />
		<input id="comment_radio_2" type="radio"  disabled name="comment_denied" value="1"/>&nbsp;<label for="comment_radio_2">Запретить комментирование <b>гостям</b></label><br />
		<input id="comment_radio_3" type="radio"  disabled name="comment_denied" value="2"/>&nbsp;<label for="comment_radio_3">Запретить комментирование <b>всем</b></label>

	</div>
	
	<div class="open_sans width_708px round_padding_10 bottom_margin_10" style="position:relative; text-align:center; background:#e6e6e6; clear:both;">
	<div id="hidden_inputs">
		<input id="hidden_cover_1" type="hidden" name="cover_1" />
		<input id="hidden_cover_2" type="hidden" name="cover_2" />
		<input id="hidden_cover_3" type="hidden" name="cover_3" />
		<input id="hidden_cover_4" type="hidden" name="cover_4" />
		<input id="hidden_cover_5" type="hidden" name="cover_5" />
		
		<input id="hidden_date" type="hidden" name="post_date" value="26-08-14" />
		<input id="hidden_photo_1" class="validate_photo1" type="hidden" name="photo_1" />
		<input id="hidden_photo_2" class="validate_photo2" type="hidden" name="photo_2" />
		<input id="hidden_photo_3" class="validate_photo3" type="hidden" name="photo_3" />
		<input id="hidden_photo_4" class="validate_photo4" type="hidden" name="photo_4" />
		<input id="hidden_photo_5" class="validate_photo5" type="hidden" name="photo_5" />
	</div>
		<button class="btn btn_red round_padding_5 validate_submit" style="background:#32c924;" type="submit">+ Добавить</button>
	</div>
</form>


<div class="open_sans width_708px round_padding_10 bottom_margin_10 validate_photo" style="position:absolute;  top:255px; text-align:left; height:161px; background:#e6e6e6; clear:both;">
	<h4 class="open_sans bottom_margin_10" style="font-weight:300; text-align:left;">Фото внутри объявления: 
	<a class="google_img_search" target="_blank" href="https://www.google.ru">Поиск в Google.Картинки</a>
	</h4>
				<div id="add_photo_1" class="float_left add_photo" style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_1" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_1" name="frame_photo_1"></iframe>
								<form id="upload_photo_1" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_1">
				<input type="hidden" name="date" value="26-08-14" />
				<input id="input_upload_photo_1" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
		</div>
				<div id="add_photo_2" class="float_left add_photo" style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_2" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_2" name="frame_photo_2"></iframe>
								<form id="upload_photo_2" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_2">
				<input type="hidden" name="date" value="26-08-14" />
				<input id="input_upload_photo_2" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
		</div>
				<div id="add_photo_3" class="float_left add_photo" style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_3" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_3" name="frame_photo_3"></iframe>
								<form id="upload_photo_3" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_3">
				<input type="hidden" name="date" value="26-08-14" />
				<input id="input_upload_photo_3" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
		</div>
				<div id="add_photo_4" class="float_left add_photo" style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; margin-right:9px; ">
			<div id="plus_photo_4" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_4" name="frame_photo_4"></iframe>
								<form id="upload_photo_4" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_4">
				<input type="hidden" name="date" value="26-08-14" />
				<input id="input_upload_photo_4" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
		</div>
				<div id="add_photo_5" class="float_left add_photo" style="position:relative; border:none; width:134px; height:136px; border: none; margin-bottom:10px; ">
			<div id="plus_photo_5" class="contaner" style="font-size:120px; display:block; color:#e6e6e6; position:absolute; top:5px; left:35px;">
			+
			</div>
			<div class="upload">
				<iframe style="display: none;" id="frame_photo_5" name="frame_photo_5"></iframe>
								<form id="upload_photo_5" method="post" enctype="multipart/form-data" action="/index.php?action=upload_photo" target="frame_photo_5">
				<input type="hidden" name="date" value="26-08-14" />
				<input id="input_upload_photo_5" class="upload_photo" type="file" style="display: block !important; width: 135px !important; height: 136px !important; cursor:pointer; opacity: 0 !important; overflow: hidden !important;" name="upload"/>
				</form>
			</div>  
		</div>
		</div>
	</div>

</div>
		<div id="footer" class="width_1088px" style="clear:both;">
		<h3 class="open_sans" style="font-weight:300; font-size:18px; color:#fff; margin-left:15px; padding-top:10px; padding-bottom:10px;">
			© 2006—2014 Фотодоска. Копирование запрещено.
		</h3>
	</div>
</div>

<div id="scroller" class="open_sans" style="display:none; position:fixed; bottom: 10px; right:10px; background:rgba(255,149,0,0.5); color:#000; cursor:pointer; width:100px; height:100px; text-align:center;">
<span style="font-size:60px;"><i class="fa fa-angle-up"></i></span><br />
<span style="font-size:12px;">Наверх</span>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script type="text/javascript" src="js/redactor.min.js"></script>
<script type="text/javascript" src="js/lang/ru.js"></script>
<script type="text/javascript" src="js/jquery.mask.js"></script>

<script type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    } else {
        limitCount.value = limitNum - limitField.value.length;
    }
}

$(function() {

$(window).scroll(function () {
	if ($(this).scrollTop() > 300) {$('#scroller').fadeIn();} else {$('#scroller').fadeOut();}
});

$('#scroller').click(function () {$('body,html').animate({scrollTop: 0}, 500); return false;});

$(".search_categories").click(function() {
	var category = $(this).attr("data-category");
	$(".search_results").hide();
	$("#search_"+category).show();
});

$(".search_field").click(function() {
	var title = $(this).val();
	if (title === 'Найти ') {$(this).val('');} else {}
});

$(".search_field").keyup(function() {
	var title = $(this).val();
	title = title.replace(" ","+");
	$(".search_button").attr("href","/index.php?c=1&content=search&q="+title);
});
	var error_rubric = 1;
$(".validate_rubric").css("border","1px solid #f00"); error_rubric = 1;	
$(".validate_rubric").change(function() {
	if ($(this).val() == 0) { $(".validate_rubric").css("border","1px solid #f00"); error_rubric = 1; } else { $(".validate_rubric").css("border","1px solid #fff"); error_rubric = 0; }
});
	
setInterval(function() {
	var validate_price_regexp = /^\d+$/;
	var validate_phone_regexp = /^[\-\d]+$/;
	
	var error_title = 1;
	var error_text = 1;
	var error_price = 1;
	var error_phone = 1;
	var error_photo = 1;
	if ($(".validate_title").val().replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,'') == '') { $(".validate_title").css("border","1px solid #f00"); error_title = 1;} else { $(".validate_title").css("border","1px solid #fff"); error_title = 0; }
	if ($(".validate_text").val().replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,'') == '') { $(".validate_content").css("border","1px solid #f00"); error_text = 1;} else { $(".validate_content").css("border","1px solid #fff"); error_text = 0;}
	if (validate_price_regexp.test($(".validate_price").val().replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,'')) == false) { $(".validate_price").css("border","1px solid #f00"); error_price = 1;} else { $(".validate_price").css("border","1px solid #fff"); error_price = 0;}
	if (validate_phone_regexp.test($(".validate_phone").val().replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,'')) == false) { $(".validate_phone").css("border","1px solid #f00"); error_phone = 1;} else { $(".validate_phone").css("border","1px solid #fff"); error_phone = 0; }
	if ($(".validate_photo1").val() == '') { $(".validate_photo").css("border","1px solid #f00"); error_photo = 1;} else { $(".validate_photo").css("border","1px solid #fff"); error_photo = 0;}
	if (error_rubric == 0 && error_title == 0 && error_text == 0 && error_price == 0 && error_phone == 0 && error_photo == 0) {
		$(".validate_submit").prop('disabled', false).css("background", "#32c924");
		
	} else {
		$(".validate_submit").prop('disabled', true).css("background", "#333");
	}	
	}, 500);

$(".validate_phone").mask("8-999-999-9999");
$(".city_checkbox").attr('checked', false).attr('disabled', true);
$(".title_for_google_search").keyup(function() {
	var title = $(this).val();
	var array_title = title.split(" ");
	title = title.replace(" ","+");
	$(".google_img_search").attr("href","https://www.google.ru/search?tbm=isch&q="+title);
	$(".google_search").attr("href","https://www.google.ru/search?q="+title);
});

$(".delete_photo").click(function() {
	var id = $(this).attr("id").split("_")[2];
	$("#hidden_photo_"+id).val('');
	$("#add_photo_"+id).css({'opacity':'0.2'});
	$(this).hide();
});

$(".upload_photo").change(function(){


var id = $(this).attr("id").split("_")[3];  
$("#upload_photo_"+id).submit();

$("#frame_photo_"+id).load(function () {
                iframeContents = $("#frame_photo_"+id)[0].contentWindow.document.body.innerHTML;
                var accept = iframeContents.split("_")[0];
				
				if (accept == 1) {
					var filename = iframeContents.split("_")[1];
					$("#plus_photo_"+id).hide();
					$("#add_photo_"+id).prepend('<img style="display:block; position:absolute; z-index:0; top:0px; max-width:135px; max-height:135px;" src="covers/'+filename+'" />');
					$("#hidden_photo_"+id).val(filename);
				} else {
				
				}
            });

});
$(".redactor").redactor({ lang:'ru' });


	$(".tooltip").hover(function () {
		var id = $(this).attr("data-id");
		$("#" + id).show();
	},
	function () {
		var id = $(this).attr("data-id");
		$("#" + id).hide();
	});

	
});
	
</script>
</body>
</html>
