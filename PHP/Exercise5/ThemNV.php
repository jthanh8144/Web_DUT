<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>

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

        .main {
            min-height: 100vh;
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
            flex-wrap: wrap;
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
            min-width: 200px;
        }

        .breaker {
            display: block;
            width: 100%;
            height: 0;
        }
        
        .form-message {
            display: none;
            font-size: 1.2rem;
            line-height: 1.6rem;
            padding: 4px 0 0;
            transform: translateX(10%);
            color: #ff264a;
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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dulieu";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT max(IDNV) FROM nhanvien";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $lastID = $row["max(IDNV)"];
    }
    $IDNV = (int) substr($lastID, 2) + 1;
    if ($IDNV < 10) {
        $newID = substr($lastID, 0, 2) . '0' . $IDNV;
    } else {
        $newID = substr($lastID, 0, 2) . $IDNV;
    }
    echo '
    <div class="main">
        <form action="XLThemNV.php" method="POST" class="form" id="form">
            <div class="form-group">
                <label for="IDNV" class="form-label">Mã nhân viên</label>
                <input type="text" id="IDNV" name="IDNV" class="form-control" value="'.$newID.'" readonly>
            </div>

            <div class="form-group">
                <label for="HoTen" class="form-label">Họ tên</label>
                <input type="text" id="HoTen" name="HoTen" class="form-control">
            </div>

            <div class="form-group">
                <label for="IDPB" class="form-label">Mã phòng ban</label>
                <!-- <input type="text" id="MoTa" name="MoTa" class="form-control"> -->
                <select name="IDPB" id="select-PB" class="form-control">
                    <option value="">Chọn phòng ban</option>';
    $sql = "SELECT * FROM phongban";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["IDPB"].'">'.$row["TenPB"].'</option>';
    }
    echo '
                </select>
                <span class="form-message">Chọn một phòng ban</span>
                <p class=breaker></p>
            </div>

            <div class="form-group">
                <label for="DiaChi" class="form-label">Địa chỉ</label>
                <input type="text" id="DiaChi" name="DiaChi" class="form-control">
            </div>

            <div class="form-group">
                <input class="btn" type="Submit" value="Thêm nhân viên">
                <input class="btn" type="Reset" value="Reset">
            </div>
        </form>
    </div>
    ';
    mysqli_close($conn);
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var submitBtn = document.querySelector('input[type="Submit"]');
            var select = document.querySelector('#select-PB');
            var errMessage = document.querySelector('.form-message');
            select.onchange = () => {
                if (select.selectedIndex != 0) {
                    errMessage.style.display = 'none';
                } else {
                    errMessage.style.display = 'block';
                }
            }
            submitBtn.onclick = (e) => {
                e.preventDefault();
                if (select.selectedIndex == 0) {
                    errMessage.style.display = 'block';
                }
                else {
                    document.querySelector('#form').submit();
                }
            }
        });
    </script>
</body>

</html>