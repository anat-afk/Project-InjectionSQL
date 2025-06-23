<?php
$host = "localhost";
$db = "vulnerable_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête vulnérable à l'injection SQL (exprès pour le TP)
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo "Bonjour " . htmlspecialchars($user['username']) . "<br>";
        echo "Voici vos informations personnelles<br><br>";
        echo "Numéro sécurité sociale : " . $user['social_security_number'] . "<br>";
        echo "Date de naissance : " . $user['dob'] . "<br>";
        echo "Votre adresse : " . $user['address'] . "<br>";
    } else {
        echo "Identifiants invalides.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 10%;
            max-width: 400px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="login-container">
        <h2 class="text-center mb-4">Connexion</h2>

<!-- Formulaire HTML -->
<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="text-center">
        <input type="submit" value="Connexion" class="btn btn-primary w-100">
    </div>
</form>
    
</div>
</div>
</body>
</html>
