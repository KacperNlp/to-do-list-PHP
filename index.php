<?php

declare(strict_types=1);

namespace App;

require_once('./backend/UrlHandler.php');

$urlHandler = new UrlHandler();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App to do list!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.min.css">
</head>

<body>
    <div class="page">
        <header>
            <?php require_once('./templates/components/Navigation.php'); ?>
        </header>
        <main>
            <?php require_once('./templates/components/MainContent.php'); ?>
        </main>
    </div>
    <?php require_once('./templates/components/Footer.php'); ?>
    <script src="dist/bundle.js"></script>
</body>

</html>