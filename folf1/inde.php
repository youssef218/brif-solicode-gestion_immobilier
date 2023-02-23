<?php
session_start();
  echo $_SESSION["user_email"];
  echo $_SESSION["user_id"];

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
        <h1>
        MY Home
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


        <div >
            <style>
                #filter>*{
    
    padding: 0%;
    border-radius: 10px;
    margin: 0px 3px;
}

            </style>
           <form action="inde.php" id="filter" method="get">
            <h2>Filtrer : </h2>
            <select name="villes" id="ville">
                <option value="ville">ville</option>
                <option value="Tanger">Tanger</option>
                <option value="Casablanca">Casablanca</option>
                <option value="Salé">Salé</option>
                <option value="Fès">Fès</option>
                <option value="Marrakech">Marrakech</option>
                <option value="Safi">Safi</option>
                <option value="Rabat">Rabat</option>
                <option value="Tétouan">Tétouan</option>
                <option value="Mohammédia">Mohammédia</option>
                <option value="El Jadida">El Jadida</option>
            </select>
            <select name="categories" id="categorie">
                <option value="categorie">categorie</option>
                <option value="vente">vente</option>
                <option value="location">location</option>
            </select>
            <select name="types" id="type">
                <option value="type">type</option>
                <option value="appartement">appartement</option>
                <option value="maison">maison</option>
                <option value="villa">villa</option>
                <option value="bureau">bureau</option>
                <option value="terrain">terrain</option>
            </select>
            <input type="Number" name="Min" placeholder="Min ">
            <input type="Number" name="Max" placeholder="Max">
            <input type="submit" value="Chercher">
          </form>
        </div>
        <div id="cards">

            
        <?php
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
        $sql='SELECT * FROM annonce';
        if (isset($_POST['modal'])) {
            $min = $_POST['Min'];
            $max = $_POST['Max'];
            $value1 = $_POST['villes'];
            $value2 = $_POST['categories'];
            $value3 = $_POST['types'];
            $sql = "SELECT * FROM annonce where ville='$value1' and categorie='$value2' and type='$value3' and prix between '$min' and '$max' ";
            // if ($value1 != "" && $min!="" && $max!="") {
            //   $sql = "SELECT * FROM annonce where ville='$value1' and categorie='$value2' and type='$value3' and prix between '$min' and '$max' ";
            //  }
            // elseif ($valueselect != "" && $min=="" && $max=="") {
            //   $sql = "SELECT * FROM annonce where types='$valueselect' ";
            //  }



  
            //  elseif ($valueselect != "" && $min!="" && $max=="") {
            //   $sql = "SELECT * FROM annonce where types='$valueselect' and montan between '$min' and '0' ";
            //  }



            //  elseif ($valueselect == "" && $min!="" && $max=="") {
            //   $sql = "SELECT * FROM annonce where  montan between '$min' and '0' ";
            //  }



            //   elseif ($valueselect != "" && $min=="" && $max!="") {
            //   $sql = "SELECT * FROM annonce where types='$valueselect' and montan between '0' and '$max' ";
            //  }




            //  elseif ($valueselect == "" && $min=="" && $max!="") {
            //   $sql = "SELECT * FROM annonce where  montan between '0' and '$max' ";
            //  }



            // elseif ($valueselect == "" && $min!="" && $max!="") {
            //   $sql = "SELECT * FROM annonce where  montan between '$min' and '$max' ";
            //  }



          }



        
    $stmt = $db->prepare($sql);
    // $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    // Display the records on the page
            foreach ($records as $record) {
                echo '
                     
                <form action=" http://localhost/knn/folf1/info.php" method="post" >
                <div class="card" style="width: 15rem;" >
                <img src="img5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $record['titre'] . '</h5>
                  <p class="card-text">' . $record['prix'] . '</p>
                  <p class="card-text">' . $record['adresse'] . '</p>
                  <input type="hidden" name="id"  value="' . $record["id_annonce"] . '">
                  <input type="submit" class="btn btn-primary" name="modal"  value="more">

                </div>
              </div>
              </form>
            ';
            }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          header('Location: http://localhost/knn/folf1/info.php');
          exit;
      }
            ?>
        </div>
    </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>