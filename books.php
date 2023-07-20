<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
    <style> /* add basic css*/ </style>
</head>
<body>

    <h1>Books</h1>

    <div class='library-container'>

        <?php

        //variables to store login creds
        $host='sql307.infinityfree.com';
        $user='epiz_34065294'; 
        $pass='vGbuyoRM4uo';
        $db='epiz_34065294_assignment2';

        //use variables to login
        $con = mysqli_connect($host, $user, $pass, $db);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        //fetch data from assignment database
        $query = "SELECT book_id, title, author, summary, genre, publisher, publication_year, total_pages, copies FROM books";
        $result = mysqli_query($con, $query);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display the data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='books'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p> <b>Author:</b> " . $row['author'] . "</p>";
                echo "<p> <b>Genre:</b> " . $row['genre'] . "</p>";
                //echo "<img src='images/" . $row['img'] . "' alt='TV Show Photo'>";
                echo "<p> <b>Publisher:</b> " . $row['publisher'] . "</p>";
                echo "<p> <b>Year:</b> " . $row['publication_year'] . "</p>";
                echo "<p> <b>Total pages:</b> " . $row['total_pages'] . "</p>";
                echo "<p> <b>Copies:</b> " . $row['copies'] . "</p>";
                echo "<p> <b>Summary:</b> " . $row['summary'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No data found in the 'books' table.";
        }

        // Close the database connection
        mysqli_close($con);

        ?>

    </div>

    <footer>
        <p> ©</p>
    </footer>

</body>
</html>
</html>