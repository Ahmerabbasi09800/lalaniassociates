function loader() {
    $(window).on('load', function() {
        // Animate loader off screen
        $(".preloader").addClass('loaded');                    
        $(".preloader").delay(600).fadeOut();                       
    });
}

loader();