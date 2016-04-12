$(document).ready(
    /* This is the function that will get executed after the DOM is fully loaded */
    function () {
        /* Next part of code handles hovering effect and submenu appearing */
        $('.nav li').hover(
            function () { //appearing on hover
                $('ul', this).fadeIn();
            },
        
            function () { //disappearing on hover
                $('ul', this).fadeOut();
            }
        );
        
        var footer_height=$("#footer").height();
            $("#wrapper").css({
                'padding-bottom' : footer_height
        });
    }
    
    
);