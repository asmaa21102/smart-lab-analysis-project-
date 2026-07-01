<?php
require_once 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Wrong username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ATL Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

<div class="auth-container">

    <div class="auth-left">
        <div class="brand">
            <img src="images/logo2.jpg" alt="ATL Logo">
            <div>
                <h1>ATL</h1>
                <p>Smart Lab Analysis</p>
            </div>
        </div>

        <h2>Your Health,<br><span>Our Priority</span></h2>
        <p class="desc">
            Smart medical analysis for your laboratory reports with a clear and professional dashboard.
        </p>

        <div class="feature-grid">
            <div class="feature"><i class="fas fa-heartbeat"></i><p>Health Insights</p></div>
            <div class="feature"><i class="fas fa-shield-alt"></i><p>Secure Data</p></div>
            <div class="feature"><i class="fas fa-flask"></i><p>Lab Analysis</p></div>
            <div class="feature"><i class="fas fa-chart-line"></i><p>Track History</p></div>
        </div>
    </div>

    <div class="auth-right">
        <div class="login-card">
            <div class="card-icon">
                <i class="fas fa-user-md"></i>
            </div>

            <h2>Welcome Back</h2>
            <p class="subtitle">Login to continue to ATL Smart Lab Analysis</p>

            <?php if ($error): ?>
                <div class="error-box"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="input-group">
                    <label>Username or Email</label>
                    <div class="input-box">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="username" placeholder="Enter username or email" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <div class="input-box">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <button class="login-btn" type="submit">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>

            <p class="register-link">
                Don't have an account?
                <a href="register.php">Create new account</a>
            </p>
        </div>
    </div>

</div>

</body>
</html>