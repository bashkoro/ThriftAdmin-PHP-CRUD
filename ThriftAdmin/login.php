<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { width: 300px; border: 1px solid #ddd; padding: 16px; border-radius: 8px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { width: 100%; padding: 8px; border: none; border-radius: 4px; background-color: #007bff; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <?php
    session_start(); // Start a new session or resume the existing one

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'thriftadmin';
    $message = '';

    $conn = new mysqli($host, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userCaptcha = $_POST['captcha'];

        // Validate the CAPTCHA
        if (isset($_SESSION['captcha']) && $_SESSION['captcha'] == $userCaptcha) {
            // CAPTCHA is correct, proceed with username and password validation
            $user = $conn->real_escape_string($_POST['username']);
            $pass = $conn->real_escape_string($_POST['password']);

            $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if ($pass === $row['password']) {
                    header("Location: barang.php");
                    exit();
                } else {
                    $message = "<p>Invalid username or password</p>";
                }
            } else {
                $message = "<p>Invalid username or password</p>";
            }
            $stmt->close();
        } else {
            $message = "<p>Invalid captcha!</p>";
        }
        // Regenerate CAPTCHA for the next request
        unset($_SESSION['captcha']);
    }

    // Generate and store CAPTCHA solution in session for new or subsequent requests
    if (!isset($_SESSION['captcha'])) {
        $num1 = rand(1, 10); // Generate random numbers
        $num2 = rand(1, 10);
        $_SESSION['captcha'] = $num1 + $num2; // Store the sum in session
        $_SESSION['captcha_question'] = "What is $num1 + $num2?"; // Store the question
    }

    $conn->close();
    ?>

    

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Login</h2>
        <?php echo $message; ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <div>
            <p><?php echo $_SESSION['captcha_question']; ?></p>
            <input type="text" name="captcha" placeholder="Answer" required>
        </div>
        <input type="submit" value="Login">
        <p>Belum ada akun? <a href="register.php">KLIK DISINI!!!</a></p>

    </form>
</body>
</html>