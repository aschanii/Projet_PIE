<?php

require_once 'connexion.php';

header('Content-Type: application/json');

// Ensure that any errors in PHP are logged
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get dashboard statistics
if ($_SERVER['REQUEST_METHOD'] === 'GET') {  
    try {
        // Get student count
        $stmt = $connexion->prepare("SELECT COUNT(*) as count FROM classe1 WHERE role=:student");// that to not select the proof as student
        $stmt->execute(['student'=>'student']); // that to not select the proof as student
        $studentCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

        // Get question count
        $stmt = $connexion->query("SELECT COUNT(*) as count FROM questions");
        $questionCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

        // Get response count
        $stmt = $connexion->query("SELECT COUNT(*) as count FROM hand");
        $responseCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];

        // Calculate response rate
        $totalPossibleResponses = $studentCount * $questionCount;
        $responseRate = $totalPossibleResponses > 0 
            ? round(($responseCount / $totalPossibleResponses) * 100) 
            : 0;

        // Ensure data exists and is correctly formatted
        $response = [
            'students' => [
                'count' => $studentCount,
                'total' => 24  // You may want to dynamically set this or adjust it
            ],
            'questions' => [
                'count' => $questionCount,
                'total' => 14  // You may want to dynamically set this or adjust it
            ],
            'responses' => [
                'count' => $responseCount,
                'rate' => $responseRate
            ]
        ];

        // Log the response to check the output
        error_log(json_encode($response));

        // Output the JSON response
        echo json_encode($response);

    } catch (PDOException $e) {
        // Handle database errors
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    }
}
?>