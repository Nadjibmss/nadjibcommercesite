<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>voir_produit</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="assets/css/gift-product-long.css">
    <link rel="stylesheet" href="assets/css/Pretty-Product-List-.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: var(--cyan);width: 100%;">
    <div>
        <h1 class="text-uppercase" style="font-family: 'Archivo Black', sans-serif;text-align: center;margin-top: 10%;">consulter le produit</h1>
    </div>
    <div>

    <?php session_start();
        $idp=$_GET['m'];
        $id_u= $_SESSION['$id_u'];
    ?>

        <p class="text-uppercase" style="font-family: 'Archivo Black', sans-serif;margin-top: 2%;text-align: left;margin-left: 2%;color: rgb(255,255,255);">l'identifiant du produit :<?php echo "".$idp;?> &nbsp;</p>
    </div>

    <?php
$u="root";
$p="";
$db='ecommerce2023';

$db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

  $sql="select * from produit where id=$idp";
  $resultat = mysqli_query($db,$sql) or die ("bad querry");
   
  while ($row=mysqli_fetch_assoc($resultat)) {
?>

    <div>
        <h2 class="text-uppercase" style="font-family: 'Archivo Black', sans-serif;margin-left: 5%;margin-top: 3%;">produit :</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div><?php echo "<img style=\"width:250px\" src=\"images/{$row['image_produit']} \"";?>>
                    <p class="text-uppercase" style="text-align: left;font-family: 'Archivo Black', sans-serif;">type :<?php echo" {$row['type']}";  ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-uppercase gift__name" style="font-family: 'Archivo Black', sans-serif;">designation :<?php echo" {$row['designation']}";  ?></h4>
                <div class="gift__price-wrap col-12 col-sm-6" style="margin-top: 2%;font-family: 'Archivo Black', sans-serif;">
                    <div class="gift__normal-price">
                        <p>id :<?php echo" {$row['id']}";?></p>
                    </div>
                    <div class="gift__today-price"><span>prix :  <?php echo" {$row['prix']} DZD";  ?>&nbsp;</span></div>
                    <div class="gift__quantity-left"><span>quantité : <?php echo" {$row['qte']}"; } ?> </span><span class="gift__data"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 style="margin-top: 3%;margin-left: 2%;font-family: 'Archivo Black', sans-serif;">faire une commande :</h2>
    </div>
    <form method="post">
    <div style="margin-top: 2%;margin-bottom: 8%;"><label class="text-uppercase" style="margin-left: 4%;font-family: 'Archivo Black', sans-serif;color: rgb(255,255,255);">quantité</label><input type="number" name="qte1" required="required" style="margin-left: 4%;width: 20%;"><button class="btn btn-primary" type="submit" name="commander" style="background: var(--red);margin-left: 3%;">commander</button></div>

    <?php
if(isset($_POST["commander"])){
    if(isset($_POST["qte1"])){
        $qte=$_POST['qte1'];
        $idp=$_GET['m'];
        echo "commande effectuée, quantiter :".$qte;
        
        $u="root";
        $p="";
        $db='ecommerce2023';
    
        $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

        $sql="insert into commande values (null,$id_u,$idp,'$qte',CURRENT_DATE)"; /*null: pour id psq il est en auto incremente*/
        $resultat = mysqli_query($db,$sql) or die ("bad querry");
    }}
?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>