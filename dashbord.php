<?php
session_start();
// var_dump($_SESSION); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Database Dashboard</title>
    <link rel="stylesheet" href="styles (6).css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

</head>

<body>
    <form action="">
        <div class="container">
            <h1  data-aos="zoom-in-down">Quiz Database Dashboard</h1>

            <div class="stats-grid">
                <!-- Students Card -->
                <div class="stats-card" data-aos="fade-right">
                    <h2>Students</h2>
                    <p class="subtitle">Registered students</p>
                    <div class="stat-number">
                        <span id="studentCount">-</span>
                    </div>
                    <p class="stat-detail" id="studentTotal">out of 24 students</p>
                    <!-- <button type="button" class="action-button secondary" onclick="window.location='allstudent.php'">
                        View Students
                    </button> -->
                </div>

                <!-- Questions Card -->
                <div class="stats-card" data-aos="fade-down">
                    <h2>Questions</h2>
                    <p class="subtitle">Quiz questions</p>
                    <div class="stat-number">
                        <span id="questionCount">-</span>
                    </div>
                    <p class="stat-detail" id="questionTotal">out of 14 questions</p>
                    <!-- <button type="button" class="action-button secondary" onclick="location.href='question.php'">
                        View Questions
                    </button> -->
                </div>

                <!-- Response Rate Card -->
                <div class="stats-card" data-aos="fade-left">
                    <h2>Response Rate</h2>
                    <p class="subtitle">Completion percentage</p>
                    <div class="stat-number">
                        <span id="responseRate">-</span>%
                    </div>
                    <p class="stat-detail" id="responseCount">- responses recorded</p>
                    <!-- <button type="button" class="action-button secondary" onclick="location.href='view_responses.php'">
                        View Responses
                    </button> -->
                </div>
            </div>

            <div class="bottom-grid">
                <!-- Quick Actions -->
                <div class="action-card"  data-aos="fade-right">
                    <h2>Quick Actions</h2>
                    <div class="action-buttons">
                        <button type="button" class="action-button primary" onclick="location.href='allstudent.php'">
                            View Students
                        </button>
                        <button type="button" class="action-button outline" onclick="location.href='structurequestion.php'">
                            View Question
                        </button>
                        <!-- <button class="action-button outline" onclick="location.href='record-responses.php'">
                            Record Responses
                        </button> -->
                    </div>
                </div>

                <!-- Database Status -->
                <div class="status-card"  data-aos="fade-left">
                    <h2>Database Status</h2>
                    <div class="status-items">
                        <div class="status-item">
                            <div class="status-header">
                                <span>Students</span>
                                <span id="studentStatus">-/24</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" id="studentProgress"></div>
                            </div>
                        </div>

                        <div class="status-item">
                            <div class="status-header">
                                <span>Questions</span>
                                <span id="questionStatus">-/14</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" id="questionProgress"></div>
                            </div>
                        </div>

                        <div class="status-item">
                            <div class="status-header">
                                <span>Response Rate</span>
                                <span id="responseStatus">-%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" id="responseProgress"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>

        AOS.init({

            duration: 1250,

        });
        console.log(AOS);
    </script>
    <script src="script.js"></script>
</body>

</html>