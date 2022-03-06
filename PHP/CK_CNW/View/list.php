<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
        .form {
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            flex-direction: row;
            align-content: center;
            padding: 10px;
        }

        .add-btn {
            margin-left: auto;
        }

        .select {
            height: 35px;
            padding: 0 10px;
        }

        .btn {
            outline: none;
            background-color: #41dfd7;
            padding: 9px 12px;
            font-weight: 600;
            color: #fff;
            border: none;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
            min-width: 80px;
        }

        .btn:hover {
            background-color: #45ece4;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
        if (sizeof($SVs) > 0) {
    ?>
    <div class="header">
        <form method="POST" action="../Controller/C_SinhVien.php?mode=viewSVK">
            <select name="IDK" class="select">
                <option value="">Tất cả sinh viên</option>
                <?php
                for ($j = 0; $j < sizeof($Khoas); $j++) {
                    echo '<option value="'.$Khoas[$j]->IDK.'">'.$Khoas[$j]->TenKhoa.'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Xem" class="btn">
            <script>
                var select = document.querySelector('.select');
                for (var i = 0; i < select.options.length; i++) {
                    if (select.options[i].value == '<?php echo $IDK; ?>') {
                        select.selectedIndex = i
                    }
                }
            </script>
        </form>
        <a href="../Controller/C_SinhVien.php?mode=view-addSV" class="add-btn btn">Thêm sinh viên</a>
    </div>
    <table border="1" width="100%">
        <caption>Danh sách sinh viên</caption>
        <tr>
            <th>Mã sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Giới tính</th>
            <th>Tên khoa</th>
            <th></th>
            <th></th>
        </tr>
    <?php
            for ($i = 0; $i < sizeof($SVs); $i++) {
    ?>
        <tr>
            <td><?php echo $SVs[$i]->IDSV ?></td>
            <td><?php echo $SVs[$i]->TenSV ?></td>
            <td><?php echo $SVs[$i]->GioiTinh ?></td>
            <td><?php echo $TenKhoas[$i] ?></td>
            <td><a href="../Controller/C_SinhVien.php?mode=view-updateSV&IDSV=<?php echo $SVs[$i]->IDSV ?>">Cập nhật</a></td>
            <td><a href="../Controller/C_SinhVien.php?mode=view-deleteSV&IDSV=<?php echo $SVs[$i]->IDSV ?>">Xóa</a></td>
        </tr>
    <?php
            }
    ?>
        </table>
    <?php
        } else {
    ?>
    <h3>Không có kết quả nào</h3>
    <?php
        }
    ?>
</body>

</html>