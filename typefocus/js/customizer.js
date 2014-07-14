/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
    // Site title and description.
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );
    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                } );
            } else {
                $( '.site-title, .site-description' ).css( {
                    'clip': 'auto',
                    'color': to,
                    'position': 'relative'
                } );
            }
        } );
    } );
    //Typefocus author image
    wp.customize( 'typefocus_author_image', function( value ) {
        value.bind( function( to ) {
            0 === $.trim( to ).length ?
            $( '.author-image' ).html('') :
            $( '.author-image' ).html('<img src="'+to+'"/>');
    });
    //Typefocus footer text
    wp.customize( 'typefocus_copyright', function( value ) {
        value.bind( function( to ) {
            $( '.site-info' ).html( to );
        });     
    });
        
    
});
} )( jQuery );
