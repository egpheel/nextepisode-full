<?php
include_once "libs/functions.php";

session_start();

$_SESSION['origin_page'] = $_SERVER['REQUEST_URI'];

register();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="favicon/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="favicon/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="&nbsp;" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mfavicon/stile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="favicon/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="favicon/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="favicon/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="favicon/mstile-310x310.png" />


  <!-- custom fonts -->
  <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- my JS -->
  <script type="text/javascript" src="js/appname.js"></script>
  <script type="text/javascript" src="js/reg.js"></script>
  <script type="text/javascript" src="js/moment.js"></script>
  <script type="text/javascript" src="js/validation.js"></script>

  <!-- my CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/forms.css">

  <title class="appname">Next Episode</title>
</head>

<body id="appBody">
  <div class="container-fluid topPage">
    <div class="container real-vcenter">
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Create an account</h2>
        <div id="regUser" class="has-feedback">
          <label for="inputUser" class="sr-only">Username</label>
          <input type="text" id="inputUser" name="user" class="form-control" placeholder="Username" required autofocus>
          <span class="success glyphicon form-control-feedback" aria-hidden="true"></span>
          <span class="successsr sr-only">(success)</span>
        </div>
        <div id="regEmail" class="has-feedback">
          <label for="inputEmailReg" class="sr-only">Email address</label>
          <input type="email" id="inputEmailReg" name="email" class="form-control" placeholder="Email" required>
          <span class="success glyphicon form-control-feedback" aria-hidden="true"></span>
          <span class="successsr sr-only">(success)</span>
        </div>
        <div id="regPass" class="has-feedback">
          <label for="inputPasswordReg" class="sr-only">Password</label>
          <input type="password" id="inputPasswordReg" name="pass" class="form-control" placeholder="Password" required>
          <span class="success glyphicon form-control-feedback" aria-hidden="true"></span>
          <span class="successsr sr-only">(success)</span>
        </div>
        <div id="regRePass" class="has-feedback">
          <label for="inputRePasswordReg" class="sr-only">Retype Password</label>
          <input type="password" id="inputRePasswordReg" name="confirmpass" class="form-control" placeholder="Confirm Password" required>
          <span class="success glyphicon form-control-feedback" aria-hidden="true"></span>
          <span class="successsr sr-only">(success)</span>
        </div>
        <button id="regBtn" class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Create Account</button>
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
      </form>
      <div class="clearfix"></div>
    </div>
  </div>
</body>

</html>
