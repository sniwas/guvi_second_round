<?php


$url = 'mongodb://localhost:27017';
$dbName = 'myapp';

// Connecting to mongo db
$client = new Mongodb\Client($url);


$users = $client->selectCollection($dbName, 'users');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $userData = [
    'name' => $_POST['name'],
    'age' => $_POST['age'],
    'phone' => $_POST['phone']
  ];

  
  $result = $users->insertOne($userData);

  if ($result->getInsertedCount() === 1) {
    echo 'User created successfully';
  } else {
    echo 'Failed to create user';
  }
}
?>
