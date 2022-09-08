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

$package_id = $_POST['package_id'];

$tracking_no = $_POST['tracking_no'];

$employee_id = $_POST['employee_id'];

$delivery_date = $_POST['delivery_date'];

 

// attempt insert query execution

mysqli_query($conn, "INSERT INTO PACKAGES (package_id, tracking_no, employee_id, delivery_date) VALUES ('$package_id', '$tracking_no', '$employee_id', '$delivery_date')");

if(mysqli_affected_rows($conn)>0){

    echo "<script type='text/javascript'>window.location.href = 'deliverySystemPackages.php';</script>";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}


// close connection

// mysqli_close($conn);

?>