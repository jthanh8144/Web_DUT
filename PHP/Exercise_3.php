<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        /* $s = 1;
        for ($i = 1; $i <= 10; $i++) {
            if ($i % 2 != 0) {
                continue;
            }
            $s = $s * $i;
        }
        echo $s; */
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test_cnw";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM table1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<table border="1" width="100%">';
            echo '<caption>Du lieu truy xuat tu bang table1</caption>';
            echo '<tr><th>Ma so</th><th>Ho ten</th><th>Ngay sinh</th><th>Nghe nghiep</th></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row["MaSo"].'</td><td>'.$row["HoTen"].'</td><td>'.$row["NgaySinh"].'</td><td>'.$row["NgheNghiep"].'</td></tr>';
            }
        } else {
            echo "0 results";
        }
        
        mysqli_close($conn);
    ?>
</body>
</html>