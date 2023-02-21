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
            <li><i class="fa-solid fa-plus"></i></li>
        </ul>
    </nav>
    <section>


        <div id="filter">
           <form action="" id="filter" method="post">
            <h2>Filtrer : </h2>
            <select name="villes" id="ville">
                <option value="ville">ville</option>
            </select>
            <select name="categorie" id="categorie">
                <option value="categories">categorie</option>
            </select>
            <select name="types" id="type">
                <option value="type">type</option>
            </select>
            <input type="Number" placeholder="Min ">
            <input type="Number" placeholder="Max">
            <input type="submit" value="Chercher">
          </form>
        </div>
        <div id="cards">

            
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


             $sql = "SELECT * FROM annonce";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          
          while ($row = mysqli_fetch_assoc($result)) {

                  echo '
                     
                <form action=" http://localhost/k/info.php" method="post" >
                <div class="card" style="width: 15rem;" >
                <img src="img5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">'.$row['titre'].'</h5>
                  <p class="card-text">'.$row['prix'].'</p>
                  <p class="card-text">'.$row['adresse'].'</p>
                  <input type="hidden" name="id"  value="'. $row["id_annonce"] . '">
                  <input type="submit" class="btn btn-primary" name="modal"  value="more">

                </div>
              </div>
              </form>
              

            ';
          }
          
        } else {
          echo "0 résultats";
        }





        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          header('Location: http://localhost/k/info.php');
          exit;
      }
            
            ?>


        </div>
        
  
    </section>
   
  
  
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>