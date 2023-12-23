<?php
    $con = mysqli_connect("localhost","root","","datasorting");
    if($con){
        echo "success con";
    }else{
        echo "con not success";
    }

    if(@$_POST['click'])
    {
        $Name = $_POST['Name'];
        echo "<br>".$Name;
        $Number = $_POST['Number'];
        echo "<br>".$Number;
        $Email = $_POST['Email'];
        echo "<br>".$Email;
        $Passwrod = $_POST['Passwrod'];
        echo "<br>".$Passwrod;

        $qry = "INSERT INTO `tabledata` (`Name`,`Number`,`Email`,`Passwrod`) VALUES ('$Name','$Number','$Email','$Passwrod')";

        if(mysqli_query($con,$qry))
        {
            echo "Success data";
        }
        else
        {
            echo "Success  not data";
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
    <form action="" method="post">
        <table>
            <tr>
                <td><h3>Name</h3></td>
                <td><input type="Name" name="Name" id=""></td>
            </tr>
            <tr>
                <td>Number</td>
                <td><input type="Number" name="Number" id=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="Email" name="Email" id=""></td>
            </tr>
            <tr>
                <td>Passwrod</td>
                <td><input type="Passwrod" name="Passwrod" id=""></td>
            </tr>
            <tr>
                <td>submit</td>
                <td><input type="Submit" name="click" id=""></td>
            </tr>
        </table>
    </form>
</body>
</html>