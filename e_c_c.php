<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>espace_client</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Product-List-.css">
</head>

<body>
<?php session_start(); /*cette session nous permet de passer des paramétres d'une page à l'autre*/?> 



<?php
echo "votre adresse : ".$_SESSION['mail'];
$me=$_SESSION['mail'];
$u="root";
$p="";
$db='ecommerce2023';

$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

$sql="select id from utilisateur where email='$me'";
$resultat = mysqli_query($db,$sql) or die ("bad querry");

$row=mysqli_fetch_assoc($resultat);
    echo "<br>   identifiant : ".$row['id'];
    $id_u=$row['id'];
    $_SESSION['$id_u']=$id_u;

$sql="select * from produit";
$resultat = mysqli_query($db,$sql) or die ("bad querry");

 ?>
    <div class="row product-list">
    <?php while ($row=mysqli_fetch_assoc($resultat) ) { 
 ?>


        <div class="col-sm-6 col-md-4 product-item">
            <div class="product-container">
                <div class="row">
                    <div class="col-md-12"><a class="product-image" ><?php echo " <img style=\"width:100px\" src=\"images/{$row['image_produit']} \" />" ?> </a></div> 
                </div>
                <div class="row">
                    <div class="col-8">
                        <h2></h2>
                        <p><?php echo "{$row['designation']}" ?> </p>
                    </div>
                    <div class="col-4">
                        <p><?php echo "{$row['type']}" ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6"><button class="btn btn-light" type="submit" name="consulter"><?php echo "<a href=voir__produit.php?m=".$row['id'];?> </a> CONSULTER</button></div>
                            <div class="col-6">
                                <p class="product-price"><?php echo "{$row['prix']} DZD" ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <?php } ?> 
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>