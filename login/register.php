<html>
    <head>
        <title>Register Form</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <br>
        <div class="login">
            <form id="login"method="POST" action="">
                <center>
                    <h2 id="head">Register</h2>
                </center>
                <label>
                    <b>  Name</b>
                </label><br>
                <input type="text" name="name" id="Uname" required placeholder=" name">
                <br><br>
                <label>
                    <b>Number</br>
                    </label>
                    <input type="tel" name="number" id="Uname" required placeholder=" number">
                    <br><br>
                    <label>Email</label><br>
                    <input type="email" name="email" id="Uname" required placeholder=" email">
                    <br><br>
                    <label>
                        <b>Password</br>
                        </label>
                        <input type="password" name="password" id="Pass" required placeholder=" password">
                        <br><br>
                            <button type="submit" name="log" id="log" >SUBMIT</a></button>
                            <a href="login.php" style="color:blue">Already have Account</a>
                            <br><br>
                        <br><br>
                </form>
                <?php 
                include "../dbconnect.php";
                if (!empty($_POST)) {
                    $name = $_POST['name'];
                    $number=$_POST['number'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                
                    if ($result->num_rows > 0) {
                        $_SESSION['logged_in'] = true;
                       echo "<p style='color:red'>Email Already Exists</p>";
                    } 
                    else{
                    $sql = "INSERT INTO register ( name,number,email,password ) VALUES ('$name','$number','$email','$password')";
                    if (mysqli_query($conn, $sql)) {
                        header("Location:registeredsuc.html");
                    
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                    }
                    // Close the connection
                    mysqli_close($conn);
                    ?>
            </div>   
        </body>
        </html> 