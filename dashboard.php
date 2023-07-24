<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>


<h2>Dashboard</h2>

<a href="books.php"> Manage Books </a>
<a href="projects.php"> Manage Projects </a>
<a href="users.php"> Manage Users </a>


<?php

include( 'includes/footer.php' );

?>