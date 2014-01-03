jQuery(document).ready(function() {

    jQuery('#contactform').submit(function() {

		var action = jQuery(this).attr('action');
		var values = jQuery(this).serialize();

        jQuery('#submit').attr('disabled', 'disabled').after('<img src="assets/img/ajax-loader.gif" class="loader" />');

        jQuery("#message").slideUp(750, function() {

            jQuery('#message').hide();

            jQuery.post(action, values, function(data) {
                jQuery('#message').html(data);
                jQuery('#message').slideDown('slow');
                jQuery('#contactform img.loader').fadeOut('fast', function() {
                    jQuery(this).remove()
				});
                jQuery('#submit').removeAttr('disabled');
				if (data.match('success') != null) jQuery('#contactform').slideUp('slow');

			});

		});

		return false;

	});

});