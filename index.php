<?php
header("refresh:4;url=register.php");
include 'assets/php/logic.php';
include 'assets/php/header.php';
?>       
<link rel="stylesheet" href="assets/css/loadingScreen.css">
<script>
    document.title="Loading | " + titleName;
</script>
<!-- background images -->
<img src="assets/img/loading/p1.png" alt="img" class="bgImg">
<img src="assets/img/loading/p1.png" alt="img" class="bgImg">
<img src="assets/img/loading/p1.png" alt="img" class="bgImg">
<img src="assets/img/loading/p2.png" alt="img" class="bgImg">
<img src="assets/img/loading/p2.png" alt="img" class="bgImg">
<img src="assets/img/loading/p2.png" alt="img" class="bgImg">
<img src="assets/img/loading/p1.png" alt="img" class="bgImg">
<img src="assets/img/loading/p2.png" alt="img" class="bgImg">
<img src="assets/img/loading/f1.png" alt="img" class="f1Img">
<img src="assets/img/loading/f2.png" alt="img" class="f2Img">

<!-- main image container -->
<div class="imgContainer">
    <img src="assets/img/loading/1.png" alt="img">
    <img src="assets/img/loading/2.png" alt="img">
    <img src="assets/img/loading/3.png" alt="img">
</div>

<!-- progress bar -->
<div class="bar">
    <h1>Diff Detectors</h1>
    <div class="progressContainer">
        <div class="progress"></div>
    </div>
</div>

<!-- magnifier -->
<img id="magnifierImg" src="assets/img/loading/magnifier.png" alt="img">
<?php
include 'assets/php/footer.php';
?>       