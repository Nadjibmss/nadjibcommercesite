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
<div class="container" style="margin-bottom: 20%;">
        <div class="row">
            <div class="col-md-12" style="margin-top: 10%;">
                <h2 class="text-uppercase text-center" style="font-family: 'Archivo Black', sans-serif;">pour s'inscrire</h2>
                <section class="text-right" style="margin-right: 30%;padding-right: 10%;">
                <form method="POST">
                    <div><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">nom</label><input type="text" name="nom"  id="nom" required="required"></div>
                    <div><label class="text-uppercase text-left" style="color: #000000;font-family: 'Archivo Black', sans-serif;">prenom</label><input type="text"  name="prenom" id="prenom" required="required"></div>
                    <div><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">E-mail</label><input type="email"  id="email1" name="email1" required="required"></div>
                    <div><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">password</label><input type="password"  name="mdp1" id="mdp1" required="required"></div>
                    <div><label class="text-uppercase" style="color: #000000;font-family: 'Archivo Black', sans-serif;">confirm p.w</label><input type="password"  name="cm" id="cm" required="required"></div>
           
                </section>
                
                <div class="text-center" style="width: 100%;"><input class="btn btn-primary" required="required" type="submit" name="ok1" style="width: 35%;background: var(--green);"></div>
            </div>
        </div>
    </div>
    </form>
    <?php 
if(isset($_POST["ok1"])){
    if(isset($_POST["nom"])){
        if(isset($_POST["prenom"])){
        if(isset($_POST["email1"])){
            if(isset($_POST["mdp1"])){
                if(isset($_POST["cm"])){

                    $nom=$_POST["nom"];
                    $prenom=$_POST["prenom"];
                    $email=$_POST["email1"];
                    $mdp=$_POST["mdp1"];
                    $cm=$_POST["cm"];

                    $u="root";
                    $p="";
                    $db='ecommerce2023';
                    
                    if ($mdp==$cm){

                    $u="root";
                    $p="";
                    $db='ecommerce2023';
                
                    $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

                    $sql="select * from utilisateur where email='$email'"; /*si l'email entrée existe deja vas etre refuser */
                    $resultat = mysqli_query($db,$sql) or die ("bad querry");

                    if (mysqli_num_rows($resultat)>0){
                        echo "Email déja utilisé";
                    }

                    else if ($mdp != $cm)
                    {echo "Mot de passe non identique " ;}
                    

                    else  {

                    $u="root";
                    $p="";
                    $db='ecommerce2023';
                
                    $db= new mysqli('localhost',$u,$p,$db) or die ("unable to connect"); 

                    $sql="insert into utilisateur values (null,'$nom','$prenom','$email','$mdp')";
                    $resultat = mysqli_query($db,$sql) or die ("bad querry");
                    echo "utilisateur enregistrer ";}

                    }

                }
    
            }
        }}
    
    }
}

?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>