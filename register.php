<?php

$connect = mysqli_connect("localhost","id21618554_hirendatabase","Hiren@6030","id21618554_registerdata");
$response = array();
if($connect){

    $response['connection'] = 1;

    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Contact = $_POST['Contact'];
    
    $sql = "INSERT INTO `Logindata` (`Username`,`Email`,`Password`,`Contact`)   VALUES ('$Username','$Email','$Password','$Contact') ";

    $qry = mysqli_query($connect,$sql);

    if($qry){
        $response['result'] = 1;
    
    }else {
        $response['result'] = 0;
    }
}else {
    $response['connection'] = 0;
}
echo json_encode($response);
?>
<form method="post" action="Data.php">

<input type="text" name="Username" />
<input type="text" name="Email" />
<input type="password" name="Password" />
<input type="text" name="Contact" />
</form>
