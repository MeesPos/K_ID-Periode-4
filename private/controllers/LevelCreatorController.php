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
class LevelCreatorController
{

    public function startLevelCreation()
    {
        $template_engine = get_template_engine();
        echo $template_engine->render('addLevelStart');
    }

    public function levelEditor()
    {
        $errors = [];
        // Process given image, return if errors
        $newFileName = verwerkFotoUpload($_FILES['image'], $errors);


        $template_engine = get_template_engine();
        echo $template_engine->render('levelEditor', [ 'imagePath' => $newFileName ] );
    }

    public function addLevelForm()
    {
        $imagePath = $_POST['imagePath'];

        $template_engine = get_template_engine();
        echo $template_engine->render('addLevelForm', [ 'imagePath' => $imagePath ] );
    }

    public function addLevelProcessing()
    {
        // Add level to database with form data
        addLevel($_POST);

        $redirectURL = url('ingelogd.home');
        redirect($redirectURL);
    }

    
}
