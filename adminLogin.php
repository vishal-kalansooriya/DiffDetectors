<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(isset($_SESSION['username'])){
    header("Location: home.php");
}else if(isset($_SESSION['admin_logged_in'])){
    header("Location: adminPanel.php");
}else if(!isset($_SESSION['admin_otp'])){
    echo "<script>alert('Session expired. Login again');</script>";
    header("Location: login.php");
    exit();
}
?>             
<link rel="stylesheet" href="assets/css/sign.css">
<script>
    document.title="Admin Login | " + titleName;
</script>    
<div class="formContainer">
    <h1>Admin Login</h1>
    <form method="post">
        <input type="text" name="otp" placeholder="Enter OTP Code" required>
        <div>
            <button type="submit" name="verify">Verify</button>
            <button type="button" onclick="window.location.href='login.php'">Go Back</button>
        </div>
    </form>
</div>
<?php
include 'assets/php/footer.php';
?>       