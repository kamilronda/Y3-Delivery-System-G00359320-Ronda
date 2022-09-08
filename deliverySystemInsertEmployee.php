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

// Escape user inputs for security

$employee_id = $_POST['employee_id'];

$employee_name = $_POST['employee_name'];

$department_no = $_POST['department_no'];

 

// attempt insert query execution

mysqli_query($conn, "INSERT INTO EMPLOYEE (employee_id, employee_name, department_no) VALUES ('$employee_id', '$employee_name', '$department_no')");

if(mysqli_affected_rows($conn)>0){

    echo "<script type='text/javascript'>window.location.href = 'deliverySystemEmployee.php';</script>";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}


// close connection

// mysqli_close($conn);

?>