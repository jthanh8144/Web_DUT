<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Xóa sinh viên</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
    <div class="main">
        <form action="../Controller/C_SinhVien.php?mode=deleteSV&IDSV=<?php echo $sv->IDSV ?>" 
            method="POST" name="form1" class="form" id="form-1">
            <h3 class="heading">Xóa sinh viên</h3>

            <div class="form-group">
                <label for="firstname" class="form-label">Mã sinh viên</label>
                <input type="text" id="firstname" name="IDSV" class="form-control" value="<?php echo $sv->IDSV ?>" disabled>
            </div>

            <div class="form-group">
                <label for="firstname" class="form-label">Họ tên</label>
                <input type="text" id="firstname" name="TenSV" class="form-control" value="<?php echo $sv->TenSV ?>" disabled>
            </div>

            <div class="form-group">
                <label for="gender" class="form-label">Giới tính</label>
                <div class="gender">
                    <div class="radio">
                        <input type="radio" name="GioiTinh" id="male" value="Nam" disabled>
                        <label for="male" class="radio-label">Nam</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="GioiTinh" id="female" value="Nữ" disabled>
                        <label for="female" class="radio-label">Nữ</label>
                    </div>
                </div>
                <span class="form-message"></span>
                <p class=breaker></p>
                <script>
                    let radios = document.querySelectorAll('input[type=radio]');
                    Array.from(radios).forEach(radio => {
                        if (radio.value == '<?php echo $sv->GioiTinh ?>') {
                            radio.checked = true;
                        }
                    });
                </script>
            </div>

            <div class="form-group">
                <label for="select" class="form-label">Khoa</label>
                <select name=IDK id="select" class="form-control" disabled>
                    <?php
                    for ($j = 0; $j < sizeof($Khoas); $j++) {
                        echo '<option value="' . $Khoas[$j]->IDK . '">' . $Khoas[$j]->TenKhoa . '</option>';
                    }
                    ?>
                </select>
                <script>
                    var select = document.querySelector('#select');
                    for (var i = 0; i < select.options.length; i++) {
                        if (select.options[i].value == '<?php echo $sv->IDK ?>') {
                            select.selectedIndex = i
                        }
                    }
                </script>
            </div>

            <input class="btn" type="Submit" value="Xóa sinh viên">
            <a href="../Controller/C_SinhVien.php?mode=viewAll" class="btn">Quay lại</a>
        </form>
    </div>
</body>

</html>