<?php
$submit=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
$server ="localhost";
$username="root";
$password="";
$db="bank";
$errormessage="";
$submit=false;
$con=mysqli_connect($server,$username,$password,$db);
$Salutation="";
$username="";
$name="";
$customer_city="";
$email="";
$IFSC_code="";
$account_type="";
$Contact_Number="";
$gender="";
$DOB="";
$Balance="";
$Branch_Name="";
$Account_Number="";


if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// echo "Success connectiong to the db";
$Salutation=$_POST['Salutation'];
$username=$_POST['customer_name'];
$name=$Salutation." ".$username;
$customer_city=$_POST['customer_city'];
$email=$_POST['email'];
$IFSC_code=$_POST['IFSC_code'];
$account_type=$_POST['account_type'];
$Contact_Number=$_POST['Contact_Number'];
$gender=$_POST['gender'];
$DOB=$_POST['DOB'];
$Balance=$_POST['Balance'];
$Branch_Name=$_POST['Branch_Name'];
$Account_Number=$_POST['Account_Number'];

$sql="INSERT INTO `account`(`salutation`, `customer name`, `email`, `IFSC code`, `account type`, `contact number`, 
`customer city`, `gender`, `dob`, `balance`, `branch name`, `account number`) VALUES 
('$Salutation','$username','$email','$IFSC_code','$account_type','$Contact_Number','$customer_city','$gender',
'$DOB','$Balance','$Branch_Name','$Account_Number')";
if($con->query($sql)==true){
    // echo "Successfully Inserted";
    $submit=true;
}
else{
    //echo "Error: $sql <br> $con->error";
    $errormessage="$con->error";
}
$con->close();
//html content

}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="IMAGE/byte.png" type="image/icon type">
    <title>Home</title>
</head>

<body>
    <header>



        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand font-weight-bold" href="index.php">
                <img src="IMAGE/byte.png" width="40" height="30" class="d-inline-block align-top" alt="">
                BYTE Bank</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="index.php">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="viewall.php">View All Customers<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="transaction2.php">Transfer Money<span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <div class="local">
        <br>
        <div class="container">

            <h2>About Us</h2>
            <p>
                A bank is a financial institution and a financial intermediary that accepts deposits and channels those
                deposits into lending activities, either directly by loaning or indirectly through capital markets.

                A bank may be defined as an institution that accepts deposits, makes loans, pays checks and provides
                financial services. A bank is a financial intermediary for the safeguarding, transferring, exchanging,
                or lending of money. A primary role of banks is connecting those with funds, such as investors and
                depositors, to those seeking funds, such as individuals or businesses needing loans. A bank is a
                connection between customers that have capital deficits and customers with capital surpluses.
            </p>
        </div>


       

<!--Number of Users -->




<div class="container">
            <h2 class="d-flex justify-content-center">Number Of Total Users:
                <?php
    $server ="localhost";
    $username="root";
    $password="";
    $db="bank";
    $numberofrows="";
    $errormessage="";
    $result="";
    $con=mysqli_connect($server,$username,$password,$db);
    
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    
    $sql1="Select * from `account`";
    $result=mysqli_query($con,$sql1);
    $numberofrows=mysqli_num_rows($result);

    echo $numberofrows;


 $con->close();
    ?>

    <!-- End of Number of Users -->





            </h2>

            <br>
            <div class="d-flex justify-content-center">
                <a href="viewall.php">
                    <button type="button" class="btn btn-primary">View all customers</button></a>
            </div>

            <br>
            <br>





