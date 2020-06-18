<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}


// LEVEL TOEVOEGEN

function addLevel() {

}

// Inloggen & Registreren

function validateForm($post, $errors) {
	// Get info from POST
	$mail = $post['mail'];
	$wachtwoord = $post['password'];
	$herhaal_wachtwoord = $post['password-repeat'];

	// Check if mail exists
	if ( $mail === false) {
		$errors['email'] = 'Geen geldige email ingevuld';
	}

	// Check if password and repeat password are the same
	if ( $wachtwoord === $herhaal_wachtwoord ) {
		// If equal, check if password has 6 characters
		if ( strlen($wachtwoord) < 6 ) {
			$errors['wachtwoord'] = 'Wachtwoord bevat minder dan 6 tekens';
		}
	} else {
		$errors['herwachtwoord'] = 'Wachtwoord en herhaal wachtwoord zijn niet hetzelfde.';
	}

	$data = [
		'mail' 		 => $mail,
		'wachtwoord' => $wachtwoord
	];

	return [
		'data' 	 => $data,
		'errors' => $errors
	];
}

function isUserRegistered($mail) {
	$connection = dbConnect();
	$sql = 'SELECT * FROM `gebruikers` WHERE `email` = :email';
	$statement = $connection->prepare($sql);

	$statement->execute(['email' => $mail]);

	return ($statement->rowCount() === 0);
}

function createUser($data) {
	$connection = dbConnect();

    $sql =  "INSERT INTO `gebruikers` ( `email`,`wachtwoord`)
             VALUES (:email, :wachtwoord)";

    $statement = $connection->prepare($sql);

    $safe_wachtwoord = password_hash($data['wachtwoord'], PASSWORD_DEFAULT);

    $params = [
        'email' => $data['email'],
        'wachtwoord' => $safe_wachtwoord,
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
