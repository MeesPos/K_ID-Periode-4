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
        <h1 class="headertekst">DE APP<?php echo $_SESSION['user_id']; ?></h1>
    </header>
    
    <section id="informatie">
        <div class="hintsover">
            <img src="img/Icon awesome-lightbulb.png" alt="Hints lichtbol">
            <h2 class="hintsovertekst">2 hints over</h2>
        </div>

        <div class="startinstruscties">
            <h2 class="volginstructies">Volg de juiste instructies die je krijgt,<br>en vindt de juiste persoon!</h2>
            <a href="#" class="beginbutton">
                <button class="begin">BEGIN ZOEKEN!</button>
            </a>
            <h2 class="succeszoeken">SUCCES MET ZOEKEN!</h2>
        </div>
    </section>

    <footer>
        <img src="img/whereswally-slider-logo.png" alt="Waar is Wally logo beneden">
    </footer>
</body>
</html>