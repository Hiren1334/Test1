<?php

    $connect = mysqli_connect("localhost","root","","login");
    if($connect)
    {
        echo "Connection Success";
    }
    else{
        echo "Connection not";
    }

    if(@$_GET['edit']){

        $edit_id = $_GET['edit'];
        $qry = "SELECT * FROM `logindata` WHERE `id` = '$edit_id'";
        $res = mysqli_query($connect,$qry);
        $row = mysqli_fetch_assoc($res);
        $checkbox_array = explode(",",$row['Hobby']);
    }

    if(@$_POST['click'])
    {
            // print_r($_POST);
           
           $name = $_POST['username'];
           echo $name;
           $em = $_POST['emailid'];
           echo "<br>".$em;
           $ps = $_POST['password'];
           echo "<br>".$ps;
           $dat = $_POST['Date'];
           echo "<br>".$dat;
           $im = $_POST['image'];
           echo "<br>".$im;
           $gender = $_POST["gender"]; 
           echo "<br>".$gender."<br>";
           $hobby = $_POST['Hobby'];
            $value = implode(",",$hobby);

        if(@$_GET['edit'])
        {
            $qry = "UPDATE `logindata` SET `username` = '$name',`emailid` = '$em',`password` ='$ps' ,`Date`= '$dat',
            `image` = '$im',`gender` = '$gender',`Hobby` = '$value' WHERE `id` = '$edit_id'";
        } else {

            $qry =  "INSERT INTO `logindata` (`username`,`emailid`,`password`,`Date`,`image`,`gender`,`Hobby`) 
            VALUES ('$name','$em','$ps','$dat','$im','$gender','$value')";
        }
           
          
          

           if(mysqli_query($connect,$qry))
           {
            echo "<br>Success data enter";
           }
           else
           {
            echo "<br>not";
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
    <form action=""method = "POST">
        <table border="1">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="" value = "<?php echo @$row['username']; ?>"></td>
            </tr>   
            <tr>
                <td>Emailid</td>
                <td><input type="email" name="emailid" id="" value = "<?php echo @$row['emailid']; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="" value = "<?php echo @$row['password']; ?>"></td>
            </tr>
            <tr>
            <td>gender</td>
            <td><input type="radio" name="gender" value="female" <?php echo (@$row['gender'] == 'female')?'checked':'' ?> >Female
            <input type="radio" name="gender" value="male" <?php echo (@$row['gender'] == 'male')?'checked':'' ?>>Male</td>
            </tr>
            <tr>
                <td>Hobby</td>
                <td><input type="checkbox" name="Hobby[]" value = "Cricket"<?php if(in_array ("Cricket",$checkbox_array)){echo " checked=\"checked\""; } ?>>
                Cricket<input type="checkbox" name="Hobby[]" value="reading"<?php if(in_array ("reading",$checkbox_array)){echo " checked=\"checked\""; } ?>>reading</td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="Date" name="Date" id=""  value = "<?php echo @$row['Date']; ?>"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id=""  value = "<?php echo @$row['image']; ?>"></td>
            </tr>
            <tr>
                <td>submit</td>
                <td><input type="submit" name="click" id=""></td>
            </tr>
           

        </table>
    </form>
</body>
</html>