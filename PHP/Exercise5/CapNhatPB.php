<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập phòng ban</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            color: #333;
            font-size: 62.5%;
            font-family: 'Open Sans', sans-serif;
        }
        body {
            background-color: rgb(252, 239, 239);
        }
        .back {
            text-decoration: none;
            color: #00cec9;
            display: block;
            padding: 10px 10px;
            font-size: 18px;
        }
        .main {
            min-height: calc(100vh - 60px);
            display: flex;
            justify-content: center;
        }
        .form {
            width: 360px;
            min-height: 100px;
            padding: 32px 24px;
            background: rgb(198, 253, 241);
            border-radius: 2px;
            margin: 24px;
            align-self: center;
            /* nằm giữa màn hình */
            box-shadow: 0 2px 5px 0 rgba(5, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            margin-bottom: 16px;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }
        .form-label {
            font-weight: 700;
            line-height: 35px;
            font-size: 1.4rem;
            width: 101px;
        }
        .form-control {
            height: 35px;
            padding: 8px 12px;
            border: 1px solid #b3b3b3;
            border-radius: 3px;
            outline: none;
            font-size: 1.4rem;
        }
        .btn {
            outline: none;
            background-color: #41dfd7;
            padding: 10px 12px;
            font-weight: 600;
            color: #fff;
            border: none;
            font-size: 1.4rem;
            border-radius: 8px;
            cursor: pointer;
            min-width: 80px;
        }
        .btn:hover {
            background-color: #45ece4;
        }
    </style>
</head>

<body>
    

    <?php
    $IDPB = $_REQUEST['IDPB'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dulieu";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM phongban WHERE IDPB = '$IDPB'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <a href="CapNhat.php" class="back">Quay lại</a>
            <div class="main">
                <form action="XLCapNhat.php?IDPB=' . $row["IDPB"] . '" method="POST" class="form" id="form-1">
                    <div class="form-group">
                        <label for="TenPB" class="form-label">Tên phòng ban</label>
                        <input type="text" id="TenPB" name="TenPB" class="form-control" value="' . $row["TenPB"] . '">
                    </div>

                    <div class="form-group">
                        <label for="MoTa" class="form-label">Mô tả</label>
                        <input type="text" id="MoTa" name="MoTa" class="form-control" value="' . $row["MoTa"] . '">
                    </div>

                    <div class="form-group">
                        <input class="btn" type="Submit" value="Cập nhật">
                        <input class="btn" type="Reset" value="Reset">
                    </div>
                </form>
            </div>';
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>