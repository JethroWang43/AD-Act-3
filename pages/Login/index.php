<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="../Login/assets/css/style.css"> 
</head>
<body>
    <div class="login-container">
        <h2 class="login-heading">Login</h2>

        <?php if (isset($_GET['error'])): ?>
            <p class="login-error">⚠️ <?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <form class="login-form" action="/handlers/auth.handler.php?action=login" method="POST">
            <label for="username">Username:</label>
            <input id="username" name="login_username" type="text" required />

            <label for="password">Password:</label>
            <input id="password" name="login_password" type="password" required />

            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
