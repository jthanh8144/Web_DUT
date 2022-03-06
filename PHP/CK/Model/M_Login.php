<?php
class Model_Login
{
    public function __construct()
    {
    }

    public function checkLogin($user, $pass)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test888";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM account WHERE user = '$user' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
