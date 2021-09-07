<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
    <style>
        div {
            margin: 15px 0px 15px 0px;
        }
        p {
            margin: 2px;
        }
    </style>
</head>
<body>
    <form action="destroy.php">
    <button type="submit" name="destroy">Destroy</button>
    </form>
    <form action="settings.php" method="post">
        <div>
            <label for="nameFighter">Nom du premier combattant :</label>
            <input value="<?php if(isset($_SESSION['nameFighter'])) { echo $_SESSION['nameFighter']; }?>" name="nameFighter" type="text">
            <label for="classeFighter">Veuillez choisir une classe pour ce combattant :</label>
            <select name="classeFighter">
                <option value="" <?php if(isset($_SESSION['classeFighter'])=== false) { echo "selected"; }; ?> disabled hidden>--Classe--</option>
                <option value="Warrior" <?php if(isset($_SESSION['classeFighter'])) { if($_SESSION['classeFighter'] === "Warrior") { echo "selected";}} ?>>Warrior</option>
                <option value="Mage" <?php if(isset($_SESSION['classeFighter'])) { if($_SESSION['classeFighter'] === "Mage") { echo "selected";}} ?>>Mage</option>
                <option value="Berserker" <?php if(isset($_SESSION['classeFighter'])) { if($_SESSION['classeFighter'] === "Berserker") { echo "selected";}} ?>>Berserker</option>
                <option value="Assassin" <?php if(isset($_SESSION['classeFighter'])) { if($_SESSION['classeFighter'] === "Assassin") { echo "selected";}} ?>>Assassin</option>
                <option value="Knight" <?php if(isset($_SESSION['classeFighter'])) { if($_SESSION['classeFighter'] === "Knight") { echo "selected";}} ?>>Knight</option>
            </select>
        </div>
        <div>
            <label for="nameCombatant">Nom du deuxième combattant :</label>
            <input value="<?php if(isset($_SESSION['nameCombatant'])) { echo $_SESSION['nameCombatant']; }?>" name="nameCombatant" type="text">
            <label for="classeCombatant">Veuillez choisir une classe pour ce combattant :</label>
            <select name="classeCombatant">
            <option value="" <?php if(isset($_SESSION['classeCombatant'])=== false) { echo "selected"; }; ?> disabled hidden>--Classe--</option>
                <option value="Warrior" <?php if(isset($_SESSION['classeCombatant'])) { if($_SESSION['classeCombatant'] === "Warrior") { echo "selected";}} ?>>Warrior</option>
                <option value="Mage" <?php if(isset($_SESSION['classeCombatant'])) { if($_SESSION['classeCombatant'] === "Mage") { echo "selected";}} ?>>Mage</option>
                <option value="Berserker" <?php if(isset($_SESSION['classeCombatant'])) { if($_SESSION['classeCombatant'] === "Berserker") { echo "selected";}} ?>>Berserker</option>
                <option value="Assassin" <?php if(isset($_SESSION['classeCombatant'])) { if($_SESSION['classeCombatant'] === "Assassin") { echo "selected";}} ?>>Assassin</option>
                <option value="Knight" <?php if(isset($_SESSION['classeCombatant'])) { if($_SESSION['classeCombatant'] === "Knight") { echo "selected";}} ?>>Knight</option>
            </select>
        </div>
        <button type="submit" name="validation">Lancer un combat</button>
    </form>
    <?php
    if(isset($_SESSION['nameFighter']) && isset($_SESSION['classeFighter']) && isset($_SESSION['nameCombatant']) && isset($_SESSION['classeCombatant'])) :
        
        spl_autoload_register(function ($class_name) {
            include 'classes/' . $class_name . '.php';
        });
        
        $fighter = new $_SESSION['classeFighter'] ($_SESSION['nameFighter']);
        $combatant = new $_SESSION['classeCombatant'] ($_SESSION['nameCombatant']);
    ?>
        <div class="fight">
            <p> <?= $fighter->status() . " || " . $combatant->status();?> </p>
        </div>

        <?php while($fighter->isAlive() && $combatant->isAlive()) : ?>
            <?php $tour = rand(0, 1) ?>
            <div class="fight">
                <?php if ($tour === 0) : ?>
                    <p> <?= $fighter->action($combatant) // echo "$fighter->name a attaqué $combatant->name";?> </p>
                <?php else : ?>
                    <p> <?= $combatant->action($fighter) ?> </p>
                <?php endif ?>
                <p> <?= $fighter->status() . " || " . $combatant->status(); ?> </p>
            </div>
        <?php endwhile ?>
        
        <?php if($fighter->getLifePoints() <= 0) : ?>
            <div class="fight"> <p> <?="$combatant->name a gagné" ?> </p> </div>
        <?php else : ?>
            <div class="fight"> <p> <?="$fighter->name a gagné" ?> </p> </div>
        <?php endif ?>

    <?php else : ?>
        <div> <p> <?= "Veuillez sélectionner tous les paramètres" ?> </p> </div>
    <?php endif ?>
</body>
</html>