<?php
include './Dbconnectphp.php';
$objetPdo = new PDO("mysql:host=localhost; dbname=Bissonabisso", "root", "");

$pdoStat = $objetPdo->prepare('SELECT * FROM Computers WHERE id = :id');

$pdoStat->bindvalue(':id', filter_input(INPUT_GET, 'id'), PDO::PARAM_INT);

$executeIsOk = $pdoStat->execute();

$tab = $pdoStat->fetch();

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
        <form action ="updateDatasphp.php" method="post">
           <input type="hidden" name="ID" value="<?php echo $tab['id']; ?>"><br><br><br>
        <label >Abteilung: </label>
                <select name="abt">                    
                    <option value="<?php echo $tab['Abteilung']; ?>">Anmeldung</option>
                    <option value="<?php echo $tab['Abteilung']; ?>">Buchhaltung</option>
                    <option value="<?php echo $tab['Abteilung']; ?>">MRT</option>
                    <option value="<?php echo $tab['Abteilung']; ?>">Röntgen</option>
                    <option value="<?php echo $tab['Abteilung']; ?>">CT</option>             
                </select><br><br>
        Ip-Adresse:                 <input type="number" name="ipadr0" value ="<?php echo $tab['IP0'];?>" min="100" size="1" max="255">.
                    <input type="number" name="ipadr1" min="100" size="1" max="255" value ="<?php echo $tab['IP1'];?>">.
                    <input type="number" name="ipadr2" min="0" size="1" max="255" value ="<?php echo $tab['IP2'];?>">.
                    <input type="number" placeholder="XXX" name="ipadr3" min="10" size="1" max="254" value="<?php echo $tab['IP3'];?>"><br /><br />
                    Hersteller:     <input type="text" placeholder="Ex: Lenovo" name ="manufacturer" value ="<?php echo $tab['Hersteller'];?>"><br /><br />
                    Mac Adresse:    <input type="text" name="mac0" size="1" value="<?php echo $tab['MAC0'];?>">:
                    <input type="text" value ="<?php echo $tab['MAC1'];?>" name="mac1" size="1">:
                    <input type="text" value ="<?php echo $tab['MAC2'];?>" name="mac2" size="1">:
                    <input type="text" value ="<?php echo $tab['MAC3'];?>" name="mac3" size="1">:
                    <input type="text" value ="<?php echo $tab['MAC4'];?>" name="mac4" size="1">:
                    <input type="text" value ="<?php echo $tab['MAC5'];?>" name="mac5" size="1"><br /><br />
                    Subnet Mask:    <input type="number" name="sub0" min="100" size="1" max="255" value ="<?php echo $tab['Sub0'];?>">.
                    <input type="number" name="sub1" min="100" size="1" max="255" value ="<?php echo $tab['Sub1'];?>">.
                    <input type="number" name="sub2" min="100" size="1" max="255" value ="<?php echo $tab['Sub2'];?>">.
                    <input type="number" placeholder="XXX" name="sub3" min="0" size="1" max="254" value="<?php echo $tab['Sub3'];?>"><br /><br />
                    Betriebssystem: <input type="text" placeholder="Ex: Archlinux" name ="os" value ="<?php echo $tab['Os'];?>"><br /><br />
                                    
                        <input action ="updateDatasphp.php"   type="submit" value ="Rechner modifizieren" >
                    </form>
        <form>
    <input type="submit" Value = "Zurück" onClick="history.go(-1);return true;">
</form>
    </body>
</html>