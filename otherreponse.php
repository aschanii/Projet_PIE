<?php
session_start();
require 'connexion.php';
$username=$_SESSION['username'];
$stmt=$connexion->prepare("SELECT student_username,reponse FROM otherreponse ");
$stmt->execute();
$otherreponse=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <style>
        header {
            background-color: #1e88e5;
            ;
            color: white;
            padding: 10px 0;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .header-title {
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .content-card{
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 2rem;
        }
        .card{
            border: 0.5px solid #1e88e5;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            border-radius: 20px;
        }
        p{
            display: flex;
            gap: 5px;
        }
        i{
            font-size: 31px;
            color: #1e88e5;
            margin-top: -6px;
        }
    </style>

</body>
<header>
    <div class="header-title">
        <h1>Ce que les Stagaire pensent de vous</h1>
    </div>
</header>
<div class="content-card">
<!-- <div class="card">
    <h2>username</h2>
    <p>Lorem ipsum dolor sit amet consectetur.</p>
</div> -->
<?php
$foundResponse = false;  // Flag to track if a response was found

foreach($otherreponse as $oneresponse){
    if($username == $oneresponse['student_username']){
        echo "<div class='card'>";
        echo "<h2>Salut $username</h2>";
        echo "<p> quelqu'un dit que :" . htmlspecialchars($oneresponse['reponse']) . " <i class='bx bxs-smile' ></i> </p>";
        echo "</div>";
        $foundResponse = true;  // Set flag to true when a response is found
    }
}

if (!$foundResponse) {
    
    echo "<div class='card'>";
        echo "<h2>Salut $username</h2>";
        echo "<p> Rien ne vous a été dit <i class='bx bxs-sad'></i></p> ";
        echo "</div>";
}
?>

</div>
</html>