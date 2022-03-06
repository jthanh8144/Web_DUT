<?php
include_once("../Model/M_Login.php");
class Ctrl_Login {
    public function invoke() {
        $modalLogin = new Model_Login();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($modalLogin->checkLogin($user, $pass) == true) {
            header("Location: C_SinhVien.php?mode=viewAll");
        } else {
            header("Location: View/login.php");
        }
    }
};
$C_Login = new Ctrl_Login();
$C_Login->invoke();
?>