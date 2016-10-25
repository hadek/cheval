<html>
<head></head>
<body>
<?php 
/*****************Suppression de l'image**********************/
include('../connexion.php');
//récup de l'identifiant de l'enregistrement 
$ID= (int)$_POST['ID'];
//préparer la requete qui permet de récupérer l'adresse de l'image à supprimer 
$req1 = $bdd->prepare('SELECT * FROM `cheval` WHERE ID = :ID'); 
//fournir l'identifiant
 $req1->execute(array('ID'=> $ID));
$resultat=$req1->fetch(PDO::FETCH_ASSOC);
//chercher les resultat 
?>
 //formulaire de modifcation de l'enregistrement
<form method="POST" action="update2.php" enctype="multipart/form-data">
 <input type="hidden"  name="ID" value ="<?php echo $ID;?>"></p>
<p>Nom <input type="text"  name="nom" value ="<?php echo $resultat['nom'];?>"></p>
<p>Race <input type="text"  name="race" value ="<?php echo $resultat['race'];?>"></p>
<img src="../images/<?php echo $resultat['image'];?>" alt="">
<input type="hidden"  name="image_old" value="<?php echo $resultat['image'];?>" >

<p> <input  type="FILE" name="image">
<input type="submit" name="Envoyer" value="Enregistrer" />
</body>
</html>
