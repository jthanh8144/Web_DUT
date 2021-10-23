<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí cập nhật phòng ban</title>
</head>

<body>
    <?php
        $IDPB = $_REQUEST['IDPB'];
        $TenPB = $_REQUEST['TenPB'];
        $MoTa = $_REQUEST['MoTa'];

        if ($TenPB == '' || $MoTa == '') {
            header("Location: CapNhatPB.php");
        } else {
            $servername = "localhost";
            $username = "root";
            $pw = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $pw, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "UPDATE phongban SET TenPB = '$TenPB', MoTa = '$MoTa' WHERE IDPB = '$IDPB'";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert(\'Cập nhật thành công\');</script>';
                header("Location: XemThongTinPB.php");
            } else {
                echo '<script>alert(\'Cập nhật thất bại\');</script>';
                header("Location:CapNhat.php");
            }
            mysqli_close($conn);
        }
    ?>
</body>

</html>