<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("getclass",$_POST['token']))
{
        $uid = $_POST['uid'];
// $uid=2;
        $query=$db->prepare('SELECT * FROM addclass WHERE uid=?');

        $data=array($uid);

        $execute=$query->execute($data);
?>
<select name="class2" id="class2" class="form-control">
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