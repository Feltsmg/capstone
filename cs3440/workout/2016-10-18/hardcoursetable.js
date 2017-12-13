$( document ).ready( function() {
    $( "tr" ).addClass( "easy" );
    $( "tr" ).on("click", function() {
        $( "tr" ).toggleClass( "hard" );
    });
});
