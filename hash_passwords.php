<?php
require 'connexion.php';  // this to connect to database

// Fetch all users (students and professors)
$sql = "SELECT username, password FROM classe1";  // Assuming your table is 'classe1' with 'username' and 'password'
$stmt = $connexion->query($sql);

// Iterate through each user and update the password
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $username = $row['username'];
    $plainPassword = $row['password'];  // Old plain text password

    // Hash the password using password_hash
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Update the database with the hashed password
    $updateSql = "UPDATE classe1 SET password = :hashedPassword WHERE username = :username";
    $updateStmt = $connexion->prepare($updateSql);
    $updateStmt->bindParam(':hashedPassword', $hashedPassword);
    $updateStmt->bindParam(':username', $username);
    $updateStmt->execute();
}

echo "All user passwords have been updated to hashed versions!";
?>
