(function($){
	"use strict";	
    $(document).ready(function() {
        $('.sidebar select').chosen();
        // Mobile Menu
        function az_mobile_menu()
        {
            if ( $('.az-mobile-menu-buton').length )
            {
                $('.az-mobile-menu-buton').click( function(){
                    $('.az-main-menu').toggle();
                });
            }

            $('.az-main-menu .menu-item-has-children > a').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
                    $submenu.toggle();
                    return false;
                }
            });

            $('.az-main-menu .menu-item-has-children > a').click( function(e) {
                var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');            
                $submenu.toggle();
                return false;
            });
        }
        az_mobile_menu();
    });
})(jQuery);
