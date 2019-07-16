<?php
 
 class Event {
  private $id ;
  private $nomEvent  ; 
  private $description ; 
  private $dateEvent ; 
  private $imagename ;
  public function __construct($id,$nomEvent,$description,$date,$imagename) {
        $this->id = $id ;
        $this->nomEvent =  $nomEvent;
        $this->description = $description;
        $this->dateEvent = $date ;
        $this->imagename = $imagename;
      } 
  public function getId() { return $this->id ;}
  public function getNomEvent() {return $this->nomEvent;}
  public function getDescriptionEvent() {return $this->description;}
  public function getDateEvent() {return $this->dateEvent;}
  public function getImageName() {return $this->imagename;}

}
?>