<?php
$server ="localhost";
$username="id17094004_localhost";
$password="cHZ(8UQD%Q!dI2K?";
$db="id17094004_bank";
$numberofrows="";
$errormessage="";
$submit=false;
$result="";
$sendersname="";
$Account_Number="";
$con=mysqli_connect($server,$username,$password,$db);

$errors=[];
$sname='';
$saccount='';
$rname='';
$raccount='';
$amount='';

$insert=false;


if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());

}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['transact']))
    {
    
        $sname=$_POST['sendername'];
        $saccount=$_POST['senderaccount'];
        $rname=$_POST['receivername'];
        $raccount=$_POST['receiveraccount'];
        $amount=$_POST['amount'];

        if(!$sname){
            $errors[]= "PLEASE PROVIDE SENDER'S NAME";
          }
      
          if(!$saccount){
            $errors[]= "PLEASE PROVIDE SENDER'S ACCOUNT NUMBER";
          }
      
          if(!$rname){
            $errors[]= "PLEASE PROVIDE RECEIVER'S NAME";
          }
      
          if(!$raccount){
            $errors[]= "PLEASE PROVIDE RECEIVER'S ACCOUNT NUMBER";
          }
      
          if(!$amount){
            $errors[]= "PLEASE PROVIDE AMOUNT TO BE TRANSFERRED";
          }

          if(empty($errors)){

            $sql = "SELECT * FROM `account` WHERE `account number` = '$saccount'";
                echo $con->error;
                $query= mysqli_query($con,$sql);
                $sql1=mysqli_fetch_array($query);
                echo $con->error;
                $sql= "SELECT * FROM `account` WHERE `account number` = '$raccount'";
                $query= mysqli_query($con,$sql);
                $sql2=mysqli_fetch_array($query);
                echo $con->error;
                // echo $amount;
                echo $con->error;
                // echo $sql1['balance'];
                echo $con->error;

                if(($amount) < 0){

                    echo '<script type="text/javascript">';
                    echo 'alert("negative value cannot be entered")';
                    echo '</script>';
                }
                else if(($amount) > $sql1['balance']){
            
                    echo '<script type="text/javascript">';
                    echo 'alert("Insufficient Balance")';
                    echo '</script>';
                }

                else{

           
                    $new= $sql1['balance'] - $amount;
                    echo $con->error;
                    $sqls='UPDATE `account` SET `balance` = "'.$new.'" WHERE `account`.`account number` ="'.$saccount.'"';

                    // $sqls= 'UPDATE `account` set `balance`= "'.$new.'" WHERE `account`.`account_number`="'.$saccount.'"';
                    mysqli_query($con,$sqls);


                    $new= $sql2['balance'] + $amount;
                    $sqlr='UPDATE `account` SET `balance` = "'.$new.'" WHERE `account`.`account number` ="'.$raccount.'"';
                    mysqli_query($con,$sqlr);

                    // $query="insert into `transaction`(`recivers_name`,`senders_name`,`senders_account_number`,`transaction_amount`,`recievers_account_number`)
                    // values('".$rname."','".$sname."','".$saccount."','".$amount."','".$raccount."');"
                    // echo $query
                    // $sql7=mysqli_query($con,$query);

                    $query7="INSERT INTO `transaction` (`recievers_name`, `senders_name`, `senders_account_number`, `transaction_amount`, `recievers_account_number`) 
                    VALUES ('".$rname."', '".$sname."', '".$saccount."',  '".$amount."', '".$raccount."');";
                    $sql=mysqli_query($con,$query7)
                    or die (mysqli_error($con));


                        $new=0;
                        $amount=0;
           
           
           
                    //     $new= $sql1['balance'] - $amount;
                //     echo $con->error;
                //     $sqls='UPDATE `account` SET `balance` = "'.$new.'" WHERE `account`.`account number` ="'.$saccount.'"';
                // mysqli_query($con,$sqls);
                // $new= $sql2['balance'] + $amount;
                // $sqlr= 'UPDATE detail set amount= "'.$new.'" where account_number="'.$raccount.'"';
                // mysqli_query($con,$sqlr);
        
        
            

                // $query7="INSERT INTO `transaction` (`recievers_name`, `senders_name`, `senders_account_number`, `transaction_amount`, `recievers_account_number`) 
                // VALUES ('".$rname."', '".$sname."', '".$saccount."',  '".$amount."', '".$raccount."');";
                // $sql=mysqli_query($con,$query7)
                // or die (mysqli_error($con));


                //     $new=0;
                //     $amount=0;

                    if($sql){
                        $insert=true;
                        $sname='';
                        $saccount='';
                        $raccount='';
                        $rname='';
                        $amount='';

                    }
        }

        }


    }

}


    

