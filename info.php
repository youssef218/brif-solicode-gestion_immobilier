

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
            <li><i class="fa-solid fa-house"></i></li>
            <li><i class="fa-solid fa-user"></i></li>
            <i class="fa-solid fa-right-from-bracket"></i>
            <li><i class="fa-solid fa-plus"></i></li>
        </ul>
    </nav>
    <section>

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



        <div id="cardes">
        
             
<?php
 $servername = "localhost";
 $username = "Root";
 $password = "";
 $dbname = "gestionnaire";
 // Créez une connexion
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Vérifiez la connexion
 if (!$conn) {
   die("Connexion échouée : " . mysqli_connect_error());
 }


           $id = $_POST['id'];
// echo $id;
           $modalsql = "SELECT * FROM annonce where id_annonce='$id'";
           $resultmodal = mysqli_query($conn, $modalsql);
           if (mysqli_num_rows($resultmodal) > 0) {
             while ($rowmodal = mysqli_fetch_assoc($resultmodal)) {
              echo '
              <h1 style="background-color: white;  width: max-content; margin-top:3%;">Titre</h1>
              <h5>'.$rowmodal['titre'].'</h5><br>
              <h2 style="background-color: white;  width: max-content; margin-top:3%;">Adresse d`annonce</h2>
              <h5>'.$rowmodal['adresse'].'</h5>
              <h2 style="background-color: white;  width: max-content; margin-top:3%;">La Ville</h2>
              <h5>'.$rowmodal['ville'].'</h5>
              <h2 style="background-color: white;  width: max-content; margin-top:3%;">Categorie</h2>
              <h5>'.$rowmodal['categorie'].'</h5>
              <h2 style="background-color:white;   width: max-content; margin-top:3;">Type d`annonce</h2>
              <h5>'.$rowmodal['type'].'</h5>
              <h2 style="background-color: white;  width: max-content; margin-top:3%;">Date d`ajouter</h2>
              <h5>'.$rowmodal['date_ajout'].'</h5>
              <h2 style="background-color: white;  width: max-content; margin-top:3%;">description</h2>
              <h5>'.$rowmodal['description'].'</h5>

              ';
             }
           }

?>
        </div>

        </div>
        <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    </section>
  
  
  
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>