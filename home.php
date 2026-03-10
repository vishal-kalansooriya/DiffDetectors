<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>             
<link rel="stylesheet" href="assets/css/home.css">
<script>
    document.title="Home | " + titleName;
</script>    
<div id="details">
    <div>
        <p><?php echo $username; ?></p>
        <p>Total Score: <?php echo $totalScore; ?></p>
    </div>
    <img class="clickable" id="noSound" onclick="toggleSound();" src="assets/img/home/noSound.png" alt="img">
    <img class="clickable" id="sound" onclick="toggleSound();" src="assets/img/home/sound.png" alt="img">
</div>
<div id="playButton">
    <button onclick="window.location.href='map.php?page=1';">Play</button>
</div>
<form method="post">
    <button onclick="window.location.href='leaderboard.php'" type="button" class="greenButton">Leaderboard</button>
    <button name="logout" class="pinkButton">Logout</button>
</form>
<?php
include 'assets/php/footer.php';
?>       