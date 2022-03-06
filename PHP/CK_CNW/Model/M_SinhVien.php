<?php
include_once("E_SinhVien.php");
class Model_SinhVien
{
    public function __construct()
    {
    }

    public function getAllSV()
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
        $sql = "SELECT * FROM sinhvien";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $IDSV = $row['IDSV'];
                $TenSV = $row['TenSV'];
                $GioiTinh = $row['GioiTinh'];
                $IDK = $row['IDK'];
                $students[$i++] = new Entity_SinhVien($IDSV, $TenSV, $GioiTinh, $IDK);
            }
        } else {
            $students = [];
        }
        return $students;
    }

    public function getSVK($IDK)
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
        $sql = "SELECT * FROM sinhvien WHERE IDK = '$IDK'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $IDSV = $row['IDSV'];
                $TenSV = $row['TenSV'];
                $GioiTinh = $row['GioiTinh'];
                $IDK = $row['IDK'];
                $students[$i++] = new Entity_SinhVien($IDSV, $TenSV, $GioiTinh, $IDK);
            }
        } else {
            $students = [];
        }
        return $students;
    }

    public function getSV($IDSV)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM sinhvien WHERE IDSV = '$IDSV'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $IDSV = $row['IDSV'];
            $TenSV = $row['TenSV'];
            $GioiTinh = $row['GioiTinh'];
            $IDK = $row['IDK'];
            $student = new Entity_SinhVien($IDSV, $TenSV, $GioiTinh, $IDK);
        }
        return $student;
    }

    public function addSV($sv)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "INSERT INTO sinhvien VALUES ('$sv->IDSV', '$sv->TenSV', '$sv->GioiTinh', '$sv->IDK')";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastIDSV()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT max(IDSV) FROM sinhvien";
        $result = mysqli_query($conn, $sql);
        $lastIDSV = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $lastIDSV = $row['max(IDSV)'];
        }
        return $lastIDSV;
    }

    public function updateSV($sv)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "UPDATE sinhvien SET TenSV = '$sv->TenSV', GioiTinh = '$sv->GioiTinh', IDK = '$sv->IDK' WHERE IDSV = '$sv->IDSV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSV($IDSV)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "DELETE FROM sinhvien WHERE IDSV = '$IDSV'";
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function search($name) {
        $sql = 'SELECT * FROM sinhvien WHERE name LIKE N\'%'.$name.'%\'';
    }
}
