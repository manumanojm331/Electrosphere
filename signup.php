<?php
session_start();
// Initialize variables
$email = $password = $confirm_password = '';
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
        if (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters';
        }
    }

    // Validate confirm password
    if (empty($_POST['confirm_password'])) {
        $errors['confirm_password'] = 'Confirm password is required';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password !== $confirm_password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        require 'db_connect.php';

        try {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->execute([$email, $hashed_password]);

            // Successful registration - redirect to sign-in page
            $_SESSION['registration_success'] = true;
            header('Location: signin.php');
            exit;
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $errors['email'] = 'Email already exists';
            } else {
                $errors['db_error'] = 'Database error: ' . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Sign Up</title>
    <link rel="stylesheet" href="signin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                
                <h1>Create an Account</h1>
                <p>Please enter your details to sign up</p>
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
                            placeholder="Enter your password (min 8 characters)"
                            class="<?php echo isset($errors['password']) ? 'error-input' : ''; ?>"
                        >
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <span class="error-text"><?php echo $errors['password']; ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="confirm_password" 
                            name="confirm_password" 
                            placeholder="Confirm your password"
                            class="<?php echo isset($errors['confirm_password']) ? 'error-input' : ''; ?>"
                        >
                    </div>
                    <?php if (isset($errors['confirm_password'])): ?>
                        <span class="error-text"><?php echo $errors['confirm_password']; ?></span>
                    <?php endif; ?>
                </div>
                
                <button type="submit" class="btn-signin">Sign Up</button>
                
                <div class="signup-link">
                    Already have an account? <a href="signin.php">Sign In</a>
                </div>
            </form>
        </div>
        
        <div class="illustration">
            <img src="elctrospherelogo.png" alt="Electrosphere">
        </div>
    </div>
</body>
</html>