<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `gebruikers`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

function getUser() {
	$connection = dbConnect();
	$sql        = 'SELECT * FROM `gebruikers` WHERE `id` = :id ';
	$statement  = $connection->prepare( $sql );
	$statement->execute([ 'id' => $_SESSION['user_id'] ]);
	return $statement->fetch();
}


// LEVEL TOEVOEGEN

function addLevel($info) {
	$connection = dbConnect();
	$sql        = 'INSERT INTO `levels` ( `image`, `graad`, `hint1`, `hint2`, `hint3`, `hint4`, `css`) 
                   VALUES ( :imagePath, :graad, :hint1, :hint2, :hint3, :hint4, :css) ';
    $statement  = $connection->prepare( $sql );
    
    $params = [
        'imagePath' => $info['imagePath'],
        'graad'     => $info['graad'],
        'hint1'     => $info['hint1'],
        'hint2'     => $info['hint2'],
        'hint3'     => $info['hint3'],
        'hint4'     => $info['hint4'],
        'css'       => $info['css']
    ];

	$statement->execute($params);
}

// Inloggen & Registreren

function isUserRegistered($mail) {
	$connection = dbConnect();
	$sql = 'SELECT * FROM `gebruikers` WHERE `email` = :email';
	$statement = $connection->prepare($sql);

	$statement->execute(['email' => $mail]);

	return ($statement);
}

function createUser($data) {
	$connection = dbConnect();

    $sql =  'INSERT INTO `gebruikers` ( `email`,`wachtwoord`, `hints`)
             VALUES (:email, :wachtwoord, 3)';

    $statement = $connection->prepare($sql);

    $safe_wachtwoord = password_hash($data['wachtwoord'], PASSWORD_DEFAULT);

    $params = [
        'email' => $data['mail'],
        'wachtwoord' => $safe_wachtwoord
    ];

    $statement->execute($params);
}

function logUserIn($mail) {
	$connection = dbConnect();
    // Get userId via email
    $getIdQuery = 'SELECT * FROM `gebruikers` WHERE `email` = :email ';
    $statement = $connection->prepare($getIdQuery);

    $param = [
        'email' => $mail
    ];
    $statement->execute($param);

    // Create session
	$userInfo = $statement->fetch();
	session_start();
    $_SESSION['user_id']    = $userInfo['id'];
}

// Playing

function getLevels() {
    $connection = dbConnect();
	$sql        = "SELECT * FROM `levels` ";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

function getLevelsWithOffset($offset) {
    $connection = dbConnect();
	$sql        = 'SELECT * FROM `levels` ORDER BY `id` LIMIT 1 OFFSET ' . ':offset ';
    $statement  = $connection->prepare( $sql );
    
    $params = [
        'offset' => $offset
    ];

    $statement->execute($params);
	return $statement->fetchAll();
}