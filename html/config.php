<?php
// 数据库配置
define('DB_HOST', 'localhost');
define('DB_NAME', 'taurus_forum');
define('DB_USER', 'root');
define('DB_PASS', '123'); // 使用正确的密码

// 创建数据库连接
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8mb4");
} catch(PDOException $e) {
    die("数据库连接失败: " . $e->getMessage());
}

// 启动会话
session_start();
?>
