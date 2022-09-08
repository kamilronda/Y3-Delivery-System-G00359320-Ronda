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
    $result=mysqli_query($conn, "SELECT * FROM CUSTOMER");
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
    <h1 class="display-4 text-center">Customer Table</h1>
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Customer Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Customer Phone No</th>
            <th scope="col">Package Id</th>
            <th scope="col"> </th>
        <tr>
    </thead>

    <?php
    $i=1;

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $customer_id = $row['customer_id'];
        $customer_name = $row['customer_name'];
        $customer_address = $row['customer_address'];
        $customer_phone_no = $row['customer_phone_no'];
        $package_id = $row['package_id'];
    ?>

    <tr>
        <td><?php echo $customer_id;?></td>
        <td><?php echo $customer_name;?></td>
        <td><?php echo $customer_address;?></td>
        <td><?php echo $customer_phone_no;?></td>
        <td><?php echo $package_id?></td>
        <td>
            <a href ="deliverySystemCustomer.php?delete=<?php echo $customer_id;?>"onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>



        <?php
        //Delete
        $i++;
        }
        if(isset($_GET['delete'])){
            $delete_id= $_GET['delete'];
            
            mysqli_query($conn, "DELETE FROM CUSTOMER WHERE customer_id = '$delete_id'");
            
            header("location: deliverySystemCustomer.php");
        }
        ?>
    </div>
    </table>

    <div class="text-center mt-5">
        <button class="btn-lg btn-outline-success mt-3 mr-5" onclick="window.location.href = 'deliverySystemInsertCustomerForm.php';">Insert</button>
        <button class="btn-lg btn-outline-info" onclick="window.location.href = 'deliverySystemUpdateCustomer.php';">Update</button>
    </div>

</body>