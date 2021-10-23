<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>

    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>

<body>
    <?php
        $Select = $_REQUEST['select'];
        $Input = $_REQUEST['inp'];
        
        if ($Select == '') {
            header("Location:TimKiemNangCao.php");
        } else {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM nhanvien WHERE $Select = '$Input'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<table border="1" width="100%">';
                echo '<caption>Thông tin nhân viên</caption>';
                echo '<tr><th>Mã nhân viên</th><th>Họ tên</th><th>Mã phòng ban</th><th>Địa chỉ</th></tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr><td>' . $row["IDNV"] . '</td><td>' . $row["HoTen"] . '</td><td>' . $row["IDPB"] 
                        . '</td><td>' . $row["DiaChi"] . '</td></tr>';
                }
            } else {
                header("Location:TimKiemNangCao.php");
            }
            mysqli_close($conn);
            echo '<a href="TimKiemNangCao.php">Quay lại</a>';
        }
    ?>
</body>

</html>