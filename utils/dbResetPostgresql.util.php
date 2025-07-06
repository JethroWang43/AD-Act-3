<?php
declare(strict_types=1);

// 1) Composer autoload
require 'vendor/autoload.php';

// 2) Composer bootstrap
require 'bootstrap.php';

// 3) Environment setter
require_once UTILS_PATH . '/envSetter.util.php';

// ————————————————————————————————
// 🔗 Connect to PostgreSQL
// ————————————————————————————————
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['password'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "📄 Applying schema from database/models/user.model.sql…\n";

// 📥 Load the SQL schema
$sqlPath = BASE_PATH . '/database/models/user.model.sql';
$sql = file_get_contents($sqlPath);

// ❌ Error if schema couldn't be read
if ($sql === false) {
    echo "❌ Failed to read: $sqlPath\n";
    throw new RuntimeException("Could not read $sqlPath");
} else {
    echo "✅ Schema read successfully from $sqlPath\n";
}

// ▶ Execute schema
$pdo->exec($sql);
echo "🏗️  Tables created successfully.\n";

// ————————————————————————————————
// 🧹 Clean up tables
// ————————————————————————————————
echo "🧼 Truncating tables and resetting IDs…\n";
$tables = ['users'];

foreach ($tables as $table) {
    $pdo->exec("TRUNCATE TABLE {$table} RESTART IDENTITY CASCADE;");
    echo "🔁 Truncated: {$table}\n";
}

echo "✅ All selected tables cleaned.\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
