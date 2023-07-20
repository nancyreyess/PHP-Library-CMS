<?php

//asset files
include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

//checking if form has been submitted
if(isset($_POST['email']))
{
    $query = 'SELECT *
        FROM users
        WHERE email = "'.$_POST['email'].'"
        AND password = "'.md5($_POST['password']).'"
        AND active = "Yes"
        LIMIT 1';
    //run query    
    $result = mysqli_query($connect, $query);

    //if we get matching record
    //if the number of rows found in that query if greater than zero
    if(mysqli_num_rows($result))
    {
        //fetch record as array
        $record = mysqli_fetch_assoc($result);

        //basic security - throw id of matching user we just found into out session with the email, in case we need it later
        $_SESSION['id'] = $record['id'];
        $_SESSION['email'] = $_POST['email'];

        //now that they're logged in, redirect to dashboard
        header('Location: dashboard.php');
        die();
    }
}

include( 'includes/header.php' );

?>

<form method="post">
    
    Email:
    <input type="text" name="email">

    <br>

    Password:
    <input type="password" name="password">

    <br>

    <input type="submit" value="Login">

</form>    

<?php

include('includes/footer.php');

?>