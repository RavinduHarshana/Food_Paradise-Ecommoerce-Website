
<?php 
    include 'dbcon.php';
?>
  <!DOCTYPE html>
<html>
<head>
    <title>About Us - Your Company Name</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
    
    </header>


    <section class="about-us">

        <h1 class="aboutus">About Us</h1>

        <p class="welcome">
            <b>Welcome to Food Paradise. <br> 
            Where our passion for food drives us to deliver the best services to our customers.</b>
        </p>

        <p>
            <b>Our mission is to be the best Food Provider.</b>
        </p> <br>


        <h2>Our Team</h2>  
        <div class="maindiv">
<?php 

$sql="select * from team;";
$tbl=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($tbl)){
    ?>
    <div class="team-member">
            <img src=<?php echo $row[4]?> alt="Team Member 1">
            <h3><?php echo $row[1]?></h3>            
            <p class="posi"><?php echo $row[2]?></p>
            <p class=""><?php echo $row[3]?></p>
        </div>

<?php
   }
?>
</div>
<hr>
<div class="main_para">

        <div class="para">
            A food order company is a business that specializes in facilitating the process of ordering and 
            delivering food to customers' doorsteps. These companies play a vital role in today's fast-paced world, 
            where convenience and efficiency are highly valued. Food order companies typically operate through websites 
            or mobile apps, allowing customers to browse through a wide range of restaurants and menus, place orders, 
            and make secure payments with just a few taps on their devices. They act as intermediaries between restaurants 
            and consumers, streamlining the ordering process and ensuring that customers receive their desired meals quickly 
            and conveniently. These companies often offer a diverse selection of cuisines and dishes, catering to various 
            tastes and dietary preferences. In an era where time is precious, food order companies provide a valuable service 
            that brings the world of culinary delights right to the customer's doorstep, making dining in a hassle-free and 
            enjoyable experience.
        </div>
</div>

    </section>

