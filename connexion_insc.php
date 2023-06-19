<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connexion_et_inscription</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700">
    <link rel="stylesheet" href="assets/css/Button-Change-Text-on-Hover.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: #2677cd;">
    <div style="color: var(--indigo);">
        <div class="container" style="margin-top: 20%;">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1 style="font-size: 30px;text-align: center;font-family: 'Archivo Black', sans-serif;"><span style="color: rgb(255, 255, 255);">E-COMMERCE&nbsp;</span><br><span style="color: rgb(255, 255, 255);">Bienvenue dans notre site</span></h1>
                </div>
                <div class="col-md-6">
                <form method="POST">
                    <h3 style="font-family: 'Archivo Black', sans-serif;color: #000000;text-align: center;">connexion&nbsp;</h3>
                    <section class="text-right" style="padding-right: 30%;">
                        <div><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">E-mail</label><input type="email" name="email"  id="email" style="margin-left: 8%;"></div>
                        <div style="width: 100%;"><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">password&nbsp;</label><input type="password" name="mdp" id="mdp"></div>
                    </section>
                    <div style="text-align: center;"><input class="btn btn-primary" type="submit" name="ok"  style="width: 50%;background: var(--green); "> </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start(); /*cette session nous permet de passer des paramétres d'une page à l'autre*/
        if(isset($_POST["ok"])){
            if(isset($_POST["email"])){
                if(isset($_POST["mdp"])){
                    $email=$_POST['email'];
                    $mdp=$_POST['mdp'];


                    $u="root";
                    $p="";
                    $db='ecommerce2023';           
                    $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect");
        
                    $sql="select * from utilisateur where email='$email' and mdp='$mdp'";
                    $resultat = mysqli_query($db,$sql) or die ("bad querry");
        
                    if (mysqli_num_rows($resultat)>0){   
        
                    $_SESSION['mail']=$email;/*cette session nous permet de passer des paramétres d'une page à l'autre*/
        
                    if ($email=="nadjib@gmail.com" and $mdp=='1234'){ /*code ecris en javascript, quand l'administrateur 
                        entre son adresse et mdp elle l'envoie à la page administrateur et la même pour l'utilisateur (client)*/               
                        echo '<script>         
                            window.location.href="e_admin.php";
                            </script>';
                            
                        }
                    else {
                        echo '<script>         
                        window.location.href="e_c_c.php";
                        </script>';
                        
                        }
                    }
                    else {
                        ?>
                        <div style="margin-left : 63%;"> Mot de passe ou adresse incorrect !!</div>
                        
                        <?php
                        }
                    
                }}}
            
        ?>


<div class="container" style="margin-bottom: 20%;">
            <div class="col-md-12" style="margin-top: 10%;">
                <h2 class="text-uppercase text-center" style="font-family: 'Archivo Black', sans-serif;">pour s'inscrire</h2>
                <form method="POST">
                    <div style="text-align: center;"><input class="btn btn-primary"  type="submit" value="CLIQUEZ ICI" name="ok1" style="width: 50%;background: var(--green);"><a class="text-uppercase"  style="color: var(--light);"></a></input></div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

                <?php
if(isset($_POST["ok1"])){

    echo '<script>         
    window.location.href="inscription.php";
    </script>';
}

?>




    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>