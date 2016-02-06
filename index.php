<?php
session_start();
if (isset($_SESSION['username'])) {
  echo "hello ".$_SESSION['username'];
  echo "<br /><a href='logout.php'>logout</a>";
} else if (isset($_COOKIE['neAuth'])) {
  echo "hello ".$_COOKIE['neAuth'];
  echo "<br /><a href='logout.php'>logout</a>";
} else {
  echo "<a href='login.php'>login</a>";
}

$_SESSION['origin_page'] = $_SERVER['REQUEST_URI']; //make this the previous page for error.php
?>
