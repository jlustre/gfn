
<script type="text/javascript" src="<?php echo asset('plugins/stellar/jquery.stellar.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/waypoints/waypoints.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/jquery-easing/jquery.easing.1.3.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {
	"use strict";
	
	var options = { 
		type: "POST",
		url:  $("#contact-form-widget").attr('action'),
		dataType: "json",
		success: function(data) {
			if (data.response == "success") {
				$("#contact-form-result div").addClass('hidden');
				$("#contact-form-result #success").removeClass('hidden');						
			} else if (data.response == "error") {
				$("#contact-form-result div").addClass('hidden');
				$("#contact-form-result #error").removeClass('hidden');	
				$("#contact-form-result #error").append(data.message);				
			} else if (data.response == "empty") {
				$("#contact-form-result div").addClass('hidden');
				$("#contact-form-result #empty").removeClass('hidden');						
			} else if (data.response == "unexpected") {
				$("#contact-form-result div").addClass('hidden');
				$("#contact-form-result #unexpected").removeClass('hidden');						
			}	
			$("#contact-form-widget").find('#contact-form-submit #spin').remove();
			$("#contact-form-widget").find('#contact-form-submit').removeClass('disabled').removeAttr('disabled').blur();	 

			$("#contact-form-widget").fadeOut(500, function(){
				$('#contact-form-result').fadeIn(500);
			});										
		},
		error: function() {
				$("#contact-form-result div").addClass('hidden');
				$("#contact-form-result #unexpected").removeClass('hidden');	
		}
	}; 	
	
	$("#contact-form-widget").validate({
		submitHandler: function(form) {			
			$(form).find('#contact-form-submit').prepend('<i id="spin" class="fa fa-spinner fa-spin mgr-10"></i>').addClass('disabled').attr('disabled');			
			$(form).ajaxSubmit(options);			
		},
		success: function(form){	
		}
	});	
	
	
	
	
	   $(".vd_testimonial .vd_carousel").carouFredSel({
			prev:{
				button : function()
				{
					return $(this).parent().parent().children('.vd_carousel-control').children('a:first-child')
				}
			},
			next:{
				button : function()
				{
					return $(this).parent().parent().children('.vd_carousel-control').children('a:last-child')
				}
			},		
			scroll: {
				fx: "crossfade",
				onBefore: function(){
						var target = "#front-1-clients";
						$(target).css("transition","all .5s ease-in-out 0s");				
					if ($(target).hasClass("vd_bg-soft-yellow")){						
						$(target).removeClass("vd_bg-soft-yellow");
						$(target).addClass("vd_bg-soft-red");		
					} else
					if ($(target).hasClass("vd_bg-soft-red")){						
						$(target).removeClass("vd_bg-soft-red");
						$(target).addClass("vd_bg-soft-blue");		
					} else
					if ($(target).hasClass("vd_bg-soft-blue")){						
						$(target).removeClass("vd_bg-soft-blue");
						$(target).addClass("vd_bg-soft-green");		
					} else
					if ($(target).hasClass("vd_bg-soft-green")){						
						$(target).removeClass("vd_bg-soft-green");
						$(target).addClass("vd_bg-soft-yellow");		
					} 					
				}
			},
			width: "auto",
			height: "responsive",
			responsive: true
			
		});
		
	    var slide = $('.slide-waypoint');		
		
		//Setup waypoints plugin
		slide.waypoint(function(direction) {
	//  		alert('Direction example triggered scrolling ' + direction);
			//cache the variable of the data-waypoint attribute associated with each slide
			var dataslide = $(this).attr('data-waypoint');
	
	
	
			//If the user scrolls up change the navigation link that has the same data-waypoint attribute as the slide to active and 
			//remove the active class from the previous navigation link 
/*			if (direction === 'down') {	
				resetActive();
				$('.vc_primary-menu  ul li a[data-waypoint="' + dataslide + '"]').parent().addClass('active');		
			}
			else {
				resetActive();
				$('.vc_primary-menu  ul li a[data-waypoint="' + dataslide + '"]').parent().prev().addClass('active');						
			}
			*/
	
		},{offset:0});		
		
		
		//Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
		//easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
		function goToByScroll(dataslide) {
			if (dataslide=="home"){
				$('html,body').animate({scrollTop:0},1500, 'easeInOutQuint');	
			} else {
				$('html,body').animate({
				   scrollTop: $('.slide-waypoint[data-waypoint="' + dataslide + '"]').offset().top
				}, 1500, 'easeInOutQuint');				
			}
		}	

		
		$('.vd_top-menu-wrapper .horizontal-menu .nav > li >  a[data-waypoint]').click(function (e) {		
			e.preventDefault();
			
			var dataslide = $(this).attr('data-waypoint');
			goToByScroll(dataslide);		
		});
		$("#front-1-banner .icon-banner, #front-1-banner .word-header, #front-1-banner .word-subheader, .vd_visitor-counter, .visitor-word, .feature-1, .feature-2, .feature-3, .vd_gallery .gallery-item").css("opacity",0);	
		
		$("#front-1-banner").waypoint(function () {
			
			$('#front-1-banner .word-header').delay(0).queue(function () {
					$('#front-1-banner .word-header').removeClass("hidden").addClass("animated fadeInDownBig");				
			});
			$('#front-1-banner .word-subheader').delay(300).queue(function () {
					$('#front-1-banner .word-subheader').removeClass("hidden").addClass("animated fadeInDownBig");				
			});			
			
			$('#front-1-banner .icon-1').delay(2000).queue(function () {
					$('#front-1-banner .icon-1').removeClass("hidden").addClass("animated rollIn");				
			});
			$('#front-1-banner .word-1').delay(2300).queue(function () {
					$('#front-1-banner .word-1').removeClass("hidden").addClass("animated rollIn");				
			});								
			
			$("#front-1-banner .icon-2").delay(1500).queue(function () {
					$('#front-1-banner .icon-2').removeClass("hidden").addClass("animated fadeInDown");				
			});		
			$("#front-1-banner .word-2").delay(1700).queue(function () {
					$('#front-1-banner .word-2').removeClass("hidden").addClass("animated fadeInDown");				
			});	
						
			$("#front-1-banner .icon-3").delay(2500).queue(function () {
					$('#front-1-banner .icon-3').removeClass("hidden").addClass("animated fadeInRight");				
			});
			$("#front-1-banner .word-3").delay(2700).queue(function () {
					$('#front-1-banner .word-3').removeClass("hidden").addClass("animated fadeInRight");				
			});		
			$("#front-1-banner .icon-4").delay(3500).queue(function () {
					$('#front-1-banner .icon-4').removeClass("hidden").addClass("animated rotateIn");				
			});
			
		
														
		
    	}, 	{ offset: 600	});	
		
		$(".vd_visitor-counter").waypoint(function () {
			$(".vd_visitor-counter").queue(function () {
				$('.vd_visitor-counter').addClass("animated fadeInUp");				
			});	
			$(".visitor-word").delay(300).queue(function () {
				$('.visitor-word').addClass("animated fadeInUp");				
			});				
			$(".visitor-word").delay(300).queue(function () {
				$('.visitor-word').addClass("animated fadeInUp");				
			});		
			$(".feature-1").delay(1000).queue(function () {
				$('.feature-1').addClass("animated fadeInRightBig");				
			});	
			$(".feature-2").delay(1200).queue(function () {
				$('.feature-2').addClass("animated fadeInRightBig");				
			});	
			$(".feature-3").delay(1400).queue(function () {
				$('.feature-3').addClass("animated fadeInRightBig");				
			});																
		
		}, 	{ offset: 600	});
		
		$(".vd_gallery").waypoint(function () {
			$(".vd_gallery .gallery-1").queue(function () {
				$('.vd_gallery .gallery-1').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-2").delay(200).queue(function () {
				$('.vd_gallery .gallery-2').addClass("animated fadeInUp");				
			});				
			$(".vd_gallery .gallery-3").delay(400).queue(function () {
				$('.vd_gallery .gallery-3').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-4").delay(600).queue(function () {
				$('.vd_gallery .gallery-4').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-5").delay(800).queue(function () {
				$('.vd_gallery .gallery-5').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-6").delay(1000).queue(function () {
				$('.vd_gallery .gallery-6').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-7").delay(1200).queue(function () {
				$('.vd_gallery .gallery-7').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-8").delay(1400).queue(function () {
				$('.vd_gallery .gallery-8').addClass("animated fadeInUp");				
			});	
			$(".vd_gallery .gallery-9").delay(1600).queue(function () {
				$('.vd_gallery .gallery-9').addClass("animated fadeInUp");				
			});	
																																							
		
		}, 	{ offset: 600	});		
		
	
});
</script>