require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

jQuery("document").ready(function(){
    setTimeout(function(){
       jQuery(".time").remove();
    }, 5000 ); // 5 secs
});

jQuery('[data-type="adhaar-number"]').keyup(function() {
    var value = jQuery(this).val();
    value = value.replace(/\D/g, "").split((/(?:([\d]{5}))/g)).filter(s => s.length > 0).join(" ");
    jQuery(this).val(value);
});

jQuery('[data-type="adhaar-number"]').on("change, blur", function() {
    var value = jQuery(this).val();
    var maxLength = jQuery(this).attr("maxLength");
    if (value.length != maxLength) {
        jQuery(this).addClass("highlight-error");
    } else {
        jQuery(this).removeClass("highlight-error");
    }
});