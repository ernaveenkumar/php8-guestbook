<?php

function connectionDb():PDO{

  $pdo = new PDO('sqlite:'. DB_DIR . '/' . 'db.sqlite');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}

function loadSchema(PDO $pdo, string $schemFile){

  $sql = file_get_contents($schemFile);
  if(false === $sql){
    die("Failed to load schema from file: $schemFile");
  }

  $pdo->exec($sql);
  echo "Schema loaded successfully.\n";
}

function insertMessage(PDO $pdo, string $name, string $email, string $message):bool{
  
  $sql = "INSERT INTO messages (name, email, message) values(:name, :email, :message)";

  $stmt = $pdo->prepare($sql);
  
  
  $stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':message' => $message
  ]);

  return $stmt->rowCount() > 0;
}

function getMessage(PDO $pdo) : array{
  $sql = "SELECT * FROM messages ORDER BY created_at";
  $stmt = $pdo->query($sql);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}