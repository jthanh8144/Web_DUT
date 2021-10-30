<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa nhân viên</title>

    <link rel="stylesheet" type="text/css" href="./styles.css">
    <style>
        .form {
            display: flex;
            flex-direction: column;
        }
        .del-mul-btn {
            margin: 10px 10px 0 auto;
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

        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<form action="XLXoaNVs.php" method="POST" class="form">';
            echo '<table border="1" width="100%">';
            echo '<caption>Thông tin nhân viên</caption>';
            echo '<tr><th>Mã nhân viên</th><th>Họ tên</th><th>Mã phòng ban</th><th>Địa chỉ</th><th></th></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row["IDNV"].'</td><td>'.$row["HoTen"].'</td><td>'.$row["IDPB"].'</td><td>'.$row["DiaChi"].
                    '</td><td><input type="checkbox" name="IDNV[]" value="'.$row["IDNV"].'"></td></tr>';
            }
            echo '</table>
                <input class="btn del-mul-btn" type="Submit" value="Xóa" disabled>
            </form>';
        } else {
            echo "0 results";
        }
        
        mysqli_close($conn);
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var delBtn = document.querySelector('.del-mul-btn');
            var checkboxs = document.querySelectorAll('input[name="IDNV[]"]');
            Array.from(checkboxs).forEach(checkbox => {
                checkbox.onchange = () => {
                    var checkedCount = document.querySelectorAll('input[name="IDNV[]"]:checked').length;
                    if (checkedCount != 0) {
                        delBtn.disabled = false;
                    } else {
                        delBtn.disabled = true;
                    }
                };
            });
        });
    </script>
</body>
</html>