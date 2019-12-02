/*!
 * 
 * Cardinal HTML5 Template v.1.0.0
 * 
 */


jQuery(function($){
	"use strict";

	if ( $('.image-hover').length ){
		$('.image-hover').photobox('a', { time:0 });
	}

	/*** Home Slider ***/
	if ( $(".home-slider").length ){
		var testimgCaro = $(".home-slider");
	 
		testimgCaro.owlCarousel({
			pagination: false,
			autoPlay: true,
			singleItem: true
		});
	} 

	/*** Blog Carousel ***/
	if ( $(".testim-carousel").length ){
		var testimgCaro = $(".testim-carousel");
	 
		testimgCaro.owlCarousel({
			pagination: true,
			autoPlay: true,
			singleItem: true
		});
	}
	if ( $(".blog-carousel").length ){
		var blogCaro = $(".blog-carousel");
	 
		blogCaro.owlCarousel({
			autoPlay: false,
			pagination: false,
			items : 2,
			itemsDesktop : [1000,2],
			itemsDesktopSmall : [900,2],
			itemsTablet: [600,1]
		});

		$(".caro-next-blog").on('click', this, function(){
			blogCaro.trigger('owl.next');
		});
		$(".caro-prev-blog").on('click', this, function(){
			blogCaro.trigger('owl.prev');
		});
	}


	if ( $(".brand-carousel").length ) {
		/*** Brands Carousel ***/
		var brandCaro = $(".brand-carousel");
		brandCaro.owlCarousel({
			autoPlay: false,
			pagination: false,
			items : 6,
			itemsDesktop : [1000,5],
			itemsDesktopSmall : [900,3],
			itemsTablet: [600,2]
		});

		$(".caro-next-brand").on('click', this, function(){
			brandCaro.trigger('owl.next');
		});
		$(".caro-prev-brand").on('click', this, function(){
			brandCaro.trigger('owl.prev');
		});
	}

	$('[data-toggle="tooltip"]').tooltip();



});



jQuery(document).ready(function($){


	$('#maincontact_form').on('submit', function(){

		var action = $(this).attr('action');
		$("#message").slideUp(750,function() {
		$('#message').hide();

 		$('#submit_btn')
			.after('<img src="img/AjaxLoader.gif" class="loader" />')
			.attr('disabled','disabled');
		
			$.ajax({
				url: 'contact.php',
				type: 'POST',
				data: {
						contact_name: $('#contact_name').val(),
						contact_email: $('#contact_email').val(),
						//contact_website: $('#contact_website').val(),
						contact_subject: $('#contact_subject').val(),
						contact_message: $('#contact_message').val(),
					},
				success: function(data){
					document.getElementById('message').innerHTML = data;
					$('#message').slideDown('slow');
					$('#maincontact_form img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit_btn').removeAttr('disabled');
					if(data.match('success') != null) $('#maincontact_form').slideUp('slow');
				}
			});

		});

		return false;

	});

	$('#comments_form').on('submit', function(){

		var action = $(this).attr('action');
		$("#message1").slideUp(750,function() {
		$('#message1').hide();

 		$('#submit_btn1')
			.after('<img src="img/AjaxLoader.gif" class="loader" />')
			.attr('disabled','disabled');
		
			$.ajax({
				url: 'contact2.php',
				type: 'POST',
				data: {
					contact_name: $('#contact_name1').val(),
					contact_email: $('#contact_email1').val(),
					contact_message: $('#contact_message1').val(),
				},
				success: function(data){
					document.getElementById('message1').innerHTML = data;
					$('#message1').slideDown('slow');
					$('#comments_form img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit_btn1').removeAttr('disabled');
					if(data.match('success') != null) $('#comments_form').slideUp('slow');
				}
			});

		});

		return false;

	});

	$('#fill_form').on('submit', function(e){
		return false;
	})

});

