<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	SimpleRouter::get( '/level1', 'WebsiteController@Level1' )->name( 'level-1' );


	SimpleRouter::get( '/game-over', 'WebsiteController@gameover')->name( 'game-over' );

	// Menus
	SimpleRouter::get( '/play', 'WebsiteController@ingelogdhome' )->name( 'ingelogd.home' );
	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );


	// Login & register routes
	SimpleRouter::get( '/login', 'UserController@login' )->name( 'login' );
	SimpleRouter::get( '/registreer-pagina', 'UserController@displayRegistreren' )->name( 'display.registreren' );
	SimpleRouter::post( '/registreer-verwerken', 'UserController@verwerkRegistreren' )->name( 'verwerk.registreren' );


	// Add Level route
	SimpleRouter::get( '/addLevel', 'LevelController@addLevel' )->name('addLevel');


	// STOP: Tot hier al je eigen URL's zetten
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

