<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if(isset($_GET['delete']))
{
    $query = 'DELETE FROM users
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
    mysqli_query($connect, $query);

    set_message('User has been deleted');

    header('Location: users.php');
    die();
}

include( 'includes/header.php' );

?>


<h2>Users</h2>

<?php

    $query = 'SELECT *
        FROM users
        ORDER BY last, first';
    $result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Email Address </th>
        <th> Status </th>
        <th> </th>
        <th> </th>
    </tr>  

    <!-- Loop through current records, grab each record as array-->
    <?php while($record = mysqli_fetch_assoc($result)): ?>

        <tr>
            <td> <?php echo $record['first']; ?> </td>
            <td> <?php echo $record['last']; ?> </td>
            <td> <?php echo $record['email']; ?> </td>
            <td> <?php echo $record['active']; ?> </td>
            <td>
                <a href="users_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="users.php?delete=<?php echo $record['id']; ?>"> Delete </a>
            </td>
        </tr>   

    <?php endwhile; ?>

</table>

<a href="users_add.php"> Add User </a>

</br>

<a href="dashboard.php"><-- Go back </a>

<?php

include( 'includes/footer.php' );

?>

