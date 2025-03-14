<?php
require 'connexion.php';

$username = $_GET['username'] ?? '';

// Sanitize username
$username = preg_replace('/[^a-zA-Z0-9_-]/', '', $username);


// Fetch student responses from the `hand` table
$stmt = $connexion->prepare("SELECT q.question_text, h.response 
                             FROM hand h
                             JOIN questions q ON h.question_id = q.id
                             WHERE h.student_username = ?");
$stmt->execute([$username]);
$responses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of questions available
$stmt2 = $connexion->prepare("SELECT COUNT(*) FROM questions");
$stmt2->execute();
$totalQuestions = $stmt2->fetchColumn();

// Calculate the total responses (number of non-empty responses)
$totalResponses = count($responses);

// Calculate the completion rate
$completionRate = ($totalQuestions > 0) ? ($totalResponses / $totalQuestions) * 100 : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Response Viewer</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fb;
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .info-card {
            background: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
        }

        .student-info {
            flex: 1;
        }

        .student-info h2 {
            color: #2196f3;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .info-row {
            display: flex;
            margin-bottom: 12px;
        }

        .info-label {
            width: 100px;
            color: #666;
        }

        .info-value {
            font-weight: 500;
            color: #333;
        }

        .stats {
            display: flex;
            gap: 20px;
        }

        .stat-box {
            background: #f8f9ff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            min-width: 200px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #2196f3;
            margin-bottom: 8px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .search-bar {
            position: relative;
            margin-bottom: 24px;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .search-bar::before {
            content: "🔍";
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .responses-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .responses-header h2 {
            color: #2196f3;
            font-size: 20px;
        }

        .filters {
            display: flex;
            gap: 12px;
        }

        select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .responses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .response-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .question-number {
            color: #2196f3;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .question-text {
            color: #333;
            margin-bottom: 16px;
            font-weight: 500;
        }

        .response-text {
            background: #f8f9ff;
            padding: 12px;
            border-radius: 4px;
            color: #666;
        }

        @media (max-width: 768px) {
            .header-buttons {
                position: static;
                margin-top: 16px;
            }

            .info-card {
                flex-direction: column;
            }

            .stats {
                margin-top: 20px;
            }

            .responses-header {
                flex-direction: column;
                gap: 12px;
            }

            .filters {
                width: 100%;
            }

            select {
                flex: 1;
            }
        }

        /* Print styles */
        @media print {
            body {
                background-color: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .header {
                background-color: #2196f3 !important;
                color: white !important;
                padding: 15px;
            }

            .header-buttons,
            .search-bar,
            .filters {
                display: none !important;
            }

            .container {
                margin: 0;
                padding: 0;
                width: 100%;
                max-width: 100%;
            }

            .info-card,
            .response-card {
                box-shadow: none;
                border: 1px solid #ddd;
                break-inside: avoid;
                page-break-inside: avoid;
                margin-bottom: 15px;
            }

            .responses-grid {
                display: block;
            }

            .response-card {
                margin-bottom: 15px;
            }

            .stat-box {
                background: #f8f9ff !important;
            }

            .response-text {
                background: #f8f9ff !important;
            }

            .stat-number {
                color: #2196f3 !important;
            }

            .question-number {
                color: #2196f3 !important;
            }

            h2 {
                color: #2196f3 !important;
            }

            /* Add page breaks where appropriate */
            .info-card {
                page-break-after: always;
            }

            /* Print header on each page */
            .header {
                position: running(header);
            }

            @page {
                margin: 0.5cm;

                @top-center {
                    content: element(header);
                }
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <h1>Student Response Viewer</h1>
            <p>Viewing responses for student
                <?php
                echo " <span>" . htmlspecialchars($username) . "</span>";
                ?>
            </p>
            <div class="header-buttons">
                <button type="button" class="btn btn-outline" id="backButton" onclick="window.location='dashbord.php'">← Back to Dashboard</button>
                <button class="btn btn-primary" id="printButton">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg>

                    Print Responses</button>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="info-card">
            <div class="student-info">
                <h2>Student Information</h2>
                <div class="info-row">
                    <span class="info-label">Student ID:</span>
                    <?php
                    echo " <span>" . htmlspecialchars($username) . "</span>";
                    ?>
                </div>

            </div>
            <div class="stats">
    <div class="stat-box">
        <div class="stat-number"><?php echo $totalResponses; ?></div>
        <div class="stat-label">Total Responses</div>
    </div>
    <div class="stat-box">
        <div class="stat-number"><?php echo number_format($completionRate, 2); ?>%</div>
        <div class="stat-label">Completion Rate</div>
    </div>
</div>

        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search responses..." id="searchInput">
        </div>

        <div class="responses-header">
            <h2>Student Responses</h2>
            
        </div>

        <div class="responses-grid" id="responsesGrid">
            <?php
            if ($responses) {
                $count = 1;
                foreach ($responses as $entry) {
                    echo '<div class="response-card">';
                    echo '<div class="question-number">Question ' . $count . '</div>';
                    echo '<div class="question-text">' . htmlspecialchars($entry['question_text']) . '</div>';
                    echo '<div class="response-text">' . htmlspecialchars($entry['response']) . '</div>';
                    echo '</div>';
                    $count++;
                }
            } else {
                echo "No responses found for " . htmlspecialchars($username) . ".";
            }
            ?>
        </div>
    </div>

    <script>
        // Print functionality
        document.getElementById('printButton').addEventListener('click', function () {
            window.print();
        });

        // Back button functionality (placeholder)
        document.getElementById('backButton').addEventListener('click', function () {
            alert('Navigate back to dashboard');
            // In a real application, you would use:
            // window.location.href = 'dashboard.html';
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const cards = document.querySelectorAll('.response-card');

            cards.forEach(card => {
                const questionText = card.querySelector('.question-text').textContent.toLowerCase();
                const responseText = card.querySelector('.response-text').textContent.toLowerCase();

                if (questionText.includes(searchTerm) || responseText.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Sort functionality
        document.getElementById('sortSelect').addEventListener('change', function () {
            const sortOrder = this.value;
            const grid = document.getElementById('responsesGrid');
            const cards = Array.from(grid.querySelectorAll('.response-card'));

            cards.sort((a, b) => {
                const numA = parseInt(a.querySelector('.question-number').textContent.replace('Question ', ''));
                const numB = parseInt(b.querySelector('.question-number').textContent.replace('Question ', ''));

                return sortOrder === 'asc' ? numA - numB : numB - numA;
            });

            // Clear the grid and append sorted cards
            grid.innerHTML = '';
            cards.forEach(card => grid.appendChild(card));
        });

        // Filter functionality (simplified for demo)
        document.getElementById('filterSelect').addEventListener('change', function () {
            const filterValue = this.value;
            const cards = document.querySelectorAll('.response-card');

            cards.forEach(card => {
                const responseText = card.querySelector('.response-text').textContent;

                if (filterValue === 'all') {
                    card.style.display = '';
                } else if (filterValue === 'completed' && responseText.trim() !== '') {
                    card.style.display = '';
                } else if (filterValue === 'incomplete' && responseText.trim() === '') {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>