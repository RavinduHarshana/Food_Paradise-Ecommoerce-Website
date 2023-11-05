<?php 
    $hostname="localhost";
    $username="root";
    $password="";
    $database="foodparadies";

    $conn = mysqli_connect($hostname,$username,$password,$database);
    if(!$conn){
        die("database is not connected: ".mysqli_erroe($conn));
    }

    
    








?>