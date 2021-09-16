<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("gettest", $_POST['token'])) {

    $query = $db->prepare('SELECT * FROM addtest JOIN addclass ON addtest.class=addclass.id
         JOIN adduniversity ON addclass.uid=adduniversity.uid;');

    $data = array();

    $execute = $query->execute($data);
?>
    <table class="table table-hover table-bordered">
        <tr>
            <td>SR. NO.</td>
            <td>TEST NAME</td>
            <td>CLASS</td>
            <td>UNIVERSITY</td>
        </tr>
        <?php
        $srno = 1;
        while ($datarow = $query->fetch()) {
        ?>
            <tr>
                <td><?php echo $srno ?></td>
                <td><?php echo $datarow['test'] ?></td>
                <td><?php echo $datarow['class'] ?></td>
                <td><?php echo $datarow['uname'] ?></td>
            </tr>
        <?php
            $srno++;
        }
        ?>
    </table>
<?php
}
?>