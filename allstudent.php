<?php
session_start();
require 'connexion.php';

// Ensure only proof (professor) can access this page
// Ensure only professors can access this page
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'professor') {
    die("Access denied.");
}


// Fetch all students from the database
$stmt = $connexion->prepare("SELECT username FROM classe1 WHERE role=:student"); // that to not select the proof as student
$stmt->execute(['student' => 'student']);// that to not select the proof as student
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste Stagaire</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            
        }
        .header {
            background-color: #2196f3;
            color: white;
            padding: 20px;
            position: relative;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header h1 {
            text-align:start;
            color: #fff;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .header-buttons {
            position: absolute;
            right: 20px;
            top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid white;
            color: white;
        }

        .btn-primary {
            background: white;
            color: #2196f3;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 2rem;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .item-list {
            list-style: none;
        }

        .list-item {
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .item-header {
            background-color: #f9f9f9;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.2s;
        }

        .item-header:hover {
            background-color: #eaeaea;
        }

        .item-header h2 {
            font-size: 18px;
            color: #444;
        }

        .item-content {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }

        .item-content.active {
            padding: 15px;
            max-height: 500px;
            /* Adjust as needed */
        }

        .arrow {
            transition: transform 0.3s;
        }

        .arrow.active {
            transform: rotate(180deg);
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            .item-header {
                padding: 12px;
            }

            .item-header h2 {
                font-size: 16px;
            }
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<header class="header">
        <div class="header-content">
            <h1>Tous Les Stagaires</h1>
            <p>Cliquez sur le nom pour voir la réponse
            </p>
            <div class="header-buttons">
                <button type="button" class="btn btn-outline" id="backButton" onclick="window.location='dashbord.php'">← Back to Dashboard</button>
                
            </div>
        </div>
    </header>

<body>

    <div class="container">
        <h1>liste Stagaire</h1>
            <ul class="item-list">
                <?php foreach ($students as $student): ?>
                    <a href="view_responses.php?username=<?= urlencode($student['username']) ?>">
                    <li class="list-item">
                        <div class="item-header">
                        
                            <?= htmlspecialchars($student['username']) ?>
                        </a>
                        <span class="arrow">▼</span>
                        </div>

                        
                    </li>
                <?php endforeach; ?>
            </ul>





    

    <script>
        function toggleContent(element) {
            const content = element.nextElementSibling;
            const arrow = element.querySelector('.arrow');

            content.classList.toggle('active');
            arrow.classList.toggle('active');
        }

        // Make it keyboard accessible
        document.querySelectorAll('.item-header').forEach(header => {
            header.setAttribute('tabindex', '0');
            header.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleContent(this);
                }
            });
        });
    </script>
</body>

</html>