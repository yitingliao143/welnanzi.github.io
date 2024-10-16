<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店家介紹</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar {
            width: 30%;
            position: sticky;
            top: 0;
            align-self: flex-start;
        }
        .content {
            width: 65%;
        }
        h1, h2, h3 {
            color: #333;
        }
        .section {
            margin-bottom: 20px;
        }
        .comments {
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .comment {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
        }
        .comment p {
            margin: 5px 0;
        }
        .form-section {
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form input, form textarea {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 10px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #218838;
        }
        .comment-actions button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
            border-radius: 4px;
        }
        .comment-actions button:hover {
            background-color: #0056b3;
        }
        .comment-actions .delete {
            background-color: #dc3545;
        }
        .comment-actions .delete:hover {
            background-color: #c82333;
        }
        .editable {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h1>店家介紹</h1>
		<h2>關於我們</h2>
        <div class="section" id="introduction" contenteditable="true" class="editable">
            <p>歡迎來到我們的店！我們專注於提供高品質的產品和卓越的客戶服務。無論你是來購物還是尋求建議，我們的團隊都會竭誠為你服務。</p>
        </div>
        <button onclick="location.href='main.php'">回到首頁</button>
    </div>

    <div class="content">
		<h2>公告欄</h2>
        <div class="section" id="bulletin-board" contenteditable="true" class="editable">
            <ul>
                <li>新產品上市！快來看看我們的新到貨品。</li>
                <li>本月特價促銷，所有商品享受20%折扣。</li>
                <li>營業時間更新：週一至週五 9:00 AM - 8:00 PM，週末 10:00 AM - 6:00 PM。</li>
            </ul>
        </div>

        <div class="section" id="reviews">
            <h2>顧客評論</h2>
            <div class="comments" id="comment-list">
                
            </div>
        </div>

        <div class="section form-section">
            <h2>新增評論</h2>
            <form id="comment-form">
                <input type="text" id="name" name="name" placeholder="你的名字" required>
                <input type="number" id="rating" name="rating" placeholder="評分（1-5）" min="1" max="5" required>
                <textarea id="comment" name="comment" rows="4" placeholder="你的評論" required></textarea>
                <button type="submit">提交評論</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('comment-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const rating = document.getElementById('rating').value;
        const comment = document.getElementById('comment').value;

        const commentSection = document.getElementById('comment-list');

        const newComment = document.createElement('div');
        newComment.classList.add('comment');

        const commentContent = document.createElement('div');

        const commentHeader = document.createElement('h3');
        commentHeader.textContent = name;
        commentContent.appendChild(commentHeader);

        const commentRating = document.createElement('p');
        commentRating.textContent = '評分: ' + '★'.repeat(rating) + '☆'.repeat(5 - rating);
        commentContent.appendChild(commentRating);

        const commentText = document.createElement('p');
        commentText.textContent = comment;
        commentContent.appendChild(commentText);

        newComment.appendChild(commentContent);

        const commentActions = document.createElement('div');
        commentActions.classList.add('comment-actions');

        const editButton = document.createElement('button');
        editButton.classList.add('edit');
        editButton.textContent = '編輯';
        editButton.addEventListener('click', function() {
            const newName = prompt('修改名字:', name);
            const newRating = prompt('修改評分 (1-5):', rating);
            const newCommentText = prompt('修改評論:', comment);
            if (newName && newRating && newCommentText) {
                commentHeader.textContent = newName;
                commentRating.textContent = '評分: ' + '★'.repeat(newRating) + '☆'.repeat(5 - newRating);
                commentText.textContent = newCommentText;
            }
        });

        const deleteButton = document.createElement('button');
        deleteButton.classList.add('delete');
        deleteButton.textContent = '刪除';
        deleteButton.addEventListener('click', function() {
            commentSection.removeChild(newComment);
        });

        commentActions.appendChild(editButton);
        commentActions.appendChild(deleteButton);
        newComment.appendChild(commentActions);

        commentSection.appendChild(newComment);

        document.getElementById('comment-form').reset();
    });
</script>

</body>
</html>
