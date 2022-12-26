<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <div class="login-box" id="login">
        <h2>Log In</h2>
        <form action="includes/login.inc.php" method="post">
          <div class="user-box">
            <input type="text" name="email" >
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="pwd" >
            <label>Password</label>
          </div>
          <button type="submit" name="submit" onclick="dashboard()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </button>
        </form>
        <?php
        if(isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput") {
            echo '<p style="color: white;" > Fill in all the fields !</p>';
          }
          if ($_GET["error"] == "wronglogin") {
            echo '<p style="color: white;" > Email or Password uncorrect !</p>';
          }
          
        }
      ?>
        <footer>
          don't have an account ? 
          <span onclick="signup()">
            Register now
          </span>
        </footer>
        </div>

</body>
    <script src="script.js"></script>
</html>