<?php

function checkPostgreConnection() {
    $host = "host.docker.internal"; 
    $port = "5555";
    $username = "user";
    $password = "password";
    $dbname = "calendardb";

    $conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";

    $dbconn = pg_connect($conn_string);

    if (!$dbconn) {
        return "❌ PostgreSQL connection failed: " . pg_last_error();
    } else {
        pg_close($dbconn);
        return "✅ Connected to PostgreSQL successfully.";
    }
}
