<?php
$db = 'c24.blog';
$user = 'c24.blog';
$password = 'check24.de';
$conn = new mysqli('p:localhost', $user, $password, $db);

if (!$conn->connect_errno) {
    $conn->set_charset('utf8');
    if ($conn->select_db($db)) {
        $mysqlVersion = $conn->get_server_info();
        echo "<p class='good'>Success, <b>MySql server</b> version $mysqlVersion</p>";
    } else echo "<p class='bad'>Unable to select database <b><?=$db?></b></p>";
} else echo "<p class='bad'>Unable to connect to <b>MySql server</b></p>";

require_once __DIR__.'/../bootstrap.php';