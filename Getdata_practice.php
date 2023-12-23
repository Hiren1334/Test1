<?php

$connect = mysqli_connect("localhost","root","","getdatatable");
if($connect)
{
    echo "connection success";
}
else 
{ 
    echo "connection not";
}

if(@$_POST['click'])
{
    $Username = $_POST['username'];
    echo "<br>".$Username;
    $em = $_POST['Email'];
    echo  "<br>".$em;               
    $pass = $_POST['password'];
    echo  "<br>".$pass;         

    $qry = "INSERT INTO `gettable` (`username`,`Email`,`password`) VALUES ('$Username','$em','$pass')";

    if(mysqli_query($connect,$qry))
    {
        echo "Success data";
    }
    else
    {
        echo "not";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=""method = "post">
        <table border = "1">
            <tr>
                <td>Username</td>
                <td><input type="Username" name="username" id=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="Email" name="Email" id=""></td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td>submit</td>
                <td><input type="submit" name="click" id=""></td>
            </tr>
        </table>
    </form>
</body>
</html>


