<?php

// Challenge: make this terrible code safe


echo "<!doctype html>\n";

$username = @$_GET['username'] ? $_GET['username'] : '';
$password = @$_GET['password'] ? $_GET['password'] : '';
$password = md5($password);

$pdo = new PDO('sqlite::memory:');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("DROP TABLE IF EXISTS users");
$pdo->exec("CREATE TABLE users (username VARCHAR(255), password VARCHAR(255))");

$rootPassword = md5("secret");
$pdo->exec("INSERT INTO users (username, password) VALUES ('root', '$rootPassword');");

$statement = $pdo->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

if (count($statement->fetchAll())) {
    echo "Access granted to $username!<br>\n";
} else {
    echo "Access denied for $username!<br>\n";
}

