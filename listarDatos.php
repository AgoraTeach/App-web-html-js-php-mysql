<?php
    include('database.php');

    $query = "SELECT * from gastoseingresos";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die(mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id' => $row['id'],
            'descrip' => $row['descrip'],
            'monto' => $row['monto']
            );
        }
    $jsonstring =json_encode($json);
    echo $jsonstring;

?>