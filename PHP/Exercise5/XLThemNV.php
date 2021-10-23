<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí thêm nhân viên</title>
</head>

<body>
    <?php
        $IDNV = $_REQUEST['IDNV'];
        $HoTen = $_REQUEST['HoTen'];
        $IDPB = $_REQUEST['IDPB'];
        $DiaChi = $_REQUEST['DiaChi'];

        if ($IDNV == '' || $IDPB == '') {
            header("Location: ThemNV.php");
        } else {
            $servername = "localhost";
            $username = "root";
            $pw = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $pw, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "INSERT INTO nhanvien VALUES ('$IDNV', '$HoTen', '$IDPB', '$DiaChi')";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert(\'Thêm thành công\');</script>';
                header("Location: XemThongTinNV.php");
            } else {
                echo '<script>alert(\'Thêm thất thất bại\');</script>';
                header("Location:ThemNV.php");
            }
            mysqli_close($conn);
        }
    ?>
</body>

</html>