<?php
require_once 'db.php';

try {
    $username = 'admin';
    $email = 'admin@atl.com';
    $password = '123456';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashedPassword]);

    echo "User created successfully! Username: admin | Password: 123456\n";
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "User already exists. Username: admin | Password: 123456\n";
    } else {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
?>
