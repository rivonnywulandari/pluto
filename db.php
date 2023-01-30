<?php
  // DB Credentials
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'topsispluto');

  // Attempt to connect to MySQL
  try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
  } catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
  }