<?php
session_start();
// echo $_SESSION['user_id']
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  // echo $user_id;
} else {
  header('Location: Connection.php');
  exit;
}
// Database credentials
$servername = "localhost";
$username = "Root";
$password = "";
$dbname = "gestionnaire";

// Create connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['submit'])) {
    $value1 = $_POST['Titre'];
    $value2 = $_POST['Prix'];
    $value3 = $_POST['Adresse'];
    $value4 = $_POST['Description'];
    $value5 = $_POST['ville'];
    $value6 = $_POST['Categorie'];
    $value7 = $_POST['Type'];
    $value15 = $user_id;
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO `annonce` (`id_annonce`, `titre`, `prix`, `date_ajout`, `dae_modif`, `adresse`, `description`, `ville`, `categorie`, `type`, `url_image_principal`, `url_image1`, `url_image2`, `url_image3`, `url_image4`, `url_image5`, `url_image6`, `id_client`) VALUES (NULL, :value1, :value2, Null, Null, :value3, :value4, :value5, :value6, :value7, :value8, :value9, :value10, :value11, :value12, :value13, :value14, :value15) ");

    // Bind parameters to values

    $value8 = "another value";
    $value9 = "another value";
    $value10 = "another value";
    $value11 = "another value";
    $value12 = "another value";
    $value13 = "another value";
    $value14 = "another value";
    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);
    $stmt->bindParam(':value3', $value3);
    $stmt->bindParam(':value4', $value4);
    $stmt->bindParam(':value5', $value5);
    $stmt->bindParam(':value6', $value6);
    $stmt->bindParam(':value7', $value7);
    $stmt->bindParam(':value8', $value8);
    $stmt->bindParam(':value9', $value9);
    $stmt->bindParam(':value10', $value10);
    $stmt->bindParam(':value11', $value11);
    $stmt->bindParam(':value12', $value12);
    $stmt->bindParam(':value13', $value13);
    $stmt->bindParam(':value14', $value14);
    $stmt->bindParam(':value15', $value15);
    // Execute the statement
    $stmt->execute();

    echo "Data inserted successfully!";
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close connection
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a602b3a089.js" crossorigin="anonymous"></script>
  <title>Gestion immobilier</title>
</head>

<body>
  <header>
    <h1>My Home</h1>
  </header>
  <nav>
    <ul>
      <li><a href="http://localhost/knn/folf1/index.php"><i class="fa-solid fa-house"></a></i></li>
      <li> <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a></li>

      <a href="http://localhost/knn/folf1/exit.php">
        <i class="fa-solid fa-right-from-bracket"></i>
      </a>
      </li>
    </ul>
  </nav>
  <section>
    <form method="post" action="ajoute.php">
      <div class="mb-3 w-75">
        <label for="" class="form-label">Titre</label>
        <input type="text" class="form-control input" name="Titre">
        <label for="" class="form-label">Prix</label>
        <input type="text" class="form-control input" name="Prix">
        <label for="" class="form-label">Adresse</label>
        <input type="text" class="form-control input" name="Adresse">
        <label for="" class="form-label">Type</label>
        <input type="text" class="form-control input" name="Type">
        <label for="" class="form-label">Categorie</label>
        <input type="text" class="form-control input" name="Categorie">
        <label for="" class="form-label">ville</label>
        <input type="text" class="form-control input" name="ville">
        <label for="" class="form-label">Image principale</label>
        <input type="file" class="form-control input" name="principale">
        <label for="" class="form-label">d'auter images</label>
        <input type="file" class="form-control input" name="images">
        <label for="" class="form-label">Description</label>
        <label for="" class="form-label"></label>
        <textarea class="form-control input" name="Description" rows="3"></textarea>
        <input type="submit" class="form-control input my-3" name="submit" value="Ajouter">
      </div>
    </form>
  </section>
  <section>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>