<!-- Form to get credentials -->
            <form class="container" action="index.php" method="POST" autocomplete="off">
                <h2>
                    New User Entry
                </h2>

                <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
        if($submit==true){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Insertion Successful</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        }
        else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Insertion Unsuccessful</strong> Check Your Inputs<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
        }
    }
        ?>


                <br>

                <div class="container ">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="Salutation">Salutation</label>
                            <select name="Salutation" id="Salutation" required>
                                <option value="" selected="true" disabled="disabled">please select one of the option
                                </option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Mrs.">Master</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="customer_name">Name</label>
                            <input type="text" name="customer_name" class="customer_name" placeholder="Enter name Here"
                                required>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="customer_city">Customer City</label>
                            <input type="text" name="customer_city" class="customer_city"
                                placeholder="Enter customer city Here" required>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="email">E-mail Id</label>
                            <input type="email" pattern="+@+" name="email" class="email"
                                placeholder="Enter your Mail id" required>
                        </div>



                        <div class="col-md-4 mb-3">
                            <label for="IFSC_code">IFSC code</label>
                            <input type="text" name="IFSC_code" id="IFSC_code" placeholder="IFSC code" required>
                        </div>



                        <div class="col-md-4 mb-3">
                            <label for="account_type">Account Type</label>
                            <select name="account_type" id="account_type" required>
                                <option value="--" selected="true" disabled="disabled">please select one of the option
                                </option>
                                <option value="Saving">Saving</option>
                                <option value="Current">Current</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="Contact_Number">Customer Number</label>
                            <input type="text" name="Contact_Number" id="Contact_Number"
                                placeholder="Enter your Contact Number" maxlength="25" required>

                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" required>
                                <option value="-" selected="true" disabled="disabled">please select one of the option
                                </option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="DOB">DOB</label>
                            <input type="date" name="DOB" id="DOB" max="2003-06-01" min="1915-06-01" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="Balance">Amount to be Credited</label>
                            <input type="number" name="Balance" id="Balance" placeholder="Money to be Credited with"
                                min="2000.00" max="200000.00" size="25" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Branch_Name">Branch Name:</label>
                            <input type="text" name="Branch_Name" id="Branch_Name" placeholder="Branch Name" required>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="Account_Number">Account Number</label>
                            <input type="number" name="Account_Number" id="Account_Number"
                                placeholder="Enter prefered Account Number" min="10" minlength="10" pattern="[0-9]{12}"
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="Submit the details">
                    </div>

                </div>
            </form>
</div>
<!-- End of Form -->








            <br>

            <footer class="text-center mt-5 py-2">

                <a href="#"><img src="IMAGE/byte.png" alt="byte logo" width="100px" height="80px"></a>
                <span class="svg">
                    <a href="mailto:m.bluth@example.com">
                        <svg class="mb-3" width="25px" height="25px" role="img" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Gmail icon</title>
                            <path
                                d="M24 4.5v15c0 .85-.65 1.5-1.5 1.5H21V7.387l-9 6.463-9-6.463V21H1.5C.649 21 0 20.35 0 19.5v-15c0-.425.162-.8.431-1.068C.7 3.16 1.076 3 1.5 3H2l10 7.25L22 3h.5c.425 0 .8.162 1.069.432.27.268.431.643.431 1.068z" />
                        </svg>
                    </a>
                </span>

                <p>&copy 2021. Made by <b>ADITYA</b> <br>Byte Banking System</p>

            </footer>




            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
                integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                crossorigin="anonymous"></script>

</body>
<?php
if($submit==true){
$Salutation="";
$username="";
$name="";
$customer_city="";
$email="";
$IFSC_code="";
$account_type="";
$Contact_Number="";
$gender="";
$DOB="";
$Balance="";
$Branch_Name="";
$Account_Number="";
}
?>

<style>
    body {
        /* background:linear-gradient(-45deg,#FE7752,#E73C7E,#23A6D5,#23D5AB); */
        background: linear-gradient(-45deg, #f5f7fa, #c3cfe2);
    }

    .registratio_form {
        padding: 50px 0;



        background-color: #fff;
        max-width: 70%;
        margin: auto;
        padding: 50px 60px;
        border-radius: 30px;
        box-shadow: 0px 2px 10px rgb(0 0 0 / 8%);

    }
</style>




</html>