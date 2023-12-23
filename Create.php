<?php

$connect = mysqli_connect("localhost","root","","login");

if($connect)
{
    echo "connection success";
}
else
{
    echo "Connection not";
}

if(@$_GET['delete'])
{
    echo "ok";
    $delete_id = $_GET['delete'];
    $qry = "DELETE FROM `logindata` WHERE `id` = '$delete_id' ";
    mysqli_query($connect,$qry);
    header("location:Create.php");
}

if(@$_GET['submit'])
{
    $srch = $_GET['srch'];
    $qry = "SELECT * FROM `logindata` WHERE `username` LIKE '%$srch%' ";
}else
{
    $qry = "SELECT * FROM `logindata` ";
}

$result = mysqli_query($connect, $qry);
?>

    <form action="">
        <table border="1">
            <tr>
                <td>Search</td>
                <td><input type="text" name="srch" id=""></td>
                <td> <input type="submit" name="submit" id=""></td>
                <td><button><a href="Create.php">Back</a></button></td>
            </tr>
        </table>
</form>


    <table border = "1">
        <tr>
                <td>id</td>
                <td>Username</td>
                <td>Emailid</td>
                <td>Password</td>
                <td>DOB</td>
                <td>Image</td>
                <td>gender</td>
                <td>Hobby</td>
                <td>Delete</td>
                <td>Edit</td>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Username']; ?></td>
                <td><?php echo $row['Emailid']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Image']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Hobby']; ?></td>
                <td><button><a href= "Create.php?delete=<?php echo $row ['id'];?>">Delete</a></button></td>
                <td><button><a href="Getdata.php?edit=<?php echo $row['id'];?>">Edit</a></button></td>
         </tr>

         <?php
        }
        ?>
    </table>
