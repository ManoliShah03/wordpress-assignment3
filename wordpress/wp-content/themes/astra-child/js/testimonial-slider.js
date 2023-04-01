jQuery(document).ready(function($) {

    var slideIndex = 0;
    var slides = $('.testimonial-slide');
    slides.eq(0).addClass('active');
    setInterval(function() {
        slides.removeClass('active');
        slideIndex = (slideIndex + 1) % slides.length;
        slides.eq(slideIndex).addClass('active');
    }, 5000);
});