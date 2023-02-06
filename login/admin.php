<html>
    <head>
        <title>admin FORM</title>
        <link rel="stylesheet login.css " type="text/css" href="admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <br>
        <div class="login">
            <form id="login"method="POST" action="">
                <center>
                    <h2 id="head">to add item</h2>
                </center>
                <label>Item Name</label><br>
                <input type="text" name="product" id="Uname" required="" placeholder=" itemname">
                <br><br>
                <label>Image url</label></br>
                    <input type="file" name="image" id="bar" required="" placeholder=" url">
                    <br><br>
                    <label>Color</label><br>
                    <input type="text" name="color" id="Uname" required="" placeholder=" color">
                    <br><br>
                    <label>Specification</label></br>
                        <textarea name="specification" id="Pass" required="" rows="4" cols="50"></textarea>
                        <br><br>
                        <label>Price</label><br>
                            <input type="text" name="price" id="Pass" required="" placeholder=" Price">
                            <br><br>
                            <input type="radio" id="html" name="choice" value="mobiles">
                            <label for="mobiles">mobiles</label><br>
                            <input type="radio" id="css" name="choice" value="laptop">
                            <label for="laptop">laptop</label><br>
                            <input type="radio" id="javascript" name="choice" value="camera">
                            <label for="camera">camera</label> 
                             <br><br>
                               <input type="submit" name="log" id="log" value="SUBMIT">                                                    
                </form>
            </div>
          <?php
            include "../dbconnect.php";
            if (isset($_POST['choice'])) {
                $selectedValue = $_POST['choice'];
            }
            
            if (!empty($_POST)) {
             $image = $_POST['image'];
            $product = $_POST['product'];
            $price=$_POST['price'];
            $color=$_POST['color'];
            $specifications=$_POST['specification'];
            // Insert the data into the database
            $stmt = $conn->prepare("SELECT * FROM $selectedValue WHERE product = ?");
            $stmt->bind_param("s", $product);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
               // $_SESSION['logged_in'] = true;
               echo "<h1 style='color:white'>item Already Exists</h1>";
            } else{
            $sql = "INSERT INTO $selectedValue ( image,product,price,color,specification) VALUES ('image','$product','$price','$color','$specifications')";
            if (mysqli_query($conn, $sql)) {
               echo "<h1 style='text-align:center;color:white;'>new item added successfully</h1>";
               
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
            // Close the connection
            mysqli_close($conn);
            ?>
              <div class="table">
            <table class="table table-stripped table-hover">
                <h1>order details</h1>
                <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>Product</th>
                <th>Pincode</th>
                <th>Mode of payment</th>
                </tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            </table>
            </div>   
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        </body>
        </html> 