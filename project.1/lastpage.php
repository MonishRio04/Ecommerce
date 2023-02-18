<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>d-mart</title>
    <style>
        #btn{
            background-color:blue;
            margin:10px;
            color:white;
            padding:10px;
            font-weight:bold;
            border-style:none;
            cursor:pointer;
            border-radius:3px;
        }
        #btn:hover{
            color:blue;
            background-color:white;
            transition-duration:1000ms;
           
        }
    </style>
</head>
<body>
  
    <div class="container mt-5">
        <h1 class="text-center">Order Confirmed!
            <img src="img/seal.png">
        </h1>
        <h4 class="text-center mt-4">Details</h4>
        <table class="table table-bordered mt-4">
        <?php
        include "dbconnect.php";
        if (!empty($_GET)){
            $product = $_GET['product'];
            $price = $_GET['price'];
            $color = $_GET['color'];
            $id = $_GET['id'];
            $name = $_GET['name'];
            $address = $_GET['address'];
            $pincode = $_GET['pincode'];
            $mobile = $_GET['mobile'];
            $datetime = date("Y-m-d H:i:s");
            if(isset($_GET['paymentmode'])) {
                $selected_value = $_GET['paymentmode'];
                //echo "You selected: ".$selected_value;
             }
             $sql = "INSERT INTO orders (product,name,address,mobile,pincode,payment) VALUES ('$product','$name','$address','$mobile','$pincode','$selected_value')";
        
             if (mysqli_query($conn, $sql)) {
               echo "";
             } else {
               echo "Error inserting data: " . mysqli_error($conn);
             } 
             echo'
            <tr>
                <th>Product Name</th>
                <td>'.$product.'</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>'.$price.'</td>
            </tr>
            <tr>
                <th>Color</th>
                <td>'.$color.'</td>
            </tr>
            <tr>
                <th>Date & Time</th>
                <td>'.$datetime.
                '</td>
            </tr>
            <tr>
                <th>ID</th>
                <td>'.$id.'</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>'.$name.'</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>'.$address.'</td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td>'.$pincode.'</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>'.$mobile.'</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>'.$selected_value.'</td>
            </tr>
        </table>
    </div>';
    }
    ?><center>
    <button id="btn" type="button" onclick="window.print()">print</button></center>
</body>
</html>


