<?php

// make db
require("yan6.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) ||
       empty($_POST['password']))
    {
        $error = "username or password is empty";
        
    } else {
        // save username & password in a variable
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //2. prepare query
        $query = "SELECT username, password, level ";
        $query .= "FROM user ";
        $query .= "WHERE username = '$username' AND
        password = '$password' ";
        
        // execute query
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die("query is wrong");
        }
        
        // Save data to $row
        $row = mysqli_fetch_array($result);
        
        // check how many answers did we get
        $numrows=mysqli_num_rows($result);
        if ($numrows == 1) {
            //start to use sessions
            session_start();
            
            // create session variable
            $_SESSION['login_user'] = $username;
             $_SESSION['login_level'] = $row['level'];
            
            if ($_SESSION['login_level'] == "5")
            {header('location:  employ.php');}
            
            if ($_SESSION['login_level'] == "3")
            {header('location: metro.php');}
            
            if ($_SESSION['login_level'] == "2")
            {header('location: metromanagement.php');}
            
            if ($_SESSION['login_level'] == "4")
            {header('location: employ.php');}
          
            
            
            }
        else {
            echo"login failed";
        }
        
        //4. free result
        mysqli_free_result($result);
        
        //5. close
        mysqli_close($connection);
    }
}

?>

<?php
if (isset($error)) {
    echo "<span>" . $error ."</span>";
    
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
        <form  action="login.php" method="post" style="text-align: center;">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="username" placeholder="username" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" placeholder="password" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Login">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
