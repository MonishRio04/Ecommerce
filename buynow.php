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
                background-image: linear-gradient(to right,#f11d32,skyblue);
            }h1{
                color:black;
                font-style: italic;
                font-family: Times New Roman;
            }
            table,tr,th,td,thead{
                border: 2px solid lightblue;
                border-collapse:collapse;
                background-color: #f2f2f2;
                padding:20px;
                border-radius: 12px;
                text-align:center;
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
        $datetime = date("Y-m-d H:i:s");
        ?>
        <center>
        <h1>order sumary</h1>
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
                <td id="item">'.$row['product'].'</td>
                <td id="price">'.$row['price'].'</td>
                <td id="color">'.$row['color'].'</td>
                <td id="date and time">'.$datetime.'</td>
                <td id="id">'.$row['id'].'</td>
                </tbody>'?>
                <?php endif;
                 ?>
            </tr>
        </table>
        <form method="post"action="lastpage.php">
            <label>enter name </label>
            <input type="text"required><br><br>
            <label>enter address </label>
            <input type="text"required><br><br>
            <label>enter pincode </label>
            <input type="tel"required><br><br>
            <label>mobile number </label>
            <input type="tel"required>
            <h4>Select payment method </h4>
             <input type="radio" id="cod" name="paymentmode" value="COD" required>
            <label for="html">Cash on deleiver</label><br>
            <input type="radio" id="UPI" name="paymentmode" value="UPI"required>
            <label for="css">UPI</label><br>
          <button type="submit"  id="btn">submit</button>
        </form>
        <?php
        if(isset($_POST['paymentmode'])) {
            $selected_value = $_POST['paymentmode'];
            echo "You selected: ".$selected_value;
         }
         ?>
        </center>
       </body>
</html>