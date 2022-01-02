require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$("document").ready(function(){
    setTimeout(function(){
       $(".time").remove();
    }, 5000 ); // 5 secs
});

$('[data-type="adhaar-number"]').keyup(function() {
    var value = $(this).val();
    value = value.replace(/\D/g, "").split((/(?:([\d]{5}))/g)).filter(s => s.length > 0).join(" ");
    $(this).val(value);
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
    var value = $(this).val();
    var maxLength = $(this).attr("maxLength");
    if (value.length != maxLength) {
        $(this).addClass("highlight-error");
    } else {
        $(this).removeClass("highlight-error");
    }
});