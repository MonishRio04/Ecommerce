<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .product-header {
        color: #f11d32;
        background-color: #ffffff;
        padding: 10px;
        text-align: center;
      }
      body{
        margin: 0;
        padding: 0;
      }
      .product-header h1 {
        font-size: 36px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .product-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius:22px;
        border:2px solid white;
        margin-bottom: 20px;
      }

      .product-info {
        padding: 20px;
      }

      .product-title {
        font-size: 22px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      .product-price {
        font-size: 18px;
        color: #5f5f5f;
        font-weight: bold;
        margin-bottom: 20px;
      }

      .product-description {
        font-size: 16px;
        color: #5f5f5f;
        font-weight: bold;
        margin-bottom: 20px;
      }#back{
        background:#f11d32;
        text-transform:capitalize;
      }
      .container{
        background-color:white;
        padding:0;
        
      }p{
        color:#5f5f5f;
      }  nav {
  
  display: flex;

  justify-content: space-around;

  align-items: center;

  min-height: 8vh;

  background-color:#f11d32;

  font-family: "Montserrat", sans-serif;

}

.heading {

  color: white;

  text-transform: uppercase;

  letter-spacing: 5px;

  font-size: 20px;

}

.nav-links {

  display: flex;
  justify-content: space-around;
  width: 20%;
  padding:16px;

}

.nav-links li {

  list-style: none;
  border-radius:20px;

}

.nav-links a {

  color: white;

  text-decoration: none;

  letter-spacing: 3px;

  font-weight: bold;

  font-size: 14px;

  padding: 14px;

}

.nav-links a:hover:not(.active) {

  background-color:white;
  color:#f11d32;
}

.nav-links li a.active {

  background-color: white;
  color:#f11d32;

}
#logo img{
  height: 50px;
  margin: 3px 2px;
}

    </style>
  </head>
  <body>
  <nav>
        <div id="logo">
            <img src="img/logo.png">
            </div>
        <div class="heading">
          <h4>D-Mart</h4>
        </div>
  
        <ul class="nav-links">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="footer/about3.html">About</a></li> 
            <li><a href="#category">Products</a></li>
            <li><a href="footer/contact.html">Contact</a></li>
            <li><a href="search.php"><i class="fa fa-search"></i></a></li>
          </ul>
        </nav>
    <?php
    include "dbconnect.php";
        // Write a SQL query
        if (isset($_GET['id'])):?>
        <?php
        $id=$_GET['id'];
        $sql="SELECT * FROM mobiles WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        // Check for an error
        if(!$result) {
          echo mysqli_error($conn);
          exit;
        }else{
        //$result_item = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        }
        ?><div id="back">
            <?php echo '
    <div class="container">
      <div class="product-header">
        <h1>'.$row['product'].'</h1>
      </div>
      <img class="product-image" src="'.$row['image'].'">
      <div class="product-info">
        <div class="product-title">'.$row['product'].'</div>
        <div class="product-price">'.$row['price'].'</div>
        <div class="product-description">'.$row['specification'].'</div>
        <p>
        user can browse online shops, compare prices and order merchandise sitting at home on their PC.
        For increasing the use of e-commercein developing  countries  the B2B  e-commerce is 
        implementedfor improving access to global markets for firms in developing countries</p>
        <a href="buynow.php?id='. $row['id'] .'"class="btn btn-danger">Buy now</a>'
        ?><?php endif;?><br>
    </div>
    </div>
  </body>
</html>
