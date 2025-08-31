<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>华南农业大学 Taurus战队</title>
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
            height: 100vh;
            background: linear-gradient(rgba(10, 10, 15, 0.7), rgba(10, 10, 15, 0.9)), 
                        url('image/hero-bg.jpg') no-repeat center center/cover;
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
        
        /* 关于我们区域 */
        .about {
            background: #0f0f15;
        }
        
        .about-content {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
            padding-right: 20px;
        }
        
        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            transition: var(--transition);
        }
        
        .about-image:hover img {
            transform: scale(1.05);
        }
        
        /* 机器人展示区域 */
        .robots {
            background: #0a0a0f;
        }
        
        .robot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .robot-card {
            background: #14141f;
            border-radius: 10px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .robot-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .robot-image {
            height: 250px;
            overflow: hidden;
        }
        
        .robot-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .robot-card:hover .robot-image img {
            transform: scale(1.1);
        }
        
        .robot-info {
            padding: 20px;
        }
        
        .robot-info h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }
        
        .robot-spec {
            margin-top: 15px;
            padding: 8px 12px;
            background: rgba(0, 94, 184, 0.2);
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--secondary-color);
            display: inline-block;
        }
        
        /* 成果展示区域 */
        .achievements {
            background: linear-gradient(to right, #0f0f15, #0a0a0f);
        }
        
        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: center;
        }
        
        .achievement-item {
            padding: 30px;
            background: rgba(20, 20, 30, 0.5);
            border-radius: 10px;
            transition: var(--transition);
        }
        
        .achievement-item:hover {
            background: rgba(179, 27, 27, 0.1);
            transform: translateY(-5px);
        }
        
        .achievement-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .achievement-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* 新闻动态区域 */
        .news {
            background: #0f0f15;
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .news-card {
            background: #14141f;
            border-radius: 10px;
            overflow: hidden;
            transition: var(--transition);
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .news-image {
            height: 200px;
            overflow: hidden;
        }
        
        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .news-card:hover .news-image img {
            transform: scale(1.1);
        }
        
        .news-content {
            padding: 20px;
        }
        
        .news-date {
            color: var(--primary-color);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .news-content h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        
        /* 联系方式区域 */
        .contact {
            background: linear-gradient(to right, #0a0a0f, #0f0f15);
            text-align: center;
        }
        
        .contact-info {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .contact-info p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 20px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-5px);
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
            
            .about-text {
                padding-right: 0;
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
                    <a href="#">
                        <img src="image/team-logo.jpg" alt="华南农业大学 Taurus战队Logo">
                        <span class="logo-text">Taurus战队</span>
                    </a>
                </div>
                
                <ul class="nav-links">
                    <li><a href="#home">首页</a></li>
                    <li><a href="#about">关于我们</a></li>
                    <li><a href="#robots">机器人</a></li>
                    <li><a href="#achievements">成果展示</a></li>
                    <li><a href="#news">新闻动态</a></li>
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
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>华南农业大学<br>Taurus战队</h1>
                <p>创新、拼搏、协作 - 打造顶尖机器人竞技团队</p>
                <a href="#about" class="btn">了解更多</a>
            </div>
        </div>
    </section>

    <!-- 关于我们 -->
    <section id="about" class="section about">
        <div class="container">
            <div class="section-title">
                <h2>关于我们</h2>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <p>华南农业大学Taurus战队成立于2018年，是一支充满激情与创新的RoboMaster参赛队伍。我们由来自工程、计算机、设计等不同专业的学生组成，致力于研发最先进的机器人技术。</p>
                    <p>多年来，我们不断突破自我，在RoboMaster机甲大师赛中取得了优异成绩，包括<a href="https://m.thepaper.cn/newsDetail_forward_24344915" target="_blank">2023年全国殿军</a>和<a href="https://scau.edu.cn/_t104/2025/0521/c1300a409568/page.psp" target="_blank">2025年南部分区赛亚军</a>。团队注重技术创新与人才培养，为每位队员提供施展才华的舞台。</p>
                    <p>我们的使命是通过机器人技术推动科技创新，培养未来工程师，并在国际舞台上展示中国青年的智慧与创造力。</p>
                    <a href="joinus.php" class="btn">加入我们</a>
                </div>
                <div class="about-image">
                    <img src="image/team-photo.jpg" alt="华南农业大学Taurus战队全体成员照片">
                </div>
            </div>
        </div>
    </section>

    <!-- 机器人展示 -->
    <section id="robots" class="section robots">
        <div class="container">
            <div class="section-title">
                <h2>我们的机器人</h2>
            </div>
            <div class="robot-grid">
                <!-- 英雄机器人1号 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/hero-robot-1.jpg" alt="英雄机器人1号">
                    </div>
                    <div class="robot-info">
                        <h3>英雄机器人1号</h3>
                        <p>具备强大火力与机动性的主力机器人，拥有精准的射击系统和灵活的移动能力。采用摩擦轮或气动弹丸发射系统，能够发射42mm弹丸，对敌方基地造成重大威胁。</p>
                        <div class="robot-spec">编号: RM-HERO-001</div>
                    </div>
                </div>
                
                <!-- 工程机器人2号 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/engineer-robot-2.jpg" alt="工程机器人2号">
                    </div>
                    <div class="robot-info">
                        <h3>工程机器人2号</h3>
                        <p>负责战场支援与资源收集，具备多种功能模块，是中不可或缺的后勤保障。机械臂采用并联连杆取机构，能够快速搬运兑换矿石。</p>
                        <div class="robot-spec">编号: RM-ENG-002</div>
                    </div>
                </div>
                
                <!-- 步兵机器人3号 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/infantry-robot-3.jpg" alt="步兵机器人3号">
                    </div>
                    <div class="robot-info">
                        <h3>步兵机器人3号</h3>
                        <p>高速突击型步兵机器人，兼具火力与机动性。底盘采用串联连杆腿式结构，保障了强大的机动作战能力。辅以单枪管设计和小陀螺能力，能有效应对多种战场情况。发射17mm弹丸，是团队的中坚力量。</p>
                        <div class="robot-spec">编号: RM-INF-003</div>
                    </div>
                </div>
                
                <!-- 步兵机器人4号 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/infantry-robot-4.jpg" alt="步兵机器人4号">
                    </div>
                    <div class="robot-info">
                        <h3>步兵机器人4号</h3>
                        <p>高速突击型步兵机器人，专注于快速突破和机动战术。底盘同样采用串联连杆腿式结构，提供更出色的战场机动性。配备17mm口径发射器，具备区域压制能力。</p>
                        <div class="robot-spec">编号: RM-INF-004</div>
                    </div>
                </div>
                
                <!-- 空中机器人 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/aerial-robot.jpg" alt="空中机器人">
                    </div>
                    <div class="robot-info">
                        <h3>空中机器人</h3>
                        <p>具备垂直起降和空中侦察能力的无人机平台，可提供战场俯瞰视野和空中支援。配备稳定云台和图像传输系统，能够进行空中打击和情报收集。</p>
                        <div class="robot-spec">编号: RM-AIR-006</div>
                    </div>
                </div>
                <!-- 哨兵机器人 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/sentry-robot.jpg" alt="哨兵机器人">
                    </div>
                    <div class="robot-info">
                        <h3>哨兵机器人</h3>
                        <p>自主巡逻与防御的自动化机器人，配备先进的视觉识别系统和导航系统，能够自主决策和攻击，提供持续的火力支援和基地防御。</p>
                        <div class="robot-spec">编号: RM-SEN-007</div>
                    </div>
                </div>
                
                <!-- 雷达机器人 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/radar-robot.jpg" alt="雷达机器人">
                    </div>
                    <div class="robot-info">
                        <h3>雷达机器人</h3>
                        <p>配备先进传感系统和视觉系统的侦察单位，能够探测敌方位置并提供战场情报。具备扫描能力，为团队提供战术优势和信息支持。</p>
                        <div class="robot-spec">编号: RM-RDR-005</div>
                    </div>
                </div>
                
                <!-- 飞镖机器人 -->
                <div class="robot-card">
                    <div class="robot-image">
                        <img src="image/dart-robot.jpg" alt="飞镖机器人">
                    </div>
                    <div class="robot-info">
                        <h3>飞镖机器人</h3>
                        <p>专精于远程精确打击的机器人，配备飞镖发射装置。能够远程击打对方基地并对敌方战略造成干扰，具备改变战局的能力。</p>
                        <div class="robot-spec">编号: RM-DRT-008</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 成果展示 -->
    <section id="achievements" class="section achievements">
        <div class="container">
            <div class="section-title">
                <h2>成果展示</h2>
            </div>
            <div class="achievement-grid">
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="achievement-number">3</div>
                    <div class="achievement-text">全国奖项</div>
                </div>
                
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="achievement-number">8</div>
                    <div class="achievement-text">区域赛奖项</div>
                </div>
                
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="achievement-number">5</div>
                    <div class="achievement-text">联盟赛奖状</div>
                </div>
                
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="achievement-number">50+</div>
                    <div class="achievement-text">团队成员</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 新闻动态 -->
    <section id="news" class="section news">
        <div class="container">
            <div class="section-title">
                <h2>新闻动态</h2>
            </div>
            <div class="news-grid">
                <!-- 新闻1 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="image/news-2025-regional.jpg" alt="2025南部分区赛亚军">
                    </div>
                    <div class="news-content">
                        <div class="news-date">2025年5月21日</div>
                        <h3>荣获2025南部分区赛亚军</h3>
                        <p>Taurus战队在2025RoboMaster机甲大师超级对抗赛南部分区赛中表现出色，从32支参赛高校队伍中脱颖而出，最终斩获南部分区赛亚军，成功晋级全国总决赛。</p>
                        <a href="https://scau.edu.cn/_t104/2025/0521/c1300a409568/page.psp" class="btn" target="_blank">阅读更多</a>
                    </div>
                </div>
                
                <!-- 新闻2 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="image/news-2023-national.jpg" alt="2023全国殿军">
                    </div>
                    <div class="news-content">
                        <div class="news-date">2023年8月22日</div>
                        <h3>创造历史最佳战绩：全国殿军</h3>
                        <p>2023年全国大学生机器人大赛——机甲大师超级对抗赛·全国赛在深圳落下帷幕。经过与众多全国顶尖高校的角逐，华南农业大学"Taurus"战队拿下全国殿军，创造我校在该项赛事上的历史最佳战绩。</p>
                        <a href="https://m.thepaper.cn/newsDetail_forward_24344915" class="btn" target="_blank">阅读更多</a>
                    </div>
                </div>
                
                <!-- 新闻3 -->
                <div class="news-card">
                    <div class="news-image">
                        <img src="image/joinus-bg.jpg" alt="招新新闻">
                    </div>
                    <div class="news-content">
                        <div class="news-date">2025年9月21日</div>
                        <h3>2026赛季招新火热进行中</h3>
                        <p>新一年的招新已经开始！我们期待有激情、有才华的你加入Taurus战队，一起创造下一个辉煌。欢迎各位同学踊跃报名！</p>
                        <a href="joinus.php" class="btn">加入我们</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 联系我们 -->
    <section id="contact" class="section contact">
        <div class="container">
            <div class="section-title">
                <h2>联系我们</h2>
            </div>
            <div class="contact-info">
                <p>如果您对Taurus战队感兴趣，欢迎通过以下方式联系我们：</p>
                <p>邮箱：taurus@scau.edu.cn</p>
                <p>地址：华南农业大学工程学院机器人实验室</p>
                
                <div class="social-links">
                    <a href="image/recruitment-qr.jpg"><i class="fab fa-weixin"></i></a>
                    <a href="https://space.bilibili.com/1168989303?spm_id_from=333.337.search-card.all.click"><i class="fab fa-bilibili"></i></a>
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
                    <li><a href="#home">首页</a></li>
                    <li><a href="#about">关于我们</a></li>
                    <li><a href="#robots">机器人</a></li>
                    <li><a href="#achievements">成果展示</a></li>
                    <li><a href="#news">新闻动态</a></li>
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