<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['summary'] )
  {
    
    $query = 'INSERT INTO books ( 
        title,
        summary,
        author,
        genre,
        publisher,
        publication_year,
        total_pages,
        copies
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['summary'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['author'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['genre'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['publisher'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['publication_year'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['total_pages'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['copies'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Book has been added' );
    
  }
  
  header( 'Location: books.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Book</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>

  <label for="author">Author:</label>
  <input type="text" name="author" id="author">
    
  <br>
  
  <label for="summary">Summary:</label>
  <textarea type="text" name="summary" id="summary" rows="10"></textarea>
      
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
  <input type="text" name="genre" id="genre">
  
  <br>

  <label for="publisher">Publisher:</label>
  <input type="text" name="publisher" id="publisher">
  
  <br>
  
  <label for="publication_year">Publishing Year:</label>
  <input type="number" name="publication_year" id="publication_year">
  
  <br>

  <label for="total_pages">Total Pages:</label>
  <input type="number" name="total_pages" id="total_pages">
  
  <br>

  <label for="copies">Copies:</label>
  <input type="number" name="copies" id="copies">
  
  <br>
  
  <input type="submit" value="Add Book">
  
</form>

<p><a href="books.php"><i class="fas fa-arrow-circle-left"></i> Return to Book List</a></p>


<?php

include( 'includes/footer.php' );

?>