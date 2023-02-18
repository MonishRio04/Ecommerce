<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>Buy now</title>
        <style>
            body{
                text-transform: capitalize;
                font-family:'Times New Roman', Times, serif;
                background-color:#f2f2f2;
            }h1{
                color:black;
                font-style: italic;
                font-family: Times New Roman;
                text-align:center
            }
            table,tr,th,td,thead{
                border: 2px solid lightblue;
                border-collapse:collapse;
                background-color: #f2f2f2;
                padding:20px;
                border-radius: 12px;
               
                margin-bottom: 25px;
            }
            #btn{
                color:white;
                background-color:blue;
                border: none;
                padding:11px 15px;
                border-radius: 20px;
                display:inline-block;
                justify-content:center;
            }#form{
                background-color:white;
                padding:20px;
                text-align:center;
                display:inline-flex;
                border-radius:22px;
                border:3px solid ;
            }#forms{
                margin-left:20px;
            }
        </style>
    </head>
    <body>
   <?php
    include "dbconnect.php";
        // Write a SQL query
        if (isset($_GET['id'])):?>
        <?php
        $id=$_GET['id'];
        $sql="SELECT * FROM cameras WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        // Check for an error
        if(!$result) {
          echo mysqli_error($conn);
          exit;
        }else{
        //$result_item = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        }
        $datetime = date("Y-m-d H:i:s");
        $product=$row['product'];
        $id=$row['id'];
        $price=$row['price'];
        $color=$row['color'];
        ?><center>
        <h1>order sumary</h1>
        <div id="form">
        <table class="">
            <thead class="thead-dark">
            <tr>
            <th scope="col">Item Name</th>
            <th>Price</th>
            <th>color</th>
            <th>date and time</th>
            <th>Id</th>
            </tr></thead>
            <tr><?php echo'
                <tbody>
                <td id="item" name="product">'.$row['product'].'</td>
                <td id="price" name="price">'.$row['price'].'</td>
                <td id="color" name="color">'.$row['color'].'</td>
                <td id="date and time">'.$datetime.'</td>
                <td id="id"name="id">M'.$row['id'].'</td>
                </tbody>'?>
               
                 
                
            </tr>
        </table>
       <div id="forms">
        <?php echo'
       <form method="get"action="lastpage.php">
            <input type="hidden" name="id" value=M'.$id.'>
            <input type="hidden" name="product" value= '.$product.'>
            <input type="hidden" name="price" value='.$price.'>
            <input type="hidden" name="color" value='.$color.'>
            <label>enter name </label>
            <input type="text" name="name" required><br><br>
            <label>enter address </label>
            <input type="text" name="address" required><br><br>
            <label>enter pincode </label>
            <input type="tel" name="pincode" required><br><br>
            <label>mobile number </label>
            <input type="tel" name="mobile" required>
            <h4>Select payment method </h4>
             <input type="radio" id="cod" name="paymentmode" value="COD" required>
            <label for="html">Cash on deleiver</label><br>
            <input type="radio" id="UPI" name="paymentmode" value="UPI"required>
            <label for="css">UPI</label><br>
          <button type="submit"  id="btn">submit</button>'?>
    </div>
          </div>
        </form>
        <?php endif;
        ?>
    </center>
       </body>
</html>