<?php
  include_once "header.php"
?>

<?php
if(isset($_SESSION['u_id'])){
  header("Location: index.php?error=logoutfirst");
  exit();
}
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url,'error=empty')){
  echo 'Fill out all the empty fields';
}elseif (strpos($url,'invalidName')) {
  echo 'Input a valid First or Last name' ;
}elseif(strpos($url,'error=email')){
  echo 'Input a valid email' ;
}elseif (strpos($url,'error=usertaken')) {
  echo 'please change another username or email' ;
}


?>
    <section class="main-container">
      <div class="main-wrapper">
        <h2>Signup</h2>
        <form class="signup-form" action="./includes/signup.inc.php" method="post">
          <input type="text" name="first" placeholder="First Name">
          <input type="text" name="last" placeholder="Last Name">
          <input type="text" name="email" placeholder="Email">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="submit">Sign Up</button>

        </form>
      </div>
    </section>


<?php
  include_once "footer.php"
?>
