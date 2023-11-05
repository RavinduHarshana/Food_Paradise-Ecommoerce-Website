<html>
    <head>
        <title>
          User
        </title>
        <style>
        .dForm{
                display: flex;
                justify-content: center;
            }
        
        h1 ,p{
            text-align:center;
        }
        table,th,td{
            border-collapse: collapse;
        }
        .main{
            display: flex;
            align-items: center;
            flex-direction:column;
        }
        
        </style>
    </head>
    <body>
    <div class="main">
    <h1>User Management Table</h1>

        <?php
            include 'dbcon.php';
            $table ="<table border = '1'>";
            $table .="<tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Mail</th>
            <th>LaneNo</th>
            <th>City</th>
            <th>Country</th>
            <th>Detete Item</th>
            </tr>";
    
                    
                $get_value='SELECT * FROM user;';
                $result = mysqli_query($conn,$get_value);
                $row=mysqli_num_rows($result);

                while($arr=mysqli_fetch_row($result)){
                    $table .="<tr>";
                    $table .= "<td>".$arr[0]."</td>";
                    $table .="<td>".$arr[1]."</td>";
                    $table .= "<td>".$arr[2]."</td>";
                    $table .= "<td>".$arr[3]."</td>";
                    $table .= "<td>".$arr[4]."</td>";
                    $table .= "<td>".$arr[5]."</td>";
                    $table .="<td><form action='' method='post'>
                    <input type='hidden' name='del_id' value='". $arr[0] ."'>";
                    $table .= '<input type="submit" name="delete" value="Remove"><br>
                            </form></td>';
                    $table .= "</tr>";
                    
                }
                $table .= "</table><br><br><br>";
                echo $table;
             
        ?>
        
               
        <div class="dForm">
            <form action="" method="POST" name="form">
            <table>
                <tr>
                    <td>User name :</td>
                    <td><input type="text" name="user_name" require ></td>
                </tr>
                <tr>
                    <td>Mail :</td>
                    <td><input type="email" name="email" ></td>
                </tr>
                <tr>
                    <td>Lane No :</td>
                    <td><input type="text" name="LeneNo"></td>
                </tr>
                <tr>
                    <td>City :</td>
                    <td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>Country :</td>
                    <td><input type="text" name="country" ></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Add" name="submit" value='Add'></td>
                    <td><input type="reset" value="Clear"></td>
                </tr>
            </table>
            </form>
        </div>
        <?php
        
        if(isset($_POST['submit'])){
            if(isset($_POST['user_name'])){
                $name=$_POST['user_name'];
                $mail=$_POST['email'];
                $LeneNo=$_POST['LeneNo'];
                $city=$_POST['city'];
                $country=$_POST['country'];
                $sql_valuee="INSERT INTO user(Username,Mail,LaneNo,City,Country)
                VALUES('$name','$mail','$LeneNo','$city','$country');";
                header("refresh:0");
                mysqli_query($conn,$sql_valuee);

            }
            else{
                echo "<p>Please Enter a Valid User Name</p>";
            }
        }    


            if (isset($_POST["delete"])) {
                if(isset($_POST['del_id'])){
                    $row_id=$_POST['del_id'];
                    mysqli_query($conn,"DELETE FROM user WHERE userid='$row_id';");
                    header("refresh:0");
                    echo '<p>Item iS deleted code<p>';
                }
                else{
                    echo '<p>Not delete '.mysqli_error($conn).'<p>';
                }
            }

            mysqli_close($conn);
                      
        ?>
        </div>
    </body>
</html>