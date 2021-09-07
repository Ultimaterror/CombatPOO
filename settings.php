<?php
session_start();

if(isset($_POST)){
    if(!empty($_POST['nameFighter'])){
        $_SESSION['nameFighter'] = $_POST['nameFighter'];
    }
    if(!empty($_POST['classeFighter'])){
        $_SESSION['classeFighter'] = $_POST['classeFighter'];
    }
    if(!empty($_POST['nameCombatant'])){
        $_SESSION['nameCombatant'] = $_POST['nameCombatant'];
    }
    if(!empty($_POST['classeCombatant'])){
        $_SESSION['classeCombatant'] = $_POST['classeCombatant'];
    }
}

header('Location: index.php');