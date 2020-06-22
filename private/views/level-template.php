<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 1</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/level1.css') ?>">
    <script src="https://kit.fontawesome.com/a82e000026.js"></script>
</head>

<body style="background: url(<?php echo site_url() . '/uploads/' . $levels['image'] ?>); height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover; " class="level-body">
    <div class="niveau">
        <h2><?php echo $levels['graad'] ?></h2>
    </div>

    <div class="choice-area-level" id="click-area" style="<?php echo $levels['css'] ?>"></div>


    <div class="vraag" id="myBtn">
        <i class="fas fa-question"></i>
        <div class="modal" id="myModal">
            <div class="modal-content">
                <div class="niveauhulp">
                    <img src="<?php echo site_url('/img/niveau-pijl.png') ?>" class="pijl niveaupijl">
                    <h2 class="niveauhulptekst">Niveau</h2>
                </div>

                <div class="hintshulp">
                    <img src="<?php echo site_url('/img/hints-pijl.png') ?>" class="pijl hintspijl">
                    <h2 class="hintshulptekst">Hints<br> over</h2>
                </div>

                <div class="schuifhulp">
                    <img src="<?php echo site_url('/img/schuif-pijl.png') ?>" class="pijl schuifpijl">
                    <h2 class="schuifhulptekst">Schuif naar rechts<br> voor hints</h2>
                </div>

                <div class="puntenhulp">
                    <img src="<?php echo site_url('/img/punten-pijl.png') ?>" class="pijl puntenpijl">
                    <h2 class="puntenhulptekst">Hoeveelheid<br>punten</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="hintscount" style="display: none;">
        <i class="fas fa-lightbulb"></i>
        <h2><?php echo $user['hints'] ?></h2>
    </div>

    <input type="checkbox" class="mijnhints" id="menu-schuiver" checked>
    <label for="menu-schuiver" class="mijnhints">
        <h2>Mijn<br>Hints</h2>
    </label>
    <div class="hints">
        <label for="menu-schuiver" class="haal-menu"><i class="far fa-times-circle"></i></label>
        <!-- Zet hier de hints neer! -->
        <div>
            <h2 class="mijn-hints">MIJN HINTS</h2>
            <span><i class="fas fa-search search-icons" ></i><p class="hint-text"><?php echo $levels['hint1'] ?></p></span>
            <span><i class="fas fa-search search-icons"></i><p class="hint-text"><?php echo $levels['hint2'] ?></p></span>
            <span><i class="fas fa-search search-icons"></i><p class="hint-text"><?php echo $levels['hint3'] ?></p></span>
            <span><i class="fas fa-search search-icons"></i><p class="hint-text"><?php echo $levels['hint4'] ?></p></span>

        </div>
    </div>

    <div class="puntencount">
        <h1><?php echo $punten ?></h1>
        <h2>Punten</h2>
    </div>

    <div class="form-div" style="display: none;">
        <form method="POST" action="<?php echo site_url('/play') . '/start/' . $levelCount ?>" id="form">
            <input type="hidden" name="currentPunten" value="<?php echo $punten ?>">
        </form>

    </div>
</body>

<script>
    let modal = document.getElementById("myModal");
    let btn = document.getElementById("myBtn");
    let gevonden = document.getElementById("click-area");
    let form = document.getElementById("form");


    btn.onclick = function() {
        modal.style.display = "block";
    }

    gevonden.onclick = function() {
        form.submit();
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>