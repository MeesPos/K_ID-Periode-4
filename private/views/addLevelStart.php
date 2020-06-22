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
    <form action="<?php echo site_url() . '/level-editor' ?>" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" accept="image/*" class="upload-file"/>
         <input type="submit" class="teruginloggen submitupload"/>
      </form>
    <h3 class="grootte">GROOTTE: 375x912 ALSJEBLIEFT</h3>
    </div>

    <?php if (isset($errors)) {
                foreach ($errors as $row) { 
                    echo $row; 
                }
    } ?>

    <footer class="loginfooter">
        <img src="<?php echo site_url() . "/img" ?>/whereswally-slider-logo.png" alt="Waar is Wally logo beneden">
    </footer>
</body>