<?php
/**
 * SETUP SCRIPT — setup.php
 * Run this ONCE from your browser: http://localhost/empowerzone-project/setup.php
 * It creates the database, the users table, and seeds the default admin account.
 * DELETE THIS FILE after running it.
 */

$host   = 'localhost';
$dbUser = 'root';
$dbPass = '';          // XAMPP default: empty
$dbName = 'empowerzone_db';

$messages = [];
$success  = true;

try {
    // 1. Connect without a database selected first
    $pdo = new PDO(
        "mysql:host={$host};charset=utf8mb4",
        $dbUser,
        $dbPass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // 2. Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}`
                CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $messages[] = ['ok', "Database <strong>{$dbName}</strong> created (or already exists)."];

    // 3. Select it
    $pdo->exec("USE `{$dbName}`");

    // 4. Create users table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id         INT UNSIGNED     NOT NULL AUTO_INCREMENT,
            full_name  VARCHAR(100)     NOT NULL,
            email      VARCHAR(150)     NOT NULL,
            password   VARCHAR(255)     NOT NULL,
            role       ENUM('user', 'admin') NOT NULL DEFAULT 'user',
            created_at TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY uq_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");

    // Ensure 'role' column exists if the table was already there
    $checkColumn = $pdo->query("SHOW COLUMNS FROM `users` LIKE 'role'");
    if (!$checkColumn->fetch()) {
        $pdo->exec("ALTER TABLE `users` ADD COLUMN `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user' AFTER `password` ");
        $messages[] = ['ok', 'Added <strong>role</strong> column to existing users table.'];
    }

    $messages[] = ['ok', 'Table <strong>users</strong> ready.'];

    // 5. Create inquiries table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS inquiries (
            id         INT UNSIGNED     NOT NULL AUTO_INCREMENT,
            full_name  VARCHAR(100)     NOT NULL,
            email      VARCHAR(150)     NOT NULL,
            phone      VARCHAR(20)      DEFAULT NULL,
            program    VARCHAR(50)      DEFAULT NULL,
            message    TEXT             NOT NULL,
            status     ENUM('New', 'In Progress', 'Resolved') NOT NULL DEFAULT 'New',
            created_at TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    $messages[] = ['ok', 'Table <strong>inquiries</strong> ready.'];

    // 6. Seed default admin account
    $adminEmail = 'admin@empowerzone.us';
    $adminPass  = password_hash('Admin@1234', PASSWORD_BCRYPT, ['cost' => 12]);
    $adminName  = 'Admin';

    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$adminEmail]);

    if ($check->fetch()) {
        $pdo->prepare("UPDATE users SET role = 'admin' WHERE email = ?")->execute([$adminEmail]);
        $messages[] = ['warn', "Default admin <strong>{$adminEmail}</strong> already exists — updated role to admin."];
    } else {
        $insert = $pdo->prepare(
            "INSERT INTO users (full_name, email, password, role) VALUES (?, ?, ?, 'admin')"
        );
        $insert->execute([$adminName, $adminEmail, $adminPass]);
        $messages[] = ['ok', "Default admin <strong>{$adminEmail}</strong> inserted successfully."];
    }

} catch (PDOException $e) {
    $success    = false;
    $messages[] = ['err', 'PDO Error: ' . htmlspecialchars($e->getMessage())];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Empower Zone — Database Setup</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Inter', sans-serif; background: #f0f4f4; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 24px; }
  .card { background: #fff; border-radius: 16px; padding: 40px 36px; max-width: 560px; width: 100%; box-shadow: 0 8px 32px rgba(44,125,133,.13); }
  h1 { font-size: 1.5rem; font-weight: 800; color: #1a2a2a; margin-bottom: 6px; }
  .sub { font-size: .9rem; color: #667777; margin-bottom: 28px; }
  .msg { display: flex; align-items: flex-start; gap: 12px; padding: 12px 16px; border-radius: 10px; font-size: .875rem; margin-bottom: 12px; font-weight: 500; }
  .msg.ok   { background: #f0fdf4; color: #166534; border: 1.5px solid #86efac; }
  .msg.warn { background: #fffbeb; color: #92400e; border: 1.5px solid #fcd34d; }
  .msg.err  { background: #fef2f2; color: #991b1b; border: 1.5px solid #fca5a5; }
  .icon { font-size: 1.1rem; flex-shrink: 0; margin-top: 1px; }
  .creds { background: #eaf6f7; border: 1.5px solid #3a9fa8; border-radius: 12px; padding: 20px 24px; margin-top: 24px; }
  .creds h3 { font-size: 1rem; font-weight: 700; color: #1a2a2a; margin-bottom: 12px; }
  .cred-row { display: flex; justify-content: space-between; font-size: .875rem; padding: 6px 0; border-bottom: 1px dashed #b2d8db; }
  .cred-row:last-child { border-bottom: none; }
  .cred-label { color: #4a6060; font-weight: 600; }
  .cred-val { font-family: monospace; color: #2c7d85; font-weight: 700; letter-spacing: .3px; }
  .warn-box { background: #fff7ed; border: 1.5px solid #fb923c; border-radius: 10px; padding: 14px 18px; margin-top: 20px; font-size: .8125rem; color: #9a3412; font-weight: 600; }
  a.btn { display: inline-block; margin-top: 24px; background: linear-gradient(135deg,#2c7d85,#3a9fa8); color: #fff; text-decoration: none; padding: 12px 28px; border-radius: 10px; font-weight: 700; font-size: .9rem; transition: filter .2s; }
  a.btn:hover { filter: brightness(1.1); }
</style>
</head>
<body>
<div class="card">
  <h1>🛠️ Empower Zone — Setup</h1>
  <p class="sub">One-time database installer. Results below:</p>

  <?php foreach ($messages as [$type, $text]): ?>
  <div class="msg <?php echo $type; ?>">
    <span class="icon"><?php echo $type === 'ok' ? '✅' : ($type === 'warn' ? '⚠️' : '❌'); ?></span>
    <span><?php echo $text; ?></span>
  </div>
  <?php endforeach; ?>

  <?php if ($success): ?>
  <div class="creds">
    <h3>🔐 Default Login Credentials</h3>
    <div class="cred-row"><span class="cred-label">Email</span><span class="cred-val">admin@empowerzone.us</span></div>
    <div class="cred-row"><span class="cred-label">Password</span><span class="cred-val">Admin@1234</span></div>
  </div>
  <div class="warn-box">⚠️ IMPORTANT: Delete this file (setup.php) after setup is complete for security!</div>
  <a class="btn" href="login.php">→ Go to Login Page</a>
  <?php endif; ?>
</div>
</body>
</html>
