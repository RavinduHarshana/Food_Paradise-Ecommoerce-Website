<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Food Paradise</title>

    <style>
     

      section {
        padding: 60px 0;
      }
      #intro {
        background: #F97B22;
        
      }
      hr {
        background-color: white;
      }
    </style>
  </head>
  <body>
  
    <!-- navbar section  -->
    <?php include 'header.php';?>

    <!-- main image and intro text -->
    <section id="intro">
      <div class="container-lg">
        <div class="row justify-content-center">
          <div class="col-md-5 text-center text-md-start">
            <h1>
              <div class="display-4 text-light">Order in, dig in, delight in every bite!</div>
              <div class="accordion-header">Easy ordering, endless flavors</div>
            </h1>
            <p class="accordion-item my-4 p-3 text-muted">
              Experience a world of flavors at your fingertips. Order online and savor delightful dishes from local eateries, right from the comfort of your home
            </p>
            <a href="#pricing" class="btn btn-danger ">Order Now</a>
          </div>
          <div class="col-md-6 text-center">
            <img
              src="assets/plate.png"
              alt="plate of food"
              class="img-fluid"
            />
          </div>
        </div>

        <div class="container mt-4 col-md-4">
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-light" type="submit">Search</button>
          </form>
        </div>



      </div>
    </section>

   

    <!-- topics at a galance -->
    <section id="topics" class="bg-white">
      <div class="container-md">
        <div class="text-center">
          
          <div class="container-fluid top-header">
            <h1>Explore Our Top Food Items</h1>
            <p>Discover the most loved and popular dishes on our menu.</p>
          </div>


        <!-- card php part -->

        <?php
           $host = 'localhost:3308';
           $username = 'root';
           $password = '';
           $database = 'food_paradise';
           
          
           $conn = mysqli_connect($host, $username, $password);
            
           mysqli_select_db($conn,$database);
           $value=mysqli_query($conn,'SELECT image,food_name,description,order_link From food_items;');
           ?>

            <div class="container mt-4">
            <div class="row">
          <?php
           while ($row = mysqli_fetch_assoc($value)){

            ?>
         
              <div class="col-md-4 mt-4">
                <div class="card">
                  <img src="<?php echo $row['image'];?>" class="card-img-top" alt="Food Item Image" style=" height: 210px; width: 210px; margin-left: 70px;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['food_name'];?></h5>
                    <p class="card-text"><?php echo $row['description'];?></p>
                    <a href="<?php echo $row['order_link'];?>" class="btn btn-outline-danger">Order Now</a>
                  </div>
                </div>
              </div> 

        <?php 
              
               }
                  ?>

              </div>
              </div>     
            
            
        

         


        </div>
      </div>
    </section>

    

    <!-- contact form -->
    <section id="contact" class="bg-light">
      <div class="container-lg">
        <div class="text-center">
          <h2><i class="bi bi-envelope-at"></i> Get in Touch</h2>
          <p class="lead">
            Question to ask? Fill out the form to contact me directly...
          </p>
        </div>

        <div class="row justify-content-center my-5">
          <div class="col-lg-6">
            <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                />
                <div id="emailHelp" class="form-text">
                  We'll never share your email with anyone else.
                </div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label"
                  >Quection</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                />
              </div>
              <div class="mb-3 form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="exampleCheck1"
                />
                <label class="form-check-label" for="exampleCheck1"
                  >Check me out</label
                >
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
