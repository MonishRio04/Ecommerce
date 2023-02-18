<html>
    <head>
        <title>LOGIN FORM</title>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="login">
                <center>
                    <h2 id="head">Login Page</h2></center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           <label> <p>Email</p></label>
            <input type="text" id="Uname" name='email' placeholder="Enter Username">
            <label><p>Password</p></label>
            <input type="password" id="pass"  name='password' placeholder="Enter Password"><br><br>
             <input type="checkbox" id="check">
             <span style="color:white">Remember me</span>
            <a href="register.php" style="color:blue">Register New Account</a>
             <br><br>
            <button type="submit"id="log">submit </button>
        </form>
    </div>
    <?php 
    include "../dbconnect.php";
    if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        header("Location: ../index.html");
    } else {
        echo "<center style='color:red';>Invalid email and password or register new account</center>";
    }
    }
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    if($email=="admin"&&$password=="monish"){
        header("Location:admin.php");
    }
}
    ?>
</body>
</html>