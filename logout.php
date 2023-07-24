<?php

include( 'includes/config.php' );

//clear out session
session_destroy();

//redirect to index page
header( 'Location: index.php' );
die();

include( 'includes/footer.php' );

?>