<?php
 Include "../dbconnect.php";
  if (isset($_FILES['image']['tmp_name'])) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    if (!empty($_POST)){
      $product = $_POST['product'];
    $sql = "INSERT INTO images (name, image,product)
    VALUES ('Image', '$image','$product')";

    if (mysqli_query($conn, $sql)) {
      echo "<p>Image and </p>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if (!empty($_POST)){
        $product = $_POST['product'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $specifications = $_POST['specification'];
        if (isset($_POST['choice'])) {
          $selectedValue = $_POST['choice'];
        }
    $sql = "INSERT INTO $selectedValue (product,price,color,specification) VALUES ('$product','$price','$color','$specifications')";
    
    if (mysqli_query($conn, $sql)) {
      echo "<p>Data uploaded successfully.</p>";
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
} 
  }
}
  mysqli_close($conn);
?>
