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
    <style>
        body{
            background-color: #f2f2f2;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }
       #logo img{
            height: 50px;
            margin: 3px 2px;
        }
        .box img{
            height:150px;
            width:200px;
        }
        .box{
            background-color: white;
            width: fit-content;
            margin: 40px;
            border-radius: 22px;
            padding: 22px;
            border-style: solid;
            border-color: red;
            display: block;
        }h1{
            font-weight: bold;
        }
        #buy-btn{
            text-decoration:none;
            color:white;
            border-style:solid;
            background-color:red;
            border-radius:22px;
            font-weight:bold;
            padding:5px;
            border-color:red;
        }
        .row{
            display:inline-grid;
            padding-left:50px;
        }
        input{
            border-radius:8px;
            height:30px;
            justify-content:center;
            font-weight:bold;
        }
        form button{
            border-style:none;
            background-color:red;
            color:white;
            margin:5px;
            font-size:20px;
            cursor:pointer;
        }form button:hover{
            background-color:white;
            color:red;
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
        <li><a href="index.html"><i class="fa fa-home" style="font-size:20px;margin:20px; color:black;"></a></i></li>
        <form method="post" action="">
            <li><input type="search" name="search"><button type="submit"><i class="fa fa-search"></i></a></li>
    </form>
          </ul>
        </nav>
        <?php
        // Connect to the database
        include "dbconnect.php";
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        } else {
            $search = '';
        }
        
        // Get the search term from the query string
        
        // Write a SQL query
        $sql = "SELECT * FROM mobiles WHERE product LIKE '%$search%' OR color LIKE '%$search%' OR price LIKE '%$search%' 
        OR specification LIKE '%$search%'";
        
        // Execute the query
        $result = mysqli_query($conn, $sql);
        
        // Check for an error
        if(!$result) {
          echo mysqli_error($conn);
          exit;
        }
        ?>
          <?php while($row = mysqli_fetch_assoc($result)): ?>
            <?php echo'
                <div class="row">
                <div class="box">
                <form method="GET">
                        <a href="click.php?id='. $row['id'] .'">
                        <img src="'.$row['image'].'">
                        <h1 class="h-secondary center" id="name" >'. $row['product']. '</h1>
                        <h1 class="center" id="price">'. $row['price']. '</h1>
                        <p class="center" id="clr">'. $row['color'].'</p></a>                        
                        </div>
                       </div>
                       </form>
           '?>
          <?php endwhile; 
        ?>
</body>
</html>