<?php 
error_reporting(E_ALL||E_Notice);
include("EventStructure.php");
include("connexion.php");
include("GestionEvent.php");
    
?>
<html>
    <head>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta charset="utf-8">

    </head>
    <body>

<div class='AllEvent'>
<?php

foreach(GestionEvent::getAllEvent() as $values)
{
    echo "<div>".$values->getNomEvent(). "<div>";   
    echo "<div>".$values->getDescriptionEvent()."</div>";
    echo "<div>".$values->getDateEvent()."</div>";
    echo "<div><img width='80px'class='card-img-top' src=pictures/".$values->getImageName()." alt='Evennement pictures'>";
    echo "</div";
}


?>
</div>
</body>
</html>
<style>
    .AllEvent {
        width:800px;
        height:100px;
        padding:10px;
        margin : 50px auto ;
        display:flex;
    }
    .AllEvent div {
        width:200px;
        height:200px;
        background-color:#EEE;
        flex:1
    }
    </style>
