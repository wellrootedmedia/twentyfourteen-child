jQuery(function() {

//    $.fn.providerAutoComplete = function (options) {
//        var autocomplete = new $.ProviderAutoComplete(this, options);
//        autocomplete.init();
//    };

    jQuery.fn.bpMentions = function(options) {
        var mentions = new jQuery.BpMentions.BpAutoComplete(options);

        return mentions;
    };


    jQuery.BpMentions.BpAutoComplete = function(options) {

        var options = jQuery.extend( {}, jQuery.BpMentions.BpAutoComplete.defaults, options );

        console.log(options.selectedName);

        return options;
    };


    jQuery.BpMentions.BpAutoComplete.defaults = {
        selectedName: ""
    };

    jQuery.BpMentions = {};


//
//    jQuery("#whats-new-textarea")
//        .append('<div id="results"></div><div class="overlay"></div>');
//
//    jQuery("#whats-new").on('keydown',function () {
//        //jQuery("#whats-new").each(function () {
//        var kw = jQuery("#whats-new").val();
//        if(kw != '') {
//            jQuery.ajax({
//                type: "POST",
//                url: "<?php echo get_stylesheet_directory_uri(); ?>/inc/search.php",
//                data: "kw=" + kw,
//                success: function (option) {
//                    jQuery("#results").html(option);
//                    jQuery('.found-users').click(function() {
//                        //$('#area').val($('#area').val()+'foobar');
//                        jQuery("#whats-new").val('@' + jQuery(this).text()+' ');
//                    });
//                }
//            });
//        }
//        //});
//    });




//        jQuery(".overlay").click(function () {
//            jQuery(".overlay").css('display', 'none');
//            jQuery("#results").css('display', 'none');
//        });
//        jQuery("#whats-new").focus(function () {
//            jQuery(".overlay").css('display', 'block');
//            jQuery("#results").css('display', 'block');
//        });
});