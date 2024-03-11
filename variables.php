<?php

// Récupération des variables à l'aide du client MySQL
$usersStatement = $dbChatServer->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll(PDO::FETCH_ASSOC);

$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/chat-sherver';
$rootUrl = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/chat-server/';
