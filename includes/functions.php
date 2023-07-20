<?php

//checks to see if we're logged in, if not, send user back to the login page
function secure()
{
  //if the session in our id does not exist
  if(!isset($_SESSION['id']))
  {
    //if it does not exist, redirect to login page
    header( 'Location: index.php' );
    die();
    
  }
  
}

