

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
        <h1>
            My Home
        </h1>
    </header>
    <nav>
        <ul>
        <li><a href="http://localhost/knn/folf1/inde.php"><i class="fa-solid fa-house"></a></i></li>
            <li> <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a></li>
            <li><a href="http://localhost/knn/folf1/ajoute.php"><i class="fa-solid fa-plus"></i></a></li>
                  </ul>
    </nav>
    <section>

        



        <div id="cardes">
        
             
<?php
$id = $_POST['id'];
$dsn = 'mysql:host=localhost;dbname=gestionnaire';
$username = 'Root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
$stmt = $db->prepare('SELECT * FROM annonce WHERE id_annonce = :id ');

$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$records = $stmt->fetchAll();

// Display the records on the page
foreach ($records as $record) {
    echo '
    <div id="imageprincipal">
  <img src="img5.jpg" alt="">
  <div id="flex">
      
      <img src="img5.jpg" alt="">
      <div class=" d-flex">
          <img src="img5.jpg" alt="">
      <img src="img5.jpg" alt="">
      </div>
      <img src="img5.jpg" alt="">
      <img src="img5.jpg" alt="">
  </div>





</div>
    <h1 style="background-color: white;  width: max-content; margin-top:3%;">Titre</h1>
    <h5>'.$record['titre'].'</h5><br>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">Adresse d`annonce</h2>
    <h5>'.$record['adresse'].'</h5>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">La Ville</h2>
    <h5>'.$record['ville'].'</h5>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">Categorie</h2>
    <h5>'.$record['categorie'].'</h5>
    <h2 style="background-color:white;   width: max-content; margin-top:3;">Type d`annonce</h2>
    <h5>'.$record['type'].'</h5>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">Date d`ajouter</h2>
    <h5>'.$record['date_ajout'].'</h5>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">Date de modifier</h2>
    <h5>'.$record['dae_modif'].'</h5>
    <h2 style="background-color: white;  width: max-content; margin-top:3%;">description</h2>
    <h5>'.$record['description'].'</h5><br>

    ';
}
?>
        </div>

        </div>
        
    </section>
  
  
  
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>