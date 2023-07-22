<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if(isset($_GET['delete']))
{
    $query = 'DELETE FROM projects
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Project has been deleted');

    header('Location: projects.php');
    die();
}

include( 'includes/header.php' );

?>


<h2>Projects</h2>

<?php

    $query = 'SELECT *
        FROM projects
        ORDER BY date';
    $result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        <th> ID </th>
        <th> Title </th>
        <th> Type </th>
        <th> Date </th>
        <th> </th>
        <th> </th>
    </tr>  

    <!-- Loop through current records, grab each record as array-->
    <?php while($record = mysqli_fetch_assoc($result)): ?>

        <tr>
            <td> <?php echo $record['id']; ?> </td>
            <td> <?php echo $record['title']; ?> </td>
            <td> <?php echo $record['type']; ?> </td>
            <td> <?php echo $record['date']; ?> </td>
            <td>
                <a href="projects_edit.php?id=<?php echo $record['id']; ?>">Edit</a>
            </td>
            <td>
                <a href="projects.php?delete=<?php echo $record['id']; ?>"> Delete </a>
            </td>
        </tr>   

    <?php endwhile; ?>

</table>

<a href="projects_add.php"> Add Project </a>