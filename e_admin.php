<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Espace_administrateur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="assets/css/gift-product-long.css">
</head>

<body style="background: var(--secondary);">
<?php session_start(); /*cette session nous permet de passer des paramétres d'une page à l'autre*/?> 
<?php
$u="root";
$p="";
$db='ecommerce2023';

$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

$sql="select * from produit";
$resultat = mysqli_query($db,$sql) or die ("bad querry");

?>
    <div>
        <h1 class="text-center" style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);">ESPACE ADMINISTRATEUR</h1>
    </div>
    <div>
        <p style="color: var(--white);margin-top: 2%;margin-left: 2%;">VOTRE ADRESSE : <?php echo $_SESSION['mail'];?></p>
    </div>
    <div>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">PRODUITS :</h2>
    </div>
   <?php  while ($row=mysqli_fetch_assoc($resultat)) { ?>

    <div>
        <div class="gift row" style="border-color: var(--secondary);">
            <div class="gift__img col-sm-3 col-12" style="border-color: var(--secondary);"><img <?php echo " style=\"width:100px\" src=\"images/{$row['image_produit']} \";" ?> style="width: 70%;">
                <div class="gift__rating">
                    <p class="text-left" style="color: var(--white);">TYPE : <?php echo "{$row['type']}"; ?></p>
                </div>
            </div>
            <div class="gift__info col-sm-9 col-12">
                <h4 class="gift__name">DESIGNATION : <?php echo "{$row['designation']}"; ?></h4>
                <div class="gift__details"></div>
                <div class="gift__bottom row">
                    <div class="gift__price-wrap col-12 col-sm-6">
                        <div class="gift__normal-price">
                            <p style="color: var(--white);">ID : <?php echo "{$row['id']}"; ?></p>
                        </div>
                        <div class="gift__today-price">
                            <p>PRIX : <?php echo "{$row['prix']} DZD"; ?> </p>
                        </div>
                        <div class="gift__quantity-left">
                            <p style="color: var(--white);">QUANTITE : <?php echo "{$row['qte']}"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div><?php } ?>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">AJOUTER PRODUIT :</h2>
    </div>
    <div style="padding-right: 40%;margin-top: 2%;margin-bottom: 2%;">
    <form method="post">
        <div class="text-right"><label style="margin-right: 2%;">DESIGNATION</label><input type="text" name="desc" ></div>
        <div class="text-right"><label style="margin-right: 8%;">TYPE</label><input type="text" name="type" ></div>
        <div class="text-right"><label style="margin-right: 5%;">QUANTITE</label><input type="number" name="qte"></div>
        <div class="text-right"><label style="margin-right: 8%;">PRIX</label><input type="number" name="prix" ></div>
        <div class="text-right"><label>IMAGE&nbsp;</label><input type="file" name="img"></div>
        <div class="text-right"><input class="btn btn-primary" type="submit" name="ok" style="width: 40%;"></div>
    </div>

    <?php 
if(isset($_POST["ok"])){
    if(isset($_POST["desc"])){
        if(isset($_POST["type"])){
        if(isset($_POST["qte"])){
            if(isset($_POST["prix"])){
                if(isset($_POST["img"])){
                    $desc=$_POST["desc"];
                    $type=$_POST["type"];
                    $qte=$_POST["qte"];
                    $prix=$_POST["prix"];
                    $img=$_POST["img"];

                    $u="root";
                    $p="";
                    $db='ecommerce2023';
                
                    $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

                    $sql="insert into produit values (null,'$desc','$type','$qte','$prix','$img')";
                    $resultat = mysqli_query($db,$sql) or die ("bad querry");
                }
    
            }
        }
    
    }
}
}
?>

    <div>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">MODIFIER PRODUIT :</h2>
    </div>
    <form method="post">
    <div style="padding-right: 40%;margin-top: 2%;padding-bottom: 2%;">
        <div class="text-right"><label style="margin-right: 2%;">REFERENCE</label><input type="number" name="id1"></div>
        <div class="text-right"><label style="margin-right: 2%;">DESIGNATION</label><input type="text" name="desc1"></div>
        <div class="text-right"><label style="margin-right: 8%;">TYPE</label><input type="text" name="type1"></div>
        <div class="text-right"><label style="margin-right: 5%;">QUANTITE</label><input type="number" name="qte1"></div>
        <div class="text-right"><label style="margin-right: 8%;">PRIX</label><input type="number" name="prix1" ></div>
        <div class="text-right"><label>IMAGE&nbsp;</label><input type="file" name="img1"></div>
        <div class="text-right"><input class="btn btn-primary" type="submit" name="mod" style="width: 40%;"></div>

        <?php
$u="root";
$p="";
$db='ecommerce2023';
        
$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

if(isset($_POST["mod"])){
    if(isset($_POST["id1"])){

        $id=$_POST["id1"];
        $sql="select * from produit where id='$id'";
        $resultat = mysqli_query($db,$sql) or die ("bad querry");

        if (mysqli_num_rows($resultat)>0){ /*veifier si le produit qu'on vaut modifier existe dans la base de données*/

            if(isset($_POST['desc1']) and (($_POST['desc1'])!="")){ /*si on vaut modifier la designation*/
                $desc=$_POST['desc1'];
                $sql="UPDATE produit set designation='$desc' where id='$id'"; 
                $resultat = mysqli_query($db,$sql) or die ("bad querry");
            }

            if(isset($_POST["qte1"]) and (($_POST["qte1"])!="")){ /*si on vaut modifier la quantité*/
                $qte=$_POST["qte1"];
                $sql="UPDATE produit set qte=$qte where id='$id'"; 
                $resultat = mysqli_query($db,$sql) or die ("bad querry");
            }

            if(isset($_POST["type1"]) and (($_POST["type1"])!="")){ /*si on vaut modifier le type*/
                $type=$_POST["type1"];
                $sql="UPDATE produit set type ='$type' where id='$id'"; 
                $resultat = mysqli_query($db,$sql) or die ("bad querry");
            }

            if(isset($_POST["prix1"]) and (($_POST["prix1"])!="")){ /*si on vaut modifier le prix*/
                $prix=$_POST["prix1"];
                $sql="UPDATE produit set prix=$prix where id='$id' "; 
                $resultat = mysqli_query($db,$sql) or die ("bad querry");
            }

            if(isset($_POST["img1"]) and (($_POST["img1"])!="")){ /*si on vaut modifier l'image du produit*/
                $img=$_POST["img1"];
                $sql="UPDATE produit set image_produit='$img' where id='$id'"; 
                $resultat = mysqli_query($db,$sql) or die ("bad querry");
            }
                echo "le produit qui a comme référnece ".$id."a été modifié";
        }
        else {
             echo "cette référence ne corespond a aucun produit ";}
        }

    }
