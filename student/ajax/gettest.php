<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest",$_POST['token']))
{
        $cid=$_POST['cid'];
        $query=$db->prepare('SELECT * FROM addtest where class=?');

        $data=array($cid);

        $execute=$query->execute($data);
?>
<select name="test" id="test" class="form-control" >
<option value="0">SELECT TEST NAME</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['testid'];?>"><?php echo $datarow['test']?></option>
    <?php } ?>
</select>

<?php

    }
    

?>