<?php
include 'assets/php/logic.php';
include 'assets/php/header.php';
?>             
<link rel="stylesheet" href="assets/css/sign.css">
<script>
    document.title="Login | " + titleName;
</script>    
<div class="formContainer">
    <h1>Login</h1>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <div>
        <p>Don't have an account? <a href="register.php">Register</a></p>
        <p>Forgot password? <a href="mailto:contact@webnifix.com?subject=Password Reset Request&body=Please%20reset%20my%20password.%0AMy%20Email%20is%3A%20PEASE_TYPE_YOUR_EMAIL_HERE%0AThank%20You!">Reset Password</a></p>
    </div>
</div>
<?php
include 'assets/php/footer.php';
?>       