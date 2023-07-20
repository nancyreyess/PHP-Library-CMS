<?php

//this file will store our database connection

//variables to store login creds
$host='sql307.infinityfree.com';
$user='epiz_34065294'; 
$pass='vGbuyoRM4uo';
$db='epiz_34065294_assignment2';

//use variables to login
$connect = mysqli_connect($host, $user, $pass, $db);

//mysqli_set_charset( $connect, 'UTF8' );