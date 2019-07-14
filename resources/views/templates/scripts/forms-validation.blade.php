<script type="text/javascript">
$(document).ready(function() {
		"use strict";	

        var form_register = $('#register-form');
        var error_register = $('.alert-danger', form_register);
        var success_register = $('.alert-success', form_register);

        form_register.validate({
            errorElement: 'div', //default input error message container
            errorClass: 'vd_red', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                sponsor: {
                    minlength: 7,
                    required: true
                },
                username: {
                    minlength: 7,
                    required: true
                },
                firstname: {
                    minlength: 2,
                    required: true
                },
                lastname: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                is_active: {
                    required: true
                },				
                password: {
                    required: true
                },
                password_confirmation: {
                    required: true
                },				
            },
			
			errorPlacement: function(error, element) {
				if (element.parent().hasClass("vd_checkbox") || element.parent().hasClass("vd_radio")){
					element.parent().append(error);
				} else if (element.parent().hasClass("vd_input-wrapper")){
					error.insertAfter(element.parent());
				}else {
					error.insertAfter(element);
				}
			}, 
			
            invalidHandler: function (event, validator) { //display error alert on form submit              
					success_register.fadeOut(500);
					error_register.fadeIn(500);
					scrollTo(form_register,-100);

            },

            highlight: function (element) { // hightlight error inputs
		
				$(element).addClass('vd_bd-red');
				$(element).siblings('.help-inline').removeClass('help-inline fa fa-check vd_green mgl-10');

            },

            unhighlight: function (element) { // revert the change dony by hightlight
                $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
            },

            success: function (label, element) {
                label
                    .addClass('valid').addClass('help-inline fa fa-check vd_green mgl-10') // mark the current input as valid and display OK icon
                	.closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
				$(element).removeClass('vd_bd-red');
            },

            submitHandler: function (form) {
					success_register.fadeIn(500);
					error_register.fadeOut(500);
					scrollTo(form_register,-100);
                    form_register.submit();					
            }
        });
	
});
</script>