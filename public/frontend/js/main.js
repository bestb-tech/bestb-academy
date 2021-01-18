$(document).ready(function () {
    $('.b-nav-dropdown').
        mouseenter( function(){
            $(this).find('a').first().dropdown('show');
        })
        .mouseleave( function(){
            $(this).find('a').first().dropdown('hide');
        });
})


// (function ($){
//     $('.b-nav-dropdown').
//     mouseenter( function(){
//         $(this).find('a').first().dropdown('show');
//     })
//     .mouseleave( function(){
//         $(this).find('a').first().dropdown('hide');
//     });
// })(jQuery);
