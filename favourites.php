
<?php
include_once "libs/db_config.php";
include_once "libs/db_connect.php";
include_once "libs/functions.php";
session_start();
list($user, $loggedin, $avatar) = checkLoggedInStatus();
$_SESSION['origin_page'] = $_SERVER['REQUEST_URI']; 
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="favicon/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="favicon/favicon-128.png" sizes="128x128">
    <meta name="application-name" content="&nbsp;">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="mfavicon/stile-144x144.png">
    <meta name="msapplication-square70x70logo" content="favicon/mstile-70x70.png">
    <meta name="msapplication-square150x150logo" content="favicon/mstile-150x150.png">
    <meta name="msapplication-wide310x150logo" content="favicon/mstile-310x150.png">
    <meta name="msapplication-square310x310logo" content="favicon/mstile-310x310.png">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--my JS-->
    <script type="text/javascript" src="js/appname.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
    <!--moment.js-->
    <script type="text/javascript" src="js/moment.js"></script>
    <!--my CSS-->
    <link rel="stylesheet" href="css/layout.css">
    <title class="appname">Next Episode</title>
  </head>
  <body>
    <div class="cover">
      <div class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#nb-collapse" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="/nextepisode-full">
              <div class="brand-lockup">
                <div class="logo">ne</div>
                <div class="navbar-brand appname">Next Episode</div>
                <div class="version">alpha</div>
              </div></a>
          </div>
          <div id="nb-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="navbar-menu"><a href="tv-shows">TV Shows</a></li><?php if ($loggedin) { ?>
              <li class="dropdown"><a data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="navbar-menu dropdown-toggle">
                  <div class="avatar-lockup"><img src="<?php echo $avatar ?>" class="avatar"><?php echo $user ?><span class="caret"></span></div></a>
                <ul class="dropdown-menu">
                  <li><a href="favourites">My Favourites</a></li>
                  <li><a href="account">My Account</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="logout">Sign out</a></li>
                </ul>
              </li><?php } else { ?>
              <li><a href="login" class="navbar-menu">Sign in</a></li><?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="container vcenter">
        <div class="row">
          <div class="col-md-12">
            <h1>My Favourites</h1>
            <p>This is where I'll put your favourite TV Shows.</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>