<?php
// Start the session
session_start();
//

// Establish a PDO database connection
$host = "localhost";
$dbname = "gestionnaire";
$username = "Root";
$password = "";
$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare a SELECT statement
    $stmt = $db->prepare("SELECT * FROM clients WHERE email = :email AND password = :password");

    // Bind parameter values
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the SELECT statement
    $stmt->execute();

    // Fetch the results
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the row exists
    if ($row) {
        // The row exists, set the session variable and redirect
        $_SESSION["user_email"] = $email;
        $_SESSION["user_id"] = $row['id_client'];
        
        header("Location: inde.php");
        exit();
    } else {
        // The row does not exist, show an error message
        echo "Invalid email or password.";
    }
}
?>

<!-- HTML form to collect email and password -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a602b3a089.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="AccountCreation.css">
    <title>Document</title>
</head>
<body>
    
    <div class="body">

        <div>
        <nav>
        <ul>
            <li><a href="http://localhost/knn/folf1/inde.php"><i class="fa-solid fa-house"></a></i></li>
            <li> <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a></li>
            <li><a href="ajoute.php"><i class="fa-solid fa-plus"></i></a></li>
        </ul>
    </nav>
        </div>

        <div>
            <img src="IconeConnexion.svg" alt="">
        </div>

        <div>
            <form method="post" action="">
                <div class="formulaire">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="Email">
                    <?php echo $EmailErr;?>

                    <label for="MotDePasse">Mot de passe</label>
                    <input type="password" name="password" id="MotDePasse">
                    

                    <input type="submit" name = "submit" value="Se connecter">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
