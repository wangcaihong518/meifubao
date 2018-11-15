$(function(){
    let h5 = $('h5');
    h5.on('mouseenter',function(){
        $(this).next().stop();
        $(this).next().slideToggle();
        $(this).children('i').toggleClass('rotate');
    });
    h5.trigger('mouseenter');
});