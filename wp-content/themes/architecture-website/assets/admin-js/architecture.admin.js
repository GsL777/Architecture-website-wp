jQuery(document).ready(function($){
//Architecture Sidebar Options START
	var mediaUploader;

	$( '#upload-button' ).on('click', function(e){//upload-button id in function-admin.php function architecture_sidebar_profile
		
		e.preventDefault();

		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		//define mediaUploader variable
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		//when we choose a picture that the picture will be pasted in the value on inspect
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();//retrives the attachment URL
			$('#profile-picture').val(attachment.url);
			$('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');//makes sure that image changes on a dashboard without refreshig the page
		});

		mediaUploader.open();//this prevents to double click the button

	});

	//Remove button in dashboard Architecture -> Sidebar
	$( '#remove-picture').on('click', function(e){//function-admin.php function architecture_sidebar_profile 
		e.preventDefault();

		var answer = confirm("Do you whant to remove your profile picture?");
		if(answer == true){
			$('#profile-picture').val('');
			$('.architecture-general-form').submit();//architecture-theme-support.php
		}

		return;

	});
//Architecture Sidebar Options END


});