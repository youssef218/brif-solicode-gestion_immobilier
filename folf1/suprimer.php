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

// Database connection parameters

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
// Prepare a SQL statement to delete the element
$sql = 'DELETE FROM `annonce` WHERE  `annonce`.`id_annonce` = :id';

// Prepare the statement
$stmt = $db->prepare($sql);
// Bind the parameters

$stmt->bindParam(':id', $id);
// Execute the statement
$stmt->execute();
// Check if the statement was executed successfully
if ($stmt->rowCount() > 0) {
    echo " Element was deleted successfully";
} else {
    echo "No element was deleted";
}
$pdo = null;
header('Location: profile.php');
exit;
?>