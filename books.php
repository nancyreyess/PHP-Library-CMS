<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if(isset($_GET['delete']))
{
    $query = 'DELETE FROM books
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Book has been deleted');

    header('Location: books.php');
    die();
}

include( 'includes/header.php' );

?>


<h2>Books</h2>

<?php

    $query = 'SELECT *
        FROM books
        ORDER BY title';
    $result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        <th> Title </th>
        <th> Author </th>
        <th> Summary </th>
        <th> Genre </th>
        <th> Publisher </th>
        <th> Publication Year </th>
        <th> Total Pages </th>
        <th> Copies </th>
        <th> </th>
        <th> </th>
    </tr>  

    <!-- Loop through current records, grab each record as array-->
    <?php while($record = mysqli_fetch_assoc($result)): ?>

        <tr>
            <td> <?php echo $record['title']; ?> </td>
            <td> <?php echo $record['author']; ?> </td>
            <td> <?php echo $record['summary']; ?> </td>
            <td> <?php echo $record['genre']; ?> </td>
            <td> <?php echo $record['publisher']; ?> </td>
            <td> <?php echo $record['publication_year']; ?> </td>
            <td> <?php echo $record['total_pages']; ?> </td>
            <td> <?php echo $record['copies']; ?> </td>
            <td>
                <a href="books_edit.php?id=<?php echo $record['book_id']; ?>">Edit</a>
            </td>
            <td>
                <a href="books.php?delete=<?php echo $record['book_id']; ?>"> Delete </a>
            </td>
        </tr>   

    <?php endwhile; ?>

</table>

<a href="books_add.php"> Add Book </a>