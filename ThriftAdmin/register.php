<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* [reuse the same style as in your login page] */
    </style>
</head>
<body>
    <?php
    $registrationSuccess = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbName = 'thriftadmin';

        $conn = new mysqli($host, $username, $password, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $conn->real_escape_string($_POST['name']);
        $user = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['password']);

        $stmt = $conn->prepare("INSERT INTO admin (nama, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $user, $email, $pass);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            $registrationSuccess = true;
        } else {
            echo "<p>Error: Unable to register.</p>";
        }
        $stmt->close();
        $conn->close();
    }

    if ($registrationSuccess) {
        echo "<p>Registration successful!</p>";
        echo '<p><a href="login.php"><button>Kembali ke laman login</button></a></p>';
    } else {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <?php
    }
    ?>
</body>
</html>
