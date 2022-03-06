<?php
include_once("E_Khoa.php");
class Model_Khoa
{
    public function __construct()
    {
    }

    public function getListKhoa()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $i = 0;
        $sql = "SELECT * FROM khoa";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $IDK = $row['IDK'];
                $TenKhoa = $row['TenKhoa'];
                $khoas[$i++] = new Entity_Khoa($IDK, $TenKhoa);
            }
        } else {
            $khoas = [];
        }
        return $khoas;
    }

    public function getTenKhoa($IDK)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM khoa WHERE IDK = '$IDK'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $TenKhoa = $row['TenKhoa'];
        }
        return $TenKhoa;
    }

}
