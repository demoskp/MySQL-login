<?php

if (isset($_POST['submit'])){
    include_once 'dbl.php';

    $first = mysqli_real_escape_string($conn,$_POST['fname']);
    $last = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $uid = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);

    //Error handlers
    //Check for empty fields
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
      header("Location: ../signup.php?signup=empty");
      exit();
    } else {
      // Check if input characters are valid
      if(!preg_match("/^[a-zA-Z]*$/",$first) || !preg_match("/^[a-zA-Z]*$/",$last)){
        header("Location: ../signup.php?signup=invalid");
        exit();
      } else {
        // Check if email is invalid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          header("Location: ../signup.php?signup=email");
          exit();
        } else {
          // Check for existing username
          $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
          $result = mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            header("Location: ../signup.php?signup=usertaken");
            exit();
          } else {
            // Hashing the Password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            // Insert the user into the database
            $sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
            mysqli_query($conn,$sql);
            header("Location: ../signup.php?signup=success");
            exit();
          }
        }
      }
    }

} else {
    header("Location: ../signup.php?signup=noset");
    exit();
}
