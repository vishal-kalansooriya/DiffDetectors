<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
?>             
<link rel="stylesheet" href="assets/css/map.css">
<script>
    document.title="Map | " + titleName;
</script>
<img id="previousPageButton" src="assets/img/map/arrow.png" alt="img">
<article id="puzzle1" onclick="window.location.href='game.php'">
    <div class="board">
        <img src="assets/img/map/board.png" alt="img">
        <p class="level">LEVEL 1</p>
        <p class="score">20/30</p>
    </div>
    <img class="puzzle" src="content/puzzles/1/correct.png" alt="img">
    <img class="icon" src="assets/img/map/done.png" alt="img">
</article>
<article id="puzzle2" onclick="window.location.href='game.php'">
    <div class="board">
        <img src="assets/img/map/board.png" alt="img">
        <p class="level">LEVEL 2</p>
        <p class="score">20/30</p>
    </div>
    <img class="puzzle" src="content/puzzles/1/correct.png" alt="img">
    <img class="icon" src="assets/img/map/done.png" alt="img">
</article>
<article id="puzzle3" onclick="window.location.href='game.php'">
    <div class="board">
        <img src="assets/img/map/board.png" alt="img">
        <p class="level">LEVEL 3</p>
        <p class="score">20/30</p>
    </div>
    <img class="puzzle" src="content/puzzles/1/correct.png" alt="img">
    <img class="icon" src="assets/img/map/question.png" alt="img">
</article>
<article id="puzzle4" onclick="window.location.href='game.php'">
    <div class="board">
        <img src="assets/img/map/board.png" alt="img">
        <p class="level">LEVEL 4</p>
        <p class="score">20/30</p>
    </div>
    <img class="puzzle" src="content/puzzles/1/correct.png" alt="img">
    <img class="icon" src="assets/img/map/current.png" alt="img">
</article>
<article id="puzzle5" onclick="window.location.href='game.php'">
    <div class="board">
        <img src="assets/img/map/board.png" alt="img">
        <p class="level">LEVEL 5</p>
        <p class="score">20/30</p>
    </div>
    <img class="puzzle" src="content/puzzles/1/correct.png" alt="img">
    <img class="icon" src="assets/img/map/done.png" alt="img">
</article>
<img id="nextPageButton" src="assets/img/map/arrow.png" alt="img">
<button id="homeButton" class="blueButton" onclick="window.location.href='home.php'">Go Back</button>
<?php
include 'assets/php/footer.php';
?>       