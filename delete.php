<?php
include('header.php');
include('connection.php');
include('navadmin.php');
?>

<!DOCTYPE html>
<head>
<title>Delete Record | Welcome</title>
<link rel="stylesheet" href="style.css">
  <br>
  <div class="type">
    <label>Delete a Record</label>
    <br><br>
  <label>Select Donor OR Patient:</label>
<form class="" action="" method="post">
  <select name="dp">
    <option>Select</option>
    <option>Donor</option>
    <option>Patient</option>
    </select>
    <br>
      <label>Enter ID of Donor OR Patient:</label>
      <br>
    <input type="text" name="id" placeholder="Enter ID" style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
      <input name="sub" type="submit" value="Delete" style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">

    </form>
</div>
<br></br>
<?php
if(isset($_POST['sub']))
{
  $dp=@$_POST['dp'];
  $id=$_POST['id'];
  $count=0;

  $servername = "localhost";
  $username = "username"; // Replace with your MySQL username
  $password = "password"; // Replace with your MySQL password
  $dbname = "yourDB"; // Replace with your database name

 
  if($dp=="Donor"){
      $q=mysqli_prepare($con, "DELETE FROM `donor` WHERE id=?");
      $t=mysqli_prepare($con, "DELETE FROM `location` WHERE id=?");

      mysqli_stmt_bind_param($q, "s", $id);
      mysqli_stmt_bind_param($t, "s", $id);

      $result = mysqli_query($con, "SELECT * FROM donor WHERE id='$id'");
      $count = mysqli_num_rows($result);
  }
  else {
      $q=mysqli_prepare($con, "DELETE FROM `patient` WHERE id=?");

      mysqli_stmt_bind_param($q, "s", $id);

      $result = mysqli_query($con, "SELECT * FROM patient WHERE id='$id'");
      $count = mysqli_num_rows($result);
  }

  if(mysqli_stmt_execute($q) && $count != 0){
      echo "<script>alert('Deleted Selected Data')</script>";
  }
  else{
      echo "<script>alert('Deletion Failed!')</script>";
  }

}
?>

</body>
</html>