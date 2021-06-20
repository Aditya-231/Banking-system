<?php
    $servername="localhost";
    $username="id17094004_localhost";
    $password ="cHZ(8UQD%Q!dI2K?";
    $database="id17094004_bank";
  
    $con= mysqli_connect($servername, $username, $password, $database);

    

    function get_name($con , $term){ 
        // $query = "SELECT * FROM account WHERE 'account number' LIKE '%".$term."%' ORDER BY 'account number' ASC";
        $query= "SELECT * FROM `account` WHERE `account number` LIKE '%".$term."%' ORDER BY 'account number' ASC";

        // $query="SELECT * FROM `account` WHERE `account number` LIKE '%10%'";

        // echo var_dump($query);
        $result = mysqli_query($con, $query); 
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data; 
    }
        
       if (isset($_GET['term'])) {
        $getName = get_name($con, $_GET['term']);
        $nameList = array();
        foreach($getName as $name){
        $nameList[] = $name['account number'];
        }
        echo json_encode($nameList);
       }

?>


