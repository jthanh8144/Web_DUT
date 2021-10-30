<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>
<body>
    <form action="../Controller/C_Student.php?mode=search" method="POST">
        <div class="form-group">
            <label for="name">Nhập tên cần tìm</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <input type="submit" value="Tìm kiếm">
        </div>
    </form>
    <p><a href="../index.php">Trang chủ</a></p>
</body>
</html>