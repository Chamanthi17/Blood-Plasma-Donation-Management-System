<?php
session_start();
include('header.php');
include('connection.php');
if(isset($_SESSION['loggedin'])==true){
	include('navadmin.php');
}
else {
	include('navuser.php');
}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="icon" href="icon/reg.png" />
	
	<link rel="stylesheet" href="style.css">
	<style type="text/css">

        label { display: inline-block; width: 130px; text-align: center; }

		ul{
			margin:0px;
			padding:0px;
			list-style: none;
		}
		ul li{
			float:left;
			width:220px;
			height:40px;
			background-color:#27ae60;
			opacity:.8;
			line-height: 40px;

			font-size:20px;
			margin-right:2px;
		}

		ul li a{
			text-decoration: none;
			color:black;
			text-transform: uppercase;
			font-weight: bold;
			display:block;
		}
		ul li a:hover{
			background-color:red;
		}
		ul li ul li{
			display:none;
		}
		ul li:hover ul li{
			display:block;
		}

		.reg{
			margin-left: 500px;;
		}


	</style>
</head>
<body>


	</ul>



<h1 align="center">Donor Registration</h1>
    <br />

	<form style="text-align:justify;font-size:18px;color:#FF5733" method="post"> 
<div class="reg">
	<label for="first" >Full Name:</label>
	<input id="first" type="text" name="name" placeholder="Full Name"  autofocus required />

	<br /><br />

	<label>Blood Group:</label>

	<select name="bgroup" style="border-radius: 10px">
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

	<br /><br />

	<label for="Gender">Gender:</label>
	<input type="radio" name="gender" value="Male"/>Male
	<input type="radio" name="gender" value="Female"/>Female
	<input type="radio" name="gender" value="Others"/>Others

	<br /><br />

	<label for="age">Age:</label>
	<input id="last" type="text" placeholder="" name="age" />
	<br /><br />
	<label for="weight">Weight:</label>
	<input id="weight" type="text" name="weight" placeholder="" />
	<br /> <br />

	<label>Last Donated:</label>
			<input id="date" name="date" type="date" value="2019-01-01">
		 <br /><br />



	<label for="phone">Phone Number:</label>
	<input id="phone" type="tel" name="number"placeholder="+8801********" required />

	<br /><br />

	<label for="address">Address:</label>
	<textarea name="address" id="address" placeholder="Please include your Division & City" cols="35" rows="2"></textarea>
	<br /><br />

</div>


<br>
<?php include 'map.php'; ?>
	</form>
	<br />

    <?php
if(isset($_POST['sub'])){
    $name=$_POST['name'];
    $bgroup=$_POST['bgroup'];
    $gender=@$_POST['gender'];
    $age=$_POST['age'];
    $weight=$_POST['weight'];
    $date=$_POST['date'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $id=uniqid();

   
    // Prepare and bind
    $stmt = mysqli_prepare($con, "INSERT INTO donor (id, name, bgroup, gender, age, weight, date, number, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssisiss", $id, $name, $bgroup, $gender, $age, $weight, $date, $number, $address);

    if(mysqli_stmt_execute($stmt)){
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];

        // Prepare and bind for location insertion
        $stmt_location = mysqli_prepare($con, "INSERT INTO location (id, latitude, longitude) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt_location, "sdd", $id, $latitude, $longitude);

        if(mysqli_stmt_execute($stmt_location)){
            echo "<script>alert('Registration Successful!')</script>";
        } else {
            echo "<script>alert('Location insertion failed!')</script>";
        }
        mysqli_stmt_close($stmt_location);
    } else {
        echo "<script>alert('Registration Failed!')</script>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>


</body>
</html>