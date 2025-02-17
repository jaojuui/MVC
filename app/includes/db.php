<?php

function getConnection():mysqli
{
    $hostname = 'db';
    $dbName = 'enrollment';
    $username = 'demo';
    $password = 'abc123';
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// define('DATABASE_DIR', __DIR__ . '/../database');
require_once DATABASE_DIR . '/students.php';
require_once DATABASE_DIR . '/courses.php';
// 