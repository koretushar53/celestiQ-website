<?php
$conn = mysqli_connect("localhost", "root", "", "og");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// Match the name attribute of your submit button ("register")
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password'];

   
    if ($password !== $cpassword) {
        $message = "Passwords do not match!";
    } else {
       
       

        
        $stmt = $conn->prepare("INSERT INTO emaildata (name, email, password,confim_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $cpassword); 

        if ($stmt->execute()) {
            $message = "Data inserted successfully";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>celestiQ Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    :root {
        --primary-color: #47037e;
        --accent-color: #6a11cb;
        --glass-bg: rgba(255, 255, 255, 0.15);
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background: linear-gradient(135deg, #1a0a2e 0%, #47037e 100%);
        /* If you have a background image, uncomment the next line */
        /* background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('images/bg.jpg') center/cover; */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        width: 100%;
        max-width: 400px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    h2 {
        color: white;
        margin-bottom: 25px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .input-group input {
        width: 100%;
        padding: 10px 20px;
        border-radius: 20px;
        border: none;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .input-group {
        margin-bottom: 30px;
        text-align: left;
    }

    .input-group label {
        display: block;
        color: white;
        margin-bottom: 5px;
        width: 100%;
        padding: 14px 20px;
        margin-bottom: 15px;
        background: rgba(255, 255, 255, 0.9); /* Bright background for text contrast */
        border: 2px solid transparent;
        outline: none;
        border-radius: 12px;
        color: #333; /* Dark text for readability */
        box-sizing: border-box;
        transition: all 0.3s ease;
        font-size: 15px;
    }

    input:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 8px rgba(106, 17, 203, 0.4);
    }

    input::placeholder {
        color: #888;
    }

    input[type="submit"] {
        width: 300%;
        padding: 14px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(to right, #6a11cb, #2575fc);
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        margin-top: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    input[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        filter: brightness(1.1);
    }

    .login-link {
        display: block;
        margin-top: 20px;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 13px;
    }

    .login-link:hover {
        color: white;
        text-decoration: underline;
    }
</style>

<body>
    <div class="form-container">
        <form action="register.php" method="post">
            <h2>Create Account</h2>

            <?php if($message != ""): ?>
                
            <?php endif; ?>

            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            
            <input type="submit" name="register" value="Sign Up">
            
            <a href="login.php" class="login-link">Already have an account? Login here</a>
        </form>
    </div>
</body>