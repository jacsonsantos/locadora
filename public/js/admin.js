$(function() {
    $('.filmes').click(function() {
        $('.sub-filmes').slideToggle( "slow", function() {
            // Animation complete.
        });
    });
    
    $('.cliente').click(function() {
        $('.sub-cliente').slideToggle( "slow", function() {
            // Animation complete.
        });
    });
    $("#ano").mask("9999",{placeholder:"yyyy"});
    $("#duracao").mask("9hr 99min");
});