<?php
include('header.php');
include('navadmin.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
	margin: 5px;
text-align: center;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 18px;

}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #FF5733;
  color: white;
}
</style>
</head>
<body>
	<br>
<h1 align="center">Patient List</h1>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Gender</th>
		<th>Age</th>
		<th>Weight</th>
		<th>Phone Number</th>
		<th>Address</th>

  </tr>
	<?php
$sql = "SELECT * FROM patient";
$result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['bgroup']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['age']; ?></td>
            <td><?= $row['weight']; ?></td>
            <td><?= $row['number']; ?></td>
            <td><?= $row['address']; ?></td>
        </tr>
        <?php
    }
?>
</table>

</body>
</html>