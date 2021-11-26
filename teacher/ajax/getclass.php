<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getclass",$_POST['token']))
{
        $cid =$_POST['cid'];
// $uid=2;
        // $query=$db->prepare('SELECT * FROM addteacher JOIN addclass ON addteacher.class=addclass.id;');
        $query=$db->prepare('SELECT * FROM addclass where id=?;');

        $data=array($cid);

        $execute=$query->execute($data);
?>
<select name="class" id="class" class="form-control">
<option value="0">SELECT CLASS</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['class']?></option>
    <?php } ?>
</select>
<?php

    }
    

?>