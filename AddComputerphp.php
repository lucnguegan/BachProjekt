<?php
include ('./Dbconnectphp.php');
//Opening the database
$db=new PDO("mysql:host=localhost; dbname=Bissonabisso", "root", "");
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Ready the request
$pdoStat = $db->prepare("update Computers set Abteilung=:Abteilung, Hersteller=:Hersteller, IP0=:IP0, IP1=:IP1, IP2=:IP2, IP3=:IP3,
        MAC0=:MAC0, MAC1=:MAC1, MAC2=:MAC2, MAC3=:MAC3, MAC4=:MAC4, MAC5=:MAC5, Sub0=:Sub0, Sub1 =:Sub1, Sub2=:Sub2, Sub3=:Sub3, 
        Os =:Os, where ID=:id");

$pdoStat->bindValue(':id', filter_input(INPUT_GET, 'ID'), PDO::PARAM_INT);
$pdoStat->bindValue(':Abteilung', filter_input(INPUT_GET, 'Abteilung'), PDO::PARAM_STR);
$pdoStat->bindValue(':Hersteller', filter_input(INPUT_GET, 'Hersteller'), PDO::PARAM_STR);
$pdoStat->bindValue(':IP0', filter_input(INPUT_GET, 'IP0'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP1', filter_input(INPUT_GET, 'IP1'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP2', filter_input(INPUT_GET, 'IP2'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP3', filter_input(INPUT_GET, 'IP3'), PDO::PARAM_INT);
$pdoStat->bindValue(':MAC0', filter_input(INPUT_GET, 'MAC0'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC1', filter_input(INPUT_GET, 'MAC1'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC2', filter_input(INPUT_GET, 'MAC2'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC3', filter_input(INPUT_GET, 'MAC3'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC4', filter_input(INPUT_GET, 'MAC4'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC5', filter_input(INPUT_GET, 'MAC5'), PDO::PARAM_STR);
$pdoStat->bindValue(':Sub0', filter_input(INPUT_GET, 'Sub0'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub1', filter_input(INPUT_GET, 'Sub1'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub2', filter_input(INPUT_GET, 'Sub2'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub3', filter_input(INPUT_GET, 'Sub3'), PDO::PARAM_INT);
$pdoStat->bindValue(':Os', filter_input(INPUT_GET, 'Os'), PDO::PARAM_STR);

//Execute the request
$executeIsOk = $pdoStat->execute();

var_dump($pdoStat->errorInfo());

if($executeIsOk)
{
    $msg = "Computer erfolgreich aktualisiert";
}
 else {
     $msg = "Felher bei der Aktualisierung";
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Computer Aktualisieren</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css"  href = "buttoncss.css" />
    </head>
    <body>
        <header>
        <!--div>TODO write content</div-->
        <h1>Intranet Bisso Na Bisso</h1>
        <div id="horizontal_menu" >
        <ul class="level1">

        <li>
                <a href="index.php">Home</a>
        </li>
        
        <li>
            <a href="Teamphp.php">Team</a>
        </li>
        
        <li>                
            <a id="abteilungen">Abteilungen</a>               
            <ul class="level2">              
                <li><a href="Anmeldungphp.php" id="anmeldung">Anmeldung</a></li><br />
                <li><a href ="Buchhaltungphp.php" id="buchhaltung">Buchhaltung</a></li><br />
                <li><a href ="Mrtphp.php" id="mrt">MRT</a></li><br />
                <li><a href="Roentgenphp.php" id="roentgen">R&oumlntgen</a></li><br />
                <li><a href="Ctphp.php" id="ct">CT</a></li><br />
            </ul>
        </li>
        
        <li>
            <a href="Neuigkeitenphp.php">Infos</a>
        </li>
        
</ul>
        </div>
        </header>
        <br /><br /><br /><br /><br /> <br />
        <p><?= $msg?></p>
        
        <br /><br /><br />
        <form action ="index.php" id="botbut"> 
    <input id ="returnToStart" type="submit" value="Zurück zur Startseite" />
</form>
        <form>
    <input type="submit" Value = "Zurück zur Modifikation" onClick="history.go(-1);return true;">
</form>
      
    </body>
</html>
