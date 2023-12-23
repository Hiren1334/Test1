<?php

$connect = mysqli_connect("localhost","id21618554_hirendatabase","Hiren@6030","id21618554_registerdata");
$response = array();
if($connect){

    $response['connection'] = 1;
    
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    

    $select = "SELECT * FROM `Logindata` WHERE `Email` = '$Email' AND `Password` = '$Password' ";


    $fireselect = mysqli_query($connect,$select);


    if( $fireselect){
        $response['result'] = 1;
        $data = mysqli_fetch_all($fireselect, MYSQLI_ASSOC);
        $response['data'] = $data;
    
    }else {
        $response['result'] = 0;
    }
}else {
    $response['connection'] = 0;
}
echo json_encode($response);



?>

