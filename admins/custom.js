var initDestroyTimeOutPace = function() {
    var counter = 0;

    var refreshIntervalId = setInterval( function(){
        var progress; 

        if( typeof $( '.pace-progress' ).attr( 'data-progress-text' ) !== 'undefined' ) {
            progress = Number( $( '.pace-progress' ).attr( 'data-progress-text' ).replace("%" ,'') );
        }

        if( progress === 99 ) {
            counter++;
        }

        if( counter > 50 ) {
            clearInterval(refreshIntervalId);
            Pace.stop();
        }
    }, 100);
}
initDestroyTimeOutPace();

    