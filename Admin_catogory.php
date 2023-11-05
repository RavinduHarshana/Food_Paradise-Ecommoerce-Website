
<html>
    <head>
        <title>
          cotogory
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
    <h1>Catogory Management Table</h1>

        <?php
            include 'dbcon.php';
            $table ="<table border = '1'>";
            $table .="<tr>
            <th>Category name</th>
            <th>Catagory Image</th>
            <th>Description</th>
            <th>Detete Item</th>
            </tr>";

            
                    
                $get_value='SELECT * FROM category;';
                $result = mysqli_query($conn,$get_value);
                $row=mysqli_num_rows($result);

                while($arr=mysqli_fetch_row($result)){
                    $table .="<tr>";
                    $table .= "<td>".$arr[0]."</td>";
                    $table .="<td>".$arr[1]."</td>";
                    $table .= "<td>".$arr[2]."</td>";
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
                    <td>Category name :</td>
                    <td><input type="text" name="name" require ></td>
                </tr>
                <tr>
                    <td>Catagory Image :</td>
                    <td><input type="text" name="img" ></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td><input type="text" name="Description"></td>
                </tr>
                    <td><input type="submit" value="Add" name="submit" value='Add'></td>
                    <td><input type="reset" value="Clear"></td>
                </tr>
            </table>
            </form>
        </div>
        <?php
        
        if(isset($_POST['submit'])){
            if(isset($_POST['name'])){
                $name=$_POST['name'];
                $img=$_POST['img'];
                $Description=$_POST['Description'];
                $sql_valuee="INSERT INTO category(CategoryName,CatImage,description)
                VALUES('$name','$img','$Description');";
                header("refresh:0");
                mysqli_query($conn,$sql_valuee);

            }
            else{
                echo "<p>Please Enter a Valid User Name</p>";
            }
        }    


            if (isset($_POST["delete"])) {
                if(isset($_POST['del_id'])){
                    $row_name=$_POST['del_id'];
                    mysqli_query($conn,"DELETE FROM Category WHERE CategoryName='$row_name';");
                    header("refresh:0");
                    echo '<p>Item iS deleted<p>';
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