<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>加入我们 - 华南农业大学RoboMaster Taurus战队</title>
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
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
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
        
        /* 英雄区域样式 */
        .hero {
            height: 60vh;
            background: linear-gradient(rgba(10, 10, 15, 0.7), rgba(10, 10, 15, 0.9)), 
                        url('image/joinus-bg.jpg') no-repeat center center/cover;
            /* 使用专门的加入我们背景图 */
            display: flex;
            align-items: center;
            text-align: center;
            padding-top: 80px;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* 加入我们内容区域 */
        .join-content {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 40px;
        }
        
        .join-left, .join-right {
            flex: 1;
            min-width: 300px;
            background: #14141f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .join-left {
            text-align: center;
        }
        
        .qrcode {
            margin: 20px 0;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
            display: inline-block;
            cursor: pointer;
            position: relative;
        }
        
        .qrcode img {
            width: 200px;
            height: 200px;
            transition: transform 0.3s ease;
        }
        
        .qrcode:hover img {
            transform: scale(1.05);
        }
        
        .qrcode::after {
            content: '双击放大';
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #666;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .qrcode:hover::after {
            opacity: 1;
        }
        
        .join-info {
            margin-top: 20px;
        }
        
        .join-info h3 {
            color: var(--secondary-color);
            margin-bottom: 15px;
        }
        
        .join-info ul {
            list-style: none;
            text-align: left;
        }
        
        .join-info li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        
        .join-info li::before {
            content: "•";
            color: var(--primary-color);
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .join-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .meme-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
            border: 5px solid var(--primary-color);
        }
        
        .meme-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .humor-text {
            font-style: italic;
            color: #aaa;
            margin: 20px 0;
            line-height: 1.8;
        }
        
        /* 模态框样式 */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modal.active {
            display: flex;
            opacity: 1;
        }
        
        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }
        
        .modal-content img {
            width: 100%;
            height: auto;
            max-height: 80vh;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
        }
        
        .close-btn {
            position: absolute;
            top: -40px;
            right: -10px;
            color: white;
            font-size: 36px;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        
        .close-btn:hover {
            color: var(--primary-color);
        }
        
        .instruction {
            text-align: center;
            color: white;
            margin-top: 15px;
            font-size: 16px;
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
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .qrcode::after {
                opacity: 1; /* 在移动端总是显示提示 */
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
                        <img src="image/team-logo.jpg" alt="华南农业大学RoboMaster Taurus战队Logo">
                        <span class="logo-text">Taurus战队</span>
                    </a>
                </div>
                
                <ul class="nav-links">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="index.php#about">关于我们</a></li>
                    <li><a href="index.php#robots">机器人</a></li>
                    <li><a href="index.php#achievements">成果展示</a></li>
                    <li><a href="index.php#news">新闻动态</a></li>
                    <li><a href="index.php#contact">联系我们</a></li>
                    <li><a href="joinus.php">加入我们</a></li>
                    <li><a href="forum.php">taurus论坛</a></li>
                </ul>
                
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- 英雄区域 -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>加入Taurus战队</h1>
                <p>与我们一起探索机器人技术的无限可能</p>
            </div>
        </div>
    </section>

    <!-- 加入我们内容 -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>成为我们的一员</h2>
            </div>
            
            <div class="join-content">
                <!-- 左侧：招新信息 -->
                <div class="join-left">
                    <h3>扫描二维码加入招新群</h3>
                    <div class="qrcode" id="qrcode-container">
                        <img src="image/recruitment-qr.jpg" alt="招新群二维码" id="qrcode-img">
                    </div>
                    <div class="join-info">
                        <h3>招新信息</h3>
                        <ul>
                            <li>招新对象：全校各专业本科生、研究生</li>
                            <li>招新时间：每年9月-10月</li>
                            <li>需求方向：机械设计、嵌入式开发、视觉算法、运营宣传</li>
                            <li>面试流程：简历筛选 → 技术面试 → 团队面试</li>
                        </ul>
                    </div>
                </div>
                
                <!-- 右侧：幽默内容 -->
                <div class="join-right">
                    <div class="meme-img">
                        <img src="image/meme.jpg" alt="熬夜写代码的表情包">
                    </div>
                    <h3>网站作者的小声嘀咕</h3>
                    <p class="humor-text">
                        "本来想写个酷炫的在线报名系统，<br>
                        结果拖延症发作，到现在还没写完...<br>
                        不如先加群，我保证今晚一定熬夜补代码！<br>
                        （咖啡已备好，键盘已就绪）"
                    </p>
                    <p class="humor-text">
                        温馨提示：上面的二维码是真的，<br>
                        赶紧扫码加入我们吧！<br>
                        等我写完报名系统一定第一时间通知大家~
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 模态框 -->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span class="close-btn" id="close-btn">&times;</span>
            <img id="modal-img" src="" alt="放大后的二维码">
            <div class="instruction">点击任意处关闭</div>
        </div>
    </div>

    <!-- 页脚 -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="image/team-logo-footer.jpg" alt="华南农业大学RoboMaster Taurus战队Logo">
                </div>
                
                <ul class="footer-links">
                    <li><a href="index.php">首页</a></li>
                    <li><a href="index.php#about">关于我们</a></li>
                    <li><a href="index.php#robots">机器人</a></li>
                    <li><a href="index.php#achievements">成果展示</a></li>
                    <li><a href="index.php#news">新闻动态</a></li>
                    <li><a href="index.php#contact">联系我们</a></li>
                    <li><a href="joinus.php">加入我们</a></li>
                    <li><a href="forum.php">taurus论坛</a></li>
                </ul>
                
                <div class="copyright">
                    <p>&copy; 2023-2025 华南农业大学RoboMaster Taurus战队 版权所有</p>
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
        
        // 二维码双击放大功能
        const qrcodeContainer = document.getElementById('qrcode-container');
        const qrcodeImg = document.getElementById('qrcode-img');
        const modal = document.getElementById('modal');
        const modalImg = document.getElementById('modal-img');
        const closeBtn = document.getElementById('close-btn');
        
        // 双击放大功能
        qrcodeContainer.addEventListener('dblclick', function() {
            modalImg.src = qrcodeImg.src;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // 防止背景滚动
        });
        
        // 关闭模态框
        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        // 关闭模态框函数
        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = ''; // 恢复背景滚动
        }
        
        // 添加键盘事件支持
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    </script>
</body>
</html>