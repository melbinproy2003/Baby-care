<?php 
 include("../Assets/Connection/Connection.php");
 
 if(isset($_POST['submit']))
 {
    $name=$_POST['name'];
    $in="insert into tbl_infocategory(infocategory_name) VALUE('".$name."')";
    $con->query($in);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Category</title>
</head>
<body>
    <form method="post">
        <table border="1">
            <tr>
                <th colspan="2">Information Category</th>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="save" >
                </td>
            </tr>
        </table>
    </form>
    <table border="2" >
        <tr>
            <td>SI.NO</td>
            <td>Content</td>
        </tr>
        <?php 
         $sel="select * from tbl_infocategory";
         $row=$con->query($sel);
         $i=0;
         while($val=$row->fetch_assoc())
         {
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $val['infocategory_name'] ?></td>
        </tr>
        <?php
         }
        ?>
    </table>
</body>
</html>