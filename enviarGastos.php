<?php

    include('database.php');
    if(isset($_POST['monto'])){

        $descrip = $_POST['descrip']; 
        $monto = $_POST['monto'];
        $query = "INSERT INTO gastoseingresos (descrip,monto) VALUES ('$descrip','$monto')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die('Query ERROR'.mysqli_error($connection));
        }
        
    }
     
?>