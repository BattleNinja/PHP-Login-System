<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <header>
      <nav>
        <div class="main-wrapper">
          <ul>
            <li><a href="index.php">Home</a></li>
          </ul>
          <div class="nav-login">
            <?php
              if(isset($_SESSION['u_id'])){
                echo "<form action='./includes/logout.inc.php' method='post'>
                        <button type='submit' name='submit'>Logout</button>
                      </form>";
              }else{
                echo '<form  action="includes/login.inc.php" method="POST">
                        <input type="text" name="username" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Login</button>
                      </form>
                      <a href="signup.php">Signup</a>';
              }
            ?>



          </div>

        </div>
      </nav>
    </header>
