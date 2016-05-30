
<?php
require 'connect.php';
$id = intval($_POST['id']);

$sql="SELECT * FROM streets WHERE cityid = '$id'";  /* получаем все улицы с cityid равным выбранному городу */
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
echo "<option value=".$row['street'].">".$row['street']."</option>";

}



?>