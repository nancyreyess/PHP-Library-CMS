<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<h2 class="font45">Dashboard</h2>

<a class="font25" href="books.php"> Manage Books &#128218; </a></br>
<!--<a class="font25" href="projects.php"> Manage Projects &#128221; </a></br>-->
<a class="font25" href="users.php"> Manage Users &#128570; </a>


<?php

include( 'includes/footer.php' );

?>