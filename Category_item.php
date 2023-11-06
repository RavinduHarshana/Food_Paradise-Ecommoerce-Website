<?php
include "dbcon.php";    
?>

<body>
<link rel="stylesheet" href="./styles/category.css">

    
    <?php
    // Retrieve the id parameter from the URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

?>

<div class="row cat gap-4 text-center container-fluid ">

        <?php
        $catsql = "SELECT * FROM fooditem WHERE Category='$id';";
        $cattbl = mysqli_query($conn, $catsql);
        if(mysqli_num_rows($cattbl)>0){
            
        }
        else{
            echo "<h1>$id Is Out of Stock</h1>";
        }
        while ($item = mysqli_fetch_array($cattbl)) {
        ?>

        <div id="clickableDiv" onclick="locate('<?php  echo $item[0];?>')" class="card mycard" style="  width:18rem; ">
            <h4 class="card-title mt-3 fa"><?php echo $item[1]?></h4>
            <div class="imgd">

                <img src="images/Food_items/<?php echo $item[2]?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo $item[3]?></p>

            </div>    
            
            <button type="button" class="btn m-0 p-2 btn-primary">Oder</button>
        </div>
        <?php
         }; 
      ?>

    </div>
</body>
</html>

<?php 
    include_once "footer.php";
?>
