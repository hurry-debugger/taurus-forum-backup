<?php
require_once 'config.php';

// 处理用户注册
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        $_SESSION['message'] = "注册成功，请登录";
        header("Location: forum.php");
        exit();
    } catch(PDOException $e) {
        $error = "注册失败: " . $e->getMessage();
    }
}

// 处理用户登录
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['avatar'] = $user['avatar'];
            
            // 更新最后登录时间
            $stmt = $pdo->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            $stmt->execute([$user['id']]);
            
            header("Location: forum.php");
            exit();
        } else {
            $error = "用户名或密码错误";
        }
    } catch(PDOException $e) {
        $error = "登录失败: " . $e->getMessage();
    }
}

// 处理用户退出
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: forum.php");
    exit();
}

// 处理发帖
if (isset($_POST['create_post']) && isset($_SESSION['user_id'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = $_SESSION['user_id'];
    
    if (!empty($title) && !empty($content)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
            $stmt->execute([$user_id, $title, $content]);
            header("Location: forum.php");
            exit();
        } catch(PDOException $e) {
            $error = "发帖失败: " . $e->getMessage();
        }
    } else {
        $error = "标题和内容不能为空";
    }
}

// 获取所有帖子
try {
    $stmt = $pdo->prepare("
        SELECT p.*, u.username, u.avatar 
        FROM posts p 
        JOIN users u ON p.user_id = u.id 
        ORDER BY p.created_at DESC
    ");
    $stmt->execute();
    $posts = $stmt->fetchAll();
} catch(PDOException $e) {
    $error = "获取帖子失败: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taurus论坛 - 华南农业大学RoboMaster Taurus战队</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* 基础样式设置 */
        :root {
            --primary-color: #b31b1b; /* 主色调-华南农大红色 */
            --secondary-color: #005eb8; /* 辅助色-RoboMaster蓝色 */
            --dark-color: #1a1a1a;
            --light-color: #f4f4f4;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Microsoft YaHei', sans-serif;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            background-color: #0a0a0f;
            color: #fff;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            display: inline-block;
            position: relative;
        }
        
        .section-title h2::after {
            display: none;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--primary-color);
            color: #fff;
            border-radius: 30px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #fff;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        /* 导航栏样式 */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(10, 10, 15, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 0;
            transition: var(--transition);
        }
        
        header.scrolled {
            padding: 10px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
        }
        
        .logo-text {
            margin-left: 10px;
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 30px;
            position: relative;
        }
        
        .nav-links a {
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* 论坛特定样式 */
        .forum-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 40px;
        }
        
        .auth-forms, .post-form, .posts-list {
            flex: 1;
            min-width: 300px;
            background: #14141f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--secondary-color);
        }
        
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            background: #0a0a0f;
            border: 1px solid #333;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .post {
            background: #0a0a0f;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .post-user {
            margin-left: 15px;
        }
        
        .post-username {
            font-weight: bold;
            color: var(--secondary-color);
        }
        
        .post-date {
            font-size: 0.8rem;
            color: #888;
        }
        
        .post-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #fff;
        }
        
        .post-content {
            line-height: 1.6;
            color: #ccc;
        }
        
        .message {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .message.success {
            background: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 255, 0, 0.3);
        }
        
        .message.error {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
        }
        
        /* 页脚区域 */
        footer {
            background: #08080c;
            padding: 40px 0 20px;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-logo {
            margin-bottom: 20px;
        }
        
        .footer-logo img {
            height: 60px;
        }
        
        .footer-links {
            display: flex;
            list-style: none;
            margin-bottom: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .footer-links li {
            margin: 0 15px;
        }
        
        .footer-links a {
            color: #ccc;
            transition: var(--transition);
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
        }
        
        .copyright {
            margin-top: 20px;
            color: #666;
            font-size: 0.9rem;
        }
        
        /* 响应式设计 */
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: #0a0a0f;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: var(--transition);
            }
            
            .nav-links.active {
                left: 0;
            }
            
            .nav-links li {
                margin: 15px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- 导航栏 -->
    <header id="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="image/team-logo.jpg" alt="华南农业大学 Taurus战队Logo">
                        <span class="logo-text">Taurus战队</span>
                    </a>
                </div>
                
                <ul class="nav-links">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="index.php#about">关于我们</a></li>
                    <li><a href="index.php#robots">机器人</a></li>
                    <li><a href="index.php#achievements">成果展示</a></li>
                    <li><a href="index.php#news">新闻动态</a></li>
                    <li><a href="joinus.php">加入我们</a></li>
                    <li><a href="forum.php">taurus论坛</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="forum.php?logout=1">退出</a></li>
                    <?php endif; ?>
                </ul>
                
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- 论坛内容区域 -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Taurus论坛</h2>
                <p>分享你的想法、经验和问题</p>
            </div>
            
            <!-- 显示消息 -->
            <?php if(isset($_SESSION['message'])): ?>
                <div class="message success">
                    <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($error)): ?>
                <div class="message error">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <div class="forum-container">
                <?php if(!isset($_SESSION['user_id'])): ?>
                    <!-- 登录/注册表单 -->
                    <div class="auth-forms">
                        <h3>登录</h3>
                        <form method="POST" action="forum.php">
                            <div class="form-group">
                                <label for="login-username">用户名</label>
                                <input type="text" id="login-username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="login-password">密码</label>
                                <input type="password" id="login-password" name="password" required>
                            </div>
                            <button type="submit" name="login" class="btn">登录</button>
                        </form>
                        
                        <hr style="margin: 30px 0; border-color: #333;">
                        
                        <h3>注册</h3>
                        <form method="POST" action="forum.php">
                            <div class="form-group">
                                <label for="reg-username">用户名</label>
                                <input type="text" id="reg-username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="reg-email">邮箱</label>
                                <input type="email" id="reg-email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="reg-password">密码</label>
                                <input type="password" id="reg-password" name="password" required>
                            </div>
                            <button type="submit" name="register" class="btn">注册</button>
                        </form>
                    </div>
                <?php else: ?>
                    <!-- 用户信息和发帖表单 -->
                    <div class="post-form">
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="image/<?php echo $_SESSION['avatar']; ?>" alt="用户头像">
                            </div>
                            <div>
                                <h3><?php echo $_SESSION['username']; ?></h3>
                                <p>欢迎回来！</p>
                            </div>
                        </div>
                        
                        <form method="POST" action="forum.php">
                            <div class="form-group">
                                <label for="post-title">标题</label>
                                <input type="text" id="post-title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="post-content">内容</label>
                                <textarea id="post-content" name="content" required></textarea>
                            </div>
                            <button type="submit" name="create_post" class="btn">发布</button>
                        </form>
                    </div>
                <?php endif; ?>
                
                <!-- 帖子列表 -->
                <div class="posts-list">
                    <h3>最新帖子</h3>
                    
                    <?php if(empty($posts)): ?>
                        <p>暂无帖子，成为第一个发帖的人吧！</p>
                    <?php else: ?>
                        <?php foreach($posts as $post): ?>
                            <div class="post">
                                <div class="post-header">
                                    <div class="user-avatar">
                                        <img src="image/<?php echo $post['avatar']; ?>" alt="用户头像">
                                    </div>
                                    <div class="post-user">
                                        <div class="post-username"><?php echo htmlspecialchars($post['username']); ?></div>
                                        <div class="post-date"><?php echo date('Y-m-d H:i', strtotime($post['created_at'])); ?></div>
                                    </div>
                                </div>
                                <h4 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h4>
                                <div class="post-content"><?php echo nl2br(htmlspecialchars($post['content'])); ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 页脚 -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="image/team-logo-footer.jpg" alt="华南农业大学 Taurus战队Logo">
                </div>
                
                <ul class="footer-links">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="index.php#about">关于我们</a></li>
                    <li><a href="index.php#robots">机器人</a></li>
                    <li><a href="index.php#achievements">成果展示</a></li>
                    <li><a href="index.php#news">新闻动态</a></li>
                    <li><a href="joinus.php">加入我们</a></li>
                    <li><a href="forum.php">taurus论坛</a></li>
                </ul>
                
                <div class="copyright">
                    <p>&copy; 2023-2025 华南农业大学 Taurus战队 版权所有</p>
                    <p>&copy; 作者：点灯大师</p>
                    <p>网站由树莓派5驱动 | <a href="http://taurus.free.idcfengye.com/">http://taurus.free.idcfengye.com/</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // 导航栏滚动效果
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // 移动端菜单切换
        const menuToggle = document.querySelector('.menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        }
        
        // 关闭移动端菜单当点击链接
        const navItems = document.querySelectorAll('.nav-links a');
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                navLinks.classList.remove('active');
            });
        });
    </script>
</body>
</html>