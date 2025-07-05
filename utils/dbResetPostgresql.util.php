<?php
declare(strict_types=1);

// 1) Composer autoload
require_once 'vendor/autoload.php';

// 2) Composer bootstrap
require_once 'bootstrap.php';

// 3) envSetter
$databases = require_once UTILS_PATH . '/envSetter.util.php';
$pgConfig = $typeConfig['postgres'];


$host = $pgConfig['pgHost'];
$port = $pgConfig['pgPort'];
$username = $pgConfig['pgUser'];
$password = $pgConfig['pgPassword'];
$dbname = $pgConfig['pgDB'];

// Connect to PostgreSQL
$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
$pdo = new PDO($dsn, $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";

// List your table names and corresponding model SQL files
$tables = [
    'users' => 'database/users.model.sql',
    // Add more tables and their model files here, e.g.:
    // 'posts' => 'database/posts.model.sql',
];

// Apply schema for each table
foreach ($tables as $table => $modelFile) {
    echo "Applying schema from {$modelFile}…\n";
    $sql = file_get_contents($modelFile);
    if ($sql === false) {
        throw new RuntimeException("Could not read {$modelFile}");
    } else {
        echo "Creation Success from the {$modelFile}\n";
    }
    $pdo->exec($sql);
}

// Truncate all tables
echo "Truncating tables…\n";
foreach (array_keys($tables) as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}
```php
// Just indicator it was working
echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');

// Another indicator but for failed creation
// All tables have been truncated and schemas applied successfully.
if ($sql === false) {
  throw new RuntimeException("Could not read database/users.model.sql");
} else {
    echo "Creation Success from the database/users.model.sql";
}

// If your model.sql contains a working command it will be executed
$pdo->exec($sql);
```
> repeat this code times the number of tables

- [ ] Make sure it clean the tables
```php
echo "Truncating tables…\n";
foreach (['users'] as $table) {
  $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
}
```