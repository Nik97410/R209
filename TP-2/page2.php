<!DOCTYPE html>
<html>
<head>
    <title>test injection </title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Formulaire HTML</h1>
    <form action="injection.php" method="post">
        <div >
            <label for="prenom">Pr�nom : </label>
            <input type="text" id="prenom" name="prenom" style="width:30em">
        </div>
        <div >
            <label for="mail">Email : </label>
            <input type="email" id="mail" name="mail">
        </div>
        <div >
            <label for="age">Age : </label>
            <input type="number" id="age" name="age" min="12" max="99">
        </div>
        <div >
            <label for="pwd">Paswword : </label>
            <input type="text" id="pwd" name="pwd" min="12" max="99">
        </div>
        <div id="submit">
            <input type="submit" value="Envoyer">
        </div>
    </form>

    <?php
        $serveur = "127.0.0.1";
        $dbname = "injection";
        $user = "injectionR209";
        $pass = "root";
        $prenom = $_POST["prenom"];
        $mail = $_POST["mail"];
        $age = $_POST["age"];
        $pwd = $_POST["pwd"];

        try{
            //On se connecte � la BDD
            $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On ins�re les donn�es re�ues si les champs sont remplis
             if(!empty($prenom) && !empty($mail) && !empty($age) && !empty($pwd)){
            $sth = $dbco->prepare("
            INSERT INTO etu(prenom, mail, age,)
            VALUES(:prenom, :mail, :age)");
            $sth->bindParam(':prenom',$prenom);
            $sth->bindParam(':mail',$mail);
            $sth->bindParam(':age',$age);
            $sth->execute();
            }

            echo $prenom;

            //On r�cup�re les infos de la table
            $query="SELECT * FROM form WHERE prenom='$prenom'";
            $sth=$dbco->query($query);

            //On affiche les infos de la table
            $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
            $keys = array_keys($resultat);

            for($i = 0; $i < count($resultat); $i++){
                $n = $i + 1;
                echo 'Etudiant n�' .$n. ' :<br>';
                foreach($resultat[$keys[$i]] as $key => $value){
                    echo $key. ' : ' .$value. '<br>';
                }
            echo '<br>';
            }
        } 
        catch(PDOException $e){
            echo 'Impossible de traiter les donn�es. Erreur : '.$e->getMessage();
        }
    ?>
</body>
</html>