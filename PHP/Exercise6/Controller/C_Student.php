<?php
include_once("../Model/M_Student.php");
class Ctrl_Student {
    public function invoke() {
        $modelStudent = new Model_Student();
        switch ($_REQUEST['mode']) {
            case 'view':
                if (isset($_REQUEST['stid'])) {
                    $student = $modelStudent->getStudentDetail($_REQUEST['stid']);
                    include_once("../View/StudentDetail.php");
                } else {
                    $studentList = $modelStudent->getAllStudent();
                    include_once("../View/StudentList.php");
                }
                break;
            case 'add':
                $modelStudent->addStudent($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
                break;
            case 'del':
                if (isset($_REQUEST['stid'])) {
                    $modelStudent->delStudent($_REQUEST['stid']);
                } else {
                    $studentList = $modelStudent->getAllStudent();
                    include_once("../View/StudentList.php");
                }
                break;
            case 'edit-view':
                if (isset($_REQUEST['stid'])) {
                    $student = $modelStudent->getStudentDetail($_REQUEST['stid']);
                    include_once("../View/StudentForm.php");
                } else {
                    $studentList = $modelStudent->getAllStudent();
                    include_once("../View/StudentList.php");
                }
                break;
            case 'edit':
                $modelStudent->editStudent($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['age'], $_REQUEST['university']);
                break;
            case 'search':
                $studentList = $modelStudent->search($_REQUEST['name']);
                include_once("../View/StudentList.php");
                break;
        }
    }
};
$C_Student = new Ctrl_Student();
$C_Student->invoke();
?>