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
        <img src="img/waldohead.png" alt="Logo Wally">
        <h1 class="headertekst">DE APP</h1>
    </header>

    <div class="content">
        <form action=" <?php echo "#" ?> " method="POST" class="login-form">
            <input type="text" name="mail" id="mail-input" placeholder="E-mail"><br>
            <input type="password" name="password" id="password-input" placeholder="Wachtwoord">
            <input type="submit" name="submit" value="Inloggen" class="login-submit">
        </form>
        <div class="registreer-div">
            <p class="registreer-p"> Nog geen speurder? <a href=" <?php echo url('display.registreren') ?> " class="registreer-a">Registreer</a></p>
        </div>
    </div>

    <footer class="loginfooter">
        <img src="img/whereswally-slider-logo.png" alt="Waar is Wally logo beneden">
    </footer>
</body>
</html>