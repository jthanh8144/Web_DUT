<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem thông tin phòng ban</title>

    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM phongban";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<table border="1" width="100%">';
            echo '<caption>Thông tin phòng ban</caption>';
            echo '<tr><th>Mã phòng ban</th><th>Tên phòng ban</th><th>Mô tả</th><th>Nhân viên</th></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row["IDPB"].'</td><td>'.$row["TenPB"].'</td><td>'.$row["MoTa"]
                    .'</td><td><a href="XemThongTinNVPB.php?IDPB='.$row["IDPB"].'">Nhân viên '.$row["TenPB"].'</a></a></td></tr>';
            }
        } else {
            echo "0 results";
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>