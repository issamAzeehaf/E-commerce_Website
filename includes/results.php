<?php

session_start();

include("includes/db.php");

?>

<?php

@$nom_produit = $_POST['nom_produit'];
@$recherche = $_POST['recherche'];
if(isset($recherche)){
  $sql = "select * from produit where produit_titre like '%$nom_produit%'";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "salut";
}
}
?>
