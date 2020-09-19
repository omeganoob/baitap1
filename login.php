<?php
    session_start();
    session_unset();
    $err="";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST['username'] == 'admin') {
            if($_POST['password'] != '123') {
                $err="mật khẩu không đúng";
                session_unset();
            } else {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                header("location:home.php");
            }
        } else {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            header("location:home.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
                @import url('https://fonts.googleapis.com/css?family=Raleway&display=swap');
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
        }
        .box {
            display: flex;
            background-color: white;
            align-items: center;
            justify-content: center;
            background-color: #21D4FD;
            background-image: linear-gradient(19deg, #f1c40f 0%, #e74c3c 100%);
            height: 100vh;
        }
        .login-form {
            min-width: 250px;
            max-width: 400px;
            border-radius: 24px;
            padding: 15px;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .login-form h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-top: 35px;
        }
        .login-form input[type = "text"] {
            margin-top: 30px;
        }
        .login-form input[type = "password"] {
            margin-top: 10px;
        }
        input {
        outline: none;
        }
        .links {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }
        .links > a:first-of-type {
            margin-right: 5px;
        }
        .links > a {	
            background-color: #E0E0E0;
            border-radius: 24px;
            font-weight: 400;
            color: black;
            line-height: 12px;
            flex: 1;
            text-align: center;
            padding: 10px;
            text-decoration: none;
        font-family: 'Raleway';
            transition: 0.25s;
        }
        .links > a:hover {	
            opacity: 0.6;
        }
        .login-form input[type = "submit"] {
            background-color:  #E0E0E0;
            background-image: linear-gradient(19deg, #f1c40f 0%, #e74c3c 100%);
            width: 100%;
            color: white;
            border: none;
            margin-top: 35px;
            cursor: pointer;
            padding: 10px;
            font-family: 'Raleway', sans-seriff;
            font-size: 1.3rem;
            font-weight: bold;
            border-radius: 24px;
            transition: 0.25s;
        }
        .login-form input[type = "submit"]:hover {
            opacity: 0.8;
        }
        .login-form input[type = "text"]:focus, .login-form input[type = "password"]:focus {
            border: 2px #21D4FD solid;
        }
        .login-form input[type = "text"], .login-form input[type = "password"] {
            width: 100%;
            border: none;
            border-radius: 24px;
            font-size: 1rem;
            font-family: 'Raleway', sans-seriff;
            background-color: gainsboro;
            padding: 15px;
        } 
    </style>
</head>
<body>
	<div class="box">
		<form action="" method="POST" class="login-form">
			<h1>Đăng nhập</h1>
			<input type="text" name="username" placeholder="Tên" required>
			<input type="password" name="password" placeholder="Mật khẩu" required>
            <input type="submit" name="Login" value="Đăng nhập">
            <p class="text-danger"><?php echo $err ?></p>
			<div class="links">
				<a href="signup.php">Đăng ký</a>
			</div>
			</button>
		</form>
		
	</div>
</body>
</html>