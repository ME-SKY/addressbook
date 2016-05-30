<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

</head>
<body>
<?php
require 'connect.php';
$id = intval($_GET['id']);
$select_sql = "SELECT * FROM user WHERE id= $id";

$result = mysqli_query($conn,$select_sql);
$row = mysqli_fetch_array($result); /* получаем данные записи для редактирования и создаем окно редактирования */

$city = $row['city'];
//echo "$city";
//echo "$row";
$select_sql2 = "SELECT * FROM cities WHERE city!='$city'";
$resultcities = mysqli_query($conn,$select_sql2);//or trigger_error(mysql_error()." in ". $sql) ; /*  получаем те города которые не выделены */

$select_sql3 = "SELECT * FROM cities WHERE city = '$city' "; /* получаем выбранный город */
$result_sql3 = mysqli_query($conn,$select_sql3);// or trigger_error(mysql_error()." in ". $sql) ;



/* if ($result === false) {
    echo mysqli_error();
} */ /* получаем выбранный город */
$rowcity = mysqli_fetch_array($result_sql3);   /* получаем выбранный город */
$cityres = $rowcity['id']; /* получаем id выбранного города */
$street = $row['street'];
$select_sql4 = "SELECT * FROM streets WHERE (cityid = $cityres) AND (street != $street)";  /* получаем все улицы с cityid равным выбранному городу */
$resultstreets = mysqli_query($conn,$select_sql4) ;



echo "<h4 class='text-center'>Редактирование записи<h4><form  class='form-horizontal' action='my.js' method='post' name='forma'>
<div class='control-group'>
<input type='hidden' name='id' id='upid' value=".$row['id'].">

<input type='text' id='upfamily' value=".$row['family']." >

<input type='text' id='upfirstname' value=".$row['firstname']." >

<input type='text' id='upfathername' value=".$row['fathername']." >
<select id='upcity' onchange='selectStreetEdit()'>";
echo "<option disabled >Город</option>";
echo "<option value=".$cityres." selected >".$row['city']."</option>";
while($cities = mysqli_fetch_array($resultcities)) {
echo "<option value=".$cities['id']." >".$cities['city']."</option>"; }
echo "</select>
<select id='upstreet' >";
echo "<option disabled> Улица</option>";
echo "<option selected> ".$row['street']."</option>";
while($streets = mysqli_fetch_array($resultstreets)) {
echo "<option value=".$streets['street']." >".$streets['street']."</option>"; }
echo"</select>

<input type='text' id='upbirth' value=".$row['birth']." >

<input type='text' id='upphone' value=".$row['phone'].">
</div>
<br/>
<div class='controls'>
	<input style='float:right;' type='button' id='upregister' onclick='updateuser()'value='Сохранить'></input>
	<input style='float:left;' type='button' id='delregister' onclick='deleteuser()'value='Удалить'></input>
</div>
</form>";


?>
</body>
</html>
