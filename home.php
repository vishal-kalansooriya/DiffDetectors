<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
?>             
<link rel="stylesheet" href="assets/css/home.css">
<script>
    document.title="Home | " + titleName;
</script>    
<div id="details">
    <div>
        <p>Username</p>
        <p>Score: 800</p>
    </div>
    <img id="noSound" onclick="toggleSound();" src="assets/img/home/noSound.png" alt="img">
    <img id="sound" onclick="toggleSound();" src="assets/img/home/sound.png" alt="img">
</div>
<div id="playButton">
    <button onclick="window.location.href='map.php'">Play</button>
</div>
<form method="post">
    <button onclick="window.location.href='leaderboard.php'" type="button" class="greenButton">Leaderboard</button>
    <button name="logout" class="pinkButton">Logout</button>
</form>
<?php
include 'assets/php/footer.php';
?>       