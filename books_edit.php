<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['book_id'] ) )
{
  
  header( 'Location: books.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['summary'] )
  {
    
    $query = 'UPDATE books SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      summary = "'.mysqli_real_escape_string( $connect, $_POST['summary'] ).'",
      author = "'.mysqli_real_escape_string( $connect, $_POST['author'] ).'",
      genre = "'.mysqli_real_escape_string( $connect, $_POST['genre'] ).'",
      publisher = "'.mysqli_real_escape_string( $connect, $_POST['publisher'] ).'",
      publication_year = "'.mysqli_real_escape_string( $connect, $_POST['publication_year'] ).'",
      total_pages = "'.mysqli_real_escape_string( $connect, $_POST['total_pages'] ).'",
      copies = "'.mysqli_real_escape_string( $connect, $_POST['copies'] ).'"      
      WHERE book_id = '.$_GET['book_id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Book has been updated' );
    
  }

  header( 'Location: books.php' );
  die();
  
}


if( isset( $_GET['book_id'] ) )
{
  
  $query = 'SELECT *
    FROM books
    WHERE book_id = '.$_GET['book_id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: books.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Book</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>

  <label for="author">Author:</label>
  <input type="text" name="author" id="author" value="<?php echo htmlentities( $record['author'] ); ?>">
    
  <br>
  
  <label for="summary">Summary:</label>
  <textarea type="text" name="summary" id="summary" rows="5"><?php echo htmlentities( $record['summary'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#summary' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="genre">Genre:</label>
  <input type="text" name="genre" id="genre" value="<?php echo htmlentities( $record['genre'] ); ?>">
  
  <br>

  <label for="publisher">Publisher:</label>
  <input type="text" name="publisher" id="publisher" value="<?php echo htmlentities( $record['publisher'] ); ?>">
  
  <br>
  
  <label for="publication_year">Publishing Year:</label>
  <input type="number" name="publication_year" id="publication_year" value="<?php echo htmlentities( $record['publication_year'] ); ?>">
  
  <br>

  <label for="total_pages">Total Pages:</label>
  <input type="number" name="total_pages" id="total_pages" value="<?php echo htmlentities( $record['total_pages'] ); ?>">
  
  <br>

  <label for="copies">Copies:</label>
  <input type="number" name="copies" id="copies" value="<?php echo htmlentities( $record['copies'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Book">
  
</form>

<p><a href="books.php"><i class="fas fa-arrow-circle-left"></i> Return to Book List</a></p>


<?php

include( 'includes/footer.php' );

?>