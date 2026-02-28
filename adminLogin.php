<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
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