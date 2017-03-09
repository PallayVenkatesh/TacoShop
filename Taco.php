<?php

require 'Controller/TacoController.php';
$tacoController = new TacoController();

if(isset($_POST['types']))
{
    
    $tacoTables = $tacoController->CreateTacoTables($_POST['types']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $tacoTables = $tacoController->CreateTacoTables('%');
}

//Output page data
$title = 'Tacos overview';
$content = $tacoController->CreateTacoDropdownList(). $tacoTables;

include 'Template.php';
?>

