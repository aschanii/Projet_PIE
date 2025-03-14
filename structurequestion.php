<?php
include('connexion.php');
$sql = "SELECT * FROM questions";
$stmt = $connexion->prepare($sql);
$stmt->execute();

// Fetch all the results
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f5f5f5;
        color: #1a1a1a;
        line-height: 1.5;
    }

    /* header */
    a {
        text-decoration: none;
        color: black;
        font-size: 20px;
        border: 0.5px solid black;
        border-radius: 20px;
    }

    li {
        list-style: none;
        color: black;
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
    .content {
        max-width: 1400px;
        padding-left: 25px;
        padding-right: 25px;
        margin: auto;
        margin-top: 5rem;
    }

    /******Anyquestion ******/
    .anyquestion {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-top: 5rem;
    }

    .qst {
        width: 100%;
    }

    .qst h4 {
        background-color: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid #1a1a1a;
        border-radius: 20px;
        padding: 10px;
        cursor: pointer;
        color: black;
    }

    .content-question {
        display: flex;
        justify-content: space-between;
        z-index: 999;
        width: 550px;
    }

    .content-question:hover {
        background: linear-gradient(135deg, #0984e3, #74b9ff);
        opacity: 1.9;
    }

    .qt {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .qst h4::after {
        font-family: "FontAwesome";
        content: "\f107";
        background-color: #fff;
        text-align: center;
        padding: 5px;
        border-radius: 50%;
    }

    .qst h4.open::after {
        content: "\f104";
        /* Left arrow */
    }

    .section-qst {

        margin-top: 10px;
        color: rgb(148, 148, 148);
        max-height: 0px;
        overflow: hidden;
        transition: max-height 0.5s;
        padding-bottom: 3px;
        margin-bottom: 10px;

    }

    .section-qst input {
        border: none;
        background: #74b9ff;
        position: relative;
        top: 3px;
        border: none;
        color: black;

    }

    input::placeholder {
        color: #fff;
    }

    .active {
        max-height: 300px;
    }

    .title {
        color: black;
        padding: 5px 13px;
        border: 1px solid gray;
        border-radius: 20px;
        display: inline-block;
        text-align: center;
        font-size: 19px;
    }



    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        overflow: hidden;
    }

    .card-header {
        background-color: #2196f3;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .card-header h1 {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .card-header p {
        opacity: 0.9;
        font-size: 14px;
    }

    .card-body {
        padding: 20px;
    }

    .random-button {
        display: block;
        width: 100%;
        padding: 15px;
        background-color: #2196f3;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 20px;
    }

    .random-button:hover {
        background-color: #1976d2;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
    }

    .random-button:active {
        transform: translateY(0);
        box-shadow: 0 2px 5px rgba(33, 150, 243, 0.3);
    }

    .student-display {
        background-color: #f8f9ff;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
        min-height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .student-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: #2196f3;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .student-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .student-id {
        color: #666;
        font-size: 16px;
        font-weight: 500;
    }

    .input-section {
        margin-top: 20px;
    }

    .input-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #333;
    }

    .input-container {
        position: relative;
    }

    .word-input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .word-input:focus {
        outline: none;
        border-color: #2196f3;
    }

    .word-counter {
        position: absolute;
        right: 10px;
        bottom: 10px;
        font-size: 12px;
        color: #666;
        background: rgba(255, 255, 255, 0.8);
        padding: 2px 5px;
        border-radius: 3px;
    }

    .submit-button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 15px;
    }

    .submit-button:hover {
        background-color: #388E3C;
    }

    .submit-button:disabled {
        background-color: #9E9E9E;
        cursor: not-allowed;
    }

    /* Animation classes */
    @keyframes spin {
        0% {
            transform: rotateY(0deg);
            opacity: 0;
        }

        100% {
            transform: rotateY(360deg);
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .spin-animation {
        animation: spin 0.8s ease-out forwards;
    }

    .fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    .shuffle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: rgba(248, 249, 255, 0.9);
    }

    .shuffle-text {
        font-size: 18px;
        font-weight: bold;
        color: #2196f3;
    }

    @keyframes shuffle {
        0% {
            content: "REDA D.";
        }

        4% {
            content: "ABD RAHMAN S.";
        }

        8% {
            content: "MARYEM B.";
        }

        12% {
            content: "MARWA R.";
        }

        16% {
            content: "AYOUB M.";
        }

        20% {
            content: "SOULAIMAN F.";
        }

        24% {
            content: "BELHAOUI";
        }

        28% {
            content: "SARA A.";
        }

        32% {
            content: "FATIMA A.";
        }

        36% {
            content: "YOUSSEF B.";
        }

        40% {
            content: "FETTAH";
        }

        44% {
            content: "NIZAR J.";
        }

        48% {
            content: "ANASS Z.";
        }

        52% {
            content: "IMANE Z.";
        }

        56% {
            content: "ILYASSE M.";
        }

        60% {
            content: "MAHFOUD";
        }

        64% {
            content: "ASMAE C.";
        }

        68% {
            content: "AYOUB O.";
        }

        72% {
            content: "YASSMINE S.";
        }

        76% {
            content: "NOUHAILA A.";
        }

        80% {
            content: "ZINEB M.";
        }

        84% {
            content: "RANIA F.";
        }

        88% {
            content: "AHMED F.";
        }

        92% {
            content: "HIND Z.";
        }

        96% {
            content: "Selecting...";
        }

        100% {
            content: "Selected!";
        }
    }

    .shuffle-text::after {
        content: "";
        animation: shuffle 2s steps(1) forwards;
    }

    /* Responsive adjustments */
    @media (max-width: 600px) {
        .card {
            max-width: 100%;
        }
    }
    .btn{
        width: 100%;
        display: flex;
        justify-content: end;
    }
    .btn button{
        padding: 11px;
        border-radius: 20px;
        border: none;
        background: #0984e3;
        cursor: pointer;
        color: black;
    }
</style>

<body>

<header class="header">
        <div class="header-content">
            <h1>Structure Questions</h1>
            <p>Comment les stagaire voir les questions
            </p>
            <div class="header-buttons">
                <button type="button" class="btn btn-outline" id="backButton" onclick="window.location='dashbord.php'">← Back to Dashboard</button>
                
            </div>
        </div>
    </header>



    <section class="content" style="margin-top:10rem">
        <form action="collection.php" method="POST">
            <h2 class="title">Questions</h2>
            <div class="anyquestion" id="question">

            <?php
                if (!empty($questions)) {
                    foreach ($questions as $index => $question) {
                        $fadeDirection = ($index % 2 === 0) ? 'fade-right' : 'fade-left'; // Alternate fade effect
                        echo "
                    <div class='qst' data-aos='$fadeDirection'>
                        <div class='qst'>
                            <h4 class='content-question'>{$question['question_text']}</h4>
                            <div class='section-qst'>
                                <p> entrer votre reponse </p>
                                <input class='reponse' type='text' style='border-radius: 20px; padding: 12px; width: 80%;' name='response_{$question['id']}' placeholder='reponse' >
                            </div>
                        </div>
                        
                    </div>";
                    }
                } else {
                    echo "<p>No questions available.</p>";
                }
                ?>

            </div>
            
            <div class="card" style="margin-left: 30%;">
                <div class="card-header">
                    <h1>Random Student Selector</h1>
                    <p>Click the button to randomly select a student</p>
                </div>

                <div class="card-body">
                    <button type="button" class="random-button" id="randomButton">
                        Select Random Student
                    </button>

                    <div class="student-display" id="studentDisplay">
                        <div class="student-avatar" id="studentAvatar">?</div>
                        <div class="student-name" id="studentName">Click the button above</div>
                        <input type="hidden" name="student_username" id="selectedStudent">
                        <div class="student-id" id="studentId">to select a random student</div>
                    </div>

                    <div class="input-section">
                        <label class="input-label" for="wordInput">Write 5 words about this student:</label>
                        <div class="input-container">
                            <input type="text" id="wordInput" name="otherreponse" class="word-input"
                                placeholder="Enter 5 words..." maxlength="50">
                            <div class="word-counter" id="wordCounter">0/5 words</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn">
            
            </div>
            
        </form>
    </section>






    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({

            duration: 1250,

        });
    </script>
  


</html>