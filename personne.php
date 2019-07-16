<?php 
error_reporting(E_ALL||E_Notice);
include("EventStructure.php");
include("connexion.php");
include("GestionEvent.php");
  ?>

<html>
<head>
<title> gestion des Evennement || Zone Administrateur </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<script src='script/animation.js'>
</script>
<link rel="stylesheet" href="styles/styleA.css"> 
</head>

<body>
<div class="jumbotron text-center" style='background-color:#34495e ; color:#ecf0f1;'>
  <h1>centre lll  </h1>
  <p>zone Administrateur </p> 
</div>

<form method="POST" enctype="multipart/form-data">
<fieldset>
<legend id="AddEvent">Ajouter Un evennement </legend>
<table class="addEvent table table-bordred">
<div class="form-group">
<tr><td> Numero de l'event </td><td><input class="form-control" name="idEvent" type="number" min="1" max="1000"></td></tr>
<tr><td> Nom de l'evennement </td><td> <input type="text" class="form-control" name="nomEvent"></td></tr>
<tr> <td> Description </td> <td><textarea class="form-control" name="descEvent"></textarea>
<tr> <td> Date de l'evennemnt</td><td><input class="form-control" type="date" name="dateEvent"></td></tr>
<tr> <td> Image de l'evennement </td><td><input type='file' name='imgEvent' class="form-control"></td></tr>
<tr ><td colspan="2"> <input type="submit" name="send" class="btn btn-primary "value="Ajouter un Evennement"></td>
</table>
</div>
</fieldset>
</form>
<!-----------Edit event---------->

<form method="POST">
<fieldset>
<legend id="ModifierEvent">Modifier Un evennement </legend>
<hr>

<form method="POST">
<table class=" ModifierEvent table table-darked">
<tr>
<td>
<select class="form-control" name="EditEvent">;
<?php 
if(count(GestionEvent::getAllEvent())== 0)
echo "<option>Aucune Evénnement</option>";
else {

foreach(GestionEvent::getAllEvent() as  $value )
 {
    echo "<option value=".$value->getId().">Nom de l'vennement :".$value->getNomEvent(). "-Date de l'evennemnt : ".$value->getDateEvent(). "</option>"; 

  }
}
?>
</td>
<td> <input type="submit" name="EditEventBtn" value="Modifier" class="btn btn-warning">
</tr>
</select>
</form>
</fieldset>
</form>



<!----------Delete Event----------->

<form method="POST">
<fieldset>
<legend id="DeleteEvent">Supprimer Un evennement </legend>
<hr>

<form method="POST">
<table class=" DeleteEvent table table-darked">
<tr>
<td>
<select class="form-control" name="DeleteEvent">;
<?php 

if(count(GestionEvent::getAllEvent())== 0)
  echo "<option>Aucune Evénnement</option>";
  else {
foreach(GestionEvent::getAllEvent() as  $value )
 {
    echo "<option value=".$value->getId().">Nom de l'vennement :".$value->getNomEvent(). "-Date de l'evennemnt : ".$value->getDateEvent(). "</option>"; 

  }
}
?>
</td>
<td> <input type="submit" name="DeleteEventBtn" value="Modifier" class="btn btn-warning">
</tr>
</select>
</form>
</fieldset>
</form>






<?php

if(isset($_POST['send']))
 {
  $uploads_dir = 'pictures/';
  $name = $_FILES['imgEvent']['name'];
  $tmp_name = $_FILES['imgEvent']['tmp_name'];
 if( move_uploaded_file($tmp_name,$uploads_dir.$name))
  echo "ups";
GestionEvent::AjoutEvent($_POST["idEvent"] , $_POST["nomEvent"],$_POST["descEvent"],$_POST["dateEvent"],$_FILES['imgEvent']['name']);
}
if(isset($_POST['EditEventBtn']))
GestionEvent::ShowFormEditEevent($_POST['EditEvent'])

?>

</body>
</html>
<?php 


if(isset($_POST['EditBtn'])) 
GestionEvent::EditEvent($_POST['nvID'],$_POST['nvNom'],$_POST['nvDescription'],$_POST['nvDate']);

if(isset($_POST['DeleteEventBtn']))
GestionEvent::DeleteEventById($_POST['DeleteEvent']);
?>