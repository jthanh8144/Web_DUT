<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <style>
        :root {
            --color-blue: #0044ff;
            --color-red: #ff264a;
        }
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html {
            color: #333;
            font-size: 62.5%;
            font-family: 'Open Sans', sans-serif;
        }
        .main {
            background-color: rgb(252, 239, 239);
            min-height: 100vh;
            display: flex;
            justify-content: center;
        }
        .form {
            width: 360px;
            min-height: 100px;
            padding: 32px 24px;
            text-align: center;
            background: rgb(198, 253, 241);
            border-radius: 2px;
            margin: 24px;
            align-self: center;
            /* nằm giữa màn hình */
            box-shadow: 0 2px 5px 0 rgba(5, 0, 0, 0.1);
        }
        .form .heading {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .form-group {
            display: flex;
            margin-bottom: 16px;
            flex-direction: row;
            align-items: center;
            text-align: center;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .form-label {
            font-weight: 700;
            line-height: 35px;
            font-size: 1.4rem;
            width: 70px;
        }
        .form-control {
            height: 35px;
            padding: 8px 12px;
            border: 1px solid #b3b3b3;
            border-radius: 3px;
            outline: none;
            font-size: 1.4rem;
        }
        .form-control:focus,
        .form-control:hover {
            border-color: var(--color-blue);
        }
        .form-group.invalid .form-control {
            border-color: var(--color-red);
        }
        .form-group.invalid .form-message {
            color: var(--color-red);
            display: block;
        }
        .breaker {
            display: block;
            width: 100%;
            height: 0;
        }
        .form-message {
            display: none;
            font-size: 1.2rem;
            line-height: 1.6rem;
            padding: 4px 0 0;
            transform: translateX(10%);
        }
        .btn {
            outline: none;
            background-color: #41dfd7;
            padding: 10px 12px;
            font-weight: 600;
            color: #fff;
            border: none;
            font-size: 1.4rem;
            border-radius: 8px;
            cursor: pointer;
            min-width: 80px;
        }
        .btn+.btn {
            margin-left: 10px;
        }
        .btn:hover {
            background-color: #45ece4;
        }
    </style>
</head>

<body>
    <?php
        $type = $_REQUEST['type'];
        echo '
    <div class="main">
        <form action="XLLogin.php?type='.$type.'" method="POST" class="form" id="form-1">'
    ?>
            <h3 class="heading">Đăng nhập</h3>

            <div class="form-group">
                <label for="username" class="form-label">Tài khoản</label>
                <input type="text" id="username" name="username" class="form-control">
                <span class="form-message">Vui lòng nhập trường này</span>
                <p class=breaker></p>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control">
                <span class="form-message">Vui lòng nhập trường này</span>
                <p class=breaker></p>
            </div>

            <input class="btn" type="Submit" value="Đăng nhập">
            <input class="btn" type="Reset" value="Reset">
        </form>
    </div>

    <script>
        const inputs = document.querySelectorAll('.form-control');
        const form = document.querySelector('#form-1');

        function getParent(element, selector) {
            while (element.parentElement) {
                if (element.parentElement.matches(selector)) {
                    return element.parentElement;
                }
                element = element.parentElement;
            }
        }

        Array.from(inputs).forEach(input => {
            input.onblur = function() {
                if (!input.value) {
                    getParent(input, '.form-group').classList.add('invalid');
                } else {
                    getParent(input, '.form-group').classList.remove('invalid');
                }
            }
            input.oninput = function() {
                getParent(input, '.form-group').classList.remove('invalid');
            }
        });
    </script>
</body>

</html>