<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level 1</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/level-template.css') ?>">
    <script src="https://kit.fontawesome.com/a82e000026.js"></script>
</head>

<body style="background: url(<?php echo site_url() . '/uploads/' . $imagePath ?>); height: 100%;background-position: center;background-repeat: no-repeat;background-size: cover; " class="level-body">
    <div class="choice-area" style="width: 150px; height: 150px;"></div>
    <form action="<?php echo site_url() . '/add-level-form' ?>" method="POST" >
         <input type="hidden" name="imagePath" value="<?php echo $imagePath ?>">
         <input type="submit" class="continue-button" value="Ga door" >
      </form>
    <a href="<?php echo site_url() . '/create-level-start' ?>"><button class="andere-foto-button">Selecteer andere foto</button></a>
</body>

</html>