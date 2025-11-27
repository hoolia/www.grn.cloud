<!-- start Simple Custom CSS and JS -->
 


<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    setTimeout( () => {
        location = 'http://example.com/';
    }, 3000 ); // Wait for 3 seconds to redirect.
}, false );
</script><!-- end Simple Custom CSS and JS -->
