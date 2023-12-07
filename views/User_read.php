
    <!-- <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo $user['nom']; ?> - <?php echo $user['mail']; ?></li>
        <?php endforeach; ?>
    </ul>
    <form action="?action=create_user" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">
        <label for="mail">Mail</label>
        <input type="text" name="mail" id="mail">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password">
        <input type="submit" value="Créer">
    </form> -->



    <h1>Se connecter</h1>
    <!-- <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo $user['nom']; ?> - <?php echo $user['mail']; ?></li>
        <?php endforeach; ?>
    </ul> -->
    <form action="?action=login" method="POST">
        <label for="mail">Login</label>
        <input type="text" name="mail" id="mail">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password">
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
