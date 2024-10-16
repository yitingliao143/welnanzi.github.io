<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <img src="images/logo.jpg" alt="歡迎成為楠梓人"> <!-- 在這裡插入圖片 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歡迎成為楠梓人</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
	<style>
	.container {
		background-color: #f0f0f0;
		padding: 40px; /* 改為均勻內邊距，減少多餘的左右空間 */
		max-width: 800px; /* 增加寬度讓選項有更多的橫排空間 */
		margin: 100px auto;
		border-radius: 30px; /* 稍微減少圓角，保持優雅 */
		color: black;
	}
	h2 {
		text-align: center;
		margin-bottom: 20px;
	}
	.options {
		text-align: left; /* 保持選項左對齊 */
		display: flex;
		flex-wrap: wrap; /* 增加換行支援 */
		gap: 10px; /* 增加選項之間的間距 */
		justify-content: space-between; /* 調整選項之間的分佈 */
	}

    .option-group label {
		display: inline-block; /* 設置子元素為 inline-block */
		margin-right: 20px; /* 控制每個元素之間的水平間距 */
        vertical-align: top; /* 使元素頂部對齊 */
    }
	.option-group {
		width: 100%; /* 每個選項組占滿寬度 */
		margin-bottom: 20px;
	}
	
	
	.submit-btn {
		display: block;
		width: 200px; /* 固定按鈕寬度 */
		margin: 0 auto; /* 居中顯示 */
		background-color: #FF7F50;
		color: white;
		border: none;
		padding: 10px;
		border-radius: 5px;
		font-size: 16px;
		cursor: pointer;
	}
	.submit-btn:hover {
		background-color: #FF6347;
	}
    .floating-button 
    {
        width: 60px; /* 按鈕的寬度 */
        height: 60px; /* 按鈕的高度 */
        background-color: #007BFF; /* 按鈕背景顏色 */
        color: white; /* 字體顏色 */
        border: none;
        border-radius: 50%; /* 使按鈕圓形 */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* 陰影效果 */
        position: fixed; /* 固定位置 */
        bottom: 20px; /* 距離底部的距離 */
        right: 20px; /* 距離右側的距離 */
        display: flex; /* 使內容居中 */
        justify-content: center; /* 使內容水平居中 */
        align-items: center; /* 使內容垂直居中 */
        cursor: pointer; /* 游標效果 */
        transition: background-color 0.3s, transform 0.3s; /* 過渡效果 */
    }

    .floating-button:hover 
    {
        background-color: #0056b3; /* 懸停時的顏色 */
        transform: scale(1.1); /* 懸停時的放大效果 */
    }
	</style>
    <script>
        function switchLanguage(language) {
            const translations = {
                zh: {
                    title: '歡迎成為楠梓人',
                    queryPlaceholder: '搜尋...',
                    searchButton: '搜尋',
                    categories: '分類',
                    food: '美食',
                    life: '生活',
                    fun: '遊樂',
                    fashion: '穿搭',
                    transport: '交通',
                    addStore: '新增店家',
                    storeOverview: '店家總覽',
                    language: '語言',
                    chinese: '中文',
                    english: '英語',
                    login: '登錄'
                },
                en: {
                    title: 'Welcome to Nanzih',
                    queryPlaceholder: 'Search...',
                    searchButton: 'Search',
                    categories: 'Categories',
                    food: 'Food',
                    life: 'Life',
                    fun: 'Fun',
                    fashion: 'Fashion',
                    transport: 'Transport',
                    addStore: 'Add Store',
                    storeOverview: 'Store Overview',
                    language: 'Language',
                    chinese: 'Chinese',
                    english: 'English',
                    login: 'Login'
                }
            };

            const selectedLanguage = translations[language];

            document.querySelector('.logo h1 a').textContent = selectedLanguage.title;
            document.querySelector('.search-container input').placeholder = selectedLanguage.queryPlaceholder;
            document.querySelector('.search-container button').textContent = selectedLanguage.searchButton;
            document.querySelector('.dropbtn-categories').textContent = selectedLanguage.categories;
            document.querySelector('.dropbtn-language').textContent = selectedLanguage.language;

            const dropdownContentCategories = document.querySelector('.dropdown-content-categories');
            dropdownContentCategories.children[0].textContent = selectedLanguage.food;
            dropdownContentCategories.children[1].textContent = selectedLanguage.life;
            dropdownContentCategories.children[2].textContent = selectedLanguage.fun;
            dropdownContentCategories.children[3].textContent = selectedLanguage.fashion;
            dropdownContentCategories.children[4].textContent = selectedLanguage.transport;

            const dropdownContentLanguage = document.querySelector('.dropdown-content-language');
            dropdownContentLanguage.children[0].textContent = selectedLanguage.chinese;
            dropdownContentLanguage.children[1].textContent = selectedLanguage.english;

            document.querySelector('.button-container-add-store a').textContent = selectedLanguage.addStore;
            document.querySelector('.button-container-store-overview a').textContent = selectedLanguage.storeOverview;
            document.querySelector('nav ul li a[href="index.php"]').textContent = selectedLanguage.login;
        }

        // JavaScript to handle dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                const button = dropdown.querySelector('.dropbtn');
                const content = dropdown.querySelector('.dropdown-content');

                button.addEventListener('click', function(event) {
                    event.stopPropagation();
                    content.classList.toggle('show');
                });

                document.addEventListener('click', function() {
                    if (content.classList.contains('show')) {
                        content.classList.remove('show');
                    }
                });

                content.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });
        });
    </script>
