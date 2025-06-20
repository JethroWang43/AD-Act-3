<?php
function checkMongoDBConnection() {
    try {
        $mongo = new MongoDB\Driver\Manager("mongodb://host.docker.internal:23567");
        $command = new MongoDB\Driver\Command(["ping" => 1]);
        $mongo->executeCommand("admin", $command);

        return "✅ Connected to MongoDB successfully.";
    } catch (MongoDB\Driver\Exception\Exception $e) {
        return "❌ MongoDB connection failed: " . $e->getMessage();
    }
}
