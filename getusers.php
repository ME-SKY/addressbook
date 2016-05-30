<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"></meta>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php /* получаем все записи и выносим их в таблицу */
 require 'connect.php';



$sql="SELECT * FROM user"; 
$result = mysqli_query($conn,$sql);
/* вначале идет окно(div id='editing') в которое будет заноситься запись для редактирования из edituser.php 
, потом вставляются записи в таблицу , добавляем обработчик на click для кнопки "редактировать" для каждой записи*/
echo "
<div id='editing' style='position:fixed; top:100px; background: rgba(30,30,30,0.25)'></div> 
<div  style='width:100%; height: 135px;'  ></div>

<table>
<tr>
<th>Фамилия</th>
<th>Имя</th>
<th>Отчество</th>
<th>Город</th>
<th>Улица</th>
<th>Дата рождения</th>
<th>Телефон</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['family'] . "</td>";
	echo "<td>" . $row['firstname'] . "</td>";
	echo "<td>" . $row['fathername'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "<td>" . $row['street'] . "</td>";
    echo "<td>" . $row['birth'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
	echo "<td style='border:0;'><button value = ". $row['id']." onclick=\"edit(this.value)\">редактировать</button></td>";
	
    echo "</tr>";
	
	
}
echo "</table>";

?>
</body>
</html>