<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deliverySystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Select
$result=mysqli_query($conn, "SELECT * FROM EMPLOYEE");
?>

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
<h1 class="display-4 text-center">Employee Table</h1>
<table class="table">
<thead class="thead-dark">
	<tr>
		<th scope="col">Employee Id</th>
		<th scope="col">Employee Name</th>
		<th scope="col">Department Number</th>
		<th scope="col"> </th>
	<tr>
</thead>

<?php
$i=1;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$employee_id = $row['employee_id'];
	$employee_name = $row['employee_name'];
	$department_no = $row['department_no'];
?>

<tr>
	<td><?php echo $employee_id;?></td>
	<td><?php echo $employee_name;?></td>
	<td><?php echo $department_no;?></td>
	<td>
		<a href ="deliverySystemEmployee.php?delete=<?php echo $employee_id;?>"onclick="return confirm('Are you sure?');">Delete</a>
	</td>
</tr>



    <?php
    //Delete
	$i++;
	}
	if(isset($_GET['delete'])){
		$delete_id= $_GET['delete'];
		
		mysqli_query($conn, "DELETE FROM EMPLOYEE WHERE employee_id = '$delete_id'");
		
		header("location: deliverySystemEmployee.php");
	}
	?>
</div>
</table>
<div class="text-center mt-5">
	<button class="btn-lg btn-outline-success mt-3 mr-5" onclick="window.location.href = 'deliverySystemInsertEmployeeForm.php';">Insert</button>
	<button class="btn-lg btn-outline-info" onclick="window.location.href = 'deliverySystemUpdateEmployee.php';">Update</button>
</div>

</body>