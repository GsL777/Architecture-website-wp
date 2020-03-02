jQuery(document).ready(function($){

	/* Image gallery START */
	// Gallery image hover
	$( ".img-cover" ).hover(
	  function() {
	    $(this).find(".img-overlay").animate({opacity: 1}, 600);
	  }, function() {
	    $(this).find(".img-overlay").animate({opacity: 0}, 600);
	  }
	);

	// Lightbox
	var $overlay = $('<div id="overlay"></div>');
	var $image = $("<img>");
	var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left"></i></div>');
	var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right"></i></div>');
	var $exitButton = $('<div id="exitButton"><i class="fa fa-times"></i></div>');

	// Add overlay
	$overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
	$("#gallery").append($overlay);

	// Hide overlay on default
	$overlay.hide();

	// When an image is clicked
	$(".img-overlay").click(function(event) {
	  // Prevents default behavior
	  event.preventDefault();
	  // Adds href attribute to variable
	  var imageLocation = $(this).prev().attr("href");
	  // Add the image src to $image
	  $image.attr("src", imageLocation);
	  // Fade in the overlay
	  $overlay.fadeIn("slow");
	});

	// When the overlay is clicked
	$overlay.click(function() {
	  // Fade out the overlay
	  $(this).fadeOut("slow");
	});

	// When next button is clicked
	$nextButton.click(function(event) {
	  // Hide the current image
	  $("#overlay img").hide();
	  // Overlay image location
	  var $currentImgSrc = $("#overlay img").attr("src");
	  // Image with matching location of the overlay image
	  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
	  // Finds the next image
	  var $nextImg = $($currentImg.closest(".image").next().find("img"));
	  // All of the images in the gallery
	  var $images = $("#image-gallery img");
	  // If there is a next image
	  if ($nextImg.length > 0) { 
	    // Fade in the next image
	    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
	  } else {
	    // Otherwise fade in the first image
	    $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
	  }
	  // Prevents overlay from being hidden
	  event.stopPropagation();
	});

	// When previous button is clicked
	$prevButton.click(function(event) {
	  // Hide the current image
	  $("#overlay img").hide();
	  // Overlay image location
	  var $currentImgSrc = $("#overlay img").attr("src");
	  // Image with matching location of the overlay image
	  var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
	  // Finds the next image
	  var $nextImg = $($currentImg.closest(".image").prev().find("img"));
	  // Fade in the next image
	  $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
	  // Prevents overlay from being hidden
	  event.stopPropagation();
	});

	// When the exit button is clicked
	$exitButton.click(function() {
	  // Fade out the overlay
	  $("#overlay").fadeOut("slow");
	});
	/* Image gallery END */


    /*Contact form submission START*/ //contact-form.php
    //FILES INCLUDE shortcodes.php, function.php(to add ajax.php), contact-form.php, ajax.php, theme-support.php, custom-post-type.php, contact.scss
    $('#ArchitectureContactForm').on('submit', function(e){//e - means element
        e.preventDefault();//avoid the form when submitting to href to whatever location that is not wanted

       // console.log('Form submitted');//test to check if it works

       // Contact form js class .has-error IN CONTACT.SCSS 
        $('.has-error').removeClass('has-error');//remove has-error class when input is filled and submitted
        $('.js-form-submission').removeClass('js-form-submission');

        var form = $(this), //$(this) - stands for the parent element in jQuery function (in this case #architectureContactForm)
            name = form.find('#name').val(), //name - the id in the contact-form.php
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url'); //data url must be defined in contact-form.php

            if( name === '' ){
                //console.log('Required inputs are empty');
                $('#name').parent('.form-group').addClass('has-error');//#name - id in contact-form.php

                return;//return stops the execution of the script at this point. 
                //It is not going to go on the second line and not going to continue if this if statement is true.
            }

            if( email === '' ){
                $('#email').parent('.form-group').addClass('has-error');//#email - id in contact-form.php
                
                return;
            }

            if( message === '' ){
                $('#message').parent('.form-group').addClass('has-error');//#message - id in contact-form.php

                return;
            }

            form.find('input, button, textarea').attr('disabled', 'disabled');//disables input, button, textarea. form - var form = $(this).
            $('.js-form-submission').addClass('js-show-feedback');//class from contact-form.php appears after submit button is pushed

        //console.log(form);
        //console.log(name);

        $.ajax({
            url : ajaxurl,
            type : 'post',// post - the same type that it is seen in a <form> and the post method in ajax is a default type.
            //$_POST (post method) - is a method that passes all the variables hidden inside the reload of the page. These methods are not getting printed anywhere.
            //$_GET (get method) - print the variables inside the url so you will see the variables inside the url. GET method is not safe
            data : { // data contains all the custom data like the array and we can write in the curly brackets and send to the ajax function

                name : name,
                email : email,
                message : message,
                action: 'architecture_save_user_contact_form' //function architecture_save_contact in ajax.php 

            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-form-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        //console.log('Unable to save your message, Please try again later');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);
                } else {

                    setTimeout(function(){
                        //console.log('Message saved!');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    }, 1500);
                }
            }
        });
    });
    /*Contact form submission END*/


	/*Cookie bar START*/
		// $(document).ready(function(){   
			setTimeout(function () {
				$("#cookie").fadeIn(200);
			}, 4000);
			$("#cookie-close, .cookie-agree").click(function() {
				$("#cookie").fadeOut(200);
			});
		// });
	/*Cookie bar END*/


});