'use strict';

document.addEventListener('DOMContentLoaded', loaded);

function loaded() {

    $('.owl-carousel').owlCarousel({
        center: true,
        loop:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        }
    })
    
}