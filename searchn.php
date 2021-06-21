<?php
    $servername="localhost";
    $username="root";
    $password = "";
    $database="bank";

    $output='';
  
    $con= mysqli_connect($servername, $username, $password, $database);

    

    function get_name($con , $term){ 
        // $query = "SELECT * FROM account WHERE 'account number' LIKE '%".$term."%' ORDER BY 'account number' ASC";
        $query= "SELECT * FROM `account` WHERE `customer name` LIKE '%".$term."%' ORDER BY 'customer name' ASC";

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
        $nameList[] = $name['customer name'];
        }
        echo json_encode($nameList);
       }

?>


