<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waar is Wally?</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/home.css') ?>">
</head>

<body>
    <header>
        <a href="<?php echo site_url(); ?>"><img src="<?php echo site_url() . "/img/waldohead.png" ?>" alt="Logo Wally"></a>
        <h1 class="headertekst">DE APP</h1>
    </header>

    <div class="content">
        <form action=" <?php echo url('verwerk.registreren') ?> " method="POST" class="registreren-form">
            <input type="email" name="mail" id="mail-input" placeholder="E-mail">
            <input type="password" name="password" id="password-input" placeholder="Wachtwoord">
            <input type="password" name="password-repeat" id="password-input" placeholder="Herhaal Wachtwoord">
            <input type="submit" name="submit" value="Registreren" class="login-submit">
        </form>
        <div class="errors">
            <?php if (isset($errors)) {
                foreach ($errors as $row) { ?>
                    <p class="error-message"><?php echo $row ?></p>
                <?php    } ?>
                <a href="<?php echo site_url(); ?>"><button class="teruginloggen">Terug naar inloggen</button></a>
            <?php   } ?>
        </div>
    </div>

    <footer>
        <img src="<?php echo site_url() . "/img/whereswally-slider-logo.png" ?>" alt="Waar is Wally logo beneden">
    </footer>
</body>

</html>