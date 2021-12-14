jQuery(document).ready(function(e){
    jQuery('#mobileMenu').click(function(e){
        jQuery('#mainNav').stop(true,true).slideToggle(300);
        jQuery('svg', this).toggleClass('fa-bars fa-times');
    });//end click()
});//end ready()