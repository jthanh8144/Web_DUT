<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <?php
    if (isset($student)) {
        echo '
        <form action="../Controller/C_Student.php?mode=edit&stid='.$student->id.'" method="POST">
            <input type="text" name="id" id="" value="'.$student->id.'" readonly>
            <input type="text" name="name" id="" value="'.$student->name.'">
            <input type="text" name="age" id="" value="'.$student->age.'">
            <input type="text" name="university" id="" value="'.$student->university.'">';
    } else {
        echo '
        <form action="../Controller/C_Student.php?mode='.$_REQUEST['mode'].'" method="POST">
            <input type="text" name="id" id="" readonly>
            <input type="text" name="name" id="">
            <input type="text" name="age" id="">
            <input type="text" name="university" id="">';
    }
    echo '
            <input type="submit" value="OK">
        </form>';
    ?>
    <p><a href="../index.php">Trang chủ</a></p>
</body>
</html>