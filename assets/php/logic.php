<?php
session_start();
// database connection
$conn = new mysqli("localhost","root","","diffdetectors");
// $conn = new mysqli("localhost","webnifix_diffdetectors","6ygCSu.aV*#B5[EC","webnifix_diffdetectors");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// user registration
if(isset($_POST['register'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)){
        echo "<script>
        alert('Password must contain at least one letter, one number and one special character.');
        window.location='register.php';
        </script>";
        exit();
    }
    $checkUser = $conn->prepare("SELECT username FROM users WHERE username=?");
    $checkUser->bind_param("s",$username);
    $checkUser->execute();
    $userResult = $checkUser->get_result();
    if($userResult->num_rows > 0){
        echo "<script>
        alert('Username already exists!');
        window.location='register.php';
        </script>";
        exit();
    }
    $checkEmail = $conn->prepare("SELECT email FROM users WHERE email=?");
    $checkEmail->bind_param("s",$email);
    $checkEmail->execute();
    $emailResult = $checkEmail->get_result();
    if($emailResult->num_rows > 0){
        echo "<script>
        alert('Email already registered!');
        window.location='register.php';
        </script>";
        exit();
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss",$username,$email,$hashedPassword);
    if($stmt->execute()){
        echo "<script>
        alert('Registration successful!');
        window.location='login.php';
        </script>";
    }else{
        echo "<script>
        alert('Registration failed.');
        window.location='register.php';
        </script>";
    }
}

// user login
if(isset($_POST['login'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            if (strtolower($username) == "admin") {
                $otp = random_int(100000,999999);
                $_SESSION['admin_otp'] = $otp;
                $_SESSION['otp_time'] = time();
                $_SESSION['otp_attempts'] = 0;
                $_SESSION['admin_user'] = $username;

                $subject = "Admin Login OTP";
                $to = "contact@webnifix.com";
                $message = "Your OTP code is: $otp";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8\r\n";
                $headers .= "From: <contact@webnifix.com>\r\n";
                mail($to, $subject, $message, $headers);

                echo "<script>window.location='adminLogin.php?otp=$otp';</script>";
                exit();
            }else{
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                echo "<script>
                window.location='home.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Incorrect password!');
            window.location='login.php';
            </script>";
        }
    }else{
        echo "<script>
        alert('Username not found!');
        window.location='login.php';
        </script>";
    }
}

// user logout
if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    echo "<script>
    window.location='login.php';
    </script>";
}

// admin OTP verification
if(isset($_POST['verify'])){
    $enteredOtp = htmlspecialchars(trim($_POST['otp']));
    if(time() - $_SESSION['otp_time'] > 300){
        unset($_SESSION['admin_otp']);
        echo "<script>alert('OTP expired');window.location='login.php';</script>";
        exit();
    }
    $_SESSION['otp_attempts']++;
    if($_SESSION['otp_attempts'] > 5){
        unset($_SESSION['admin_otp']);
        echo "<script>alert('Too many wrong attempts. Login again');window.location='login.php';</script>";
        exit();
    }
    if($enteredOtp == $_SESSION['admin_otp']){
        $_SESSION['admin_logged_in'] = true;
        unset($_SESSION['admin_otp']);
        unset($_SESSION['otp_attempts']);
        unset($_SESSION['otp_time']);
        echo "<script>
        window.location='adminPanel.php';
        </script>";
        exit();
    }else{
        $remaining = 5 - $_SESSION['otp_attempts'];
        echo "<script>alert('Wrong OTP. Attempts left: $remaining');</script>";
    }
}

// get total score
$totalScore = 0;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT SUM(score) as total FROM scores WHERE user='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalScore = $row['total'] ?? 0;
}

// add puzzle
if(isset($_POST['addPuzzle'])){
    $difficulty=$_POST["hardnessLevel"];
    $hint=$_POST["hintMessage"];
    $spots=$_POST["spotsData"];
    $sql="INSERT INTO puzzles (spots,difficulty,hint)
    VALUES ('$spots','$difficulty','$hint')";
    mysqli_query($conn,$sql);
    $id=mysqli_insert_id($conn);
    $correctImage=$_FILES["uploadCorrectImage"]["tmp_name"];
    $wrongImage=$_FILES["spotMissingImage"]["tmp_name"];
    $folder="content/puzzles/".$id;
    if(!file_exists($folder)){
        mkdir($folder,0777,true);
    }
    move_uploaded_file($correctImage,$folder."/correct.png");
    move_uploaded_file($wrongImage,$folder."/wrong.png");
    echo "<script>alert('Puzzle added successfully!');window.location='adminPanel.php';</script>";
}

//delete puzzle and score
if(isset($_POST['deletePuzzle'])){
    $puzzleId = $_POST['puzzleId'];
    $folderPath = "content/puzzles/" . $puzzleId;
    if(is_dir($folderPath)){
        $files = glob($folderPath . '/*');
        foreach($files as $file){
            if(is_file($file)) unlink($file);
        }
        rmdir($folderPath);
    }
    $deleteQuery = "DELETE FROM puzzles WHERE id='$puzzleId'";
    if(mysqli_query($conn, $deleteQuery)){
        $deleteScores = "DELETE FROM scores WHERE puzzleId='$puzzleId'";
        mysqli_query($conn, $deleteScores);
        echo "<script>alert('Puzzle deleted successfully');window.location.href='deletePuzzle.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error deleting puzzle');</script>";
    }
}
?>