<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
?>          
<link rel="stylesheet" href="assets/css/deletePuzzle.css">
<script>
    document.title="Delete Puzzle | " + titleName;
</script>    
<h1>- Delete Puzzle -</h1>
<form method="post">
    <label for="puzzleSelect">Select a level to delete:</label>
    <select id="puzzleSelect" name="puzzleId" required>
        <option value="" disabled selected>No Level Selected</option>
        <option value="1">Level 1 - Easy 30s</option>
    </select>
    <img src="content/puzzles/1/correct.png" alt="img">
    <span>
        <button type="button" onclick="if(confirm('Are you sure you want to delete this puzzle?')) { this.type = 'submit'; }" name="deletePuzzle" class="greenButton">Delete</button>
        <button onclick="window.location.href='adminPanel.php';" class="pinkButton">Go Back</button>
    </span>
</form>
<?php
include 'assets/php/footer.php';
?>       