import 'owl.carousel';
// var mask = require('jquery.maskedinput');
// $.mask = mask;
// window.mask = mask;

(() => {
        // $(".maskphone").mask('+7(999) 999 99-99')
})();

(() => {
    $(".transition").click(function(){
            var _href = $(this).attr("href");
            $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
            return false;
    });
})();

(() => {
    var nav = $('.b-nav');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 136) {
			nav.addClass("b-nav__fix");
		} else {
			nav.removeClass("b-nav__fix");
		}
	});
})();

$(document).ready(function(){
    $("#carousel").owlCarousel({
        items:3,
        loop: true,
        autoplay: true,
        center: true,
        responsive : {
            0: {
                items: 2,
                center: false,
                margin: 5
            },
            1200: {
                items: 3,
            }
        }
    });

    $("#formalization").owlCarousel({
        responsive : {
            0: {
                items: 2,
                center: false,
                margin: 5
            },
            768: {
                items: 3,
            }
        }
    });
});
