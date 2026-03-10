<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
if(isset($_SESSION['username'])){
    header("Location: home.php");
}else if(isset($_SESSION['admin_logged_in'])){
    header("Location: adminPanel.php");
}
?>             
<link rel="stylesheet" href="assets/css/sign.css">
<script>
    document.title="Register | " + titleName;
</script>    
<div class="formContainer">
    <h1>Register</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>
<?php
include 'assets/php/footer.php';
?>       