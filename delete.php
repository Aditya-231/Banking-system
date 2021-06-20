<?php

session_start();

$servername ="localhost";
$username="id17094004_localhost";
$password="cHZ(8UQD%Q!dI2K?";
$database="id17094004_bank";


$con= mysqli_connect($servername, $username, $password, $database);

if(!$con){
    die("connection to this databse failed due to". mysqli_connect_error());
}
// echo "connection successful";


    $anum=$_POST['account_number']??null;
    // if(!$id){
    //     header('Location:customer.php');
    //     exit;
    // }

$sql="DELETE FROM `account` WHERE `account`.`account number` =".$anum;

    $result= mysqli_query($con,$sql);


    if($result){

        $_SESSION['status']="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Account has been deleted sucessfully.</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        </div>";

        header("Location:viewall.php");
        

    }

    


    
    



?>


