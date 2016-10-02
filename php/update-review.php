<?php
include ('database.php');
session_start();

if (!isset($_SESSION['ID'])) {
    session_destroy();
    header("location: login.html");
}

// Validate input
$review = htmlspecialchars($_POST['review']);
$name = $_SESSION['name'];

$db = new Database();
$sql = "INSERT INTO Reviews VALUES(?, ?, ?)";
$results = $db -> executeUpdate($sql, [null, $name, $review]);

header("location: ../index.php");

?>
