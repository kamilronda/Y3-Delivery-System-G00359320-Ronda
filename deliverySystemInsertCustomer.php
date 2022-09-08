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

$customer_id = $_POST['customer_id'];

$customer_name = $_POST['customer_name'];

$customer_address = $_POST['customer_address'];

$customer_phone_no = $_POST['customer_phone_no'];

$package_id = $_POST['package_id'];

 

// attempt insert query execution

mysqli_query($conn, "INSERT INTO CUSTOMER (customer_id, customer_name, customer_address, customer_phone_no, package_id) VALUES ('$customer_id', '$customer_name', '$customer_address', '$customer_phone_no', '$package_id')");

if(mysqli_affected_rows($conn)>0){

    echo "<script type='text/javascript'>window.location.href = 'deliverySystemCustomer.php';</script>";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}


// close connection

// mysqli_close($conn);

?>