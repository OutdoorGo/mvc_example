
<h3>Bienvenue <?php 

echo $user_data['prenom'].' '.$user_data['nom']?></h3>

<div id='results'>
<?php
    foreach ($user_bookmarks as $i =>$bookmark){
?>
    <div id='<?php $bookmark['id_bookmark']; ?>'>
        <div>
            <p><strong><?php echo $bookmark["nom"]; ?></strong></p>
            <p>-</p>
            <p><a href="<?php echo $bookmark['url']; ?>" target="_blank"><?php echo $bookmark['url']; ?></a></p>
            <p>-</p>
            <p><i>Ajouté le <?php echo $bookmark['date_ajout']; ?></i></p>
            <?php
            foreach($categories_bookmarks[$i] as $value){

                    if (isset($value))
                        echo '<p class="cat"><a href="'.$_SERVER['REQUEST_URI'].'&cat='.lcfirst(str_replace(" ","",$value['nom'])).'">'.$value['nom'].'</a></p>'; 
                }
            ?>
        </div>
        <div>
            <form action="index.php?action=connected" method="post">
            <input type="text" name="supprimer" value="<?php echo $bookmark['id_bookmark']; ?>">
            <input type="submit" value="Supprimer">
            </form>
        </div>
        
    </div>
<?php
    }
?>
</div>
</body>
</html>