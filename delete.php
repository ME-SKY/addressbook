
<?php
require 'connect.php';
$id = intval($_POST['idUpdate']); /* получили id элемента, который нужно удалить */

$update_sql = "DELETE FROM user  WHERE id='$id'"; 
mysqli_query($conn,$update_sql) or die('Could not connect: ' . mysqli_error($conn)); 
?>

