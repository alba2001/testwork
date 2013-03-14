//window.addEvent('domready', function() {
//	document.formvalidator.setHandler('fio',
//		function (value) {
//			regex=/^[^0-9]+$/;
//			return regex.test(value);
//	});
//	document.formvalidator.setHandler('square',
//		function (value) {
//			regex=/^[0-9]+$/;
//			return regex.test(value);
//	});
//	document.formvalidator.setHandler('ex_count',
//		function (value) {
//			regex=/^[0-9]+$/;
//			return regex.test(value);
//	});
//});
var FormValidator = new form_validator();
jQuery(document).ready(function($){
    $('#iform_email').focus();
    FormValidator.set_handler('iform_email',
            function (value) {
                    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                    return pattern.test(value);
    });
    // Не меньше 6-и символов, цифры, буквы и спецсимволы
    FormValidator.set_handler('iform_password2',
            function (value) {
                    var pattern=/^[a-zA-Z0-9!@#$%^&*_\[\]]{6,16}$/;
                    return pattern.test(value);
    });
    FormValidator.set_handler('iform_password1',
            function (value) {
                    var pattern=/^[a-zA-Z0-9!@#$%^&*_\[\]]{6,16}$/;
                    return pattern.test(value);
    });
    $('#sign_up_form').submit(function(e){
        
        var result = true;
        $('div.control-group').each(function(){
            if($(this).hasClass('error'))
            {
                result = false;
            }
        });
        if(result)
        {
            if($('#iform_password1').val() !=  $('#iform_password2').val())
            {
                e.preventDefault();
            }
        }
        else
        {
            e.preventDefault();
        }
    });
});
/**
 * Валидатор
 */
function form_validator(){
    this.set_handler = function(element, func){
        $('#'+element).blur(function(){
            var value = $(this).val();
            var parent_div = $(this).closest('div').addClass('error');
            if(func(value))
            {
                $(parent_div).removeClass('error');
            }
            else
            {
                $(parent_div).addClass('error');
            }
        });
    }
}
