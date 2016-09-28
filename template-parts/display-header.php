<?php
//  DISPLAY THE CUSTOM H1 OR THE POST TITLE ------------------------
$header_title = get_field( 'display_header' );
if( $header_title ):
    echo $header_title;

else:
    the_title();

endif;
?>