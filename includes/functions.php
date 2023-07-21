<?php

//checks to see if we're logged in, if not, send user back to the login page
function secure()
{
  //if the session in our id does not exist
  if(!isset($_SESSION['id']))
  {
    set_message('You must first login to view this page');
    //if it does not exist, redirect to login page
    header( 'Location: index.php' );
    die();
    
  }
  
}

function set_message( $message )
{
  
  $_SESSION['message'] = $message;
  
}

function get_message()
{
  
  if( isset( $_SESSION['message'] ) )
  {
    
    echo '<p >'.$_SESSION['message'].'</p> <hr>';
    unset( $_SESSION['message'] );
    
  }
  
}

