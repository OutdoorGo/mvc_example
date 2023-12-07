<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?php echo $user['name']; ?> - <?php echo $user['age']; ?></li>
        <?php endforeach; ?>
    </ul>
    <form action="?action=create" method="POST">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
        <label for="age">Nom</label>
        <input type="text" name="age" id="age">
        <input type="submit" value="Créer">
    </form>
</body>
</html>
