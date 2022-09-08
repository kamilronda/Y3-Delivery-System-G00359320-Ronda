<?php
// Check if the user has submitted data into the form

if (isset ($_POST ['submit'])){
    $customer_id = $_POST ['customer_id'];
    
    $customer_name = $_POST ['customer_name'];
    $customer_address = $_POST ['customer_address'];
    $customer_phone_no = $_POST ['customer_phone_no'];
    $package_id = $_POST ['package_id'];
	
	//Check if both fields have been entered
	if ($customer_id && $customer_address && $customer_name && $customer_phone_no && $package_id){
		
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
	$exists= mysqli_query ($conn,"SELECT * FROM CUSTOMER WHERE customer_id = '$customer_id' ") or die ("Query could not be completed");
	
	// Update the department no field in the employee table
	if (mysqli_num_rows($exists) !=0){
        mysqli_query ($conn,"UPDATE CUSTOMER SET customer_name = '$customer_name' WHERE customer_id = '$customer_id'") or die ("Customer Name Update could not be applied");
        mysqli_query ($conn,"UPDATE CUSTOMER SET customer_address = '$customer_address' WHERE customer_id = '$customer_id'") or die ("Customer Address Update could not be applied");
        mysqli_query ($conn,"UPDATE CUSTOMER SET customer_phone_no = '$customer_phone_no' WHERE customer_id = '$customer_id'") or die ("Customer Phone No Update could not be applied");
        mysqli_query ($conn,"UPDATE CUSTOMER SET package_id = '$package_id' WHERE customer_id = '$customer_id'") or die ("Package Id Update could not be applied");
		echo "<script type='text/javascript'>window.location.href = 'deliverySystemCustomer.php';</script>";
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
<h1 class="display-4 text-center">Update Customer Details</h1>

<form action ="deliverySystemUpdateCustomer.php" method ="POST">
	<div class="form-row">
			<div class="col">
				<input class="form-control" type ="text" id="customer_id" name="customer_id" placeholder="Enter Customer Id">
			</div>
            <div class="col">
				<input class="form-control" type ="text" id="customer_name" name="customer_name" placeholder="Enter New Name:">
			</div>
			<div class="col">
				<input class="form-control" type ="text" id="customer_address" name="customer_address" placeholder="Enter New Address:">
			</div>
            <div class="col">
				<input class="form-control" type ="text" id="customer_phone_no" name="customer_phone_no" placeholder="Enter New Phone No:">
			</div>
            <div class="col">
				<input class="form-control" type ="text" id="package_id" name="package_id" placeholder="Enter New Package Id:">
			</div>
	</div>
	<div class="text-center mt-3">
       <input type="submit" id="submit" name="submit" class="btn-lg btn-outline-info" value="Update">
    </div>
</form>

</div>
</body>
</html>