?>


    </div>
    <div>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">COMMANDES :</h2>
    </div>
<?php
$u="root";
$p="";
$db='ecommerce2023';

$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

$sql="select commande.id as 'reference commande' ,nom,prenom,email,produit.designation,produit.prix,commande.qte,(produit.prix * produit.qte) as totale,commande.date_commande from utilisateur,produit,commande where produit.id=commande.id_p and utilisateur.id=commande.id_u";
$resultat = mysqli_query($db,$sql) or die ("bad querry");

while ($row=mysqli_fetch_assoc($resultat)) {
    
?>
    <section style="margin-top: 2%;margin-bottom: 2%;">
        <p style="height: 5px;color: var(--light);">NOM : <?php echo "{$row['nom']}"; ?></p>
        <p style="height: 5px;color: var(--light);">PRENOM: <?php echo "{$row['prenom']}"; ?></p>
        <p style="height: 5px;color: var(--light);">ID: <?php echo "{$row['reference commande']}"; ?></p>
        <p style="height: 5px;color: var(--light);">E-MAIL: <?php echo "{$row['email']}"; ?></p>
        <p style="height: 5px;color: var(--light);">TYPE : <?php echo "{$row['designation']}"; ?></p>
        <p style="height: 5px;color: var(--light);">PRIX : <?php echo "{$row['prix']}"; ?></p>
        <p style="height: 5px;color: var(--light);">QUANTITE : <?php echo "{$row['qte']}"; ?></p>
        <p style="height: 5px;color: var(--light);">TOTALE : <?php echo "{$row['totale']}"; ?></p>
        <p style="color: var(--light);">DATE : <?php echo "{$row['date_commande']}"; }?></p>
    </section>
    <div>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">VALIDER COMMANDES :</h2>
    </div>
    <from method="post">
    <div style="margin-left: 2%;margin-top: 2%;"><label>ID COMMANDE&nbsp;</label><input type="number" name="idcmd" style="margin-left: 2%;"><input class="btn btn-primary" type="submit" name="ok3" style="background: var(--success);margin-left: 2%;"></div>

    <?php
if(isset($_POST["ok3"])){
    if(isset($_POST["idcmd"])){
        $cmd=$_POST['idcmd'];
        echo "".$cmd;
        
        $u="root";
        $p="";
        $db='ecommerce2023';
    
        $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

        $sql="insert into commande_validee values (null,'$cmd',CURRENT_DATE)"; /*null: pour id psq il est en auto incremente*/
        $resultat = mysqli_query($db,$sql) or die ("bad querry");
    }}
?>

    <div>
        <h2 style="font-family: 'Archivo Black', sans-serif;color: var(--gray-dark);margin-top: 2%;margin-left: 2%;">LES&nbsp; COMMANDES&nbsp;<span style="color: var(--gray-dark);">VALIDEES&nbsp;</span>:</h2>
    </div>

    <?php
$u="root";
$p="";
$db='ecommerce2023';

$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

$sql="select commande.id as 'reference commande' ,nom,prenom,email,produit.designation,produit.prix,commande.qte,(produit.prix * commande.qte) as totale,commande.date_commande,commande_validee.date_commande_v from utilisateur,produit,commande,commande_validee where produit.id=commande.id_p and utilisateur.id=commande.id_u and commande.id=commande_validee.id_c";
$resultat = mysqli_query($db,$sql) or die ("bad querry");

while ($row=mysqli_fetch_assoc($resultat)) {


?>
    <section style="margin-top: 2%;margin-bottom: 2%;"> 
        <p style="height: 5px;color: var(--light);">NOM : <?php echo "{$row['nom']}"; ?></p>
        <p style="height: 5px;color: var(--light);">PRENOM: <?php echo "{$row['prenom']}"; ?></p>
        <p style="height: 5px;color: var(--light);">ID: <?php echo "{$row['reference commande']}"; ?></p>
        <p style="height: 5px;color: var(--light);">E-MAIL: <?php echo "{$row['email']}"; ?></p>
        <p style="height: 5px;color: var(--light);">TYPE : <?php echo "{$row['designation']}"; ?></p>
        <p style="height: 5px;color: var(--light);">PRIX : <?php echo "{$row['prix']}"; ?></p>
        <p style="height: 5px;color: var(--light);">QUANTITE : <?php echo "{$row['qte']}"; ?></p>
        <p style="height: 5px;color: var(--light);">TOTALE : <?php echo "{$row['totale']}"; ?></p>
        <p style="color: var(--light);height: 4PX;">DATE : <?php echo "{$row['date_commande']}"; ?></p>
        <p style="color: var(--light);">DATE DE VALIDATION: <?php echo "{$row['date_commande_v']}";}?></p>
        
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>

</html>