<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
    <?php session_start(); ?>
</head>
<body>

<ul>
    <li><a href="/index.php?action=login">Connexion</a></li>
    <li><a href="/index.php?action=create_user">S'enregistrer</a></li>
    <li><a href="/index.php?action=display_data_user">Afficher les signets</a></li>
</ul>