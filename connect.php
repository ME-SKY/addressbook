<?php
/* установка соединения */

$conn = new mysqli('localhost','root','', 'test');
/* проверка соединения */
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8"); //установка кодировки



?>
