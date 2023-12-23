<?php

$connect = mysqli_connect("localhost","id21618554_hirendatabase","Hiren@6030","id21618554_registerdata");
$response = array();
if($connect){

    $response['connection'] = 1;
    
    $select = "SELECT * FROM `Ecomgetdata` ";

    $fireselect = mysqli_query($connect,$select);



    if( $fireselect){
        $response['result'] = 1;
        // $data = mysqli_fetch_all($fireselect, MYSQLI_ASSOC);

        //  $response['data'] = $data;



         $productdata = array();
         
         while($arr = mysqli_fetch_assoc($fireselect)) {
         
             // 
             // echo "$";
             // print_r($arr);

             $qw = $arr['Multiimages'];
            //  echo "$qw";

             $er = explode(",", $qw);

             $arr['Multiimages']=$er;

         $productdata[] = $arr;

         }

         $response['data'] = $productdata;
       

            
        
    
    }else {
        $response['result'] = 0;
    }
}else {
    $response['connection'] = 0;
}
echo json_encode($response);



?>

