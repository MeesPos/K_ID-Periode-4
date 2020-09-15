<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waar is Wally?</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/home.css') ?>">
</head>
<body>
    <?php ?>
    <header>
        <img src="<?php echo site_url() . "/img" ?>/waldohead.png" alt="Logo Wally">
        <h1 class="headertekst">DE APP</h1>
    </header>
    
    <section id="informatie">
        <div class="hintsover">
            <img src="<?php echo site_url() . "/img" ?>/Icon awesome-lightbulb.png" alt="Hints lichtbol">
            <h2 class="hintsovertekst"><?php echo $userInfo ?> hints over</h2>
        </div>

        <div class="startinstruscties">
            <h2 class="volginstructies">Druk links op de hints <br>en vindt de juiste persoon <br> naar wie de hints leiden!</h2>
            <a href="<?php echo site_url() . '/play/start' ?>" class="beginbutton">
                <button class="begin">BEGIN ZOEKEN!</button>
            </a>
            <h2 class="succeszoeken">SUCCES MET ZOEKEN!</h2>
        </div>
    </section>

    <footer>
        <img src="<?php echo site_url() . "/img" ?>/whereswally-slider-logo.png" alt="Waar is Wally logo beneden">
    </footer>
</body>
</html>