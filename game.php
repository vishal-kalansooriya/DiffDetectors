<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
$id=$_GET['id'];
$sql="SELECT * FROM puzzles WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$puzzle=mysqli_fetch_assoc($result);
$spots=$puzzle['spots'];
$difficulty=$puzzle['difficulty'];
preg_match('/\d+/', $difficulty, $timeMatch);
$time=$timeMatch[0];
$sqlA = "SELECT id FROM puzzles WHERE id > $id ORDER BY id ASC LIMIT 1";
$resultA = mysqli_query($conn, $sqlA);
$nextPuzzle = mysqli_fetch_assoc($resultA);
?>              
<link rel="stylesheet" href="assets/css/game.css">
<script src="assets/js/game.js" defer></script>
<script>
    document.title="Game | " + titleName;
    let correctPoints = <?php echo $spots;?>;
    let timeLeft = <?php echo $time;?>;
    let puzzleIdNumber = <?php echo $id;?>;
</script>    
<div id="top">
    <div id="timeInfo">
        <img src="assets/img/game/board.png" alt="img">
        <img src="assets/img/game/clock.png" alt="img">
        <h1 id="timer">00:00</h1>
    </div>
    <h1>+ Find 3 Differences +</h1>
    <div id="heartsList">
        <img src="assets/img/game/heart.png" alt="img">
        <img src="assets/img/game/heart.png" alt="img">
        <img src="assets/img/game/heart.png" alt="img">
        <img src="assets/img/game/heart.png" alt="img">
        <img src="assets/img/game/heart.png" alt="img">
    </div>
</div>
<div id="mainImages">
    <img src="content/puzzles/<?php echo $id;?>/correct.png" draggable="false" id="correctImage" alt="img">
    <div>
        <img src="content/puzzles/<?php echo $id;?>/wrong.png" draggable="false" id="wrongImage" alt="img">
    </div>
</div>
<div id="bottom">
    <div>
        <button onclick="hintPopup.style.display='block';" class="greenButton"><svg viewBox="0 0 16 16"><path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
        </svg>Hint</button>
        <button onclick="timePopup.style.display='block';" class="pinkButton" id="addTimeButton"><svg viewBox="0 0 16 16"><path d="M2 14.5a.5.5 0 0 0 .5.5h11a.5.5 0 1 0 0-1h-1v-1a4.5 4.5 0 0 0-2.557-4.06c-.29-.139-.443-.377-.443-.59v-.7c0-.213.154-.451.443-.59A4.5 4.5 0 0 0 12.5 3V2h1a.5.5 0 0 0 0-1h-11a.5.5 0 0 0 0 1h1v1a4.5 4.5 0 0 0 2.557 4.06c.29.139.443.377.443.59v.7c0 .213-.154.451-.443.59A4.5 4.5 0 0 0 3.5 13v1h-1a.5.5 0 0 0-.5.5m2.5-.5v-1a3.5 3.5 0 0 1 1.989-3.158c.533-.256 1.011-.79 1.011-1.491v-.702s.18.101.5.101.5-.1.5-.1v.7c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13v1z"/></svg>+10 Sec</button>
    </div>
    <button class="blueButton" onclick="menu.style.display='flex';"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/></svg>Menu</button>
</div>






<!-- hint or time -->
<section id="hintPopup" class="hintOrTime" style="display: none;">
    <h1>+ Solve the puzzle to get hints +</h1>
    <div>
        <img src="" alt="img" id="bananaPuzzleImage">
        <span>
            <p>Select the Answer</p>
            <span>
                <button class="blueButton answerBtn">A) </button>
                <button class="answerBtn">B) </button>
            </span>
            <span>
                <button class="greenButton answerBtn">C) </button>
                <button class="pinkButton answerBtn">D) </button>
            </span>
            <button onclick="hintPopup.style.display='none';"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg>Go Back</button>
        </span>
    </div>
