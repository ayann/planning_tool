jQuery(document).ready(function($) {
    $(window).scroll(function(event) {
        $cible = $(".main_head .bull")
        ciblePos = $cible.offset().top
        if (ciblePos > 90) {
            $cible.addClass('bull_grey')
        } else{
            $cible.removeClass('bull_grey')
        };
    });
});
