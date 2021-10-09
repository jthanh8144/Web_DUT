<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>

    <link rel="stylesheet" type="text/css" href="./styles1.css">
</head>
<body>
    <div class="main">
        <form action="XuLiTimKiem.php" method="POST" class="form" id="form-1">
            <h3 class="heading">Tìm kiếm</h3>

            <div class="form-group">
                <label for="fullname" class="form-label">Mã nhân viên</label>
                <input type="text" id="IDNV" name="IDNV"class="form-control">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Họ tên</label>
                <input type="text" id="name" name="Name" class="form-control">
            </div>

            <input class="btn" type="Submit" value="Tìm kiếm">
            <input class="btn" type="Reset" value="Reset">
        </form>
    </div>
</body>
</html>
