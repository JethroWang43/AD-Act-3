<?php 
declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

try {
 
    $dsn = "pgsql:host={$_ENV['POSTGRES_HOST']};port={$_ENV['POSTGRES_PORT']};dbname={$_ENV['POSTGRES_DB']}";
    $pdo = new PDO($dsn, $_ENV['POSTGRES_USER'], $_ENV['POSTGRES_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $modelFiles = [
        'user.model.sql',
        'meeting.model.sql',
        'meeting_users.model.sql',
        'task.model.sql',
    ];

    foreach ($modelFiles as $file) {
        $modelPath= BASE_PATH . '/database/' . $file;

        if (!file_exists($modelPath)) {
            echo "X Could not Read $file\n";
            continue;
        }

        echo "📦 Applying schema from database/$file…\n\n";
        $sql = file_get_contents($modelPath);
        
        if(trim($sql) == ''){
            echo "⚠️ Skipped empty SQL file: $file\n\n";
            continue;
        }
        
        echo "💥 DEBUG: Content of $file:\n\n$sql\n\n";
        $pdo->exec($sql);
        echo "✅ Schema applied successfully from $file\n\n";
    }

    echo "Seeding useeeeers...\n";

    $users = require_once STATICDATA_PATH . '/dummies/users.staticData.php';

     $stmt = $pdo->prepare("
        INSERT INTO users (username, role, first_name, last_name, password)
        VALUES (:username, :role, :fn, :ln, :pw)
    ");

    foreach ($users as $use) {
        $stmt -> execute ([
            ':username' => $use['username'],
            ':role' => $use['role'],
            ':fn' => $use['first_name'],
            ':ln' => $use['last_name'],
            ':pw' => password_hash($use['password'], PASSWORD_DEFAULT),
        ]);
    }
    echo "✅ Users seeded successfully\n\n";
} catch (PDOException $ex) {
    echo "❌ Error seeding users: " . $ex->getMessage() . "\n";
    exit(255);
}