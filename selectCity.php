
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
</head>
<body>
<?php

require 'connect.php';
$sql="SELECT * FROM cities"; /* получаем все города для списка <select> */
$result = mysqli_query($conn,$sql);
echo "<option disabled selected>Город</option>";
while($row = mysqli_fetch_array($result)) {
echo "<option value=".$row['id']." >".$row['city']."</option>";
}
?>
</body>
</html>