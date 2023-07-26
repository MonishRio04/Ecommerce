<!DOCTYPE html>
<html>
    <head>
        <title>admin FORM</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body style="background-color:black">
        <br>
        <div class="flex">
        <div class="login">
            <form id="login"method="POST"action="" enctype="multipart/form-data">
                <center>
                    <h2 id="head">to add item</h2>
                </center>
                <label>Item Name</label><br>
                <input type="text" name="product" id="Uname" required placeholder=" itemname">
                <br><br>
                <label>Image url</label></br>
                    <input type="file" name="image" id="bar" required placeholder=" url">
                    <br><br>
                    <label>Color</label><br>
                    <input type="text" name="color" id="Uname" required placeholder=" color">
                    <br><br>
                    <label>Specification</label></br>
                        <textarea name="specification" id="Pass" required rows="4" cols="50"></textarea>
                        <br><br>
                        <label>Price</label><br>
                            <input type="text" name="price" id="Pass" required placeholder=" Price">
                            <br><br>
                            <label>select product category</label><br>
                            <input type="radio" id="mobiles" name="choice" value="mobiles">
                            <label for="mobiles">mobile</label><br>
                            <input type="radio" id="laptops" name="choice" value="laptops">
                            <label for="laptops">laptop</label><br>
                            <input type="radio" id="cameras" name="choice" value="cameras">
                            <label for="cameras">camera</label> 
                             <br><br>
                               <input type="submit" name="submit" id="log" value="SUBMIT">                                                    
                </form>
            </div>
            <?php 
            include "../dbconnect.php";
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
              echo mysqli_error($conn);
              exit;
            }
            ?>
              <div class="table">
            <table class="table table-stripped table-hover">
                <h1>order details</h1>
                <tr>
                <th>S/no</th>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile Number</th>
                <th>Product</th>
                <th>Pincode</th>
                <th>Mode of payment</th>
                <th>status</th>
                </tr>
                <?php while($rowe = mysqli_fetch_assoc($result)): ?>
                 <?php echo'
                 <form method="POST" action="">
                <td>'.$rowe['sno'].'</td>
                <td>'.$rowe['name'].'</td>
                <td>'.$rowe['address'].'</td>
                <td>'.$rowe['mobile'].'</td>
                <td>'.$rowe['product'].'</td>
                <td>'.$rowe['pincode'].'</td>
                <td>'.$rowe['payment'].'</td>
                <td> 
                <input type="hidden" name="sno" value="'.$rowe['sno'].'">
                <button type="submit" class="btn btn-warning">packed</button></td>
                </tr>
                </form>
            </table>'
            ?><?php endwhile;
            if(isset($_POST['sno'])){
              $sno = $_POST['sno'];
              $sql = "DELETE FROM orders WHERE sno='$sno'";
              if (mysqli_query($conn, $sql)) {
               echo "";
                exit;
              } else {
                echo "Error deleting record: " . mysqli_error($conn);
              }
           }
           mysqli_close($conn);
               ?>
          </table></div> 
            </div>   
</div>
<?php
   include "../dbconnect.php";
   $sql = "SELECT * FROM laptops";
   $result = mysqli_query($conn, $sql);
   if(!$result) {
     echo mysqli_error($conn);
     exit;
   }
   ?>
   <h1 style="text-align:center;color:white">Item details</h1>
            <div class="table">
            <table class="table table-stripped table-hover">
                <h1>laptops</h1>
                <tr>
                <th>Name</th>
                <th>Id</th>
                <th>Remove</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <?php
                echo'
                <form method="POST" action="">
                <tr>
                <td>'.$row['product'].'</td>
                <td>L'.$row['id'].'</td>
                <td>
                <input type="hidden" name="id" value="'.$row['id'].'">
                <button type="submit" class="btn btn-danger">remove</button></td>
                </tr>
                </form>
            '?>
            <?php endwhile;
             if(isset($_POST['id'])){
                $id = $_POST['id'];
                $sql = "DELETE FROM laptops WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                 echo "deleted";
                  exit;
                } else {
                  echo "Error deleting record: " . mysqli_error($conn);
                }
             }
                 ?>
            </table></div> 
          <?php  
          $sql = "SELECT * FROM cameras";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                echo mysqli_error($conn);
                exit;
            }
   ?>
    <div class="table">
            <table class="table table-stripped table-hover">
                <h1> cameras</h1>
                <tr>
                <th>Name</th>
                <th>Id</th>
                <th>Remove</th>
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                 <?php
                 echo'
                 <form method="POST" action="">
                <tr>
                <td>'.$row['product'].'</td>
                <td>C'.$row['id'].'</td>
                <td>
                <input type="hidden" name="id" value="'.$row['id'].'">
                <button type="submit" class="btn btn-danger">remove</button></td>
                </tr>
                </form>
            ';
           
            ?><?php endwhile ;
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $sql = "DELETE FROM cameras WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                 echo "deleted";
                  exit;
                } else {
                  echo "Error deleting record: " . mysqli_error($conn);
                }
             }
                ?>
           </table>  </div> 
      <?php  
            $sql = "SELECT * FROM mobiles";
        $result = mysqli_query($conn, $sql);
        if(!$result) {
            echo mysqli_error($conn,$sql);
            exit;
   }
   ?>
           <div class="table">
            <table class="table table-stripped table-hover">
                <h1>mobiles</h1>
                <tr>
                <th>Name</th>
                <th>Id</th>
                <th>Remove</th>
                </tr> 
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <?php
                echo'
                <form method="POST" action="">
                <tr>
                <td>'.$row['product'].'</td>
                <td>M'.$row['id'].'</td>
                <td>
                <input type="hidden" name="id" value="'.$row['id'].'">
                <button type="submit" class="btn btn-danger">remove</button></td>
                </tr>
                </form>
            </table>';
             
            ?><?php endwhile ;
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $sql = "DELETE FROM cameras WHERE id='$id'";
                if (mysqli_query($conn, $sql)) {
                 echo "deleted pwd='monishkaviya4'";
                  exit;
                } else {
                  echo "Error deleting record: " . mysqli_error($conn);
                }
             }
             mysqli_close($conn);
                ?>
            </div>  
           <?php
           include "verify.php";
          
         ?>
        
        </body>
        </html> 
