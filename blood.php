<?php
session_start();
include('header.php');
include('connection.php');

if (isset($_SESSION['loggedin']) == true) {
  include('navadmin.php');
} else {
  include('navuser.php');
}
?>

<!DOCTYPE html>
<head>
<title>Donor List | Welcome</title>

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

<br>
<div class="blood">
  <label>Search The Donors</label>
  <br><br>
  <label>Blood Group: </label>
  <form class="" action="" method="post">
    <select name="bgroup">
      <option>Select</option>
      <option>A+</option>
      <option>A-</option>
      <option>B+</option>
      <option>B-</option>
      <option>AB+</option>
      <option>AB-</option>
      <option>O+</option>
      <option>O-</option>
    </select>
    <br>


  <?php include 'map.php'; ?>
    </form>
</div>
<br></br>

<?php
if (isset($_POST['sub'])) {
  $bgroup = $_POST['bgroup'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  // Connect to MySQL using mysqli
  
  ?>
  <h1>Donor List</h1>
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

    $sql = "SELECT id, ABS($latitude - latitude) AS distance FROM location ORDER BY distance LIMIT 2";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];

        $sql2 = "SELECT * FROM donor WHERE bgroup = '$bgroup' AND id = '$id'";
        $result2 = mysqli_query($con, $sql2);
        $count = 0;

        if (mysqli_num_rows($result2) > 0) {
          while ($row2 = mysqli_fetch_assoc($result2)) {
            $d = $row2['date'];
            $current = date("Y/m/d");
            $month = ((strtotime($current) - strtotime($d)) / 60 / 60 / 24) / 30;

            if ($month >= 3.0) {
              ?>
             <tr>
                <td><?= $row2['id']; ?></td>
                <td><?= $row2['name']; ?></td>
                <td><?= $row2['bgroup']; ?></td>
                <td><?= $row2['gender']; ?></td>
                <td><?= $row2['age']; ?></td>
                <td><?= $row2['weight']; ?></td>
                <td><?= $row2['date']; ?></td>
                <td><?= $row2['number']; ?></td>
                <td><?=$row2['address']; ?></td>

	  <?php

	    }
	    ?>
	
		<?php
}
	}
}
		 ?>
	</table>
	<?php


}
}
 ?>

</body>
</html>