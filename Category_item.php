<?php
include "dbcon.php";    
?>

<body>
    <h1>Welcome to Another Page</h1>
    
    <?php
    // Retrieve the id parameter from the URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id !== null) {
        echo "<p>You passed the ID parameter: $id</p>";
    } else {
        echo "<p>No ID parameter passed.</p>";
    }
    ?>
</body>
</html>
