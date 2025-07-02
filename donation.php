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
	margin: 0px;
text-align: center;
font-size: 18px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
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
h1{
  font-size: 20px;
}
</style>
</head>
<body>
	<br>
<h1 align="center">Donor List</h1>

<table id="customers" style="margin: 0px auto;">
  <tr>
		<th>ID</th>
    <th>Name</th>
    <th>Blood Group</th>
    <th>Gender</th>
		<th>Phone Number</th>
		<th>Address</th>
  </tr>
	<?php
$q = mysqli_query($con, "SELECT * FROM donor");
while ($p = mysqli_fetch_assoc($q)) {
	?>
  <tr>

    <?php
        $d = $p['date'];
        $current = date("Y/m/d");
        $month = ((strtotime($current) - strtotime($d))/60/60/24)/30;
    if($month>=3.0) {
      ?>
      <td><?= $p['id']; ?></td>
      <td><?= $p['name']; ?></td>
      <td><?= $p['bgroup']; ?></td>
      <td><?= $p['gender']; ?></td>
      <td><?= $p['number']; ?></td>
      <td><?= $p['address']; ?></td>
    <?php
    }
    ?>

  </tr>

	<?php
}
	 ?>
</table>

<br>
<h1 align="center">Patient List</h1>

<table id="customers" style="margin: 0px auto;">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Blood Group</th>
  <th>Gender</th>
  <th>Phone Number</th>
  <th>Address</th>
</tr>
<?php
$q = mysqli_query($con, "SELECT * FROM patient");
while ($p = mysqli_fetch_assoc($q)) {
?>
<tr>
  <td><?= $p['id']; ?></td>
  <td><?= $p['name']; ?></td>
  <td><?= $p['bgroup']; ?></td>
  <td><?= $p['gender']; ?></td>
  <td><?= $p['number']; ?></td>
  <td><?= $p['address']; ?></td>
</tr>

<?php
}
 ?>
</table>

<br></br>

<div class="type">
  <label style="color: #032B41"><u>Proceed a Donation</u></label>
  <br><br>
<form class="" action="" method="post">
    <label style="font-size:20px">Enter ID of Donor:</label>
  <input type="text" name="did" placeholder="ID of Donor" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
  &nbsp;<label style="font-size:20px">  Enter ID of Patient:</label>
  <input type="text" name="pid" placeholder="ID of Patient" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
<br>
    <input name="sub" type="submit" value="Proceed" style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">
<br></br>
  </form>
</div>

<?php

if(isset($_POST['sub']))
{
  $did=$_POST['did'];
  $pid=$_POST['pid'];
  $count=mysqli_num_rows(mysqli_query($con, "SELECT * FROM donor WHERE id='$did'"));

  $qd = mysqli_query($con, "SELECT date FROM donor WHERE id='$did'");
  $d = mysqli_fetch_assoc($qd)['date'];
  $current = date("Y/m/d");
  $month = ((strtotime($current) - strtotime($d))/60/60/24)/30;
  
  if($month<3.0)
  {
    echo "<script>alert('Donor not Available!')</script>";
  }
  else 
  {
    if(!$count==0)
    {
      $qd=mysqli_query($con, "SELECT * FROM donor WHERE id='$did'");
      $pd=mysqli_fetch_assoc($qd);
      $dname=$pd['name'];
      $bdgroup=$pd['bgroup'];

      $qp=mysqli_query($con, "SELECT * FROM patient WHERE id='$pid'");
      $pp=mysqli_fetch_assoc($qp);
      $pname=$pp['name'];
      $bgroup=$pp['bgroup'];
      $donationid=uniqid();
      $date=$current;
      
      if($bdgroup==$bgroup)
      {
        $t=mysqli_prepare($con, "INSERT INTO donation(donationid,dname,pname,bgroup,date) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($t, "sssss", $donationid, $dname, $pname, $bgroup, $date);
        
        $u=mysqli_prepare($con, "UPDATE `donor` SET `date`=? WHERE id=?");
        mysqli_stmt_bind_param($u, "ss", $date, $did);

        if(mysqli_stmt_execute($t) && mysqli_stmt_execute($u))
        {
          echo "<script>alert('Donation Successful')</script>";
        }
        else
        {
          echo "<script>alert('Donation Failed!')</script>";
        }
      }
      else 
      {
        echo "<script>alert('Blood Group not matched!')</script>";
      }
    } 
    else
    {
      echo "<script>alert('Wrong ID!')</script>";
    }
  }
}
 ?>
</body>
</html>
