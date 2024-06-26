<?php require "partials/header.php"; ?>

<div class = "recipes">
    <div class="up-container">
        <form class="selection-form" action="/recipes" method="POST">
            <label for="category"></label>
            <select id="category" name="category">
                <option value="Kaikki reseptit">Kaikki reseptit</option>
                <option value="aamiainen">Aamiainen</option>
                <option value="pääruoka">Pääruoka</option>
                <option value="välipala">Välipala</option>
                <option value="jälkiruoka">Jälkiruoka</option>
            </select>
            <button class="yellow-button" type="submit">Submit</button>
        </form>
        <button class="yellow-button"><a href="/add_recipe">Uusi resepti</a></button>
    </div>
    
    <?php

    foreach($allrecipes as $recipe): ?>
        
        <div class='inner-recipe'>
            <div class="inner-recipe-image">
                <img class="inner-recipe-img" src=".././images/<?php echo $recipe["image"]; ?>">
            </div>
            <div class="inner-recipe-info">
                <h3 class="small-title"><?=$recipe["name"] ?></h3>
                <p class="category"><?=$recipe["category"]?></p>
                <p><?=$recipe["ingredients"]?></p>
                <p><?=$recipe["preparation"]?></p>
                <p class="bold">By user: <?=$recipe["userName"]?></p>
                <p class="bold"><?=$recipe["additionDate"]?></p>
                <div class="buttons-container">
                    <a class="read-recipe" href='/recipe?id=<?=$recipe["recipeID"]?>'>Lue lisää</a>
                    <?php
                        if(isLoggedIn() && ($recipe["userID"] == $_SESSION["userID"])):
                        $id = $recipe['recipeID'];
                        $recipeId = 'deleteNews' . $id; ?>

                    <a class="edit-recipe" href='/update_recipe?id=<?=$id?>'>Päivitä</a>

                    <a class="delete-recipe" id=<?=$recipeId ?> onClick='confirmDelete(<?=$id?>)' href='/delete_recipe?id=<?=$id?>'>Poista</a>
                
                    <?php endif; ?>
            </div>
            </div>  
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>