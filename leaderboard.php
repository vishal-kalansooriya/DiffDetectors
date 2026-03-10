<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
$currentPlayer = $_SESSION['username'];
$sql = "SELECT user, SUM(score) AS score FROM scores GROUP BY user ORDER BY score DESC";
$result = $conn->query($sql);
$rank = 0;
$prevScore = null;
$displayRank = 0;
?>              
<link rel="stylesheet" href="assets/css/leaderboard.css">
<script>
    document.title="Leaderboard | " + titleName;
</script>    
<div id="top">
    <button class="blueButton" onclick="window.location.href='home.php'"><svg viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/></svg>Home</button>
    <h1>~ Leaderboard ~</h1>
    <button class="pinkButton" onclick="window.location.href='map.php'"><svg viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>Map</button>
</div>

<section id="leaderboard">
    <div id="columnNames" class="leaderRow">
        <span class="rank">Rank</span>
        <span class="player">Player</span>
        <span class="score">Score</span>
    </div>
<?php
while($row = $result->fetch_assoc()){
    $rank++;
    if($prevScore !== $row['score']){
        $displayRank = $rank;
    }
    $prevScore = $row['score'];
    $classes = "";
    if($displayRank <= 3){
        $classes .= " topRank";
    }
    if($row['user'] === $currentPlayer){
        $classes .= " currentPlayer";
    }
    echo '<div class="leaderRow'.$classes.'">';
    echo '<span class="rank">'.$displayRank.'<sup>'.getOrdinal($displayRank).'</sup></span>';
    echo '<span class="player">'.$row['user'].'</span>';
    echo '<span class="score">'.$row['score'].'</span>';
    echo '</div>';
}
?>
</section>

<?php
function getOrdinal($n){
    if($n==1) return "st";
    if($n==2) return "nd";
    if($n==3) return "rd";
    return "th";
}
?>

<?php
include 'assets/php/footer.php';
?>       