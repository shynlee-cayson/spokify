<?php
session_start();
include('connect.php');

$error_message = "";
$success_message = "";

// FOR LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            header("Location: homepage.php");
            exit();
        } else {
            $error_message = "Invalid credentials!";
        }
    } else {
        $error_message = "No user found with that email!";
    }
}
// FOR SIGN-UP
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        $plain_password = $password;

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email already exists!";
        } else {
            $query = "INSERT INTO users (first_name, last_name, phone_number, email, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssss", $first_name, $last_name, $phone_number, $email, $plain_password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $success_message = "Signup successful! You can now login.";
            } else {
                $error_message = "Error signing up!";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spokify | Login</title>
    <link rel="stylesheet" href="spokify.css">
    <link href="https://fonts.googleapis.com/css2?family=Circular+Std:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="assets/Spotify_logo_without_text.svg" alt="Spotify Logo">
        </div>

        <div class="form-container">
            <h1>Log in to Spokify</h1>

            <form method="post" action="index.php">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" name="login" class="login-btn">Log In</button>

                <a href="#" class="forgot-password">Forgot your password?</a>
            </form>

            <div class="social-login">
                <button class="social-btn facebook">
                    <img src="assets/fbIcon.png" alt="Facebook Logo">
                    <span>Continue with Facebook</span>
                </button>
                <button class="social-btn google">
                    <img src="assets/googleIcon.png" alt="Google Logo">
                    <span>Continue with Google</span>
                </button>
            </div>

            <p class="signup-link">Don't have an account? <a href="signup.php">Sign up for Spokify</a></p>
        </div>
    </div>

    <?php if (!empty($error_message)): ?>
        <script>
            alert("<?php echo $error_message; ?>");
        </script>
    <?php endif; ?>

    <?php if (!empty($success_message)): ?>
        <script>
            alert("<?php echo $success_message; ?>");
        </script>
    <?php endif; ?>
</body>
</html>