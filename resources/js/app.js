require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$("document").ready(function(){
    setTimeout(function(){
       $(".time").remove();
    }, 5000 ); // 5 secs
});