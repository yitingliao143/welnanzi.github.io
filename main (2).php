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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歡迎成為楠梓人</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>歡迎成為楠梓人</h1>
    </header>
    <div class="container">
        <div class="left-panel">
            <div class="news-section">
                <h2>即時新聞</h2>
                <p>這裡顯示即時新聞內容...</p>
            </div>
            <div class="map-section" id="TGMap">
                <h2>地圖</h2>
                <p>這裡可以放地圖...</p>
            </div>
        </div>
        <div class="right-panel">
            <div class="search-container">
                <form method="GET" action="store.php">
                    <input type="search" name="search" placeholder="請輸入搜尋名稱" required>
                    <button type="submit">搜尋</button>
                </form>
            </div>
            <ul class="floating-buttons">
                <li class="dropdown">
                    <button class="floating-button">分類</button>
                    <div class="dropdown-content">
                        <a href="#">美食</a>
                        <a href="#">生活</a>
                        <a href="#">遊樂</a>
                        <a href="#">穿搭</a>
                        <a href="#">交通</a>
                    </div>
                </li>
                <li class="floating-button"><a href="add_data.php">新增店家</a></li>
                <li class="floating-button"><a href="store.php">店家總覽</a></li>
                <li class="dropdown">
                    <button class="floating-button">語言</button>
                    <div class="dropdown-content">
                        <a href="#">中文</a>
                        <a href="#">英文</a>
                        <a href="#">其他</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>

