<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lí đăng nhập</title>
</head>

<body>
    <?php
        $type = $_REQUEST['type'];
        $user = $_REQUEST['username'];
        $pass = $_REQUEST['password'];
        
        if ($user == '' || $pass == '') {
            header("Location:Login.php?type=$type");
        } else {
            $servername = "localhost";
            $username = "root";
            $pw = "";
            $dbname = "dulieu";

            $conn = mysqli_connect($servername, $username, $pw, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM admin WHERE username = '$user' AND pass = '$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                switch ($type) {
                    case 'updatePB':
                        header("Location: CapNhat.php");
                        break;
                    case 'addNV':
                        header("Location: ThemNV.php");
                        break;
                    case 'delNV':
                        header("Location: XoaNV.php");
                        break;
                    case 'delNVs':
                        header("Location: XoaNVs.php");
                        break;
                }
            } else {
                header("Location:Login.php?type=$type");
            }
            mysqli_close($conn);
        }
    ?>
</body>

</html>