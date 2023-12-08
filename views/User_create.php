<h1>S'enregistrer</h1>
<form action="?action=create_user" method="POST">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom">
    <label for="mail">Mail</label>
    <input type="text" name="mail" id="mail">
    <label for="password">Mot de passe</label>
    <input type="text" name="password" id="password">
    <input type="submit" value="Créer le compte">
</form>


<?php
// header("Location: index.php");
?>


<h2>User List</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo $user['nom']; ?> - <?php echo $user['mail']; ?></li>
    <?php endforeach; ?>
</ul>