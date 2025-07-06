<?php
declare(strict_types=1);

// 1. Composer autoload
require 'vendor/autoload.php';

// 2. Bootstrap (loads .env and constants)
require 'bootstrap.php';

// 3. Load environment configuration
require_once UTILS_PATH . '/envSetter.util.php';

// 4. Connect to PostgreSQL
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "🔁 Starting PostgreSQL migration...\n";

// 5. Drop old tables
echo "🧨 Dropping old tables...\n";
$tables = ['projects', 'users'];

foreach ($tables as $table) {
    $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
    echo "❎ Dropped: {$table}\n";
}

// 6. Apply updated schema
echo "📄 Applying schema from database/models/user.model.sql...\n";

$sqlPath = BASE_PATH . '/database/models/user.model.sql';
$sql = file_get_contents($sqlPath);

if ($sql === false) {
    throw new RuntimeException("❌ Could not read $sqlPath");
}

$pdo->exec($sql);
echo "✅ Migration complete: Schema applied successfully.\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
