<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sinh viên</title>
</head>
<body>
    <h2>Chi tiết sinh viên</h2>
    <?php
        echo "<p><b>".$student->name."</b></p>";
        echo "<p>Tuổi: ".$student->age."</p>";
        echo "<p>Trường đại học: ".$student->university."</p>";

    ?>
    <p><a href="javascript:history.back()">Trở về</a></p>
    <p><a href="../index.php">Trang chủ</a></p>
</body>
</html>