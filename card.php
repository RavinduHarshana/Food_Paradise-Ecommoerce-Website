<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <style>

        .main{
            width: 100%;
            display: flex;
            margin-bottom: 20px;
        }
        .min{
            width: 100%;
            height: auto;
            padding: 2%;
            background-color: #d7d7d7;
            border-radius: 5px;
            margin-top:50px;
            box-shadow: 4px 4px 3px 3px gray;
           
            
        }
        .cards{
            width: 60%;
            margin-left: 5%;
            margin-top: 20px;
            height:auto;
        }

        .sum{
            width: 20%;
            height:auto;
            box-shadow: 4px 4px 3px 3px gray;
            padding: 2%;
            margin-left: 7%;
            border-radius: 10px;
            margin-bottom: 0;
            background-color: #d7d7d7;
            margin-top: 40px;
            
        }

        .cardimg{
            border-radius: 10px;
            width:150px;
            height:150px;
            float:left;
            margin:5px 20px 20px 10px;
        }

        h3{
            text-align:center;
            margin-top: 0;
        }

        .del{
            text-align: right;
        }

        .remove{
            background-color: #Fe724c;
            border-radius: 5px;
        }
        
        .payrool{
            border-radius: 5px;
            padding: 5px;
            font-size: 25px;
            margin-top:30px;
            margin-bottom:0;
            background-color:#Fe724c;
        }

        .pay{
            text-align: center;
        }

    </style>
    <link rel="stylesheet" href="./bootstrap.css">
</head>
<body>

    <div class="main">
        <div class="cards">
            
        

<?php
$totalSum=0;
// $conn=mysqli_connect('localhost','root','','php_project');
include "dbcon.php";
$value=mysqli_query($conn,'SELECT name,userqty,price,img,ItemId,UserID From cart WHERE UserID="1" ;');
$count=mysqli_num_rows($value);
while ($row = mysqli_fetch_array($value)){
    $itemTotal=0;
    $add="<div class='min'>";
    $add.="<img src=$row[3] class='cardimg'>";
    $add.= "<h3 class='hedd'>$row[0]</h3>";
    // $add.= "<p class='hedd'>$row[3]</p>";
    $add.= "<h5 class='price'>Price : $$row[2]</h5>";
    $add.= "<h5 class='price'>Quentity : $row[1]</h5>";
 
    // Quntity: <input type='number' name='quantity' value='1' style='width: 3em;'>
    // <input type='submit' name='qsubmit' value='ADD'>
  

    // if (isset($_POST['qsubmit'])) {
    //     $q = $_POST['quantity'];
    //     $itemPrice =$row[2];
    //     $name=$row[0];
        
    //     if ($q <= $row[1]) {
            $itemTotal = $row[1] * $row[2];
             $totalSum += $itemTotal;
            $add .= "<h5 class='allprice'>Total Price: $$itemTotal</h5>";
        // } else {
        //     $add .= "<h5 class='allprice'>No stock</h5>";
        // }
        
    //}
    $add.="
    <form action='' method='post' class='del'>
            <input type='submit'  name='delete' value='Remove' class='remove btn btn-danger'>
            <input type='hidden' name='row_id' value='". $row[4] ."'>
            <input type='hidden' name='row_id2' value='". $row[5] ."'>
    </form>";

    if (isset($_POST["delete"])) {
        if(isset($_POST['row_id'])){
            $row_id=$_POST['row_id'];
            $row_id2=$_POST['row_id2'];
            mysqli_query($conn,"DELETE FROM cart WHERE ItemId='$row_id' AND UserID=$row_id2;");
            // echo"Remove in the card list";
            header("refresh:0");
        }
    }

    $add .='</div>';
    echo $add;
}


?>

    </div>
        <div class="sum">
            <p><?php 
            $value=mysqli_query($conn,'SELECT name,userqty,price,ItemId,UserID From cart WHERE UserID="1" ; ;');
            $count=mysqli_num_rows($value);
            while ($row = mysqli_fetch_array($value)){
                ?>
                <span><?php echo $row[0],'<br>';?></span>
                <span>Quentity: <?php echo $row[1],'<br>';?></span>
                <span>Price: <?php echo $row[2],'<br>';?></span>
                <span>Total Price: <?php echo $row[1]*$row[2],'<br>';?></span>
                <hr>
            <?php
            }
            ?></p>
        
           
        
            <h3>Total Sum: $<?php echo $totalSum; ?></h3>
            <form action='' method='post' class="pay">
            <input type='submit' name='paybtn' value='Pay Roll' class="payrool">
            </form>
            <?php
                if (isset($_POST["paybtn"])) {
                    // header("location: http://localhost/Admin_panal/index.php");
                    // <script>window.</script>
                }
            ?>
        </div>

    </div>
</body>
</html>