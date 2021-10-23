<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm nâng cao</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #c6fdf1;
        }
        .main {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            margin: auto;
        }
        .container {
            align-self: center;
            padding: 30px;
        }
        .form-control {
            height: 35px;
            padding: 8px 12px;
            border: 1px solid #b3b3b3;
            border-radius: 3px;
            outline: none;
            font-size: 14px;
        }
        input {
            border: 2px solid #0058fc;
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
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <form action="XLTKNangCao.php" method="POST">
                <select name="select" id="select" class="form-control">
                    <option value="">Tìm kiếm theo</option>
                    <option value="IDNV">Mã nhân viên</option>
                    <option value="HoTen">Tên nhân viên</option>
                </select>
                <input type="text" name="inp" class="form-control">
                <input class="btn" type="Submit" value="Tìm kiếm">
                <input class="btn" type="Reset" value="Reset">
            </form>
        </div>
    </div>
</body>
</html>