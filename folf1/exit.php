<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to another page
header('Location: Connection.php');
exit;
?>
