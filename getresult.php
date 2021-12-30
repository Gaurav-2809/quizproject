<?php
include('connection1.php');
session_start();
if (isset($_POST['token']) && password_verify("getresult", $_POST['token'])) {

    $query = $db->prepare('SELECT * FROM result JOIN addstudent ON result.studentid=addstudent.stdid
         JOIN addtest ON result.testid=addtest.testid;');

    $data = array();

    $execute = $query->execute($data);
?>
    <table class="table table-hover table-bordered">
        <tr>
            <td>SR. NO.</td>
            <td>TEST NAME</td>
            <td>STUDENT NAME</td>
            <td>MARKS</td>
        </tr>
        <?php
        $srno = 1;
        while ($datarow = $query->fetch()) {
        ?>
            <tr>
                <td><?php echo $srno ?></td>
                <td><?php echo $datarow['test'] ?></td>
                <td><?php echo $datarow['fname'] ?></td>
                <td><?php echo $datarow['marks'] ?></td>
            </tr>
        <?php
            $srno++;
        }
        ?>
    </table>
<?php
}
?>