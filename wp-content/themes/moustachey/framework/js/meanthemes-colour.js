jQuery(document).ready(function ($) {
    jQuery('.pickcolour').each(function (index) {
        jQuery(this).parent().prepend('<span class="swatch" />');
        var colour = jQuery(this).prev('input').val();
        var aswatch = jQuery(this).parent().find('.swatch');
        jQuery(aswatch).css("background", colour);
        jQuery(this).click(function (e) {
            colourPicker = jQuery(this).next('div');
            input = jQuery(this).prev('input');
            swatch = jQuery(this).parent().find('.swatch');
            jQuery.farbtastic(colourPicker, function (a) {
                jQuery(input).val(a);
                jQuery(swatch).css("background", a);
            });
            colourPicker.show();
            e.preventDefault();
            jQuery(document).mousedown(function () {
                jQuery(colourPicker).hide();
            });
        });
    });
});