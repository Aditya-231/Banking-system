<?php
$server ="localhost";
$username="root";
$password="";
$db="bank";
$numberofrows="";
$errormessage="";
$submit=false;
$result="";
$con=mysqli_connect($server,$username,$password,$db);
$name=$_GET['name'];

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
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
    <title>View One</title>
</head>
<body>
    


<header>
    


<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand font-weight-bold" href="index.php">
      <img src="IMAGE/byte.png" width="40" height="30" class="d-inline-block align-top" alt="">
  BYTE Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link font-weight-bold" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link font-weight-bold" href="viewall.php">View All Customers<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="transaction2.php">Transfer Money<span class="sr-only">(current)</span></a>
                    </li>
    </ul>
  </div>
</nav>
</header>







<?php
           $sql="SELECT * FROM `account` WHERE `account number` =$name";
           $result=mysqli_query($con,$sql);
           $numberofrows=mysqli_num_rows($result);
        //    $numberofrows=mysqli_num_rows($result);


           
           
            if($numberofrows>0){
                
                $row=mysqli_fetch_assoc($result);
                 $row['account number'];
                 $row['customer name'];
                 $row['email'];
                 $row['IFSC code'];
                 $row['account type'];
                 $row['contact number'];
                 $row['customer city'];
                 $row['gender'];
                 $row['dob'];
                 $row['balance'];
                 $row['branch name'];
                // $username=$_POST['customer_name'];
                // $name=$Salutation." ".$username;
                // $customer_city=$_POST['customer_city'];
                // $email=$_POST['email'];
                // $IFSC_code=$_POST['IFSC_code'];
                // $account_type=$_POST['account_type'];
                // $Contact_Number=$_POST['Contact_Number'];
                // $gender=$_POST['gender'];
                // $DOB=$_POST['DOB'];
                // $Balance=$_POST['Balance'];
                // $Branch_Name=$_POST['Branch_Name'];
                // $Account_Number=$_POST['Account_Number'];
            }
            
?>         


<div class="container">
    <br>
<h2>Account Details</h2>
<br>


    <div class="row" >
  <div class=" h-75 col border bg-dark text-white text-center ">Account Number</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['account number'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Name</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['customer name'];?> </div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">E-mail</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['email'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">IFSC code</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['IFSC code'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Type of Account</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['account type'];;?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Contact Number</div>
  <div class="col border bg-info text-white h-75"><?php echo $row['contact number'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Gender</div>
  <div class="col border bg-info text-white h-75"><?php echo  $row['gender'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Date of Birthday</div>
  <div class="col border bg-info text-white h-75"><?php echo  $row['dob'];?></div>
  
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Branch</div>
  <div class="col border bg-info text-white h-75"><?php echo  $row['branch name'];?></div>
  <div class="w-100"></div>
  <div class="col border bg-dark text-white text-center h-75">Balance</div>
  <div class="col border bg-info text-white h-75"><?php echo  $row['balance'];?></div>
</div>
<br>
<br>

<div class="text-center pb-2">
    <form action="Transaction.php" method="GET" autocomplete="off">
                    <input type="hidden" name="sendersaccountnumber"  class="senders account number" value="<?php echo $row['account number']?>">
                    <input type="hidden" name="sendersname"  class="senders name" value="<?php echo $row['customer name']?>">
                    <input  class="btn btn-primary" type="submit" value="Transact Now">
                    </form>

      </div>

        </div>

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

<style>

body{
    background:linear-gradient(-45deg,#f5f7fa, #c3cfe2);
}
</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>


<?php
$con->close();
?>

</body>
</html>