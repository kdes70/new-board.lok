$(document).ready(function() {

	// Левая навигация  
	$("ul.nav_sub").hide();
	$("li.listnav").click(function() {

		

		if($(this).attr('class') != 'active')
		{
			//$("ul.nav_sub").slideUp(400);
			$(this).next().slideToggle(400);

			$("li.listnav > a").removeClass('active');
			$(this+' > a').addClass('active');
		}else{

			$('li.listnav > a').removeClass('active');
			$('ul.nav_sub').slideUp(400);
		}
		//$(this).next().slideToggle(400);
	});
});