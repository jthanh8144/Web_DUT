<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    <?php
        $mode = $_GET['mode'];
        if ($mode != 'edit-view') {
            $mode = 'view';
        }
        for ($i = 1; $i <= sizeof($studentList); $i++) {
            echo "<p>".$i."<a href=\"?mode=".$mode."&stid=".$studentList[$i]->id."\">".$studentList[$i]->name."</a></p>";
        }
    ?>
    <p><a href="../index.php">Trang chủ</a></p>
</body>
</html>