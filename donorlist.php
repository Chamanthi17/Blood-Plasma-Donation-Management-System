<?php
include('header.php');
include('navadmin.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
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
<h1 align="center">Donor List</h1>
<br>
<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Gender</th>
		<th>Age</th>
		<th>Weight</th>
		<th>Last Donated</th>
		<th>Phone Number</th>
		<th>Address</th>

  
  </tr>
  <?php


$sql = "SELECT * FROM donor";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $d = $row['date'];
        $current = date("Y/m/d");
        $month = ((strtotime($current) - strtotime($d)) / 60 / 60 / 24) / 30;
        ?>
        <tr>
            <?php if ($month < 3.0) { ?>
                <td><font color="red"><?= $row['id']; ?></font></td>
                <td><font color="red"><?= $row['name']; ?></font></td>
                <td><font color="red"><?= $row['bgroup']; ?></font></td>
                <td><font color="red"><?= $row['gender']; ?></font></td>
                <td><font color="red"><?= $row['age']; ?></font></td>
                <td><font color="red"><?= $row['weight']; ?></font></td>
                <td><font color="red"><?= $row['date']; ?></font></td>
                <td><font color="red"><?= $row['number']; ?></font></td>
                <td><font color="red"><?= $row['address']; ?></font></td>
            <?php } else { ?>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['bgroup']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['age']; ?></td>
                <td><?= $row['weight']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['number']; ?></td>
                <td><?= $row['address']; ?></td>
            <?php } ?>
        </tr>
        <?php
    }
} else {
    echo "0 results";
}
?>


</table>
<br>
  <p align="center" padding="40px">Note: [Red colored are not eligible for Donation] </p>
</br>
</body>
</html>