<?php
require 'connect.php';
$id = intval($_POST['idUpdate']);
$family = $_POST['familyUpdate'];
$firstname = $_POST['firstnameUpdate'];
$fathername = $_POST['fathernameUpdate'];
$city = $_POST['cityUpdate'];
$street = $_POST['streetUpdate'];
$birth = $_POST['birthUpdate'];
$phone = $_POST['phoneUpdate'];

$update_sql = "UPDATE user SET family='$family', firstname='$firstname', fathername='$fathername', city='$city', street='$street', birth='$birth', phone='$phone' WHERE id='$id'"; /* обновляем запись */
mysqli_query($conn,$update_sql) or die('Could not connect: ' . mysqli_error($conn));

?>
	