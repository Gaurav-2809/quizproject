<?php
include('connection1.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest",$_POST['token']))
{

        $query=$db->prepare('SELECT * FROM addtest');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="test" id="test" class="form-control" onchange="getques();">
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