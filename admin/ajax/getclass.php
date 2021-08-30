<?php
include('connection1.php');
if(isset($_POST['token']) && password_verify("getclass",$_POST['token']))
{

        $query=$db->prepare('SELECT * FROM addclass');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="class1" id="class1" class="form-control">
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id']?>"><?php echo $datarow['class']?></option>
    <?php } ?>
</select>
<?php

    }

?>