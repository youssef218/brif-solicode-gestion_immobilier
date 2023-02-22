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
$id = $_POST['id'];
echo $id;






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

        $value8 = "another value";
        $value9 = "another value";
        $value10 = "another value";
        $value11 = "another value";
        $value12 = "another value";
        $value13 = "another value";
        $value14 = "another value";
        $value16 = $id;

        // Prepare SQL statement
        $stmt = $conn->prepare("UPDATE `annonce` SET `titre` = :value1, `prix` = :value2, `adresse` = :value3, `description` = :value4, `ville` = :value5, `categorie` = :value6, `type` = :value7, `url_image_principal` = :value8, `url_image1` = :value9, `url_image2` = :value10, `url_image3` = :value11, `url_image4` = :value12, `url_image5` = :value13, `url_image6` = :value14, `id_client`= :value15 WHERE  `annonce`.`id_annonce` = :value16");

        // Bind parameters to values
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
        $stmt->bindParam(':value16', $value16);
        // Execute the statement
        $stmt->execute();

        echo "Data updated successfully!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



























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
            <li><a href="http://localhost/knn/folf1/inde.php"><i class="fa-solid fa-house"></a></i></li>
            <li> <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a></li>

            <a href="http://localhost/knn/folf1/exit.php">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            </li>
        </ul>
    </nav>
    <section>
    <?php

// Establish a connection to the database
$servername = "localhost";
$username = "Root";
$password = "";
$dbname = "gestionnaire";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Prepare and execute the SELECT statement
  $stmt = $conn->prepare("SELECT * FROM annonce WHERE id_annonce = :id");
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();

  // Fetch the data
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  // Display the data on the form fields
  ?>
  <form method="post" action="modif.php">
    <div class="mb-3 w-75">
      <label for="" class="form-label">Titre</label>
      <input type="text" class="form-control input"  name="Titre" value="<?php echo $row['titre']; ?>">
      <label for="" class="form-label">Prix</label>
      <input type="text" class="form-control input"  name="Prix" value="<?php echo $row['prix']; ?>">
      <label for="" class="form-label">Adresse</label>
      <input type="text" class="form-control input" name="Adresse" value="<?php echo $row['adresse']; ?>">
      <label for="" class="form-label">Type</label>
      <input type="text" class="form-control input"  name="Type" value="<?php echo $row['type']; ?>">
      <label for="" class="form-label">Categorie</label>
      <input type="text" class="form-control input"  name="Categorie" value="<?php echo $row['categorie']; ?>">
      <label for="" class="form-label">ville</label>
      <input type="text" class="form-control input"  name="ville" value="<?php echo $row['ville']; ?>">
      <label for="" class="form-label">Image principale</label>
      <input type="file" class="form-control input" name="principale" value="<?php echo $row['url_image_principal']; ?>">
      <label for="" class="form-label">d`auter images</label>
      <input type="file" class="form-control input" name="images">
      <label for="" class="form-label">Description</label>
      <label for="" class="form-label"></label>
      <textarea class="form-control input" name="Description"  rows="3"><?php echo $row['description']; ?></textarea>
      <input type="hidden" name="id" value="<?php echo $row['id_annonce']; ?>">
      <input type="submit" class="form-control input my-3" name="submit" value="Modifier">
    </div>
  </form>
  <?php

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;

?>



    </section>
    <section>

    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>