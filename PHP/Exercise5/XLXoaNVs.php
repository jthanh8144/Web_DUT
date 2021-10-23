<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí xóa nhiều nhân viên</title>
</head>

<body>
    <?php
        $IDNV = $_REQUEST['IDNV'];
        if (count($IDNV) == 0) {
            header("Location: XoaNVs.php");
        } else {
            $servername = "localhost";
            $username = "root";
            $pw = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $pw, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            for ($i = 0; $i < count($IDNV); $i++) {
                $sql = "DELETE FROM nhanvien WHERE IDNV = '$IDNV[$i]'";
                mysqli_query($conn, $sql);
            }
            header("Location: XoaNVs.php");
            mysqli_close($conn);
        }
    ?>
</body>

</html>