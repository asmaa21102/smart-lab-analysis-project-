<?php
require_once 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Fill all fields";
    } else {
        $check = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check->execute([$username, $email]);

        if ($check->fetch()) {
            $error = "Username or email already exists";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            $success = "Account created successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>

    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        
        <div class="auth-form">

            <div class="logo-box">
                <img src="images/logo2.jpg">
                <div>
                    <h2>ATL</h2>
                    <p>Smart Lab Analysis</p>
                </div>
            </div>

            <h1>Create Account</h1>
            <p class="subtitle">Join the smart medical platform</p>

            <?php if ($error): ?>
                <div class="error-box"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="success-box"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit">Create Account</button>

            </form>

            <p class="switch-link">
                Already have account?
                <a href="login.php">Login</a>
            </p>

        </div>

       
        <div class="auth-image">

            <div class="floating f1"><i class="fas fa-heartbeat"></i></div>
            <div class="floating f2"><i class="fas fa-vial"></i></div>
            <div class="floating f3"><i class="fas fa-notes-medical"></i></div>

            <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png">

            <h2>Smart Health Starts Here</h2>
            <p>Analyze your reports and track your health easily</p>

        </div>

    </div>

</div>

</body>
</html>