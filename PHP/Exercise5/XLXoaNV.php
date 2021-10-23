<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí xóa nhân viên</title>
</head>

<body>
    <?php
        $IDNV = $_REQUEST['IDNV'];

        if ($IDNV == '') {
            header("Location: XoaNV.php");
        } else {
            $servername = "localhost";
            $username = "root";
            $pw = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $pw, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "DELETE FROM nhanvien WHERE IDNV = '$IDNV'";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert(\'Xóa thành công thành công\');</script>';
            } else {
                echo '<script>alert(\'Xóa thất bại\');</script>';
            }
            header("Location: XoaNV.php");
            mysqli_close($conn);
        }
    ?>
</body>

</html>