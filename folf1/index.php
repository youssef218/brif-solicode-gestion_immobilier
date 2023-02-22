<?php
session_start();
session_destroy();
// echo $_SESSION["user_id"];
// Connection a la base de données
// include 'DBconnection.php';

$dsn = 'mysql:host=localhost;dbname=gestionnaire';
$username = 'Root';
$password = '';

try {
  $conn = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
// Definition des variables 

$FamilynameErr = $NameErr = $PhoneErr = $EmailErr = $PasswordErr = $PasswordConfirmationErr = "";
$FamilyName = $Name = $Phone = $Email = $Password = $PasswordConfirmation = "";

// Validation du formulaire 
if (isset($_POST["submt"])) {
    if (empty($_POST["nom"])) {
        $FamilynameErr = "Le nom de famille est requis";
    } else {
        $FamilyName = $_POST["nom"];

        if (!preg_match("/^[a-zA-Z]*$/", $FamilyName)) {
            $FamilynameErr = "Format invalide";
        }
    }

    if (empty($_POST["prenom"])) {
        $NameErr = "Le prénom est requis";
    } else {
        $Name = $_POST["prenom"];

        if (!preg_match("/^[a-zA-Z- ]*$/", $Name)) {
            $NameErr = "Format invalide";
        }
    }

    if (empty($_POST["email"])) {
        $EmailErr = "Votre adresse mail est requise";
    } else {
        $Email = $_POST["email"];

        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $EmailErr = "Format invalide";
        }
    }

    if (empty($_POST["telephone"])) {
        $PhoneErr = "Votre numéro de téléphone est requis";
    } else {
        $Phone = $_POST["telephone"];

        if (!preg_match("/^(06|07|08|05)+[0-9]{8}$/", $Phone)) {
            $PhoneErr = "Format invalide";
        }
    }

    if (empty($_POST["MotDePasse"])) {
        $PasswordErr = "Un mot de passe est requis";
    } else {
        $Password = $_POST["MotDePasse"];

        if (!preg_match("/[\w!@£?]/", $Password)) {
            $PasswordErr = "Format invalide";
        }
    }

    if (empty($_POST["ConfirmationMotDePasse"])) {
        $PasswordConfirmationErr = "Confirmer votre mot de passe";
    } else {
        $PasswordConfirmation = $_POST["ConfirmationMotDePasse"];

        if ($PasswordConfirmation != $Password) {
            $PasswordConfirmationErr = "Les mots de passe ne sont pas identiques";
        }
        $hash = password_hash($Password, PASSWORD_BCRYPT);
        echo password_verify($Password, $hash);
    }

    if (($FamilynameErr == "" and $NameErr == "" and $PhoneErr == "" and $EmailErr == "" and $PasswordErr == "" and $PasswordConfirmationErr == "") and (!empty($_POST["nom"]) and !empty($_POST["prenom"]) and !empty($_POST["email"]) and !empty($_POST["telephone"]) and !empty($_POST["MotDePasse"]) and !empty($_POST["ConfirmationMotDePasse"]))) {
        $sql = "INSERT INTO clients (nom, prenom, email, password, telephone) VALUES (:value1, :value2, :value3, :value4, :value5)";
$stmt = $conn->prepare($sql);

$value1 = $FamilyName;
$value2 = $Name;
$value3 = $Email;
$value5 = $Phone;
$value4 = $Password;
$stmt->bindValue(':value1', $value1);
$stmt->bindValue(':value2', $value2);
$stmt->bindValue(':value3', $value3);
$stmt->bindValue(':value4', $value4);
$stmt->bindValue(':value5', $value5);

$stmt->execute();
header("Location: Connection.php");
exit();
      

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a602b3a089.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="AccountCreation.css">
    <title>acct</title>
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
            <img src="icone.svg" alt="">
        </div>

        <div>
            <form action="" method="post">
                <div class="formulaire">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $FamilyName ?>">
                    <span> <?php echo $FamilynameErr; ?> </span>

                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $Name ?>">
                    <span> <?php echo $NameErr; ?> </span>


                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" value="<?php echo $Email ?>">
                    <span> <?php echo $EmailErr; ?> </span>


                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" value="<?php echo $Phone ?>">
                    <span> <?php echo $PhoneErr; ?> </span>


                    <label for="MotDePasse">Mot de passe</label>
                    <input type="text" name="MotDePasse" id="MotDePasse">
                    <span> <?php echo $PasswordErr; ?> </span>


                    <label for="ConfirmationMotDePasse">Confirmer le mot de passe</label>
                    <input type="text" name="ConfirmationMotDePasse" id="ConfirmationMotDePasse">
                    <span> <?php echo $PasswordConfirmationErr; ?> </span>


                    <input type="submit" value="Créer un compte" name="submt">
                </div>
            </form>
        </div>

    </div>
</body>

</html>