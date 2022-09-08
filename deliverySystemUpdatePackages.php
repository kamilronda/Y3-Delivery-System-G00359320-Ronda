<?php
// Check if the user has submitted data into the form

if (isset ($_POST ['submit'])){
    $package_id = $_POST ['package_id'];
    
    $tracking_no = $_POST ['tracking_no'];
    $employee_id = $_POST ['employee_id'];
    $delivery_date = $_POST ['delivery_date'];
	
	//Check if both fields have been entered
	if ($package_id && $tracking_no && $employee_id && $delivery_date){
		
			//Connect to the server and the empdept2 database
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "deliverySystem";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
								}
	
	// Check if that employee id exists
	$exists= mysqli_query ($conn,"SELECT * FROM PACKAGES WHERE package_id = '$package_id' ") or die ("Query could not be completed");
	
	// Update the department no field in the employee table
	if (mysqli_num_rows($exists) !=0){
        mysqli_query ($conn,"UPDATE PACKAGES SET tracking_no = '$tracking_no' WHERE package_id = '$package_id'") or die ("Customer Name Update could not be applied");
        mysqli_query ($conn,"UPDATE PACKAGES SET employee_id = '$employee_id' WHERE package_id = '$package_id'") or die ("Customer Address Update could not be applied");
        mysqli_query ($conn,"UPDATE PACKAGES SET delivery_date = '$delivery_date' WHERE package_id = '$package_id'") or die ("Customer Phone No Update could not be applied");
		echo "<script type='text/javascript'>window.location.href = 'deliverySystemPackages.php';</script>";
			}else echo "That customer id does not exist.  Please re-enter:";
					}else echo "You must enter values for both fields.  Please re-enter";
		
		
		
		
	}
	
?>

<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Delivery System Database</title>
</head>

<body>
<div class="link-custom text-center mt-5">
        <a href="deliverySystemHome.php">
            <img 
            src="images/delivery-van.svg" 
            alt="triangle with all three sides equal"
            height="87"
            width="100" />

            <h1 class="display-1">Delivery System Database</h1>
        </a>
</div>

<div class="p-4">
<h1 class="display-4 text-center">Update Package Details</h1>

<form action ="deliverySystemUpdatePackages.php" method ="POST">
	<div class="form-row">
			<div class="col">
				<input class="form-control" type ="text" id="package_id" name="package_id" placeholder="Enter Package Id">
			</div>
            <div class="col">
				<input class="form-control" type ="text" id="tracking_no" name="tracking_no" placeholder="Enter New Tracking No:">
			</div>
			<div class="col">
				<input class="form-control" type ="text" id="employee_id" name="employee_id" placeholder="Enter New Employee Id:">
			</div>
            <div class="col">
				<input class="form-control" type ="text" id="delivery_date" name="delivery_date" placeholder="Enter New Delivery Date:">
			</div>
	</div>
	<div class="text-center mt-3">
       <input type="submit" id="submit" name="submit" class="btn-lg btn-outline-info" value="Update">
    </div>
</form>

</div>
</body>
</html>