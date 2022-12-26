<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup page</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body >
    <div class="login-box" id="signup">
      <h2>Sign Up</h2>
      <form action="includes/signup.inc.php" method="post">
        <div class="user-box">
          <input type="text" name="name" >
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="text" name="email" >
          <label>Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="pwd" >
          <label>Password</label>
        </div>
        <div class="user-box">
          <input type="password" name="pwdrepeat" >
          <label>Repet Password</label>
        </div>
        <button type="submit" name="submit" >
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Rigister
        </button> 
        <?php
        if(isset($_GET["error"])){
          if ($_GET["error"] == "emptyinput") {
            echo '<p style="color: white;" > Fill in all the fields !</p>';
          }
          if ($_GET["error"] == "invalidusername") {
            echo '<p style="color: white;" > Choose a propre username !</p>';
          }
          if ($_GET["error"] == "invalidemail") {
            echo '<p style="color: white;" > Shoose a propre email address !</p>';
          }
          if ($_GET["error"] == "pwdsdontmatch") {
            echo "<p style='color: white;' > Passwords doesn't match !</p>";
          }
          if ($_GET["error"] == "stmtfailed") {
            echo "<p style='color: white;' > Something went wrong, try again !</p>";
          }
          if ($_GET["error"] == "userexists") {
            echo "<p style='color: white;' > This Email already taken !</p>";
          }
        }
      ?>
      </form>
       
    </div>

</body>
</html>