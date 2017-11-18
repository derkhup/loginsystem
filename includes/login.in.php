<?php

 session_start();

if (isset($_POST['submit'])) {

 include 'dbc.php';

 $login = mysqli_real_escape_string($conn, $_POST['login']);
 $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


 //error handler
 //check if inputs are empty
 if (empty($login) || empty($pwd)){
  header("Location: login.php?login=empty");
  exit();
 } else {
  $sql = "SELECT * FROM user WHERE name='$login'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck < 1) {
   header("Location: login.php?login=error1");
   exit();
  } else {
   if ($row = mysqli_fetch_assoc($result)) {
    //dehashing
    $hashedPwdCheck = password_verify($pwd, $row['pwd']);
    if ($hashedPwdCheck == false) {
     header("Location: login.php?login=error2");
     exit();
    } elseif ($hashedPwdCheck == true) {
     //Log in user
     $_SESSION['s_id'] = $row['name'];
     header("Location: index.php?login=success");
     exit();
    }
   }
  }
 }
} else {
 header("Location: login.php?login=error3");
 exit();
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

