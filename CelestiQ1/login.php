<?php
session_start(); // Start session to keep user logged in
$conn = mysqli_connect("localhost", "root", "", "og");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = ""; // Initialize error variable

if (isset($_POST['submit'])) {
    // 1. Use mysqli_real_escape_string to prevent basic SQL Injection
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // 2. Select the user by name
    $select = "SELECT * FROM `emaildata` WHERE `name`='$name'";
    $query = mysqli_query($conn, $select);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        
       
        if ($password===$row['password']) {
            $_SESSION['user'] = $row['name'];
            header("Location: services.php");
            exit(); 
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No user found with that name";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>celestiQ Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        :root {
            --primary-color: #47037e;
            --accent-color: #6a11cb;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('images/bg.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: rgba(160, 94, 236, 1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(255, 255, 255, 0.3);
            width: 350px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        h2 {
            color: white;
            margin-bottom: 30px;
            font-weight: 300;
            letter-spacing: 2px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 15px;
            color: rgba(191, 151, 224, 1);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 12px 12px 45px;
            background: rgba(255, 252, 252, 1);
            border: none;
            outline: none;
            border-radius: 25px;
            color: white;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input::placeholder { color: #dccae4ff; }

     

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: var(--primary-color);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #5a04a1;
            transform: translateY(-2px);
        }

        .register-link {
            display: inline-block;
            margin-top: 20px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            opacity: 0.8;
        }

        .register-link:hover { opacity: 1; text-decoration: underline; }

        .error-msg {
            color: #ff4d4d;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>celestiQ</h2>
    
    <?php if(isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST" action="">
        <div class="input-group">
            <i class="fa fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
        </div>
        
        <div class="input-group">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <input type="submit" name="submit" value="LOGIN">
    </form>

    <a href="register.php" class="register-link">Don't have an account? Register</a>
</div>

</body>
</html>