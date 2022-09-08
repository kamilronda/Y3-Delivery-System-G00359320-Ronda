<!DOCTYPE html>
<html lang="en">

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
<h1 class="display-4 text-center">Insert Employee</h1>

    <form action="deliverySystemInsertEmployee.php" method="post">

    <div class="form-row">
        <div class="col">
            <input for="employee_id" type="text" class="form-control" name="employee_id" id="employee_id" placeholder="Enter Employee Id">
        </div>
        <div class="col">
            <input for="employee_name" type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter Employee Name">
        </div>
        <div class="col">
            <input for="department_no" type="text" class="form-control" name="department_no" id="department_no" placeholder="Enter Department No">
        </div>
    </div>
    <div class="text-center mt-3">
       <input type="submit" class="btn-lg btn-outline-success" value="Insert">
    </div>
    </form>

</div>
</body>

</html>