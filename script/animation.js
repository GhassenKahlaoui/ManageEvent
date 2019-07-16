$(document).ready(function() {
 // hide tous les formulaire par defaut
  $(".addEvent").hide();
 $(".ModifierEvent").hide() ;
 $(".DeleteEvent").hide();

// afficher le formulaire d'ajout un nouvelle Evvenement 

$("#AddEvent").click(function() {
  $(".addEvent").toggle(10000);
  $(".ModifierEvent").hide() ;
  $(".DeleteEvent").hide();
});

$("#ModifierEvent").click(function() {
  $(".ModifierEvent").toggle(10000);
  $(".addEvent").hide() ;
  $(".DeleteEvent").hide();
})

$("#DeleteEvent").click(function() {
    $(".DeleteEvent").toggle(10000);
    $(".addEvent").hide() ;
    $(".ModifierEvent").hide() ;

  })
  

})

