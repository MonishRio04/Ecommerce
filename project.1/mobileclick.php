<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer/nav.css">
    <link rel="stylesheet" href="clickpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>D-Mart</title>
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
        $sql = "SELECT * FROM mobiles";
        $result = mysqli_query($conn, $sql);
        if(!$result) {
          echo mysqli_error($conn);
          exit;
        }
        ?>
          <?php while($row = mysqli_fetch_assoc($result)): ?>
            <?php 
            $sql="SELECT * FROM images WHERE product LIKE '%{$row['product']}%';";
            $results = mysqli_query($conn, $sql);
            if(!$results) {
              echo mysqli_error($conn);
              exit;
            }
            $rows = mysqli_fetch_assoc($results);
            $image = $rows['image'];
            $encimage = base64_encode($image);

            echo'
                <div class="row">
                <div class="box">
                <form method="GET">
                        <a href="mClick.php?id='. $row['id'] .'">
                        <img src="data:image/jpeg;base64,'.$encimage.'">
                         <h1 class="h-secondary center" id="name" >'. $row['product']. '</h1>
                        <h1 class="center" id="price">
                        <i class="fa fa-inr"></i>'. $row['price']. '</h1>
                        <p class="center" id="clr">'. $row['color'].'</p></a>                        
                        </div>
                       </div>
                       </form>
           ';
           ?>
          <?php endwhile; 
        ?> 

</body>
</html>