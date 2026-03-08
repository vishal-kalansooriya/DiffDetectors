<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}
?>          
<link rel="stylesheet" href="assets/css/addPuzzle.css">
<script src="assets/js/addPuzzle.js" defer></script>
<script>
    document.title="Add Puzzle | " + titleName;
</script>    
<h1>+ Add Puzzle +</h1>
<form method="post" enctype="multipart/form-data">
    <div>
        <span>
            <label for="uploadCorrectImage">Upload Correct Image:</label>
            <input type="file" accept="image/*" name="uploadCorrectImage" id="uploadCorrectImage" required>
            <div class="previewBox"></div>
        </span>
        <span>
            <label for="spotMissingImage">Spot Missing Image:</label>
            <input type="file" accept="image/*" name="spotMissingImage" id="spotMissingImage" required>
            <div class="previewBox"></div>
        </span>
    </div>
    <div>
        <span id="hardnessLevelSelector">
            <label>Hardness Level:</label>
            <label>
                <input type="radio" name="hardnessLevel" value="Easy 30s" required checked>
                Easy 30s
            </label>
            <label>
                <input type="radio" name="hardnessLevel" value="Medium 20s">
                Medium 20s
            </label>
            <label>
                <input type="radio" name="hardnessLevel" value="Hard 10s">
                Hard 10s
            </label>
        </span>
        <span>
            <label for="hintMessage">Hint Message:</label>
            <textarea name="hintMessage" id="hintMessage" required></textarea>
        </span>
        <div>
            <button type="submit" class="greenButton">Upload</button>
            <button onclick="window.location.href='adminPanel.php';" class="pinkButton">Go Back</button>
        </div>
    </div>
</form>
<?php
include 'assets/php/footer.php';
?>       