<?php 
  include "../dbconnect.php";
  if (isset($_POST['choice'])) {
    $selectedValue = $_POST['choice'];
    if (!empty($_POST)){
        $product = $_POST['product'];
    $stmt = $conn->prepare("SELECT * FROM $selectedValue WHERE product = ?");
    $stmt->bind_param("s", $product);
    $stmt->execute();
    $result = $stmt->get_result(); 
    if ($result->num_rows > 0) {
      echo "<h1 style='color:red'>item Already Exists</h1>";
    }
    else{
      include "upload.php";
    }
}
  }
    ?>
