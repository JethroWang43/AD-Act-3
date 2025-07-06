<?php
require_once __DIR__ . '/envSetter.util.php'; // loads .env and config
require_once BASE_PATH . '/vendor/autoload.php';

class Auth
{
    // Start session if not started
    public static function init()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Attempt login
    public static function login(PDO $pdo, string $username, string $password): bool
    {
        // Query user by username
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false; // Username doesn't exist
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return false; // Password mismatch
        }

        // Store user in session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];

        return true;
    }

    // Get logged in user data
    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    // Check if user is logged in
    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    // Logout the user
    public static function logout(): void
    {
        // Remove session and cookies
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        session_destroy();

        // Optional: Clear cookies
        setcookie(session_name(), '', time() - 3600, '/');
    }
}
