<?php
// session_start();
// require 'connexion.php';
// if($_SERVER['REQUEST_METHOD']== 'POST'){
//     if(isset($_POST['username']) && isset($_POST['password'])){
//         $username=$_POST['username'];
//         $password=$_POST['password'];
//     } else{
//         die("ereure: username ou password incorrect");
//     }

//     $sql="SELECT * FROM classe1 WHERE username=:username AND password=:password";
//     $stmt = $connexion->prepare($sql);
//     $stmt ->bindParam(':username',$username, PDO::PARAM_STR);
//     $stmt ->bindParam(':password',$password, PDO::PARAM_STR);
//     $stmt ->execute();

//     if($stmt->rowCount()>0){
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
//         $_SESSION['username'] = $username; // Store username in session
//         header("Location: question.php"); // Redirect to questions page
//         require 'question.php';
//     } else{
//         echo"<script>alert('invalide username or password')</script> ";
//     }

// }


session_start();
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure both username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];  // Plain text password from the form
    } else {
        die("Error: Username or password is missing.");
    }

    // Prepare SQL query to fetch the user by username
    $sql = "SELECT * FROM classe1 WHERE username = :username";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    // Check if the user exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Check if the password matches (hash comparison)
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;  // Store username in session
            $_SESSION['role'] = $row['role'];   // Store the user role (student/professor) in session

            // Redirect to the appropriate page based on user role
            if ($_SESSION['role'] === 'professor') {
                header("Location: dashbord.php");  // Redirect to the professor dashboard
            } else {
                header("Location: question.php");  // Redirect to the student dashboard
            }
            exit(); // Make sure to stop the script execution after redirect
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>



