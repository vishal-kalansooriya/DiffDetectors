<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(!isset($_SESSION['username'])){
header("Location: login.php");
}
$page=isset($_GET['page'])?(int)$_GET['page']:1;
if($page<1){$page=1;}
$limit=5;
$offset=($page-1)*$limit;
$sql="SELECT * FROM puzzles ORDER BY id ASC LIMIT $limit OFFSET $offset";
$result=mysqli_query($conn,$sql);
$totalQuery=mysqli_query($conn,"SELECT COUNT(*) as total FROM puzzles");
$totalRow=mysqli_fetch_assoc($totalQuery);
$totalPuzzles=$totalRow['total'];
$totalPages=ceil($totalPuzzles/5);
$startLevel=($page-1)*5+1;
$endLevel=$startLevel+4;
?>

<link rel="stylesheet" href="assets/css/map.css">
<script>
document.title="Map | " + titleName;
</script>

<h1>Level <?php echo $startLevel;?> - <?php echo $endLevel;?></h1>
<img class="clickable" id="previousPageButton"
onclick="window.location.href='map.php?page=<?php echo ($page<=1)?$totalPages:$page-1;?>'"
src="assets/img/map/arrow.png">
<?php
$level=$startLevel;
$count=1;
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $difficulty = $row['difficulty'];
    $scoreQuery = mysqli_query($conn, "SELECT score FROM scores WHERE user='{$_SESSION['username']}' AND puzzleId='$id'");
    $scoreRow = mysqli_fetch_assoc($scoreQuery);
    $score = $scoreRow['score'] ?? 0;
?>

<article class="gameMapPuzzles clickable" id="puzzle<?php echo $count;?>" onclick="window.location.href='game.php?id=<?php echo $id;?>'">
    <div class="board">
        <img src="assets/img/map/board.png">
        <p class="level">LEVEL <?php echo $level;?></p>
    </div>
    <div class="bottomInfo">
        <p class="score">Score: <?php echo $score;?></p>
        <p class="difficulty"><?php echo $difficulty;?></p>
    </div>
    <img class="puzzle" src="content/puzzles/<?php echo $id;?>/correct.png">
    <img class="icon" src="assets/img/map/<?php if($score == 0) { echo "question"; } else { echo "done"; } ?>.png">
</article>

<?php
$level++;
$count++;
}
?>

<img class="clickable" id="nextPageButton"
onclick="window.location.href='map.php?page=<?php echo ($page>=$totalPages)?1:$page+1;?>'"
src="assets/img/map/arrow.png">
<button id="homeButton" class="blueButton" onclick="window.location.href='home.php'">Go Back</button>

<?php
include 'assets/php/footer.php';
?>