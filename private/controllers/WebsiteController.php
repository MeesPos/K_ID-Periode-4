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
class WebsiteController {

	public function home() {

		$template_engine = get_template_engine();
		echo $template_engine->render('home');

	}

	public function ingelogdhome() {
		sessionCheck();

		$template_engine = get_template_engine();
		echo $template_engine->render('ingelogdhome');

	}

	public function gameover() {

		$template_engine = get_template_engine();
		echo $template_engine->render('game-over');

	}

	public function Level1() {

		$template_engine = get_template_engine();
		echo $template_engine->render('level1');
	}

}

