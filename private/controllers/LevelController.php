<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class LevelController {

	public function startPlaying() {

		sessionCheck();

		$levels = getLevels();
		$user	= getUser();

		$levelCount = 0;
		$punten		= 0;

		$template_engine = get_template_engine();
		echo $template_engine->render('level-template', [ 'levelCount' => $levelCount, 'user' => $user, 'levels' => $levels[$levelCount], 'punten' => $punten]);

	}

	public function nextLevel($levelCount) {

		sessionCheck();

		$punten 		  = $_POST['currentPunten'];
		$levelCount 	 += 1;
		$punten			 += 1;

		$levels = getLevels();
		$user	= getUser();

		

		$template_engine = get_template_engine();
		echo $template_engine->render('level-template', [ 'levelCount' => $levelCount, 'user' => $user, 'levels' => $levels[$levelCount], 'punten' => $punten]);

	}

}

