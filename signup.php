<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Spokify | Sign-Up</title>
  <link rel="stylesheet" href="signup.css">
  <link href="https://fonts.googleapis.com/css2?family=Circular+Std:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="assets/Spotify_logo_without_text.svg" alt="Spotify Logo">
    </div>

    <h1>Sign up to start listening.</h1>

    <form method="post" action="index.php">
      <div class="input-group">
        <label for="first_name">Firstname</label>
        <input type="text" id="first_name" name="first_name" placeholder="First name" required>
      </div>

      <div class="input-group">
        <label for="last_name">Lastname</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last name" required>
      </div>

      <div class="input-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" placeholder="Phone number" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <span class="error-message" id="email-error">Please enter a valid email address.</span>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>
      </div>

      <div class="input-group">
        <label for="confirm_password">Repeat Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat your password" required>
        <span class="error-message" id="password-error">Passwords do not match.</span>
      </div>

      <button type="submit" name="signup" class="login-btn">Sign up</button>
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

    <div class="footer-links">
      <p>Already have an account? <a href="index.php">Log in</a></p>
      <a href="#">Terms and Conditions</a>
      <a href="#">Privacy Policy</a>
    </div>
  </div>

</body>
</html>