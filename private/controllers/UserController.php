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
class UserController
{

    public function inloggen()
    {

        if (isset($_POST)) {

            $redirectURL = url('home');
            redirect($redirectURL);
        }

        $template_engine = get_template_engine();
        echo $template_engine->render('addLevel');
    }

    public function displayRegistreren()
    {

        $template_engine = get_template_engine();
        echo $template_engine->render('registreren');
    }

    public function verwerkRegistreren()
    {
        $errors = [];

        // Returns validated data and errors
        $result = validateForm($_POST, $errors);

        if( $result['errors'] === 0 ) {
            if ( isUserRegistered($result['data']['email']) ) {
                // If not already registered, make account and log in
                createUser($result['data']);
                logUserIn($result['data']['email']);
            } else {
                $errors['user'] = 'U heeft al een account!';
            }
        }


        $template_engine = get_template_engine();
        echo $template_engine->render('registreren', ['errors' => $result['errors'] ] );
    }
}
