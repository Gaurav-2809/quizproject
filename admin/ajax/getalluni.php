<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getuni",$_POST['token']))
{
       
        $query=$db->prepare('SELECT * FROM adduniversity;');

        $data=array();

        $execute=$query->execute($data);
?>
<table class= "table table-striped table-bordered">
    <tr>
        <td>SR. NO.</td>
        <td>UNIVERSITY</td>
        <td>DELETE</td>
    </tr>
    <?php
    $srno=1;
        while($datarow=$query->fetch())
        {
    ?>
    <tr>
        <td><?php echo $srno ?></td>
        <td><?php echo $datarow['uname'] ?></td>
        <td><button onclick="deleted(this.value);" class="btn btn-danger" value="<?php echo $datarow['uid']?>">Delete</button></td>
    </tr>
<?php
$srno++;
    } 
?>
    </table>
<?php
    }
?>