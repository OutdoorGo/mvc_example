
<h3>Bienvenue <?php 

echo $id['prenom'].' '.$id['nom']?></h3>

<div id='results'>
<?php
    foreach ($user_bookmarks as $bookmark){
?>
    <div id='<?php $bookmark['id_bookmark']; ?>'>
        <div>
                 <p><strong><?php echo $bookmark["nom"]; ?></strong></p>
                 <p>-</p>
                 <p><a href="<?php echo $bookmark['url']; ?>" target="_blank"><?php echo $bookmark['url']; ?></a></p>
                 <p>-</p>
                 <p><i>Ajouté le <?php echo $bookmark['date_ajout']; ?></i></p>
        </div>
    </div>
<?php
    }
?>
</div>
</body>
</html>