</head>	

<body>


    <header>
        <nav>
            <div class="left-container">
                <div class="search-container">
					<form method="GET" action="store.php">
						<input type="search" name="search" placeholder="請輸入搜尋名稱" required>
						<button type="submit">搜尋</button>
					</form>
				</div>

            </div>
            <div class="logo">
                <h1><a href="main.php">歡迎成為楠梓人</a></h1>
            </div>
            <div class="right-container">
                <ul>
                    <li class="dropdown">
                        <button class="floating-button">分類</button>
                        <div class="dropdown-content dropdown-content-categories">
                            <a href="#">美食</a>
                            <a href="#">生活</a>
                            <a href="#">遊樂</a>
                            <a href="#">穿搭</a>
                            <a href="#">交通</a>
                        </div>
                    </li>
                    <li class="button-container button-container-add-store">
                        <a href="#" onclick="location.href='add_data.php'">新增店家</a>
                    </li>
                    <li class="button-container button-container-store-overview">
                        <a href="#" onclick="location.href='store.php'">店家總覽</a>
                    </li>
                    <li class="dropdown">
                        <button class="floating-button">語言</button>
                        <div class="dropdown-content dropdown-content-language">
                            <button onclick="switchLanguage('zh')">中文</button>
                            <button onclick="switchLanguage('en')">English</button>
                        </div>
                    </li>
                    <li>
                        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                        <form action="logout.php" method="post" class="floating-button" style="display:inline;">
                        <button type="submit" style="background: none; border: none; color: white;">登出</button>
                        </form>
                        <?php else: ?>
                        <a href="index.php" class="floating-button">登入
                        </a>
                        <?php endif; ?>
					</li>
                </ul>
            </div>
        </nav>
    </header><br>
    <h2>
	<p>歡迎來到本網站，此網站將介紹關於楠梓地區的店家，希望可以讓大家生活更便利。</p>
	</h2>
	<div class="container">
        <h2>今天想找什麼?</h2>
        <form>
            <div class="options">
                <div class="option-group">
                    <label>選擇地區：</label>
                    <input type="checkbox" id="school" name="location" value="north">
                    <label for="north">後勁</label>
                    <input type="checkbox" id="bcak" name="location" value="south">
                    <label for="south">後昌</label>
                    <input type="checkbox" id="right" name="location" value="central">
                    <label for="central">右昌</label>
					<input type="checkbox" id="first" name="location" value="central">
                    <label for="central">土庫</label>
                    <input type="checkbox" id="trainstation" name="location" value="east">
                    <label for="east">楠梓火車站</label><br>
                </div><br>
                <div class="option-group">
                    <label>選擇種類：</label>
                    <input type="checkbox" id="chinese" name="tea" value="black">
                    <label for="black">食物</label>
                    <input type="checkbox" id="west" name="tea" value="green">
                    <label for="green">購物</label>
					<input type="checkbox" id="west" name="tea" value="green">
                    <label for="green">醫療</label>
					<input type="checkbox" id="west" name="tea" value="green">
                    <label for="green">超商</label>
					<input type="checkbox" id="west" name="tea" value="green">
                    <label for="green">娛樂</label><br>
                    
                </div><br>
                <div class="option-group">
                    <label>特殊需求：</label>
                    <input type="checkbox" id="urban" name="feature" value="urban">
                    <label for="urban">寵物友善</label>
                    <input type="checkbox" id="mountain" name="feature" value="mountain">
                    <label for="mountain">素食</label>
                    <input type="checkbox" id="culture" name="feature" value="culture">
                    <label for="culture">可行動支付</label><br>
                </div><br>
                <div class="option-group">
                    <label>選擇活動：</label>
                    <input type="checkbox" id="tasting" name="activity" value="tasting">
                    <label for="tasting">茶葉品茗</label>
                    <input type="checkbox" id="dining" name="activity" value="dining">
                    <label for="dining">正餐飲食</label>
                    <input type="checkbox" id="experience" name="activity" value="experience">
                    <label for="experience">體驗活動</label><br>
                </div><br>
            </div>
            <button type="submit" class="submit-btn">搜尋最佳景點</button>
        </form>
    </div>
	
	<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
		<img src="nanzi.jpg" width="600px" height="400px"
			 alt="楠梓區的地圖，共分成：楠梓火車站、後勁、後昌、右昌、藍田、土庫"
			 title="楠梓行政區">
	</div>


</body>
</html>
