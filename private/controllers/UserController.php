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
        $template_engine = get_template_engine();
        echo $template_engine->render('home');
    }

    public function verwerkLogin()
    {
        $errors = [];

        $statement = isUserRegistered($_POST['mail']);
        if ($statement->rowCount() === 1) {
            // When row found -> Get user
            $gebruiker = $statement->fetch();

            // Password check
            if (password_verify($_POST['password'], $gebruiker['wachtwoord'])) {
                
                logUserIn($_POST['mail']);

                $redirectURL = url('ingelogd.home');
                redirect($redirectURL);
            } else {
                $errors['wachtwoord'] = 'Fout wachtwoord';
            }
        } else {
            $errors['email'] = 'Onbekend account';
        }

        $template_engine = get_template_engine();
        echo $template_engine->render('home', ['errors' => $errors]);
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
        if( count($result['errors']) === 0 )  {
            $statement = isUserRegistered($result['data']['mail']);
            if ( $statement->rowCount() === 0 ) {
                // If not already registered, make account and log in
                createUser($result['data']);
                logUserIn($result['data']['mail']);
            
                $redirectURL = url('ingelogd.home');
                redirect($redirectURL);
            } else {
                $result['errors']['user'] = 'U heeft al een account!';
            }
        }


        $template_engine = get_template_engine();
        echo $template_engine->render('registreren', ['errors' => $result['errors'] ] );
    }

    public function uitloggen()
    {
        session_start();
        session_destroy();

        $template_engine = get_template_engine();
        echo $template_engine->render('home');
    }
}
