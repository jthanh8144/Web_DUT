<?php
include_once("E_Student.php");
class Model_Student
{
    public function __construct()
    {
    }

    public function getAllStudent()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $i = 0;
        $sql = "SELECT * FROM sinhvien";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $age = $row['age'];
                $university = $row['university'];
                while ($i != $id) $i++;
                $students[$i++] = new Entity_Student($id, $name, $age, $university);
            }
        } else {
            $students = [];
        }
        return $students;
    }

    public function getStudentDetail($stid)
    {
        $allStudent = $this->getAllStudent();
        return $allStudent[$stid];
    }

    public function addStudent($id, $name, $age, $university)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "INSERT INTO sinhvien VALUES ('$id', '$name', '$age', '$university')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert(\'Thêm thành công\');</script>';
            header("Location: C_Student.php?mode=view");
        } else {
            echo '<script>alert(\'Thêm thất thất bại\');</script>';
            header("Location: C_Student.php?mode=view");
        }
    }

    public function delStudent($id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "DELETE FROM sinhvien WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert(\'Thêm thành công\');</script>';
            header("Location: C_Student.php?mode=view");
        } else {
            echo '<script>alert(\'Thêm thất thất bại\');</script>';
            header("Location: C_Student.php?mode=view");
        }
    }

    public function editStudent($id, $name, $age, $university)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "UPDATE sinhvien SET name = '$name', age = '$age', university = '$university' WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert(\'Cập nhập thành công\');</script>';
            header("Location: C_Student.php?mode=view&stid=".$id."");
        } else {
            echo '<script>alert(\'Cập nhập thất bại\');</script>';
            header("Location: C_Student.php?mode=view&stid=".$id."");
        }
    }

    public function search($name) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $i = 0;
        $sql = 'SELECT * FROM sinhvien WHERE name LIKE N\'%'.$name.'%\'';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $age = $row['age'];
                $university = $row['university'];
                while ($i != $id) $i++;
                $students[$i++] = new Entity_Student($id, $name, $age, $university);
            }
        } else {
            $students = [];
        }
        return $students;
    }
}
