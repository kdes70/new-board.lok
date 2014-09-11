$(document).ready(function($) {
	$("#add_adv").submit(function() {

		var aport = false;

		$(" :input[required]").each(function() {
			if($(this).val() === '')
			{
				$(this).after('<div class="error">Заполните поле </div>');
				aport = true;
			}// Если поле пустое
		});

	});//отпровляем форму
	
});//ready