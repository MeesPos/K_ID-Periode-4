<?php
// Dit bestand hoort bij de router, enb bevat nog een aantal extra functiesdie je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect() {

	$config = get_config( 'DB' );

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO( $dsn, $config['USER'], $config['PASSWORD'] );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

		return $connection;

	} catch ( \PDOException $e ) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}

}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url( $path = '' ) {
	return get_config( 'BASE_URL' ) . $path;
}

function get_config( $name ) {
	$config = require __DIR__ . '/config.php';
	$name   = strtoupper( $name );

	if ( isset( $config[ $name ] ) ) {
		return $config[ $name ];
	}

	throw new \InvalidArgumentException( 'Er bestaat geen instelling met de key: ' . $name );
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine() {

	$templates_path = get_config( 'PRIVATE' ) . '/views';

	return new League\Plates\Engine( $templates_path );

}

/**
 * Geef de naam (name) van de route aan deze functie, en de functie geeft
 * terug of dat de route is waar je nu bent
 *
 * @param $name
 *
 * @return bool
 */
function current_route_is( $name ) {
	$route = request()->getLoadedRoute();

	if ( $route ) {
		return $route->hasName( $name );
	}

	return false;

}

function sessionCheck() {
	if ( ! isset($_SESSION) ){
		session_start();
	} 
}

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

function verwerkFotoUpload($myfile, $errors)
{

	// Check of er uberhaupt een file is geupload
	if (!isset($_FILES['image'])) {
		$errors['upload'] = 'Geen file ge upload';
	}

	//  Checken van upload fouten
	$file_error = $myfile['error'];
	switch ($file_error) {
		case UPLOAD_ERR_OK:
			break;
		case UPLOAD_ERR_NO_FILE:
			$errors['myfile'] = 'Er is geen bestand geupload';
			break;
		case UPLOAD_ERR_CANT_WRITE:
			$errors['myfile'] = 'Kan niet schrijven naar disk';
			break;
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			$errors['myfile'] = 'Dit bestand is te groot, pas php.ini aan';
			break;
		default:
			$errors['myfile'] = 'Onbekeden fout';
	}

	if (count($errors) === 0) {

		$file_name = $myfile['name'];
		$file_size = $myfile['size'];
		$file_tmp = $myfile['tmp_name'];
		$file_type = $myfile['type'];

		// Is het een afbeelding check  
		$valid_image_types = [
			2 => 'jpg',
			3 => 'png'
		];
		$image_type        = exif_imagetype($file_tmp);
		if ($image_type !== false) {
			// Juiste extensie opzoeken, die gaan we zo gebruiken bij het maken van de nieuwe bestandsnaam
			$file_extension = $valid_image_types[$image_type];
		} else {
			$errors['myfile'] = 'Dit is geen afbeelding!';
		}
	}

	if (count($errors) === 0) {

		// Bestandsnaam genereren
		$new_filename   = sha1_file($file_tmp) . '.' . $file_extension;
		$final_filename = 'uploads/' . $new_filename;

		// met move_uploaded_file verplaats je het tijdelijke bestand naar de uiteindelijke plek
		move_uploaded_file($file_tmp, $final_filename); // dus van tijdelijke bestandsnaam naar de originele naam (in de huidige map);

		return $new_filename;
	}
}