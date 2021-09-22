<?php
include('connection1.php');
if (isset($_POST['token']) && password_verify("getques", $_POST['token'])) {

    $uid=$_POST['uid'];
// $uid=2;
    $query = $db->prepare('SELECT * FROM addquestion WHERE test=?');

    $data = array($uid);

    $execute = $query->execute($data);
    $no = 1;
    while ($datarow = $query->fetch()) {
?>

<form>
<p style="margin-top: 2rem"><?php echo $no ; ?>. <?php echo $datarow['question'] ?></p>
<input id="1" type="radio" name="1" value="<?php echo $datarow['questionid'] ?>">
<label><?php echo $datarow['option1'] ?></label><br>
<input id="2" type="radio" name="1" value="<?php echo $datarow['questionid'] ?>">
<label><?php echo $datarow['option2'] ?></label><br>
<input id="3" type="radio" name="1" value="<?php echo $datarow['questionid'] ?>">
<label><?php echo $datarow['option3'] ?></label><br>
<input id="4" type="radio" name="1" value="<?php echo $datarow['questionid'] ?>">
<label><?php echo $datarow['option4'] ?></label><br>
</form>

<?php $no++; } ?>

<?php

}

?>