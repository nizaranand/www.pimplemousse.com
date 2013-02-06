ev_toogle = function(inv,elemento){
    if( jQuery("#"+inv.id).is(':checked') )
        jQuery("#"+elemento).slideDown();
    else
        jQuery("#"+elemento).slideUp();
}