<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("getuni",$_POST['token']))
{

        $query=$db->prepare('SELECT * FROM adduniversity');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="university" id="university" class="form-control">
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option><?php echo $datarow['uname']?></option>
    <?php } ?>
</select>
<?php

    }

?>
   