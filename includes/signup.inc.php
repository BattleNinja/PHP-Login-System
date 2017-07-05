<?php


  if(isset($_POST['submit'] )){
    include_once "dbh.inc.php";

    $first =  mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

    //Error handler
    //check for empty field
    if (empty($first)||empty($last)||empty($email)||empty($username)||empty($pwd)) {
      header('Location: ../signup.php?error=empty');
      exit();
    } else {
      //check if input character is valid
      if (!preg_match("/^[a-zA-Z]*$/",$first) && !preg_match("/^[a-zA-Z]*$",$last)) {
        header('Location: ../signup.php?error=invalidName');
        exit();
      } else{
        // Check if email is valid
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          header('Location: ../signup.php?error=email');
          exit();
        } else{
          //检查 username 是不是 重复 了
          $sql = "select * from users where user_uid = '$username' or user_email='$email'";
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck>0) {
            header('Location: ../signup.php?error=usertaken');
            exit();
          } else{
            // Hashing the password
            $hashedpwd =  password_hash($pwd,PASSWORD_DEFAULT);
            // insert the user into database
            $sql = "insert into users(user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first','$last','$email','$username','$hashedpwd')" ;
            mysqli_query($conn,$sql);
            header('Location: ../signup.php?signup=success');
            exit();
          }
        }
      }
    }



  }else{
    header('Location: ../signup.php');
    exit();
  }
