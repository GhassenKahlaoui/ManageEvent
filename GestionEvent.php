<?php 
/****************Description : Cette classe permet de gestionner un Evennement*********************** */
/**************************Version :1.0**************************** */
/**************************Developer : kahlaoui Mohamed Ghassen ************* */
class GestionEvent  {

  // cette fonction permet d'ectraire tous les evéennements 
  public static function getAllEvent() {

    $AllEvent = Array();           
  $sql = "select * FROM evennement"; // select depuis la base
  $result = mysqli_query(Connection::getInstance(), $sql); // exécuter la requette
  
  if (mysqli_num_rows($result) > 0) { //tester si il ya des champs 

      while($row = mysqli_fetch_assoc($result)) { //  creer des objets 
        $ev = new Event($row['idevennement'],$row['NomEvenement'],$row['description'],$row['dateEv'],$row['imagename']); 
        array_push($AllEvent,$ev); // et j'ajouter au tableau 
        
      }
  
  }
  return $AllEvent ; // retourner le tableau des objets
}  

  // cette fonction permet d'ajouter un nouvelle evenemment depuis un formulaire vers une base de donée
    public static function AjoutEvent($id,$nomEvent,$description,$Date,$imagename) {
      
       
       $req  = "insert into evennement Values (".$id.",'".$nomEvent."','".$description."','".$Date."','".$imagename ."')" ;
       
        if(mysqli_query(Connection::getInstance(),$req))
         echo "<h1 class='alert alert-success'>Ajout Avec succee</h1>";
         else
         echo "<h1 class='alert alert-warning'>Erreur !</h1>"; 
       ;}
  
       public static function ShowFormEditEevent($idEventEdit) {
            echo "<form method='POST'>";
            echo "<table class='table darked'> <th> Numero de l'evennement</th><th> Nouveau Nom de l'evennement </th> <th> Nouveau Description</th> <th> Nouveau Date</th><th>Mise a jours</th> ";
          foreach(GestionEvent::getAllEvent() as $value)
                  if($value->getId() == $idEventEdit )
                            
                  {
                     echo "<tr><td> <input type='text' name='nvID' value='".$value->getId()."'</td>";   
                    echo "<td><input type='text' name='nvNom' value='" . $value->getNomEvent()."'></td>";
                      echo "<td><textarea name='nvDescription'>" . $value->getDescriptionEvent()."</textarea></td>"; 
                      echo "<td><input type='date' name='nvDate' value='" . $value->getDateEvent()."'></td>";  
                      echo "<td><input  type='submit' class='btn btn-link' name='EditBtn' value='Modifier'></td></tr>";

                    }

                      echo "</table>";
                      echo "</form>";

       }


    public static function EditEvent($idEvent, $nvNom,$nvDes,$nvDate)  {
      $requ = "update evennement set NomEvenement='".$nvNom."', description = '".$nvDes ."', dateEv='".$nvDate."' where idevennement = ". $idEvent. "" ;
      if(mysqli_query(Connection::getInstance(),$requ))
        header('location:personne.php'); 
    }   
    public static function DeleteAllEvent() {}
    public static function DeleteEventById($d) {
      $req = "delete * from evennement where dateEv =" . $d. "";
      if(mysqli_query(Connection::getInstance(), $req))
      echo "<h1 class='alert alert-success'>supprimer avec succee</h1>";

    }

    
  
  } // end of class

?>