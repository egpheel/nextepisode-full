<?php
include_once "db_config.php";

$db = mysqli_connect(HOST, USER, PASS, DATABASE);

/*if (!$db) {
echo "Error: Unable to connect to MySQL." . PHP_EOL;
echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
exit;
}

echo "Connected to DB!<br />";
echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;*/
?>
