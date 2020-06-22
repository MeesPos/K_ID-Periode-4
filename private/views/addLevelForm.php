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
        <img src="<?php echo site_url() . "/img" ?>/waldohead.png" alt="Logo Wally">
        <h1 class="headertekst">DE APP</h1>
    </header>

    <div class="content-wrap-ALS">
    <form action="<?php echo site_url() . '/add-level-processing' ?>" method="POST" class="levelgegevens">
         <input type="hidden" name="imagePath" value="<?php echo $imagePath ?>">
         <input type="text" name="graad" id="graad" placeholder="Moelijkheidsgraad">
         <input type="text" name="hint1" id="hint1" placeholder="Hint 1">
         <input type="text" name="hint2" id="hint2" placeholder="Hint 2">
         <input type="text" name="hint3" id="hint3" placeholder="Hint 3">
         <input type="text" name="hint4" id="hint4" placeholder="Hint 4">
         <input type="text" name="css" id="css" placeholder="css code na style:' ">
         <input type="submit" class="submitformie"/>
      </form>
    </div>

    <footer class="loginfooter">
        <img src="<?php echo site_url() . "/img" ?>/whereswally-slider-logo.png" alt="Waar is Wally logo beneden">
    </footer>
</body>