<?php
require 'connect.php';
/* Принимаем значения */
$family = $_POST['family1'];
$firstname = $_POST['firstname1'];
$fathername = $_POST['fathername1'];
$city = $_POST['city1'];
$street = $_POST['street1'];
$birth = $_POST['birth1'];
$phone = $_POST['phone1'];

$result= 0;
$data = 0;

if(($data)==0){
$sql = "INSERT INTO user (family, firstname, fathername, city, street, birth, phone) VALUES ('$family','$firstname','$fathername','$city','$street','$birth','$phone')"; // Строка запроса к бд на добавление записи

if ($conn->query($sql) === TRUE) {
    echo "Новая запись добавлена!"; /* если удачно, не забываем оповестить пользователя */
} else {
     echo "Error: " . $sql . "<br>" . $conn->error; 
}
}
$conn->close();
?>