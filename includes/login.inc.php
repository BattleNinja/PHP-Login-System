<?php
  session_start(); // 这样才能  用 session；

  if(isset($_POST['submit'])){
    include "dbh.inc.php";
    $uid = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
  
    // Error handler

    // check is input is empty
    if(empty($uid)||empty($pwd)){
      header("Location: ../index.php?login=empty");
      exit();
    } else{
        $sql = "select * from users where user_uid = '$uid' or user_email='$uid' ";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck<1) {
          header("Location: ../index.php?login=error_uid");
          exit();
        }else{
          if ($row = mysqli_fetch_assoc($result)) {
            // Dehashing the password
            $hashedpwdcheck = password_verify($pwd,$row['user_pwd']);
            if($hashedpwdcheck==false){
              header('Location: ../index.php?login=error_pwd');
            } else {
              //Log in the user there
              $_SESSION['u_id'] = $row['user_id'];
              $_SESSION['u_first'] = $row['user_first'];
              $_SESSION['u_last'] = $row['user_last'];
              $_SESSION['u_email'] = $row['user_email'];
              $_SESSION['u_id'] = $row['user_id'];
              header('Location: ../index.php?login=success');
              exit();

            }
          }
        }

  }
}
