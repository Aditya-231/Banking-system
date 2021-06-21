<?php
session_start();
$server ="localhost";
$username="root";
$password="";
$db="bank";
$numberofrows="";
$errormessage="";
$submit=false;
$result="";
$con=mysqli_connect($server,$username,$password,$db);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// echo "Success connectiong to the db";




// if($con->query($sql)==true){
//     // echo "Successfully Inserted";
//     $submit=true;
// }
// else{
//     // echo "Error: $sql <br> $con->error";
//     $errormessage="$con->error";
// }
// $con->close();
//html content
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="IMAGE/byte.png" type="image/icon type">

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
                        <a class="nav-link font-weight-bold" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="viewall.php">View All Customers<span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold" href="transaction2.php">Transfer Money<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php
        if(isset($_SESSION['status']))
        {
            echo $_SESSION['status'];
            unset($_SESSION['status']);
        }
    ?>

    <div class="container">
        <br>
        <h1>List of all users</h1>
        <br>

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S. no.</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Customer City</th>
                    <th scope="col">Current Balance</th>
                    <th scope="col">Branch Opened With</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
           $sql="Select * from `account`";
           $result=mysqli_query($con,$sql);
           $numberofrows=mysqli_num_rows($result);


           
           
            if($numberofrows>0){
                $sno=0;
                while($row=mysqli_fetch_assoc($result)){
                    $sno=$sno+1;
                    echo "<tr>
                    <th scope='row'>".$sno."</th>
                    <td >".$row['account number']."</th>
                    <td>".$row['salutation']." ".$row['customer name']."</td>
                    <td>".$row['customer city']."</td>
                    <td>".$row['balance']."</td>
                    <td>".$row['branch name']."</td>
                    <td>";
                    ?>
                <form style="display:inline-block" action="one.php" method="GET" autocomplete="off">
                    <input type="hidden" name="name" class="name" value="<?php echo $row['account number']?>">
                    <input type="submit" class=" btn btn-outline-info" value="View">
                </form>
                <form style="display:inline-block" method="post" action="delete.php">
                    <input type='hidden' name='account_number' value="<?php echo $row['account number']?>">
                    <button type='submit' class='btn btn-outline-danger'>Delete</button>
                </form>
            
                </td>
                </tr>
                <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>



<br>
<br>
<br>
   
<br>
<br>
<br>
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
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
<style>

body{
    background:linear-gradient(-45deg,#f5f7fa, #c3cfe2);
}
</style>
</body>
<?php
$con->close();
?>

</html>