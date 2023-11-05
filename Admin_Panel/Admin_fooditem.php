
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
            <th>Item code</th>
            <th>Item name</th>
            <th>item Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Catogory</th>


            </tr>";

            
                    
                $get_value='SELECT * FROM foodItem;';
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
                    $table .= "<td>".$arr[6]."</td>";
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
                <!-- <tr>
                    <td>Item code :</td>
                    <td><input type="text" name="code" require ></td>
                </tr> -->
                <tr>
                    <td>Item Name :</td>
                    <td><input type="text" name="name" ></td>
                </tr>
                <tr>
                    <td>Item Image :</td>
                    <td><input type="text" name="img"></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr>
                    <td>price :</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <td>Stock :</td>
                    <td><input type="text" name="stock"></td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td><input type="text" name="catogory"></td>
                </tr>
                    <td><input type="submit" value="Add" name="submit" value='Add'></td>
                    <td><input type="reset" value="Clear"></td>
                </tr>
            </table>
            </form>
        </div>
        <?php
        
        if(isset($_POST['submit'])){
                // $code=$_POST['code'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
                $catogory=$_POST['catogory'];

                $sql_valuee="INSERT INTO fooditem(ItemName,ItemImage,Description,Price,Stock,Category)
                VALUES ('$name','$img','$description','$price','$stock','$catogory');";
                header("refresh:0");
                mysqli_query($conn,$sql_valuee);
        }    


            if (isset($_POST["delete"])) {
                if(isset($_POST['del_id'])){
                    $row_code=$_POST['del_id'];
                    mysqli_query($conn,"DELETE FROM fooditem WHERE ItemCode='$row_code';");
                    header("refresh:0");
                    echo '<p>Item iS deleted<p>';
                }
                else{
                    echo '<p>Not delete item'.mysqli_error($conn).'<p>';
                }
            }

        mysqli_close($conn);
                      
        ?>
        </div>
    </body>
</html>