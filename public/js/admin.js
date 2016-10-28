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
});