<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
$puzzlesResult = mysqli_query($conn,"SELECT * FROM puzzles ORDER BY id ASC");
$puzzleCounter = 1;
?>          
<link rel="stylesheet" href="assets/css/deletePuzzle.css">
<script>
    document.title="Delete Puzzle | " + titleName;

    function updatePuzzleImage() {
        const select = document.getElementById("puzzleSelect");
        const img = document.getElementById("puzzleImage");
        const id = select.value;
        if(id){
            img.src = "content/puzzles/" + id + "/correct.png";
        } else {
            img.src = "assets/img/home/bg.jpg";
        }
    }
</script>    
<h1>- Delete Puzzle -</h1>
<form method="post">
    <label for="puzzleSelect">Select a level to delete:</label>
    <select id="puzzleSelect" name="puzzleId" required onchange="updatePuzzleImage()">
        <option value="" disabled selected>No Level Selected</option>
        <?php while($p = mysqli_fetch_assoc($puzzlesResult)): ?>
            <option value="<?php echo $p['id']; ?>">Level <?php echo $puzzleCounter++; ?> - <?php echo $p['difficulty']; ?></option>
        <?php endwhile; ?>
    </select>
    <img id="puzzleImage" src="assets/img/home/bg.jpg" alt="Puzzle Image">
    <span style="margin-top:15px; display:flex; gap:10px;">
        <button type="submit" name="deletePuzzle" class="greenButton" onclick="return confirm('Are you sure you want to delete this puzzle?');">Delete</button>
        <button type="button" onclick="window.location.href='adminPanel.php';" class="pinkButton">Go Back</button>
    </span>
</form>
<?php
include 'assets/php/footer.php';
?>       