?>

<!doctype html>
<html lang="en">
 

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="icon" href="IMAGE/byte.png" type="image/icon type">
 <link rel="stylesheet" href="index.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>

    <title>Transactions</title>
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

    

   




  <div class="container">
  <br>
    <h1>MAKE A TRANSACTIONS</h1>
<br>

<?php
        if($insert){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Amount has been transferred successfully.</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
        }

    ?>

<?php if(!empty($errors)): ?>
        <div class=" container alert alert-danger">
            <?php foreach($errors as $error):?>
                <div><?php echo $error ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <form class="transact" id="form" method="post" autofill="off">
        <section class="half">
        <div class="mb-3 debit">
            <label for="debitAccount" class="form-label">Account to be debited</label>
            <input type="text"   class="form-control debited" name="senderaccount" id="senderaccount" value="<?php echo $saccount ?>">
            <script type="text/javascript">
                    $(function() {
                        $("#senderaccount").autocomplete({
                        source: 'search.php',
                        });
                    });
                </script>


            <label for="debitName" class="form-label">Name</label>
            <input type="text" minlength="1" maxlength="14" class="form-control debited" name="sendername" id="sendername" value="<?php echo $sname ?>">
            <script type="text/javascript">
                    $(function() {
                        $( "#sendername").autocomplete({
                        source: 'searchn.php',
                        });
                    });
                </script>

        </div>
        </section>

        <section class="half">
        <div class="mb-3 debit">
            <label for="creditAccount" class="form-label">Account to be credited</label>
            <input type="number" minlength="1" pattern="[0-9]{12}" class="form-control debited" name="receiveraccount" id="receiveraccount"  value="<?php echo $raccount ?>">

            <script type="text/javascript">
                    $(function() {
                        $( "#receiveraccount").autocomplete({
                        source: 'search.php',
                        });
                    });
                </script>
        
            <label for="creditName" class="form-label">Name</label>
            <input type="text" minlength="1" class="form-control debited" name="receivername" id="recievername" value="<?php echo $rname ?>">
            <script type="text/javascript">
                    $(function() {
                        $( "#receivername").autocomplete({
                        source: 'searchn.php',
                        });
                    });
                </script>

        </div>
        </section>
        
        <section class="whole">

        <div class="mb-3 row">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  name="amount" id="amount" value="<?php echo $account ?>">
            </div>
        </div>

<div class="form-group d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" name="transact">Transfer Money</button>
        </section>
        </div>
    
    </form>

    <br>


    <div class="container"><h2>Transaction History</h2></div>

<div class="container form-group d-flex justify-content-center">

<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Transaction ID</th>
      <th scope="col">Sender's Name</th>
      <th scope="col">Sender's Account Number</th>
      <th scope="col">Receiver's Name</th>
      <th scope="col">Receiver's Account Number</th>
      <th scope="col">Amount</th>
      

    </tr>
  </thead>
  <tbody>

    <?php 
        $sql = "SELECT * FROM `transaction` ";
        $result= mysqli_query($con,$sql);
        // echo $result;
        $num=mysqli_num_rows($result);
        
        if($num>0){
            $no=0;
            
            while($row = mysqli_fetch_assoc($result)){
                $no= $no + 1;
                ?>
                

                <tr>
                    <th scope='row'><?php echo $no ?></th>
                    <td><?php echo $row['senders_name']?></td>
                    <td><?php echo $row['senders_account_number']?></td>
                    <td><?php echo $row['recievers_name']?></td>
                    <td><?php echo $row['recievers_account_number']?></td>
                    <td><?php echo $row['transaction_amount']?></td>
                    
                </tr>
                <?php 
            }

        }

       
     ?>
    

  </tbody>
</table>
    </div>
<br>
<div class="container form-group d-flex justify-content-center">
    <a href=viewall.php><button class="btn btn-outline-dark">VIEW ALL CUSTOMERS</button></a>
    </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    

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

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script> -->
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
<style>

body{
    background:linear-gradient(-45deg,#f5f7fa, #c3cfe2);
}
</style>


  </body>
</html>