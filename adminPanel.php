<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
?>          
<link rel="stylesheet" href="assets/css/adminPanel.css">
<script>
    document.title="Admin Panel | " + titleName;
</script>    
<h1>~ ADMIN PANEL ~</h1>
<div>
    <button onclick="window.location.href='addPuzzle.php';" class="greenButton">Add Puzzle</button>
    <button onclick="window.location.href='deletePuzzle.php';">Delete Puzzle</button>
</div>
<form method="post">
    <button name="logout" class="pinkButton">Logout</button>
</form>
<?php
include 'assets/php/footer.php';
?>       