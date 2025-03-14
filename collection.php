<?php
session_start();
require 'connexion.php';

// Step 1: Check if the user is logged in
if (!isset($_SESSION['username'])) {
    die("Access denied. Please log in.");
}

// Get the logged-in student username from session
$student_username = $_SESSION['username']; // Correct variable name

// Step 2: Get all questions from the `questions` table
$questions_result = $connexion->query("SELECT id FROM questions");
$questions = [];
if ($questions_result->rowCount() > 0) {
    while ($row = $questions_result->fetch(PDO::FETCH_ASSOC)) {
        $questions[] = $row['id']; // Collecting all question IDs
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $otherreponse = $_POST['otherreponse'];
    $student_user = $_POST['student_username'];
    $stmt = $connexion->prepare("INSERT INTO otherreponse (student_username,reponse) VALUES (?,?)");
    $stmt->bindParam(1, $student_user, PDO::PARAM_STR);
    $stmt->bindParam(2, $otherreponse, PDO::PARAM_STR);
    if ($stmt->execute()) {
        // echo "Data inserted successfully!";
    } else {
        print_r($stmt->errorInfo()); // Debugging output
    }

}

// Step 3: Process form responses and insert them into the `hand` table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($questions as $question_id) {
        // Get the response for the current question
        $response_name = "response_" . $question_id; // Example: response_1, response_2, etc.
        if (isset($_POST[$response_name]) && !empty($_POST[$response_name])) {
            $response = $_POST[$response_name]; // Get the response from the form

            // Step 4: Prepare and execute the SQL statement to insert the response
            $stmt = $connexion->prepare("INSERT INTO hand (student_username, question_id, response) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $student_username, PDO::PARAM_STR); // Changed to STRING
            $stmt->bindParam(2, $question_id, PDO::PARAM_INT);
            $stmt->bindParam(3, $response, PDO::PARAM_STR);

            // Step 5: Execute the query and check for success
            if ($stmt->execute()) {
                // echo "Response inserted for student $student_username for question $question_id: $response<br>";
               
               
                
            } else {
                echo "Error: " . $stmt->errorInfo()[2] . "<br>";
            }
        }
    }
     header("Location: otherreponse.php");
}

// Step 6: Close the connection
$connexion = null;
?>