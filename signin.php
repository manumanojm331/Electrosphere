<?php
session_start();

// Initialize variables
$email = $password = '';
$errors = [];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } else {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email';
        }
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } else {
        $password = trim($_POST['password']);
    }

    // If no errors, proceed with authentication
    if (empty($errors)) {
        require 'db_connect.php';

        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Successful login - start session and redirect
                $_SESSION['user_email'] = $email;
                header('Location: homepage.php');
                exit;
            } else {
                $errors['login'] = 'Invalid email or password';
            }
        } catch (PDOException $e) {
            $errors['db_error'] = 'Database error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sign In</title>
    <link rel="stylesheet" href="signin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h1>Welcome</h1>
                <p>Please enter your credentials to sign in</p>
                <?php if (isset($errors['login'])): ?>
                    <div class="alert error"><?php echo $errors['login']; ?></div>
                <?php endif; ?>
                <?php if (isset($errors['db_error'])): ?>
                    <div class="alert error"><?php echo $errors['db_error']; ?></div>
                <?php endif; ?>
            </div>
            
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="signin-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Enter your email" 
                            value="<?php echo htmlspecialchars($email); ?>"
                            class="<?php echo isset($errors['email']) ? 'error-input' : ''; ?>"
                        >
                    </div>
                    <?php if (isset($errors['email'])): ?>
                        <span class="error-text"><?php echo $errors['email']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password"
                            class="<?php echo isset($errors['password']) ? 'error-input' : ''; ?>"
                        >
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-text"><?php echo $errors['password']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                
                <button type="submit" class="btn-signin">Sign In</button>
                <div class="signup-link">
                    Don't have an account? <a href="signup.php">Sign up</a>
                </div>
            </form>
        </div>
        
        <div class="illustration">
            <img src="elctrospherelogo.png" alt="Electrosphere">
        </div>
    </div>
</body>
</html>