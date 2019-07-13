<?php
    include('database.php');
    $search = $_POST['search']; 
    if(!empty($search)){
        $query = "SELECT * FROM gastoseingresos WHERE descrip LIKE '$search%'";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die('Query ERROR'.mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'descrip' => $row['descrip'],
                'monto' => $row['monto'],                
                'id' => $row['id']
            );
        }
        $json_string = json_encode($json);
        echo $json_string;
    }
?>