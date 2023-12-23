<?php

$connect = mysqli_connect("localhost", "id21618554_hirendatabase", "Hiren@6030", "id21618554_registerdata");
$response = array();

if ($connect) {
    $response['connection'] = 1;
  

        $Img = $_POST['Img'];
        $Multiimages = json_decode($_POST['Multiimages'],true);
        $Proname = $_POST['Proname'];
        $Price = $_POST['Price'];
        $Discountprice = $_POST['Discountprice'];
        $Brand = $_POST['Brand'];
        $Catagory = $_POST['Catagory'];
        $Description = $_POST['Description'];

   

    $imgreal = base64_decode($Img);

    $imgName = rand(0, 2000)."Testimg.jpg";

    $imgURLBase = "https://parmardata.000webhostapp.com/getimage/";


    $imgURl = $imgURLBase . $imgName;

    file_put_contents('getimage/' . $imgName, $imgreal);

    $imgUrlList = array();

    if (is_array($Multiimages) && count($Multiimages) > 0) {
    for ($i=0; $i < count($Multiimages); $i++) { 
        $imgName = rand(0,2000).$i.'Image.jpg';
        $realImg = base64_decode($Multiimages[$i]);
        file_put_contents('getimage/'.$imgName, $realImg);
        $imgUrlList[$i] = $imgURLBase.$imgName;
        
    }
}


    $multiImagesString = implode(',', $imgUrlList); 
    


    $sql = "INSERT INTO `Ecomgetdata` (`Img`,`Multiimages`,`Proname`,`Price`,`Discountprice`,`Brand`,`Catagory`,`Description`) 
    VALUES ('$imgURl' ,'$multiImagesString', '$Proname' , '$Price','$Discountprice', '$Brand','$Catagory','$Description')";

   

    $qry = mysqli_query($connect, $sql);

    if ($qry) {
        $response['result'] = 1;

    } else {
        $response['result'] = 0;
    }


} else {
    $response['connection'] = 0;
}
echo json_encode($response);
?>