<!-- Header -->
<?php
include "dbcon.php"
    ?>
<html>
<!-- Search -->

<!-- Category -->

<body>
    <link rel="stylesheet" href="./styles/category.css">
    <link rel="stylesheet" href="./styles/bootstrap.css">

    <div class="row cat gap-4 text-center container-fluid ">

        <?php
        $catsql = "SELECT * FROM Category;";
        $cattbl = mysqli_query($conn, $catsql);
        while ($item = mysqli_fetch_array($cattbl)) {
        
        ?>

        <div class="card" style="width: 18rem; ">
            <h4 class="card-title"><?php echo $item[0]?></h4>
            <img src="images\Category\Category-<?php echo $item[0]?>.png" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card'scontent.</p>

            </div>

        </div>
        <?php
         };
      
      ?>

    </div>


</body>

</html>

<!-- footer -->
<?php
include "footer.php";
?>