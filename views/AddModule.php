<div id="search">
        <form action="index.php?action=connected" method="post" >
            <div><label for="BookName">Nom</label>
            <input type="text" name="BookName" id="BookName">
            <label for="BookLink">Url</label>
            <input type="text" name="BookLink" id="BookLink">
            <input type="submit" value='Ajouter'>
            </div>
            <div id='category'>
            <?php 
                foreach($list_categories as $category){
                    $cat = lcfirst(str_replace(" ","",$category['nom']));
                    ?>
                    <label for="<?php echo $category['id_category']; ?>">
                        <input type="checkbox" id="<?php echo $category['id_category']; ?>" name="category[]" value="<?php echo $category['id_category']; ?>"> 
                        <?php echo $category['nom']; ?>
                    </label>
                    <?php
                }
            ?>
            </div>
        </form>
        <div>
        <form action="index.php?page=display" method="post">
            <p>Ajouter une nouvelle catégorie</p>
            <input type="text" name="nom_cat" id="nom_cat">
            <input type="submit" value='Ajouter'>
        </form>
        </div>
    </div>