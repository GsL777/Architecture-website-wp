<!-- FILES INCLUDE main-jquery.js, function.php(to add ajax.php), shortcodes.php, ajax.php, theme-support.php, custom-post-type.php, architecture-contact-form.php, contact.scss -->

<!-- in architecture-contact-form.php write a comment <p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or Post</p>
<p><code>[contact_form]</code></p> -->



<form id="ArchitectureContactForm" class="contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<div class="form-row">
		<div class="row">
			<div class="col-md-12 input-style-left">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control js-input" placeholder="Your Name" name="name" id="name">
					
					<span class="input-highlight"></span>

					<small class="text-danger form-control-msg">Your name is Required</small>
				</div><!-- .form-group -->
			</div><!-- .col-md-12 -->
			<div class="col-md-12 input-style-right">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control js-input" placeholder="Enter Email" name="email" id="email">
					
					<span class="input-highlight"></span>

					<small class="text-danger form-control-msg">Your Email is Required</small>
				</div><!-- .form-group -->
			</div><!-- .col-md-12 -->
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label for="message">Message</label>
				<textarea placeholder="Enter Message" name="message" id="message" class="form-control"></textarea>
				
				<span class="input-highlight"></span>

				<small class="text-danger form-control-msg">A message is Required</small>
			</div><!-- .form-group -->
		</div><!-- .col-md-12 -->
	</div>
	<div class="col-md-10 mx-auto mt-4">
		<button type="submit" class="btn btn-lg btn-danger btn-block button-send">Submit</button>

		<small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
		<small class="text-success form-control-msg js-form-success">Message was successfully submitted!</small>
		<small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
	</div>
</form><!-- .contact-form -->

