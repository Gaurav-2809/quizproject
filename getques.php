<?php
include('connection1.php');
if (isset($_POST['token']) && password_verify("getques", $_POST['token'])) {
    $query = $db->prepare('SELECT * FROM addtest');

    $data = array();

    $execute = $query->execute($data);

    while ($datarow = $query->fetch()) {
?>
<form>
<p style="margin-top: 2rem"><?php echo $datarow['id']; ?>. <?php echo $datarow['question'] ?></p>
<input id="1" type="radio" name="1" value="<?php echo $datarow['id'] ?>">
<label><?php echo $datarow['option1'] ?></label><br>
<input id="2" type="radio" name="1" value="<?php echo $datarow['id'] ?>">
<label><?php echo $datarow['option2'] ?></label><br>
<input id="3" type="radio" name="1" value="<?php echo $datarow['id'] ?>">
<label><?php echo $datarow['option3'] ?></label><br>
<input id="4" type="radio" name="1" value="<?php echo $datarow['id'] ?>">
<label><?php echo $datarow['option4'] ?></label><br>
</form>

<?php } ?>

<?php

}

?>