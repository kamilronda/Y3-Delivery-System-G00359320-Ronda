<?php
// Check if the user has submitted data into the form

if (isset ($_POST ['submit'])){
	$employee_id = $_POST ['employee_id'];
	$employee_name = $_POST ['employee_name'];
	$department_no = $_POST ['department_no'];
	
	//Check if both fields have been entered
	if ($employee_id && $department_no){
		
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
	$exists= mysqli_query ($conn,"SELECT * FROM EMPLOYEE WHERE employee_id = '$employee_id' ") or die ("Query could not be completed");
	
	// Update the department no field in the employee table
	if (mysqli_num_rows($exists) !=0){
		mysqli_query ($conn,"UPDATE EMPLOYEE SET employee_name = '$employee_name' WHERE employee_id = '$employee_id'") or die ("Employee Name Update could not be applied");
		mysqli_query ($conn,"UPDATE EMPLOYEE SET department_no = '$department_no' WHERE employee_id = '$employee_id'") or die ("Department Id Update could not be applied");
		echo "<script type='text/javascript'>window.location.href = 'deliverySystemEmployee.php';</script>";
			}else echo "That Employee id does not exist.  Please re-enter:";
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
<h1 class="display-4 text-center">Update Employee Department Number</h1>

<form action ="deliverySystemUpdateEmployee.php" method ="POST">
	<div class="form-row">
			<div class="col">
				<input class="form-control" type ="text" id="employee_id" name="employee_id" placeholder="Enter Employee Id">
			</div>
			<div class="col">
				<input class="form-control" type ="text" id="employee_name" name="employee_name" placeholder="Enter New Employee Name:">
			</div>
			<div class="col">
				<input class="form-control" type ="text" id="department_no" name="department_no" placeholder="Enter New Department number:">
			</div>
	</div>
	<div class="text-center mt-3">
       <input type="submit" id="submit" name="submit" class="btn-lg btn-outline-info" value="Update">
    </div>
</form>

</div>
</body>
</html>