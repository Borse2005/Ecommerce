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


jQuery(document).ready(function(){
    jQuery("#menu-button").click(function(){
        jQuery("#drop").toggle('hidden');
    });
});

// Color 
jQuery(document).ready(function(){
    jQuery('#plus').click(function(){
        jQuery('#filter-section-0').show();
        jQuery("#plus").hide();
        jQuery("#minus").show();
    });

    jQuery('#minus').click(function(){
        jQuery('#filter-section-0').hide();
        jQuery("#minus").hide();
        jQuery("#plus").show();
    });
});

// Category 
jQuery(document).ready(function(){
    jQuery('#catplus').click(function(){
        jQuery('#filter-section-1').show();
        jQuery("#catplus").hide();
        jQuery("#catminus").show();
    });

    jQuery('#catminus').click(function(){
        jQuery('#filter-section-1').hide();
        jQuery("#catminus").hide();
        jQuery("#catplus").show();
    });
});


// Size 
jQuery(document).ready(function(){
    jQuery('#splus').click(function(){
        jQuery('#filter-section-2').show();
        jQuery("#splus").hide();
        jQuery("#sminus").show();
    });

    jQuery('#sminus').click(function(){
        jQuery('#filter-section-2').hide();
        jQuery("#sminus").hide();
        jQuery("#splus").show();
    });
});

// Input Currency 

(function($) {
    $.fn.currencyInput = function() {
        this.each(function() {
            var wrapper = $("<div class='currency-input' />");
            $(this).wrap(wrapper);
            $(this).before("<span class='currency-symbol'>₹</span>");
            $(this).change(function() {
                var min = parseFloat($(this).attr("min"));
                var max = parseFloat($(this).attr("max"));
                var value = this.valueAsNumber;
                if (value < min)
                    value = min;
                else if (value > max)
                    value = max;
                $(this).val(value.toFixed(2));
            });
        });
    };
})(jQuery);

$(document).ready(function() {
    $('input.currency').currencyInput();
});