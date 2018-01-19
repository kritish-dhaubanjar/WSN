$('.review .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$(".custom-inner0").backstretch("./images/carousel.jpg");
$(".custom-inner1").backstretch("./images/carousel1.jpg");
$(".custom-inner2").backstretch("./images/carousel2.jpg");

$('#backCarousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    responsive:{
        0:{
            items:0,
            dots: false,
            nav:false
        },
        480:{
            items:1,
            dots: true,
            nav:false
        },
        600:{
            items:1,
            dots: true,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
            dots: true,
            loop:true
        }
    }
})

var more = document.getElementById('showOptions');
if(more != undefined){
    more.onclick = function(){
        if (document.getElementById('filterOptions').className == 'filter_off')
            document.getElementById('filterOptions').className = 'filter_on';
        else
            document.getElementById('filterOptions').className = 'filter_off';
    }
}

$('#productImages .owl-carousel').owlCarousel({
    loop:true,
    dots: false,
    margin:10,
    nav:false,
    URLhashListener:true,
    autoplayHoverPause:true,
    center:true,
    startPosition: 'URLHash',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
