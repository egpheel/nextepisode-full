<?php
include_once "db_config.php";
include_once "db_connect.php";

function register() {
  if (isset($_POST["submit"])) {
    $userValid = false;
    $emailValid = false;
    $passValid = false;
    $confirmPassValid = false;
    $errorMsg = "";

    $user = $_POST["user"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confirmpass = $_POST["confirmpass"];
    $created = gmdate("Y-m-d H:i:s");
    global $db;

    $userValidChars = "/^[a-z0-9_-]{3,16}$/"; //no special chars, username between 3 and 16 characters
    $emailValidChars = "/[a-zA-Z0-9]+(?:(\.|_)[A-Za-z0-9!#$%&'*+\/=?^`{|}~-]+)*@(?!([a-zA-Z0-9]*\.[a-zA-Z0-9]*\.[a-zA-Z0-9]*\.))(?:[A-Za-z0-9](?:[a-zA-Z0-9-]*[A-Za-z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?/";
    $passValidChars = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
    /*  - at least 8 characters
    - must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number
    - Can contain special characters */

    if (preg_match($userValidChars, $user)) {
      $errorMsg .= "";
      $userValid = true;
      //echo "debug: user good<br />";
    } else {
      $errorMsg .= "Your username must not have any special characters and must be between 3 and 16 characters.<br />";
      $userValid = false;
    }

    if (preg_match($emailValidChars, $email)) {
      $errorMsg .= "";
      $emailValid = true;
      //echo "debug: email good<br />";
    } else {
      $errorMsg .= "Your email address is not valid.<br />";
      $emailValid = false;
    }

    if (preg_match($passValidChars, $pass)) {
      $errorMsg .= "";
      $passValid = true;
      //echo "debug: pass good<br />";
    } else {
      $errorMsg .= "Your password doesn't meet the requirements.<br /> - at least 8 characters;<br /> - must contain at least 1 uppercase letter, 1 lowercase letter and 1 number.<br />";
      $passValid = false;
    }

    if ($pass == $confirmpass) {
      $errorMsg .= "";
      $confirmPassValid = true;
      //echo "debug: passwords match<br />";
    } else {
      $errorMsg .= "Your passwords don't match.<br />";
      $confirmPassValid = false;
    }

    if ($userValid && $emailValid && $passValid && $confirmPassValid) {
      $user = mysqli_real_escape_string($db, $user);
      $email = mysqli_real_escape_string($db, $email);
      //$email = password_hash($email, PASSWORD_DEFAULT); //hash email
      $pass = mysqli_real_escape_string($db, $pass);
      $pass = password_hash($pass, PASSWORD_DEFAULT); //hash password

      $sql = "SELECT email FROM users WHERE email='$email'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if (mysqli_num_rows($result) == 1)
      {
        $errorMsg = "Sorry, that email address is already in use.";
        header('Location: ./error.php?err='.$errorMsg);
      } else {
        $sql = "SELECT username FROM users WHERE username='$user'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) == 1) {
          $errorMsg = "Sorry, that username is already in use.";
          header('Location: ./error.php?err='.$errorMsg);
        } else {
          $query = mysqli_query($db, "INSERT INTO users (username, email, password, created) VALUES ('$user', '$email', '$pass' ,'$created')");

          if ($query) {
            header('Location: ./register_success.php');
          }
        }
      }
    } else {
      header('Location: ./error.php?err='.$errorMsg);
    }
  }
}

function login() {
  if (isset($_POST["login"])) {
    $email = $_POST["inputEmail"];
    $pass = $_POST["inputPassword"];
    $remember = $_POST["inputRemember"];
    global $db;
    $errorMsg = "";

    $sql = "SELECT username FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $user = $row['username'];

    $email = mysqli_real_escape_string($db, $email);

    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 1) {
      // email exists on the db
      $sql = "SELECT password FROM users WHERE email ='$email'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $hash = $row['password'];
      if (password_verify($pass, $hash)) {
        //Success!
        if (!$remember) {
          $_SESSION['username'] = $user;
          header('Location: ./');
        } else {
          setcookie("neAuth", $user, time() + (3600*24*7)); //7 days
          header('Location: ./');
        }
      } else {
        $errorMsg = "Wrong password!";
        header('Location: ./error.php?err='.$errorMsg);
      }
    } else {
      $errorMsg = "That email address doesn't exist in our database.";
      header('Location: ./error.php?err='.$errorMsg);
    }
  }
}
?>