</section>
<section id="timePopup" class="hintOrTime" style="display: none;">
    <h1>+ Solve the question to get extra 10 seconds +</h1>
    <h1 id="question"></h1>
    <span>
        <p>Select the Answer</p>
        <span>
            <button class="blueButton qAnswerBtn"></button>
            <button class="qAnswerBtn"></button>
        </span>
        <span>
            <button class="greenButton qAnswerBtn"></button>
            <button class="pinkButton qAnswerBtn"></button>
        </span>
        <button onclick="timePopup.style.display='none';"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg>Go Back</button>
    </span>
</section>




<!-- info boxes -->
<section id="timeUp" class="infoBox wrong" style="display: none;">
    <span>
        <h1>Time is Up</h1>
        <p>You are out of time!<br>Try again or select another level</p>
        <div>
            <button class="greenButton" onclick="location.reload();"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/></svg>Retry</button>
            <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
        </div>
    </span>
</section>
<section id="chancesUp" class="infoBox wrong" style="display: none;">
    <span>
        <h1>Out of Chances</h1>
        <p>You are out of chances!<br>Try again or select another level</p>
        <div>
            <button class="greenButton" onclick="location.reload();"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/></svg>Retry</button>
            <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
        </div>
    </span>
</section>
<section id="puzzleComplete" class="infoBox correct" style="display: none;">
    <span>
        <h1>Level Complete!</h1>
        <p>Congratulations! You have completed this puzzle.</p>
        <div>
            <?php if($nextPuzzle){ ?>
                <button class="greenButton" onclick="window.location.href='game.php?id=<?php echo $nextPuzzle['id']; ?>'"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg>Next</button>
            <?php } ?>
            <button class="blueButton" onclick="location.reload();"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/></svg>Retry</button>
            <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
        </div>
    </span>
</section>
<section id="menu" class="infoBox" style="display: none;">
    <span>
        <h1>Game Paused</h1>
        <p>You are in control!<br>Do whatever you need</p>
        <div>
            <button class="greenButton" onclick="menu.style.display='none';"><svg viewBox="0 0 16 16"><path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/></svg>Resume</button>
            <button class="blueButton" onclick="location.reload();"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/></svg>Retry</button>
            <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
        </div>
    </span>
</section>
<section id="hintListCorrect" class="infoBox correct" style="display: none;">
    <span>
        <h1>Your answer is correct</h1>
        <p>Please look at the below places to find spots</p>
        <ol>
            <?php
            $hints = explode("\n", $puzzle['hint']);
            foreach($hints as $hint){
                echo "<li>" . trim($hint) . "</li>";
            }?>
        </ol>
        <br>
        <div>
            <button class="greenButton" onclick="hintListCorrect.style.display='none';hintPopup.style.display='none';"><svg viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>I Understand</button>
        </div>
    </span>
</section>
<section id="hintListWrong" class="infoBox wrong" style="display: none;">
    <span>
        <h1>Your answer is wrong</h1>
        <p>Please try again from the beginning or choose another puzzle</p>
        <div>
            <button class="blueButton" onclick="location.reload();"><svg viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/></svg>Retry</button>
            <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
        </div>
    </span>
</section>
<section id="questionCorrect" class="infoBox correct" style="display: none;">
    <span>
        <h1>Your answer is correct</h1>
        <p>You have been awarded with 10 extra seconds!</p>
        <button class="greenButton" onclick="timeLeft += 10;extraTime=10;addTimeButton.style.display='none';questionCorrect.style.display='none';timePopup.style.display='none';"><svg viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>I Understand</button>
    </span>
</section>
<section id="questionWrong" class="infoBox wrong" style="display: none;">
    <span>
        <h1>Your answer is wrong</h1>
        <p>You have to continue with the current time!</p>
        <button class="greenButton" onclick="addTimeButton.style.display='none';questionWrong.style.display='none';timePopup.style.display='none';"><svg viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>I Understand</button>
    </span>
</section>
<?php
include 'assets/php/footer.php';
?>       