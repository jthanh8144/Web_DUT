<?php
include_once("../Model/M_SinhVien.php");
include_once("../Model/M_Khoa.php");
class Ctrl_SinhVien {
    public function invoke() {
        $modelSV = new Model_SinhVien();
        $modelKhoa = new Model_Khoa();
        if (isset($_REQUEST['mode'])) {
            switch ($_REQUEST['mode']) {
                case 'viewAll':
                    $IDK = "";
                    $SVs = $modelSV->getAllSV();
                    $Khoas = $modelKhoa->getListKhoa();
                    for ($j = 0; $j < sizeof($SVs); $j++) {
                        $TenKhoas[$j] = $modelKhoa->getTenKhoa($SVs[$j]->IDK);
                    }
                    include_once("../View/list.php");
                    break;
                case 'viewSVK':
                    $IDK = $_POST['IDK'];
                    if ($IDK == "") {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    } else {
                        $SVs = $modelSV->getSVK($IDK);
                        $Khoas = $modelKhoa->getListKhoa();
                        include_once("../View/list.php");
                    }
                    break;
                case 'view-addSV':
                    $lastID = $modelSV->getLastIDSV();
                    $nextID = substr($lastID, 0, 2);
                    $t = intval(substr($lastID, -3)) + 1;
                    if ($t < 10) {
                        $nextID = $nextID.'00'.strval($t);
                    } else if ($t < 100) {
                        $nextID = $nextID.'0'.strval($t);
                    } else {
                        $nextID = $nextID.strval($t);
                    }
                    $Khoas = $modelKhoa->getListKhoa();
                    include_once("../View/add.php");
                    break;
                case 'addSV':
                    $sv = new Entity_SinhVien($_REQUEST['IDSV'], $_REQUEST['TenSV'], $_REQUEST['GioiTinh'], $_REQUEST['IDK']);
                    if ($modelSV->addSV($sv) == true) {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    } else {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    }
                    break;
                case 'view-updateSV':
                    $Khoas = $modelKhoa->getListKhoa();
                    $sv = $modelSV->getSV($_REQUEST['IDSV']);
                    include_once("../View/update.php");
                    break;
                case 'updateSV':
                    $sv = new Entity_SinhVien($_REQUEST['IDSV'], $_REQUEST['TenSV'], $_REQUEST['GioiTinh'], $_REQUEST['IDK']);
                    if ($modelSV->updateSV($sv) == true) {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    } else {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    }
                    break;
                case 'view-deleteSV':
                    $Khoas = $modelKhoa->getListKhoa();
                    $sv = $modelSV->getSV($_REQUEST['IDSV']);
                    include_once("../View/delete.php");
                    break;
                case 'deleteSV':
                    if ($modelSV->deleteSV($_REQUEST['IDSV']) == true) {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    } else {
                        header("Location: C_SinhVien.php?mode=viewAll");
                    }
                    break;
            }
        }
        // switch ($_REQUEST['mode']) {
        //     case 'view':
        //         if (isset($_REQUEST['stid'])) {
        //             $student = $modelStudent->getStudentDetail($_REQUEST['stid']);
        //             include_once("../View/StudentDetail.php");
        //         } else {
        //             $studentList = $modelStudent->getAllStudent();
        //             include_once("../View/StudentList.php");
        //         }
        //         break;
        //     case 'add':
        //         $modelStudent->addStudent($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
        //         break;
        //     case 'del':
        //         if (isset($_REQUEST['stid'])) {
        //             $modelStudent->delStudent($_REQUEST['stid']);
        //         } else {
        //             $studentList = $modelStudent->getAllStudent();
        //             include_once("../View/StudentList.php");
        //         }
        //         break;
        //     case 'edit-view':
        //         if (isset($_REQUEST['stid'])) {
        //             $student = $modelStudent->getStudentDetail($_REQUEST['stid']);
        //             include_once("../View/StudentForm.php");
        //         } else {
        //             $studentList = $modelStudent->getAllStudent();
        //             include_once("../View/StudentList.php");
        //         }
        //         break;
        //     case 'edit':
        //         $modelStudent->editStudent($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
        //         break;
        //     case 'search':
        //         $studentList = $modelStudent->search($_REQUEST['name']);
        //         include_once("../View/StudentList.php");
        //         break;
        // }
    }
};
$C_SV = new Ctrl_SinhVien();
$C_SV->invoke();
