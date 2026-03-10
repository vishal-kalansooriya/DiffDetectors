<?php
include "logic.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION['username'];
$puzzleId = $_POST['puzzleId'];
$score = $_POST['score'];

$sql = "INSERT INTO scores (user, puzzleId, score)
        VALUES ('$user','$puzzleId','$score')
        ON DUPLICATE KEY UPDATE score='$score'";

mysqli_query($conn,$sql);
?>