<!--?php
   if(!empty(filter_input(INPUT_GET, 'id')))
{
    $id = filter_input(INPUT_GET, 'id');
    $query = "SELECT FROM Computers WHERE id=$id";
    include ('./Dbconnectphp.php');
    $db->exec($query);
    header("Location:index.php");
}
else
{
    header("Location:Formularhtml.html");
}
?-->
<?php
//Opening the database
$db=new PDO("mysql:host=localhost; dbname=Bissonabisso", "root", "");
$pdoStat = $db->prepare("SELECT * FROM Computers WHERE id=:id");
$pdoStat->bindValue(':id', filter_input(INPUT_GET, 'id'), PDO::PARAM_INT);

//Execute the request
$query = $pdoStat->execute();

//Get the Computer
$computer = $pdoStat->fetch();

?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css"  href = "buttoncss.css" />
        <title>Rechner bearbeiten</title>
    </head>
    <body>
        <form action="datenPruefen.php" method="post">
        <label>Abteilung: </label>
                <select name="abt">                    
                    <option value="Anmeldung">Anmeldung</option>
                    <option value="Buchhaltung">Buchhaltung</option>
                    <option value="MRT">MRT</option>
                    <option value="Röntgen">Röntgen</option>
                    <option value="CT">CT</option>             
                </select><br><br>
        Ip-Adresse:                 <input type="number" name="ipadr0" value ="<?= $computer['IP0'];?>" min="100" size="1" max="255">.
                    <input type="number" name="ipadr1" min="100" size="1" max="255" value ="<?= $computer['IP1'];?>">.
                    <input type="number" name="ipadr2" min="0" size="1" max="255" value ="<?= $computer['IP2'];?>">.
                    <input type="number" placeholder="XXX" name="ipadr3" min="10" size="1" max="254" value="<?= $computer['IP3'];?>"><br /><br />
                    Hersteller:     <input type="text" placeholder="Ex: Lenovo" name ="manufacturer" value ="<?= $computer['Hersteller'];?>"><br /><br />
                    Mac Adresse:    <input type="text" name="mac0" size="1" value="<?= $computer['MAC0'];?>">:
                    <input type="text" value ="<?= $computer['MAC1'];?>" name="mac1" size="1">:
                    <input type="text" value ="<?= $computer['MAC2'];?>" name="mac2" size="1">:
                    <input type="text" value ="<?= $computer['MAC3'];?>" name="mac3" size="1">:
                    <input type="text" value ="<?= $computer['MAC4'];?>" name="mac4" size="1">:
                    <input type="text" value ="<?= $computer['MAC5'];?>" name="mac5" size="1"><br /><br />
                    Subnet Mask:    <input type="number" name="sub0" min="100" size="1" max="255" value ="<?= $computer['Sub0'];?>">.
                    <input type="number" name="sub1" min="100" size="1" max="255" value ="<?= $computer['Sub1'];?>">.
                    <input type="number" name="sub2" min="100" size="1" max="255" value ="<?= $computer['Sub2'];?>">.
                    <input type="number" placeholder="XXX" name="sub3" min="0" size="1" max="254" value="<?= $computer['Sub3'];?>"><br /><br />
                    Betriebssystem: <input type="text" placeholder="Ex: Archlinux" name ="os" value ="<?= $computer['Os'];?>"><br /><br />
                                    
                        <input type="submit" value ="Rechner modifizieren" >
                    </form>
    </body>
</html>